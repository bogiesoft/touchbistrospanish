
/*global paginationClick,renderSearch,searchTerm,trackSearchTerms*/

function paginationClick(term, categoryID){
	$('#SearchPagination a').on( "click", function() {
		if(!$(this).hasClass('disabled'))
		{
			var numPage = $(this).attr("data-pagenum");
			renderSearch(term, categoryID, numPage);
			$(window).scrollTop(0);
		}
	}); /* Search Pagination end */
}

function renderSearch(term, categoryID, pageNum){
	if(term !== "")
	{

		$('.st-search-results h1').text('All Search Results for ' + term);
		$('#helpBreadcrumb li.active').text('Search Results for ' + term);

		$.ajax({
			url: AjaxUtil.url,
			type: "POST",
			data: {
				term: term,
				nonce: AjaxUtil.nonce,
				action: "get_search_result",
				category_id: categoryID,
				page_num: pageNum
			},
			success: function (response) {
				$('#st-search-results-content').html(response);
				paginationClick(term, categoryID);
			}
		});

		trackSearchTerms(term);
	}
	else{
		$('#st-search-results-content').html('<div>No Results Found</div>');
		$('.st-search-results h1').text('');
		$('#helpBreadcrumb li.active').text('');
	}
}

function searchTerm(){

	var term = $('#st-input-search').val();
	var cleanTerm = term.replace(/[\|&;\$. %!#^*@"{}\[\]'\\:\/<>\(\)\+,]/g, "");
	if (cleanTerm !== ''){
		term = term.trim();
		if(window.location.pathname === "/help/st-search-result/"){
			var categoryID = $('#search-filter .selectpicker').selectpicker().val();
			renderSearch(term, categoryID, 1);
		}
		else{
			location.href="/help/st-search-result/?search=" + term;
		}
	}

}

/*Validate Term > 4 chars or a word*/
function validTerm(iterm){
	if(iterm.length >= 2)
	{
		var spaces = iterm.length - iterm.trim().length;

		if ((spaces === 0) && (iterm.length >= 4)){
			return true;
		}
		else if ((spaces > 0) && (iterm.trim().length >= 2)){
			return true;
		}
		else {
			return false;
		}
	}
	else{
		return false;
	}
}

var globalTimeout = null;
var enterKey = false;

function Searchkey(){
	globalTimeout = null;

	var term = $('#st-input-search').val();
	if (validTerm(term)){
		term = term.trim();
		$('#loading-img').show();
		$.ajax({
			url: AjaxUtil.url,
			type: "POST",
			data: {
				term: term,
				nonce: AjaxUtil.nonce,
				action: "get_search_suggestions",
				search_string: $('#st-input-search').val()
			},
			dataType: "json",
			success: function (response) {

				$(".results").show();
				$("#st-content-input-search ul").empty();

				if((response.search_string).trim() === ($('#st-input-search').val()).trim()){
					if(response.data.length === 0){
						$("#st-content-input-search ul").html('<li><a>No results</a></li>');
					}else{
						var imageSize = '';
						var renderImg = '';
						$.each(response.data,function(i){
							if(response.data[i].thumbnail_url !== "")
							{
								renderImg = '<img class="' + response.data[i].imgClass + '" src="' + response.data[i].thumbnail_url+'"' + imageSize + ' />';
							}
							else{
								renderImg = '<span></span>';
							}
							var originalTermInit = response.data[i].title.toLowerCase().indexOf(term.toLowerCase());
							var originalTermFin = originalTermInit + term.length;
							var reg = new RegExp(term, 'gi');
							var title =  response.data[i].title;
							$("#st-content-input-search ul").append('<li><div id="containerIMG" class="' + response.data[i].post_type + '">' + renderImg + '<div id="play"></div></div><a href="'+response.data[i].post_link+'">'+title+'</a></li>');
						});
					}
					$('#loading-img').hide();
				}
				$('#loading-img').hide();

				if(enterKey){ //Hide suggestions
					$('#st-search ul').hide();
					enterKey = false;
				}
			}
		});
	}
	else{
		$('#st-search ul').hide();
		$('#st-search-results-content').html('<div>No Results Found</div>');
		$('.st-search-results h1').text('');
		$('#helpBreadcrumb li.active').text('');
	}
}

function scrollToAnchor(id){
	console.log($(id).offset());
	$('html,body').animate(
		{
			scrollTop: $(id).offset().top - 190
		},'slow');
}

function trackSearchTerms(sentence)
{
	if(typeof(ga) !== "undefined"){
		ga('send', 'event', 'Full Search Sentences', sentence, 'TouchBistro Full Search Sentences');
		var index;
		var terms = sentence.split(' ');
		for (index = 0; index < terms.length; index++) {
			if(terms[index].length > 3)
			{
				ga('send', 'event', 'Most Common Terms', terms[index], 'TouchBistro Most Common Terms');
			}
		}
	}
}

$(document).ready(function () {
	var hash = window.location.hash;

	if($('body').find('#wpadminbar').length > 0){
		$('.st-side').css('top','305px');
	}

	$('#search-filter .selectpicker').selectpicker();

	$('#st-input-search').on('keyup', function (e) {
		if(globalTimeout != null)
		{
			clearTimeout(globalTimeout);
		}

		globalTimeout = setTimeout(Searchkey,300);

		if(e.which === 13)
		{
			enterKey = true;
		}

		$(document.body).mousedown(function(event) {
			var target = $(event.target);
			if (!target.parents().andSelf().is('#st-search')) {
				$('#st-search ul').hide();
			}
		});
	});

	if(window.location.pathname === "/st-faq/"){
		$('.faq').hide();
	}

	if(window.location.pathname === "/help/"){
		$('.back-to-home').hide();
	}

	if(window.location.pathname === "/help/st-search-result/"){
		var searchString = window.location.search.substring(1);
		var term = decodeURIComponent(searchString.replace('search=', ''));
		$('#st-input-search').val(term);
		var categoryID = $('#search-filter .selectpicker').selectpicker().val();
		renderSearch(term, categoryID, 1);
	}

	$('#contact-form-submit').on('click', function(){
		$('.wpcf7-response-output').hide();
		$('.wpcf7-not-valid-tip').hide();
	});

	/*============== Seach Button ==============*/
	$('#st-search-button').on( "click", function(event) {
		event.preventDefault();
		searchTerm();
	}); /* search-button function end */

	$( "#formSearch" ).submit(function( event ) {
		event.preventDefault();
		searchTerm();
	});

	/* =============== Search Filter* ===============*/

	$("#search-filter .selectpicker").change(function() {
		var term = $('#st-input-search').val();
		var categoryID = $('#search-filter .selectpicker').selectpicker().val();
		renderSearch(term, categoryID, 1);
	});



	$('.st-side').on('affix.bs.affix', function(){
		// Preventing https://github.com/twbs/bootstrap/issues/12373 on Firefox 30.0
		$(this).trigger('click');
	});

	/* ============ Searchbar affix ====================*/
	$('.st-searchbar').affix({
		offset: {
			top: 100,
			bottom: function () {
				var value= (this.bottom = ($('.st-header.navbar').outerHeight(true)));
				return value;
			}
		}
	});

	$('.st-searchbar').on('affix.bs.affix', function(){
		$('#st-main-content').css('margin-top', '95px');
		$('.st-side').addClass('affix');
		/* ============ Sidebar affix ====================*/
		$('.st-side').affix({
			offset: {
				top: -100,
				bottom: function () {
					var value= (this.bottom = ($('.st-Footer-Content').outerHeight(true))+40);
					return value;
				}
			}
		});
	});

	$('.st-searchbar').on('affix-top.bs.affix', function(){
		$('#st-main-content').css('margin-top', '0');
		$('.st-side').removeClass('affix');
	});

	$('.tab-content div ul li > h3').on('click', function(){
		$('.panel-collapse.in').collapse('hide');
		$('.tab-content div ul li h3 a').addClass('collapsed');
	});

	$('.desktop-footer .footer-second .footer-nav .navbar-nav > li').append('<span class="line"></span>');

	/* Article link position when there's a hash for an especific component in HTML */
	$("#article-content div p a").click(function() {
		var id= $(this).attr('href');
		console.log(id);
		scrollToAnchor(id);
	});

	if(hash !== ''){
		var path = (window.location.pathname).indexOf('/help/articles');
		if(path >= 0){
			scrollToAnchor(hash);
		}
	}

}); /* document ready End */
