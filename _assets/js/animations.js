/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {

	// necessary for ScrollMagic scripts to trigger when we arrive at that location
	var aboutHeight = document.querySelector('#aboutus').offsetHeight;
	var servicesHeight = document.querySelector('#services').offsetHeight;
	var contactHeight = document.querySelector('#contact').offsetHeight;

	/** Home Hero Logo & social links **/
	// logoTween = TweenMax.from( '.home-logo', 1, { y:100, opacity:0, ease:Power3.easeOut, delay:.5 } );

	logoTween = gsap.from('.home-logo', {
		duration: 1,
		y: 100,
		opacity: 0,
		ease: Power3.easeOut,
		delay: .5
	});
	socialTween = gsap.from('.hero__social .social__link', {
		duration: .5,
		y: 50,
		opacity: 0,
		ease: 'back.out',
		delay: .5,
		stagger: .15
	});

	/** Home About section **/
	/*
	aboutTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutLeftBracketTween.from( '#aboutLeftBracket', { duration: 2, x: '-200', opacity: 0 }, 0 )
	aboutRightBracketTween.from( '#aboutRightBracket', { duration: 2, x: '200', opacity: 0 }, 0 )
	aboutSummaaryTween.from( '#aboutus .summary', { duration: 2, y: '200', opacity: 0 }, 0 )
	aboutBuzzOneTween.from( '#aboutus .slant__buzz-word:nth-child(1)', { duration: 2, x: '100', opacity: 0 }, 0 )
	aboutBuzzTwoTween.from( '#aboutus .slant__buzz-word:nth-child(2)', { duration: 2, x: '-100', opacity: 0 }, 0 )
	aboutBuzzThreeTween.from( '#aboutus .slant__buzz-word:nth-child(3)', { duration: 2, x: '100', opacity: 0 }, 0 );
	*/
	aboutLeftBracketTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutLeftBracketTimeline.from( '#aboutLeftBracket', { duration: 2, x: '-200', opacity: 0 }, 0 )
	aboutRightBracketTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutRightBracketTimeline.from( '#aboutRightBracket', { duration: 2, x: '200', opacity: 0 }, 0 )
	aboutSummaryTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutSummaryTimeline.from( '#aboutus .summary', { duration: 2, y: '200', opacity: 0 }, 0 )
	aboutBuzzOneTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutBuzzOneTimeline.from( '#aboutus .slant__buzz-word:nth-child(1)', { duration: 2, x: '100', opacity: 0 }, 0 )
	aboutBuzzTwoTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutBuzzTwoTimeline.from( '#aboutus .slant__buzz-word:nth-child(2)', { duration: 2, x: '-100', opacity: 0 }, 0 )
	aboutBuzzThreeTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutBuzzThreeTimeline.from( '#aboutus .slant__buzz-word:nth-child(3)', { duration: 2, x: '100', opacity: 0 }, 0 );


	var controller = new ScrollMagic.Controller();
	// Initialise ScrollMagic Scene
/*
	const aboutTween = new ScrollMagic.Scene({
		triggerElement: "#aboutus",
		triggerHook: 'onCenter',
		duration: .5*aboutHeight
	})
	.setTween(aboutLeftBracketTween)
	.setTween(aboutRightBracketTween)
	.setTween(aboutSummaryTween)
	.setTween(aboutBuzzOneTween)
	.setTween(aboutBuzzTwoTween)
	.setTween(aboutBuzzThreeTween)
	.addTo(controller);
*/
	const aboutLeftBracketTween = new ScrollMagic.Scene({
		triggerElement: "#aboutus",
		triggerHook: 'onCenter',
		duration: .5*aboutHeight
	})
	.setTween(aboutLeftBracketTimeline)
	.addTo(controller);
	const aboutRightBracketTween = new ScrollMagic.Scene({
		triggerElement: "#aboutus",
		triggerHook: 'onCenter',
		duration: .5*aboutHeight
	})
	.setTween(aboutRightBracketTimeline)
	.addTo(controller);
	const aboutSummaryTween = new ScrollMagic.Scene({
		triggerElement: "#aboutus",
		triggerHook: 'onCenter',
		duration: .5*aboutHeight
	})
	.setTween(aboutSummaryTimeline)
	.addTo(controller);
	const aboutBuzzOneTween = new ScrollMagic.Scene({
		triggerElement: "#aboutus",
		triggerHook: 'onCenter',
		duration: aboutHeight
	})
	.setTween(aboutBuzzOneTimeline)
	.addTo(controller);
	const aboutBuzzTwoTween = new ScrollMagic.Scene({
		triggerElement: "#aboutus",
		triggerHook: 'onCenter',
		duration: aboutHeight
	})
	.setTween(aboutBuzzTwoTimeline)
	.addTo(controller);
	const aboutBuzzThreeTween = new ScrollMagic.Scene({
		triggerElement: "#aboutus",
		triggerHook: 'onCenter',
		duration: aboutHeight
	})
	.setTween(aboutBuzzThreeTimeline)
	.addTo(controller);







	/** Home Services section **/
	// var serviceImageTween=TweenMax.staggerFrom(selectAll(".service .service__image"),200,{x:-250,opacity:0},50),
	// 	serviceTextTween=TweenMax.staggerFrom(selectAll(".service .service__copy"),200,{x:250,opacity:0},50)

	/*
	const serviceImageTween = gsap.from( '.service .service__image', { duration: .5, x: -250, opacity: 0, stagger: .5 });
	const	serviceTextTween = gasp.from( '.service .service__copy', { duration: .5, x: 250, opacity: 0, stagger: .5 });
	*/
	/*
	const serviceTextTween = gsap.from('.service .service__copy', {
		duration: .5,
		x: 250,
		opacity: 0,
		stagger: .5
	});
	*/

	/*
	serviceImagesScene=new ScrollMagic.Scene({triggerElement:"#services",duration:.75*servicesHeight}).setTween(serviceImageTween).addTo(controller),
	serviceCopyScene=new ScrollMagic.Scene({triggerElement:"#services",duration:.75*servicesHeight}).setTween(serviceTextTween).addTo(controller),
	*/

	/*
	const serviceImageTween = new ScrollMagic.Scene({
		triggerElement: "#services",
		triggerHook: 'onCenter',
		duration: .75*servicesHeight
	})
	.setTween(serviceGsapTween)
	.addTo(controller);
	*/

}() );
