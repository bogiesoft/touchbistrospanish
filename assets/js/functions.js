jQuery('.touch .os-animation').removeClass('os-animation').removeAttr('data-os-animation').removeAttr('data-os-animation');
//jQuery('.touch .staggered-animation').removeClass('staggered-animation');

/* Controls the initial menu reveal and animation */

jQuery( ".mobile-burger-nav" ).on( "click", function( event ) {
	event.preventDefault();

  if ( jQuery( '#menu' ).hasClass('menu-is-active') ) {
    jQuery( "#menu"  ).removeClass( "menu-is-active" );
		jQuery('.all').css('height','auto');
		jQuery('.all').css('overflow','visible');
		jQuery('.all').css('position','relative');

		/*jQuery('html').css('height','auto');
		jQuery('html').css('overflow','visible');
		jQuery('html').css('position','relative');*/
		jQuery('.main-navigation').removeClass( "menu-open" );


  } else {
    jQuery( "#menu"  ).addClass( "menu-is-active" );
		jQuery('.all').css('height','823');
		jQuery('.all').css('overflow','hidden');
		jQuery('.all').css('position','relative');
		/*jQuery('html').css('height','823');
		jQuery('html').css('overflow','hidden');
		jQuery('html').css('position','relative');*/
		jQuery('.main-navigation').addClass( "menu-open" );
		window.scrollTo(0, 0);
  }
});

/* Simple triggers the above if the close icon is clicked */

jQuery( ".mobile-menu-close-toggle" ).on( "click", function( event ) {
    jQuery( ".mobile-burger-nav" ).trigger( "click" );
});

/* Controls single column dropdown toggle. Adds a class to #menu so we can control
    styling. Also toggles the back button */

jQuery( ".single-column-dropdown > div" ).on( "click", function( event ) {

  /* we don't want to prevent the default action if an anchor clicked */

  event.preventDefault();

  if (jQuery('#capture').is(':visible')) {
    if ( jQuery(this).closest('li').hasClass('single-dropdown-is-active') ) {
      jQuery(this).closest('li').removeClass('single-dropdown-is-active');
      jQuery( "#menu" ).removeClass('single-is-active');
    } else {
      jQuery(this).closest('li').addClass('single-dropdown-is-active');
      jQuery( "#menu" ).addClass('single-is-active');
      jQuery( ".mobile-menu-back-toggle" ).toggle();
    }
  }

});

/* Controls more mega dropdown. Because the more mega contains other columns we want to hide
    we transition the whole menu out, hide and show what we need then transition it back in */

jQuery( ".mega-menu-dropdown > div" ).on( "click", function( event ) {

    event.preventDefault();

    if (jQuery('#capture').is(':visible')) {

      jQuery('.mega-menu-dropdown').addClass('mega-dropdown-is-transitioning');

      setTimeout(function(){
        jQuery( ".mega-menu-dropdown" ).removeClass('mega-dropdown-is-transitioning');
        jQuery( ".mega-menu-dropdown" ).addClass('mega-dropdown-is-active');
        jQuery( ".mobile-menu-back-toggle" ).toggle();
      }, 50);
    }
});

/* Removes classes and removes itself if there's nowhere to go back to */
jQuery( ".mobile-menu-back-toggle" ).on( "click", function( event ) {
  event.preventDefault();
  if ( jQuery( 'li' ).hasClass('single-dropdown-is-active') || jQuery( 'li' ).hasClass('mega-dropdown-is-active') ) {
    jQuery( 'li' ).removeClass('single-dropdown-is-active');
    jQuery( 'li' ).removeClass('mega-dropdown-is-active');
    jQuery( "#menu" ).removeClass('single-is-active');
    jQuery( ".mobile-menu-back-toggle" ).toggle();
  }
});

jQuery('.scroll-navi-menu a').on('click', function(e){
    e.preventDefault();
    var speed = 400;
    var href =  jQuery(this).attr('href');
    var target = jQuery(href == '#' || href == "" ? 'html' : href);
    var position = target.offset().top;
    jQuery('body, html').animate({scrollTop:position}, speed, 'swing');
    return false;
});


jQuery('.section-toggles a').on('click', function(e){
    e.preventDefault();
    var speed = 400;
    var href =  jQuery(this).attr('href');
    var target = jQuery(href == '#' || href == "" ? 'html' : href);
    var position = target.offset().top;
    jQuery('body, html').animate({scrollTop:position}, speed, 'swing');
    return false;
});


if ( jQuery( ".video-pods" ).length ) {


var tg = jQuery('.video-pods');
var ps = tg.offset().top -600;

  jQuery('.video-pods').affix({
    offset: {
      top: ps
    }
	});
//}

}

var iScrollPos = 0;
// Back to top
jQuery(window).scroll(function () {
	if (jQuery(this).scrollTop() > (jQuery(window).height() * 0.4) + 100) {
		jQuery('#top-link-block').addClass('affix');
	} else {
		jQuery('#top-link-block').removeClass('affix');
	}
	if(jQuery('body.home')){
		if (jQuery(this).scrollTop() > (jQuery(window).height() * 0.2) + 100) {
			jQuery('.fixed-bottom-container').addClass('popup');
		} else {
			jQuery('.fixed-bottom-container').removeClass('popup');
		}
	}

    /*var iCurScrollPos = jQuery(this).scrollTop();

    if (iCurScrollPos > iScrollPos) {
				if (jQuery('#top-link-block').hasClass('affix')){
					jQuery('#top-link-block').removeClass('affix');
				}
    } else {
			 if (!jQuery('#top-link-block').hasClass('affix')){
				 jQuery('#top-link-block').addClass('affix');
			 }
    }
    iScrollPos = iCurScrollPos;*/
});

/*** HOME Pods ***/

//
// var primary = 0;
// var secondary = 0;
// jQuery( ".home-primary-pod" )
//   .mouseover(function() {
// 		if (primary == 0){
// 			jQuery( ".full-service-hover" ).fadeIn();
// 			primary = 1;
// 		}
//
// })
//   .mouseout(function() {
//
// 		if (primary == 1){
// 			jQuery( ".full-service-hover" ).fadeOut();
// 			primary = 0;
//
// 		}
//  });
//
//   jQuery( ".home-secondary-pod" )
//   .mouseover(function() {
//
// 		if (secondary == 0){
// 			jQuery( ".quick-service-hover" ).fadeIn();
// 			secondary = 1;
// 		}
//
// })
//   .mouseout(function() {
//
// 		if (secondary == 1){
// 		jQuery( ".quick-service-hover" ).fadeOut();
// 			secondary = 0;
//
// 		}
//  });




/* experimental */



if ( jQuery( ".home-slide" ).length ) {



		(function($) {
		    var isTouch = function() {
		        return /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|android|ipad|playbook|silk/i.test(navigator.userAgent || navigator.vendor || window.opera) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test((navigator.userAgent ||
		            navigator.vendor || window.opera).substr(0, 4))
		    }();
		    var change = function(el) {
		        var img = el.find("\x3e div \x3e img");
		        var canvas = el.find(".canvas");
		        var ratio = el.attr("data-ration");
		        if (!ratio || img.get(0).complete) ratio = img.width() / img.height();
		        else ratio = parseFloat(ratio);
		        var currRatio = (el.width() + parseFloat(el.css("padding-left")) + parseFloat(el.css("padding-right"))) / (el.height() + parseFloat(el.css("padding-top")) + parseFloat(el.css("padding-bottom")));
		        el.find("\x3e *").height("");
		        if (canvas.length && img.get(0).complete) el.addClass("canvas-visible");
		        else img.on("load", function() {
		            change(el)
		        });
		        if (currRatio >= ratio) {
		            el.addClass("w");
		            if (canvas.length && img.get(0).complete) {
		                canvas.height(img.height());
		                canvas.width("")
		            }
		        } else {
		            el.removeClass("w");
		            if (isTouch) el.find("\x3e *").height(el.height());
		            if (canvas.length && img.get(0).complete) {
		                canvas.width(img.width());
		                canvas.height("")
		            }
		        }
		    };
		    $.fn.bgStretch = function() {
		        return this.each(function() {
		            var el = $(this);
		            var wasInit = el.data("bgs") ? true : false;
		            if (el.find("\x3e div \x3e img").length) {
		                el.data("bgs", true);
		                var ratio =
		                    el.attr("data-ration");
		                var img = el.find("\x3e div \x3e img").eq(0);
		                var start = function() {
		                    el.addClass("init");
		                    change(el);
		                    if (!wasInit) $(window).on("resize", function() {
		                        change(el)
		                    })
		                };
		                if (ratio || img.get(0).complete) start();
		                else img.on("load", start)
		            }
		        })
		    };
		    $(function() {
		        $(".bgs").bgStretch();
		        var interval = setInterval(function() {
		            $(".bgs").bgStretch()
		        }, 500);
		        setTimeout(function() {
		            clearInterval(interval)
		        }, 15E3)
		    })
		})(jQuery);



		(function($) {
		    var animate = false;
		    var animateScroll = false;
		    var scrollEndTimeOut = null;
		    var nativeScrolling = false;
		    var lastScrollTop = null;
		    var events = {};
		    var mousewheel = false;
		    var keypressed = false;
		    window.Scrolling = function(options) {
		        this.options = $.extend({
		            bySpeed: false,
		            duration: 1E3,
		            pixelsPerDuration: 1E3,
		            easing: "swing",
		            minScrollByDuration: 10,
		            minDurationBySpeed: 50
		        }, options)
		    };
		    $(window).bind("mousewheel DOMMouseScroll", function(event) {
		        mousewheel = true
		    });
		    $(window).on("keydown", function(e) {
		        keypressed = e.keyCode
		    });
		    $(window).on("scroll resize orientationchange",
		        function(e) {
		            var _this = this;
		            if (e.type == "scroll") {
		                var scrollTop = Scrolling.getScrollTop();
		                clearTimeout(scrollEndTimeOut);
		                var direction = 0;
		                if (lastScrollTop !== null) direction = lastScrollTop - scrollTop > 0 ? 1 : -1;
		                if (!animateScroll) nativeScrolling = true;
		                var nativeScrollingScrollEnd = nativeScrolling && mousewheel ? true : false;
		                scrollEndTimeOut = setTimeout(function() {
		                    if (events["scrollend"]) {
		                        var nE = jQuery.Event("scrollend", {
		                            direction: direction,
		                            nat: nativeScrollingScrollEnd,
		                            bykey: keypressed
		                        });
		                        $.each(events["scrollend"], function(i,
		                            s) {
		                            if (s && s.func) s.func.call(_this, nE)
		                        })
		                    }
		                    lastScrollTop = Scrolling.getScrollTop();
		                    mousewheel = false;
		                    keypressed = false;
		                    if (!animate) animateScroll = false;
		                    nativeScrolling = false
		                }, 350);
		                if (!animate) animateScroll = false;
		                lastScrollTop = scrollTop
		            }
		            if (events[e.type]) $.each(events[e.type], function(i, s) {
		                if (s && s.func) s.func.call(_this, e)
		            })
		        });
		    Scrolling.getScrollTop = function() {
		        return $("html").scrollTop() || $("body").scrollTop() || $(window).scrollTop()
		    };
		    Scrolling.on = function(listEvents, func, opt) {
		        $.each(listEvents.split(" "),
		            function(i, event) {
		                var options = $.extend({
		                    weight: 0
		                }, opt);
		                event = $.trim(event);
		                if (typeof events[event] == typeof undef) events[event] = [];
		                if (typeof func == typeof
		                    function() {}) events[event].push({
		                    func: func,
		                    opt: options
		                });
		                events[event].sort(function(a, b) {
		                    if (a.opt.weight == b.opt.weight) return 0;
		                    else if (a.opt.weight > b.opt.weight) return 1;
		                    else return -1
		                })
		            })
		    };
		    Scrolling.off = function(listEvents, func) {
		        var remove = false;
		        $.each(listEvents.split(" "), function(i$$0, event) {
		            event = $.trim(event);
		            if (typeof events[event] == typeof undef) return false;
		            $.each(events[event], function(i, s) {
		                if (s.func === func) {
		                    events[event].splice(i, 1);
		                    remove = true;
		                    return false
		                }
		            })
		        });
		        return remove
		    };
		    Scrolling.isScrolling = function() {
		        return animate || nativeScrolling
		    };
		    Scrolling.isAnimated = function() {
		        return animate
		    };
		    Scrolling.getViewerSize = function() {
		        return {
		            w: $(window).width(),
		            h: $(window).height()
		        }
		    };
		    Scrolling.prototype.on = function(listEvents, func, opt) {
		        Scrolling.on(listEvents, func, opt)
		    };
		    Scrolling.prototype.off = function(listEvents, func) {
		        return Scrolling.off(listEvents, func)
		    };
		    Scrolling.prototype.isScrolling =
		        function() {
		            return Scrolling.isScrolling()
		        };
		    Scrolling.prototype.isAnimated = function() {
		        return Scrolling.isAnimated()
		    };
		    Scrolling.prototype.getScrollTop = function() {
		        return Scrolling.getScrollTop()
		    };
		    Scrolling.prototype.animateTo = function(top, options, complete) {
		        if (navigator.userAgent.match(/nokia/i)) {
		            this.scrollTo(top, options, complete);
		            return
		        }
		        options = $.extend({}, this.options, options);
		        $("html, body").stop(true, false);
		        animate = true;
		        animateScroll = true;
		        var duration = options.duration;
		        var bySpeed = options.bySpeed;
		        if (Math.abs(this.getScrollTop() - top) < options.minScrollByDuration) bySpeed = true;
		        if (bySpeed) duration = Math.max(Math.round(Math.abs(this.getScrollTop() - top) / (options.pixelsPerDuration / options.duration)), options.minDurationBySpeed);
		        $("html, body").animate({
		            scrollTop: top
		        }, {
		            queue: false,
		            easing: this.options.easing,
		            duration: duration,
		            complete: function() {
		                animate = false;
		                if (typeof complete == typeof
		                    function() {}) complete()
		            }
		        })
		    };
		    Scrolling.prototype.scrollTo = function(top, options, complete) {
		        $("html, body").stop(true, false);
		        $("html, body").scrollTop(top);
		        animate = false;
		        if (typeof complete == typeof
		            function() {}) complete()
		    };
		    Scrolling.prototype.scrollToElem = function(elem, options, complete) {
		        if (elem.length) {
		            this.scrollTo(elem.offset().top, options, complete);
		            return true
		        }
		        return false
		    };
		    Scrolling.prototype.animateToElem = function(elem, options, complete) {
		        if (elem.length) {
		            this.animateTo(elem.offset().top, options, complete);
		            return true
		        }
		        return false
		    };
		    Scrolling.prototype.getViewerSize = function() {
		        return Scrolling.getViewerSize()
		    };
		    lastScrollTop =
		        Scrolling.getScrollTop()
		})(jQuery);




		(function($) {
		    var requestFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
		        callback()
		    };
		    window.Navigation = function(links, options) {
		        this.options = $.extend({
		                anchorGroup: ".nav-group",
		                locationReplace: false,
		                locationReversReplace: false,
		                activeClass: "active",
		                attrLockMouseWheel: "data-nav-lock-mousewheel",
		                attrNavBox: "data-nav-box",
		                slideGroup: ".home-slides-section",
		                onScrollComplete: null
		            },
		            options);
		        this._mouseWheel = /firefox/i.test(navigator.userAgent) ? "DOMMouseScroll" : "mousewheel";
		        this.links = links.filter("a");
		        this.scrolling = new Scrolling(options)
		    };

		    Navigation.prototype._determineDependentNodesByHash = function() {
		        var _this = this;
		        var match = this.getMatchDependentNodeByHash();
		        var activeClass = this.options.activeClass;
		        _this.links.removeClass(activeClass);
		        var anchorGroup = match.link.closest(_this.options.anchorGroup);
		        if (_this.currGroupActiveClass) anchorGroup.removeClass(_this.currGroupActiveClass);
		        _this.currGroupActiveClass = null;
		        if (this._isBoxVisibleInWindow(match.box)) {
		            if (match.link.attr("class")) {
		                anchorGroup.addClass(match.link.attr("class"));
		                _this.currGroupActiveClass = match.link.attr("class")
		            }
		            match.link.addClass(activeClass);
		            $.each(this.links, function() {
		                var box = $(this.hash);
		                if (box.attr(_this.options.attrNavBox)) box = box.closest(box.attr(_this.options.attrNavBox));
		                box.removeClass(activeClass)
		            });
		            match.box.addClass(activeClass);
		            //console.log('lol');
		            if (this.options.locationReplace && this.options.locationReversReplace &&
		                history.replaceState) history.replaceState(null, null, match.link.get(0).hash)
		        } else if (this.options.locationReplace && this.options.locationReversReplace && history.replaceState) history.replaceState(null, null, location.href.split("#")[0])
		    };
		    Navigation.prototype._isBoxVisibleInWindow = function(box) {
		        var scrollTop = this.scrolling.getScrollTop();
		        if (scrollTop + this.scrolling.getViewerSize().h > box.offset().top && scrollTop < box.offset().top + box.height()) return true;
		        return false
		    };
		    Navigation.prototype._scrollingByLink =
		        function(l, options) {
		            var _this = this;
		            var hash = l.get(0).hash;
		            var goTo = $(l.get(0).hash);
		            var box = goTo;
		            if (box.attr(_this.options.attrNavBox)) box = box.closest(box.attr(_this.options.attrNavBox));
		            _this.currentMatch = {
		                link: l,
		                box: box
		            };
		            return _this.scrolling.animateToElem(goTo, options, function() {
		                if (_this.options.locationReplace)
		                    if (history.replaceState) history.replaceState(null, null, hash);
		                    else location.hash = hash.replace("#", "");
		                if (_this.options.onScrollComplete && typeof _this.options.onScrollComplete == typeof
		                    function() {}) _this.options.onScrollComplete({
		                    link: l,
		                    box: box
		                })
		            })
		        };
		    Navigation.prototype.getMatchDependentNodeByHash = function() {
		        var _this = this;
		        var m = {
		            h: null,
		            link: null
		        };
		        _this.links.each(function() {
		            var $this = $(this);
		            var box = $(this.hash);
		            if (box.attr(_this.options.attrNavBox)) box = box.closest(box.attr(_this.options.attrNavBox));
		            if (box.length && box.is(":visible")) {
		                var h = 0;
		                var hT = box.offset().top - _this.scrolling.getScrollTop();
		                if (hT <= 0) {
		                    h = box.height() + hT;
		                    if (h > _this.scrolling.getViewerSize().h) h = _this.scrolling.getViewerSize().h
		                } else {
		                    h = _this.scrolling.getViewerSize().h -
		                        hT;
		                    if (h > box.height()) h = box.height()
		                }
		                h = h / box.height();
		                if (m.h === null || h > m.h) {
		                    m.h = h;
		                    m.box = box;
		                    m.link = $this
		                }
		            }
		        });
		        return {
		            link: m.link,
		            box: m.box
		        }
		    };
		    Navigation.prototype.activateNavToHash = function() {
		        var _this = this;
		        if (!_this._navToHashFN) {
		            this._navToHashFN = function() {
		                return !_this._scrollingByLink($(this))
		            };
		            this.links.each(function() {
		                $(this).on("click", _this._navToHashFN)
		            })
		        }
		        return _this
		    };
		    Navigation.prototype.activateDependentNodesByHash = function() {
		        var _this = this;
		        if (!_this._nodesByHashFN) {
		            _this._determineDependentNodesByHash();
		            _this._nodesByHashFN = function() {
		                requestFrame(function() {
		                    _this._determineDependentNodesByHash()
		                })
		            };
		            this.scrolling.on("scroll resize", _this._nodesByHashFN)
		        }
		        return _this
		    };
		    Navigation.prototype.destroy = function() {
		        var _this = this;
		        if (this._nodesByHashFN) {
		            this.scrolling.off("scroll resize", this._nodesByHashFN);
		            this._nodesByHashFN = null
		        }
		        if (this._navToHashFN) {
		            this.links.each(function() {
		                $(this).off("click", _this._navToHashFN)
		            });
		            this._navToHashFN = null
		        }
		        return _this
		    };
		    $.fn.navigation = function(settings) {
		        var navigation;
		        this.each(function(index, element) {
		            if (element.navigation) {
		                navigation = element.navigation;
		                return false
		            }
		        });
		        if (!navigation) {
		            navigation = new Navigation($(this), settings);
		            this.each(function(index, element) {
		                element.navigation = navigation
		            })
		        }
		        if (settings && typeof settings == typeof {}) {
		            var returnFN = false;
		            var returnValue;
		            $.each(settings, function(name, val) {
		                if ((name.indexOf("set") == 0 || name.indexOf("get") == 0 || name.indexOf("activate") == 0) && navigation[name] && typeof navigation[name] == typeof
		                    function() {}) {
		                    returnValue = navigation[name](val);
		                    returnFN = true;
		                    return false
		                }
		            });
		            if (returnFN) return returnValue
		        }
		        return this
		    };
		    $.fn.navigationDestroy = function() {
		        var navigation;
		        this.each(function(index, element) {
		            if (element.navigation) {
		                if (!navigation) navigation = element.navigation;
		                delete element.navigation
		            }
		        });
		        if (navigation) {
		            navigation.destroy();
		            navigation = null
		        }
		        return this
		    }
		})(jQuery);

		(function($) {



		    var requestFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
		        callback()
		    };
		    var slideID = 0;
		    window.Sliding = function(slides, options) {


		        var _this = this;
		        this.options = $.extend({
		            attrLockMouseWheel: "data-nav-lock-mousewheel",
		            slideGroup: ".home-slides-section",
		            attrNavClass: "data-nav-class",
		            attrNavBox: "data-nav-box",
		            navGroupClass: "nav-group mobile-hide",
		            useSnap: false,
		            useReach: true,
		            onSlideMatch: null,
		            onSlidesInit: null
		        }, options);
		        this._mouseWheel = /firefox/i.test(navigator.userAgent) ? "DOMMouseScroll" : "mousewheel";
		        this._eventListAutomaticNav = _this._mouseWheel + " " + "keydown";
		        this.group = null;
		        this.slides = [];
		        this.lastLink = null;
		        this.listeners = {
		            fullOnWindow: null,
		            controlNavGroup: null,
		            nav: null
		        };
		        slides.each(function() {
		            var slide = $(this);
		            var groupElem = slide.closest(_this.options.slideGroup);

		            //console.log(groupElem);
		            if (!groupElem.length) return;
		            if (_this.group === null) {
		                _this.group = groupElem;
		                _this.ul = $("\x3cul /\x3e")
		            }
		            if (groupElem.get(0) !==
		                _this.group.get(0)) return;
		            var id = slide.attr("id");
		            if (!id) {
		                ++slideID;
		                id = "slide-" + slideID
		            }
		            var li = $('\x3cli\x3e\x3ca href\x3d"#' + id + '"\x3e\x3cspan\x3e' + id + "\x3c/span\x3e\x3c/a\x3e\x3c/li\x3e");
		            if (slide.attr(_this.options.attrNavClass)) li.find("a").addClass(slide.attr(_this.options.attrNavClass));
		            _this.ul.append(li);
		            slide.attr("id", id);
		            var slideBox = slide;
		            if (slide.attr(_this.options.attrNavBox)) slideBox = slide.closest(slide.attr(_this.options.attrNavBox));
		            _this.slides.push(slideBox.get(0))
		        });
		        this.slides =
		            $(this.slides);
		        this.nav = $("\x3cnav /\x3e");

		        this.nav.addClass(_this.options.navGroupClass);
		        this.nav.append(this.ul);
		         this.group.append(this.nav);
		        this.links = this.nav.find("a");
		        this.navigation = new Navigation(this.links, $.extend({}, _this.options, {
		            onScrollComplete: function(match) {
		                _this.onSlideMatch(match)
		            }
		        }));
		        this.activate()
		    };
		    Sliding.prototype.activate = function() {
		        var _this = this;
		        this.onSlidesInit(this.slides);
		        this.navigation.activateNavToHash();
		        this.navigation.activateDependentNodesByHash();
		        if (!this.listeners.fullOnWindow) {
		            this.listeners.fullOnWindow =
		                function() {
		                    if (_this._isBoxVisibleInFullScreen(_this.group)) _this.group.addClass("fs");
		                    else _this.group.removeClass("fs")
		                };
		            this.listeners.fullOnWindow();
		            Scrolling.on("scroll resize", this.listeners.fullOnWindow)
		        }
		        if (!this.listeners.controlNavGroup) {
		            this.listeners.controlNavGroup = function() {
		                var scrollTop = Scrolling.getScrollTop();
		                if (_this.group.offset().top <= scrollTop && _this.group.offset().top + _this.group.height() >= scrollTop + Scrolling.getViewerSize().h * .9) _this.nav.removeClass("outside");
		                else _this.nav.addClass("outside")
		            };
		            this.listeners.controlNavGroup();
		            Scrolling.on("scroll resize", this.listeners.controlNavGroup)
		        }
		        if (!this.listeners.nav) {
		            this.listeners.nav = function(e) {
		                // return _this._onNav(e)
		            };
		            if (this.options.useSnap) $(window).on(_this._eventListAutomaticNav, this.listeners.nav);
		            if (this.options.useReach) Scrolling.on("scrollend", this.listeners.nav)
		        }
		        return _this
		    };
		    Sliding.prototype.onSlideMatch = function(match) {
		        this.lastLink = match.link;
		        if (typeof this.options.onSlideMatch == typeof
		            function() {}) this.options.onSlideMatch(match)
		    };
		    Sliding.prototype.onSlidesInit = function(slides) {
		        if (typeof this.options.onSlidesInit == typeof
		            function() {}) this.options.onSlidesInit(slides)
		    };
		    Sliding.prototype._isBoxVisibleInFullScreen = function(box) {
		        var scrollTop = Scrolling.getScrollTop();
		        if (box.offset().top <= scrollTop && box.offset().top + box.outerHeight() > scrollTop + Scrolling.getViewerSize().h) return true;
		        return false
		    };
		    Sliding.prototype._isBoxVisibleInWindow = function(box) {
		        var scrollTop = Scrolling.getScrollTop();
		        if (scrollTop >= box.offset().top && scrollTop +
		            Scrolling.getViewerSize().h <= box.offset().top + box.height()) return true;
		        return false
		    };
		    Sliding.prototype._onNav = function(e) {
		        var _this = this;
		        var match = this.navigation.getMatchDependentNodeByHash();
		        var scrollTop = Scrolling.getScrollTop();
		        var returnFN = function() {
		            if (Scrolling.isAnimated()) {
		                e.stopPropagation();
		                e.preventDefault();
		                return false
		            } else return true
		        };
		        if (this._isBoxVisibleInWindow(_this.group)) {
		            if (e.type == "scrollend" && !e.bykey) return returnFN();
		            if (match.box.attr(_this.options.attrLockMouseWheel) &&
		                match.box.attr(_this.options.attrLockMouseWheel).toLowerCase() == "true") return returnFN();
		            var index = null;
		            _this.links.each(function(i) {
		                if ($(this).get(0).hash === match.link.get(0).hash) {
		                    index = i;
		                    return false
		                }
		            });
		            var direction = 0;
		            var e_type = e.bykey ? "keydown" : e.type;
		            switch (e_type) {
		                case "scrollend":
		                    direction = e.direction;
		                    break;
		                case _this._mouseWheel:
		                    direction = Math.max(-1, Math.min(1, e.originalEvent.wheelDelta || -e.originalEvent.detail));
		                    break;
		                case "keydown":
		                    if (e.bykey == 40) direction = -1;
		                    else if (e.bykey == 38) direction =
		                        1;
		                    else return returnFN();
		                    break
		            }
		            var optionsScroll = {
		                bySpeed: true,
		                pixelsPerDuration: 800
		            };
		            if (!Scrolling.isAnimated() && direction != 0)
		                if (direction > 0) {
		                    if (_this.links[index - 1]) {
		                        _this.navigation._scrollingByLink($(_this.links[index - 1]), optionsScroll);
		                        _this.lastLink = $(_this.links[index - 1])
		                    }
		                } else if (_this.links[index + 1]) {
		                _this.navigation._scrollingByLink($(_this.links[index + 1]), optionsScroll);
		                _this.lastLink = $(_this.links[index + 1])
		            }
		            return returnFN()
		        } else _this.lastLink = null
		    };
		    Sliding.prototype.clear = function() {
		        var _this =
		            this;
		        if (this.options.useSnap) $(window).off(_this._eventListAutomaticNav, this.listeners.nav);
		        if (this.options.useReach) Scrolling.off("scrollend", this.listeners.nav);
		        this.listeners.nav = null;
		        Scrolling.off("scroll resize", this.listeners.fullOnWindow);
		        this.listeners.fullOnWindow = null;
		        Scrolling.off("scroll resize", this.listeners.controlNavGroup);
		        this.listeners.controlNavGroup = null;
		        this.navigation.destroy();
		        return _this
		    }

		isTouch = false;

		sliding = new Sliding($(".home-slides"), {
		                    locationReplace: false,
		                    easing: "easeInOutQuad",
		                    duration: 800,
		                    useReach: !isTouch,
		                    bySpeed: true
		                });


		  sliding.activate();



		})(jQuery);



		/*experimental */



		(function($) {
		    var requestFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
		        callback()
		    };
		    $.fn.switchManager = function(settings) {
		        var options = $.extend({
		                attrs: ["data-color", "data-feature"],
		                eventHoverForAttr: [],
		                effect: ".switching-effect",
		                switchElem: "a.switch",
		                switchGroup: ".switch-group",
		                activeClass: "active",
		                automaticSwitch: false,
		                automaticSwitchDuration: 5E3,
		                automaticSwitchNesting: ["data-feature"]
		            },
		            settings);
		        var switchNextInGroup = function(group) {
		            var activeIndex = null;
		            var nextIndex = null;
		            var cycle = false;
		            $.each(group, function(index, e) {
		                if (e.hasClass(options.activeClass)) {
		                    activeIndex = index;
		                    return false
		                }
		            });
		            if (activeIndex == null || activeIndex >= group.length - 1) {
		                nextIndex = 0;
		                if (activeIndex !== null) cycle = true
		            } else nextIndex = activeIndex + 1;
		            group[nextIndex].trigger("click", true);
		            return cycle
		        };
		        return this.each(function() {
		            var f = $(this);
		            var attrs = options.attrs;
		            var sE = f.find(options.effect);
		            var elements = sE.find("[" +
		                attrs.join("],[") + "]");
		            elements.each(function() {
		                var e = $(this);
		                $.each(attrs, function(i, attr) {
		                    if (e.attr(attr)) $.each(e.attr(attr).split(","), function(k, n) {
		                        e.data(attr + "-" + $.trim(n), true)
		                    })
		                })
		            });
		            var switches = f.find(options.switchElem);
		            switches.on("click hover", function(e$$0, automatic) {
		                var a = $(this);
		                if (e$$0.type == "hover" || e$$0.type == "mouseleave" || e$$0.type == "mouseenter") {
		                    var hasNoHoverState = true;
		                    $.each(options.eventHoverForAttr, function(i, attrName) {
		                        if (a.attr(attrName)) {
		                            hasNoHoverState = false;
		                            return false
		                        }
		                    });
		                    if (hasNoHoverState) return true
		                }
		                if (a.hasClass(options.activeClass)) return false;
		                if (!automatic && startCircle) clearTimeout(startCircle.circleTimer);
		                var toShow = [];
		                var toHide = [];
		                var attrSets = {};
		                $.each(attrs, function(i, attr) {
		                    if (a.attr(attr)) sE.attr(attr, a.attr(attr));
		                    if (sE.attr(attr)) attrSets[attr] = sE.attr(attr)
		                });
		                $.each(elements, function() {
		                    var e = $(this);
		                    var hide = false;
		                    $.each(attrs, function(i, attrName) {
		                        if (attrSets[attrName]) {
		                            var cacheName = attrName + "-" + attrSets[attrName];
		                            if (e.attr(attrName) && !e.data(cacheName) &&
		                                e.attr(attrName) !== "all") {
		                                hide = true;
		                                return false
		                            }
		                        } else if (e.attr(attrName) && e.attr(attrName) !== "all") {
		                            hide = true;
		                            return false
		                        }
		                    });
		                    if (hide) {
		                        if (e.hasClass("active")) toHide.push(e.get(0))
		                    } else toShow.push(e.get(0))
		                });
		                requestFrame(function() {
		                    $(toHide).removeClass(options.activeClass);
		                    $(toShow).addClass(options.activeClass);
		                    a.closest(options.switchGroup).find(options.switchElem + "." + options.activeClass).removeClass(options.activeClass);
		                    a.addClass(options.activeClass)
		                });
		                e$$0.stopPropagation();
		                return false
		            });
		            if (options.automaticSwitch) {
		                var groups = {};
		                switches.each(function() {
		                    var e = $(this);
		                    $.each(options.automaticSwitchNesting, function(i, attr) {
		                        if (e.attr(attr)) {
		                            if (typeof groups[attr] == typeof undef) groups[attr] = [];
		                            groups[attr].push(e)
		                        }
		                    })
		                });
		                $.each(groups, function(n, g) {
		                    g.sort(function(a, b) {
		                        var aOrdN = typeof a.attr("data-switch-order") == typeof undef ? 0 : parseInt(a.attr("data-switch-order"), 10);
		                        var bOrdN = typeof b.attr("data-switch-order") == typeof undef ? 0 : parseInt(b.attr("data-switch-order"), 10);
		                        if (aOrdN == bOrdN) return 0;
		                        else if (aOrdN > bOrdN) return 1;
		                        else return -1
		                    })
		                });
		                var startCircle = function(groups, timer) {
		                    if (window.Scrolling && !window.Scrolling.isScrolling() || !window.Scrolling) {
		                        var circle = true;
		                        $.each(options.automaticSwitchNesting, function(i, groupName) {
		                            if (groups[groupName] && circle) circle = switchNextInGroup(groups[groupName]);
		                            else circle = false
		                        })
		                    }
		                    clearTimeout(startCircle.circleTimer);
		                    startCircle.circleTimer = setTimeout(function() {
		                        startCircle(groups)
		                    }, options.automaticSwitchDuration)
		                };
		                startCircle(groups)
		            }
		        })
		    }
		})(jQuery);


}

/* background video script */


!(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory);
  } else if (typeof exports === 'object') {
    factory(require('jquery'));
  } else {
    factory(root.jQuery);
  }
})(this, function($) {

  'use strict';

  /**
   * Name of the plugin
   * @private
   * @const
   * @type {String}
   */
  var PLUGIN_NAME = 'vide';

  /**
   * Default settings
   * @private
   * @const
   * @type {Object}
   */
  var DEFAULTS = {
    volume: 1,
    playbackRate: 1,
    muted: true,
    loop: true,
    autoplay: true,
    position: '50% 50%',
    posterType: 'detect',
    resizing: true,
    bgColor: 'transparent'
  };

  /**
   * Not implemented error message
   * @private
   * @const
   * @type {String}
   */
  var NOT_IMPLEMENTED_MSG = 'Not implemented';

  /**
   * Parse a string with options
   * @private
   * @param {String} str
   * @returns {Object|String}
   */
  function parseOptions(str) {
    var obj = {};
    var delimiterIndex;
    var option;
    var prop;
    var val;
    var arr;
    var len;
    var i;

    // Remove spaces around delimiters and split
    arr = str.replace(/\s*:\s*/g, ':').replace(/\s*,\s*/g, ',').split(',');

    // Parse a string
    for (i = 0, len = arr.length; i < len; i++) {
      option = arr[i];

      // Ignore urls and a string without colon delimiters
      if (
        option.search(/^(http|https|ftp):\/\//) !== -1 ||
        option.search(':') === -1
      ) {
        break;
      }

      delimiterIndex = option.indexOf(':');
      prop = option.substring(0, delimiterIndex);
      val = option.substring(delimiterIndex + 1);

      // If val is an empty string, make it undefined
      if (!val) {
        val = undefined;
      }

      // Convert a string value if it is like a boolean
      if (typeof val === 'string') {
        val = val === 'true' || (val === 'false' ? false : val);
      }

      // Convert a string value if it is like a number
      if (typeof val === 'string') {
        val = !isNaN(val) ? +val : val;
      }

      obj[prop] = val;
    }

    // If nothing is parsed
    if (prop == null && val == null) {
      return str;
    }

    return obj;
  }

  /**
   * Parse a position option
   * @private
   * @param {String} str
   * @returns {Object}
   */
  function parsePosition(str) {
    str = '' + str;

    // Default value is a center
    var args = str.split(/\s+/);
    var x = '50%';
    var y = '50%';
    var len;
    var arg;
    var i;

    for (i = 0, len = args.length; i < len; i++) {
      arg = args[i];

      // Convert values
      if (arg === 'left') {
        x = '0%';
      } else if (arg === 'right') {
        x = '100%';
      } else if (arg === 'top') {
        y = '0%';
      } else if (arg === 'bottom') {
        y = '100%';
      } else if (arg === 'center') {
        if (i === 0) {
          x = '50%';
        } else {
          y = '50%';
        }
      } else {
        if (i === 0) {
          x = arg;
        } else {
          y = arg;
        }
      }
    }

    return { x: x, y: y };
  }

  /**
   * Search a poster
   * @private
   * @param {String} path
   * @param {Function} callback
   */
  function findPoster(path, callback) {
    var onLoad = function() {
      callback(this.src);
    };

    //$('<img src="' + path + '.gif">').load(onLoad);
    $('<img src="' + path + '.jpg">').load(onLoad);
    //$('<img src="' + path + '.jpeg">').load(onLoad);
    //$('<img src="' + path + '.png">').load(onLoad);
  }

  /**
   * Vide constructor
   * @param {HTMLElement} element
   * @param {Object|String} path
   * @param {Object|String} options
   * @constructor
   */
  function Vide(element, path, options) {
    this.$element = $(element);

    // Parse path
    if (typeof path === 'string') {
      path = parseOptions(path);
    }

    // Parse options
    if (!options) {
      options = {};
    } else if (typeof options === 'string') {
      options = parseOptions(options);
    }

    // Remove an extension
    if (typeof path === 'string') {
      path = path.replace(/\.\w*$/, '');
    } else if (typeof path === 'object') {
      for (var i in path) {
        if (path.hasOwnProperty(i)) {
          path[i] = path[i].replace(/\.\w*$/, '');
        }
      }
    }

    this.settings = $.extend({}, DEFAULTS, options);
    this.path = path;

    // https://github.com/VodkaBears/Vide/issues/110
    try {
      this.init();
    } catch (e) {
      if (e.message !== NOT_IMPLEMENTED_MSG) {
        throw e;
      }
    }
  }

  /**
   * Initialization
   * @public
   */
  Vide.prototype.init = function() {
    var vide = this;
    var path = vide.path;
    var poster = path;
    var sources = '';
    var $element = vide.$element;
    var settings = vide.settings;
    var position = parsePosition(settings.position);
    var posterType = settings.posterType;
    var $video;
    var $wrapper;

    // Set styles of a video wrapper
    $wrapper = vide.$wrapper = $('<div>').css({
      position: 'absolute',
      'z-index': -1,
      top: 0,
      left: 0,
      bottom: 0,
      right: 0,
      overflow: 'hidden',
      '-webkit-background-size': 'cover',
      '-moz-background-size': 'cover',
      '-o-background-size': 'cover',
      'background-size': 'cover',
      'background-color': settings.bgColor,
      'background-repeat': 'no-repeat',
      'background-position': position.x + ' ' + position.y
    });

    // Get a poster path
    if (typeof path === 'object') {
      if (path.poster) {
        poster = path.poster;
      } else {
        if (path.mp4) {
          poster = path.mp4;
        } else if (path.webm) {
          poster = path.webm;
        } else if (path.ogv) {
          poster = path.ogv;
        }
      }
    }

    // Set a video poster
    if (posterType === 'detect') {
      findPoster(poster, function(url) {
        $wrapper.css('background-image', 'url(' + url + ')');
      });
    } else if (posterType !== 'none') {
      $wrapper.css('background-image', 'url(' + poster + '.' + posterType + ')');
    }

    // If a parent element has a static position, make it relative
    if ($element.css('position') === 'static') {
      $element.css('position', 'relative');
    }

    $element.prepend($wrapper);

    if (typeof path === 'object') {
      if (path.mp4) {
        sources += '<source src="' + path.mp4 + '.mp4" type="video/mp4">';
      }

      if (path.webm) {
        sources += '<source src="' + path.webm + '.webm" type="video/webm">';
      }

      if (path.ogv) {
        sources += '<source src="' + path.ogv + '.ogv" type="video/ogg">';
      }

      $video = vide.$video = $('<video>' + sources + '</video>');
    } else {
      $video = vide.$video = $('<video>' +
        '<source src="' + path + '.mp4" type="video/mp4">' +
        '<source src="' + path + '.webm" type="video/webm">' +
        '<source src="' + path + '.ogv" type="video/ogg">' +
        '</video>');
    }

    // https://github.com/VodkaBears/Vide/issues/110
    try {
      $video

        // Set video properties
        .prop({
          autoplay: settings.autoplay,
          loop: settings.loop,
          volume: settings.volume,
          muted: settings.muted,
          defaultMuted: settings.muted,
          playbackRate: settings.playbackRate,
          defaultPlaybackRate: settings.playbackRate
        });
    } catch (e) {
      throw new Error(NOT_IMPLEMENTED_MSG);
    }

    // Video alignment
    $video.css({
      margin: 'auto',
      position: 'absolute',
      'z-index': -1,
      top: position.y,
      left: position.x,
      '-webkit-transform': 'translate(-' + position.x + ', -' + position.y + ')',
      '-ms-transform': 'translate(-' + position.x + ', -' + position.y + ')',
      '-moz-transform': 'translate(-' + position.x + ', -' + position.y + ')',
      transform: 'translate(-' + position.x + ', -' + position.y + ')',

      // Disable visibility, while loading
      visibility: 'hidden',
      opacity: 0
    })

    // Resize a video, when it's loaded
    .one('canplaythrough.' + PLUGIN_NAME, function() {
      vide.resize();
    })

    // Make it visible, when it's already playing
    .one('playing.' + PLUGIN_NAME, function() {
      $video.css({
        visibility: 'visible',
        opacity: 1
      });
      $wrapper.css('background-image', 'none');
    });

    // Resize event is available only for 'window'
    // Use another code solutions to detect DOM elements resizing
    $element.on('resize.' + PLUGIN_NAME, function() {
      if (settings.resizing) {
        vide.resize();
      }
    });

    // Append a video
    $wrapper.append($video);
  };

  /**
   * Get a video element
   * @public
   * @returns {HTMLVideoElement}
   */
  Vide.prototype.getVideoObject = function() {
    return this.$video[0];
  };

  /**
   * Resize a video background
   * @public
   */
  Vide.prototype.resize = function() {
    if (!this.$video) {
      return;
    }

    var $wrapper = this.$wrapper;
    var $video = this.$video;
    var video = $video[0];

    // Get a native video size
    var videoHeight = video.videoHeight;
    var videoWidth = video.videoWidth;

    // Get a wrapper size
    var wrapperHeight = $wrapper.height();
    var wrapperWidth = $wrapper.width();

    if (wrapperWidth / videoWidth > wrapperHeight / videoHeight) {
      $video.css({

        // +2 pixels to prevent an empty space after transformation
        width: wrapperWidth + 2,
        height: 'auto'
      });
    } else {
      $video.css({
        width: 'auto',

        // +2 pixels to prevent an empty space after transformation
        height: wrapperHeight + 2
      });
    }
  };

  /**
   * Destroy a video background
   * @public
   */
  Vide.prototype.destroy = function() {
    delete $[PLUGIN_NAME].lookup[this.index];
    this.$video && this.$video.off(PLUGIN_NAME);
    this.$element.off(PLUGIN_NAME).removeData(PLUGIN_NAME);
    this.$wrapper.remove();
  };

  /**
   * Special plugin object for instances.
   * @public
   * @type {Object}
   */
  $[PLUGIN_NAME] = {
    lookup: []
  };

  /**
   * Plugin constructor
   * @param {Object|String} path
   * @param {Object|String} options
   * @returns {JQuery}
   * @constructor
   */
  $.fn[PLUGIN_NAME] = function(path, options) {
    var instance;

    this.each(function() {
      instance = $.data(this, PLUGIN_NAME);

      // Destroy the plugin instance if exists
      instance && instance.destroy();

      // Create the plugin instance
      instance = new Vide(this, path, options);
      instance.index = $[PLUGIN_NAME].lookup.push(instance) - 1;
      $.data(this, PLUGIN_NAME, instance);
    });

    return this;
  };

  $(document).ready(function() {
    var $window = $(window);

    // Window resize event listener
    $window.on('resize.' + PLUGIN_NAME, function() {
      for (var len = $[PLUGIN_NAME].lookup.length, i = 0, instance; i < len; i++) {
        instance = $[PLUGIN_NAME].lookup[i];

        if (instance && instance.settings.resizing) {
          instance.resize();
        }
      }
    });

    // https://github.com/VodkaBears/Vide/issues/68
    $window.on('unload.' + PLUGIN_NAME, function() {
      return false;
    });

    // Auto initialization
    // Add 'data-vide-bg' attribute with a path to the video without extension
    // Also you can pass options throw the 'data-vide-options' attribute
    // 'data-vide-options' must be like 'muted: false, volume: 0.5'
    $(document).find('[data-' + PLUGIN_NAME + '-bg]').each(function(i, element) {
      var $element = $(element);
      var options = $element.data(PLUGIN_NAME + '-options');
      var path = $element.data(PLUGIN_NAME + '-bg');

      $element[PLUGIN_NAME](path, options);
    });
  });

});





////////////////////////////////////////////////////



		if ( jQuery( ".down-arrow" ).length ) {

		jQuery( ".down-arrow" ).on( "click", function( event ) {
			event.preventDefault();

				var speed = 400;

						if ( jQuery( ".home-slides-section" ).length ) {

								var position = jQuery('.home-slides-section').offset().top;

		    		}

						if (!( jQuery( ".home-slides-section" ).length )) {

								var position = jQuery('.business-section-generic:eq(2)').offset().top;

						}

			jQuery('body, html').animate({scrollTop:position}, speed, 'swing');

			});
		}



		if ( jQuery( "#top-link-block" ).length ) {

		jQuery( "#top-link-block" ).on( "click", function( event ) {
			jQuery('html,body').animate({scrollTop:0},'medium');return false;

			});
		}








// function sticky_relocate() {
//     var window_top = jQuery(window).scrollTop();
//     var div_top = jQuery('.section-filter-navigation, .reviews-filter-section').offset().top;
//     if (window_top > div_top) {
//         jQuery('.section-filter-navigation, .reviews-filter-section').addClass('stick');
//     } else {
//         jQuery('.section-filter-navigation, .reviews-filter-section').removeClass('stick');
//     }
// }
//
// jQuery(function () {
//     jQuery(window).scroll(sticky_relocate);
//     sticky_relocate();
// });


/*
if ( jQuery( ".page-template-features" ).length ) {


			var x = jQuery('.features-index-lead').offset().top + 200;
			jQuery('.left-col').affix({
			   	offset: {
			   		//2773
			        top: x,
							bottom:800
			    }
			});

			jQuery('body').scrollspy({target: ".left-col", offset: jQuery('.left-col').top });


			jQuery('.right-col').affix({
			   	offset: {
			   		//2773
			        top: x,
			    }
			});

			jQuery('body').scrollspy({target: ".right-col", offset: jQuery('.right-col').top });


}
*/




if ( jQuery( ".section-filter-navigation" ).length ) {


			jQuery('.section-filter-navigation').affix({
			   	offset: {
			   		//2773
			        top: jQuery('.section-filter-navigation').offset().top,
			    }
			});

			jQuery('body').scrollspy({target: ".section-filter-navigation", offset: jQuery('.section-filter-navigation').top });

}




jQuery(document).ready(function() {

var current = '';


		if ( jQuery( ".page-template-features" ).length ) {


	jQuery(".hover-change").hover(
		function () {

				var image = jQuery(this).attr('attr-image');
				var num = jQuery(this).attr('attr-num');


				//console.log(num);
				if (current != image){
					var cont = 'img'+num;
					//console.log(image);
						jQuery('.'+cont).hide();
					jQuery('.'+cont).attr('src',image);
					jQuery('.'+cont).fadeIn(400);
				}

				current = image;

		},
		function () {


		}
	);

}

	if ( jQuery( ".vpodone" ).length ) {




			var myVar = setInterval(myTimer, 3000);

		function myTimer() {

				var video = jQuery(".vpodone").data("vide").getVideoObject();

				video && video.pause(); //or .pause()


					var video = jQuery(".vpodtwo").data("vide").getVideoObject();

					video && video.pause(); //or .pause()

				var video = jQuery(".vpodthree").data("vide").getVideoObject();

				video && video.pause(); //or .pause()



				  clearInterval(myVar);

		}




		var primary = 0;
		var secondary = 0;

		 jQuery(".vpodone").hover(
		   function () {

				 		if (primary == 0){

				 					var video = jQuery(".vpodone").data("vide").getVideoObject();

				 					video && video.play(); //or .pause()

				 			primary = 1;
				 		}

		   },
		   function () {
				 if (primary == 1){

							 var video = jQuery(".vpodone").data("vide").getVideoObject();

							 video && video.pause(); //or .pause()
							 primary = 0;

				 }
		   }
		 );


		  jQuery(".vpodtwo").hover(
		    function () {

		 		 		if (primary == 0){

		 		 					var video = jQuery(".vpodtwo").data("vide").getVideoObject();

		 		 					video && video.play(); //or .pause()

		 		 			primary = 1;
		 		 		}

		    },
		    function () {
		 		 if (primary == 1){

		 					 var video = jQuery(".vpodtwo").data("vide").getVideoObject();

		 					 video && video.pause(); //or .pause()
		 					 primary = 0;

		 		 }
		    }
		  );



			 jQuery(".vpodthree").hover(
			   function () {

					 		if (primary == 0){

					 					var video = jQuery(".vpodthree").data("vide").getVideoObject();

					 					video && video.play(); //or .pause()

					 			primary = 1;
					 		}

			   },
			   function () {
					 if (primary == 1){

								 var video = jQuery(".vpodthree").data("vide").getVideoObject();

								 video && video.pause(); //or .pause()
								 primary = 0;

					 }
			   }
			 );
	}

// play button overlay



if ( jQuery( ".video-play-overlay" ).length ) {

	jQuery( ".video-play-overlay" ).on( "click", function( event ) {
		var video = jQuery(".full-hero-section-play").data("vide").getVideoObject();
	  jQuery(".full-hero-section-play").css('background-image','');

			jQuery('.video-play-overlay').fadeOut();

			jQuery('.overlay-image').fadeOut();
		video && video.play(); //or .pause()
	});



}

if ( jQuery( ".pos-fast-bar-mode .hover-button" ).length ) {

jQuery('.pos-fast-bar-mode .hover-button').on('click', function(e){
    jQuery(this).removeClass('bobble');
		jQuery('.animate-ipad').animate({width:"473px",height:"279px"});


});

}


if ( jQuery( "#happy-hours-split-bills .hover-button" ).length ) {

jQuery('#happy-hours-split-bills .hover-button').on('click', function(e){
    jQuery(this).removeClass('bobble');
		jQuery('.ease-animate').animate({width:"400px",height:"125px"});


});

}



function onScrollInit( items, trigger ) {
  items.each( function() {
    var osElement = jQuery(this),
        osAnimationClass = osElement.attr('data-os-animation'),
        osAnimationDelay = osElement.attr('data-os-animation-delay');

        osElement.css({
          '-webkit-animation-delay':  osAnimationDelay,
          '-moz-animation-delay':     osAnimationDelay,
          'animation-delay':          osAnimationDelay
        });

        var osTrigger = ( trigger ) ? trigger : osElement;

        osTrigger.waypoint(function() {
          osElement.addClass('animated').addClass(osAnimationClass);
          },{
              triggerOnce: true,
              offset: '90%'
        });
  });
}
if(!jQuery('.home').length){
 onScrollInit( jQuery('.os-animation') );
 onScrollInit( jQuery('.staggered-animation'), jQuery('.staggered-animation-container') );
}


});









/*!
 * Modernizr v2.8.3
 * www.modernizr.com
 *
 * Copyright (c) Faruk Ates, Paul Irish, Alex Sexton
 * Available under the BSD and MIT licenses: www.modernizr.com/license/
 */

/*
 * Modernizr tests which native CSS3 and HTML5 features are available in
 * the current UA and makes the results available to you in two ways:
 * as properties on a global Modernizr object, and as classes on the
 * <html> element. This information allows you to progressively enhance
 * your pages with a granular level of control over the experience.
 *
 * Modernizr has an optional (not included) conditional resource loader
 * called Modernizr.load(), based on Yepnope.js (yepnopejs.com).
 * To get a build that includes Modernizr.load(), as well as choosing
 * which tests to include, go to www.modernizr.com/download/
 *
 * Authors        Faruk Ates, Paul Irish, Alex Sexton
 * Contributors   Ryan Seddon, Ben Alman
 */

window.Modernizr = (function( window, document, undefined ) {

    var version = '2.8.3',

    Modernizr = {},

    /*>>cssclasses*/
    // option for enabling the HTML classes to be added
    enableClasses = true,
    /*>>cssclasses*/

    docElement = document.documentElement,

    /**
     * Create our "modernizr" element that we do most feature tests on.
     */
    mod = 'modernizr',
    modElem = document.createElement(mod),
    mStyle = modElem.style,

    /**
     * Create the input element for various Web Forms feature tests.
     */
    inputElem /*>>inputelem*/ = document.createElement('input') /*>>inputelem*/ ,

    /*>>smile*/
    smile = ':)',
    /*>>smile*/

    toString = {}.toString,

    // TODO :: make the prefixes more granular
    /*>>prefixes*/
    // List of property values to set for css tests. See ticket #21
    prefixes = ' -webkit- -moz- -o- -ms- '.split(' '),
    /*>>prefixes*/

    /*>>domprefixes*/
    // Following spec is to expose vendor-specific style properties as:
    //   elem.style.WebkitBorderRadius
    // and the following would be incorrect:
    //   elem.style.webkitBorderRadius

    // Webkit ghosts their properties in lowercase but Opera & Moz do not.
    // Microsoft uses a lowercase `ms` instead of the correct `Ms` in IE8+
    //   erik.eae.net/archives/2008/03/10/21.48.10/

    // More here: github.com/Modernizr/Modernizr/issues/issue/21
    omPrefixes = 'Webkit Moz O ms',

    cssomPrefixes = omPrefixes.split(' '),

    domPrefixes = omPrefixes.toLowerCase().split(' '),
    /*>>domprefixes*/

    /*>>ns*/
    ns = {'svg': 'http://www.w3.org/2000/svg'},
    /*>>ns*/

    tests = {},
    inputs = {},
    attrs = {},

    classes = [],

    slice = classes.slice,

    featureName, // used in testing loop


    /*>>teststyles*/
    // Inject element with style element and some CSS rules
    injectElementWithStyles = function( rule, callback, nodes, testnames ) {

      var style, ret, node, docOverflow,
          div = document.createElement('div'),
          // After page load injecting a fake body doesn't work so check if body exists
          body = document.body,
          // IE6 and 7 won't return offsetWidth or offsetHeight unless it's in the body element, so we fake it.
          fakeBody = body || document.createElement('body');

      if ( parseInt(nodes, 10) ) {
          // In order not to give false positives we create a node for each test
          // This also allows the method to scale for unspecified uses
          while ( nodes-- ) {
              node = document.createElement('div');
              node.id = testnames ? testnames[nodes] : mod + (nodes + 1);
              div.appendChild(node);
          }
      }

      // <style> elements in IE6-9 are considered 'NoScope' elements and therefore will be removed
      // when injected with innerHTML. To get around this you need to prepend the 'NoScope' element
      // with a 'scoped' element, in our case the soft-hyphen entity as it won't mess with our measurements.
      // msdn.microsoft.com/en-us/library/ms533897%28VS.85%29.aspx
      // Documents served as xml will throw if using &shy; so use xml friendly encoded version. See issue #277
      style = ['&#173;','<style id="s', mod, '">', rule, '</style>'].join('');
      div.id = mod;
      // IE6 will false positive on some tests due to the style element inside the test div somehow interfering offsetHeight, so insert it into body or fakebody.
      // Opera will act all quirky when injecting elements in documentElement when page is served as xml, needs fakebody too. #270
      (body ? div : fakeBody).innerHTML += style;
      fakeBody.appendChild(div);
      if ( !body ) {
          //avoid crashing IE8, if background image is used
          fakeBody.style.background = '';
          //Safari 5.13/5.1.4 OSX stops loading if ::-webkit-scrollbar is used and scrollbars are visible
          fakeBody.style.overflow = 'hidden';
          docOverflow = docElement.style.overflow;
          docElement.style.overflow = 'hidden';
          docElement.appendChild(fakeBody);
      }

      ret = callback(div, rule);
      // If this is done after page load we don't want to remove the body so check if body exists
      if ( !body ) {
          fakeBody.parentNode.removeChild(fakeBody);
          docElement.style.overflow = docOverflow;
      } else {
          div.parentNode.removeChild(div);
      }

      return !!ret;

    },
    /*>>teststyles*/

    /*>>mq*/
    // adapted from matchMedia polyfill
    // by Scott Jehl and Paul Irish
    // gist.github.com/786768
    testMediaQuery = function( mq ) {

      var matchMedia = window.matchMedia || window.msMatchMedia;
      if ( matchMedia ) {
        return matchMedia(mq) && matchMedia(mq).matches || false;
      }

      var bool;

      injectElementWithStyles('@media ' + mq + ' { #' + mod + ' { position: absolute; } }', function( node ) {
        bool = (window.getComputedStyle ?
                  getComputedStyle(node, null) :
                  node.currentStyle)['position'] == 'absolute';
      });

      return bool;

     },
     /*>>mq*/


    /*>>hasevent*/
    //
    // isEventSupported determines if a given element supports the given event
    // kangax.github.com/iseventsupported/
    //
    // The following results are known incorrects:
    //   Modernizr.hasEvent("webkitTransitionEnd", elem) // false negative
    //   Modernizr.hasEvent("textInput") // in Webkit. github.com/Modernizr/Modernizr/issues/333
    //   ...
    isEventSupported = (function() {

      var TAGNAMES = {
        'select': 'input', 'change': 'input',
        'submit': 'form', 'reset': 'form',
        'error': 'img', 'load': 'img', 'abort': 'img'
      };

      function isEventSupported( eventName, element ) {

        element = element || document.createElement(TAGNAMES[eventName] || 'div');
        eventName = 'on' + eventName;

        // When using `setAttribute`, IE skips "unload", WebKit skips "unload" and "resize", whereas `in` "catches" those
        var isSupported = eventName in element;

        if ( !isSupported ) {
          // If it has no `setAttribute` (i.e. doesn't implement Node interface), try generic element
          if ( !element.setAttribute ) {
            element = document.createElement('div');
          }
          if ( element.setAttribute && element.removeAttribute ) {
            element.setAttribute(eventName, '');
            isSupported = is(element[eventName], 'function');

            // If property was created, "remove it" (by setting value to `undefined`)
            if ( !is(element[eventName], 'undefined') ) {
              element[eventName] = undefined;
            }
            element.removeAttribute(eventName);
          }
        }

        element = null;
        return isSupported;
      }
      return isEventSupported;
    })(),
    /*>>hasevent*/

    // TODO :: Add flag for hasownprop ? didn't last time

    // hasOwnProperty shim by kangax needed for Safari 2.0 support
    _hasOwnProperty = ({}).hasOwnProperty, hasOwnProp;

    if ( !is(_hasOwnProperty, 'undefined') && !is(_hasOwnProperty.call, 'undefined') ) {
      hasOwnProp = function (object, property) {
        return _hasOwnProperty.call(object, property);
      };
    }
    else {
      hasOwnProp = function (object, property) { /* yes, this can give false positives/negatives, but most of the time we don't care about those */
        return ((property in object) && is(object.constructor.prototype[property], 'undefined'));
      };
    }

    // Adapted from ES5-shim https://github.com/kriskowal/es5-shim/blob/master/es5-shim.js
    // es5.github.com/#x15.3.4.5

    if (!Function.prototype.bind) {
      Function.prototype.bind = function bind(that) {

        var target = this;

        if (typeof target != "function") {
            throw new TypeError();
        }

        var args = slice.call(arguments, 1),
            bound = function () {

            if (this instanceof bound) {

              var F = function(){};
              F.prototype = target.prototype;
              var self = new F();

              var result = target.apply(
                  self,
                  args.concat(slice.call(arguments))
              );
              if (Object(result) === result) {
                  return result;
              }
              return self;

            } else {

              return target.apply(
                  that,
                  args.concat(slice.call(arguments))
              );

            }

        };

        return bound;
      };
    }

    /**
     * setCss applies given styles to the Modernizr DOM node.
     */
    function setCss( str ) {
        mStyle.cssText = str;
    }

    /**
     * setCssAll extrapolates all vendor-specific css strings.
     */
    function setCssAll( str1, str2 ) {
        return setCss(prefixes.join(str1 + ';') + ( str2 || '' ));
    }

    /**
     * is returns a boolean for if typeof obj is exactly type.
     */
    function is( obj, type ) {
        return typeof obj === type;
    }

    /**
     * contains returns a boolean for if substr is found within str.
     */
    function contains( str, substr ) {
        return !!~('' + str).indexOf(substr);
    }

    /*>>testprop*/

    // testProps is a generic CSS / DOM property test.

    // In testing support for a given CSS property, it's legit to test:
    //    `elem.style[styleName] !== undefined`
    // If the property is supported it will return an empty string,
    // if unsupported it will return undefined.

    // We'll take advantage of this quick test and skip setting a style
    // on our modernizr element, but instead just testing undefined vs
    // empty string.

    // Because the testing of the CSS property names (with "-", as
    // opposed to the camelCase DOM properties) is non-portable and
    // non-standard but works in WebKit and IE (but not Gecko or Opera),
    // we explicitly reject properties with dashes so that authors
    // developing in WebKit or IE first don't end up with
    // browser-specific content by accident.

    function testProps( props, prefixed ) {
        for ( var i in props ) {
            var prop = props[i];
            if ( !contains(prop, "-") && mStyle[prop] !== undefined ) {
                return prefixed == 'pfx' ? prop : true;
            }
        }
        return false;
    }
    /*>>testprop*/

    // TODO :: add testDOMProps
    /**
     * testDOMProps is a generic DOM property test; if a browser supports
     *   a certain property, it won't return undefined for it.
     */
    function testDOMProps( props, obj, elem ) {
        for ( var i in props ) {
            var item = obj[props[i]];
            if ( item !== undefined) {

                // return the property name as a string
                if (elem === false) return props[i];

                // let's bind a function
                if (is(item, 'function')){
                  // default to autobind unless override
                  return item.bind(elem || obj);
                }

                // return the unbound function or obj or value
                return item;
            }
        }
        return false;
    }

    /*>>testallprops*/
    /**
     * testPropsAll tests a list of DOM properties we want to check against.
     *   We specify literally ALL possible (known and/or likely) properties on
     *   the element including the non-vendor prefixed one, for forward-
     *   compatibility.
     */
    function testPropsAll( prop, prefixed, elem ) {

        var ucProp  = prop.charAt(0).toUpperCase() + prop.slice(1),
            props   = (prop + ' ' + cssomPrefixes.join(ucProp + ' ') + ucProp).split(' ');

        // did they call .prefixed('boxSizing') or are we just testing a prop?
        if(is(prefixed, "string") || is(prefixed, "undefined")) {
          return testProps(props, prefixed);

        // otherwise, they called .prefixed('requestAnimationFrame', window[, elem])
        } else {
          props = (prop + ' ' + (domPrefixes).join(ucProp + ' ') + ucProp).split(' ');
          return testDOMProps(props, prefixed, elem);
        }
    }
    /*>>testallprops*/


    /**
     * Tests
     * -----
     */

    // The *new* flexbox
    // dev.w3.org/csswg/css3-flexbox

    tests['flexbox'] = function() {
      return testPropsAll('flexWrap');
    };

    // The *old* flexbox
    // www.w3.org/TR/2009/WD-css3-flexbox-20090723/

    tests['flexboxlegacy'] = function() {
        return testPropsAll('boxDirection');
    };

    // On the S60 and BB Storm, getContext exists, but always returns undefined
    // so we actually have to call getContext() to verify
    // github.com/Modernizr/Modernizr/issues/issue/97/

    tests['canvas'] = function() {
        var elem = document.createElement('canvas');
        return !!(elem.getContext && elem.getContext('2d'));
    };

    tests['canvastext'] = function() {
        return !!(Modernizr['canvas'] && is(document.createElement('canvas').getContext('2d').fillText, 'function'));
    };

    // webk.it/70117 is tracking a legit WebGL feature detect proposal

    // We do a soft detect which may false positive in order to avoid
    // an expensive context creation: bugzil.la/732441

    tests['webgl'] = function() {
        return !!window.WebGLRenderingContext;
    };

    /*
     * The Modernizr.touch test only indicates if the browser supports
     *    touch events, which does not necessarily reflect a touchscreen
     *    device, as evidenced by tablets running Windows 7 or, alas,
     *    the Palm Pre / WebOS (touch) phones.
     *
     * Additionally, Chrome (desktop) used to lie about its support on this,
     *    but that has since been rectified: crbug.com/36415
     *
     * We also test for Firefox 4 Multitouch Support.
     *
     * For more info, see: modernizr.github.com/Modernizr/touch.html
     */

    tests['touch'] = function() {
        var bool;

        if(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
          bool = true;
        } else {
          injectElementWithStyles(['@media (',prefixes.join('touch-enabled),('),mod,')','{#modernizr{top:9px;position:absolute}}'].join(''), function( node ) {
            bool = node.offsetTop === 9;
          });
        }

        return bool;
    };


    // geolocation is often considered a trivial feature detect...
    // Turns out, it's quite tricky to get right:
    //
    // Using !!navigator.geolocation does two things we don't want. It:
    //   1. Leaks memory in IE9: github.com/Modernizr/Modernizr/issues/513
    //   2. Disables page caching in WebKit: webk.it/43956
    //
    // Meanwhile, in Firefox < 8, an about:config setting could expose
    // a false positive that would throw an exception: bugzil.la/688158

    tests['geolocation'] = function() {
        return 'geolocation' in navigator;
    };


    tests['postmessage'] = function() {
      return !!window.postMessage;
    };


    // Chrome incognito mode used to throw an exception when using openDatabase
    // It doesn't anymore.
    tests['websqldatabase'] = function() {
      return !!window.openDatabase;
    };

    // Vendors had inconsistent prefixing with the experimental Indexed DB:
    // - Webkit's implementation is accessible through webkitIndexedDB
    // - Firefox shipped moz_indexedDB before FF4b9, but since then has been mozIndexedDB
    // For speed, we don't test the legacy (and beta-only) indexedDB
    tests['indexedDB'] = function() {
      return !!testPropsAll("indexedDB", window);
    };

    // documentMode logic from YUI to filter out IE8 Compat Mode
    //   which false positives.
    tests['hashchange'] = function() {
      return isEventSupported('hashchange', window) && (document.documentMode === undefined || document.documentMode > 7);
    };

    // Per 1.6:
    // This used to be Modernizr.historymanagement but the longer
    // name has been deprecated in favor of a shorter and property-matching one.
    // The old API is still available in 1.6, but as of 2.0 will throw a warning,
    // and in the first release thereafter disappear entirely.
    tests['history'] = function() {
      return !!(window.history && history.pushState);
    };

    tests['draganddrop'] = function() {
        var div = document.createElement('div');
        return ('draggable' in div) || ('ondragstart' in div && 'ondrop' in div);
    };

    // FF3.6 was EOL'ed on 4/24/12, but the ESR version of FF10
    // will be supported until FF19 (2/12/13), at which time, ESR becomes FF17.
    // FF10 still uses prefixes, so check for it until then.
    // for more ESR info, see: mozilla.org/en-US/firefox/organizations/faq/
    tests['websockets'] = function() {
        return 'WebSocket' in window || 'MozWebSocket' in window;
    };


    // css-tricks.com/rgba-browser-support/
    tests['rgba'] = function() {
        // Set an rgba() color and check the returned value

        setCss('background-color:rgba(150,255,150,.5)');

        return contains(mStyle.backgroundColor, 'rgba');
    };

    tests['hsla'] = function() {
        // Same as rgba(), in fact, browsers re-map hsla() to rgba() internally,
        //   except IE9 who retains it as hsla

        setCss('background-color:hsla(120,40%,100%,.5)');

        return contains(mStyle.backgroundColor, 'rgba') || contains(mStyle.backgroundColor, 'hsla');
    };

    tests['multiplebgs'] = function() {
        // Setting multiple images AND a color on the background shorthand property
        //  and then querying the style.background property value for the number of
        //  occurrences of "url(" is a reliable method for detecting ACTUAL support for this!

        setCss('background:url(https://),url(https://),red url(https://)');

        // If the UA supports multiple backgrounds, there should be three occurrences
        //   of the string "url(" in the return value for elemStyle.background

        return (/(url\s*\(.*?){3}/).test(mStyle.background);
    };



    // this will false positive in Opera Mini
    //   github.com/Modernizr/Modernizr/issues/396

    tests['backgroundsize'] = function() {
        return testPropsAll('backgroundSize');
    };

    tests['borderimage'] = function() {
        return testPropsAll('borderImage');
    };


    // Super comprehensive table about all the unique implementations of
    // border-radius: muddledramblings.com/table-of-css3-border-radius-compliance

    tests['borderradius'] = function() {
        return testPropsAll('borderRadius');
    };

    // WebOS unfortunately false positives on this test.
    tests['boxshadow'] = function() {
        return testPropsAll('boxShadow');
    };

    // FF3.0 will false positive on this test
    tests['textshadow'] = function() {
        return document.createElement('div').style.textShadow === '';
    };


    tests['opacity'] = function() {
        // Browsers that actually have CSS Opacity implemented have done so
        //  according to spec, which means their return values are within the
        //  range of [0.0,1.0] - including the leading zero.

        setCssAll('opacity:.55');

        // The non-literal . in this regex is intentional:
        //   German Chrome returns this value as 0,55
        // github.com/Modernizr/Modernizr/issues/#issue/59/comment/516632
        return (/^0.55$/).test(mStyle.opacity);
    };


    // Note, Android < 4 will pass this test, but can only animate
    //   a single property at a time
    //   goo.gl/v3V4Gp
    tests['cssanimations'] = function() {
        return testPropsAll('animationName');
    };


    tests['csscolumns'] = function() {
        return testPropsAll('columnCount');
    };


    tests['cssgradients'] = function() {
        /**
         * For CSS Gradients syntax, please see:
         * webkit.org/blog/175/introducing-css-gradients/
         * developer.mozilla.org/en/CSS/-moz-linear-gradient
         * developer.mozilla.org/en/CSS/-moz-radial-gradient
         * dev.w3.org/csswg/css3-images/#gradients-
         */

        var str1 = 'background-image:',
            str2 = 'gradient(linear,left top,right bottom,from(#9f9),to(white));',
            str3 = 'linear-gradient(left top,#9f9, white);';

        setCss(
             // legacy webkit syntax (FIXME: remove when syntax not in use anymore)
              (str1 + '-webkit- '.split(' ').join(str2 + str1) +
             // standard syntax             // trailing 'background-image:'
              prefixes.join(str3 + str1)).slice(0, -str1.length)
        );

        return contains(mStyle.backgroundImage, 'gradient');
    };


    tests['cssreflections'] = function() {
        return testPropsAll('boxReflect');
    };


    tests['csstransforms'] = function() {
        return !!testPropsAll('transform');
    };


    tests['csstransforms3d'] = function() {

        var ret = !!testPropsAll('perspective');

        // Webkit's 3D transforms are passed off to the browser's own graphics renderer.
        //   It works fine in Safari on Leopard and Snow Leopard, but not in Chrome in
        //   some conditions. As a result, Webkit typically recognizes the syntax but
        //   will sometimes throw a false positive, thus we must do a more thorough check:
        if ( ret && 'webkitPerspective' in docElement.style ) {

          // Webkit allows this media query to succeed only if the feature is enabled.
          // `@media (transform-3d),(-webkit-transform-3d){ ... }`
          injectElementWithStyles('@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}', function( node, rule ) {
            ret = node.offsetLeft === 9 && node.offsetHeight === 3;
          });
        }
        return ret;
    };


    tests['csstransitions'] = function() {
        return testPropsAll('transition');
    };


    /*>>fontface*/
    // @font-face detection routine by Diego Perini
    // javascript.nwbox.com/CSSSupport/

    // false positives:
    //   WebOS github.com/Modernizr/Modernizr/issues/342
    //   WP7   github.com/Modernizr/Modernizr/issues/538
    tests['fontface'] = function() {
        var bool;

        injectElementWithStyles('@font-face {font-family:"font";src:url("https://")}', function( node, rule ) {
          var style = document.getElementById('smodernizr'),
              sheet = style.sheet || style.styleSheet,
              cssText = sheet ? (sheet.cssRules && sheet.cssRules[0] ? sheet.cssRules[0].cssText : sheet.cssText || '') : '';

          bool = /src/i.test(cssText) && cssText.indexOf(rule.split(' ')[0]) === 0;
        });

        return bool;
    };
    /*>>fontface*/

    // CSS generated content detection
    tests['generatedcontent'] = function() {
        var bool;

        injectElementWithStyles(['#',mod,'{font:0/0 a}#',mod,':after{content:"',smile,'";visibility:hidden;font:3px/1 a}'].join(''), function( node ) {
          bool = node.offsetHeight >= 3;
        });

        return bool;
    };



    // These tests evaluate support of the video/audio elements, as well as
    // testing what types of content they support.
    //
    // We're using the Boolean constructor here, so that we can extend the value
    // e.g.  Modernizr.video     // true
    //       Modernizr.video.ogg // 'probably'
    //
    // Codec values from : github.com/NielsLeenheer/html5test/blob/9106a8/index.html#L845
    //                     thx to NielsLeenheer and zcorpan

    // Note: in some older browsers, "no" was a return value instead of empty string.
    //   It was live in FF3.5.0 and 3.5.1, but fixed in 3.5.2
    //   It was also live in Safari 4.0.0 - 4.0.4, but fixed in 4.0.5

    tests['video'] = function() {
        var elem = document.createElement('video'),
            bool = false;

        // IE9 Running on Windows Server SKU can cause an exception to be thrown, bug #224
        try {
            if ( bool = !!elem.canPlayType ) {
                bool      = new Boolean(bool);
                bool.ogg  = elem.canPlayType('video/ogg; codecs="theora"')      .replace(/^no$/,'');

                // Without QuickTime, this value will be `undefined`. github.com/Modernizr/Modernizr/issues/546
                bool.h264 = elem.canPlayType('video/mp4; codecs="avc1.42E01E"') .replace(/^no$/,'');

                bool.webm = elem.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,'');
            }

        } catch(e) { }

        return bool;
    };

    tests['audio'] = function() {
        var elem = document.createElement('audio'),
            bool = false;

        try {
            if ( bool = !!elem.canPlayType ) {
                bool      = new Boolean(bool);
                bool.ogg  = elem.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,'');
                bool.mp3  = elem.canPlayType('audio/mpeg;')               .replace(/^no$/,'');

                // Mimetypes accepted:
                //   developer.mozilla.org/En/Media_formats_supported_by_the_audio_and_video_elements
                //   bit.ly/iphoneoscodecs
                bool.wav  = elem.canPlayType('audio/wav; codecs="1"')     .replace(/^no$/,'');
                bool.m4a  = ( elem.canPlayType('audio/x-m4a;')            ||
                              elem.canPlayType('audio/aac;'))             .replace(/^no$/,'');
            }
        } catch(e) { }

        return bool;
    };


    // In FF4, if disabled, window.localStorage should === null.

    // Normally, we could not test that directly and need to do a
    //   `('localStorage' in window) && ` test first because otherwise Firefox will
    //   throw bugzil.la/365772 if cookies are disabled

    // Also in iOS5 Private Browsing mode, attempting to use localStorage.setItem
    // will throw the exception:
    //   QUOTA_EXCEEDED_ERRROR DOM Exception 22.
    // Peculiarly, getItem and removeItem calls do not throw.

    // Because we are forced to try/catch this, we'll go aggressive.

    // Just FWIW: IE8 Compat mode supports these features completely:
    //   www.quirksmode.org/dom/html5.html
    // But IE8 doesn't support either with local files

    tests['localstorage'] = function() {
        try {
            localStorage.setItem(mod, mod);
            localStorage.removeItem(mod);
            return true;
        } catch(e) {
            return false;
        }
    };

    tests['sessionstorage'] = function() {
        try {
            sessionStorage.setItem(mod, mod);
            sessionStorage.removeItem(mod);
            return true;
        } catch(e) {
            return false;
        }
    };


    tests['webworkers'] = function() {
        return !!window.Worker;
    };


    tests['applicationcache'] = function() {
        return !!window.applicationCache;
    };


    // Thanks to Erik Dahlstrom
    tests['svg'] = function() {
        return !!document.createElementNS && !!document.createElementNS(ns.svg, 'svg').createSVGRect;
    };

    // specifically for SVG inline in HTML, not within XHTML
    // test page: paulirish.com/demo/inline-svg
    tests['inlinesvg'] = function() {
      var div = document.createElement('div');
      div.innerHTML = '<svg/>';
      return (div.firstChild && div.firstChild.namespaceURI) == ns.svg;
    };

    // SVG SMIL animation
    tests['smil'] = function() {
        return !!document.createElementNS && /SVGAnimate/.test(toString.call(document.createElementNS(ns.svg, 'animate')));
    };

    // This test is only for clip paths in SVG proper, not clip paths on HTML content
    // demo: srufaculty.sru.edu/david.dailey/svg/newstuff/clipPath4.svg

    // However read the comments to dig into applying SVG clippaths to HTML content here:
    //   github.com/Modernizr/Modernizr/issues/213#issuecomment-1149491
    tests['svgclippaths'] = function() {
        return !!document.createElementNS && /SVGClipPath/.test(toString.call(document.createElementNS(ns.svg, 'clipPath')));
    };

    /*>>webforms*/
    // input features and input types go directly onto the ret object, bypassing the tests loop.
    // Hold this guy to execute in a moment.
    function webforms() {
        /*>>input*/
        // Run through HTML5's new input attributes to see if the UA understands any.
        // We're using f which is the <input> element created early on
        // Mike Taylr has created a comprehensive resource for testing these attributes
        //   when applied to all input types:
        //   miketaylr.com/code/input-type-attr.html
        // spec: www.whatwg.org/specs/web-apps/current-work/multipage/the-input-element.html#input-type-attr-summary

        // Only input placeholder is tested while textarea's placeholder is not.
        // Currently Safari 4 and Opera 11 have support only for the input placeholder
        // Both tests are available in feature-detects/forms-placeholder.js
        Modernizr['input'] = (function( props ) {
            for ( var i = 0, len = props.length; i < len; i++ ) {
                attrs[ props[i] ] = !!(props[i] in inputElem);
            }
            if (attrs.list){
              // safari false positive's on datalist: webk.it/74252
              // see also github.com/Modernizr/Modernizr/issues/146
              attrs.list = !!(document.createElement('datalist') && window.HTMLDataListElement);
            }
            return attrs;
        })('autocomplete autofocus list placeholder max min multiple pattern required step'.split(' '));
        /*>>input*/

        /*>>inputtypes*/
        // Run through HTML5's new input types to see if the UA understands any.
        //   This is put behind the tests runloop because it doesn't return a
        //   true/false like all the other tests; instead, it returns an object
        //   containing each input type with its corresponding true/false value

        // Big thanks to @miketaylr for the html5 forms expertise. miketaylr.com/
        Modernizr['inputtypes'] = (function(props) {

            for ( var i = 0, bool, inputElemType, defaultView, len = props.length; i < len; i++ ) {

                inputElem.setAttribute('type', inputElemType = props[i]);
                bool = inputElem.type !== 'text';

                // We first check to see if the type we give it sticks..
                // If the type does, we feed it a textual value, which shouldn't be valid.
                // If the value doesn't stick, we know there's input sanitization which infers a custom UI
                if ( bool ) {

                    inputElem.value         = smile;
                    inputElem.style.cssText = 'position:absolute;visibility:hidden;';

                    if ( /^range$/.test(inputElemType) && inputElem.style.WebkitAppearance !== undefined ) {

                      docElement.appendChild(inputElem);
                      defaultView = document.defaultView;

                      // Safari 2-4 allows the smiley as a value, despite making a slider
                      bool =  defaultView.getComputedStyle &&
                              defaultView.getComputedStyle(inputElem, null).WebkitAppearance !== 'textfield' &&
                              // Mobile android web browser has false positive, so must
                              // check the height to see if the widget is actually there.
                              (inputElem.offsetHeight !== 0);

                      docElement.removeChild(inputElem);

                    } else if ( /^(search|tel)$/.test(inputElemType) ){
                      // Spec doesn't define any special parsing or detectable UI
                      //   behaviors so we pass these through as true

                      // Interestingly, opera fails the earlier test, so it doesn't
                      //  even make it here.

                    } else if ( /^(url|email)$/.test(inputElemType) ) {
                      // Real url and email support comes with prebaked validation.
                      bool = inputElem.checkValidity && inputElem.checkValidity() === false;

                    } else {
                      // If the upgraded input compontent rejects the :) text, we got a winner
                      bool = inputElem.value != smile;
                    }
                }

                inputs[ props[i] ] = !!bool;
            }
            return inputs;
        })('search tel url email datetime date month week time datetime-local number range color'.split(' '));
        /*>>inputtypes*/
    }
    /*>>webforms*/


    // End of test definitions
    // -----------------------



    // Run through all tests and detect their support in the current UA.
    // todo: hypothetically we could be doing an array of tests and use a basic loop here.
    for ( var feature in tests ) {
        if ( hasOwnProp(tests, feature) ) {
            // run the test, throw the return value into the Modernizr,
            //   then based on that boolean, define an appropriate className
            //   and push it into an array of classes we'll join later.
            featureName  = feature.toLowerCase();
            Modernizr[featureName] = tests[feature]();

            classes.push((Modernizr[featureName] ? '' : 'no-') + featureName);
        }
    }

    /*>>webforms*/
    // input tests need to run.
    Modernizr.input || webforms();
    /*>>webforms*/


    /**
     * addTest allows the user to define their own feature tests
     * the result will be added onto the Modernizr object,
     * as well as an appropriate className set on the html element
     *
     * @param feature - String naming the feature
     * @param test - Function returning true if feature is supported, false if not
     */
     Modernizr.addTest = function ( feature, test ) {
       if ( typeof feature == 'object' ) {
         for ( var key in feature ) {
           if ( hasOwnProp( feature, key ) ) {
             Modernizr.addTest( key, feature[ key ] );
           }
         }
       } else {

         feature = feature.toLowerCase();

         if ( Modernizr[feature] !== undefined ) {
           // we're going to quit if you're trying to overwrite an existing test
           // if we were to allow it, we'd do this:
           //   var re = new RegExp("\\b(no-)?" + feature + "\\b");
           //   docElement.className = docElement.className.replace( re, '' );
           // but, no rly, stuff 'em.
           return Modernizr;
         }

         test = typeof test == 'function' ? test() : test;

         if (typeof enableClasses !== "undefined" && enableClasses) {
           docElement.className += ' ' + (test ? '' : 'no-') + feature;
         }
         Modernizr[feature] = test;

       }

       return Modernizr; // allow chaining.
     };


    // Reset modElem.cssText to nothing to reduce memory footprint.
    setCss('');
    modElem = inputElem = null;

    /*>>shiv*/
    /**
     * @preserve HTML5 Shiv prev3.7.1 | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed
     */
    ;(function(window, document) {
        /*jshint evil:true */
        /** version */
        var version = '3.7.0';

        /** Preset options */
        var options = window.html5 || {};

        /** Used to skip problem elements */
        var reSkip = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i;

        /** Not all elements can be cloned in IE **/
        var saveClones = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i;

        /** Detect whether the browser supports default html5 styles */
        var supportsHtml5Styles;

        /** Name of the expando, to work with multiple documents or to re-shiv one document */
        var expando = '_html5shiv';

        /** The id for the the documents expando */
        var expanID = 0;

        /** Cached data for each document */
        var expandoData = {};

        /** Detect whether the browser supports unknown elements */
        var supportsUnknownElements;

        (function() {
          try {
            var a = document.createElement('a');
            a.innerHTML = '<xyz></xyz>';
            //if the hidden property is implemented we can assume, that the browser supports basic HTML5 Styles
            supportsHtml5Styles = ('hidden' in a);

            supportsUnknownElements = a.childNodes.length == 1 || (function() {
              // assign a false positive if unable to shiv
              (document.createElement)('a');
              var frag = document.createDocumentFragment();
              return (
                typeof frag.cloneNode == 'undefined' ||
                typeof frag.createDocumentFragment == 'undefined' ||
                typeof frag.createElement == 'undefined'
              );
            }());
          } catch(e) {
            // assign a false positive if detection fails => unable to shiv
            supportsHtml5Styles = true;
            supportsUnknownElements = true;
          }

        }());

        /*--------------------------------------------------------------------------*/

        /**
         * Creates a style sheet with the given CSS text and adds it to the document.
         * @private
         * @param {Document} ownerDocument The document.
         * @param {String} cssText The CSS text.
         * @returns {StyleSheet} The style element.
         */
        function addStyleSheet(ownerDocument, cssText) {
          var p = ownerDocument.createElement('p'),
          parent = ownerDocument.getElementsByTagName('head')[0] || ownerDocument.documentElement;

          p.innerHTML = 'x<style>' + cssText + '</style>';
          return parent.insertBefore(p.lastChild, parent.firstChild);
        }

        /**
         * Returns the value of `html5.elements` as an array.
         * @private
         * @returns {Array} An array of shived element node names.
         */
        function getElements() {
          var elements = html5.elements;
          return typeof elements == 'string' ? elements.split(' ') : elements;
        }

        /**
         * Returns the data associated to the given document
         * @private
         * @param {Document} ownerDocument The document.
         * @returns {Object} An object of data.
         */
        function getExpandoData(ownerDocument) {
          var data = expandoData[ownerDocument[expando]];
          if (!data) {
            data = {};
            expanID++;
            ownerDocument[expando] = expanID;
            expandoData[expanID] = data;
          }
          return data;
        }

        /**
         * returns a shived element for the given nodeName and document
         * @memberOf html5
         * @param {String} nodeName name of the element
         * @param {Document} ownerDocument The context document.
         * @returns {Object} The shived element.
         */
        function createElement(nodeName, ownerDocument, data){
          if (!ownerDocument) {
            ownerDocument = document;
          }
          if(supportsUnknownElements){
            return ownerDocument.createElement(nodeName);
          }
          if (!data) {
            data = getExpandoData(ownerDocument);
          }
          var node;

          if (data.cache[nodeName]) {
            node = data.cache[nodeName].cloneNode();
          } else if (saveClones.test(nodeName)) {
            node = (data.cache[nodeName] = data.createElem(nodeName)).cloneNode();
          } else {
            node = data.createElem(nodeName);
          }

          // Avoid adding some elements to fragments in IE < 9 because
          // * Attributes like `name` or `type` cannot be set/changed once an element
          //   is inserted into a document/fragment
          // * Link elements with `src` attributes that are inaccessible, as with
          //   a 403 response, will cause the tab/window to crash
          // * Script elements appended to fragments will execute when their `src`
          //   or `text` property is set
          return node.canHaveChildren && !reSkip.test(nodeName) && !node.tagUrn ? data.frag.appendChild(node) : node;
        }

        /**
         * returns a shived DocumentFragment for the given document
         * @memberOf html5
         * @param {Document} ownerDocument The context document.
         * @returns {Object} The shived DocumentFragment.
         */
        function createDocumentFragment(ownerDocument, data){
          if (!ownerDocument) {
            ownerDocument = document;
          }
          if(supportsUnknownElements){
            return ownerDocument.createDocumentFragment();
          }
          data = data || getExpandoData(ownerDocument);
          var clone = data.frag.cloneNode(),
          i = 0,
          elems = getElements(),
          l = elems.length;
          for(;i<l;i++){
            clone.createElement(elems[i]);
          }
          return clone;
        }

        /**
         * Shivs the `createElement` and `createDocumentFragment` methods of the document.
         * @private
         * @param {Document|DocumentFragment} ownerDocument The document.
         * @param {Object} data of the document.
         */
        function shivMethods(ownerDocument, data) {
          if (!data.cache) {
            data.cache = {};
            data.createElem = ownerDocument.createElement;
            data.createFrag = ownerDocument.createDocumentFragment;
            data.frag = data.createFrag();
          }


          ownerDocument.createElement = function(nodeName) {
            //abort shiv
            if (!html5.shivMethods) {
              return data.createElem(nodeName);
            }
            return createElement(nodeName, ownerDocument, data);
          };

          ownerDocument.createDocumentFragment = Function('h,f', 'return function(){' +
                                                          'var n=f.cloneNode(),c=n.createElement;' +
                                                          'h.shivMethods&&(' +
                                                          // unroll the `createElement` calls
                                                          getElements().join().replace(/[\w\-]+/g, function(nodeName) {
            data.createElem(nodeName);
            data.frag.createElement(nodeName);
            return 'c("' + nodeName + '")';
          }) +
            ');return n}'
                                                         )(html5, data.frag);
        }

        /*--------------------------------------------------------------------------*/

        /**
         * Shivs the given document.
         * @memberOf html5
         * @param {Document} ownerDocument The document to shiv.
         * @returns {Document} The shived document.
         */
        function shivDocument(ownerDocument) {
          if (!ownerDocument) {
            ownerDocument = document;
          }
          var data = getExpandoData(ownerDocument);

          if (html5.shivCSS && !supportsHtml5Styles && !data.hasCSS) {
            data.hasCSS = !!addStyleSheet(ownerDocument,
                                          // corrects block display not defined in IE6/7/8/9
                                          'article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}' +
                                            // adds styling not present in IE6/7/8/9
                                            'mark{background:#FF0;color:#000}' +
                                            // hides non-rendered elements
                                            'template{display:none}'
                                         );
          }
          if (!supportsUnknownElements) {
            shivMethods(ownerDocument, data);
          }
          return ownerDocument;
        }

        /*--------------------------------------------------------------------------*/

        /**
         * The `html5` object is exposed so that more elements can be shived and
         * existing shiving can be detected on iframes.
         * @type Object
         * @example
         *
         * // options can be changed before the script is included
         * html5 = { 'elements': 'mark section', 'shivCSS': false, 'shivMethods': false };
         */
        var html5 = {

          /**
           * An array or space separated string of node names of the elements to shiv.
           * @memberOf html5
           * @type Array|String
           */
          'elements': options.elements || 'abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video',

          /**
           * current version of html5shiv
           */
          'version': version,

          /**
           * A flag to indicate that the HTML5 style sheet should be inserted.
           * @memberOf html5
           * @type Boolean
           */
          'shivCSS': (options.shivCSS !== false),

          /**
           * Is equal to true if a browser supports creating unknown/HTML5 elements
           * @memberOf html5
           * @type boolean
           */
          'supportsUnknownElements': supportsUnknownElements,

          /**
           * A flag to indicate that the document's `createElement` and `createDocumentFragment`
           * methods should be overwritten.
           * @memberOf html5
           * @type Boolean
           */
          'shivMethods': (options.shivMethods !== false),

          /**
           * A string to describe the type of `html5` object ("default" or "default print").
           * @memberOf html5
           * @type String
           */
          'type': 'default',

          // shivs the document according to the specified `html5` object options
          'shivDocument': shivDocument,

          //creates a shived element
          createElement: createElement,

          //creates a shived documentFragment
          createDocumentFragment: createDocumentFragment
        };

        /*--------------------------------------------------------------------------*/

        // expose html5
        window.html5 = html5;

        // shiv the document
        shivDocument(document);

    }(this, document));
    /*>>shiv*/

    // Assign private properties to the return object with prefix
    Modernizr._version      = version;

    // expose these for the plugin API. Look in the source for how to join() them against your input
    /*>>prefixes*/
    Modernizr._prefixes     = prefixes;
    /*>>prefixes*/
    /*>>domprefixes*/
    Modernizr._domPrefixes  = domPrefixes;
    Modernizr._cssomPrefixes  = cssomPrefixes;
    /*>>domprefixes*/

    /*>>mq*/
    // Modernizr.mq tests a given media query, live against the current state of the window
    // A few important notes:
    //   * If a browser does not support media queries at all (eg. oldIE) the mq() will always return false
    //   * A max-width or orientation query will be evaluated against the current state, which may change later.
    //   * You must specify values. Eg. If you are testing support for the min-width media query use:
    //       Modernizr.mq('(min-width:0)')
    // usage:
    // Modernizr.mq('only screen and (max-width:768)')
    Modernizr.mq            = testMediaQuery;
    /*>>mq*/

    /*>>hasevent*/
    // Modernizr.hasEvent() detects support for a given event, with an optional element to test on
    // Modernizr.hasEvent('gesturestart', elem)
    Modernizr.hasEvent      = isEventSupported;
    /*>>hasevent*/

    /*>>testprop*/
    // Modernizr.testProp() investigates whether a given style property is recognized
    // Note that the property names must be provided in the camelCase variant.
    // Modernizr.testProp('pointerEvents')
    Modernizr.testProp      = function(prop){
        return testProps([prop]);
    };
    /*>>testprop*/

    /*>>testallprops*/
    // Modernizr.testAllProps() investigates whether a given style property,
    //   or any of its vendor-prefixed variants, is recognized
    // Note that the property names must be provided in the camelCase variant.
    // Modernizr.testAllProps('boxSizing')
    Modernizr.testAllProps  = testPropsAll;
    /*>>testallprops*/


    /*>>teststyles*/
    // Modernizr.testStyles() allows you to add custom styles to the document and test an element afterwards
    // Modernizr.testStyles('#modernizr { position:absolute }', function(elem, rule){ ... })
    Modernizr.testStyles    = injectElementWithStyles;
    /*>>teststyles*/


    /*>>prefixed*/
    // Modernizr.prefixed() returns the prefixed or nonprefixed property name variant of your input
    // Modernizr.prefixed('boxSizing') // 'MozBoxSizing'

    // Properties must be passed as dom-style camelcase, rather than `box-sizing` hypentated style.
    // Return values will also be the camelCase variant, if you need to translate that to hypenated style use:
    //
    //     str.replace(/([A-Z])/g, function(str,m1){ return '-' + m1.toLowerCase(); }).replace(/^ms-/,'-ms-');

    // If you're trying to ascertain which transition end event to bind to, you might do something like...
    //
    //     var transEndEventNames = {
    //       'WebkitTransition' : 'webkitTransitionEnd',
    //       'MozTransition'    : 'transitionend',
    //       'OTransition'      : 'oTransitionEnd',
    //       'msTransition'     : 'MSTransitionEnd',
    //       'transition'       : 'transitionend'
    //     },
    //     transEndEventName = transEndEventNames[ Modernizr.prefixed('transition') ];

    Modernizr.prefixed      = function(prop, obj, elem){
      if(!obj) {
        return testPropsAll(prop, 'pfx');
      } else {
        // Testing DOM property e.g. Modernizr.prefixed('requestAnimationFrame', window) // 'mozRequestAnimationFrame'
        return testPropsAll(prop, obj, elem);
      }
    };
    /*>>prefixed*/


    /*>>cssclasses*/
    // Remove "no-js" class from <html> element, if it exists:
    docElement.className = docElement.className.replace(/(^|\s)no-js(\s|$)/, '$1$2') +

                            // Add the new classes to the <html> element.
                            (enableClasses ? ' js ' + classes.join(' ') : '');
    /*>>cssclasses*/

    return Modernizr;

})(this, this.document);
