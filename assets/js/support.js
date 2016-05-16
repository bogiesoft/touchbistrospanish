
/*global paginationClick,renderSearch,searchTerm,trackSearchTerms*/

function paginationClick(term, categoryID){
	jQuery('#SearchPagination a').on( "click", function() {
		if(!jQuery(this).hasClass('disabled'))
		{
			var numPage = jQuery(this).attr("data-pagenum");
			renderSearch(term, categoryID, numPage);
			jQuery(window).scrollTop(0);
		}
	}); /* Search Pagination end */
}

function renderSearch(term, categoryID, pageNum){
	if(term !== "")
	{

		jQuery('.st-search-results h1').text('All Search Results for ' + term);
		jQuery('#helpBreadcrumb li.active').text('Search Results for ' + term);

		jQuery.ajax({
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
				jQuery('#st-search-results-content').html(response);
				paginationClick(term, categoryID);
			}
		});

		trackSearchTerms(term);
	}
	else{
		jQuery('#st-search-results-content').html('<div>No Results Found</div>');
		jQuery('.st-search-results h1').text('');
		jQuery('#helpBreadcrumb li.active').text('');
	}
}

function searchTerm(){

	var term = jQuery('#st-input-search').val();
	var cleanTerm = term.replace(/[\|&;\$. %!#^*@"{}\[\]'\\:\/<>\(\)\+,]/g, "");
	if (cleanTerm !== ''){
		term = term.trim();
		if(window.location.pathname === "/help/st-search-result/"){
			var categoryID = jQuery('#search-filter .selectpicker').selectpicker().val();
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

	var term = jQuery('#st-input-search').val();
	if (validTerm(term)){
		term = term.trim();
		jQuery('#loading-img').show();
		jQuery.ajax({
			url: AjaxUtil.url,
			type: "POST",
			data: {
				term: term,
				nonce: AjaxUtil.nonce,
				action: "get_search_suggestions",
				search_string: jQuery('#st-input-search').val()
			},
			dataType: "json",
			success: function (response) {

				jQuery(".results").show();
				jQuery("#st-content-input-search ul").empty();

				if((response.search_string).trim() === (jQuery('#st-input-search').val()).trim()){
					if(response.data.length === 0){
						jQuery("#st-content-input-search ul").html('<li><a>No results</a></li>');
					}else{
						var imageSize = '';
						var renderImg = '';
						jQuery.each(response.data,function(i){
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
							jQuery("#st-content-input-search ul").append('<li><div id="containerIMG" class="' + response.data[i].post_type + '">' + renderImg + '<div id="play"></div></div><a href="'+response.data[i].post_link+'">'+title+'</a></li>');
						});
					}
					jQuery('#loading-img').hide();
				}
				jQuery('#loading-img').hide();

				if(enterKey){ //Hide suggestions
					jQuery('#st-search ul').hide();
					enterKey = false;
				}
			}
		});
	}
	else{
		jQuery('#st-search ul').hide();
		jQuery('#st-search-results-content').html('<div>No Results Found</div>');
		jQuery('.st-search-results h1').text('');
		jQuery('#helpBreadcrumb li.active').text('');
	}
}

function scrollToAnchor(id){
	console.log(jQuery(id).offset());
	jQuery('html,body').animate(
		{
			scrollTop: jQuery(id).offset().top - 190
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

jQuery(document).ready(function () {
	var hash = window.location.hash;

	/*if(jQuery('body').find('#wpadminbar').length > 0){
		jQuery('.st-side').css('top','305px');
	}*/

	jQuery('#search-filter .selectpicker').selectpicker();

	jQuery('#st-input-search').on('keyup', function (e) {
		if(globalTimeout != null)
		{
			clearTimeout(globalTimeout);
		}

		globalTimeout = setTimeout(Searchkey,300);

		if(e.which === 13)
		{
			enterKey = true;
		}

		jQuery(document.body).mousedown(function(event) {
			var target = jQuery(event.target);
			if (!target.parents().andSelf().is('#st-search')) {
				jQuery('#st-search ul').hide();
			}
		});
	});

	if(window.location.pathname === "/st-faq/"){
		jQuery('.faq').hide();
	}

	if(window.location.pathname === "/help/"){
		jQuery('.back-to-home').hide();
	}

	if(window.location.pathname === "/help/st-search-result/"){
		var searchString = window.location.search.substring(1);
		var term = decodeURIComponent(searchString.replace('search=', ''));
		jQuery('#st-input-search').val(term);
		var categoryID = jQuery('#search-filter .selectpicker').selectpicker().val();
		renderSearch(term, categoryID, 1);
	}

	jQuery('#contact-form-submit').on('click', function(){
		jQuery('.wpcf7-response-output').hide();
		jQuery('.wpcf7-not-valid-tip').hide();
	});

	/*============== Seach Button ==============*/
	jQuery('#st-search-button').on( "click", function(event) {
		event.preventDefault();
		searchTerm();
	}); /* search-button function end */

	jQuery( "#formSearch" ).submit(function( event ) {
		event.preventDefault();
		searchTerm();
	});

	/* =============== Search Filter* ===============*/

	jQuery("#search-filter .selectpicker").change(function() {
		var term = jQuery('#st-input-search').val();
		var categoryID = jQuery('#search-filter .selectpicker').selectpicker().val();
		renderSearch(term, categoryID, 1);
	});



	/*jQuery('.st-side').on('affix.bs.affix', function(){
		// Preventing https://github.com/twbs/bootstrap/issues/12373 on Firefox 30.0
		jQuery(this).trigger('click');
	});*/

	/* ============ Searchbar affix ====================*/
	jQuery('.st-searchbar').affix({
		offset: {
			top: 250,
			bottom: function () {
				var value= (this.bottom = (jQuery('#footer').outerHeight(true)));
				return value;
			}
		}
	});

	jQuery('.st-searchbar').on('affix.bs.affix', function(){
		//jQuery('#st-main-content').css('margin-top', '95px');
		/*jQuery('.st-side').addClass('affix');*/
		/* ============ Sidebar affix ====================*/
		/*jQuery('.st-side').affix({
			offset: {
				top: -100,
				bottom: function () {
					var value= (this.bottom = (jQuery('#footer').outerHeight(true))+40);
					return value;
				}
			}
		});*/
	});

	jQuery('.st-searchbar').on('affix-top.bs.affix', function(){
		/*jQuery('#st-main-content').css('margin-top', '0');*/
		/*jQuery('.st-side').removeClass('affix');*/
	});

	jQuery('.tab-content div ul li > h3').on('click', function(){
		jQuery('.panel-collapse.in').collapse('hide');
		jQuery('.tab-content div ul li h3 a').addClass('collapsed');
	});

	jQuery('.desktop-footer .footer-second .footer-nav .navbar-nav > li').append('<span class="line"></span>');

	/* Article link position when there's a hash for an especific component in HTML */
	jQuery("#article-content div p a").click(function() {
		var id= jQuery(this).attr('href');
		console.log(id);
		scrollToAnchor(id);
	});

	if(hash !== ''){
		var path = (window.location.pathname).indexOf('/help/articles');
		if(path >= 0){
			scrollToAnchor(hash);
		}
	}
	
	/*jQuery("#search-filter button.selectpicker").click(function() {
		jQuery(this).parent().toggleClass('open');
	});
	jQuery(document.body).mousedown(function(event) {
			var target = jQuery(event.target);
			if (!target.parents().andSelf().is('#search-filter')) {
				jQuery("#search-filter .btn-group.bootstrap-select").removeClass('open');
			}
			
	});*/

}); /* document ready End */
