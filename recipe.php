<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    

    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <title>विtaCare-recipe</title>
<meta name='robots' content='max-image-preview:large' />
	<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>
	<link rel="stylesheet" href="aichatbot3.0/style.css" />
	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<script src="aichatbot3.0/script.js" defer></script>
<link rel="alternate" type="application/rss+xml" title="Mantra Site &raquo; Feed" href="https://dtmantra.wpengine.com/feed/" />
<link rel="alternate" type="application/rss+xml" title="Mantra Site &raquo; Comments Feed" href="https://dtmantra.wpengine.com/comments/feed/" />
<link rel="alternate" type="text/calendar" title="Mantra Site &raquo; iCal Feed" href="https://dtmantra.wpengine.com/events/?ical=1" />
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
<link rel='stylesheet' id='elementor-post-5365-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-5365.css?ver=1717422958' type='text/css' media='all' />
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
<link rel="https://api.w.org/" href="https://dtmantra.wpengine.com/wp-json/" /><link rel="alternate" title="JSON" type="application/json" href="https://dtmantra.wpengine.com/wp-json/wp/v2/pages/5365" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://dtmantra.wpengine.com/xmlrpc.php?rsd" />
<link rel="canonical" href="https://dtmantra.wpengine.com/home-5/" />
<link rel='shortlink' href='https://dtmantra.wpengine.com/?p=5365' />
<link rel="alternate" title="oEmbed (JSON)" type="application/json+oembed" href="https://dtmantra.wpengine.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdtmantra.wpengine.com%2Fhome-5%2F" />
<link rel="alternate" title="oEmbed (XML)" type="text/xml+oembed" href="https://dtmantra.wpengine.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdtmantra.wpengine.com%2Fhome-5%2F&#038;format=xml" />
<style type="text/css" media="all" id="wcs_styles"></style><meta name="tec-api-version" content="v1"><meta name="tec-api-origin" content="https://dtmantra.wpengine.com"><link rel="alternate" href="https://dtmantra.wpengine.com/wp-json/tribe/events/v1/" />	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
	<meta name="generator" content="Elementor 3.21.5; features: e_optimized_assets_loading, e_optimized_css_loading, e_font_icon_svg, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
<link rel="icon" href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" sizes="32x32" />
<link rel="icon" href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" sizes="192x192" />
<link rel="apple-touch-icon" href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" />
<meta name="msapplication-TileImage" content="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" />
</head>

<body class="page-template page-template-elementor_header_footer page page-id-5365 wp-custom-logo theme-mantras has-go-to-top mantras-plus-1.0.2 mantras-pro-1.0.0 woocommerce-no-js tribe-no-js woo-variation-swatches wvs-behavior-blur wvs-theme-mantras wvs-show-label wvs-tooltip tinvwl-theme-style elementor-default elementor-template-full-width elementor-kit-14 elementor-page elementor-page-5365">
    <div class="pre-loader loader1">
		<div class="loader-inner">
			<div class="loader-icon">
				<img src="img/logo.png">
			</div>
		</div>
	</div>
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>

    <!-- **Wrapper** -->
    <div class="wrapper">

        <!-- ** Inner Wrapper ** -->
        <div class="inner-wrapper">

            
            <!-- ** Header Wrapper ** -->
            <div id="header-wrapper" class="header-top-absolute">

                <!-- **Header** -->
                    <header id="header">
    <div class="wdt-elementor-container-fluid"><div id="header-488" class="wdt-header-tpl header-488">		<div data-elementor-type="wp-post" data-elementor-id="488" class="elementor elementor-488">
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
			<div id="mantras-ec0da8a" class="wdt-logo-container">  <a href="index.php" rel="home"><img loading="lazy" style="width:6rem; height:6rem;"src="img/logo.png" class="attachment-full size-full" alt="" decoding="async" /></a></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-1b5acd1 elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="1b5acd1" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-daff50b elementor-widget__width-auto elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-widget elementor-widget-wdt-header-menu" data-id="daff50b" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-header-menu.default">
				<div class="elementor-widget-container">
			<div class="wdt-header-menu" data-menu="0"><div class="menu-container"><ul id="menu-main-menu-1" class="wdt-primary-nav " data-menu="0"> <li class="close-nav"><a href="javascript:void(0);"></a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-480 menu-item-depth-0"><a href="index.php"><span data-text="Home">Home</span></a>

</li>

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
<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4488 menu-item-depth-1"><a href="team.php"><span data-text="Team">Team</span></a></li>
	
	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4505 menu-item-depth-1"><a href="login-signup.php"><span data-text="Registration / Login">Registration / Login</span></a></li>
	
</ul>
</li>




<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4484 menu-item-depth-0"><a href="contact.php"><span data-text="Contact Us">Contact Us</span></a></li>
 </ul> <div class="sub-menu-overlay"></div></div><div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="0"><a href="#" class="menu-trigger menu-trigger-icon" data-menu="0"><i></i><span>Menu</span></a><div class="mobile-menu" data-menu="0"></div><div class="overlay"></div></div></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-06b5e33" data-id="06b5e33" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-73a29c0 elementor-widget__width-auto elementor-widget-laptop__width-auto elementor-hidden-mobile center elementor-widget elementor-widget-wdt-button" data-id="73a29c0" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-73a29c0"><a class="wdt-button" href="login-signup.php"><div class="wdt-button-text"><span>start Now</span></div></a></div>		</div>
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
							<p><span  style="font-weight:bold; font-size:1.2rem;">Welcome to VitaCare - </span>Your Partner in Health & Wellness At VitaCare, we are dedicated to helping you take control of your health. Our comprehensive health management platform offers personalized care solutions and innovative tools to keep you and your family healthy.</p>							</div>
				</div>
				<div class="elementor-element elementor-element-9544f16 start center center wdt-slider-btn elementor-widget__width-auto elementor-widget-mobile_extra__width-auto elementor-widget elementor-widget-wdt-button" data-id="9544f16" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-9544f16"><a class="wdt-button" href="#"><div class="wdt-button-text"><span>Know More</span></div></a></div>		</div>
				</div>
				<div class="elementor-element elementor-element-1d84dd6 start center center wdt-slider-btn elementor-widget__width-auto elementor-widget-mobile_extra__width-auto elementor-widget elementor-widget-wdt-button" data-id="1d84dd6" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-1d84dd6"><a class="wdt-button" href="tel:912-185903"><div class="wdt-button-text"><span>Call Us</span></div></a></div>		</div>
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
											<a href="mailto:vitacare1102@gmail.com">

												<span class="elementor-icon-list-icon">
							<svg aria-hidden="true" class="e-font-icon-svg e-fas-envelope" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>						</span>
										<span class="elementor-icon-list-text">vitacare1102@gmail.com</span>
											</a>
									</li>
							
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
											<a href="tel:9120185903">

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
											<a href="tel:9120185903">
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
			<div class="wdt-header-menu" data-menu="0"><div class="menu-container"><ul id="menu-main-menu-2" class="wdt-primary-nav " data-menu="0"> <li class="close-nav"><a href="javascript:void(0);"></a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-480 menu-item-depth-0"><a href="index.php"><span data-text="Home">Home</span></a>

</li>
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
 </ul> <div class="sub-menu-overlay"></div></div><div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="0"><a href="#" class="menu-trigger menu-trigger-icon" data-menu="0"><i></i><span>Menu</span></a><div class="mobile-menu" data-menu="0"></div><div class="overlay"></div></div></div>		</div>
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
		</div></div></header>       <!-- **Header - End ** -->

                <!-- ** Slider ** -->
                    
                <!-- ** Slider End ** -->

                <!-- ** Breadcrumb ** -->
                                    <!-- ** Breadcrumb End ** -->

            </div><!-- ** Header Wrapper - End ** -->

            <!-- **Main** -->
            <div id="main">

                
                                <!-- ** Container ** -->
                <div class="wdt-elementor-container-fluid">
                    		<div data-elementor-type="wp-page" data-elementor-id="5365" class="elementor elementor-5365">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-61a054a wdt-section-wrap-col elementor-reverse-mobile_extra elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="61a054a" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="wdt-sticky-column elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-782601f elementor-hidden-tablet_extra elementor-hidden-mobile_extra elementor-hidden-mobile elementor-hidden-tablet" data-wdt-settings="{&quot;id&quot;:&quot;782601f&quot;,&quot;sticky&quot;:true,&quot;topSpacing&quot;:50,&quot;bottomSpacing&quot;:50,&quot;stickyOn&quot;:[&quot;tablet_extra&quot;],&quot;overflowHidden&quot;:false}" data-id="782601f" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-f409c1d animated-slow elementor-invisible elementor-widget elementor-widget-image" data-id="f409c1d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img fetchpriority="high" fetchpriority="high" decoding="async" width="1000" height="1523" src="img/girl1.png" class="attachment-full size-full wp-image-658" alt="" srcset="img/girl1.png 1000w, img/girl1.png 197w, img/girl1.png 672w, img/girl1.png 768w" sizes="(max-width: 1000px) 100vw, 1000px" />													</div>
				</div>
				<div class="elementor-element elementor-element-b8c28c6 elementor-absolute animated-fast elementor-invisible elementor-widget elementor-widget-image" data-id="b8c28c6" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;auto-movement&quot;,&quot;wdt_ame_duration&quot;:{&quot;unit&quot;:&quot;dpt&quot;,&quot;size&quot;:20,&quot;sizes&quot;:[]},&quot;wdt_ame_direction&quot;:&quot;custom&quot;,&quot;wdt_ame_custom_directions&quot;:[{&quot;_id&quot;:&quot;ba217d7&quot;,&quot;wdt_rotate&quot;:&quot;true&quot;,&quot;wdt_opacity&quot;:&quot;true&quot;,&quot;wdt_x_direction&quot;:&quot;&quot;,&quot;wdt_x_depth&quot;:null,&quot;wdt_x_depth_laptop&quot;:null,&quot;wdt_x_depth_tablet_extra&quot;:null,&quot;wdt_x_depth_tablet&quot;:null,&quot;wdt_x_depth_mobile_extra&quot;:null,&quot;wdt_x_depth_mobile&quot;:null,&quot;wdt_y_direction&quot;:&quot;&quot;,&quot;wdt_y_depth&quot;:null,&quot;wdt_y_depth_laptop&quot;:null,&quot;wdt_y_depth_tablet_extra&quot;:null,&quot;wdt_y_depth_tablet&quot;:null,&quot;wdt_y_depth_mobile_extra&quot;:null,&quot;wdt_y_depth_mobile&quot;:null,&quot;wdt_rotate_angle&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_scale&quot;:&quot;&quot;,&quot;wdt_scale_value&quot;:null,&quot;wdt_scale_value_laptop&quot;:null,&quot;wdt_scale_value_tablet_extra&quot;:null,&quot;wdt_scale_value_tablet&quot;:null,&quot;wdt_scale_value_mobile_extra&quot;:null,&quot;wdt_scale_value_mobile&quot;:null,&quot;wdt_blur&quot;:&quot;&quot;,&quot;wdt_blur_value&quot;:null,&quot;wdt_blur_value_laptop&quot;:null,&quot;wdt_blur_value_tablet_extra&quot;:null,&quot;wdt_blur_value_tablet&quot;:null,&quot;wdt_blur_value_mobile_extra&quot;:null,&quot;wdt_blur_value_mobile&quot;:null,&quot;wdt_opacity_value&quot;:{&quot;unit&quot;:&quot;value&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}},{&quot;wdt_rotate&quot;:&quot;true&quot;,&quot;wdt_rotate_angle&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:360,&quot;sizes&quot;:[]},&quot;wdt_opacity&quot;:&quot;true&quot;,&quot;_id&quot;:&quot;1c1c72d&quot;,&quot;wdt_x_direction&quot;:&quot;&quot;,&quot;wdt_x_depth&quot;:null,&quot;wdt_x_depth_laptop&quot;:null,&quot;wdt_x_depth_tablet_extra&quot;:null,&quot;wdt_x_depth_tablet&quot;:null,&quot;wdt_x_depth_mobile_extra&quot;:null,&quot;wdt_x_depth_mobile&quot;:null,&quot;wdt_y_direction&quot;:&quot;&quot;,&quot;wdt_y_depth&quot;:null,&quot;wdt_y_depth_laptop&quot;:null,&quot;wdt_y_depth_tablet_extra&quot;:null,&quot;wdt_y_depth_tablet&quot;:null,&quot;wdt_y_depth_mobile_extra&quot;:null,&quot;wdt_y_depth_mobile&quot;:null,&quot;wdt_rotate_angle_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_scale&quot;:&quot;&quot;,&quot;wdt_scale_value&quot;:null,&quot;wdt_scale_value_laptop&quot;:null,&quot;wdt_scale_value_tablet_extra&quot;:null,&quot;wdt_scale_value_tablet&quot;:null,&quot;wdt_scale_value_mobile_extra&quot;:null,&quot;wdt_scale_value_mobile&quot;:null,&quot;wdt_blur&quot;:&quot;&quot;,&quot;wdt_blur_value&quot;:null,&quot;wdt_blur_value_laptop&quot;:null,&quot;wdt_blur_value_tablet_extra&quot;:null,&quot;wdt_blur_value_tablet&quot;:null,&quot;wdt_blur_value_mobile_extra&quot;:null,&quot;wdt_blur_value_mobile&quot;:null,&quot;wdt_opacity_value&quot;:{&quot;unit&quot;:&quot;value&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}],&quot;_animation&quot;:&quot;zoomIn&quot;,&quot;wdt_ame_iteration&quot;:&quot;infinity&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img decoding="async" width="600" height="617" src="wp-content/uploads/2024/03/circle-dots.png" class="attachment-full size-full wp-image-659" alt="" srcset="wp-content/uploads/2024/03/circle-dots.png 600w,wp-content/uploads/2024/03/circle-dots-292x300.png 292w" sizes="(max-width: 600px) 100vw, 600px" />													</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-444bd61" data-id="444bd61" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-e702623 start center elementor-widget-tablet_extra__width-initial elementor-widget-mobile_extra__width-inherit elementor-widget elementor-widget-wdt-heading" data-id="e702623" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-e702623"><h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title"></span></h2><div class="wdt-heading-content-wrapper">Healthy food includes a variety of nutrient-rich options that provide essential vitamins, minerals, and energy for the body. Eating a balanced diet helps maintain overall health, prevent diseases, and boost energy levels.</div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-c01a3cc start start elementor-widget-tablet__width-inherit wdt-custom-btn  center animated-slow elementor-invisible elementor-widget elementor-widget-wdt-button" data-id="c01a3cc" data-element_type="widget" data-settings="{&quot;item_normal_background_background&quot;:&quot;classic&quot;,&quot;item_hover_background_background&quot;:&quot;classic&quot;,&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-c01a3cc"><a class="wdt-button" href="recipes.php"><div class="wdt-button-text"><span>Check Recipes</span></div></a></div>		</div>
				</div>
				<div class="elementor-element elementor-element-4c7fc6d start wdt-cus-fill3-counter animated-slow elementor-invisible elementor-widget elementor-widget-wdt-counter" data-id="4c7fc6d" data-element_type="widget" data-settings="{&quot;columns_mobile_extra&quot;:&quot;2&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;columns&quot;:2,&quot;columns_laptop&quot;:2,&quot;columns_tablet_extra&quot;:2,&quot;columns_tablet&quot;:2,&quot;columns_mobile&quot;:1,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-counter.default">
				<div class="elementor-widget-container">
			<div class="wdt-counter-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template" id="wdt-counter-4c7fc6d" data-settings=""><div class="wdt-column-wrapper wdt-column-gap-custom " data-column-settings="" data-module-id="wdt-module-id-4c7fc6d" id="wdt-module-id-4c7fc6d"><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-counter-wrapper"><div class="wdt-content-counter"><span class="wdt-content-counter-number" data-from="0" data-to="0" data-speed="1000" data-refresh-interval="100"></span><span class="wdt-content-counter-suffix">k+</span></div></div><div class="wdt-content-title"><h5>Perfect Recipes</h5></div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-counter-wrapper"><div class="wdt-content-counter"><span class="wdt-content-counter-number" data-from="0" data-to="0" data-speed="1000" data-refresh-interval="100"></span><span class="wdt-content-counter-suffix">+</span></div></div><div class="wdt-content-title"><h5>Diet Plan</h5></div></div></div></div></div></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-bf9a5a6" data-id="bf9a5a6" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-819358e wdt-cus-fill3-img01 animated-slow elementor-invisible elementor-widget elementor-widget-image" data-id="819358e" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img decoding="async" width="1000" height="1124" src="img/women.jpg" class="attachment-full size-full wp-image-657" alt="" srcset="img/women.jpg 1000w, img/women.jpg 267w, img/women.jpg 911w, img/women.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" />													</div>
				</div>
				<div class="elementor-element elementor-element-73e2449 elementor-widget__width-initial elementor-absolute elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon" data-id="73e2449" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;mouse-move&quot;,&quot;wdt_mme_depth&quot;:{&quot;unit&quot;:&quot;dpt&quot;,&quot;size&quot;:0.2,&quot;sizes&quot;:[]},&quot;wdt_mme_invert_movement&quot;:&quot;true&quot;,&quot;wdt_mme_speed&quot;:{&quot;unit&quot;:&quot;ms&quot;,&quot;size&quot;:0.1,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_move_along&quot;:&quot;both&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250 22" style="enable-background:new 0 0 250 22;" xml:space="preserve"><g>	<path d="M233,17.3c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8c-10.7,0-15.9,2.8-21.4,5.8c-5.4,2.9-10.9,5.9-21.8,5.9  c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8S87.5,8.5,82,11.4c-5.4,2.9-10.9,5.9-21.8,5.9s-16.5-3-21.8-5.9  c-5.5-3-10.7-5.8-21.4-5.8v-1c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9  c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9c10.9,0,16.5,3,21.8,5.9  c5.5,3,10.7,5.8,21.4,5.8V17.3z"></path></g></svg>			</div>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-22399fa elementor-widget__width-initial elementor-absolute elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon" data-id="22399fa" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;mouse-move&quot;,&quot;wdt_mme_depth&quot;:{&quot;unit&quot;:&quot;dpt&quot;,&quot;size&quot;:0.2,&quot;sizes&quot;:[]},&quot;wdt_mme_speed&quot;:{&quot;unit&quot;:&quot;ms&quot;,&quot;size&quot;:0.1,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_move_along&quot;:&quot;both&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250 22" style="enable-background:new 0 0 250 22;" xml:space="preserve"><g>	<path d="M233,17.3c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8c-10.7,0-15.9,2.8-21.4,5.8c-5.4,2.9-10.9,5.9-21.8,5.9  c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8S87.5,8.5,82,11.4c-5.4,2.9-10.9,5.9-21.8,5.9s-16.5-3-21.8-5.9  c-5.5-3-10.7-5.8-21.4-5.8v-1c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9  c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9c10.9,0,16.5,3,21.8,5.9  c5.5,3,10.7,5.8,21.4,5.8V17.3z"></path></g></svg>			</div>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-6134546 elementor-widget__width-auto elementor-absolute wdt-cus-iconbox-fill3 animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-icon-box" data-id="6134546" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-icon-box.default">
				<div class="elementor-widget-container">
			<div class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-default" id="wdt-icon-box-6134546"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-icon-wrapper"><div class="wdt-content-icon"><span><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></span></div></div><div class="wdt-content-title"><h5>Healthy &amp; Easy</h5></div></div><div class="wdt-content-detail-group"></div></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-763caa6 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile wdt-cus-sun animated-slow elementor-view-default elementor-invisible elementor-widget elementor-widget-icon" data-id="763caa6" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:200,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 300 200" style="enable-background:new 0 0 300 200;" xml:space="preserve"><g class="wdt-sun-rays">	<g class="wdt-sun-rays1">		<path d="M241.8,138.5H199c-0.8-27.1-22.4-48.9-49-48.9c-26.5,0-48.2,21.8-49,48.9H58.2c-0.8,0-1.4,0.6-1.4,1.5   c0,0.8,0.6,1.5,1.4,1.5h183.6c0.8,0,1.4-0.7,1.4-1.5C243.2,139.1,242.6,138.5,241.8,138.5L241.8,138.5z M150,92.5   c25,0,45.4,20.5,46.1,46h-92.3C104.6,113,125,92.5,150,92.5z"></path>		<path d="M223.1,159.8c-6.4,0-9.6,1.5-12.8,2.9c-3,1.4-5.8,2.6-11.6,2.6s-8.6-1.3-11.6-2.6c-3.1-1.4-6.4-2.9-12.8-2.9   s-9.6,1.5-12.8,2.9c-3,1.4-5.8,2.6-11.6,2.6s-8.6-1.3-11.6-2.6c-3.1-1.4-6.4-2.9-12.8-2.9c-6.4,0-9.6,1.5-12.8,2.9   c-3,1.4-5.8,2.6-11.6,2.6c-5.8,0-8.6-1.3-11.6-2.6c-3.1-1.4-6.4-2.9-12.8-2.9c-0.8,0-1.4,0.7-1.4,1.5s0.6,1.5,1.4,1.5   c5.8,0,8.6,1.3,11.6,2.6c3.1,1.4,6.4,2.9,12.8,2.9s9.6-1.5,12.8-2.9c3-1.4,5.8-2.6,11.6-2.6c5.8,0,8.6,1.3,11.6,2.6   c3.1,1.4,6.4,2.9,12.8,2.9s9.6-1.5,12.8-2.9c3-1.4,5.8-2.6,11.6-2.6s8.6,1.3,11.6,2.6c3.1,1.4,6.4,2.9,12.8,2.9   c6.4,0,9.6-1.5,12.8-2.9c3-1.4,5.8-2.6,11.6-2.6c0.8,0,1.4-0.7,1.4-1.5C224.5,160.4,223.9,159.8,223.1,159.8z"></path>		<path d="M193.2,194.7c-5.1,0-7.5-1.3-10.2-2.6c-2.8-1.4-5.7-2.9-11.4-2.9s-8.6,1.5-11.4,2.9c-2.6,1.3-5.1,2.6-10.2,2.6   c-5.1,0-7.6-1.3-10.2-2.6c-2.8-1.4-5.7-2.9-11.4-2.9s-8.6,1.5-11.4,2.9c-2.6,1.3-5.1,2.6-10.2,2.6c-0.8,0-1.4,0.7-1.4,1.5   s0.6,1.5,1.4,1.5c5.7,0,8.6-1.5,11.4-2.9c2.6-1.3,5.1-2.6,10.2-2.6c5.1,0,7.5,1.3,10.2,2.6c2.8,1.4,5.7,2.9,11.4,2.9   s8.6-1.5,11.4-2.9c2.6-1.3,5.1-2.6,10.2-2.6c5.1,0,7.5,1.3,10.2,2.6c2.8,1.4,5.7,2.9,11.4,2.9c0.8,0,1.4-0.6,1.4-1.5   C194.6,195.3,194,194.7,193.2,194.7z"></path>	</g>	<g class="wdt-sun-rays2">		<g>			<path d="M150,75.2c0.8,0,1.4-0.7,1.4-1.5V15.1c0-0.8-0.6-1.5-1.4-1.5c-0.8,0-1.4,0.7-1.4,1.5v58.6    C148.6,74.5,149.2,75.2,150,75.2z"></path>		</g>		<g>			<path d="M132,76.4c0.2,0.6,0.7,1.1,1.4,1.1c0.1,0,0.2,0,0.4-0.1c0.8-0.2,1.2-1,1-1.8l-5.9-22.5c-0.2-0.8-1-1.2-1.7-1    c-0.8,0.2-1.2,1-1,1.8L132,76.4z"></path>			<path d="M121.3,35.2c0.2,0.6,0.7,1.1,1.4,1.1c0.1,0,0.2,0,0.4-0.1c0.8-0.2,1.2-1,1-1.8l-8.1-31c-0.2-0.8-1-1.2-1.7-1    c-0.8,0.2-1.2,1-1,1.8L121.3,35.2L121.3,35.2z"></path>		</g>		<g>			<path d="M116.6,83.3c0.3,0.5,0.7,0.7,1.2,0.7c0.2,0,0.5-0.1,0.7-0.2c0.7-0.4,0.9-1.3,0.5-2L90.5,31.1c-0.4-0.7-1.3-0.9-1.9-0.5    s-0.9,1.3-0.5,2L116.6,83.3L116.6,83.3z"></path>		</g>		<g>			<path d="M103.5,94.2c0.3,0.3,0.6,0.4,1,0.4s0.7-0.1,1-0.4c0.6-0.6,0.6-1.5,0-2.1l-16-16.4c-0.6-0.6-1.4-0.6-2,0s-0.6,1.5,0,2.1    L103.5,94.2L103.5,94.2z"></path>			<path d="M74.2,64.1c0.3,0.3,0.6,0.4,1,0.4s0.7-0.1,1-0.4c0.6-0.6,0.6-1.5,0-2.1L54.1,39.3c-0.6-0.6-1.4-0.6-2,0s-0.6,1.5,0,2.1    L74.2,64.1L74.2,64.1z"></path>		</g>		<g>			<path d="M44.2,78.8l49.4,29.3c0.2,0.1,0.5,0.2,0.7,0.2c0.5,0,1-0.3,1.2-0.7c0.4-0.7,0.2-1.6-0.5-2L45.6,76.3    c-0.7-0.4-1.5-0.2-1.9,0.5C43.2,77.5,43.5,78.4,44.2,78.8L44.2,78.8z"></path>		</g>		<g>			<path d="M66.3,115.4c-0.8-0.2-1.5,0.3-1.7,1c-0.2,0.8,0.2,1.6,1,1.8l21.8,6c0.1,0,0.2,0.1,0.4,0.1c0.6,0,1.2-0.4,1.4-1.1    c0.2-0.8-0.2-1.6-1-1.8L66.3,115.4L66.3,115.4z"></path>			<path d="M48.2,110.4L18,102.1c-0.8-0.2-1.5,0.3-1.7,1c-0.2,0.8,0.2,1.6,1,1.8l30.1,8.3c0.1,0,0.2,0.1,0.4,0.1    c0.6,0,1.2-0.4,1.4-1.1C49.4,111.4,48.9,110.6,48.2,110.4L48.2,110.4z"></path>		</g>		<g>			<path d="M166.3,77.4c0.1,0,0.2,0.1,0.4,0.1c0.6,0,1.2-0.4,1.4-1.1l5.9-22.5c0.2-0.8-0.2-1.6-1-1.8s-1.5,0.3-1.7,1l-5.9,22.5    C165.1,76.4,165.5,77.2,166.3,77.4z"></path>			<path d="M177,36.3c0.1,0,0.2,0.1,0.4,0.1c0.6,0,1.2-0.4,1.4-1.1l8.1-31c0.2-0.8-0.2-1.6-1-1.8s-1.5,0.3-1.7,1l-8.1,31    C175.8,35.3,176.3,36.1,177,36.3z"></path>		</g>		<g>			<path d="M181.5,83.9c0.2,0.1,0.5,0.2,0.7,0.2c0.5,0,1-0.3,1.2-0.7l28.5-50.8c0.4-0.7,0.2-1.6-0.5-2s-1.5-0.2-1.9,0.5L181,81.9    C180.6,82.6,180.8,83.5,181.5,83.9L181.5,83.9z"></path>		</g>		<g>			<path d="M210.5,75.7l-16,16.4c-0.6,0.6-0.6,1.5,0,2.1c0.3,0.3,0.6,0.4,1,0.4s0.7-0.1,1-0.4l16-16.4c0.6-0.6,0.6-1.5,0-2.1    C212,75.1,211.1,75.1,210.5,75.7L210.5,75.7z"></path>			<path d="M224.8,64.5c0.4,0,0.7-0.1,1-0.4l22.1-22.7c0.6-0.6,0.6-1.5,0-2.1s-1.4-0.6-2,0L223.8,62c-0.6,0.6-0.6,1.5,0,2.1    C224.1,64.3,224.4,64.5,224.8,64.5L224.8,64.5z"></path>		</g>		<g>			<path d="M204.5,107.6c0.3,0.5,0.7,0.7,1.2,0.7c0.2,0,0.5-0.1,0.7-0.2l49.4-29.3c0.7-0.4,0.9-1.3,0.5-2s-1.3-0.9-1.9-0.5    L205,105.6C204.4,106,204.2,106.9,204.5,107.6L204.5,107.6z"></path>		</g>		<g>			<path d="M233.7,115.4l-21.8,6c-0.8,0.2-1.2,1-1,1.8c0.2,0.6,0.7,1.1,1.4,1.1c0.1,0,0.2,0,0.4,0l21.8-6c0.8-0.2,1.2-1,1-1.8    C235.2,115.6,234.4,115.2,233.7,115.4L233.7,115.4z"></path>			<path d="M283.7,103.1c-0.2-0.8-1-1.2-1.7-1l-30.1,8.3c-0.8,0.2-1.2,1-1,1.8c0.2,0.6,0.7,1.1,1.4,1.1c0.1,0,0.2,0,0.4-0.1    l30.1-8.3C283.4,104.7,283.9,103.9,283.7,103.1L283.7,103.1z"></path>		</g>	</g></g></svg>			</div>
		</div>
				</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-1521fa0 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="1521fa0" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0eee5a5" data-id="0eee5a5" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-e5d349f wdt-cus-animation animated-slow elementor-invisible elementor-widget elementor-widget-wdt-animation" data-id="e5d349f" data-element_type="widget" data-settings="{&quot;wdt_mqa_direction&quot;:&quot;right-to-left&quot;,&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-animation.default">
				<div class="elementor-widget-container">
			<div class="wdt-animation-holder " id="wdt-animation-e5d349f" data-settings="{&quot;direction&quot;:&quot;right-to-left&quot;}"><div class="wdt-animation-wrapper"><div class="wdt-animation-main-marqee right-to-left"><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Bread omlette</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Avacado</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Curd curry </a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Dosa</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Rasam Rice</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Yogurt</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div></div><div class="wdt-animation-cloned-marqee"><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Curry Quinoa</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Roasted vegetable</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Shakshuka</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Salmom Salad</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Sweet Potato</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div><div class="wdt-animation-item text-item"><div class="wdt-animation-text"><a href="#">Wheat Berries</a></div></div><div class="wdt-animation-item icon-item"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></div></div></div></div>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-6a452bd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6a452bd" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d626118" data-id="d626118" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-d152ced elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d152ced" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-402ad48" data-id="402ad48" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-d415d48 elementor-widget__width-initial animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-heading" data-id="d415d48" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-d415d48"><h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Schedule For Healthy Foods</span></h2><div class="wdt-heading-content-wrapper">Eating food at specific times is important for maintaining good health and overall well-being. When we follow a regular eating schedule, our digestive system functions more efficiently, allowing the body to break down and absorb nutrients properly. A consistent meal routine also helps regulate metabolism, ensuring that the body gets a steady supply of energy throughout the day.</div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-0554b52 elementor-widget-tablet__width-inherit elementor-widget-mobile_extra__width-initial elementor-widget-mobile__width-inherit animated-slow elementor-invisible elementor-widget elementor-widget-wdt-events" data-id="0554b52" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;1&quot;,&quot;columns_laptop&quot;:&quot;1&quot;,&quot;columns_tablet_extra&quot;:&quot;3&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;columns_tablet&quot;:2,&quot;columns_mobile_extra&quot;:1,&quot;columns_mobile&quot;:1,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-events.default">
				<div class="elementor-widget-container">
			<div class="card-container" style="display: flex; justify-content: space-between; gap: 20px; padding: 20px; flex-wrap: wrap;">
  
  <!-- Card 1 -->
  <div class="card" style="width: 30%; min-width: 300px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <div class="card-image" style="height: 200px; overflow: hidden;">
      <img src="img/teen.webp" alt="Teenager" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="card-content" style="padding: 15px;">
      <h3 style="margin-top: 0;">Healthy recipes for Teenager</h3>
      <p>Oats smoothie, vegetable sandwich, sprouts chaat, fruit salad, banana shake, paneer wrap, boiled eggs, yogurt parfait, grilled corn, moong salad, dal cheela, dry fruits, whole wheat pasta.


.</p>
      <a href="recipeless18.php"><button style="padding: 8px 15px; background-color:#c1a78c; color: white; border: none; border-radius: 4px; cursor: pointer;">Find Out More</button></a>
    </div>
  </div>
  
  <!-- Card 2 -->
  <div class="card" style="width: 30%; min-width: 300px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <div class="card-image" style="height: 200px; overflow: hidden;">
      <img src="img/youth.jpeg" alt="Youth" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="card-content" style="padding: 15px;">
      <h3 style="margin-top: 0;">Healthy recipes for Youth</h3>
      <p>Healthy recipes for youth include oats smoothie, quinoa salad, vegetable wrap, sprouts chaat, fruit bowl, boiled eggs, dal cheela, paneer tikka, banana shake, yogurt parfait, moong salad, and dry fruits mix.
</p>
      <a href="login-signup.php"><button style="padding: 8px 15px; background-color:#c1a78c; color: white; border: none; border-radius: 4px; cursor: pointer;">Find Out More</button></a>
    </div>
  </div>
  
  <!-- Card 3 -->
  <div class="card" style="width: 30%; min-width: 300px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <div class="card-image" style="height: 200px; overflow: hidden;">
      <img src="img/older.jpg" alt="Older Adults" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="card-content" style="padding: 15px;">
      <h3 style="margin-top: 0;">Healthy recipes for Older</h3>
      <p>Healthy recipes for older adults include vegetable soup, dal khichdi, oats porridge, boiled veggies, fruit salad, curd rice, sprouted moong, dalia, steamed idli, herbal tea, soft chapati, and mashed sweet potato.
</p>
      <a href="login-signup.php"><button style="padding: 8px 15px; background-color: #c1a78c; color: white; border: none; border-radius: 4px; cursor: pointer;">Find Out More</button></a>
    </div>
  </div>
  
</div>	</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-40c2803 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="40c2803" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-affc9df" data-id="affc9df" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-8c72afb elementor-widget__width-initial center elementor-widget elementor-widget-wdt-heading" data-id="8c72afb" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-8c72afb"><h4 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Our Recent Recipes</span></h4><div class="wdt-heading-content-wrapper">Healthy recipes are a great way to enjoy delicious meals while nourishing the body with essential nutrients. They can be simple or elaborate, depending on the ingredients and cooking methods used. A well-balanced recipe includes a combination of proteins, healthy fats, fiber, and essential vitamins to promote overall well-being.</div></div>		</div>
				</div>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-ac9a2db elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="ac9a2db" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-aef31bf" data-id="aef31bf" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-e7d2c08 wdt-cus-blog elementor-widget-tablet__width-initial elementor-widget elementor-widget-wdt-blog-posts" data-id="e7d2c08" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-blog-posts.default">
				<div class="elementor-widget-container">
			<div class="wdt-posts-list-wrapper  wdt-post-list-carousel-e7d2c08" ><div class='tpl-blog-holder  apply-isotope '><div class='grid-sizer  entry-grid-layout wdt-simple-style wdt-fadeinleft-hover wdt-default-overlay alignleft column wdt-one-half wdt-post-entry '></div><div class=" entry-grid-layout wdt-simple-style wdt-fadeinleft-hover wdt-default-overlay alignleft column wdt-one-half wdt-post-entry  "><article id="post-4611" class="post-4611 post type-post status-publish format-standard has-post-thumbnail hentry category-happy-lifestyle blog-entry">


	<!-- Featured Image -->
	<div class="entry-thumb">
		
<a href="rasamrice.php" title="Permalink to Numerous Advantages Of Regular Meditation Practice"><img loading="lazy" loading="lazy" decoding="async"  style="height:16rem; object-fit:cover;"  src="img/rasamrice.jpg" class="attachment-wdt-blog-ii-column size-wdt-blog-ii-column wp-post-image" alt="" srcset="img/rasamrice.jpg 1700w, img/rasamrice.jpg 300w, img/rasamrice.jpg 1024w, img/rasamrice.jpg 768w, img/rasamrice.jpg 1536w, img/rasamrices.jpg 1000w" sizes="(max-width: 1700px) 100vw, 1700px" /></a>
        </div><!-- Featured Image --><div class="entry-meta-group">
<!-- Entry Date -->
<div class="entry-date">
	<i class="wdticon-calendar"> </i>
	February 23, 2025</div><!-- Entry Date -->
<!-- Entry Author -->
<div class="entry-author">
    <i class="wdticon-user"> </i>
    <a href="#"
        title="View all posts by developer">Admin</a>
</div><!-- Entry Author --></div>
<!-- Entry Title -->
<div class="entry-title">
	<h4>    	<a href="rasamrice.php" title="Permalink to Numerous Advantages Of Regular Meditation Practice">Rasam Rice</a>
	</h4>
</div><!-- Entry Title -->
<!-- Entry Button --><div class="entry-button wdt-core-button"><a href="rasamrice.php" title="Numerous Advantages Of Regular Meditation Practice" class="wdt-button">Read More<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 59" style="enable-background:new 0 0 100 59;" xml:space="preserve"><polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8 "></polygon></svg></span></a></div><!-- Entry Button --></article></div><div class=" entry-grid-layout wdt-simple-style wdt-fadeinleft-hover wdt-default-overlay alignleft column wdt-one-half wdt-post-entry  "><article id="post-4610" class="post-4610 post type-post status-publish format-standard has-post-thumbnail hentry category-fight-diseases category-fitness blog-entry">


	<!-- Featured Image -->
	<div class="entry-thumb">
		
<a href="oatmeal.php" title="Permalink to Yoga Asana Practices for Inner Calm And Relief from Stress"><img loading="lazy" loading="lazy" decoding="async" style="height:16rem; object-fit:cover;" src="img/oatmeals.jpg" class="attachment-wdt-blog-ii-column size-wdt-blog-ii-column wp-post-image" alt="" srcset="img/oatmeals.jpg 1700w, img/oatmeals.jpg 300w, img/oatmeals.jpg 1024w, img/oatmeals.jpg 768w, img/oatmeals.jpg 1536w, img/oatmeals.jpg 1000w" sizes="(max-width: 1700px) 100vw, 1700px" /></a>
        </div><!-- Featured Image --><div class="entry-meta-group">
<!-- Entry Date -->
<div class="entry-date">
	<i class="wdticon-calendar"> </i>
	February 24, 2025</div><!-- Entry Date -->
<!-- Entry Author -->
<div class="entry-author">
    <i class="wdticon-user"> </i>
    <a href="#"
        title="View all posts by developer">Admin</a>
</div><!-- Entry Author --></div>
<!-- Entry Title -->
<div class="entry-title">
	<h4>    	<a href="oatmeal.php" title="Permalink to Yoga Asana Practices for Inner Calm And Relief from Stress">Oatmeal with Fruits & Nuts</a>
	</h4>
</div><!-- Entry Title -->
<!-- Entry Button --><div class="entry-button wdt-core-button"><a href="oatmeal.php" title="Yoga Asana Practices for Inner Calm And Relief from Stress" class="wdt-button">Read More<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 59" style="enable-background:new 0 0 100 59;" xml:space="preserve"><polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8 "></polygon></svg></span></a></div><!-- Entry Button --></article></div><div class=" entry-grid-layout wdt-simple-style wdt-fadeinleft-hover wdt-default-overlay alignleft column wdt-one-half wdt-post-entry  "><article id="post-4609" class="post-4609 post type-post status-publish format-standard has-post-thumbnail hentry category-flexibility blog-entry">


	<!-- Featured Image -->
	<div class="entry-thumb">
		
<a href="avacadotoast.php" title="Permalink to The Best Backaches And Pain Relief Yoga Yoga Postures"><img loading="lazy" loading="lazy" decoding="async" style="height:16rem; object-fit:cover;" src="img/avacado.jpg" class="attachment-wdt-blog-ii-column size-wdt-blog-ii-column wp-post-image" alt="" srcset="img/avacado.jpg 1700w, img/avacado.jpg 300w, img/avacado.jpg 1024w, img/avacado.jpg 768w, img/avacado.jpg 1536w, img/avacado.jpg 1000w" sizes="(max-width: 1700px) 100vw, 1700px" /></a>
        </div><!-- Featured Image --><div class="entry-meta-group">
<!-- Entry Date -->
<div class="entry-date">
	<i class="wdticon-calendar"> </i>
	February 26, 2025</div><!-- Entry Date -->
<!-- Entry Author -->
<div class="entry-author">
    <i class="wdticon-user"> </i>
    <a href="#"
        title="View all posts by developer">Admin</a>
</div><!-- Entry Author --></div>
<!-- Entry Title -->
<div class="entry-title">
	<h4>    	<a href="avacadotoast.php" title="Permalink to The Best Backaches And Pain Relief Yoga Yoga Postures">Avacado Toast with eggs</a>
	</h4>
</div><!-- Entry Title -->
<!-- Entry Button --><div class="entry-button wdt-core-button"><a href="avacadotoast.php" title="The Best Backaches And Pain Relief Yoga Yoga Postures" class="wdt-button">Read More<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 59" style="enable-background:new 0 0 100 59;" xml:space="preserve"><polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8 "></polygon></svg></span></a></div><!-- Entry Button --></article></div><div class=" entry-grid-layout wdt-simple-style wdt-fadeinleft-hover wdt-default-overlay alignleft column wdt-one-half wdt-post-entry  "><article id="post-4608" class="post-4608 post type-post status-publish format-standard has-post-thumbnail hentry category-happy-lifestyle blog-entry">


	<!-- Featured Image -->
	<div class="entry-thumb">
		
<a href="roastedvegetable.php" title="Permalink to How To Get Started With A Yoga Training Course Online"><img loading="lazy" loading="lazy" decoding="async" style="height:16rem; object-fit:cover;" src="img/roasted.jpg" class="attachment-wdt-blog-ii-column size-wdt-blog-ii-column wp-post-image" alt="" srcset="img/roasted.jpg 1700w, img/roasted.jpg 300w, img/roasted.jpg 1024w,img/roasted.jpg 768w, img/roasted.jpg 1536w, img/roasted.jpg 1000w" sizes="(max-width: 1700px) 100vw, 1700px" /></a>
        </div><!-- Featured Image --><div class="entry-meta-group">
<!-- Entry Date -->
<div class="entry-date">
	<i class="wdticon-calendar"> </i>
	February 28, 2025</div><!-- Entry Date -->
<!-- Entry Author -->
<div class="entry-author">
    <i class="wdticon-user"> </i>
    <a href="#"
        title="View all posts by developer">Admin</a>
</div><!-- Entry Author --></div>
<!-- Entry Title -->
<div class="entry-title">
	<h4>    	<a href="roastedvegetable.php" title="Permalink to How To Get Started With A Yoga Training Course Online">Roasted Vegetables</a>
	</h4>
</div><!-- Entry Title -->
<!-- Entry Button --><div class="entry-button wdt-core-button"><a href="roastedvegetable.php" title="How To Get Started With A Yoga Training Course Online" class="wdt-button">Read More<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 59" style="enable-background:new 0 0 100 59;" xml:space="preserve"><polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8 "></polygon></svg></span></a></div><!-- Entry Button --></article></div><div class=" entry-grid-layout wdt-simple-style wdt-fadeinleft-hover wdt-default-overlay alignleft column wdt-one-half wdt-post-entry  "><article id="post-4607" class="post-4607 post type-post status-publish format-standard has-post-thumbnail hentry category-mental-health blog-entry">


	<!-- Featured Image -->
	<div class="entry-thumb">
		
<a href="chaat.php" title="Permalink to Yoga Can Help You Make The Healthiest Changes In Your Life"><img loading="lazy" loading="lazy" decoding="async" style="height:16rem; object-fit:cover;" src="img/chaat.jpg" class="attachment-wdt-blog-ii-column size-wdt-blog-ii-column wp-post-image" alt="" srcset="img/roasted.jpg 1700w, img/chaat.jpg 300w, img/chaat.jpg 1024w, img/chaat.jpg 768w, img/chaat.jpg 1536w, img/chaat.jpg 1000w" sizes="(max-width: 1700px) 100vw, 1700px" /></a>
        </div><!-- Featured Image --><div class="entry-meta-group">
<!-- Entry Date -->
<div class="entry-date">
	<i class="wdticon-calendar"> </i>
	March 3, 2025</div><!-- Entry Date -->
<!-- Entry Author -->
<div class="entry-author">
    <i class="wdticon-user"> </i>
    <a href="#"
        title="View all posts by developer">Admin</a>
</div><!-- Entry Author --></div>
<!-- Entry Title -->
<div class="entry-title">
	<h4>    	<a href="chaat.php" title="Permalink to Yoga Can Help You Make The Healthiest Changes In Your Life">Sprouts Chaat</a>
	</h4>
</div><!-- Entry Title -->
<!-- Entry Button --><div class="entry-button wdt-core-button"><a href="chaat.php" title="Yoga Can Help You Make The Healthiest Changes In Your Life" class="wdt-button">Read More<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 59" style="enable-background:new 0 0 100 59;" xml:space="preserve"><polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8 "></polygon></svg></span></a></div><!-- Entry Button --></article></div><div class=" entry-grid-layout wdt-simple-style wdt-fadeinleft-hover wdt-default-overlay alignleft column wdt-one-half wdt-post-entry  "><article id="post-4606" class="post-4606 post type-post status-publish format-standard has-post-thumbnail hentry category-happy-lifestyle blog-entry">


	<!-- Featured Image -->
	<div class="entry-thumb">
		
<a href="pancakes.php" title="Permalink to Unwind, Practice Meditation, And Simply Be Present"><img loading="lazy" loading="lazy" decoding="async" style="height:16rem; object-fit:cover;" src="img/banana.jpg" class="attachment-wdt-blog-ii-column size-wdt-blog-ii-column wp-post-image" alt="" srcset="img/banana.jpg 1700w, img/banana.jpg 300w, img/banana.jpg 1024w, img/banana.jpg 768w, img/banana.jpg 1536w, img/banana.jpg 1000w" sizes="(max-width: 1700px) 100vw, 1700px" /></a>
        </div><!-- Featured Image --><div class="entry-meta-group">
<!-- Entry Date -->
<div class="entry-date">
	<i class="wdticon-calendar"> </i>
	March 5, 2025</div><!-- Entry Date -->
<!-- Entry Author -->
<div class="entry-author">
    <i class="wdticon-user"> </i>
    <a href="#"
        title="View all posts by developer">Admin</a>
</div><!-- Entry Author --></div>
<!-- Entry Title -->
<div class="entry-title">
	<h4>    	<a href="pancakes.php" title="Permalink to Unwind, Practice Meditation, And Simply Be Present">Oats and Banana Pancakes</a>
	</h4>
</div><!-- Entry Title -->
<!-- Entry Button --><div class="entry-button wdt-core-button"><a href="pancakes.php" title="Unwind, Practice Meditation, And Simply Be Present" class="wdt-button">Read More<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 59" style="enable-background:new 0 0 100 59;" xml:space="preserve"><polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8 "></polygon></svg></span></a></div><!-- Entry Button --></article></div><div class=" entry-grid-layout wdt-simple-style wdt-fadeinleft-hover wdt-default-overlay alignleft column wdt-one-half wdt-post-entry  "><article id="post-4605" class="post-4605 post type-post status-publish format-standard has-post-thumbnail hentry category-flexibility blog-entry">


	<!-- Featured Image -->
	<div class="entry-thumb">
		
<a href="palakdal.php" title="Permalink to Whenever You Are Under Stress, Keep Yoga In Mind"><img loading="lazy" loading="lazy" decoding="async" style="height:16rem; object-fit:cover;" src="img/paalak.jpg" class="attachment-wdt-blog-ii-column size-wdt-blog-ii-column wp-post-image" alt="" srcset="img/paalak.jpg 1700w, img/paalak.jpg 300w, img/paalak.jpg 1024w, img/paalak.jpg 768w, img/paalak.jpg 1536w, img/paalak.jpg 1000w" sizes="(max-width: 1700px) 100vw, 1700px" /></a>
        </div><!-- Featured Image --><div class="entry-meta-group">
<!-- Entry Date -->
<div class="entry-date">
	<i class="wdticon-calendar"> </i>
	March 8, 2025</div><!-- Entry Date -->
<!-- Entry Author -->
<div class="entry-author">
    <i class="wdticon-user"> </i>
    <a href="#"
        title="View all posts by developer">Admin</a>
</div><!-- Entry Author --></div>
<!-- Entry Title -->
<div class="entry-title">
	<h4>    	<a href="palakdal.php" title="Permalink to Whenever You Are Under Stress, Keep Yoga In Mind">Palak Dal</a>
	</h4>
</div><!-- Entry Title -->
<!-- Entry Button --><div class="entry-button wdt-core-button"><a href="palakdal.php" title="Whenever You Are Under Stress, Keep Yoga In Mind" class="wdt-button">Read More<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 59" style="enable-background:new 0 0 100 59;" xml:space="preserve"><polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8 "></polygon></svg></span></a></div><!-- Entry Button --></article></div><div class=" entry-grid-layout wdt-simple-style wdt-fadeinleft-hover wdt-default-overlay alignleft column wdt-one-half wdt-post-entry  "><article id="post-4604" class="post-4604 post type-post status-publish format-standard has-post-thumbnail hentry category-fitness blog-entry">


	<!-- Featured Image -->
	<div class="entry-thumb">
		
<a href="capsicum.php" title="Permalink to Realize That Choosing Happiness Is A Choice You Make With Us"><img loading="lazy" loading="lazy" decoding="async" style="height:16rem; object-fit:cover;" src="img/paneer.jpg" class="attachment-wdt-blog-ii-column size-wdt-blog-ii-column wp-post-image" alt="" srcset="img/paneer.jpg 1700w, img/paneer.jpg 300w, img/paneer.jpg 1024w, img/paneer.jpg 768w, img/paneer.jpg 1536w, img/paneer.jpg 1000w" sizes="(max-width: 1700px) 100vw, 1700px" /></a>
        </div><!-- Featured Image --><div class="entry-meta-group">
<!-- Entry Date -->
<div class="entry-date">
	<i class="wdticon-calendar"> </i>
	March 10, 2025</div><!-- Entry Date -->
<!-- Entry Author -->
<div class="entry-author">
    <i class="wdticon-user"> </i>
    <a href="#"
        title="View all posts by developer">Admin</a>
</div><!-- Entry Author --></div>
<!-- Entry Title -->
<div class="entry-title">
	<h4>    	<a href="capsicum.php" title="Permalink to Realize That Choosing Happiness Is A Choice You Make With Us">Stuffed Capsicum with Paneer & Millet</a>
	</h4>
</div><!-- Entry Title -->
<!-- Entry Button --><div class="entry-button wdt-core-button"><a href="capsicum.php" title="Realize That Choosing Happiness Is A Choice You Make With Us" class="wdt-button">Read More<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 59" style="enable-background:new 0 0 100 59;" xml:space="preserve"><polygon points="59.9,6.1 79.4,25.7 6,25.7 6,33.3 79.4,33.3 59.9,52.9 65.3,58.2 94,29.5 65.3,0.8 "></polygon></svg></span></a></div><!-- Entry Button --></article></div></div><div class="pagination blog-pagination"><div class="column one pager_wrapper"><ul class='page-numbers'>
	<li><span aria-current="page" class="page-numbers current">1</span></li>
	<li><a class="page-numbers" href="#">2</a></li>
	<li><a class="page-numbers" href="#">3</a></li>
	<li><a class="next page-numbers" href="#"><i class="wdticon-angle-double-right"></i></a></li>
</ul>
</div>
</div></div>		</div>
				</div>
					</div>
		</div>
				<div class="wdt-sticky-column elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2b6198d" data-wdt-settings="{&quot;id&quot;:&quot;2b6198d&quot;,&quot;sticky&quot;:true,&quot;topSpacing&quot;:50,&quot;bottomSpacing&quot;:50,&quot;stickyOn&quot;:[&quot;desktop&quot;,&quot;laptop&quot;,&quot;tablet_extra&quot;],&quot;overflowHidden&quot;:false}" data-id="2b6198d" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-8ede36e elementor-widget-tablet__width-initial elementor-widget elementor-widget-sidebar" data-id="8ede36e" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="sidebar.default">
				<div class="elementor-widget-container">
			<aside id="mantras_recent_posts-2" class="widget widget_recent_posts"><h2 class="widgettitle align">User recipes</h2><div class='recent-posts-widget'><ul><li><div class='entry-image'><a href='#' class='thumb'><img  style="height:6rem; object-fit:cover;" src='img/quinao.jpg' alt='Discover The Most Effective Poses To Keep Yourself Fit'></a></div><div class="post-details"><div class="entry-meta"><p> <span class="wdticon-date-o"> </span> February 26, 2025</p><p> <span class="wdticon-author-icon"> </span> User</p></div><div class='entry-title'><h4><a href='#'>Quinoa & Vegetables bowl with Yogurt dressing</a></h4></div></div></li><li><div class='entry-image'><a href='' class='thumb'><img "height:6rem; object-fit:cover;" src='img/dosa.jpg' alt='Numerous Advantages Of Regular Meditation Practice'></a></div><div class="post-details"><div class="entry-meta"><p> <span class="wdticon-date-o"> </span> February 28, 2025</p><p> <span class="wdticon-author-icon"> </span> User</p></div><div class='entry-title'><h4><a href='#'>Mixed lentil Dosa with Coconut Chutney</a></h4></div></div></li><li><div class='entry-image'><a href='#' class='thumb'><img "height:5rem; object-fit:cover;" src='img/paratha.jpg' alt='Yoga Asana Practices for Inner Calm And Relief from Stress'></a></div><div class="post-details"><div class="entry-meta"><p> <span class="wdticon-date-o"> </span> March 02, 2025</p><p> <span class="wdticon-author-icon"> </span> User</p></div><div class='entry-title'><h4><a href='#'>Stuffed Paratha with Spinach & Paneer</a></h4></div></div></li><li><div class='entry-image'><a href='#' class='thumb'><img src='img/soya.jpg' alt='The Best Backaches And Pain Relief Yoga Yoga Postures'></a></div><div class="post-details"><div class="entry-meta"><p> <span class="wdticon-date-o"> </span> March 05, 2025</p><p> <span class="wdticon-author-icon"> </span> User</p></div><div class='entry-title'><h4><a href='#'>Soya Chunk Curry With Brown Rice</a></h4></div></div></li></ul></div></aside><aside id="mantras_advance_template-2" class="widget widget_advance_template"><div class="wdt-widget-advanced-template-group">		<div data-elementor-type="page" data-elementor-id="699" class="elementor elementor-699">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-1cac58d elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="1cac58d" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6e1d32f" data-id="6e1d32f" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-d25a18f elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d25a18f" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
							<div class="elementor-background-overlay"></div>
							<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6a2f2d5" data-id="6a2f2d5" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-fd2e120 elementor-widget elementor-widget-image" data-id="fd2e120" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="900" height="1180" src="img/soya.jpg" class="attachment-full size-full wp-image-815" alt="" srcset="img/soya.jpg 900w, img/soya.jpg 229w, img/soya.jpg 781w, img/soya.jpg 768w" sizes="(max-width: 900px) 100vw, 900px" />													</div>
				</div>
				<div class="elementor-element elementor-element-89b331f elementor-absolute wdt-custom-btn  wdt-custom-sidbar-banner center elementor-widget elementor-widget-wdt-image-box" data-id="89b331f" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;1&quot;,&quot;columns_laptop&quot;:&quot;1&quot;,&quot;columns_tablet_extra&quot;:&quot;1&quot;,&quot;columns_tablet&quot;:&quot;1&quot;,&quot;_position&quot;:&quot;absolute&quot;,&quot;columns_mobile_extra&quot;:1,&quot;columns_mobile&quot;:1,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-image-box.default">
				<div class="elementor-widget-container">
			<div class="wdt-image-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template" id="wdt-image-box-89b331f" data-settings="{&quot;enable_popup&quot;:&quot;&quot;,&quot;enable_hover_class&quot;:&quot;&quot;}"><div class="wdt-column-wrapper wdt-column-gap-no " data-column-settings="" data-module-id="wdt-module-id-89b331f" id="wdt-module-id-89b331f"><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" style="color:white;">Quick Banana Smoothie</a></h5></div></div><div class="wdt-content-detail-group"   style="color:white;"><div class="wdt-content-description">Ingredients:
1 banana
1 cup milk (or almond milk)
5 almonds (soaked & peeled)
1 tsp honey (optional)
½ tsp cinnamon (optional)
Instructions:
Blend all ingredients until smooth.
Pour into a glass and enjoy! 😊
</div></div>
				</div>
					</div>
		</div>
					</div>
		</section>
				<div class="elementor-element elementor-element-1bae445 start elementor-widget elementor-widget-wdt-heading" data-id="1bae445" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-1bae445"><h4 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Our Social Media</span></h4></div>		</div>
				</div>
				<div class="elementor-element elementor-element-7b1f340 elementor-icon-list--layout-inline wdt-custom-sidebar-icon elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="7b1f340" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items elementor-inline-items">
							<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">

												<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M98,50.05c0,23.72-17.59,43.46-40.35,47.21V63.79h11.1l2.17-13.74H57.62V41.12c0-3.75,1.91-7.54,7.87-7.54h5.93V22a62.62,62.62,0,0,0-10.81-1.09c-10.83,0-18.15,6.46-18.15,18.62V50.05H30.3V63.79H42.46V97.26C19.73,93.51,2.14,73.77,2.14,50.05a47.92,47.92,0,0,1,95.83,0Z"></path></svg>						</span>
										<span class="elementor-icon-list-text"></span>
											</a>
									</li>
								<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">

												<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M50.07,2A47.77,47.77,0,1,0,98,49.77,47.76,47.76,0,0,0,50.07,2ZM78.21,60.81A16.84,16.84,0,0,1,61.44,77.55H39a16.84,16.84,0,0,1-16.8-16.74V38.44A16.84,16.84,0,0,1,39,21.7H61.44A16.84,16.84,0,0,1,78.21,38.44Z"></path><path d="M61.44,27.07H39A11.55,11.55,0,0,0,27.31,38.7V61.11A11.54,11.54,0,0,0,39,72.7H61.44A11.54,11.54,0,0,0,73.07,61.11V38.7A11.72,11.72,0,0,0,61.44,27.07ZM50.34,63.51a13.76,13.76,0,1,1,13.8-13.74A13.83,13.83,0,0,1,50.34,63.51ZM64.93,38.14a3.23,3.23,0,1,1,0-6.46,3.23,3.23,0,1,1,0,6.46Z"></path><path d="M59.26,49.77a8.93,8.93,0,1,1-8.92-8.93A8.93,8.93,0,0,1,59.26,49.77Z"></path></svg>						</span>
										<span class="elementor-icon-list-text"></span>
											</a>
									</li>
								<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">

												<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M50,2A47.77,47.77,0,1,0,98,49.77,47.75,47.75,0,0,0,50,2Zm9.72,71.23-.13-.17-13-17.69L30.34,73.23H24.93L44.21,52.14l-19-25.83H40.62l.13.17,12,16.24,15-16.41H73L55.11,46l20,27.25Z"></path><polygon points="67.27 69.24 61.7 69.24 33.07 30.3 38.64 30.3 67.27 69.24"></polygon></svg>						</span>
										<span class="elementor-icon-list-text"></span>
											</a>
									</li>
								<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">

												<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M96.06,49.37a46.39,46.39,0,0,1-46.37,46.4h0A46.51,46.51,0,0,1,38.84,94.5l5.23-24.76a15.92,15.92,0,0,0,11,3.78,23.4,23.4,0,0,0,11.84-3.71,21.22,21.22,0,0,0,8.32-9.3A27.27,27.27,0,0,0,77.4,47.05,27.77,27.77,0,0,0,73,34.13,27.45,27.45,0,0,0,62.89,24.9a27.89,27.89,0,0,0-26.43,0A27.45,27.45,0,0,0,26.4,34.13,27.77,27.77,0,0,0,22,47.05a27.27,27.27,0,0,0,2.22,13.46,4.61,4.61,0,0,0,2.54,2.35,4.45,4.45,0,0,0,3.49-.1,4.56,4.56,0,0,0,2.45-2.47,4.63,4.63,0,0,0,0-3.49,18.93,18.93,0,0,1-1.53-8,18.6,18.6,0,0,1,2.07-7.91,18.89,18.89,0,0,1,5.27-6.25A18.6,18.6,0,0,1,61.37,35a18.85,18.85,0,0,1,5.05,6.41,18.4,18.4,0,0,1,1.81,8c0,5.08-1.88,9.84-6.29,12.6a14.07,14.07,0,0,1-7.08,2.25,6.51,6.51,0,0,1-5.07-1.84c-1.18-1.2-2.35-3.55-2.42-7.9-.06-2.79,1.05-5.11,2.32-11.11A4.68,4.68,0,0,0,49,39.94a4.75,4.75,0,0,0-2.92-2,4.57,4.57,0,0,0-3.45.64,4.74,4.74,0,0,0-2,2.89L30,91.39a46.38,46.38,0,1,1,66.05-42Z"></path></svg>						</span>
										<span class="elementor-icon-list-text"></span>
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
		</div></aside>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-f0e2373 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="f0e2373" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3d50764" data-id="3d50764" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-57e76b3 wdt-cus-testimonial-type1 center elementor-invisible elementor-widget elementor-widget-wdt-testimonial" data-id="57e76b3" data-element_type="widget" data-settings="{&quot;slides_to_show_opts&quot;:&quot;1&quot;,&quot;slides_to_show_opts_laptop&quot;:&quot;1&quot;,&quot;slides_to_show_opts_tablet_extra&quot;:&quot;1&quot;,&quot;slides_to_show_opts_tablet&quot;:&quot;1&quot;,&quot;effect&quot;:&quot;fade&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;direction&quot;:&quot;horizontal&quot;,&quot;slides_to_show_opts_mobile_extra&quot;:1,&quot;slides_to_show_opts_mobile&quot;:1,&quot;slides_to_scroll_opts&quot;:&quot;single&quot;,&quot;mouse_wheel_scroll&quot;:&quot;false&quot;,&quot;pagination&quot;:&quot;bullets&quot;,&quot;speed&quot;:300,&quot;gap&quot;:{&quot;unit&quot;:&quot;dpt&quot;,&quot;size&quot;:20,&quot;sizes&quot;:[]},&quot;gap_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;gap_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;gap_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;allow_touch&quot;:&quot;yes&quot;,&quot;loop&quot;:&quot;yes&quot;,&quot;centered_slides&quot;:&quot;no&quot;,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-testimonial.default">
				<div class="elementor-widget-container">
			<div class="wdt-testimonial-holder  wdt-content-item-holder wdt-carousel-holder wdt-rc-template-custom-template" id="wdt-testimonial-57e76b3" data-id="57e76b3" data-settings=""><div class="wdt-testimonial-container swiper" data-settings="{&quot;direction&quot;:&quot;horizontal&quot;,&quot;effect&quot;:&quot;fade&quot;,&quot;slides_to_show&quot;:&quot;1&quot;,&quot;slides_to_scroll&quot;:1,&quot;arrows&quot;:&quot;&quot;,&quot;pagination&quot;:&quot;bullets&quot;,&quot;mouse_wheel_scroll&quot;:&quot;false&quot;,&quot;speed&quot;:300,&quot;autoplay&quot;:&quot;&quot;,&quot;autoplay_speed&quot;:null,&quot;autoplay_direction&quot;:null,&quot;allow_touch&quot;:&quot;yes&quot;,&quot;loop&quot;:&quot;yes&quot;,&quot;centered_slides&quot;:&quot;no&quot;,&quot;pause_on_interaction&quot;:null,&quot;overflow_type&quot;:&quot;&quot;,&quot;overflow_opacity&quot;:&quot;&quot;,&quot;unequal_height_compatability&quot;:null,&quot;gap&quot;:20,&quot;responsive&quot;:[{&quot;breakpoint&quot;:319,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:480,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:768,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:1025,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:1281,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:1541,&quot;toshow&quot;:1,&quot;toscroll&quot;:1}],&quot;space_between_gaps&quot;:{&quot;desktop&quot;:20,&quot;mobile&quot;:20,&quot;mobile_extra&quot;:20,&quot;tablet&quot;:20,&quot;tablet_extra&quot;:20,&quot;laptop&quot;:20}}" id="wdt-testimonial-swiper-57e76b3"><div class="wdt-testimonial-wrapper swiper-wrapper"><div class="swiper-slide"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><span><img loading="lazy" loading="lazy" decoding="async"  style="height:20rem; width:40rem; object-fit:cover;" src="img/food.jpg" class="attachment-full size-full wp-image-631" alt="" srcset="img/food.jpg 800w, img/food.jpg 300w, img/food.jpg 768w" sizes="(max-width: 800px) 100vw, 800px" /></span></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-icon-wrapper"><div class="wdt-content-icon"><span><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 32" style="enable-background:new 0 0 50 32;" xml:space="preserve"><g>	<g>		<g>			<path d="M2.2,22h8.4c1.4,0,2.2,1.5,1.4,2.6l-3.8,5.5c-0.6,0.8,0,1.9,1,1.9h6.1c0.4,0,0.8-0.2,1-0.5l6.3-9.2    c0.1-0.2,0.2-0.5,0.2-0.7V1.3c0-0.7-0.6-1.3-1.2-1.3H2.2C1.6,0,1,0.6,1,1.3v19.5C1,21.4,1.6,22,2.2,22z"></path>			<path d="M27.1,1.3v19.5c0,0.7,0.6,1.3,1.2,1.3h8.4c1.4,0,2.2,1.5,1.4,2.6l-3.7,5.5c-0.6,0.8,0,1.9,1,1.9h6.1c0.4,0,0.8-0.2,1-0.5    l6.3-9.2c0.1-0.2,0.2-0.5,0.2-0.7V1.3C49,0.6,48.5,0,47.8,0H28.3C27.6,0,27.1,0.6,27.1,1.3z"></path>		</g>	</g></g></svg></i></span></div></div><div class="wdt-rating-container"><ul class="wdt-rating"><li><span class="fas fa-star" data-value="1"></span></li><li><span class="fas fa-star" data-value="2"></span></li><li><span class="fas fa-star" data-value="3"></span></li><li><span class="fas fa-star" data-value="4"></span></li><li><span class="fas fa-star" data-value="5"></span></li></ul></div><div class="wdt-content-description">We need healthy meals to keep our body strong and full of energy. They help us stay fit, fight diseases, and keep our heart, brain, and stomach healthy.</div><div class="wdt-content-title-group below"><div class="wdt-content-title"><h5></h5></div><span></span><div class="wdt-content-subtitle"> </div></div></div></div></div><div class="swiper-slide"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><span><img loading="lazy" loading="lazy" decoding="async" width="800" height="600" src="#" class="attachment-full size-full wp-image-4824" alt="" srcset="# 800w, # 300w, # 768w" sizes="(max-width: 800px) 100vw, 800px" /></span></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-icon-wrapper"><div class="wdt-content-icon"><span><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 32" style="enable-background:new 0 0 50 32;" xml:space="preserve"><g>	<g>		<g>			<path d="M2.2,22h8.4c1.4,0,2.2,1.5,1.4,2.6l-3.8,5.5c-0.6,0.8,0,1.9,1,1.9h6.1c0.4,0,0.8-0.2,1-0.5l6.3-9.2    c0.1-0.2,0.2-0.5,0.2-0.7V1.3c0-0.7-0.6-1.3-1.2-1.3H2.2C1.6,0,1,0.6,1,1.3v19.5C1,21.4,1.6,22,2.2,22z"></path>			<path d="M27.1,1.3v19.5c0,0.7,0.6,1.3,1.2,1.3h8.4c1.4,0,2.2,1.5,1.4,2.6l-3.7,5.5c-0.6,0.8,0,1.9,1,1.9h6.1c0.4,0,0.8-0.2,1-0.5    l6.3-9.2c0.1-0.2,0.2-0.5,0.2-0.7V1.3C49,0.6,48.5,0,47.8,0H28.3C27.6,0,27.1,0.6,27.1,1.3z"></path>		</g>	</g></g></svg></i></span></div></div><div class="wdt-rating-container"><ul class="wdt-rating"><li><span class="fas fa-star" data-value="1"></span></li><li><span class="fas fa-star" data-value="2"></span></li><li><span class="fas fa-star" data-value="3"></span></li><li><span class="fas fa-star" data-value="4"></span></li><li><span class="fas fa-star" data-value="5"></span></li></ul></div><div class="wdt-content-description">”We need healthy meals to keep our body strong and full of energy. They help us stay fit, fight diseases, and keep our heart, brain, and stomach healthy.”</div><div class="wdt-content-title-group below"><div class="wdt-content-title"><h5></h5></div><span></span><div class="wdt-content-subtitle"> -</div></div></div></div></div><div class="swiper-slide"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><span><img loading="lazy" loading="lazy" decoding="async" width="800" height="600" src="#" class="attachment-full size-full wp-image-4825" alt="" srcset="# 800w, # 300w, # 768w" sizes="(max-width: 800px) 100vw, 800px" /></span></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-icon-wrapper"><div class="wdt-content-icon"><span><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 32" style="enable-background:new 0 0 50 32;" xml:space="preserve"><g>	<g>		<g>			<path d="M2.2,22h8.4c1.4,0,2.2,1.5,1.4,2.6l-3.8,5.5c-0.6,0.8,0,1.9,1,1.9h6.1c0.4,0,0.8-0.2,1-0.5l6.3-9.2    c0.1-0.2,0.2-0.5,0.2-0.7V1.3c0-0.7-0.6-1.3-1.2-1.3H2.2C1.6,0,1,0.6,1,1.3v19.5C1,21.4,1.6,22,2.2,22z"></path>			<path d="M27.1,1.3v19.5c0,0.7,0.6,1.3,1.2,1.3h8.4c1.4,0,2.2,1.5,1.4,2.6l-3.7,5.5c-0.6,0.8,0,1.9,1,1.9h6.1c0.4,0,0.8-0.2,1-0.5    l6.3-9.2c0.1-0.2,0.2-0.5,0.2-0.7V1.3C49,0.6,48.5,0,47.8,0H28.3C27.6,0,27.1,0.6,27.1,1.3z"></path>		</g>	</g></g></svg></i></span></div></div><div class="wdt-rating-container"><ul class="wdt-rating"><li><span class="fas fa-star" data-value="1"></span></li><li><span class="fas fa-star" data-value="2"></span></li><li><span class="fas fa-star" data-value="3"></span></li><li><span class="fas fa-star" data-value="4"></span></li><li><span class="fas fa-star" data-value="5"></span></li></ul></div><div class="wdt-content-description">”We need healthy meals to keep our body strong and full of energy. They help us stay fit, fight diseases, and keep our heart, brain, and stomach healthy.”</div><div class="wdt-content-title-group below"><div class="wdt-content-title"><h5></h5></div><span></span><div class="wdt-content-subtitle"> -</div></div></div></div></div><div class="swiper-slide"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><span><img loading="lazy" loading="lazy" decoding="async" width="800" height="600" src="#" class="attachment-full size-full wp-image-4826" alt="" srcset="#800w, # 300w, # 768w" sizes="(max-width: 800px) 100vw, 800px" /></span></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-icon-wrapper"><div class="wdt-content-icon"><span><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 32" style="enable-background:new 0 0 50 32;" xml:space="preserve"><g>	<g>		<g>			<path d="M2.2,22h8.4c1.4,0,2.2,1.5,1.4,2.6l-3.8,5.5c-0.6,0.8,0,1.9,1,1.9h6.1c0.4,0,0.8-0.2,1-0.5l6.3-9.2    c0.1-0.2,0.2-0.5,0.2-0.7V1.3c0-0.7-0.6-1.3-1.2-1.3H2.2C1.6,0,1,0.6,1,1.3v19.5C1,21.4,1.6,22,2.2,22z"></path>			<path d="M27.1,1.3v19.5c0,0.7,0.6,1.3,1.2,1.3h8.4c1.4,0,2.2,1.5,1.4,2.6l-3.7,5.5c-0.6,0.8,0,1.9,1,1.9h6.1c0.4,0,0.8-0.2,1-0.5    l6.3-9.2c0.1-0.2,0.2-0.5,0.2-0.7V1.3C49,0.6,48.5,0,47.8,0H28.3C27.6,0,27.1,0.6,27.1,1.3z"></path>		</g>	</g></g></svg></i></span></div></div><div class="wdt-rating-container"><ul class="wdt-rating"><li><span class="fas fa-star" data-value="1"></span></li><li><span class="fas fa-star" data-value="2"></span></li><li><span class="fas fa-star" data-value="3"></span></li><li><span class="fas fa-star" data-value="4"></span></li><li><span class="fas fa-star" data-value="5"></span></li></ul></div><div class="wdt-content-description">”We need healthy meals to keep our body strong and full of energy. They help us stay fit, fight diseases, and keep our heart, brain, and stomach healthy.”</div><div class="wdt-content-title-group below"><div class="wdt-content-title"><h5></h5></div><span></span><div class="wdt-content-subtitle"> </div></div></div></div></div></div></div><div class="wdt-carousel-pagination-wrapper"><div class="wdt-swiper-pagination wdt-swiper-pagination-57e76b3"></div></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-942187f elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon" data-id="942187f" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;mouse-move&quot;,&quot;wdt_mme_depth&quot;:{&quot;unit&quot;:&quot;dpt&quot;,&quot;size&quot;:0.5,&quot;sizes&quot;:[]},&quot;wdt_mme_speed&quot;:{&quot;unit&quot;:&quot;ms&quot;,&quot;size&quot;:0.1,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_move_along&quot;:&quot;both&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250 22" style="enable-background:new 0 0 250 22;" xml:space="preserve"><g>	<path d="M233,17.3c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8c-10.7,0-15.9,2.8-21.4,5.8c-5.4,2.9-10.9,5.9-21.8,5.9  c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8S87.5,8.5,82,11.4c-5.4,2.9-10.9,5.9-21.8,5.9s-16.5-3-21.8-5.9  c-5.5-3-10.7-5.8-21.4-5.8v-1c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9  c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9c10.9,0,16.5,3,21.8,5.9  c5.5,3,10.7,5.8,21.4,5.8V17.3z"></path></g></svg>			</div>
		</div>
				</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				<!-- ** Container End ** -->
            </div><!-- **Main - End ** -->

            
            <!-- **Footer** -->
 
     <footer id="footer" ><div class="wdt-elementor-container-fluid"><div id="footer-489" class="wdt-footer-tpl footer-489">		<div data-elementor-type="wp-post" data-elementor-id="489" class="elementor elementor-489">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-a5bde6d elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a5bde6d" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}"  style="height:">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6fbf466" data-id="6fbf466" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-e393426 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="e393426" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-84736ec" data-id="84736ec" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-af76bef elementor-align-left elementor-tablet-align-center elementor-mobile_extra-align-center elementor-hidden-desktop elementor-hidden-laptop elementor-hidden-tablet_extra elementor-widget elementor-widget-wdt-logo" data-id="af76bef" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-logo.default">
				<div class="elementor-widget-container">
			<div id="mantras-af76bef" class="wdt-logo-container">  <a href="index.php" rel="home"><img loading="lazy" style="width:6rem;" src="img/logo.png" class="attachment-full size-full" alt="" decoding="async" /></a></div>		</div>
				</div>
				<div class="elementor-element elementor-element-3833253 start center center elementor-widget elementor-widget-wdt-heading" data-id="3833253" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-3833253"><h4 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Newsletter</span></h4></div>		</div>
				</div>
				<div class="elementor-element elementor-element-e5ba8db elementor-widget-tablet__width-initial elementor-widget-mobile_extra__width-inherit center elementor-widget elementor-widget-wdt-mailchimp" data-id="e5ba8db" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-mailchimp.default">
				<div class="elementor-widget-container">
			<div class="wdt-mailchimp-holder wdt-template-type3" id="wdt-mailchimp-e5ba8db"><div class="wdt-mailchimp-wrapper"><form class="wdt-mailchimp-subscribe-form with-btn-icon" name="mailchimpSubscribeForm" action="#" method="post"><input type="email" name="wdt_mc_emailid" required="required" placeholder="Enter Email Address" value=""><input type="hidden" name="wdt_mc_listid" value="" /><div class="wdt-mailchimp-subscription-button-holder"><a href="mailto:vitacare1102@gmail"><button type="submit" name="wdt_mc_submit"><i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M95.75,35.06,28.22,86.88c-4.09,3.05-9.91-.35-9-5.34l8.17-29.09a9.55,9.55,0,0,0-2.14-8L3.56,23.08c-3.33-3.74,0-9.56,5.19-9l84.3,11.09A5.5,5.5,0,0,1,95.75,35.06Z"></path></svg></i></button></a></div></form><div class="wdt-mailchimp-subscription-msg"></div></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-eadf032 elementor-widget elementor-widget-text-editor" data-id="eadf032" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							<p>We don’t spam. Unsubscription any time.</p>						</div>
				</div>
				<div class="elementor-element elementor-element-49eda1c elementor-align-left elementor-tablet-align-left elementor-mobile_extra-align-center elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-widget elementor-widget-wdt-logo" data-id="49eda1c" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-logo.default">
				<div class="elementor-widget-container">
			<div id="mantras-49eda1c" class="wdt-logo-container">  <a href="img/logo.png" rel="home"><img loading="lazy" style="width:6rem; height:6rem;" src="img/logo.png" class="attachment-full size-full" alt="" decoding="async" /></a></div></div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-0c8479a" data-id="0c8479a" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-8440cee elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="8440cee" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-df762aa" data-id="df762aa" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-accabb4 center elementor-widget elementor-widget-wdt-accordion-and-toggle" data-id="accabb4" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-accordion-and-toggle.default">
				<div class="elementor-widget-container">
			<div class="wdt-accordion-toggle-holder wdt-module-toggle wdt-template-default wdt-expand-collapse-position-end" id="wdt-accordion-and-toggle-accabb4"><div class="wdt-accordion-toggle-wrapper"><div class="wdt-accordion-toggle-title-holder"><div class="wdt-accordion-toggle-title">Contact</div><div class="wdt-accordion-toggle-icon"><div class="wdt-accordion-toggle-icon-expand"><svg aria-hidden="true" class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div><div class="wdt-accordion-toggle-icon-collapse"><svg aria-hidden="true" class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div></div></div><div class="wdt-accordion-toggle-description"><style>.elementor-4990 .elementor-element.elementor-element-9a35043 > .elementor-widget-wrap > .elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute){margin-bottom:0px;}.elementor-4990 .elementor-element.elementor-element-4af2a72{text-align:left;}.elementor-4990 .elementor-element.elementor-element-4af2a72 > .elementor-widget-container{margin:0px 0px 20px 0px;}.elementor-4990 .elementor-element.elementor-element-b794c7c .elementor-icon-list-icon i{transition:color 0.3s;}.elementor-4990 .elementor-element.elementor-element-b794c7c .elementor-icon-list-icon svg{transition:fill 0.3s;}.elementor-4990 .elementor-element.elementor-element-b794c7c{--e-icon-list-icon-size:14px;--icon-vertical-offset:0px;}.elementor-4990 .elementor-element.elementor-element-b794c7c .elementor-icon-list-text{transition:color 0.3s;}.elementor-4990 .elementor-element.elementor-element-b794c7c > .elementor-widget-container{margin:0px 0px 20px 0px;}.elementor-4990 .elementor-element.elementor-element-ff0e450 .elementor-icon-list-icon i{transition:color 0.3s;}.elementor-4990 .elementor-element.elementor-element-ff0e450 .elementor-icon-list-icon svg{transition:fill 0.3s;}.elementor-4990 .elementor-element.elementor-element-ff0e450{--e-icon-list-icon-size:14px;--icon-vertical-offset:0px;}.elementor-4990 .elementor-element.elementor-element-ff0e450 .elementor-icon-list-text{transition:color 0.3s;}@media(max-width:767px){.elementor-4990 .elementor-element.elementor-element-4af2a72{text-align:left;}.elementor-4990 .elementor-element.elementor-element-4af2a72 > .elementor-widget-container{margin:0px 0px 15px 0px;}.elementor-4990 .elementor-element.elementor-element-b794c7c > .elementor-widget-container{margin:0px 0px 15px 0px;}}</style>		<div data-elementor-type="page" data-elementor-id="4990" class="elementor elementor-4990">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-7ec5444 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="7ec5444" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b558e98" data-id="b558e98" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-92cbdec elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="92cbdec" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-9a35043" data-id="9a35043" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						
				<div class="elementor-element elementor-element-b794c7c elementor-list-item-link-inline elementor-mobile_extra-align-left wdt-footer-icon-list elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="b794c7c" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items">
							<li class="elementor-icon-list-item">
											<a href="tel:9120185903">

											<span class="elementor-icon-list-text">9120185903</span>
											</a>
									</li>
								<li class="elementor-icon-list-item">
											<a href="tel:9120185903">9120185903

											<span class="elementor-icon-list-text"></span>
											</a>
									</li>
						</ul>
				</div>
				</div>
				<div class="elementor-element elementor-element-ff0e450 elementor-list-item-link-inline elementor-mobile_extra-align-left wdt-footer-icon-list elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="ff0e450" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items">
							<li class="elementor-icon-list-item">
											<a href="mailto:vitacare1102@gmail">

											<span class="elementor-icon-list-text">vitacare1102@gmail.com</span>
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
		</div>
					</div>
		</section>
				</div>
		</div></div></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fe8ac88" data-id="fe8ac88" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-79675b8 center elementor-widget elementor-widget-wdt-accordion-and-toggle" data-id="79675b8" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-accordion-and-toggle.default">
				<div class="elementor-widget-container">
			<div class="wdt-accordion-toggle-holder wdt-module-toggle wdt-template-default wdt-expand-collapse-position-end" id="wdt-accordion-and-toggle-79675b8"><div class="wdt-accordion-toggle-wrapper"><div class="wdt-accordion-toggle-title-holder"><div class="wdt-accordion-toggle-title">Info</div><div class="wdt-accordion-toggle-icon"><div class="wdt-accordion-toggle-icon-expand"><svg aria-hidden="true" class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div><div class="wdt-accordion-toggle-icon-collapse"><svg aria-hidden="true" class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div></div></div><div class="wdt-accordion-toggle-description"><style>.elementor-4992 .elementor-element.elementor-element-9a35043 > .elementor-widget-wrap > .elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute){margin-bottom:0px;}.elementor-4992 .elementor-element.elementor-element-07c4c46 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child){padding-bottom:calc(13px/2);}.elementor-4992 .elementor-element.elementor-element-07c4c46 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child){margin-top:calc(13px/2);}.elementor-4992 .elementor-element.elementor-element-07c4c46 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item{margin-right:calc(13px/2);margin-left:calc(13px/2);}.elementor-4992 .elementor-element.elementor-element-07c4c46 .elementor-icon-list-items.elementor-inline-items{margin-right:calc(-13px/2);margin-left:calc(-13px/2);}body.rtl .elementor-4992 .elementor-element.elementor-element-07c4c46 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{left:calc(-13px/2);}body:not(.rtl) .elementor-4992 .elementor-element.elementor-element-07c4c46 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{right:calc(-13px/2);}.elementor-4992 .elementor-element.elementor-element-07c4c46 .elementor-icon-list-icon i{transition:color 0.3s;}.elementor-4992 .elementor-element.elementor-element-07c4c46 .elementor-icon-list-icon svg{transition:fill 0.3s;}.elementor-4992 .elementor-element.elementor-element-07c4c46{--e-icon-list-icon-size:14px;--icon-vertical-offset:0px;width:var( --container-widget-width, 50% );max-width:50%;--container-widget-width:50%;--container-widget-flex-grow:0;}.elementor-4992 .elementor-element.elementor-element-07c4c46 .elementor-icon-list-text{transition:color 0.3s;}.elementor-4992 .elementor-element.elementor-element-119a481 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:last-child){padding-bottom:calc(13px/2);}.elementor-4992 .elementor-element.elementor-element-119a481 .elementor-icon-list-items:not(.elementor-inline-items) .elementor-icon-list-item:not(:first-child){margin-top:calc(13px/2);}.elementor-4992 .elementor-element.elementor-element-119a481 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item{margin-right:calc(13px/2);margin-left:calc(13px/2);}.elementor-4992 .elementor-element.elementor-element-119a481 .elementor-icon-list-items.elementor-inline-items{margin-right:calc(-13px/2);margin-left:calc(-13px/2);}body.rtl .elementor-4992 .elementor-element.elementor-element-119a481 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{left:calc(-13px/2);}body:not(.rtl) .elementor-4992 .elementor-element.elementor-element-119a481 .elementor-icon-list-items.elementor-inline-items .elementor-icon-list-item:after{right:calc(-13px/2);}.elementor-4992 .elementor-element.elementor-element-119a481 .elementor-icon-list-icon i{transition:color 0.3s;}.elementor-4992 .elementor-element.elementor-element-119a481 .elementor-icon-list-icon svg{transition:fill 0.3s;}.elementor-4992 .elementor-element.elementor-element-119a481{--e-icon-list-icon-size:14px;--icon-vertical-offset:0px;width:var( --container-widget-width, 50% );max-width:50%;--container-widget-width:50%;--container-widget-flex-grow:0;}.elementor-4992 .elementor-element.elementor-element-119a481 .elementor-icon-list-text{transition:color 0.3s;}@media(max-width:767px){.elementor-4992 .elementor-element.elementor-element-07c4c46{--container-widget-width:100%;--container-widget-flex-grow:0;width:var( --container-widget-width, 100% );max-width:100%;}.elementor-4992 .elementor-element.elementor-element-119a481{--container-widget-width:100%;--container-widget-flex-grow:0;width:var( --container-widget-width, 100% );max-width:100%;}}</style>		<div data-elementor-type="page" data-elementor-id="4992" class="elementor elementor-4992">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-7ec5444 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="7ec5444" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b558e98" data-id="b558e98" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-92cbdec elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="92cbdec" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-9a35043" data-id="9a35043" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-07c4c46 elementor-list-item-link-inline elementor-mobile_extra-align-left wdt-footer-icon-list elementor-widget__width-initial elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="07c4c46" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items">
							<li class="elementor-icon-list-item">
											<a href="index.php">

											<span class="elementor-icon-list-text">Home</span>
											</a>
									</li>
								<li class="elementor-icon-list-item">
											<a href="about.php">

											<span class="elementor-icon-list-text">About Us</span>
											</a>
									</li>
								<li class="elementor-icon-list-item">
											<a href="#">

											<span class="elementor-icon-list-text">Services</span>
											</a>
									</li>
								<li class="elementor-icon-list-item">
											<a href="#">

											<span class="elementor-icon-list-text">Pages</span>
											</a>
									</li>
						</ul>
				</div>
				</div>
				<div class="elementor-element elementor-element-119a481 elementor-list-item-link-inline elementor-mobile_extra-align-left wdt-footer-icon-list elementor-widget__width-initial elementor-icon-list--layout-traditional elementor-widget elementor-widget-icon-list" data-id="119a481" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items">
							<li class="elementor-icon-list-item">
											<a href="#">

											<span class="elementor-icon-list-text">History</span>
											</a>
									</li>
								<li class="elementor-icon-list-item">
											<a href="#">

											<span class="elementor-icon-list-text">Privacy Policy</span>
											</a>
									</li>
								<li class="elementor-icon-list-item">
											<a href="#">

											<span class="elementor-icon-list-text">Terms & Condition</span>
											</a>
									</li>
								<li class="elementor-icon-list-item">
											<a href="#">

											<span class="elementor-icon-list-text">My Account</span>
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
		</div>
					</div>
		</section>
				</div>
		</div></div></div>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-dfbaa15 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="dfbaa15" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a9407ee" data-id="a9407ee" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-becba75 start center elementor-widget elementor-widget-wdt-heading" data-id="becba75" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-becba75"><h4 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Follow Us</span></h4></div>		</div>
				</div>
				<div class="elementor-element elementor-element-637227c elementor-icon-list--layout-inline elementor-align-center elementor-list-item-link-inline elementor-widget__width-auto elementor-widget elementor-widget-icon-list" data-id="637227c" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items elementor-inline-items">
							<li class="elementor-icon-list-item elementor-inline-item">
											<a href="tel:9120185903">

												<span class="elementor-icon-list-icon">
<i class="fa-brands fa-square-whatsapp"></i></span>
											</a>
									</li>
								<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">

												<span class="elementor-icon-list-icon">
							<i class="fa-brands fa-square-instagram"></i></span>
											</a>
									</li>
								<li class="elementor-icon-list-item elementor-inline-item">
											<a href="tel:9120185903">

												<span class="elementor-icon-list-icon">
							<i class="fa-solid fa-square-phone"></i></span>
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
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-fdb6ec5 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="fdb6ec5" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-b432bd1" data-id="b432bd1" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-32ec5be footer-copyright-1 elementor-widget elementor-widget-text-editor" data-id="32ec5be" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
				<?php
// Set timezone to Indian Standard Time
date_default_timezone_set('Asia/Kolkata');

// Get current date and time
$date = date('d F Y');
$time = date('h:i:s A');
$day = date('l');
$month = date('F');
$year = date('Y');
$dayOfYear = date('z') + 1; // Day of year (1-365/366)


?>
							<p><span class="date-display"><?php echo $date; ?></span>
        <span class="time-display"><?php echo $time; ?></span><span class="detail-value">©️<?php echo $year  ; ?></span>  Design by <a href="#">Developers</a>.</p>						</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ed8411b" data-id="ed8411b" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-b331999 elementor-icon-list--layout-inline elementor-align-right elementor-mobile_extra-align-center wdt-footer-icon-list elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="b331999" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon-list.default">
				<div class="elementor-widget-container">
					<ul class="elementor-icon-list-items elementor-inline-items">
							<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">

											<span class="elementor-icon-list-text">Terms And Condition</span>
											</a>
									</li>
								<li class="elementor-icon-list-item elementor-inline-item">
											<a href="#">

											<span class="elementor-icon-list-text">Privacy Policy</span>
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
		</div>
					</div>
		</section>
				</div>
		</div></div></footer>    </div><!-- **Inner Wrapper - End** -->

    </div><!-- **Wrapper - End** -->  
 <!-- ai chat bot 3.0 starts here -->
<div class="aichatbot3" style="z-index:1000000">
	<button class="chatbot-toggler">
       <span class="material-symbols-outlined">mode_comment</span>
       <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
        <header>
            <h2>Chatbot</h2>
            <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <p>Hi there <br> How can I help you today?</p>
            </li>
        </ul>
        <div class="chat-input">
            <textarea placeholder="Enter a message..."  required></textarea>
            <span id="send-btn" class="material-symbols-outlined">send</span>
        </div>
    </div>
</div>
<!-- ai chat bot 3.0 ends here -->

    <script type="text/x-template" id="wcs_templates_filter--checkbox">
  <label class='wcs-filters__filter-wrapper' :class="level == 1 ? 'wcs-filters__filter-wrapper--padded' : ''">
    <input v-bind:value="value" v-on:change="updateModelValue" :id='unique_id + "-filter-" + slug' type='checkbox' class='wcs-filter' :name='name' :value='slug'> <span v-html="title"></span>
  </label>
</script>
<script type="text/x-template" id="wcs_templates_filter--switch">
  <label class='wcs-filters__filter-wrapper' :class="level == 1 ? 'wcs-filters__filter-wrapper--padded' : ''">
    <input v-bind:value="value" v-on:change="updateModelValue" :id='unique_id + "-filter-" + slug' type='checkbox' class='wcs-filter' :name='name' :value='slug'>
    <span class="wcs-switcher__switch"><span class="wcs-switcher__handler"></span></span><span v-html="title"></span>
  </label>
</script>
<script type="text/x-template" id="wcs_templates_filter--radio">
  <label class='wcs-filters__filter-wrapper'>
    <input ref='input' v-bind:value="value" v-on:change="updateRadioModelValue" :id='unique_id + "-filter-" + slug' type='radio' class='wcs-filter' :name='name' :value='slug' :checked="isChecked(slug,value)"> <span v-html="title"></span>
  </label>
</script>
<script type="text/x-template" id="wcs_templates_modal">
  <div v-if="visible" class="wcs-vue-modal">
    <template v-if="!loading">
      <modal-normal v-if="type === 'normal'" :data="data" :options="options" :classes="css_classes"></modal-normal>
      <modal-large v-if="type === 'large'" :data="data" :options="options" :classes="css_classes"></modal-large>
      <modal-taxonomy v-else-if="type === 'taxonomy'" :data="data" :options="options" :classes="css_classes"></modal-taxonomy>
    </template>
    <div v-if="loading" class="wcs-modal wcs-modal__loader" :class="css_classes" v-on:click="closeModal">
      <div class="wcs-modal__box"><wcs-loader></wcs-loader></div>
    </div>
  </div>
</script>
<script type="text/x-template" id="wcs_templates_modal--normal">
	<div class="wcs-modal" :class="modal_classes" v-on:click="closeModal" :data-wcs-modal-id="options.el_id">
		<div class="wcs-modal__box">
			<div class="wcs-modal__inner">
				<a href="#" class="wcs-modal__close ti-close" v-on:click="closeModal"></a>
				<div class="wcs-modal__content">
					<h2><span v-html="data.title"></span>
						<small v-if="filter_var(options.modal_wcs_type) && data.terms.wcs_type">
							<template v-for="(type, index) in data.terms.wcs_type">
								{{type.name}}<template v-if="index !== (data.terms.wcs_type.length - 1)">, </template>
							</template>
						</small>
					</h2>
					<div v-html="data.content"></div>
				</div>
				<div class="wcs-modal__side">
					<img v-if="data.image" :src="data.image" class='wcs-image'>
					<div v-if="data.map" class="wcs-map"></div>
					<ul class="wcs-modal__meta">
						<li>
							<span class="ti-calendar"></span>{{ data.start | moment( options.label_modal_dateformat ? options.label_modal_dateformat : 'MMMM DD @ HH:mm' ) }}
							<template v-if="isMultiDay(data)">
								- {{ data.end |moment( options.label_modal_dateformat ? options.label_modal_dateformat : 'MMMM DD @ HH:mm' ) }}
							</template>
						</li>
						<li v-if="filter_var(options.show_modal_ending)">
							<span class="ti-time"></span>
							{{ data.start | moment( options.show_time_format ? 'h' : 'HH' ) }}<span class='wcs-addons--blink'>:</span>{{ data.start | moment('mm') }}
							{{ data.start | moment( options.show_time_format ? 'a' : ' ' ) }}
							-
							{{ data.end | moment( options.show_time_format ? 'h' : 'HH' ) }}<span class='wcs-addons--blink'>:</span>{{ data.end | moment('mm') }}
							{{ data.end | moment( options.show_time_format ? 'a' : ' ' ) }}
							<span v-if="filter_var(options.show_modal_duration)" class="wcs-modal--muted wcs-addons--pipe">{{data.duration}}</span>
						</li>
						<li v-if="filter_var(options.modal_wcs_room) && data.terms.wcs_room">
							<span class="ti-location-arrow"></span>
							<taxonomy-list :options="options" :tax="'wcs_room'" :event="data" v-on:open-modal="openTaxModal"></taxonomy-list>
						</li>
						<li v-if="filter_var(options.modal_wcs_instructor) && data.terms.wcs_instructor">
							<span class="ti-user"></span>
							<taxonomy-list :options="options" :tax="'wcs_instructor'" :event="data" v-on:open-modal="openTaxModal"></taxonomy-list>
						</li>
					</ul>
					<div class="wcs-modal__action">
						<template v-for="(button, button_type) in data.buttons">
							<template v-if="button_type == 'main' && button.label.length > 0">
								<a class="wcs-btn wcs-btn--action" v-if="button.method == 0" :href="button.permalink" :target="button.target ? '_blank' : '_self'">{{button.label}}</a>
								<a class="wcs-btn wcs-btn--action" v-else-if="button.method == 1" :href="button.custom_url" :target="button.target ? '_blank' : '_self'">{{button.label}}</a>
								<a class="wcs-btn wcs-btn--action" v-else-if="button.method == 2" :href="button.email" :target="button.target ? '_blank' : '_self'">{{button.label}}</a>
								<a class="wcs-btn wcs-btn--action" v-else-if="button.method == 3" :href="button.ical">{{button.label}}</a>
							</template>
							<template v-else-if="button_type == 'woo'">
								<a :class="button.classes" v-if="button.status" :href="button.href">{{button.label}}</a>
								<a :class="button.classes" v-else-if="!button.status && button.href" :href="button.href">{{button.label}}</a>
								<a :class="button.classes" v-else-if="!button.status" href="#">{{button.label}}</a>
							</template>
						</template>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-template" id="wcs_templates_modal--large">
	<div class="wcs-modal" :class="modal_classes" v-on:click="closeModal">
		<div class="wcs-modal__box">
			<div class="wcs-modal__inner">
				<a href="#" class="wcs-modal__close ti-close" v-on:click="closeModal"></a>
				<div class="wcs-modal__side" :style="data.image ? 'background-image: url(' + data.image + ')' : ''">
					<div class="wcs-modal__inner-side">
						<h2>
							<template v-for="(button, button_type) in data.buttons">
								<template v-if="button_type == 'main' && button.label.length > 0">
									<a class="wcs-btn wcs-btn--action" v-if="button.method == 0" :href="button.permalink" :target="button.target ? '_blank' : '_self'">{{button.label}}</a>
									<a class="wcs-btn wcs-btn--action" v-else-if="button.method == 1" :href="button.custom_url" :target="button.target ? '_blank' : '_self'">{{button.label}}</a>
									<a class="wcs-btn wcs-btn--action" v-else-if="button.method == 2" :href="button.email" :target="button.target ? '_blank' : '_self'">{{button.label}}</a>
									<a class="wcs-btn wcs-btn--action" v-else-if="button.method == 3" :href="button.ical">{{button.label}}</a>
								</template>
								<template v-else-if="button_type == 'woo'">
									<a :class="button.classes" v-if="button.status" :href="button.href">{{button.label}}</a>
									<a :class="button.classes" v-else-if="!button.status && button.href" :href="button.href">{{button.label}}</a>
									<a :class="button.classes" v-else-if="!button.status" href="#">{{button.label}}</a>
								</template>
							</template>
							<span v-html="data.title"></span>
							<small v-if="filter_var(options.modal_wcs_type) && data.terms.wcs_type">
								<template v-for="(type, index) in data.terms.wcs_type">
									{{type.name}}<template v-if="index !== (data.terms.wcs_type.length - 1)">, </template>
								</template>
							</small>
						</h2>

						<ul class="wcs-modal__meta">
							<li>
								<span class="ti-calendar"></span>{{ data.start | moment( options.label_modal_dateformat ? options.label_modal_dateformat : 'MMMM DD @ HH:mm' ) }}
								<template v-if="isMultiDay(data)">
									- {{ data.end |moment( options.label_modal_dateformat ? options.label_modal_dateformat : 'MMMM DD @ HH:mm' ) }}
								</template>
							</li>
							<li v-if="filter_var( options.show_modal_ending )">
								<span class="ti-time"></span>
								{{ data.start | moment( options.show_time_format ? 'h' : 'HH' ) }}<span class='wcs-addons--blink'>:</span>{{ data.start | moment('mm') }}
								{{ data.start | moment( options.show_time_format ? 'a' : ' ' ) }}
								-
								{{ data.end | moment( options.show_time_format ? 'h' : 'HH' ) }}<span class='wcs-addons--blink'>:</span>{{ data.end | moment('mm') }}
								{{ data.end | moment( options.show_time_format ? 'a' : ' ' ) }}
								<span v-if="options.show_modal_duration" class="wcs-modal--muted wcs-addons--pipe">{{data.duration}}</span>
							</li>
							<li v-if="filter_var(options.modal_wcs_room) && data.terms.wcs_room">
								<span class="ti-location-arrow"></span>
								<taxonomy-list :options="options" :tax="'wcs_room'" :event="data" v-on:open-modal="openTaxModal"></taxonomy-list>
							</li>
							<li v-if="filter_var(options.modal_wcs_instructor) && data.terms.wcs_instructor">
								<span class="ti-user"></span>
								<taxonomy-list :options="options" :tax="'wcs_instructor'" :event="data" v-on:open-modal="openTaxModal"></taxonomy-list>
							</li>
						</ul>

					</div>
				</div>
				<div class="wcs-modal__content" v-html="data.content"></div>
				<div v-if="data.map" class="wcs-map"></div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-template" id="wcs_templates_modal--taxonomy">
	<div class="wcs-modal" :class="classes" v-on:click="closeModal">
		<div class="wcs-modal__box">
			<div class="wcs-modal__inner">
				<a href="#" class="wcs-modal__close ti-close" v-on:click="closeModal"></a>
				<div class="wcs-modal__content wcs-modal__content--full">
					<h2 v-html="data.name"></h2>
					<div v-html="data.content"></div>
				</div>
			</div>
		</div>
	</div>
</script>
<script type="text/x-template" id="wcs_templates_misc--button-more">
	<button v-on:click="addEvents" class="ladda-button wcs-more wcs-btn--action" :data-spinner-color="color" data-style="expand-right" data-size="xs">
		<span class="ladda-label">{{more}}</span>
	</button>
</script>
<script type="text/x-template" id="wcs_templates_misc--loader">
	<div class="wcs-spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect5"></div></div>
</script>
<script type="text/x-template" id="wcs_templates_timetable--wcs-app-1">
  <div class="wcs-timetable__container wcs-timetable--1" :class="app_classes" data-id="1"  id="wcs-app-1" v-cloak>
  <div v-if="hasToggler()" v-on:click="filters.visible = ! filters.visible" class='wcs-filter-toggler-container'>
	<span class='wcs-filter-toggler'>{{ filters.options.label_toggle }} <em class='icon' :class="filters.visible ? 'ti-minus' : 'ti-plus'"></em></span>
</div>
<div v-if="hasFilters()" v-show="filters.visible" class='wcs-filters__container'>
	<form class='wcs-filters' :class="filters_classes">
		<div v-for="filter in filters.taxonomies" v-if="filter.terms.length > 0" class='wcs-filters__filter-column' :class="'wcs-filters--' + filter.name">
			<template v-if="getFiltersType() === 'checkbox'">
				<span v-if="filter.title.length > 0" class='wcs-filters__title' v-html="filter.title"></span>
				<template v-for="term in filter.terms">
					<filter-checkbox :name="filter.name" :title="term.name" :slug="term.slug" :unique_id="options.el_id" v-bind:value="filters_active[filter.name]" v-on:input="updateFilterModel( filter.name, arguments )"></filter-checkbox>
					<filter-checkbox v-for="child_term in term.children" :name="filter.name" :key="child_term.slug" :level="1" :title="child_term.name" :slug="child_term.slug" :unique_id="options.el_id" v-bind:value="filters_active[filter.name]" v-on:input="updateFilterModel( filter.name, arguments )"></filter-checkbox>
				</template>
			</template>
			<template v-else-if="getFiltersType() === 'switch'">
				<span v-if="filter.title.length > 0" class='wcs-filters__title' v-html="filter.title"></span>
				<template v-for="term in filter.terms">
					<filter-switch :name="filter.name" :title="term.name" :slug="term.slug" :unique_id="options.el_id" v-bind:value="filters_active[filter.name]" v-on:input="updateFilterModel( filter.name, arguments )"></filter-switch>
					<filter-switch v-for="child_term in term.children" :name="filter.name" :key="child_term.slug" :level="1" :title="child_term.name" :slug="child_term.slug" :unique_id="options.el_id" v-bind:value="filters_active[filter.name]" v-on:input="updateFilterModel( filter.name, arguments )"></filter-switch>
				</template>
			</template>
			<template v-else-if="getFiltersType() === 'select2'">
				<filter-select2 :options="getSelect2Options(filter.terms)" :multiple="filter_var(options.filters_select2_multiple)" :placeholder="filter.title" v-on:input="updateFilterModelSelect2( filter.name, arguments )">
		      <option value="-1" v-if="!filter_var(options.filters_select2_multiple)">{{filter.title}}</option>
		    </filter-select2>
			</template>
		</div>
	</form>
</div>
<div class="wcs-timetable wcs-timetable--week">
	<h2 v-if="filter_var(options.show_title)">{{options.title}}</h2>
	<div v-if="options.show_navigation && options.label_weekly_schedule_prev && options.label_weekly_schedule_next" class="wcs-navigation">
		<button class="wcs-btn wcs-btn--prev wcs-btn--action" v-on:click="navigationGoPrev" :disabled="loading_process">{{options.label_weekly_schedule_prev}}</button>
		<div class="wcs-navigation__title">{{dateRangeTitle}}</div>
		<button class="wcs-btn wcs-btn--next wcs-btn--action" v-on:click="navigationGoNext" :disabled="loading_process">{{options.label_weekly_schedule_next}}</button>
	</div>
	<div class="wcs-timetable__week wcs-timetable__parent">
		<div class="wcs-calendar-loading" v-if="loading_process"><div class="wcs-spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect5"></div></div></div>

		<template v-if="filter_var( options.show_starting_hours )">
			<div class="wcs-row">
				<div class="wcs-day wcs-day__time"></div>
				<div v-for="day in week" v-if="day.events.length > 0" class="wcs-day" :class="'wcs-day--' + day.day_num"><h3 class="wcs-day__title">{{day_name(day.day_num)}}</h3></div>
			</div>
			<div v-for="(starting, key_starting) in starting_times" class="wcs-row" v-if="hasHourlyEvents(starting)">
				<div class="wcs-day wcs-day__time"><span>{{starting | check12format( options.show_time_format ) }}</span></div>
				<div v-for="day in week" v-if="day.events.length > 0" class="wcs-day" :class="'wcs-day--' + day.day_num">
					<div class="wcs-timetable__classes">
						<div v-for="event in getHourlyEvents(starting, day.events)" class="wcs-class wcs-class--filterable" :class="event | eventCSS | eventSlotCSS(event)">
							<small class="wcs-class__title wcs-modal-call" v-on:click="openModal( event, options, $event )" :title="event.title" v-html="event.title"></small>
							<time class="wcs-class__time" :datetime="event.start" v-html="starting_ending(event)"></time>
							<template v-if="filter_var(options.show_duration)"><br><span class='wcs-class__duration'>{{event.duration}}</span></template>
							<div v-if="filter_var(options.show_wcs_room)" class="wcs-class__location">{{options.label_wcs_room}}
								<taxonomy-list :options="options" :tax="'wcs_room'" :event="event" v-on:open-modal="openTaxModal"></taxonomy-list>
							</div>
							<div v-if="filter_var(options.show_wcs_instructor)" class="wcs-class__instructor">{{options.label_wcs_instructor}}
								<taxonomy-list :options="options" :tax="'wcs_instructor'" :event="event" v-on:open-modal="openTaxModal"></taxonomy-list>
							</div>
						</div>
						<div class="wcs-empty-time"></div>
					</div>
				</div>
			</div>
		</template>

		<div v-for="day in week" v-if="day.events.length > 0" class="wcs-day" :class="'wcs-day--' + day.day_num">
			<h3 class="wcs-day__title">{{day_name(day.day_num)}}</h3>
			<div class="wcs-timetable__classes">
				<div v-for="event in day.events" class="wcs-class wcs-class--filterable" :class="event | eventCSS | eventSlotCSS(event)">
					<small class="wcs-class__title wcs-modal-call" v-on:click="openModal( event, options, $event )" :title="event.title" v-html="event.title"></small>
					<time class="wcs-class__time" :datetime="event.start" v-html="starting_ending(event)"></time>
					<template v-if="filter_var(options.show_duration)"><br><span class='wcs-class__duration'>{{event.duration}}</span></template>
					<div v-if="filter_var(options.show_wcs_room)" class="wcs-class__location">{{options.label_wcs_room}}
						<taxonomy-list :options="options" :tax="'wcs_room'" :event="event" v-on:open-modal="openTaxModal"></taxonomy-list>
					</div>
					<div v-if="filter_var(options.show_wcs_instructor)" class="wcs-class__instructor">{{options.label_wcs_instructor}}
						<taxonomy-list :options="options" :tax="'wcs_instructor'" :event="event" v-on:open-modal="openTaxModal"></taxonomy-list>
					</div>
				</div>
			</div><!-- .wcs-timetable__classes -->
			<div class="wcs-timetable__spacer"></div>
		</div><!-- .wcs-day -->

		<div v-show="countWeekEvents(week) == 0" class="wcs-timetable__zero-data wcs-timetable__zero-data-container">
			<h3>{{options.zero}}</h3>
		</div>
	</div><!-- .wcs-timetable__parent -->
</div><!-- .wcs-timetable -->
  </div>
</script>
<script type="text/x-template" id="wcs_templates_timetable--wcs-app-1">
  <div class="wcs-timetable__container wcs-timetable--1" :class="app_classes" data-id="1"  id="wcs-app-1" v-cloak>
  <div v-if="hasToggler()" v-on:click="filters.visible = ! filters.visible" class='wcs-filter-toggler-container'>
	<span class='wcs-filter-toggler'>{{ filters.options.label_toggle }} <em class='icon' :class="filters.visible ? 'ti-minus' : 'ti-plus'"></em></span>
</div>
<div v-if="hasFilters()" v-show="filters.visible" class='wcs-filters__container'>
	<form class='wcs-filters' :class="filters_classes">
		<div v-for="filter in filters.taxonomies" v-if="filter.terms.length > 0" class='wcs-filters__filter-column' :class="'wcs-filters--' + filter.name">
			<template v-if="getFiltersType() === 'checkbox'">
				<span v-if="filter.title.length > 0" class='wcs-filters__title' v-html="filter.title"></span>
				<template v-for="term in filter.terms">
					<filter-checkbox :name="filter.name" :title="term.name" :slug="term.slug" :unique_id="options.el_id" v-bind:value="filters_active[filter.name]" v-on:input="updateFilterModel( filter.name, arguments )"></filter-checkbox>
					<filter-checkbox v-for="child_term in term.children" :name="filter.name" :key="child_term.slug" :level="1" :title="child_term.name" :slug="child_term.slug" :unique_id="options.el_id" v-bind:value="filters_active[filter.name]" v-on:input="updateFilterModel( filter.name, arguments )"></filter-checkbox>
				</template>
			</template>
			<template v-else-if="getFiltersType() === 'switch'">
				<span v-if="filter.title.length > 0" class='wcs-filters__title' v-html="filter.title"></span>
				<template v-for="term in filter.terms">
					<filter-switch :name="filter.name" :title="term.name" :slug="term.slug" :unique_id="options.el_id" v-bind:value="filters_active[filter.name]" v-on:input="updateFilterModel( filter.name, arguments )"></filter-switch>
					<filter-switch v-for="child_term in term.children" :name="filter.name" :key="child_term.slug" :level="1" :title="child_term.name" :slug="child_term.slug" :unique_id="options.el_id" v-bind:value="filters_active[filter.name]" v-on:input="updateFilterModel( filter.name, arguments )"></filter-switch>
				</template>
			</template>
			<template v-else-if="getFiltersType() === 'select2'">
				<filter-select2 :options="getSelect2Options(filter.terms)" :multiple="filter_var(options.filters_select2_multiple)" :placeholder="filter.title" v-on:input="updateFilterModelSelect2( filter.name, arguments )">
		      <option value="-1" v-if="!filter_var(options.filters_select2_multiple)">{{filter.title}}</option>
		    </filter-select2>
			</template>
		</div>
	</form>
</div>
<div class="wcs-timetable wcs-timetable--week">
	<h2 v-if="filter_var(options.show_title)">{{options.title}}</h2>
	<div v-if="options.show_navigation && options.label_weekly_schedule_prev && options.label_weekly_schedule_next" class="wcs-navigation">
		<button class="wcs-btn wcs-btn--prev wcs-btn--action" v-on:click="navigationGoPrev" :disabled="loading_process">{{options.label_weekly_schedule_prev}}</button>
		<div class="wcs-navigation__title">{{dateRangeTitle}}</div>
		<button class="wcs-btn wcs-btn--next wcs-btn--action" v-on:click="navigationGoNext" :disabled="loading_process">{{options.label_weekly_schedule_next}}</button>
	</div>
	<div class="wcs-timetable__week wcs-timetable__parent">
		<div class="wcs-calendar-loading" v-if="loading_process"><div class="wcs-spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect5"></div></div></div>

		<template v-if="filter_var( options.show_starting_hours )">
			<div class="wcs-row">
				<div class="wcs-day wcs-day__time"></div>
				<div v-for="day in week" v-if="day.events.length > 0" class="wcs-day" :class="'wcs-day--' + day.day_num"><h3 class="wcs-day__title">{{day_name(day.day_num)}}</h3></div>
			</div>
			<div v-for="(starting, key_starting) in starting_times" class="wcs-row" v-if="hasHourlyEvents(starting)">
				<div class="wcs-day wcs-day__time"><span>{{starting | check12format( options.show_time_format ) }}</span></div>
				<div v-for="day in week" v-if="day.events.length > 0" class="wcs-day" :class="'wcs-day--' + day.day_num">
					<div class="wcs-timetable__classes">
						<div v-for="event in getHourlyEvents(starting, day.events)" class="wcs-class wcs-class--filterable" :class="event | eventCSS | eventSlotCSS(event)">
							<small class="wcs-class__title wcs-modal-call" v-on:click="openModal( event, options, $event )" :title="event.title" v-html="event.title"></small>
							<time class="wcs-class__time" :datetime="event.start" v-html="starting_ending(event)"></time>
							<template v-if="filter_var(options.show_duration)"><br><span class='wcs-class__duration'>{{event.duration}}</span></template>
							<div v-if="filter_var(options.show_wcs_room)" class="wcs-class__location">{{options.label_wcs_room}}
								<taxonomy-list :options="options" :tax="'wcs_room'" :event="event" v-on:open-modal="openTaxModal"></taxonomy-list>
							</div>
							<div v-if="filter_var(options.show_wcs_instructor)" class="wcs-class__instructor">{{options.label_wcs_instructor}}
								<taxonomy-list :options="options" :tax="'wcs_instructor'" :event="event" v-on:open-modal="openTaxModal"></taxonomy-list>
							</div>
						</div>
						<div class="wcs-empty-time"></div>
					</div>
				</div>
			</div>
		</template>

		<div v-for="day in week" v-if="day.events.length > 0" class="wcs-day" :class="'wcs-day--' + day.day_num">
			<h3 class="wcs-day__title">{{day_name(day.day_num)}}</h3>
			<div class="wcs-timetable__classes">
				<div v-for="event in day.events" class="wcs-class wcs-class--filterable" :class="event | eventCSS | eventSlotCSS(event)">
					<small class="wcs-class__title wcs-modal-call" v-on:click="openModal( event, options, $event )" :title="event.title" v-html="event.title"></small>
					<time class="wcs-class__time" :datetime="event.start" v-html="starting_ending(event)"></time>
					<template v-if="filter_var(options.show_duration)"><br><span class='wcs-class__duration'>{{event.duration}}</span></template>
					<div v-if="filter_var(options.show_wcs_room)" class="wcs-class__location">{{options.label_wcs_room}}
						<taxonomy-list :options="options" :tax="'wcs_room'" :event="event" v-on:open-modal="openTaxModal"></taxonomy-list>
					</div>
					<div v-if="filter_var(options.show_wcs_instructor)" class="wcs-class__instructor">{{options.label_wcs_instructor}}
						<taxonomy-list :options="options" :tax="'wcs_instructor'" :event="event" v-on:open-modal="openTaxModal"></taxonomy-list>
					</div>
				</div>
			</div><!-- .wcs-timetable__classes -->
			<div class="wcs-timetable__spacer"></div>
		</div><!-- .wcs-day -->

		<div v-show="countWeekEvents(week) == 0" class="wcs-timetable__zero-data wcs-timetable__zero-data-container">
			<h3>{{options.zero}}</h3>
		</div>
	</div><!-- .wcs-timetable__parent -->
</div><!-- .wcs-timetable -->
  </div>
</script>

		<div id="wcs-vue-modal"></div>

				<script>
		( function ( body ) {
			'use strict';
			body.className = body.className.replace( /\btribe-no-js\b/, 'tribe-js' );
		} )( document.body );
		</script>
		<script> /* <![CDATA[ */var tribe_l10n_datatables = {"aria":{"sort_ascending":": activate to sort column ascending","sort_descending":": activate to sort column descending"},"length_menu":"Show _MENU_ entries","empty_table":"No data available in table","info":"Showing _START_ to _END_ of _TOTAL_ entries","info_empty":"Showing 0 to 0 of 0 entries","info_filtered":"(filtered from _MAX_ total entries)","zero_records":"No matching records found","search":"Search:","all_selected_text":"All items on this page were selected. ","select_all_link":"Select all pages","clear_selection":"Clear Selection.","pagination":{"all":"All","next":"Next","previous":"Previous"},"select":{"rows":{"0":"","_":": Selected %d rows","1":": Selected 1 row"}},"datepicker":{"dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesMin":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Prev","currentText":"Today","closeText":"Done","today":"Today","clear":"Clear"}};/* ]]> */ </script>	<script type='text/javascript'>
		(function () {
			var c = document.body.className;
			c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
			document.body.className = c;
		})();
	</script>
	<link rel='stylesheet' id='wc-blocks-style-css' href='https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/client/blocks/wc-blocks.css?ver=1731775050' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-488-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-488.css?ver=1715324034' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-logo-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/menu/elementor/widgets/assets/css/logo.css?ver=1.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-button-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/button/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-27-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-27.css?ver=1715262860' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-heading-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/heading/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='jquery.magnific-popup-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/popup-box/assets/css/jquery.magnific-popup.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-popup-box-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/popup-box/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-503-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-503.css?ver=1715263084' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-repeater-content-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/repeater-contents/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-image-box-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/image-box/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<style id='wdt-image-box-inline-css' type='text/css'>

@media only screen and (min-width: 480px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-image-box-461bdb2 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-image-box-bdc345b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-image-box-bdc345b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

</style>
<link rel='stylesheet' id='jquery.magnific-image-box-popup-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/image-box/assets/css/jquery.magnific-popup.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-rotate-image-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/rotate-image/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-column-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/css/column.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-icon-box-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/icon-box/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<style id='wdt-icon-box-inline-css' type='text/css'>

@media only screen and (min-width: 480px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 25%;
}
}

@media only screen and (min-width: 480px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 25%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 25%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 33.33%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 33.33%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 25%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 33.33%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 33.33%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 25%;
}
}

@media only screen and (min-width: 480px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 25%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 25%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 33.33%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 33.33%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 25%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 33.33%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 33.33%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-aab0188 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

</style>
<link rel='stylesheet' id='elementor-post-4445-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4445.css?ver=1715263084' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-events-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/events/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<style id='wdt-events-inline-css' type='text/css'>

@media only screen and (min-width: 480px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (min-width: 480px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (min-width: 480px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (min-width: 480px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (min-width: 480px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (min-width: 480px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-a4ff5cb .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-a4ff5cb .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (min-width: 480px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-3e7372f .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-3e7372f .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (min-width: 480px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-8a29cdc .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-8a29cdc .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (min-width: 480px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-8047456 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-events-8047456 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

</style>
<link rel='stylesheet' id='elementor-post-4515-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4515.css?ver=1715263084' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-swiper-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/css/swiper.min.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-carousel-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/css/carousel.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-advanced-carousel-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/advanced-carousel/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-mailchimp-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/mailchimp/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-pricing-table-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/pricing-table/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-text-image-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/text-image/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-animation-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/animation/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-testimonial-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/testimonial/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<style id='wdt-testimonial-inline-css' type='text/css'>

@media only screen and (min-width: 480px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-testimonial-007d47b .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-testimonial-007d47b .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

</style>
<link rel='stylesheet' id='wdt-blogcarousel-css' href='https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/blog/elementor/widgets/assets/css/blogcarousel.css?ver=1.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4440-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4440.css?ver=1715263085' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-489-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-489.css?ver=1715332464' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4990-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4990.css?ver=1715330100' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-accordion-and-toggle-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/accordion-and-toggle/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4992-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4992.css?ver=1715330662' type='text/css' media='all' />
<style id='core-block-supports-inline-css' type='text/css'>
/**
 * Core styles: block-supports
 */

</style>
<link rel='stylesheet' id='wdt-elementor-sections-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/core/sections/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-elementor-columns-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/core/columns/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-elementor-widgets-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/core/widgets/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-e-animations-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/assets/css/animations.min.css?ver=1.0.0' type='text/css' media='all' />
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.9.4" id="swv-js"></script>
<script type="text/javascript" id="contact-form-7-js-extra">
/* <![CDATA[ */
var wpcf7 = {"api":{"root":"https:\/\/dtmantra.wpengine.com\/wp-json\/","namespace":"contact-form-7\/v1"},"cached":"1"};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.9.4" id="contact-form-7-js"></script>
<script type="text/javascript" id="wdt-elementor-addon-core-js-extra">
/* <![CDATA[ */
var wdtElementorAddonGlobals = {"ajaxUrl":"https:\/\/dtmantra.wpengine.com\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/assets/js/core.js?ver=1.0.0" id="wdt-elementor-addon-core-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/js/sourcebuster/sourcebuster.js?ver=8.8.5" id="sourcebuster-js-js"></script>
<script type="text/javascript" id="wc-order-attribution-js-extra">
/* <![CDATA[ */
var wc_order_attribution = {"params":{"lifetime":1.0e-5,"session":30,"ajaxurl":"https:\/\/dtmantra.wpengine.com\/wp-admin\/admin-ajax.php","prefix":"wc_order_attribution_","allowTracking":true},"fields":{"source_type":"current.typ","referrer":"current_add.rf","utm_campaign":"current.cmp","utm_source":"current.src","utm_medium":"current.mdm","utm_content":"current.cnt","utm_id":"current.id","utm_term":"current.trm","session_entry":"current_add.ep","session_start_time":"current_add.fd","session_pages":"session.pgs","session_count":"udata.vst","user_agent":"udata.uag"}};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/js/frontend/order-attribution.js?ver=8.8.5" id="wc-order-attribution-js"></script>
<script src='https://dtmantra.wpengine.com/wp-content/plugins/the-events-calendar/common/src/resources/js/underscore-before.js'></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/underscore.min.js?ver=1.13.7" id="underscore-js"></script>
<script src='https://dtmantra.wpengine.com/wp-content/plugins/the-events-calendar/common/src/resources/js/underscore-after.js'></script>
<script type="text/javascript" id="wp-util-js-extra">
/* <![CDATA[ */
var _wpUtilSettings = {"ajax":{"url":"\/wp-admin\/admin-ajax.php"}};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/wp-util.js?ver=6.7.1" id="wp-util-js"></script>
<script type="text/javascript" id="wp-api-request-js-extra">
/* <![CDATA[ */
var wpApiSettings = {"root":"https:\/\/dtmantra.wpengine.com\/wp-json\/","nonce":"acd70d3ee6","versionString":"wp\/v2\/"};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/api-request.js?ver=6.7.1" id="wp-api-request-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/dist/hooks.js?ver=5b4ec27a7b82f601224a" id="wp-hooks-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/dist/i18n.js?ver=2aff907006e2aa00e26e" id="wp-i18n-js"></script>
<script type="text/javascript" id="wp-i18n-js-after">
/* <![CDATA[ */
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/dist/vendor/wp-polyfill.js?ver=3.15.0" id="wp-polyfill-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/dist/url.js?ver=d62dba05ffc50c672f4a" id="wp-url-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/dist/api-fetch.js?ver=c7fab2b80f62e49268dd" id="wp-api-fetch-js"></script>
<script type="text/javascript" id="wp-api-fetch-js-after">
/* <![CDATA[ */
wp.apiFetch.use( wp.apiFetch.createRootURLMiddleware( "https://dtmantra.wpengine.com/wp-json/" ) );
wp.apiFetch.nonceMiddleware = wp.apiFetch.createNonceMiddleware( "acd70d3ee6" );
wp.apiFetch.use( wp.apiFetch.nonceMiddleware );
wp.apiFetch.use( wp.apiFetch.mediaUploadMiddleware );
wp.apiFetch.nonceEndpoint = "https://dtmantra.wpengine.com/wp-admin/admin-ajax.php?action=rest-nonce";
/* ]]> */
</script>
<script type="text/javascript" id="woo-variation-swatches-js-extra">
/* <![CDATA[ */
var woo_variation_swatches_options = {"show_variation_label":"1","clear_on_reselect":"","variation_label_separator":":","is_mobile":"","show_variation_stock":"","stock_label_threshold":"5","cart_redirect_after_add":"no","enable_ajax_add_to_cart":"yes","cart_url":"https:\/\/dtmantra.wpengine.com\/cart\/","is_cart":""};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/woo-variation-swatches/assets/js/frontend.js?ver=1731774844" id="woo-variation-swatches-js"></script>
<script type="text/javascript" id="wc-cart-fragments-js-extra">
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_e557e5e63e2170658706205e296897db","fragment_name":"wc_fragments_e557e5e63e2170658706205e296897db","request_timeout":"5000"};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.js?ver=8.8.5" id="wc-cart-fragments-js" data-wp-strategy="defer"></script>
<script type="text/javascript" id="tinvwl-js-extra">
/* <![CDATA[ */
var tinvwl_add_to_wishlist = {"text_create":"Create New","text_already_in":"{product_name} already in {wishlist_title}","simple_flow":"","hide_zero_counter":"","i18n_make_a_selection_text":"Please select some product options before adding this product to your wishlist.","tinvwl_break_submit":"No items or actions are selected.","tinvwl_clipboard":"Copied!","allow_parent_variable":"","block_ajax_wishlists_data":"","update_wishlists_data":"","hash_key":"ti_wishlist_data_e557e5e63e2170658706205e296897db","nonce":"acd70d3ee6","rest_root":"https:\/\/dtmantra.wpengine.com\/wp-json\/","plugin_url":"https:\/\/dtmantra.wpengine.com\/wp-content\/plugins\/ti-woocommerce-wishlist\/","wc_ajax_url":"\/?wc-ajax=tinvwl","stats":"","popup_timer":"6000"};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/ti-woocommerce-wishlist/assets/js/public.js?ver=2.8.2" id="tinvwl-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/lib/select2/select2.full.js?ver=6.7.1" id="jquery-select2-js"></script>
<script type="text/javascript" id="post-infinite-js-extra">
/* <![CDATA[ */
var mantras_urls = {"ajaxurl":"https:\/\/dtmantra.wpengine.com\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/blog/assets/js/post-infinite.js?ver=1.0.2" id="post-infinite-js"></script>
<script type="text/javascript" id="post-loadmore-js-extra">
/* <![CDATA[ */
var mantras_urls = {"ajaxurl":"https:\/\/dtmantra.wpengine.com\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/blog/assets/js/post-loadmore.js?ver=1.0.2" id="post-loadmore-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/menu/assets/js/mega-menu.js?ver=1.0.2" id="dtplugin-mega-menu-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-pro/modules/auth/assets/js/script.js?ver=1.0.0" id="mantras-pro-auth-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/blog/assets/js/isotope.pkgd.js?ver=6.7.1" id="isotope-pkgd-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/blog/assets/js/matchHeight.js?ver=6.7.1" id="matchheight-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/blog/assets/js/jquery.bxslider.js?ver=6.7.1" id="jquery-bxslider-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/blog/assets/js/jquery.fitvids.js?ver=6.7.1" id="jquery-fitvids-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/blog/assets/js/jquery.debouncedresize.js?ver=6.7.1" id="jquery-debouncedresize-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/themes/mantras/modules/post/assets/js/jquery.magnific-popup.js?ver=6.7.1" id="jquery-magnific-popup-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/themes/mantras/assets/js/custom.js?ver=6.7.1" id="mantras-jqcustom-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-pro/modules/woocommerce/single/modules/custom-template/elementor/assets/js/jquery.nicescroll.js?ver=6.7.1" id="jquery-nicescroll-js"></script>
<script type="text/javascript" id="mantras-woo-cart-notification-js-after">
/* <![CDATA[ */
jQuery.noConflict();

jQuery(document).ready(function($){
    "use strict";

    // After adding product to cart
    $('body').on('added_to_cart', function(e) {

        if($('.wdt-shop-cart-widget').hasClass('activate-sidebar-widget')) {

            $('.wdt-shop-cart-widget').addClass('wdt-shop-cart-widget-active');
            $('.wdt-shop-cart-widget-overlay').addClass('wdt-shop-cart-widget-active');

            // Nice scroll script

            var winHeight = $(window).height();
            var headerHeight = $('.wdt-shop-cart-widget-header').height();
            var footerHeight = $('.woocommerce-mini-cart-footer').height();

            var height = parseInt((winHeight-headerHeight-footerHeight), 10);

            $('.wdt-shop-cart-widget-content').height(height).niceScroll({ cursorcolor:"#000", cursorwidth: "5px", background:"rgba(20,20,20,0.3)", cursorborder:"none" });

        }

        if($('.wdt-shop-cart-widget').hasClass('cart-notification-widget')) {

            $('.wdt-shop-cart-widget').addClass('wdt-shop-cart-widget-active');
            $('.wdt-shop-cart-widget-overlay').addClass('wdt-shop-cart-widget-active');
            setTimeout( function(){
                $('.wdt-shop-cart-widget').removeClass('wdt-shop-cart-widget-active');
                $('.wdt-shop-cart-widget-overlay').removeClass('wdt-shop-cart-widget-active');
            }, 2400 );

        }

        e.preventDefault();
    });

    $('body').on('click', '.wdt-shop-cart-widget-close-button, .wdt-shop-cart-widget-overlay', function( e ) {
        $('.wdt-shop-cart-widget').removeClass('wdt-shop-cart-widget-active');
        $('.wdt-shop-cart-widget-overlay').removeClass('wdt-shop-cart-widget-active');
        e.preventDefault();
    });

});
/* ]]> */
</script>
<script type="text/javascript" id="mantras-woo-quantity-plus-minus-js-after">
/* <![CDATA[ */
jQuery.noConflict();

jQuery(document).ready(function($){
    "use strict";

    // Quatity plus & minus button

        jQuery( 'body' ).delegate( '.quantity .plus, .quantity .minus', 'click', function(e) {

            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = '1';

            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( currentVal + parseFloat( step ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( currentVal - parseFloat( step ) );
                }
            }

            $qty.trigger( 'change' );

            e.preventDefault();

        });


});
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/site-loader/assets/js/site-loader.js?ver=1.0.2" id="site-loader-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/site-to-top/assets/js/go-to-top.js?ver=1.0.2" id="go-to-top-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/popup-box/assets/js/jquery.cookie.min.js?ver=6.7.1" id="jquery.cookie-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/popup-box/assets/js/jquery.magnific-popup.min.js?ver=6.7.1" id="jquery.magnific-popup-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/popup-box/assets/js/script.js?ver=6.7.1" id="wdt-popup-box-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/image-box/assets/js/jquery.magnific-popup.min.js?ver=6.7.1" id="jquery.magnific-image-box-popup-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/image-box/assets/js/script.js?ver=6.7.1" id="wdt-image-box-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/rotate-image/assets/js/script.js?ver=6.7.1" id="wdt-rotate-image-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/js/column.js?ver=6.7.1" id="wdt-column-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-pro/modules/woocommerce/listings/elementor/widgets/products/assets/js/swiper.min.js?ver=6.7.1" id="jquery-swiper-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/js/carousel.js?ver=6.7.1" id="wdt-carousel-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/mailchimp/assets/js/script.js?ver=6.7.1" id="wdt-mailchimp-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/animation/assets/js/script.js?ver=6.7.1" id="wdt-animation-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-plus/modules/blog/elementor/widgets/assets/js/blogcarousel.js?ver=1.0.2" id="wdt-blogcarousel-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/jquery/ui/core.js?ver=1.13.3" id="jquery-ui-core-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/jquery/ui/accordion.js?ver=1.13.3" id="jquery-ui-accordion-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/accordion-and-toggle/assets/js/script.js?ver=6.7.1" id="wdt-accordion-and-toggle-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/weekly-class/assets/libs/vue/vue.min.js" id="vue-js-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/weekly-class/assets/libs/metafizzy/imagesloaded.pkgd.min.js" id="wcs-images-loaded-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/weekly-class/assets/libs/gmaps/gmap3.min.js?ver=7.1" id="wcs-gmaps-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/weekly-class/assets/libs/vue/vue-resource.min.js" id="vue-resource-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/weekly-class/assets/libs/moment/moment.js" id="moment-js-js"></script>
<script type="text/javascript" id="wcs-main-js-extra">
/* <![CDATA[ */
var wcs_locale = {"firstDay":"1","monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"gmtOffset":"0"};
var wcs_moment_locale = {"firstDay":"1","months":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthsShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"weekdays":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"weekdaysShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"weekdaysMin":["S","M","T","W","T","F","S"]};
var wcs_settings = {"hasSingle":""};
var wcs_select2 = {"errorLoading":"The results could not be loaded.","inputTooLong":"Please delete %n character(s)","inputTooShort":"Please enter %n or more characters","loadingMore":"Loading more results\u2026","maximumSelected":"You can only select %n item(s)","noResults":"No results found","searching":"Searching\u2026"};
var wcs_google_key = "AIzaSyArPwtdP09w4OeKGuRDjZlGkUshNh180z8";
var ajaxurl = "https:\/\/dtmantra.wpengine.com\/wp-admin\/admin-ajax.php";
var wcs_maps_url = "\/\/maps.google.com\/maps\/api\/js?key=AIzaSyArPwtdP09w4OeKGuRDjZlGkUshNh180z8";
var EventsSchedule_1 = {"css":" .wcs-timetable--1.wcs-timetable__container{color:#232323}.wcs-timetable--1 .wcs-timetable{border-color:#232323}.wcs-timetable--1 .wcs-filters__title,.wcs-timetable--1 .wcs-filters__filter-wrapper:hover,.wcs-timetable--1 .wcs-filter:checked + span{color:#c1a78c}.wcs-timetable--1 .wcs-btn--action,.wcs-timetable--1 .wcs-btn--action:hover{background-color:#c1a78c;color:rgba( 0,0,0,0.75)}.wcs-modal[data-wcs-modal-id='1'] .wcs-btn--action,.wcs-modal[data-wcs-modal-id='1'] .wcs-btn--action:hover{background-color:#c1a78c;color:rgba( 0,0,0,0.75)}.wcs-timetable--1 .wcs-timetable__week .wcs-class__duration{color:#c1a78c}.wcs-timetable--1 .wcs-timetable__week .wcs-day__title{background-color:#c1a78c;color:rgba( 0,0,0,0.75)}","feed":[{"title":"Yoga Sculpt","id":4416,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"a919efb1f66b0cf3072ef4244af1d943","visible":true,"timestamp":1741341600,"last":1807401600,"start":"2025-03-07T10:00:00+00:00","end":"2025-03-07T11:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-3\/?wcs_timestamp=1741341600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741341600&end=1741345200&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741341600"}},"meta":[]},{"title":"Baddha Yoga","id":4479,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"40cd75bf7d1ba3fefb238b152e350064","visible":true,"timestamp":1741345200,"last":1807315200,"start":"2025-03-07T11:00:00+00:00","end":"2025-03-07T12:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-8\/?wcs_timestamp=1741345200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741345200&end=1741348800&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741345200"}},"meta":[]},{"title":"Baddha Yoga","id":4377,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"e48dd17f17c98d5e1f93d31a08bcae6e","visible":true,"timestamp":1741363200,"last":1807315200,"start":"2025-03-07T16:00:00+00:00","end":"2025-03-07T17:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga\/?wcs_timestamp=1741363200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741363200&end=1741366800&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741363200"}},"meta":[]},{"title":"Hatha yoga","id":4472,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"6480bf57c2b7031309a9348d11194131","visible":true,"timestamp":1741363200,"last":1807315200,"start":"2025-03-07T16:00:00+00:00","end":"2025-03-07T17:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-8\/?wcs_timestamp=1741363200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741363200&end=1741366800&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741363200"}},"meta":[]},{"title":"Baddha Yoga","id":4473,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"daf021c6ac0162b841ad5d29105b1c7f","visible":true,"timestamp":1741420800,"last":1807401600,"start":"2025-03-08T08:00:00+00:00","end":"2025-03-08T09:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-6\/?wcs_timestamp=1741420800","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741420800&end=1741424400&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741420800"}},"meta":[]},{"title":"Yoga Sculpt","id":4480,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"3ebb35b8fd5b166c611c4a1fc17ad62b","visible":true,"timestamp":1741424400,"last":1807401600,"start":"2025-03-08T09:00:00+00:00","end":"2025-03-08T10:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-8\/?wcs_timestamp=1741424400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741424400&end=1741428000&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741424400"}},"meta":[]},{"title":"Hatha yoga","id":4417,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"5d9f104c10ffb3a9ff8e28b7f5a85634","visible":true,"timestamp":1741424400,"last":1807401600,"start":"2025-03-08T09:00:00+00:00","end":"2025-03-08T10:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-6\/?wcs_timestamp=1741424400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741424400&end=1741428000&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741424400"}},"meta":[]},{"title":"Yoga Sculpt","id":4398,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"2bc10c74a41065c07f62919960f4f328","visible":true,"timestamp":1741449600,"last":1807401600,"start":"2025-03-08T16:00:00+00:00","end":"2025-03-08T17:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-2\/?wcs_timestamp=1741449600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741449600&end=1741453200&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741449600"}},"meta":[]},{"title":"Yoga Sculpt","id":4474,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"90df50907ce762578daa995f8ea18f6e","visible":true,"timestamp":1741503600,"last":1807488000,"start":"2025-03-09T07:00:00+00:00","end":"2025-03-09T08:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-6\/?wcs_timestamp=1741503600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741503600&end=1741507200&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741503600"}},"meta":[]},{"title":"Baddha Yoga","id":4418,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"170dcdcab170ba67aa3ce680923d336f","visible":true,"timestamp":1741507200,"last":1807488000,"start":"2025-03-09T08:00:00+00:00","end":"2025-03-09T09:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-4\/?wcs_timestamp=1741507200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741507200&end=1741510800&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741507200"}},"meta":[]},{"title":"Hatha yoga","id":4481,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"70d0b09bb2f1c9f5037608f0fcef5b60","visible":true,"timestamp":1741510800,"last":1807488000,"start":"2025-03-09T09:00:00+00:00","end":"2025-03-09T10:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-11\/?wcs_timestamp=1741510800","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741510800&end=1741514400&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741510800"}},"meta":[]},{"title":"Yoga Sculpt","id":4378,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"9872706300a795b6f90ec8b0c85128ca","visible":true,"timestamp":1741518000,"last":1807488000,"start":"2025-03-09T11:00:00+00:00","end":"2025-03-09T12:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt\/?wcs_timestamp=1741518000","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741518000&end=1741521600&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741518000"}},"meta":[]},{"title":"Yoga Sculpt","id":4468,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"9741ec0aa75da444d09d7ec2438251a1","visible":true,"timestamp":1741586400,"last":1806969600,"start":"2025-03-10T06:00:00+00:00","end":"2025-03-10T07:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-4\/?wcs_timestamp=1741586400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741586400&end=1741590000&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741586400"}},"meta":[]},{"title":"Hatha yoga","id":4475,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"a440d761e89a85b13180c3de70b7b230","visible":true,"timestamp":1741586400,"last":1806969600,"start":"2025-03-10T06:00:00+00:00","end":"2025-03-10T07:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-9\/?wcs_timestamp=1741586400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741586400&end=1741590000&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741586400"}},"meta":[]},{"title":"Hatha yoga","id":4414,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"8c4fe756b5f5a0cdd205a7ee8a62874e","visible":true,"timestamp":1741608000,"last":1806969600,"start":"2025-03-10T12:00:00+00:00","end":"2025-03-10T13:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-5\/?wcs_timestamp=1741608000","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741608000&end=1741611600&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741608000"}},"meta":[]},{"title":"Hatha yoga","id":4373,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"42e9505f9923673aa7bd9d7a65cdae3a","visible":true,"timestamp":1741629600,"last":1806969600,"start":"2025-03-10T18:00:00+00:00","end":"2025-03-10T19:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga\/?wcs_timestamp=1741629600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741629600&end=1741633200&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741629600"}},"meta":[]},{"title":"Hatha yoga","id":4469,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"bdc7b8e4943fd7ca25a870be5486c675","visible":true,"timestamp":1741669200,"last":1807056000,"start":"2025-03-11T05:00:00+00:00","end":"2025-03-11T06:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-7\/?wcs_timestamp=1741669200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741669200&end=1741672800&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741669200"}},"meta":[]},{"title":"Hatha yoga","id":4394,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"597ceff62102131e6163da62d7f35876","visible":true,"timestamp":1741676400,"last":1807056000,"start":"2025-03-11T07:00:00+00:00","end":"2025-03-11T08:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-4\/?wcs_timestamp=1741676400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741676400&end=1741680000&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741676400"}},"meta":[]},{"title":"Baddha Yoga","id":4380,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"bcf0d2c9b314135644e8142adf874541","visible":true,"timestamp":1741683600,"last":1807056000,"start":"2025-03-11T09:00:00+00:00","end":"2025-03-11T10:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-3\/?wcs_timestamp=1741683600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741683600&end=1741687200&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741683600"}},"meta":[]},{"title":"Baddha Yoga","id":4476,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"edf39bc4918a5babca24cb170577df2c","visible":true,"timestamp":1741701600,"last":1807056000,"start":"2025-03-11T14:00:00+00:00","end":"2025-03-11T15:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-7\/?wcs_timestamp=1741701600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741701600&end=1741705200&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741701600"}},"meta":[]},{"title":"Yoga Sculpt","id":4381,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"8065901a064ec4335f0371b5c309df8a","visible":true,"timestamp":1741766400,"last":1807142400,"start":"2025-03-12T08:00:00+00:00","end":"2025-03-12T09:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-2\/?wcs_timestamp=1741766400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741766400&end=1741770000&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741766400"}},"meta":[]},{"title":"Hatha yoga","id":4379,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"ed0ca7a60af0d4cb314aba958a927a62","visible":true,"timestamp":1741773600,"last":1807142400,"start":"2025-03-12T10:00:00+00:00","end":"2025-03-12T11:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-2\/?wcs_timestamp=1741773600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741773600&end=1741777200&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741773600"}},"meta":[]},{"title":"Yoga Sculpt","id":4477,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"60a2c7a5b530e71fd10bf25740f07790","visible":true,"timestamp":1741784400,"last":1807142400,"start":"2025-03-12T13:00:00+00:00","end":"2025-03-12T14:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-7\/?wcs_timestamp=1741784400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741784400&end=1741788000&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741784400"}},"meta":[]},{"title":"Baddha Yoga","id":4470,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"f7e7363f1113dbbeb4268951272a4295","visible":true,"timestamp":1741802400,"last":1807142400,"start":"2025-03-12T18:00:00+00:00","end":"2025-03-12T19:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-5\/?wcs_timestamp=1741802400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741802400&end=1741806000&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741802400"}},"meta":[]},{"title":"Baddha Yoga","id":4396,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"dba72db75ef4552b6f841e5d63b0c82c","visible":true,"timestamp":1741845600,"last":1807056000,"start":"2025-03-13T06:00:00+00:00","end":"2025-03-13T07:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-3-2\/?wcs_timestamp=1741845600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741845600&end=1741849200&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741845600"}},"meta":[]},{"title":"Baddha Yoga","id":4415,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"33f0cf49fd325b594a018a084eac9042","visible":true,"timestamp":1741863600,"last":1807228800,"start":"2025-03-13T11:00:00+00:00","end":"2025-03-13T12:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-3\/?wcs_timestamp=1741863600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741863600&end=1741867200&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741863600"}},"meta":[]},{"title":"Hatha yoga","id":4478,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"091b4c1ccecd9f56be765968cf8858e7","visible":true,"timestamp":1741867200,"last":1807228800,"start":"2025-03-13T12:00:00+00:00","end":"2025-03-13T13:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-10\/?wcs_timestamp=1741867200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741867200&end=1741870800&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741867200"}},"meta":[]},{"title":"Yoga Sculpt","id":4471,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"f4287d2cdd75a4d3f909ac06b9e26530","visible":true,"timestamp":1741885200,"last":1807228800,"start":"2025-03-13T17:00:00+00:00","end":"2025-03-13T18:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-5\/?wcs_timestamp=1741885200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741885200&end=1741888800&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741885200"}},"meta":[]}],"filters":{"visible":false,"options":{"label_toggle":""},"taxonomies":[]},"options":{"action":"wcs_update_schedule","wp_nonce":"cccce5e8ff","view":"3","days":"7","limit":0,"title":"Class Schedule_1","content":{"wcs_type":["65","63","64"],"wcs_instructor":["66","67","68"]},"single":"","id":"1","label_wcs_type":"","label_filter_wcs_type":"","show_wcs_type":false,"show_filter_wcs_type":false,"label_wcs_room":"","label_filter_wcs_room":"","show_wcs_room":false,"show_filter_wcs_room":false,"label_wcs_instructor":"","label_filter_wcs_instructor":"","show_wcs_instructor":true,"show_filter_wcs_instructor":false,"show_starting_hours":false,"show_navigation":false,"carousel_nav":"true","carousel_dots":"true","carousel_autoplay":"false","carousel_loop":"false","carousel_autoplay_speed":"5000","carousel_items_xl":"6","carousel_items_lg":"4","carousel_items_md":"3","carousel_items_xs":"1","carousel_items_spacing":"10","carousel_padding":"0","grid_items_lg":"4","grid_items_md":"3","grid_items_xs":"1","calendar_limit":"true","calendar_sticky":"true","calendar_weekends":"true","countdown_starting":"true","countdown_vertical":"false","countdown_image":"false","countdown_image_position":"4","countdown_overlay":"10","cover_aspect":"0","cover_text_position":"6","cover_text_align":"0","cover_text_size":"1","cover_overlay_type":"0","cover_overlay":"10","mth_cal_agenda_position":"0","mth_cal_borders":"0","mth_cal_day_format":"dddd","mth_cal_show_weekends":"true","mth_cal_rows":"false","mth_cal_highlight":"false","mth_cal_date_format":"MMMM DD","show_title":true,"show_ending":true,"show_duration":false,"show_description":false,"show_excerpt":false,"show_more":false,"show_time_format":false,"label_dateformat":"","show_past_events":false,"reverse_order":"false","starting_date":"","show_filter_day_of_week":false,"show_filter_time_of_day":false,"filters_position":"1","filters_style":"false","show_filters_opened":false,"modal":"0","show_modal":false,"show_modal_duration":true,"show_modal_ending":true,"label_modal_dateformat":"","modal_wcs_type":"true","modal_wcs_room":"true","modal_wcs_instructor":"true","color_text":"#232323","color_special":"#c1a78c","color_days_01":"","color_days_02":"","color_days_03":"","color_days_04":"","color_days_05":"","color_days_06":"","color_days_07":"","color_carousel_item_bg":"#ffffff","color_carousel_item_nav":"","color_grid_item_bg":"#ffffff","color_timeline_item_bg":"#ffffff","color_monthly_event_bg":"#16a085","color_monthly_event_past":"#e2e2e2","color_monthly_today":"#FBF9E3","color_countdown_bg":"#16a085","color_cover_bg":"#ffffff","color_mth_selected":"#BD322C","label_mth_prev":"Prev","label_mth_next":"Next","label_countdown_seconds":"Second,Seconds","label_countdown_minutes":"Minute,Minutes","label_countdown_hours":"Hour,Hours","label_countdown_days":"Day,Days","label_countdown_months":"Month,Months","label_countdown_years":"Year,Years","label_grid_all_wcs_instructor":"All","label_grid_all_wcs_room":"All","label_grid_all_wcs_type":"All","label_grid_all_time_of_day":"Any","label_grid_all_day_of_week":"Any","label_carousel_prev":"","label_carousel_next":"","label_weekly_schedule_prev":"","label_weekly_schedule_next":"","label_filter_day":"","label_filter_time":"","label_more":"More Classes","label_toggle":"","label_info":"","zero":"Nothing to show.","woocommerce-login-nonce":null,"_wpnonce":null,"woocommerce-reset-password-nonce":null,"last_edit_date":1713274848,"color_special_contrast":"rgba( 0, 0, 0, 1)","terms_colors":[],"el_id":"1","mixins":"wcs_timetable_weekly_mixins","is_single":false,"ts_start":"2025-03-07","ts_stop":"2025-03-13"}};
var EventsSchedule_1 = {"css":" .wcs-timetable--1.wcs-timetable__container{color:#232323}.wcs-timetable--1 .wcs-timetable{border-color:#232323}.wcs-timetable--1 .wcs-filters__title,.wcs-timetable--1 .wcs-filters__filter-wrapper:hover,.wcs-timetable--1 .wcs-filter:checked + span{color:#c1a78c}.wcs-timetable--1 .wcs-btn--action,.wcs-timetable--1 .wcs-btn--action:hover{background-color:#c1a78c;color:rgba( 0,0,0,0.75)}.wcs-modal[data-wcs-modal-id='1'] .wcs-btn--action,.wcs-modal[data-wcs-modal-id='1'] .wcs-btn--action:hover{background-color:#c1a78c;color:rgba( 0,0,0,0.75)}.wcs-timetable--1 .wcs-timetable__week .wcs-class__duration{color:#c1a78c}.wcs-timetable--1 .wcs-timetable__week .wcs-day__title{background-color:#c1a78c;color:rgba( 0,0,0,0.75)}","feed":[{"title":"Yoga Sculpt","id":4416,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"a919efb1f66b0cf3072ef4244af1d943","visible":true,"timestamp":1741341600,"last":1807401600,"start":"2025-03-07T10:00:00+00:00","end":"2025-03-07T11:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-3\/?wcs_timestamp=1741341600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741341600&end=1741345200&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741341600"}},"meta":[]},{"title":"Baddha Yoga","id":4479,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"40cd75bf7d1ba3fefb238b152e350064","visible":true,"timestamp":1741345200,"last":1807315200,"start":"2025-03-07T11:00:00+00:00","end":"2025-03-07T12:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-8\/?wcs_timestamp=1741345200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741345200&end=1741348800&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741345200"}},"meta":[]},{"title":"Baddha Yoga","id":4377,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"e48dd17f17c98d5e1f93d31a08bcae6e","visible":true,"timestamp":1741363200,"last":1807315200,"start":"2025-03-07T16:00:00+00:00","end":"2025-03-07T17:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga\/?wcs_timestamp=1741363200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741363200&end=1741366800&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741363200"}},"meta":[]},{"title":"Hatha yoga","id":4472,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"6480bf57c2b7031309a9348d11194131","visible":true,"timestamp":1741363200,"last":1807315200,"start":"2025-03-07T16:00:00+00:00","end":"2025-03-07T17:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-8\/?wcs_timestamp=1741363200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741363200&end=1741366800&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741363200"}},"meta":[]},{"title":"Baddha Yoga","id":4473,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"daf021c6ac0162b841ad5d29105b1c7f","visible":true,"timestamp":1741420800,"last":1807401600,"start":"2025-03-08T08:00:00+00:00","end":"2025-03-08T09:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-6\/?wcs_timestamp=1741420800","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741420800&end=1741424400&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741420800"}},"meta":[]},{"title":"Yoga Sculpt","id":4480,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"3ebb35b8fd5b166c611c4a1fc17ad62b","visible":true,"timestamp":1741424400,"last":1807401600,"start":"2025-03-08T09:00:00+00:00","end":"2025-03-08T10:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-8\/?wcs_timestamp=1741424400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741424400&end=1741428000&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741424400"}},"meta":[]},{"title":"Hatha yoga","id":4417,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"5d9f104c10ffb3a9ff8e28b7f5a85634","visible":true,"timestamp":1741424400,"last":1807401600,"start":"2025-03-08T09:00:00+00:00","end":"2025-03-08T10:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-6\/?wcs_timestamp=1741424400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741424400&end=1741428000&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741424400"}},"meta":[]},{"title":"Yoga Sculpt","id":4398,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"2bc10c74a41065c07f62919960f4f328","visible":true,"timestamp":1741449600,"last":1807401600,"start":"2025-03-08T16:00:00+00:00","end":"2025-03-08T17:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-2\/?wcs_timestamp=1741449600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741449600&end=1741453200&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741449600"}},"meta":[]},{"title":"Yoga Sculpt","id":4474,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"90df50907ce762578daa995f8ea18f6e","visible":true,"timestamp":1741503600,"last":1807488000,"start":"2025-03-09T07:00:00+00:00","end":"2025-03-09T08:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-6\/?wcs_timestamp=1741503600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741503600&end=1741507200&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741503600"}},"meta":[]},{"title":"Baddha Yoga","id":4418,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"170dcdcab170ba67aa3ce680923d336f","visible":true,"timestamp":1741507200,"last":1807488000,"start":"2025-03-09T08:00:00+00:00","end":"2025-03-09T09:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-4\/?wcs_timestamp=1741507200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741507200&end=1741510800&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741507200"}},"meta":[]},{"title":"Hatha yoga","id":4481,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"70d0b09bb2f1c9f5037608f0fcef5b60","visible":true,"timestamp":1741510800,"last":1807488000,"start":"2025-03-09T09:00:00+00:00","end":"2025-03-09T10:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-11\/?wcs_timestamp=1741510800","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741510800&end=1741514400&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741510800"}},"meta":[]},{"title":"Yoga Sculpt","id":4378,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"9872706300a795b6f90ec8b0c85128ca","visible":true,"timestamp":1741518000,"last":1807488000,"start":"2025-03-09T11:00:00+00:00","end":"2025-03-09T12:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt\/?wcs_timestamp=1741518000","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741518000&end=1741521600&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741518000"}},"meta":[]},{"title":"Yoga Sculpt","id":4468,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"9741ec0aa75da444d09d7ec2438251a1","visible":true,"timestamp":1741586400,"last":1806969600,"start":"2025-03-10T06:00:00+00:00","end":"2025-03-10T07:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-4\/?wcs_timestamp=1741586400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741586400&end=1741590000&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741586400"}},"meta":[]},{"title":"Hatha yoga","id":4475,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"a440d761e89a85b13180c3de70b7b230","visible":true,"timestamp":1741586400,"last":1806969600,"start":"2025-03-10T06:00:00+00:00","end":"2025-03-10T07:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-9\/?wcs_timestamp=1741586400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741586400&end=1741590000&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741586400"}},"meta":[]},{"title":"Hatha yoga","id":4414,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"8c4fe756b5f5a0cdd205a7ee8a62874e","visible":true,"timestamp":1741608000,"last":1806969600,"start":"2025-03-10T12:00:00+00:00","end":"2025-03-10T13:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-5\/?wcs_timestamp=1741608000","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741608000&end=1741611600&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741608000"}},"meta":[]},{"title":"Hatha yoga","id":4373,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"42e9505f9923673aa7bd9d7a65cdae3a","visible":true,"timestamp":1741629600,"last":1806969600,"start":"2025-03-10T18:00:00+00:00","end":"2025-03-10T19:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga\/?wcs_timestamp=1741629600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741629600&end=1741633200&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741629600"}},"meta":[]},{"title":"Hatha yoga","id":4469,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"bdc7b8e4943fd7ca25a870be5486c675","visible":true,"timestamp":1741669200,"last":1807056000,"start":"2025-03-11T05:00:00+00:00","end":"2025-03-11T06:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-7\/?wcs_timestamp=1741669200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741669200&end=1741672800&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741669200"}},"meta":[]},{"title":"Hatha yoga","id":4394,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"597ceff62102131e6163da62d7f35876","visible":true,"timestamp":1741676400,"last":1807056000,"start":"2025-03-11T07:00:00+00:00","end":"2025-03-11T08:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-4\/?wcs_timestamp=1741676400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741676400&end=1741680000&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741676400"}},"meta":[]},{"title":"Baddha Yoga","id":4380,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"bcf0d2c9b314135644e8142adf874541","visible":true,"timestamp":1741683600,"last":1807056000,"start":"2025-03-11T09:00:00+00:00","end":"2025-03-11T10:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-3\/?wcs_timestamp=1741683600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741683600&end=1741687200&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741683600"}},"meta":[]},{"title":"Baddha Yoga","id":4476,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"edf39bc4918a5babca24cb170577df2c","visible":true,"timestamp":1741701600,"last":1807056000,"start":"2025-03-11T14:00:00+00:00","end":"2025-03-11T15:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-7\/?wcs_timestamp=1741701600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741701600&end=1741705200&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741701600"}},"meta":[]},{"title":"Yoga Sculpt","id":4381,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"8065901a064ec4335f0371b5c309df8a","visible":true,"timestamp":1741766400,"last":1807142400,"start":"2025-03-12T08:00:00+00:00","end":"2025-03-12T09:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-2\/?wcs_timestamp=1741766400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741766400&end=1741770000&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741766400"}},"meta":[]},{"title":"Hatha yoga","id":4379,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"ed0ca7a60af0d4cb314aba958a927a62","visible":true,"timestamp":1741773600,"last":1807142400,"start":"2025-03-12T10:00:00+00:00","end":"2025-03-12T11:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-2\/?wcs_timestamp=1741773600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741773600&end=1741777200&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741773600"}},"meta":[]},{"title":"Yoga Sculpt","id":4477,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"60a2c7a5b530e71fd10bf25740f07790","visible":true,"timestamp":1741784400,"last":1807142400,"start":"2025-03-12T13:00:00+00:00","end":"2025-03-12T14:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-7\/?wcs_timestamp=1741784400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741784400&end=1741788000&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741784400"}},"meta":[]},{"title":"Baddha Yoga","id":4470,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"f7e7363f1113dbbeb4268951272a4295","visible":true,"timestamp":1741802400,"last":1807142400,"start":"2025-03-12T18:00:00+00:00","end":"2025-03-12T19:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-5\/?wcs_timestamp=1741802400","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741802400&end=1741806000&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741802400"}},"meta":[]},{"title":"Baddha Yoga","id":4396,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"dba72db75ef4552b6f841e5d63b0c82c","visible":true,"timestamp":1741845600,"last":1807056000,"start":"2025-03-13T06:00:00+00:00","end":"2025-03-13T07:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-3-2\/?wcs_timestamp=1741845600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741845600&end=1741849200&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741845600"}},"meta":[]},{"title":"Baddha Yoga","id":4415,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"baddha-yoga","id":65,"url":null,"desc":false,"name":"Baddha Yoga"}],"wcs_instructor":[{"slug":"martin-loo","id":67,"url":null,"desc":false,"name":"Martin Loo"}]},"period":60,"excerpt":"","hash":"33f0cf49fd325b594a018a084eac9042","visible":true,"timestamp":1741863600,"last":1807228800,"start":"2025-03-13T11:00:00+00:00","end":"2025-03-13T12:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/baddha-yoga-3\/?wcs_timestamp=1741863600","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741863600&end=1741867200&subject=Baddha+Yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Baddha-Yoga-1741863600"}},"meta":[]},{"title":"Hatha yoga","id":4478,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"hatha-yoga","id":63,"url":null,"desc":false,"name":"Hatha Yoga"}],"wcs_instructor":[{"slug":"jhony-sha","id":66,"url":null,"desc":false,"name":"Jhony Sha"}]},"period":60,"excerpt":"","hash":"091b4c1ccecd9f56be765968cf8858e7","visible":true,"timestamp":1741867200,"last":1807228800,"start":"2025-03-13T12:00:00+00:00","end":"2025-03-13T13:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/hatha-yoga-10\/?wcs_timestamp=1741867200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741867200&end=1741870800&subject=Hatha+yoga&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Hatha-yoga-1741867200"}},"meta":[]},{"title":"Yoga Sculpt","id":4471,"thumbnail":false,"thumbnail_size":false,"multiday":false,"ending":"","duration":"1h","terms":{"wcs_type":[{"slug":"yoga-sculpt","id":64,"url":null,"desc":false,"name":"Yoga Sculpt"}],"wcs_instructor":[{"slug":"geroge","id":68,"url":null,"desc":false,"name":"Geroge"}]},"period":60,"excerpt":"","hash":"f4287d2cdd75a4d3f909ac06b9e26530","visible":true,"timestamp":1741885200,"last":1807228800,"start":"2025-03-13T17:00:00+00:00","end":"2025-03-13T18:00:00+00:00","future":true,"finished":false,"permalink":"https:\/\/dtmantra.wpengine.com\/class\/yoga-sculpt-5\/?wcs_timestamp=1741885200","buttons":{"main":{"custom_url":false,"permalink":false,"label":"Book Now","email":false,"method":1,"target":false,"ical":"https:\/\/dtmantra.wpengine.com\/?feed=wcs_ical&start=1741885200&end=1741888800&subject=Yoga+Sculpt&desc&url=https%3A%2F%2Fdtmantra.wpengine.com%2F&location=Mantra+Site+%40+&name=Yoga-Sculpt-1741885200"}},"meta":[]}],"filters":{"visible":false,"options":{"label_toggle":""},"taxonomies":[]},"options":{"action":"wcs_update_schedule","wp_nonce":"cccce5e8ff","view":"3","days":"7","limit":0,"title":"Class Schedule_1","content":{"wcs_type":["65","63","64"],"wcs_instructor":["66","67","68"]},"single":"","id":"1","label_wcs_type":"","label_filter_wcs_type":"","show_wcs_type":false,"show_filter_wcs_type":false,"label_wcs_room":"","label_filter_wcs_room":"","show_wcs_room":false,"show_filter_wcs_room":false,"label_wcs_instructor":"","label_filter_wcs_instructor":"","show_wcs_instructor":true,"show_filter_wcs_instructor":false,"show_starting_hours":false,"show_navigation":false,"carousel_nav":"true","carousel_dots":"true","carousel_autoplay":"false","carousel_loop":"false","carousel_autoplay_speed":"5000","carousel_items_xl":"6","carousel_items_lg":"4","carousel_items_md":"3","carousel_items_xs":"1","carousel_items_spacing":"10","carousel_padding":"0","grid_items_lg":"4","grid_items_md":"3","grid_items_xs":"1","calendar_limit":"true","calendar_sticky":"true","calendar_weekends":"true","countdown_starting":"true","countdown_vertical":"false","countdown_image":"false","countdown_image_position":"4","countdown_overlay":"10","cover_aspect":"0","cover_text_position":"6","cover_text_align":"0","cover_text_size":"1","cover_overlay_type":"0","cover_overlay":"10","mth_cal_agenda_position":"0","mth_cal_borders":"0","mth_cal_day_format":"dddd","mth_cal_show_weekends":"true","mth_cal_rows":"false","mth_cal_highlight":"false","mth_cal_date_format":"MMMM DD","show_title":true,"show_ending":true,"show_duration":false,"show_description":false,"show_excerpt":false,"show_more":false,"show_time_format":false,"label_dateformat":"","show_past_events":false,"reverse_order":"false","starting_date":"","show_filter_day_of_week":false,"show_filter_time_of_day":false,"filters_position":"1","filters_style":"false","show_filters_opened":false,"modal":"0","show_modal":false,"show_modal_duration":true,"show_modal_ending":true,"label_modal_dateformat":"","modal_wcs_type":"true","modal_wcs_room":"true","modal_wcs_instructor":"true","color_text":"#232323","color_special":"#c1a78c","color_days_01":"","color_days_02":"","color_days_03":"","color_days_04":"","color_days_05":"","color_days_06":"","color_days_07":"","color_carousel_item_bg":"#ffffff","color_carousel_item_nav":"","color_grid_item_bg":"#ffffff","color_timeline_item_bg":"#ffffff","color_monthly_event_bg":"#16a085","color_monthly_event_past":"#e2e2e2","color_monthly_today":"#FBF9E3","color_countdown_bg":"#16a085","color_cover_bg":"#ffffff","color_mth_selected":"#BD322C","label_mth_prev":"Prev","label_mth_next":"Next","label_countdown_seconds":"Second,Seconds","label_countdown_minutes":"Minute,Minutes","label_countdown_hours":"Hour,Hours","label_countdown_days":"Day,Days","label_countdown_months":"Month,Months","label_countdown_years":"Year,Years","label_grid_all_wcs_instructor":"All","label_grid_all_wcs_room":"All","label_grid_all_wcs_type":"All","label_grid_all_time_of_day":"Any","label_grid_all_day_of_week":"Any","label_carousel_prev":"","label_carousel_next":"","label_weekly_schedule_prev":"","label_weekly_schedule_next":"","label_filter_day":"","label_filter_time":"","label_more":"More Classes","label_toggle":"","label_info":"","zero":"Nothing to show.","woocommerce-login-nonce":null,"_wpnonce":null,"woocommerce-reset-password-nonce":null,"last_edit_date":1713274848,"color_special_contrast":"rgba( 0, 0, 0, 1)","terms_colors":[],"el_id":"1","mixins":"wcs_timetable_weekly_mixins","is_single":false,"ts_start":"2025-03-07","ts_stop":"2025-03-13"}};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/weekly-class/assets/front/js/min/scripts-min.js?ver=2.3.1" id="wcs-main-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/elementor/assets/js/webpack.runtime.js?ver=3.21.5" id="elementor-webpack-runtime-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/elementor/assets/js/frontend-modules.js?ver=3.21.5" id="elementor-frontend-modules-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.js?ver=4.0.2" id="elementor-waypoints-js"></script>
<script type="text/javascript" id="elementor-frontend-js-before">
/* <![CDATA[ */
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":true},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselWrapperAriaLabel":"Carousel | Horizontal scrolling: Arrow Left & Right","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":480,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":479,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":767,"default_value":880,"direction":"max","is_enabled":true},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1280,"default_value":1200,"direction":"max","is_enabled":true},"laptop":{"label":"Laptop","value":1540,"default_value":1366,"direction":"max","is_enabled":true},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.21.5","is_static":false,"experimentalFeatures":{"e_optimized_assets_loading":true,"e_optimized_css_loading":true,"e_font_icon_svg":true,"additional_custom_breakpoints":true,"e_swiper_latest":true,"container_grid":true,"home_screen":true,"ai-layout":true,"landing-pages":true},"urls":{"assets":"https:\/\/dtmantra.wpengine.com\/wp-content\/plugins\/elementor\/assets\/"},"swiperClass":"swiper","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_mobile":479,"viewport_mobile_extra":767,"viewport_tablet":1024,"viewport_tablet_extra":1280,"viewport_laptop":1540,"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":67,"title":"Mantra%20Site%20%E2%80%93%20Your%20SUPER-powered%20WP%20Engine%20Site","excerpt":"","featuredImage":false}};
/* ]]> */
</script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/elementor/assets/js/frontend.js?ver=3.21.5" id="elementor-frontend-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/core/sections/assets/js/script.js?ver=1.0.0" id="wdt-elementor-sections-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/core/columns/assets/js/ResizeSensor.js?ver=1.0.0" id="wdt-resize-sensor-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/core/columns/assets/js/sticky-sidebar.min.js?ver=1.0.0" id="wdt-sticky-sidebar-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/core/columns/assets/js/script.js?ver=1.0.0" id="wdt-elementor-columns-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/assets/js/parallax-scroll.min.js?ver=1.0.0" id="wdt-parallax-scroll-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/assets/js/parallax.min.js?ver=1.0.0" id="wdt-parallax-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/core/widgets/assets/js/script.js?ver=1.0.0" id="wdt-elementor-widgets-js"></script>
<a id="back-to-top" href="#">
    <span id="back-to-top-hover"></span>
    <span class="back-to-top-icon"><i class="wdticon-angle-up"></i></span>
</a>


<!-- **Footer - End** -->
       
</body>
</html>
    