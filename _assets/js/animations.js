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
	aboutLeftBracketTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutLeftBracketTimeline.from( '#aboutLeftBracket', { duration: 2, x: '-200', opacity: 0 }, 0 );
	aboutRightBracketTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutRightBracketTimeline.from( '#aboutRightBracket', { duration: 2, x: '200', opacity: 0 }, 0 );
	aboutSummaryTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutSummaryTimeline.from( '#aboutus .summary', { duration: 2, y: '200', opacity: 0 }, 0 );
	aboutBuzzOneTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutBuzzOneTimeline.from( '#aboutus .slant__buzz-word:nth-child(1)', { duration: 2, x: '100', opacity: 0 }, 0 );
	aboutBuzzTwoTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutBuzzTwoTimeline.from( '#aboutus .slant__buzz-word:nth-child(2)', { duration: 2, x: '-100', opacity: 0 }, 0 );
	aboutBuzzThreeTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	aboutBuzzThreeTimeline.from( '#aboutus .slant__buzz-word:nth-child(3)', { duration: 2, x: '100', opacity: 0 }, 0 );

	var controller = new ScrollMagic.Controller();
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


	/** Home Testimonials section **/
	testimonialsTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	testimonialsTimeline.from( '.quotes__header', { duration: 2, y: '-250', opacity: 0 }, 0 );

	const testimonialsTween = new ScrollMagic.Scene({
		triggerElement: "#testimonials",
		triggerHook: 'onCenter',
		duration: 300
	})
	.setTween(testimonialsTimeline)
	.addTo(controller);


	/** Home Contact section **/
	// contactNoteTween=TweenMax.from(document.querySelector(".contact__content"),1,{y:100,opacity:0})
	contactTimeline = new gsap.timeline({ defaults: { duration: 2, transformOrigin: "center", ease: "ease" } });
	contactTimeline.from( '.contact__content', { duration: 1, y: 100, opacity: 0 });

	const contactTween = new ScrollMagic.Scene({
		triggerElement: "#contact",
		triggerHook: 'onCenter',
		duration: 300
	})
	.setTween(contactTimeline)
	.addTo(controller);

}() );
