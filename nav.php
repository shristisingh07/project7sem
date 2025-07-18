<?php 
	function nav(){
	?>

<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- link for chatbot3.0 starts here-->
<link rel="stylesheet" href="aichatbot3.0/style.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<script src="aichatbot3.0/script.js" defer></script>
	<!-- link for chatbot3.0 ends here-->
	<link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <title>विtaCare</title>
	
<meta name='robots' content='max-image-preview:large' />
	<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>
	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
<link rel="alternate" type="application/rss+xml" title="Mantra Site &raquo; Feed" href="https://dtmantra.wpengine.com/feed/" />
<link rel="alternate" type="application/rss+xml" title="Mantra Site &raquo; Comments Feed" href="https://dtmantra.wpengine.com/comments/feed/" />
<link rel="alternate" type="text/calendar" title="Mantra Site &raquo; iCal Feed" href="https://dtmantra.wpengine.com/events/?ical=1" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript">
/* <![CDATA[ */
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/svg\/","svgExt":".svg","source":{"wpemoji":"https:\/\/dtmantra.wpengine.com\/wp-includes\/js\/wp-emoji.js?ver=6.7.1","twemoji":"https:\/\/dtmantra.wpengine.com\/wp-includes\/js\/twemoji.js?ver=6.7.1"}};
/**
 * @output wp-includes/js/wp-emoji-loader.js
 */

/**
 * Emoji Settings as exported in PHP via _print_emoji_detection_script().
 * @typedef WPEmojiSettings
 * @type {object}
 * @property {?object} source
 * @property {?string} source.concatemoji
 * @property {?string} source.twemoji
 * @property {?string} source.wpemoji
 * @property {?boolean} DOMReady
 * @property {?Function} readyCallback
 */

/**
 * Support tests.
 * @typedef SupportTests
 * @type {object}
 * @property {?boolean} flag
 * @property {?boolean} emoji
 */

/**
 * IIFE to detect emoji support and load Twemoji if needed.
 *
 * @param {Window} window
 * @param {Document} document
 * @param {WPEmojiSettings} settings
 */
( function wpEmojiLoader( window, document, settings ) {
	if ( typeof Promise === 'undefined' ) {
		return;
	}

	var sessionStorageKey = 'wpEmojiSettingsSupports';
	var tests = [ 'flag', 'emoji' ];

	/**
	 * Checks whether the browser supports offloading to a Worker.
	 *
	 * @since 6.3.0
	 *
	 * @private
	 *
	 * @returns {boolean}
	 */
	function supportsWorkerOffloading() {
		return (
			typeof Worker !== 'undefined' &&
			typeof OffscreenCanvas !== 'undefined' &&
			typeof URL !== 'undefined' &&
			URL.createObjectURL &&
			typeof Blob !== 'undefined'
		);
	}

	/**
	 * @typedef SessionSupportTests
	 * @type {object}
	 * @property {number} timestamp
	 * @property {SupportTests} supportTests
	 */

	/**
	 * Get support tests from session.
	 *
	 * @since 6.3.0
	 *
	 * @private
	 *
	 * @returns {?SupportTests} Support tests, or null if not set or older than 1 week.
	 */
	function getSessionSupportTests() {
		try {
			/** @type {SessionSupportTests} */
			var item = JSON.parse(
				sessionStorage.getItem( sessionStorageKey )
			);
			if (
				typeof item === 'object' &&
				typeof item.timestamp === 'number' &&
				new Date().valueOf() < item.timestamp + 604800 && // Note: Number is a week in seconds.
				typeof item.supportTests === 'object'
			) {
				return item.supportTests;
			}
		} catch ( e ) {}
		return null;
	}

	/**
	 * Persist the supports in session storage.
	 *
	 * @since 6.3.0
	 *
	 * @private
	 *
	 * @param {SupportTests} supportTests Support tests.
	 */
	function setSessionSupportTests( supportTests ) {
		try {
			/** @type {SessionSupportTests} */
			var item = {
				supportTests: supportTests,
				timestamp: new Date().valueOf()
			};

			sessionStorage.setItem(
				sessionStorageKey,
				JSON.stringify( item )
			);
		} catch ( e ) {}
	}

	/**
	 * Checks if two sets of Emoji characters render the same visually.
	 *
	 * This function may be serialized to run in a Worker. Therefore, it cannot refer to variables from the containing
	 * scope. Everything must be passed by parameters.
	 *
	 * @since 4.9.0
	 *
	 * @private
	 *
	 * @param {CanvasRenderingContext2D} context 2D Context.
	 * @param {string} set1 Set of Emoji to test.
	 * @param {string} set2 Set of Emoji to test.
	 *
	 * @return {boolean} True if the two sets render the same.
	 */
	function emojiSetsRenderIdentically( context, set1, set2 ) {
		// Cleanup from previous test.
		context.clearRect( 0, 0, context.canvas.width, context.canvas.height );
		context.fillText( set1, 0, 0 );
		var rendered1 = new Uint32Array(
			context.getImageData(
				0,
				0,
				context.canvas.width,
				context.canvas.height
			).data
		);

		// Cleanup from previous test.
		context.clearRect( 0, 0, context.canvas.width, context.canvas.height );
		context.fillText( set2, 0, 0 );
		var rendered2 = new Uint32Array(
			context.getImageData(
				0,
				0,
				context.canvas.width,
				context.canvas.height
			).data
		);

		return rendered1.every( function ( rendered2Data, index ) {
			return rendered2Data === rendered2[ index ];
		} );
	}

	/**
	 * Determines if the browser properly renders Emoji that Twemoji can supplement.
	 *
	 * This function may be serialized to run in a Worker. Therefore, it cannot refer to variables from the containing
	 * scope. Everything must be passed by parameters.
	 *
	 * @since 4.2.0
	 *
	 * @private
	 *
	 * @param {CanvasRenderingContext2D} context 2D Context.
	 * @param {string} type Whether to test for support of "flag" or "emoji".
	 * @param {Function} emojiSetsRenderIdentically Reference to emojiSetsRenderIdentically function, needed due to minification.
	 *
	 * @return {boolean} True if the browser can render emoji, false if it cannot.
	 */
	function browserSupportsEmoji( context, type, emojiSetsRenderIdentically ) {
		var isIdentical;

		switch ( type ) {
			case 'flag':
				/*
				 * Test for Transgender flag compatibility. Added in Unicode 13.
				 *
				 * To test for support, we try to render it, and compare the rendering to how it would look if
				 * the browser doesn't render it correctly (white flag emoji + transgender symbol).
				 */
				isIdentical = emojiSetsRenderIdentically(
					context,
					'\uD83C\uDFF3\uFE0F\u200D\u26A7\uFE0F', // as a zero-width joiner sequence
					'\uD83C\uDFF3\uFE0F\u200B\u26A7\uFE0F' // separated by a zero-width space
				);

				if ( isIdentical ) {
					return false;
				}

				/*
				 * Test for UN flag compatibility. This is the least supported of the letter locale flags,
				 * so gives us an easy test for full support.
				 *
				 * To test for support, we try to render it, and compare the rendering to how it would look if
				 * the browser doesn't render it correctly ([U] + [N]).
				 */
				isIdentical = emojiSetsRenderIdentically(
					context,
					'\uD83C\uDDFA\uD83C\uDDF3', // as the sequence of two code points
					'\uD83C\uDDFA\u200B\uD83C\uDDF3' // as the two code points separated by a zero-width space
				);

				if ( isIdentical ) {
					return false;
				}

				/*
				 * Test for English flag compatibility. England is a country in the United Kingdom, it
				 * does not have a two letter locale code but rather a five letter sub-division code.
				 *
				 * To test for support, we try to render it, and compare the rendering to how it would look if
				 * the browser doesn't render it correctly (black flag emoji + [G] + [B] + [E] + [N] + [G]).
				 */
				isIdentical = emojiSetsRenderIdentically(
					context,
					// as the flag sequence
					'\uD83C\uDFF4\uDB40\uDC67\uDB40\uDC62\uDB40\uDC65\uDB40\uDC6E\uDB40\uDC67\uDB40\uDC7F',
					// with each code point separated by a zero-width space
					'\uD83C\uDFF4\u200B\uDB40\uDC67\u200B\uDB40\uDC62\u200B\uDB40\uDC65\u200B\uDB40\uDC6E\u200B\uDB40\uDC67\u200B\uDB40\uDC7F'
				);

				return ! isIdentical;
			case 'emoji':
				/*
				 * Four and twenty blackbirds baked in a pie.
				 *
				 * To test for Emoji 15.0 support, try to render a new emoji: Blackbird.
				 *
				 * The Blackbird is a ZWJ sequence combining 🐦 Bird and ⬛ large black square.,
				 *
				 * 0x1F426 (\uD83D\uDC26) == Bird
				 * 0x200D == Zero-Width Joiner (ZWJ) that links the code points for the new emoji or
				 * 0x200B == Zero-Width Space (ZWS) that is rendered for clients not supporting the new emoji.
				 * 0x2B1B == Large Black Square
				 *
				 * When updating this test for future Emoji releases, ensure that individual emoji that make up the
				 * sequence come from older emoji standards.
				 */
				isIdentical = emojiSetsRenderIdentically(
					context,
					'\uD83D\uDC26\u200D\u2B1B', // as the zero-width joiner sequence
					'\uD83D\uDC26\u200B\u2B1B' // separated by a zero-width space
				);

				return ! isIdentical;
		}

		return false;
	}

	/**
	 * Checks emoji support tests.
	 *
	 * This function may be serialized to run in a Worker. Therefore, it cannot refer to variables from the containing
	 * scope. Everything must be passed by parameters.
	 *
	 * @since 6.3.0
	 *
	 * @private
	 *
	 * @param {string[]} tests Tests.
	 * @param {Function} browserSupportsEmoji Reference to browserSupportsEmoji function, needed due to minification.
	 * @param {Function} emojiSetsRenderIdentically Reference to emojiSetsRenderIdentically function, needed due to minification.
	 *
	 * @return {SupportTests} Support tests.
	 */
	function testEmojiSupports( tests, browserSupportsEmoji, emojiSetsRenderIdentically ) {
		var canvas;
		if (
			typeof WorkerGlobalScope !== 'undefined' &&
			self instanceof WorkerGlobalScope
		) {
			canvas = new OffscreenCanvas( 300, 150 ); // Dimensions are default for HTMLCanvasElement.
		} else {
			canvas = document.createElement( 'canvas' );
		}

		var context = canvas.getContext( '2d', { willReadFrequently: true } );

		/*
		 * Chrome on OS X added native emoji rendering in M41. Unfortunately,
		 * it doesn't work when the font is bolder than 500 weight. So, we
		 * check for bold rendering support to avoid invisible emoji in Chrome.
		 */
		context.textBaseline = 'top';
		context.font = '600 32px Arial';

		var supports = {};
		tests.forEach( function ( test ) {
			supports[ test ] = browserSupportsEmoji( context, test, emojiSetsRenderIdentically );
		} );
		return supports;
	}

	/**
	 * Adds a script to the head of the document.
	 *
	 * @ignore
	 *
	 * @since 4.2.0
	 *
	 * @param {string} src The url where the script is located.
	 *
	 * @return {void}
	 */
	function addScript( src ) {
		var script = document.createElement( 'script' );
		script.src = src;
		script.defer = true;
		document.head.appendChild( script );
	}

	settings.supports = {
		everything: true,
		everythingExceptFlag: true
	};

	// Create a promise for DOMContentLoaded since the worker logic may finish after the event has fired.
	var domReadyPromise = new Promise( function ( resolve ) {
		document.addEventListener( 'DOMContentLoaded', resolve, {
			once: true
		} );
	} );

	// Obtain the emoji support from the browser, asynchronously when possible.
	new Promise( function ( resolve ) {
		var supportTests = getSessionSupportTests();
		if ( supportTests ) {
			resolve( supportTests );
			return;
		}

		if ( supportsWorkerOffloading() ) {
			try {
				// Note that the functions are being passed as arguments due to minification.
				var workerScript =
					'postMessage(' +
					testEmojiSupports.toString() +
					'(' +
					[
						JSON.stringify( tests ),
						browserSupportsEmoji.toString(),
						emojiSetsRenderIdentically.toString()
					].join( ',' ) +
					'));';
				var blob = new Blob( [ workerScript ], {
					type: 'text/javascript'
				} );
				var worker = new Worker( URL.createObjectURL( blob ), { name: 'wpTestEmojiSupports' } );
				worker.onmessage = function ( event ) {
					supportTests = event.data;
					setSessionSupportTests( supportTests );
					worker.terminate();
					resolve( supportTests );
				};
				return;
			} catch ( e ) {}
		}

		supportTests = testEmojiSupports( tests, browserSupportsEmoji, emojiSetsRenderIdentically );
		setSessionSupportTests( supportTests );
		resolve( supportTests );
	} )
		// Once the browser emoji support has been obtained from the session, finalize the settings.
		.then( function ( supportTests ) {
			/*
			 * Tests the browser support for flag emojis and other emojis, and adjusts the
			 * support settings accordingly.
			 */
			for ( var test in supportTests ) {
				settings.supports[ test ] = supportTests[ test ];

				settings.supports.everything =
					settings.supports.everything && settings.supports[ test ];

				if ( 'flag' !== test ) {
					settings.supports.everythingExceptFlag =
						settings.supports.everythingExceptFlag &&
						settings.supports[ test ];
				}
			}

			settings.supports.everythingExceptFlag =
				settings.supports.everythingExceptFlag &&
				! settings.supports.flag;

			// Sets DOMReady to false and assigns a ready function to settings.
			settings.DOMReady = false;
			settings.readyCallback = function () {
				settings.DOMReady = true;
			};
		} )
		.then( function () {
			return domReadyPromise;
		} )
		.then( function () {
			// When the browser can not render everything we need to load a polyfill.
			if ( ! settings.supports.everything ) {
				settings.readyCallback();

				var src = settings.source || {};

				if ( src.concatemoji ) {
					addScript( src.concatemoji );
				} else if ( src.wpemoji && src.twemoji ) {
					addScript( src.twemoji );
					addScript( src.wpemoji );
				}
			}
		} );
} )( window, document, window._wpemojiSettings );

/* ]]> */
</script>
<style id='wp-emoji-styles-inline-css' type='text/css'>

	img.wp-smiley, img.emoji {
		display: inline !important;
		border: none !important;
		box-shadow: none !important;
		height: 1em !important;
		width: 1em !important;
		margin: 0 0.07em !important;
		vertical-align: -0.1em !important;
		background: none !important;
		padding: 0 !important;
	}
</style>
<style id='classic-theme-styles-inline-css' type='text/css'>
/**
 * These rules are needed for backwards compatibility.
 * They should match the button element rules in the base theme.json file.
 */
.wp-block-button__link {
	color: #ffffff;
	background-color: #32373c;
	border-radius: 9999px; /* 100% causes an oval, but any explicit but really high value retains the pill shape. */

	/* This needs a low specificity so it won't override the rules from the button element if defined in theme.json. */
	box-shadow: none;
	text-decoration: none;

	/* The extra 2px are added to size solids the same as the outline versions.*/
	padding: calc(0.667em + 2px) calc(1.333em + 2px);

	font-size: 1.125em;
}

.wp-block-file__button {
	background: #32373c;
	color: #ffffff;
	text-decoration: none;
}

</style>
<style id='global-styles-inline-css' type='text/css'>
:root{--wp--preset--aspect-ratio--square: 1;--wp--preset--aspect-ratio--4-3: 4/3;--wp--preset--aspect-ratio--3-4: 3/4;--wp--preset--aspect-ratio--3-2: 3/2;--wp--preset--aspect-ratio--2-3: 2/3;--wp--preset--aspect-ratio--16-9: 16/9;--wp--preset--aspect-ratio--9-16: 9/16;--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--color--primary: #C1A78C;--wp--preset--color--secondary: #D4CBC2;--wp--preset--color--tertiary: #e9e4de;--wp--preset--color--body-bg: #f3f3f3;--wp--preset--color--body-text: #232323;--wp--preset--color--alternate: #27282C;--wp--preset--color--transparent: rgba(0,0,0,0);--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);}:where(.is-layout-flex){gap: 0.5em;}:where(.is-layout-grid){gap: 0.5em;}body .is-layout-flex{display: flex;}.is-layout-flex{flex-wrap: wrap;align-items: center;}.is-layout-flex > :is(*, div){margin: 0;}body .is-layout-grid{display: grid;}.is-layout-grid > :is(*, div){margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}:where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
:where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}
:where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}
:root :where(.wp-block-pullquote){font-size: 1.5em;line-height: 1.6;}
</style>
<link rel='stylesheet' id='contact-form-7-css' href='https://dtmantra.wpengine.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.9.4' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-plus-elementor-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/elementor/assets/css/elementor.css?ver=1.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-plus-common-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/assets/css/common.css?ver=1.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-pro-widget-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-pro/assets/css/widget.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-elementor-addon-core-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/assets/css/core.css?ver=1.0.0' type='text/css' media='all' />
<style id='wdt-elementor-addon-core-inline-css' type='text/css'>
:root {
--wdt-elementor-color-primary: #27282C;
--wdt-elementor-color-primary-rgb: 39,40,44;
--wdt-elementor-color-secondary: #D4CBC2;
--wdt-elementor-color-secondary-rgb: 212,203,194;
--wdt-elementor-color-text: #232323;
--wdt-elementor-color-text-rgb: 35,35,35;
--wdt-elementor-color-accent: #C1A78C;
--wdt-elementor-color-accent-rgb: 193,167,140;
--wdt-elementor-color-custom-1: #D4CBC2;
--wdt-elementor-color-custom-1-rgb: 212,203,194;
--wdt-elementor-color-custom-2: #E9E4DE;
--wdt-elementor-color-custom-2-rgb: 233,228,222;
--wdt-elementor-color-custom-3: #000000;
--wdt-elementor-color-custom-3-rgb: 0,0,0;
--wdt-elementor-color-custom-4: #FFFFFF;
--wdt-elementor-color-custom-4-rgb: 255,255,255;
--wdt-elementor-typo-primary-font-family: Elsie;
--wdt-elementor-typo-primary-font-weight: 400;
--wdt-elementor-typo-secondary-font-family: Elsie;
--wdt-elementor-typo-secondary-font-weight: 400;
--wdt-elementor-typo-text-font-family: Poppins;
--wdt-elementor-typo-text-font-weight: 400;
--wdt-elementor-typo-accent-font-family: Poppins;
--wdt-elementor-typo-accent-font-weight: 400;
}
</style>
<link rel='stylesheet' id='wcs-timetable-css' href='https://dtmantra.wpengine.com/wp-content/plugins/weekly-class/assets/front/css/timetable.css?ver=2.3.1' type='text/css' media='all' />
<style id='wcs-timetable-inline-css' type='text/css'>
.wcs-single__action .wcs-btn--action{color:rgba( 255,255,255,1);background-color:#BD322C}
</style>
<link rel='stylesheet' id='woocommerce-layout-css' href='https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=8.8.5' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-smallscreen-css' href='https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=8.8.5' type='text/css' media='only screen and (max-width: 768px)' />
<link rel='stylesheet' id='woocommerce-general-css' href='https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=8.8.5' type='text/css' media='all' />
<style id='woocommerce-inline-inline-css' type='text/css'>
.woocommerce form .form-row .required { visibility: visible; }
</style>
<link rel='stylesheet' id='tribe-events-v2-single-skeleton-css' href='https://dtmantra.wpengine.com/wp-content/plugins/the-events-calendar/src/resources/css/tribe-events-single-skeleton.min.css?ver=6.6.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='tribe-events-v2-single-skeleton-full-css' href='https://dtmantra.wpengine.com/wp-content/plugins/the-events-calendar/src/resources/css/tribe-events-single-full.min.css?ver=6.6.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='tec-events-elementor-widgets-base-styles-css' href='https://dtmantra.wpengine.com/wp-content/plugins/the-events-calendar/src/resources/css/integrations/plugins/elementor/widgets/widget-base.min.css?ver=6.6.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='woo-variation-swatches-css' href='https://dtmantra.wpengine.com/wp-content/plugins/woo-variation-swatches/assets/css/frontend.css?ver=1731774844' type='text/css' media='all' />
<style id='woo-variation-swatches-inline-css' type='text/css'>
:root {
--wvs-tick:url("data:image/svg+xml;utf8,%3Csvg filter='drop-shadow(0px 0px 2px rgb(0 0 0 / .8))' xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 30 30'%3E%3Cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='M4 16L11 23 27 7'/%3E%3C/svg%3E");

--wvs-cross:url("data:image/svg+xml;utf8,%3Csvg filter='drop-shadow(0px 0px 5px rgb(255 255 255 / .6))' xmlns='http://www.w3.org/2000/svg' width='72px' height='72px' viewBox='0 0 24 24'%3E%3Cpath fill='none' stroke='%23ff0000' stroke-linecap='round' stroke-width='0.6' d='M5 5L19 19M19 5L5 19'/%3E%3C/svg%3E");
--wvs-single-product-item-width:30px;
--wvs-single-product-item-height:30px;
--wvs-single-product-item-font-size:16px}
</style>
<link rel='preload' as='font' type='font/woff2' crossorigin='anonymous' id='tinvwl-webfont-font-css' href='https://dtmantra.wpengine.com/wp-content/plugins/ti-woocommerce-wishlist/assets/fonts/tinvwl-webfont.woff2?ver=xu2uyi'  media='all' />
<link rel='stylesheet' id='tinvwl-webfont-css' href='https://dtmantra.wpengine.com/wp-content/plugins/ti-woocommerce-wishlist/assets/css/webfont.min.css?ver=2.8.2' type='text/css' media='all' />
<link rel='stylesheet' id='tinvwl-css' href='https://dtmantra.wpengine.com/wp-content/plugins/ti-woocommerce-wishlist/assets/css/public.min.css?ver=2.8.2' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/custom-frontend.css?ver=1715262857' type='text/css' media='all' />
<link rel='stylesheet' id='swiper-css' href='https://dtmantra.wpengine.com/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.css?ver=8.4.5' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-14-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-14.css?ver=1715262857' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-global-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/global.css?ver=1715262859' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-67-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-67.css?ver=1715263083' type='text/css' media='all' />
<link rel='stylesheet' id='3e8b843af0bebae364a71f81135dcf5f-css' href='//fonts.googleapis.com/css?family=Elsie:900,400&#038;subset=latin-ext' type='text/css' media='all' />
<link rel='stylesheet' id='cee6dd4e1215ddf681a2ace6dad68391-css' href='//fonts.googleapis.com/css?family=Poppins:+100,100italic,200,200italic,300,300italic,regular,italic,+500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&#038;subset=latin-ext' type='text/css' media='all' />
<link rel='stylesheet' id='4de3aa1138d41cb03c7d9d3ddd37d9a4-css' href='//fonts.googleapis.com/css?family=Syne:400,500,600,700,800&#038;subset=latin-ext' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/style.css?ver=1.0.3' type='text/css' media='all' />
<style id='mantras-inline-css' type='text/css'>
:root {--wdtPrimaryColor:#c1a78c;--wdtPrimaryColorRgb:193,167,140;--wdtSecondaryColor:#d4cbc2;--wdtSecondaryColorRgb:212,203,194;--wdtTertiaryColor:#e9e4de;--wdtTertiaryColorRgb:233,228,222;--wdtBodyBGColor:#f3f3f3;--wdtBodyBGColorRgb:243,243,243;--wdtBodyTxtColor:#232323;--wdtBodyTxtColorRgb:35,35,35;--wdtHeadAltColor:#27282c;--wdtHeadAltColorRgb:39,40,44;--wdtLinkColor:#27282c;--wdtLinkColorRgb:39,40,44;--wdtLinkHoverColor:#9d7e5e;--wdtLinkHoverColorRgb:157,126,94;--wdtBorderColor:#000000;--wdtBorderColorRgb:0,0,0;--wdtAccentTxtColor:#ffffff;--wdtAccentTxtColorRgb:255,255,255;--wdtFontTypo_Base: 'Poppins', sans-serif;--wdtFontWeight_Base: 400;--wdtFontSize_Base: 16px;--wdtLineHeight_Base: 1.85;--wdtFontTypo_Alt: 'Elsie', display;--wdtFontWeight_Alt: 400;--wdtFontSize_Alt: 70px;--wdtLineHeight_Alt: 1.16;--wdtFontTypo_H1: 'Elsie', display;--wdtFontWeight_H1: 400;--wdtFontSize_H1: 70px;--wdtLineHeight_H1: 1.16;--wdtFontTypo_H2: 'Elsie', display;--wdtFontWeight_H2: 400;--wdtFontSize_H2: 64px;--wdtLineHeight_H2: 1.16;--wdtFontTypo_H3: 'Elsie', display;--wdtFontWeight_H3: 400;--wdtFontSize_H3: 48px;--wdtLineHeight_H3: 1.16;--wdtFontTypo_H4: 'Elsie', display;--wdtFontWeight_H4: 400;--wdtFontSize_H4: 36px;--wdtLineHeight_H4: 1.16;--wdtFontTypo_H5: 'Elsie', display;--wdtFontWeight_H5: 400;--wdtFontSize_H5: 24px;--wdtLineHeight_H5: 1.16;--wdtFontTypo_H6: 'Elsie', display;--wdtFontWeight_H6: 400;--wdtFontSize_H6: 20px;--wdtLineHeight_H6: 1.16;--wdtFontTypo_Ext: "Poppins", sans-serif;--wdtFontWeight_Ext: 500;--wdtFontSize_Ext: 14px;--wdtLineHeight_Ext: 1.5;}
</style>
<link rel='stylesheet' id='mantras-icons-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/css/icons.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-base-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/css/base.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-grid-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/css/grid.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-layout-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/css/layout.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-widget-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/css/widget.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-additional-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/css/additional.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='site-breadcrumb-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/breadcrumb/assets/css/breadcrumb.css?ver=6.7.1' type='text/css' media='all' />
<link rel='stylesheet' id='site-header-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/header/assets/css/header.css?ver=6.7.1' type='text/css' media='all' />
<link rel='stylesheet' id='site-loader-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/site-loader/layouts/loader-1/assets/css/loader-1.css?ver=1.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='site-to-top-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/site-to-top/assets/css/totop.css?ver=1.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='site-sidebar-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-pro/modules/sidebar/assets/css/sidebar.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-blog-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/blog/assets/css/blog.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-blog-archive-simple-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/blog/templates/simple/assets/css/blog-archive-simple.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-bxslider-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/blog/assets/css/jquery.bxslider.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-breadcrumb-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/breadcrumb/assets/css/breadcrumb.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-comments-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/comments/assets/css/comments.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-footer-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/footer/assets/css/footer.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-header-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/header/assets/css/header.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-pagination-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/pagination/assets/css/pagination.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-magnific-popup-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/post/assets/css/magnific-popup.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-quick-search-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/search/assets/css/search.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-secondary-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/sidebar/assets/css/sidebar.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-woo-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/woocommerce/assets/css/default.css?ver=1.0.3' type='text/css' media='all' />
<style id='mantras-woo-cart-notification-inline-css' type='text/css'>



/*--------------------------------------------------------------*/
    /* #region - Add-to-Cart Notification Widget */
/*--------------------------------------------------------------*/

    .wdt-shop-cart-widget.cart-notification-widget, .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-inner,
    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content { float: left; width: 100%; }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button { font-size: 0; height: 25px; line-height: 0; position: absolute; right: 3px; top: 3px; text-align: center; width: 25px; -webkit-border-radius: 50%; border-radius: 50%; }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button:before { content: "\2716"; display: block; font-size: 14px; font-weight: normal; line-height: 25px; }

    .wdt-shop-cart-widget.cart-notification-widget { max-width: 500px; position: fixed; bottom: 32px; left: 18px; width: auto; z-index: 999; -webkit-transition: var(--wdtBaseTransition); transition: var(--wdtBaseTransition); }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-inner { padding: 20px; }
    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content > * { display: table-cell; vertical-align: middle; }
    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-thumb { line-height: 0; padding: 0 10px; width: 120px; }
    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-info { padding: 5px 10px; text-align: left; }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-thumb a,
    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-thumb a img { display: block; width: 100%; }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-info a { display: block; font-size: 18px; font-weight: bold; }

    .wdt-shop-cart-widget.cart-notification-widget { opacity: 0; visibility: hidden; }
    .wdt-shop-cart-widget.cart-notification-widget.wdt-shop-cart-widget-active { opacity: 1; visibility: visible; }


    .wdt-shop-cart-widget.cart-notification-widget { background-color: var(--wdtBodyBGColor); }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button:before { color: var(--wdtAccentTxtColor); }

    .wdt-shop-cart-widget.cart-notification-widget { -webkit-box-shadow: 0 1px 3px 1px rgba(var(--wdtHeadAltColorRgb),0.25); box-shadow: 0 1px 3px 1px rgba(var(--wdtHeadAltColorRgb),0.25); }

/* #endregion - Add-to-Cart Notification Widget */



/*--------------------------------------------------------------*/
    /* #region - Add-to-Cart Sidebar Widget */
/*--------------------------------------------------------------*/

    .wdt-shop-cart-widget.activate-sidebar-widget { height: 100%; position: fixed; right: 0; top: 0; width: 350px; z-index: 999992; -webkit-transform: translateX(100%); transform: translateX(100%); -webkit-transition: var(--wdtBaseTransition); transition: var(--wdtBaseTransition); }

    .wdt-shop-cart-widget.activate-sidebar-widget:before { content: ""; }

    .wdt-shop-cart-widget.activate-sidebar-widget.wdt-shop-cart-widget-active { -webkit-transform: translateX(0); transform: translateX(0); }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-inner { height: 100%; padding: 45px 0 120px; position: relative; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header { border-width: 0 0 1px; padding-left: 15px; padding-right: 45px; position: absolute; left: 0; top: 0; width: 100%; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 { font-size: 15px; font-weight: bold; line-height: 45px; margin: 0; text-transform: uppercase; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 span, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header a { height: 45px; position: absolute; top: 0; text-align: center; width: 45px; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 span { font-size: 18px; right: 0; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a { font-size: 0; line-height: 0; margin-right: 1px; overflow: hidden; right: 100%; text-indent: -9999px; -webkit-transform: translateX(100%); transform: translateX(100%); }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a:before { content: "\2716"; display: block; font-size: 15px; font-weight: normal; line-height: 45px; text-indent: 0; }

    .wdt-shop-cart-widget[class*="sidebar"].activate-sidebar-widget:hover .wdt-shop-cart-widget-header h3 a { -webkit-transform: translateX(0); transform: translateX(0); }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content { float: left; width: 100%; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-inner,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li { float: left; width: 100%; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .total { padding: 0 15px; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li { border-width: 1px 0; display: inline; margin: -1px 0 0 !important; padding: 15px 25px 15px 50px; position: relative; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li:first-child { border-top-width: 0; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li:last-child { border-bottom-width: 0; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a:not(.remove) { font-weight: 600; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a img { margin: auto; position: absolute; left: 0; top: 16px; width: 40px; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove { font-size: 16px; height: 20px; line-height: 20px; margin: auto; position: absolute; bottom: 0; left: auto; right: 0; top: 0 !important; text-align: center; width: 20px; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove:not(:focus) { text-decoration: none; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li:before { content: none !important; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li .quantity { display: table; margin: 0; font-size: 14px; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer { position: absolute; bottom: 0; left: 0; width: 100%; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer::before { content: ""; height: 1px; position: absolute; left: 0; right: 0; top: 0; width: auto; z-index: -1; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p { height: 50px; line-height: 50px; margin: 0; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.total { padding: 0 15px; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.total strong { float: left; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.total .amount { float: right; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons { display: flex; grid-gap: 1px; }
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons a { height: 100%; line-height: inherit; margin: 0; padding-top: 0; padding-bottom: 0; text-align: center; width: 50%; -webkit-border-radius: 0; border-radius: 0; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart__empty-message { margin: 0; padding: 15px; }

    .wdt-shop-cart-widget-overlay { background-color: rgba(var(--wdtHeadAltColorRgb),0.7); height: 100%; position: fixed; top: 0; left: 0; width: 100%; z-index: 999991; -webkit-transition: opacity .25s ease, visibility 0s ease .25s; transition: opacity .25s ease, visibility 0s ease .25s; }


    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header a, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li { border-style: solid;  }


    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove, .wdt-shop-cart-widget-overlay { opacity: 0; visibility: hidden; }

    .wdt-shop-cart-widget[class*="sidebar"].activate-sidebar-widget:hover .wdt-shop-cart-widget-header h3 a,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li:hover a.remove,
    .wdt-shop-cart-widget.activate-sidebar-widget.wdt-shop-cart-widget-active + .wdt-shop-cart-widget-overlay { opacity: 1; visibility: visible; }


    /* Default Color - Colors */
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a:not(.remove):not(:hover),
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.total .amount { color: var(--wdtHeadAltColor); }


    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a:hover { color: var(--wdtAccentTxtColor); }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove { color: var(--wdtAccentTxtColor) !important; }


    /* Default Color - Borders */
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer::before { -webkit-box-shadow: 0 2px 6px 0 rgba(var(--wdtHeadAltColorRgb),0.5); box-shadow: 0 2px 6px 0 rgba(var(--wdtHeadAltColorRgb),0.5); }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header a, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li { border-color: rgba(var(--wdtHeadAltColorRgb),0.075); }


    /* Default Color - BG */
    .wdt-shop-cart-widget.activate-sidebar-widget { background-color: #f7f7f7; }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer { background-color: var(--wdtBodyBGColor); }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons a.checkout, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove,

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons a:not(.checkout),

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a, .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .woocommerce-mini-cart-footer p.buttons a:hover, .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button { background-color: var(--wdtHeadAltColor); }

    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 span { background-color: rgba(var(--wdtBodyBGColorRgb),0.15); }

    .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-close-button:hover,
    .wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-content .product_list_widget li a.remove:hover { background-color: #9f2124; }


    /* #endregion - Add-to-Cart Sidebar Widget */


/*--------------------------------------------------------------*/
    /* #region - Responsive */
/*--------------------------------------------------------------*/

    /*----*****---- << Mobile (Landscape) >> ----*****----*/

    /* Common Styles for the devices below 767px width */
    @media only screen and (max-width: 767px) {

        .wdt-shop-cart-widget.cart-notification-widget { margin: auto; bottom: 5px; left: 0; right: 0; }

    }


    /* Note: Design for a width of 480px */
    @media only screen and (min-width: 480px) and (max-width: 767px) {

        .wdt-shop-cart-widget.cart-notification-widget { max-width: 420px; }

    }

    /* Common Styles for the devices below 479px width */
    @media only screen and (max-width: 479px) {

        .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content > * { display: table; margin: auto; text-align: center !important; }

        .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-info { font-size: 11px; }
        .wdt-shop-cart-widget.cart-notification-widget .wdt-shop-cart-widget-content-info a { font-size: 13px; }


		.wdt-shop-cart-widget[class*="sidebar"] .wdt-shop-cart-widget-header h3 a { right: 0; -webkit-border-radius: 50%; border-radius: 50%; -webkit-transform: scale(0); transform: scale(0); }

		.wdt-shop-cart-widget[class*="sidebar"].activate-sidebar-widget:hover .wdt-shop-cart-widget-header h3 a { -webkit-border-radius: 0; border-radius: 0; -webkit-transform: scale(1); transform: scale(1); }

    }

    /*----*****---- << Mobile >> ----*****----*/

    /* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
    @media only screen and (min-width: 320px) and (max-width: 479px) {

        .wdt-shop-cart-widget.cart-notification-widget { max-width: 290px; }


		.wdt-shop-cart-widget.activate-sidebar-widget { max-width: 290px; }
		.wdt-shop-cart-widget.activate-sidebar-widget { width: 290px; }

    }


/* #endregion - Responsive */

</style>
<link rel='stylesheet' id='mantras-plus-blog-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/blog/assets/css/blog.css?ver=1.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='dtplugin-nav-menu-animations-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/menu/assets/css/nav-menu-animations.css?ver=1.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='dtplugin-nav-menu-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/menu/assets/css/nav-menu.css?ver=1.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-pro-advance-field-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-pro/modules/advance-field/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-pro-blog-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-pro/modules/blog/assets/css/blog.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-pro-auth-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-pro/modules/auth/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-select2-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/lib/select2/select2.css?ver=1.0.3' type='text/css' media='all' />
<link rel='stylesheet' id='mantras-theme-css' href='https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/css/theme.css?ver=1.0.3' type='text/css' media='all' />
<style id='mantras-admin-inline-css' type='text/css'>
.loader1 { background-color:var( --wdtBodyBGColor );}body { font-family: 'Poppins', sans-serif;font-weight:400;font-size:16px;line-height:1.85;color:#232323; } 
a { color:#27282c;}
a:hover { color:#9d7e5e;}
h1 { font-family: 'Elsie', display;font-weight:400;font-size:70px;line-height:1.16; } 
h2 { font-family: 'Elsie', display;font-weight:400;font-size:64px;line-height:1.16; } 
h3 { font-family: 'Elsie', display;font-weight:400;font-size:48px;line-height:1.16; } 
h4 { font-family: 'Elsie', display;font-weight:400;font-size:36px;line-height:1.16; } 
h5 { font-family: 'Elsie', display;font-weight:400;font-size:24px;line-height:1.16; } 
h6 { font-family: 'Elsie', display;font-weight:400;font-size:20px;line-height:1.16; } 
.main-title-section-wrapper.overlay-wrapper.dark-bg-breadcrumb > .main-title-section-bg, .main-title-section-wrapper.overlay-wrapper > .main-title-section-bg, .main-title-section-wrapper.dark-bg-breadcrumb > .main-title-section-bg, .main-title-section-wrapper > .main-title-section-bg { background-image: url("https://dtmantra.wpengine.com/wp-content/uploads/2024/03/breadcrumb-bgd.png");background-attachment:inherit;background-position:center center;background-size:cover;background-repeat:no-repeat;background-color:var(--wdtTertiaryColor); } 

</style>
<link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Elsie%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CPoppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.7.1' type='text/css' media='all' />
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin><script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/jquery/jquery.js?ver=3.7.1" id="jquery-core-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/jquery/jquery-migrate.js?ver=3.4.1" id="jquery-migrate-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.js?ver=2.7.0-wc.8.8.5" id="jquery-blockui-js" data-wp-strategy="defer"></script>
<script type="text/javascript" id="wc-add-to-cart-js-extra">
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/dtmantra.wpengine.com\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.js?ver=8.8.5" id="wc-add-to-cart-js" defer="defer" data-wp-strategy="defer"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.js?ver=2.1.4-wc.8.8.5" id="js-cookie-js" data-wp-strategy="defer"></script>
<script type="text/javascript" id="woocommerce-js-extra">
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.js?ver=8.8.5" id="woocommerce-js" defer="defer" data-wp-strategy="defer"></script>
<link rel="https://api.w.org/" href="https://dtmantra.wpengine.com/wp-json/" /><link rel="alternate" title="JSON" type="application/json" href="https://dtmantra.wpengine.com/wp-json/wp/v2/pages/67" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://dtmantra.wpengine.com/xmlrpc.php?rsd" />
<link rel="canonical" href="https://dtmantra.wpengine.com/" />
<link rel='shortlink' href='https://dtmantra.wpengine.com/' />
<link rel="alternate" title="oEmbed (JSON)" type="application/json+oembed" href="https://dtmantra.wpengine.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdtmantra.wpengine.com%2F" />
<link rel="alternate" title="oEmbed (XML)" type="text/xml+oembed" href="https://dtmantra.wpengine.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdtmantra.wpengine.com%2F&#038;format=xml" />
<style type="text/css" media="all" id="wcs_styles"></style><meta name="tec-api-version" content="v1"><meta name="tec-api-origin" content="https://dtmantra.wpengine.com"><link rel="alternate" href="https://dtmantra.wpengine.com/wp-json/tribe/events/v1/" />	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
	<meta name="generator" content="Elementor 3.21.5; features: e_optimized_assets_loading, e_optimized_css_loading, e_font_icon_svg, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
<link rel="icon" href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" sizes="32x32" />
<link rel="icon" href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" sizes="192x192" />
<link rel="apple-touch-icon" href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" />
<meta name="msapplication-TileImage" content="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" />
	
	
	
	    <style>
               .logo-container {
            overflow: hidden;
            background: #f3f3f3;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .logo-slider {
            display: flex;
            gap: 50px;
            white-space: nowrap;
        }
        .row-1 {
            animation: scroll-left 20s linear infinite;
        }
        .row-2 {
            animation: scroll-right 20s linear infinite;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #b29d89;
            text-transform: uppercase;
        }

        /* Animations */
        @keyframes scroll-left {
            from { transform: translateX(0); }
            to { transform: translateX(-100%); }
        }
        @keyframes scroll-right {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }

        /* Pause animation on hover */
        .logo-container:hover .logo-slider {
            animation-play-state: paused;
        }
    </style>
	
	
	
	
</head>
<link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
<body class="home page-template page-template-elementor_header_footer page page-id-67 wp-custom-logo theme-mantras has-go-to-top mantras-plus-1.0.2 mantras-pro-1.0.0 woocommerce-no-js tribe-no-js woo-variation-swatches wvs-behavior-blur wvs-theme-mantras wvs-show-label wvs-tooltip tinvwl-theme-style elementor-default elementor-template-full-width elementor-kit-14 elementor-page elementor-page-67">
   <div class="pre-loader loader1">
		<div class="loader-inner">
			<div class="loader-icon">
				<img src="img/logo.png">
			</div>
		</div>
	</div>
   

    <!-- **Wrapper** -->
    <div class="wrapper">

        <!-- ** Inner Wrapper ** -->
        <div class="inner-wrapper">

            
            <!-- ** Header Wrapper ** -->
            <div id="header-wrapper" class="header-top-absolute">

                <!-- **Header** -->
                    <header id="header">
    <div class="wdt-elementor-container-fluid"><div id="header-503" class="wdt-header-tpl header-503">		<div data-elementor-type="wp-post" data-elementor-id="503" class="elementor elementor-503">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-07885ff elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="07885ff" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4055e44" data-id="4055e44" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-0747842 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="0747842" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-4f22c83" data-id="4f22c83" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-ec0da8a elementor-widget elementor-widget-wdt-logo" data-id="ec0da8a" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-logo.default">
				<div class="elementor-widget-container">
			<div id="mantras-ec0da8a" class="wdt-logo-container">  <a href="index.php" rel="home">
			<img loading="lazy" style="width:6rem; height:6rem;"src="img/logo.png" class="attachment-full size-full" alt="" decoding="async" /></a></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-1b5acd1 elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="1b5acd1" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-daff50b elementor-widget__width-auto elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-widget elementor-widget-wdt-header-menu" data-id="daff50b" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-header-menu.default">
				<div class="elementor-widget-container">
			<div class="wdt-header-menu" data-menu="45"><div class="menu-container"><ul id="menu-main-menu-3" class="wdt-primary-nav " data-menu="45"> <li class="close-nav"><a href="javascript:void(0);"></a></li>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-480 menu-item-depth-0"><a href="index.php" aria-current="page"><span data-text="Home">Home</span></a></li>
			



<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4487 menu-item-depth-0"><a href="about.php"><span data-text="About Us">About Us</span></a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4503 menu-item-depth-0"><a href="#"><span data-text="Classes">Services</span></a>
<ul class="sub-menu is-hidden">
<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4493 menu-item-depth-1"><a href="yoga.php"><span data-text="Classes Listing">WorkOut Plan</span></a>
	<ul class="sub-menu is-hidden">
		<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5384 menu-item-depth-2"><a href="workoutless18.php"><span data-text="Less Than 18 Year">Less Than 18 Year</span></a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5385 menu-item-depth-2"><a href="login-signup.php"><span data-text="In Between 18-40 Year Old">In Between 18-40 Year Old</span></a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5386 menu-item-depth-2"><a href="login-signup.php"><span data-text="Greater Than 40 Year">Greater Than 40 Year</span></a></li>
		
	</ul>

</li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4502 menu-item-depth-1"><a href="recipe.php"><span data-text="Classes details">Healthy Recipes</span></a>
	<ul class="sub-menu is-hidden">
		<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5384 menu-item-depth-2"><a href="recipeless18.php"><span data-text="Less Than 18 Year">Less Than 18 Year</span></a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5385 menu-item-depth-2"><a href="login-signup.php"><span data-text="In Between 18-40 Year Old">In Between 18-40 Year Old</span></a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5386 menu-item-depth-2"><a href="login-signup.php"><span data-text="Greater Than 40 Year">Above 40 Year</span></a></li>
		
	</ul>
	</li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4485 menu-item-depth-1"><a href="relaxation.php"><span data-text="Class Schedule">Relaxation</span></a></li>
</ul>
</li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-481 menu-item-depth-0"><a href="#"><span data-text="Pages">Pages</span></a>
<ul class="sub-menu is-hidden">
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4488 menu-item-depth-1"><a href="team.php"><span data-text="Team">Team</span></a></li>
	    
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4505 menu-item-depth-1"><a href="login-signup.php"><span data-text="Registration / Login">Registration / Login</span></a></li>
	
</ul>
</li>

<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4484 menu-item-depth-0"><a href="contact.php"><span data-text="Contact Us">Contact Us</span></a></li>
 </ul> <div class="sub-menu-overlay"></div></div><div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="45"><a href="#" class="menu-trigger menu-trigger-icon" data-menu="45"><i></i><span>Menu</span></a><div class="mobile-menu" data-menu="45"></div><div class="overlay"></div></div></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-06b5e33" data-id="06b5e33" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-73a29c0 elementor-widget__width-auto elementor-widget-laptop__width-auto elementor-hidden-mobile center elementor-widget elementor-widget-wdt-button" data-id="73a29c0" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-73a29c0"><a class="wdt-button" href="login-signup.php"><div class="wdt-button-text"><span>Start Now</span></div></a></div>		</div>
				</div>
				<div class="elementor-element elementor-element-9660c77 elementor-widget__width-auto elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-widget elementor-widget-wdt-popup-box" data-id="9660c77" data-element_type="widget" data-settings="{&quot;show_close_Button&quot;:&quot;true&quot;,&quot;esc_to_exit&quot;:&quot;true&quot;,&quot;click_to_exit&quot;:&quot;true&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-popup-box.default">
				<div class="elementor-widget-container">
			<div class="wdt-popup-box-trigger-holder wdt-click-element-icon" id="wdt-popup-box-trigger-9660c77" data-settings="{&quot;module_id&quot;:&quot;9660c77&quot;,&quot;module_ref_id&quot;:&quot;wdt-popup-box-9660c77&quot;,&quot;popup_class&quot;:&quot;wdt-popup-box-window wdt-popup-box-window-9660c77 wdt-right-side-slide&quot;,&quot;trigger_type&quot;:&quot;on-click&quot;,&quot;on_load_delay&quot;:null,&quot;on_load_after&quot;:null,&quot;external_class&quot;:null,&quot;external_id&quot;:null,&quot;show_close_Button&quot;:true,&quot;esc_to_exit&quot;:true,&quot;click_to_exit&quot;:true,&quot;mfp_src&quot;:&quot;#wdt-popup-box-content-holder-9660c77&quot;,&quot;mfp_type&quot;:&quot;inline&quot;}"><div class="wdt-popup-box-trigger-element"><span class="wdt-popup-box-trigger-item wdt-popup-box-trigger-icon"><i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><g class="wdt-custom-header-pop-icon"><rect x="0.56" y="48.35" width="98.88" height="3.3"></rect><rect x="0.56" y="80.35" width="98.88" height="3.3"></rect><rect x="0.56" y="16.35" width="98.88" height="3.3"></rect></g></svg></i></span></div></div><div id="wdt-popup-box-content-holder-9660c77" class="wdt-popup-box-content-holder wdt-popup-box-content-holder-9660c77 wdt-content-type-template mfp-hide"><div class="wdt-popup-box-content-inner"><style>.elementor-27 .elementor-element.elementor-element-10a1885 > .elementor-container > .elementor-column > .elementor-widget-wrap{align-content:center;align-items:center;}.elementor-27 .elementor-element.elementor-element-825666f > .elementor-widget-wrap > .elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute){margin-bottom:0px;}.elementor-27 .elementor-element.elementor-element-5bb0d65 div.wdt-logo-container img{max-width:200px;width:200px;}.elementor-27 .elementor-element.elementor-element-5bb0d65 > .elementor-widget-container{margin:0px 0px 30px 0px;}.elementor-27 .elementor-element.elementor-element-8dccd3a{text-align:left;width:var( --container-widget-width, 360px );max-width:360px;--container-widget-width:360px;--container-widget-flex-grow:0;}.elementor-27 .elementor-element.elementor-element-8dccd3a > .elementor-widget-container{margin:0px 0px 20px 0px;}.elementor-27 .elementor-element.elementor-element-9544f16 .elementor-widget-container{text-align:start;justify-content:start;justify-items:start;}.elementor-27 .elementor-element.elementor-element-9544f16 .wdt-button-holder .wdt-button{margin:0px 0px 0px 0px;}.elementor-27 .elementor-element.elementor-element-9544f16 > .elementor-widget-container{margin:0px 30px 0px 0px;}.elementor-27 .elementor-element.elementor-element-9544f16{width:auto;max-width:auto;}.elementor-27 .elementor-element.elementor-element-1d84dd6 .elementor-widget-container{text-align:start;justify-content:start;justify-items:start;}.elementor-27 .elementor-element.elementor-element-1d84dd6 .wdt-button-holder .wdt-button{margin:0px 0px 0px 0px;}.elementor-27 .elementor-element.elementor-element-1d84dd6{width:auto;max-width:auto;}.elementor-27 .elementor-element.elementor-element-38bac46{--divider-border-style:solid;--divider-color:var( --e-global-color-accent );--divider-border-width:1px;}.elementor-27 .elementor-element.elementor-element-38bac46 .elementor-divider-separator{width:100%;}.elementor-27 .elementor-element.elementor-element-38bac46 .elementor-divider{padding-block-start:15px;padding-block-end:15px;}.elementor-27 .elementor-element.elementor-element-38bac46 > .elementor-widget-container{margin:20px 0px 20px 0px;}.elementor-27 .elementor-element.elementor-element-1f09911 .wdt-heading-holder, .elementor-27 .elementor-element.elementor-element-1f09911 .wdt-heading-holder > .wdt-heading-separator-wrapper .wdt-heading-separator, .elementor-27 .elementor-element.elementor-element-1f09911 .wdt-heading-holder > .wdt-heading-title-wrapper .wdt-heading-title, .elementor-27 .elementor-element.elementor-element-1f09911 .wdt-heading-holder > .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{text-align:start;justify-content:start;justify-items:start;}.elementor-27 .elementor-element.elementor-element-1f09911 .wdt-heading-holder .wdt-heading-title-wrapper .wdt-heading-title{align-items:center;}.elementor-27 .elementor-element.elementor-element-1f09911 .wdt-heading-holder .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{align-items:center;}.elementor-27 .elementor-element.elementor-element-1f09911 > .elementor-widget-container{margin:0px 0px 20px 0px;}.elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child){padding-bottom:calc(20px/2);}.elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child){margin-top:calc(20px/2);}.elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item{margin-right:calc(20px/2);margin-left:calc(20px/2);}.elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-items.elementor-inline-items{margin-right:calc(-20px/2);margin-left:calc(-20px/2);}body.rtl .elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{left:calc(-20px/2);}body:not(.rtl) .elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{right:calc(-20px/2);}.elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-icon i{color:var( --e-global-color-accent );transition:color 0.3s;}.elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-icon svg{fill:var( --e-global-color-accent );transition:fill 0.3s;}.elementor-27 .elementor-element.elementor-element-ee81187{--e-icon-list-icon-size:22px;--icon-vertical-align:flex-start;--icon-vertical-offset:4px;width:var( --container-widget-width, 350px );max-width:350px;--container-widget-width:350px;--container-widget-flex-grow:0;}.elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-icon{padding-right:5px;}.elementor-27 .elementor-element.elementor-element-ee81187 .elementor-icon-list-text{color:var( --e-global-color-text );transition:color 0.3s;}.elementor-27 .elementor-element.elementor-element-7ea66fe{--divider-border-style:solid;--divider-color:var( --e-global-color-accent );--divider-border-width:1px;}.elementor-27 .elementor-element.elementor-element-7ea66fe .elementor-divider-separator{width:100%;}.elementor-27 .elementor-element.elementor-element-7ea66fe .elementor-divider{padding-block-start:15px;padding-block-end:15px;}.elementor-27 .elementor-element.elementor-element-7ea66fe > .elementor-widget-container{margin:20px 0px 20px 0px;}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child){padding-bottom:calc(20px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child){margin-top:calc(20px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item{margin-right:calc(20px/2);margin-left:calc(20px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items{margin-right:calc(-20px/2);margin-left:calc(-20px/2);}body.rtl .elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{left:calc(-20px/2);}body:not(.rtl) .elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{right:calc(-20px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-icon i{color:var( --e-global-color-primary );transition:color 0.3s;}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-icon svg{fill:var( --e-global-color-primary );transition:fill 0.3s;}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-item:hover .elementor-icon-list-icon i{color:var( --e-global-color-accent );}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-item:hover .elementor-icon-list-icon svg{fill:var( --e-global-color-accent );}.elementor-27 .elementor-element.elementor-element-302e507{--e-icon-list-icon-size:30px;--e-icon-list-icon-align:right;--e-icon-list-icon-margin:0 0 0 calc(var(--e-icon-list-icon-size, 1em) * 0.25);--icon-vertical-offset:0px;}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-icon{padding-right:0px;}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-text{transition:color 0.3s;}@media(max-width:1540px){.elementor-27 .elementor-element.elementor-element-5bb0d65 div.wdt-logo-container img{max-width:180px;width:180px;}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child){padding-bottom:calc(25px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child){margin-top:calc(25px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item{margin-right:calc(25px/2);margin-left:calc(25px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items{margin-right:calc(-25px/2);margin-left:calc(-25px/2);}body.rtl .elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{left:calc(-25px/2);}body:not(.rtl) .elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{right:calc(-25px/2);}}@media(max-width:1280px){.elementor-27 .elementor-element.elementor-element-5bb0d65 div.wdt-logo-container img{max-width:160px;width:160px;}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child){padding-bottom:calc(20px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child){margin-top:calc(20px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item{margin-right:calc(20px/2);margin-left:calc(20px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items{margin-right:calc(-20px/2);margin-left:calc(-20px/2);}body.rtl .elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{left:calc(-20px/2);}body:not(.rtl) .elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{right:calc(-20px/2);}}@media(max-width:1024px){.elementor-27 .elementor-element.elementor-element-5bb0d65 div.wdt-logo-container img{max-width:160px;width:160px;}}@media(max-width:767px){.elementor-27 .elementor-element.elementor-element-5bb0d65 div.wdt-logo-container img{max-width:140px;width:140px;}.elementor-27 .elementor-element.elementor-element-9544f16 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}.elementor-27 .elementor-element.elementor-element-9544f16 > .elementor-widget-container{margin:0px 20px 20px 0px;}.elementor-27 .elementor-element.elementor-element-9544f16{width:auto;max-width:auto;}.elementor-27 .elementor-element.elementor-element-1d84dd6 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}.elementor-27 .elementor-element.elementor-element-1d84dd6{width:auto;max-width:auto;}}@media(max-width:479px){.elementor-27 .elementor-element.elementor-element-5bb0d65 div.wdt-logo-container img{max-width:140px;width:140px;}.elementor-27 .elementor-element.elementor-element-9544f16 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}.elementor-27 .elementor-element.elementor-element-1d84dd6 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child){padding-bottom:calc(10px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child){margin-top:calc(10px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item{margin-right:calc(10px/2);margin-left:calc(10px/2);}.elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items{margin-right:calc(-10px/2);margin-left:calc(-10px/2);}body.rtl .elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{left:calc(-10px/2);}body:not(.rtl) .elementor-27 .elementor-element.elementor-element-302e507 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{right:calc(-10px/2);}}</style>		<div data-elementor-type="page" data-elementor-id="27" class="elementor elementor-27">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-10a1885 elementor-section-full_width elementor-section-content-middle elementor-section-height-default elementor-section-height-default" data-id="10a1885" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-825666f" data-id="825666f" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-5bb0d65 elementor-widget elementor-widget-wdt-logo" data-id="5bb0d65" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-logo.default">
				<div class="elementor-widget-container">
			<div id="mantras-5bb0d65" class="wdt-logo-container">  <a href="index.php" rel="home"><img loading="lazy" src="img/logo.png" alt="VitaCare Site" style="width:6rem; height:6rem;" /></a></div>		</div>
				</div>
				<div class="elementor-element elementor-element-8dccd3a elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="8dccd3a" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							<p><span  style="font-weight:bold; font-size:1.2rem;">Welcome to VitaCare - </span>Your Partner in Health & Wellness At VitaCare, we are dedicated to helping you take control of your health. Our comprehensive health management platform offers personalized care solutions and innovative tools to keep you and your family healthy.</p>						</div>
				</div>
				<div class="elementor-element elementor-element-9544f16 start center center wdt-slider-btn elementor-widget__width-auto elementor-widget-mobile_extra__width-auto elementor-widget elementor-widget-wdt-button" data-id="9544f16" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-9544f16"><a class="wdt-button" href="#"><div class="wdt-button-text"><span>Know More</span></div></a></div>		</div>
				</div>
				<div class="elementor-element elementor-element-1d84dd6 start center center wdt-slider-btn elementor-widget__width-auto elementor-widget-mobile_extra__width-auto elementor-widget elementor-widget-wdt-button" data-id="1d84dd6" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-1d84dd6"><a class="wdt-button" href="tel:9120185903"><div class="wdt-button-text"><span>Call Us</span></div></a></div>		</div>
				</div>
				<div class="elementor-element elementor-element-38bac46 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="38bac46" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="divider.default">
				<div class="elementor-widget-container">
					<div class="elementor-divider">
			<span class="elementor-divider-separator">
						</span>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-1f09911 start elementor-widget elementor-widget-wdt-heading" data-id="1f09911" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-1f09911"><h4 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Contact Us</span></h4></div>		</div>
				</div>
				<div class="elementor-element elementor-element-ee81187 elementor-widget__width-initial elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="ee81187" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items">
							<li class="elementor-icon-list-item">
											<a href="tel:9120185903">

												<span class="elementor-icon-list-icon">
							<svg aria-hidden="true" class="e-font-icon-svg e-fas-phone-alt" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path></svg>						</span>
										<span class="elementor-icon-list-text">9120185903</span>
											</a>
									</li>
								<li class="elementor-icon-list-item">
											<a href="mailto:example@gmail.com">

												<span class="elementor-icon-list-icon">
							<svg aria-hidden="true" class="e-font-icon-svg e-fas-envelope" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>						</span>
										<span class="elementor-icon-list-text">vitacare1102@gmail.com</span>
											</a>
									</li>
								<!----<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg aria-hidden="true" class="e-font-icon-svg e-fas-map-marker-alt" viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>						</span>
										<span class="elementor-icon-list-text"></span>
									</li>---->
						</ul>
				</div>
				</div>
				<div class="elementor-element elementor-element-7ea66fe elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="7ea66fe" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="divider.default">
				<div class="elementor-widget-container">
					<div class="elementor-divider">
			<span class="elementor-divider-separator">
						</span>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-302e507 elementor-icon-list--layout-inline elementor-align-left elementor-list-item-link-inline elementor-widget elementor-widget-icon-list" data-id="302e507" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items elementor-inline-items">
							<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">

												<span class="elementor-icon-list-icon">
													<i class="fa-brands fa-square-whatsapp"></i>
												</span>
										
											</a>
									</li>
								<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">
												<span class="elementor-icon-list-icon">
													<i class="fa-brands fa-square-instagram"></i>
												</span>
											</a>
								</li>
								<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">
												<span class="elementor-icon-list-icon">
													<i class="fa-solid fa-square-phone"></i>
												</span>
											</a>
									</li>
								
						</ul>
				</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				</div>
		</div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-e7c98e1 elementor-align-left elementor-widget__width-auto elementor-hidden-desktop elementor-hidden-laptop elementor-widget elementor-widget-wdt-header-menu" data-id="e7c98e1" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-header-menu.default">
				<div class="elementor-widget-container">
			<div class="wdt-header-menu" data-menu="45"><div class="menu-container"><ul id="menu-main-menu-4" class="wdt-primary-nav " data-menu="45"> <li class="close-nav"><a href="javascript:void(0);"></a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-480 menu-item-depth-0"><a href="index.php" aria-current="page"><span data-text="Home">Home</span></a>
<ul class="sub-menu is-hidden">
<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>	
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-67 current_page_item menu-item-496 menu-item-depth-1"></li>
	
	
</li>
</ul>

<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4487 menu-item-depth-0"><a href="about.php"><span data-text="About Us">About Us</span></a></li>

<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4503 menu-item-depth-0"><a href="#"><span data-text="Classes">Services</span></a>
<ul class="sub-menu is-hidden">
<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4493 menu-item-depth-1"><a href="yoga.php"><span data-text="Classes Listing">WorkOut Plan</span></a>
	<ul class="sub-menu is-hidden">
		<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5384 menu-item-depth-2"><a href="workoutless18.php"><span data-text="Less Than 18 Year">Less Than 18 Year</span></a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5385 menu-item-depth-2"><a href="login-signup.php"><span data-text="In Between 18-40 Year Old">In Between 18-40 Year Old</span></a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5386 menu-item-depth-2"><a href="login-signup.php"><span data-text="Greater Than 40 Year">Greater Than 40 Year</span></a></li>
		
	</ul>

</li>
	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4502 menu-item-depth-1  menu-item-has-children"><a href="recipe.php"><span data-text="Classes details">Healthy Recipes</span></a>
	<ul class="sub-menu is-hidden">
		<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5384 menu-item-depth-2"><a href="recipeless18.php"><span data-text="Less Than 18 Year">Less Than 18 Year</span></a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5385 menu-item-depth-2"><a href="login-signup.php"><span data-text="In Between 18-40 Year Old">In Between 18-40 Year Old</span></a></li>
		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5386 menu-item-depth-2"><a href="login-signup.php"><span data-text="Greater Than 40 Year">Above 40 Year</span></a></li>
		
	</ul>
	</li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4485 menu-item-depth-1"><a href="relaxation.php"><span data-text="Class Schedule">Relaxation</span></a></li>
</ul>
</li>

<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-481 menu-item-depth-0"><a href="#"><span data-text="Pages">Pages</span></a>
<ul class="sub-menu is-hidden">
<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>	
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4488 menu-item-depth-1"><a href="team.php"><span data-text="Team">Team</span></a></li>
	    
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4505 menu-item-depth-1"><a href="login-signup.php"><span data-text="Registration / Login">Registration / Login</span></a></li>
	
</ul>
</li>




<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4484 menu-item-depth-0"><a href="contact.php"><span data-text="Contact Us">Contact Us</span></a></li>
 </ul> <div class="sub-menu-overlay"></div></div><div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="45"><a href="#" class="menu-trigger menu-trigger-icon" data-menu="45"><i></i><span>Menu</span></a><div class="mobile-menu" data-menu="45"></div><div class="overlay"></div></div></div>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
					</div>
		</section>
				</div>
		</div></div></header>                <!-- **Header - End ** -->

                <!-- ** Slider ** -->
                    
                <!-- ** Slider End ** -->

                <!-- ** Breadcrumb ** -->
                                    <!-- ** Breadcrumb End ** -->

            </div><!-- ** Header Wrapper - End ** -->

            <!-- **Main** -->
            <div id="main">

                
                                <!-- ** Container ** -->
                <div class="wdt-elementor-container-fluid">
                    		<div data-elementor-type="wp-page" data-elementor-id="67" class="elementor elementor-67">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-b79ed14 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b79ed14" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;video&quot;,&quot;background_video_link&quot;:&quot;https:\/\/vimeo.com\/443801832&quot;,&quot;background_play_on_mobile&quot;:&quot;yes&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
								<div class="elementor-background-video-container">
													<div class="elementor-background-video-embed"></div>
												</div>
									<div class="elementor-background-overlay"></div>
							<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-363e3b9" data-id="363e3b9" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-2c6e3b5 elementor-section-full_width elementor-reverse-mobile_extra elementor-reverse-mobile elementor-section-height-default elementor-section-height-default" data-id="2c6e3b5" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-f85dc7c" data-id="f85dc7c" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-461bdb2 start elementor-widget__width-auto elementor-widget-laptop__width-auto wdt-home-video elementor-widget-mobile_extra__width-inherit elementor-invisible elementor-widget elementor-widget-wdt-image-box" data-id="461bdb2" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-image-box.default">
				<div class="elementor-widget-container">
			<div class="wdt-image-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template" id="wdt-image-box-461bdb2"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><img fetchpriority="high" fetchpriority="high" decoding="async" width="496" height="400" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/video-img-2.png" class="attachment-full size-full wp-image-1009" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/video-img-2.png 496w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/video-img-2-300x242.png 300w" sizes="(max-width: 496px) 100vw, 496px" /></a></div></div><div class="wdt-content-icon-wrapper"><div class="wdt-content-icon"><span><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve"><path d="M28.3,15L1.7,30l0-30L28.3,15z"></path></svg></i></span></div></div></div></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-6678383 elementor-widget__width-auto wdt-home-arrow e-transform elementor-hidden-mobile_extra elementor-hidden-mobile elementor-view-default elementor-invisible elementor-widget elementor-widget-icon" data-id="6678383" data-element_type="widget" data-settings="{&quot;_transform_rotateZ_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:50,&quot;sizes&quot;:[]},&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;_animation_delay&quot;:200,&quot;wdt_animation_effect&quot;:&quot;none&quot;,&quot;_transform_rotateZ_effect_laptop&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_tablet_extra&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_tablet&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_mobile_extra&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_rotateZ_effect_mobile&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><defs><style>.wdt-custom-home-slider-icon1,.wdt-custom-home-slider-icon2{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:7px;}</style></defs><path class="wdt-custom-home-slider-icon1" d="M4.09,140.22s-5.76-47.59,16.63-68.5S63.53,57.4,77.2,67s24.86,28.15,22.06,48.24S81.43,129.71,79,125.4c-2.39-4-10.21-21.24,2-43.63S121.49,62,125.61,62.83s38.69,4.78,55.82,57c1.6,4.87,6.95,20.48,6.95,20.48"></path><polyline class="wdt-custom-home-slider-icon2" points="168.17 125.4 188.8 142.1 196.57 121.45"></polyline></svg>			</div>
		</div>
				</div>
				</div>
				
				
<?php 
	}
?>