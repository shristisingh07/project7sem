
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- link for chatbot3.0 starts here-->
<link rel="stylesheet" href="aichatbot3.0/style.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<script src="aichatbot3.0/script.js" defer></script>
	<!-- link for chatbot3.0 ends here-->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <title>Yoga &#8211; विtaCare</title>
<meta name='robots' content='max-image-preview:large' />
	<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>
	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
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
<link rel='stylesheet' id='elementor-post-1037-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-1037.css?ver=1718260464' type='text/css' media='all' />
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
<link rel="https://api.w.org/" href="https://dtmantra.wpengine.com/wp-json/" /><link rel="alternate" title="JSON" type="application/json" href="https://dtmantra.wpengine.com/wp-json/wp/v2/pages/1037" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://dtmantra.wpengine.com/xmlrpc.php?rsd" />
<link rel="canonical" href="https://dtmantra.wpengine.com/home-2/" />
<link rel='shortlink' href='https://dtmantra.wpengine.com/?p=1037' />
<link rel="alternate" title="oEmbed (JSON)" type="application/json+oembed" href="https://dtmantra.wpengine.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdtmantra.wpengine.com%2Fhome-2%2F" />
<link rel="alternate" title="oEmbed (XML)" type="text/xml+oembed" href="https://dtmantra.wpengine.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdtmantra.wpengine.com%2Fhome-2%2F&#038;format=xml" />
<style type="text/css" media="all" id="wcs_styles"></style><meta name="tec-api-version" content="v1"><meta name="tec-api-origin" content="https://dtmantra.wpengine.com"><link rel="alternate" href="https://dtmantra.wpengine.com/wp-json/tribe/events/v1/" />	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
	<meta name="generator" content="Elementor 3.21.5; features: e_optimized_assets_loading, e_optimized_css_loading, e_font_icon_svg, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
<link rel="icon" href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" sizes="32x32" />
<link rel="icon" href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" sizes="192x192" />
<link rel="apple-touch-icon" href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" />
<meta name="msapplication-TileImage" content="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fav-icon.svg" />

<style>
	/* Container styling */
.wellness-container {
  border: 1px solid #e0e0e0;
  border-radius: 8px;
  padding: 25px;
  margin: 30px 0;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
 
}

/* Button styling */
.explore-more-container {
  text-align: center;
  margin-top: 25px;
}

.explore-button {
  background:#c1a78c;
  color: white;
  border: none;
  padding: 12px 30px;
  border-radius: 30px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  font-size: 16px;
}

.explore-button:hover {
  background: #388E3C;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>
</head>

<body class="page-template page-template-elementor_header_footer page page-id-1037 wp-custom-logo theme-mantras has-go-to-top mantras-plus-1.0.2 mantras-pro-1.0.0 woocommerce-no-js tribe-no-js woo-variation-swatches wvs-behavior-blur wvs-theme-mantras wvs-show-label wvs-tooltip tinvwl-theme-style elementor-default elementor-template-full-width elementor-kit-14 elementor-page elementor-page-1037">
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
			<div id="mantras-ec0da8a" class="wdt-logo-container">  <a href="index.php" rel="home"><img loading="lazy"style="width:6rem; height:6rem;"src="img/logo.png"alt="vitaCare" /></a></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-1b5acd1 elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="1b5acd1" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-daff50b elementor-widget__width-auto elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile elementor-widget elementor-widget-wdt-header-menu" data-id="daff50b" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-header-menu.default">
				<div class="elementor-widget-container">
			<div class="wdt-header-menu" data-menu="0"><div class="menu-container"><ul id="menu-main-menu-1" class="wdt-primary-nav " data-menu="0"> <li class="close-nav"><a href="javascript:void(0);"></a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-480 menu-item-depth-0"><a href="index.php"><span data-text="Home">Home</span></a></li>


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
 </ul> <div class="sub-menu-overlay"></div></div><div class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="0"><a href="#" class="menu-trigger menu-trigger-icon" data-menu="0"><i></i><span>Menu</span></a><div class="mobile-menu" data-menu="0"></div><div class="overlay"></div></div></div>		</div>
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
			<div id="mantras-5bb0d65" class="wdt-logo-container">  <a href="index.php" rel="home"><img loading="lazy" src="img/logo.png" alt="VitaCare Site" style="width:6rem; height:6rem;" /></a></div>			</div>
				</div>
				<div class="elementor-element elementor-element-8dccd3a elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="8dccd3a" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							<p><span  style="font-weight:bold; font-size:1.2rem;">Welcome to VitaCare - </span>Your Partner in Health & Wellness At VitaCare, we are dedicated to helping you take control of your health. Our comprehensive health management platform offers personalized care solutions and innovative tools to keep you and your family healthy.</p>						</div>
				</div>
				<div class="elementor-element elementor-element-9544f16 start center center wdt-slider-btn elementor-widget__width-auto elementor-widget-mobile_extra__width-auto elementor-widget elementor-widget-wdt-button" data-id="9544f16" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-9544f16"><a class="wdt-button" href="about.php"><div class="wdt-button-text"><span>Know More</span></div></a></div>		</div>
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
			<div class="wdt-heading-holder " id="wdt-heading-1f09911"><h4 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title"><a href="contact.php"  style="text-decoration:none;">Contact Us</a></span></h4></div>		</div>
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
			<div class="wdt-header-menu" data-menu="0"><div class="menu-container"><ul id="menu-main-menu-2" class="wdt-primary-nav " data-menu="0"> <li class="close-nav"><a href="javascript:void(0);"></a></li> <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-480 menu-item-depth-0"><a href="index.php"><span data-text="Home">Home</span></a></li>
			
			
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4487 menu-item-depth-0"><a href="about.php"><span data-text="About Us">About Us</span></a></li>

<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4503 menu-item-depth-0"><a href="#"><span data-text="Classes">Services</span></a>
<ul class="sub-menu is-hidden">
<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>	<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-4493 menu-item-depth-1"><a href="yoga.php"><span data-text="Classes Listing">WorkOut Plan</span></a>
	<ul class="sub-menu is-hidden">
		<li class="close-nav"><a href="javascript:void(0);"></a></li><li class="go-back"><a href="javascript:void(0);"></a></li><li class="see-all"></li>		<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5384 menu-item-depth-2"><a href="wokoutless18.php"><span data-text="Less Than 18 Year">Less Than 18 Year</span></a></li>
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
                    		<div data-elementor-type="wp-page" data-elementor-id="1037" class="elementor elementor-1037">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-dc3a588 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="dc3a588" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-553dac5" data-id="553dac5" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-a560505 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="a560505" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-3979d79" data-id="3979d79" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-c43832b wdt-home-slider center elementor-widget elementor-widget-wdt-advanced-carousel" data-id="c43832b" data-element_type="widget" data-settings="{&quot;effect&quot;:&quot;fade&quot;,&quot;slides_to_show_opts&quot;:&quot;1&quot;,&quot;slides_to_show_opts_laptop&quot;:&quot;1&quot;,&quot;slides_to_show_opts_tablet_extra&quot;:&quot;1&quot;,&quot;slides_to_show_opts_tablet&quot;:&quot;1&quot;,&quot;pagination&quot;:&quot;fraction&quot;,&quot;speed&quot;:800,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:6000,&quot;direction&quot;:&quot;horizontal&quot;,&quot;slides_to_show_opts_mobile_extra&quot;:1,&quot;slides_to_show_opts_mobile&quot;:1,&quot;slides_to_scroll_opts&quot;:&quot;single&quot;,&quot;mouse_wheel_scroll&quot;:&quot;false&quot;,&quot;arrows&quot;:&quot;yes&quot;,&quot;gap&quot;:{&quot;unit&quot;:&quot;dpt&quot;,&quot;size&quot;:20,&quot;sizes&quot;:[]},&quot;gap_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;gap_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;gap_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;allow_touch&quot;:&quot;yes&quot;,&quot;loop&quot;:&quot;yes&quot;,&quot;centered_slides&quot;:&quot;no&quot;,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-advanced-carousel.default">
				<div class="elementor-widget-container">
			<div class="wdt-advanced-carousel-holder  wdt-content-item-holder wdt-carousel-holder wdt-rc-template-default" id="wdt-advanced-carousel-c43832b" data-id="c43832b" data-settings=""><div class="wdt-advanced-carousel-container swiper" data-settings="{&quot;direction&quot;:&quot;horizontal&quot;,&quot;effect&quot;:&quot;fade&quot;,&quot;slides_to_show&quot;:&quot;1&quot;,&quot;slides_to_scroll&quot;:1,&quot;arrows&quot;:&quot;yes&quot;,&quot;pagination&quot;:&quot;fraction&quot;,&quot;mouse_wheel_scroll&quot;:&quot;false&quot;,&quot;speed&quot;:800,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:6000,&quot;autoplay_direction&quot;:&quot;&quot;,&quot;allow_touch&quot;:&quot;yes&quot;,&quot;loop&quot;:&quot;yes&quot;,&quot;centered_slides&quot;:&quot;no&quot;,&quot;pause_on_interaction&quot;:&quot;&quot;,&quot;overflow_type&quot;:&quot;&quot;,&quot;overflow_opacity&quot;:&quot;&quot;,&quot;unequal_height_compatability&quot;:null,&quot;gap&quot;:20,&quot;responsive&quot;:[{&quot;breakpoint&quot;:319,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:480,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:768,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:1025,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:1281,&quot;toshow&quot;:1,&quot;toscroll&quot;:1},{&quot;breakpoint&quot;:1541,&quot;toshow&quot;:1,&quot;toscroll&quot;:1}],&quot;space_between_gaps&quot;:{&quot;desktop&quot;:20,&quot;mobile&quot;:20,&quot;mobile_extra&quot;:20,&quot;tablet&quot;:20,&quot;tablet_extra&quot;:20,&quot;laptop&quot;:20}}" id="wdt-advanced-carousel-swiper-c43832b"><div class="wdt-advanced-carousel-wrapper swiper-wrapper"><div class="swiper-slide"><div class="wdt-content-item"><style>.elementor-862 .elementor-element.elementor-element-d9fc9db:not(.elementor-motion-effects-element-type-background), .elementor-862 .elementor-element.elementor-element-d9fc9db > .elementor-motion-effects-container > .elementor-motion-effects-layer{background-color:var( --e-global-color-3085eed );}.elementor-862 .elementor-element.elementor-element-d9fc9db{transition:background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;padding:150px 0px 70px 0px;}.elementor-862 .elementor-element.elementor-element-d9fc9db > .elementor-background-overlay{transition:background 0.3s, border-radius 0.3s, opacity 0.3s;}.elementor-bc-flex-widget .elementor-862 .elementor-element.elementor-element-996d3fd.elementor-column .elementor-widget-wrap{align-items:center;}.elementor-862 .elementor-element.elementor-element-996d3fd.elementor-column.elementor-element[data-element_type="column"] > .elementor-widget-wrap.elementor-element-populated{align-content:center;align-items:center;}.elementor-862 .elementor-element.elementor-element-996d3fd > .elementor-widget-wrap > .elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute){margin-bottom:0px;}.elementor-862 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 100px 0px 0px;}.elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder, .elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder > .wdt-heading-separator-wrapper .wdt-heading-separator, .elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder > .wdt-heading-title-wrapper .wdt-heading-title, .elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder > .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{text-align:start;justify-content:start;justify-items:start;}.elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder .wdt-heading-title-wrapper .wdt-heading-title{align-items:center;}.elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{align-items:center;}.elementor-862 .elementor-element.elementor-element-62c677f > .elementor-widget-container{margin:0px 0px 60px 0px;}.elementor-862 .elementor-element.elementor-element-62c677f{width:var( --container-widget-width, 600px );max-width:600px;--container-widget-width:600px;--container-widget-flex-grow:0;}.elementor-862 .elementor-element.elementor-element-62d64d8 .elementor-widget-container{text-align:start;justify-content:start;justify-items:start;}.elementor-862 .elementor-element.elementor-element-62d64d8 .wdt-button-holder .wdt-button{margin:0px 0px 0px 0px;}.elementor-bc-flex-widget .elementor-862 .elementor-element.elementor-element-202d83d.elementor-column .elementor-widget-wrap{align-items:flex-end;}.elementor-862 .elementor-element.elementor-element-202d83d.elementor-column.elementor-element[data-element_type="column"] > .elementor-widget-wrap.elementor-element-populated{align-content:flex-end;align-items:flex-end;}.elementor-862 .elementor-element.elementor-element-202d83d.elementor-column > .elementor-widget-wrap{justify-content:center;}.elementor-862 .elementor-element.elementor-element-3a523c0{width:auto;max-width:auto;z-index:2;}.elementor-862 .elementor-element.elementor-element-96a87c9{width:var( --container-widget-width, 85% );max-width:85%;--container-widget-width:85%;--container-widget-flex-grow:0;top:0px;z-index:0;}@media(min-width:480px){.elementor-862 .elementor-element.elementor-element-6dd81a9{width:13%;}.elementor-862 .elementor-element.elementor-element-f400aef{width:73.332%;}.elementor-862 .elementor-element.elementor-element-be650f2{width:13%;}}@media(max-width:1540px) and (min-width:480px){.elementor-862 .elementor-element.elementor-element-6dd81a9{width:10%;}.elementor-862 .elementor-element.elementor-element-f400aef{width:80%;}.elementor-862 .elementor-element.elementor-element-be650f2{width:10%;}}@media(max-width:1280px) and (min-width:480px){.elementor-862 .elementor-element.elementor-element-6dd81a9{width:3%;}.elementor-862 .elementor-element.elementor-element-f400aef{width:90%;}.elementor-862 .elementor-element.elementor-element-be650f2{width:7%;}}@media(max-width:1024px) and (min-width:480px){.elementor-862 .elementor-element.elementor-element-be650f2{width:6%;}}@media(max-width:767px) and (min-width:480px){.elementor-862 .elementor-element.elementor-element-6dd81a9{width:100%;}.elementor-862 .elementor-element.elementor-element-f400aef{width:100%;}.elementor-862 .elementor-element.elementor-element-996d3fd{width:100%;}.elementor-862 .elementor-element.elementor-element-202d83d{width:100%;}.elementor-862 .elementor-element.elementor-element-be650f2{width:100%;}}@media(max-width:1540px){.elementor-862 .elementor-element.elementor-element-d9fc9db{padding:150px 0px 70px 0px;}.elementor-862 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 80px 0px 0px;}.elementor-862 .elementor-element.elementor-element-62c677f > .elementor-widget-container{margin:0px 0px 50px 0px;}}@media(max-width:1280px){.elementor-862 .elementor-element.elementor-element-d9fc9db{padding:140px 0px 70px 0px;}.elementor-862 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 70px 0px 0px;}.elementor-862 .elementor-element.elementor-element-62c677f > .elementor-widget-container{margin:0px 0px 40px 0px;}}@media(max-width:1024px){.elementor-862 .elementor-element.elementor-element-d9fc9db{padding:140px 0px 70px 0px;}.elementor-862 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 30px 0px 0px;}}@media(max-width:767px){.elementor-862 .elementor-element.elementor-element-d9fc9db{padding:140px 20px 130px 20px;}.elementor-862 .elementor-element.elementor-element-996d3fd.elementor-column > .elementor-widget-wrap{justify-content:center;}.elementor-862 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:40px 0px 0px 0px;}.elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder, .elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder > .wdt-heading-separator-wrapper .wdt-heading-separator, .elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder > .wdt-heading-title-wrapper .wdt-heading-title, .elementor-862 .elementor-element.elementor-element-62c677f .wdt-heading-holder > .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{text-align:center;justify-content:center;justify-items:center;}.elementor-862 .elementor-element.elementor-element-62c677f > .elementor-widget-container{margin:0px 0px 30px 0px;}.elementor-862 .elementor-element.elementor-element-62d64d8 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}}@media(max-width:479px){.elementor-862 .elementor-element.elementor-element-d9fc9db{padding:120px 20px 110px 20px;}.elementor-862 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:30px 0px 0px 0px;}.elementor-862 .elementor-element.elementor-element-62d64d8 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}}</style>		<div data-elementor-type="page" data-elementor-id="862" class="elementor elementor-862">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-d9fc9db elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d9fc9db" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-6dd81a9 elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="6dd81a9" data-element_type="column">
			<div class="elementor-widget-wrap">
							</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-f400aef" data-id="f400aef" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-b987230 elementor-section-full_width elementor-reverse-mobile_extra elementor-reverse-mobile elementor-section-height-default elementor-section-height-default" data-id="b987230" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-996d3fd" data-id="996d3fd" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-62c677f start center wdt-slider-heading elementor-widget__width-initial elementor-widget elementor-widget-wdt-heading" data-id="62c677f" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-62c677f"><div class="wdt-heading-subtitle-wrapper wdt-heading-align-1 "><span class="wdt-heading-subtitle">Stay Healthy</span></div><h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Yoga For Peaceful Busy Lifestyle</span></h2><div class="wdt-heading-content-wrapper">Yoga is a powerful practice that nurtures both body and mind, helping you stay healthy by improving flexibility, strength, and balance. It promotes mental clarity, reduces stress, and boosts overall well-being, making it an essential tool for maintaining a healthy lifestyle. Regular practice can bring lasting health benefits and peace of mind.</div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-62d64d8 start center center wdt-slider-btn elementor-widget elementor-widget-wdt-button" data-id="62d64d8" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-62d64d8"><a class="wdt-button" href="#"><div class="wdt-button-text"><span>Get Started</span></div></a></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-202d83d" data-id="202d83d" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-3a523c0 elementor-widget__width-auto wdt-slider-main-img elementor-widget elementor-widget-image" data-id="3a523c0" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img fetchpriority="high" fetchpriority="high" decoding="async" width="1550" height="1550" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-1.png" class="attachment-full size-full wp-image-866" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-1.png 1550w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-1-300x300.png 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-1-1024x1024.png 1024w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-1-150x150.png 150w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-1-768x768.png 768w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-1-1536x1536.png 1536w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-1-1000x1000.png 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-1-100x100.png 100w" sizes="(max-width: 1550px) 100vw, 1550px" />													</div>
				</div>
				<div class="elementor-element elementor-element-96a87c9 elementor-absolute wdt-slider-bg-img elementor-widget__width-initial elementor-widget elementor-widget-image" data-id="96a87c9" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img decoding="async" width="1200" height="1154" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1.png" class="attachment-full size-full wp-image-913" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1.png 1200w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-300x289.png 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-1024x985.png 1024w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-768x739.png 768w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-1000x962.png 1000w" sizes="(max-width: 1200px) 100vw, 1200px" />													</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-be650f2 elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="be650f2" data-element_type="column">
			<div class="elementor-widget-wrap">
							</div>
		</div>
					</div>
		</section>
				</div>
		</div></div><div class="swiper-slide"><div class="wdt-content-item"><style>.elementor-4623 .elementor-element.elementor-element-d9fc9db:not(.elementor-motion-effects-element-type-background), .elementor-4623 .elementor-element.elementor-element-d9fc9db > .elementor-motion-effects-container > .elementor-motion-effects-layer{background-color:var( --e-global-color-3085eed );}.elementor-4623 .elementor-element.elementor-element-d9fc9db{transition:background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;padding:150px 0px 70px 0px;}.elementor-4623 .elementor-element.elementor-element-d9fc9db > .elementor-background-overlay{transition:background 0.3s, border-radius 0.3s, opacity 0.3s;}.elementor-bc-flex-widget .elementor-4623 .elementor-element.elementor-element-996d3fd.elementor-column .elementor-widget-wrap{align-items:center;}.elementor-4623 .elementor-element.elementor-element-996d3fd.elementor-column.elementor-element[data-element_type="column"] > .elementor-widget-wrap.elementor-element-populated{align-content:center;align-items:center;}.elementor-4623 .elementor-element.elementor-element-996d3fd > .elementor-widget-wrap > .elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute){margin-bottom:0px;}.elementor-4623 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 100px 0px 0px;}.elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder, .elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder > .wdt-heading-separator-wrapper .wdt-heading-separator, .elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder > .wdt-heading-title-wrapper .wdt-heading-title, .elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder > .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{text-align:start;justify-content:start;justify-items:start;}.elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder .wdt-heading-title-wrapper .wdt-heading-title{align-items:center;}.elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{align-items:center;}.elementor-4623 .elementor-element.elementor-element-e8d9de9 > .elementor-widget-container{margin:0px 0px 60px 0px;}.elementor-4623 .elementor-element.elementor-element-e8d9de9{width:var( --container-widget-width, 600px );max-width:600px;--container-widget-width:600px;--container-widget-flex-grow:0;}.elementor-4623 .elementor-element.elementor-element-6412549 .elementor-widget-container{text-align:start;justify-content:start;justify-items:start;}.elementor-4623 .elementor-element.elementor-element-6412549 .wdt-button-holder .wdt-button{margin:0px 0px 0px 0px;}.elementor-bc-flex-widget .elementor-4623 .elementor-element.elementor-element-202d83d.elementor-column .elementor-widget-wrap{align-items:flex-end;}.elementor-4623 .elementor-element.elementor-element-202d83d.elementor-column.elementor-element[data-element_type="column"] > .elementor-widget-wrap.elementor-element-populated{align-content:flex-end;align-items:flex-end;}.elementor-4623 .elementor-element.elementor-element-202d83d.elementor-column > .elementor-widget-wrap{justify-content:center;}.elementor-4623 .elementor-element.elementor-element-3a523c0{width:auto;max-width:auto;z-index:2;}.elementor-4623 .elementor-element.elementor-element-96a87c9{width:var( --container-widget-width, 85% );max-width:85%;--container-widget-width:85%;--container-widget-flex-grow:0;top:0px;z-index:0;}@media(min-width:480px){.elementor-4623 .elementor-element.elementor-element-6dd81a9{width:13%;}.elementor-4623 .elementor-element.elementor-element-f400aef{width:73.332%;}.elementor-4623 .elementor-element.elementor-element-be650f2{width:13%;}}@media(max-width:1540px) and (min-width:480px){.elementor-4623 .elementor-element.elementor-element-6dd81a9{width:10%;}.elementor-4623 .elementor-element.elementor-element-f400aef{width:80%;}.elementor-4623 .elementor-element.elementor-element-be650f2{width:10%;}}@media(max-width:1280px) and (min-width:480px){.elementor-4623 .elementor-element.elementor-element-6dd81a9{width:3%;}.elementor-4623 .elementor-element.elementor-element-f400aef{width:90%;}.elementor-4623 .elementor-element.elementor-element-be650f2{width:7%;}}@media(max-width:1024px) and (min-width:480px){.elementor-4623 .elementor-element.elementor-element-be650f2{width:6%;}}@media(max-width:767px) and (min-width:480px){.elementor-4623 .elementor-element.elementor-element-6dd81a9{width:100%;}.elementor-4623 .elementor-element.elementor-element-f400aef{width:100%;}.elementor-4623 .elementor-element.elementor-element-996d3fd{width:100%;}.elementor-4623 .elementor-element.elementor-element-202d83d{width:100%;}.elementor-4623 .elementor-element.elementor-element-be650f2{width:100%;}}@media(max-width:1540px){.elementor-4623 .elementor-element.elementor-element-d9fc9db{padding:150px 0px 70px 0px;}.elementor-4623 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 80px 0px 0px;}.elementor-4623 .elementor-element.elementor-element-e8d9de9 > .elementor-widget-container{margin:0px 0px 50px 0px;}}@media(max-width:1280px){.elementor-4623 .elementor-element.elementor-element-d9fc9db{padding:140px 0px 70px 0px;}.elementor-4623 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 70px 0px 0px;}.elementor-4623 .elementor-element.elementor-element-e8d9de9 > .elementor-widget-container{margin:0px 0px 40px 0px;}}@media(max-width:1024px){.elementor-4623 .elementor-element.elementor-element-d9fc9db{padding:140px 0px 70px 0px;}.elementor-4623 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 30px 0px 0px;}}@media(max-width:767px){.elementor-4623 .elementor-element.elementor-element-d9fc9db{padding:140px 20px 130px 20px;}.elementor-4623 .elementor-element.elementor-element-996d3fd.elementor-column > .elementor-widget-wrap{justify-content:center;}.elementor-4623 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:40px 0px 0px 0px;}.elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder, .elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder > .wdt-heading-separator-wrapper .wdt-heading-separator, .elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder > .wdt-heading-title-wrapper .wdt-heading-title, .elementor-4623 .elementor-element.elementor-element-e8d9de9 .wdt-heading-holder > .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{text-align:center;justify-content:center;justify-items:center;}.elementor-4623 .elementor-element.elementor-element-e8d9de9 > .elementor-widget-container{margin:0px 0px 30px 0px;}.elementor-4623 .elementor-element.elementor-element-6412549 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}}@media(max-width:479px){.elementor-4623 .elementor-element.elementor-element-d9fc9db{padding:120px 20px 110px 20px;}.elementor-4623 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:30px 0px 0px 0px;}.elementor-4623 .elementor-element.elementor-element-6412549 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}}</style>		<div data-elementor-type="page" data-elementor-id="4623" class="elementor elementor-4623">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-d9fc9db elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d9fc9db" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-6dd81a9 elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="6dd81a9" data-element_type="column">
			<div class="elementor-widget-wrap">
							</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-f400aef" data-id="f400aef" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-b987230 elementor-section-full_width elementor-reverse-mobile_extra elementor-reverse-mobile elementor-section-height-default elementor-section-height-default" data-id="b987230" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-996d3fd" data-id="996d3fd" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-e8d9de9 start center wdt-slider-heading elementor-widget__width-initial elementor-widget elementor-widget-wdt-heading" data-id="e8d9de9" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-e8d9de9"><div class="wdt-heading-subtitle-wrapper wdt-heading-align-1 "><span class="wdt-heading-subtitle">Balance Within</span></div><h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Find the peace, clarity, and strength in every moment.</span></h2><div class="wdt-heading-content-wrapper">"Balance Within" in yoga is about finding harmony between the mind, body, and spirit. It teaches us to stay grounded amidst life’s challenges, cultivating inner peace and stability. Through mindful movement and breath, yoga helps restore balance, allowing us to center ourselves both on and off the mat. </div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-6412549 start center center wdt-slider-btn elementor-widget elementor-widget-wdt-button" data-id="6412549" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-6412549"><a class="wdt-button" href="#"><div class="wdt-button-text"><span>Get Started</span></div></a></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-202d83d" data-id="202d83d" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-3a523c0 elementor-widget__width-auto wdt-slider-main-img elementor-widget elementor-widget-image" data-id="3a523c0" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img decoding="async" width="1588" height="1584" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2.png" class="attachment-full size-full wp-image-4838" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2.png 1588w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2-300x300.png 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2-1024x1021.png 1024w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2-150x150.png 150w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2-768x766.png 768w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2-1536x1532.png 1536w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2-1000x997.png 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2-100x100.png 100w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-2-50x50.png 50w" sizes="(max-width: 1588px) 100vw, 1588px" />													</div>
				</div>
				<div class="elementor-element elementor-element-96a87c9 elementor-absolute wdt-slider-bg-img elementor-widget__width-initial elementor-widget elementor-widget-image" data-id="96a87c9" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img decoding="async" width="1200" height="1154" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1.png" class="attachment-full size-full wp-image-913" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1.png 1200w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-300x289.png 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-1024x985.png 1024w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-768x739.png 768w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-1000x962.png 1000w" sizes="(max-width: 1200px) 100vw, 1200px" />													</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-be650f2 elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="be650f2" data-element_type="column">
			<div class="elementor-widget-wrap">
							</div>
		</div>
					</div>
		</section>
				</div>
		</div></div><div class="swiper-slide"><div class="wdt-content-item"><style>.elementor-4622 .elementor-element.elementor-element-d9fc9db:not(.elementor-motion-effects-element-type-background), .elementor-4622 .elementor-element.elementor-element-d9fc9db > .elementor-motion-effects-container > .elementor-motion-effects-layer{background-color:var( --e-global-color-3085eed );}.elementor-4622 .elementor-element.elementor-element-d9fc9db{transition:background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;padding:150px 0px 70px 0px;}.elementor-4622 .elementor-element.elementor-element-d9fc9db > .elementor-background-overlay{transition:background 0.3s, border-radius 0.3s, opacity 0.3s;}.elementor-bc-flex-widget .elementor-4622 .elementor-element.elementor-element-996d3fd.elementor-column .elementor-widget-wrap{align-items:center;}.elementor-4622 .elementor-element.elementor-element-996d3fd.elementor-column.elementor-element[data-element_type="column"] > .elementor-widget-wrap.elementor-element-populated{align-content:center;align-items:center;}.elementor-4622 .elementor-element.elementor-element-996d3fd > .elementor-widget-wrap > .elementor-widget:not(.elementor-widget__width-auto):not(.elementor-widget__width-initial):not(:last-child):not(.elementor-absolute){margin-bottom:0px;}.elementor-4622 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 100px 0px 0px;}.elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder, .elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder > .wdt-heading-separator-wrapper .wdt-heading-separator, .elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder > .wdt-heading-title-wrapper .wdt-heading-title, .elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder > .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{text-align:start;justify-content:start;justify-items:start;}.elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder .wdt-heading-title-wrapper .wdt-heading-title{align-items:center;}.elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{align-items:center;}.elementor-4622 .elementor-element.elementor-element-6e4b105 > .elementor-widget-container{margin:0px 0px 60px 0px;}.elementor-4622 .elementor-element.elementor-element-6e4b105{width:var( --container-widget-width, 600px );max-width:600px;--container-widget-width:600px;--container-widget-flex-grow:0;}.elementor-4622 .elementor-element.elementor-element-ba0bde1 .elementor-widget-container{text-align:start;justify-content:start;justify-items:start;}.elementor-4622 .elementor-element.elementor-element-ba0bde1 .wdt-button-holder .wdt-button{margin:0px 0px 0px 0px;}.elementor-bc-flex-widget .elementor-4622 .elementor-element.elementor-element-202d83d.elementor-column .elementor-widget-wrap{align-items:flex-end;}.elementor-4622 .elementor-element.elementor-element-202d83d.elementor-column.elementor-element[data-element_type="column"] > .elementor-widget-wrap.elementor-element-populated{align-content:flex-end;align-items:flex-end;}.elementor-4622 .elementor-element.elementor-element-202d83d.elementor-column > .elementor-widget-wrap{justify-content:center;}.elementor-4622 .elementor-element.elementor-element-3a523c0{width:auto;max-width:auto;z-index:2;}.elementor-4622 .elementor-element.elementor-element-96a87c9{width:var( --container-widget-width, 85% );max-width:85%;--container-widget-width:85%;--container-widget-flex-grow:0;top:0px;z-index:0;}@media(min-width:480px){.elementor-4622 .elementor-element.elementor-element-6dd81a9{width:13%;}.elementor-4622 .elementor-element.elementor-element-f400aef{width:73.332%;}.elementor-4622 .elementor-element.elementor-element-be650f2{width:13%;}}@media(max-width:1540px) and (min-width:480px){.elementor-4622 .elementor-element.elementor-element-6dd81a9{width:10%;}.elementor-4622 .elementor-element.elementor-element-f400aef{width:80%;}.elementor-4622 .elementor-element.elementor-element-be650f2{width:10%;}}@media(max-width:1280px) and (min-width:480px){.elementor-4622 .elementor-element.elementor-element-6dd81a9{width:3%;}.elementor-4622 .elementor-element.elementor-element-f400aef{width:90%;}.elementor-4622 .elementor-element.elementor-element-be650f2{width:7%;}}@media(max-width:1024px) and (min-width:480px){.elementor-4622 .elementor-element.elementor-element-be650f2{width:6%;}}@media(max-width:767px) and (min-width:480px){.elementor-4622 .elementor-element.elementor-element-6dd81a9{width:100%;}.elementor-4622 .elementor-element.elementor-element-f400aef{width:100%;}.elementor-4622 .elementor-element.elementor-element-996d3fd{width:100%;}.elementor-4622 .elementor-element.elementor-element-202d83d{width:100%;}.elementor-4622 .elementor-element.elementor-element-be650f2{width:100%;}}@media(max-width:1540px){.elementor-4622 .elementor-element.elementor-element-d9fc9db{padding:150px 0px 70px 0px;}.elementor-4622 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 80px 0px 0px;}.elementor-4622 .elementor-element.elementor-element-6e4b105 > .elementor-widget-container{margin:0px 0px 50px 0px;}}@media(max-width:1280px){.elementor-4622 .elementor-element.elementor-element-d9fc9db{padding:140px 0px 70px 0px;}.elementor-4622 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 70px 0px 0px;}.elementor-4622 .elementor-element.elementor-element-6e4b105 > .elementor-widget-container{margin:0px 0px 40px 0px;}}@media(max-width:1024px){.elementor-4622 .elementor-element.elementor-element-d9fc9db{padding:140px 0px 70px 0px;}.elementor-4622 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:0px 30px 0px 0px;}}@media(max-width:767px){.elementor-4622 .elementor-element.elementor-element-d9fc9db{padding:140px 20px 130px 20px;}.elementor-4622 .elementor-element.elementor-element-996d3fd.elementor-column > .elementor-widget-wrap{justify-content:center;}.elementor-4622 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:40px 0px 0px 0px;}.elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder, .elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder > .wdt-heading-separator-wrapper .wdt-heading-separator, .elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder > .wdt-heading-title-wrapper .wdt-heading-title, .elementor-4622 .elementor-element.elementor-element-6e4b105 .wdt-heading-holder > .wdt-heading-subtitle-wrapper .wdt-heading-subtitle{text-align:center;justify-content:center;justify-items:center;}.elementor-4622 .elementor-element.elementor-element-6e4b105 > .elementor-widget-container{margin:0px 0px 30px 0px;}.elementor-4622 .elementor-element.elementor-element-ba0bde1 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}}@media(max-width:479px){.elementor-4622 .elementor-element.elementor-element-d9fc9db{padding:120px 20px 110px 20px;}.elementor-4622 .elementor-element.elementor-element-996d3fd > .elementor-element-populated{padding:30px 0px 0px 0px;}.elementor-4622 .elementor-element.elementor-element-ba0bde1 .elementor-widget-container{text-align:center;justify-content:center;justify-items:center;}}</style>		<div data-elementor-type="page" data-elementor-id="4622" class="elementor elementor-4622">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-d9fc9db elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d9fc9db" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-6dd81a9 elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="6dd81a9" data-element_type="column">
			<div class="elementor-widget-wrap">
							</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-f400aef" data-id="f400aef" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-b987230 elementor-section-full_width elementor-reverse-mobile_extra elementor-reverse-mobile elementor-section-height-default elementor-section-height-default" data-id="b987230" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-996d3fd" data-id="996d3fd" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-6e4b105 start center wdt-slider-heading elementor-widget__width-initial elementor-widget elementor-widget-wdt-heading" data-id="6e4b105" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-6e4b105"><div class="wdt-heading-subtitle-wrapper wdt-heading-align-1 "><span class="wdt-heading-subtitle">Discover Self </span></div><h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Find Your Inner Power With Yoga</span></h2><div class="wdt-heading-content-wrapper">Discovering yourself is peeling away layers of conditioning to uncover your true essence. It’s about questioning, evolving, and aligning with your inner truth. The deeper you go, the more you realize—you were never lost, just waiting to be found. </div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-ba0bde1 start center center wdt-slider-btn elementor-widget elementor-widget-wdt-button" data-id="ba0bde1" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-ba0bde1"><a class="wdt-button" href="#"><div class="wdt-button-text"><span>Get Started</span></div></a></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-202d83d" data-id="202d83d" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-3a523c0 elementor-widget__width-auto wdt-slider-main-img elementor-widget elementor-widget-image" data-id="3a523c0" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="1550" height="1550" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3.png" class="attachment-full size-full wp-image-4837" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3.png 1550w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3-300x300.png 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3-1024x1024.png 1024w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3-150x150.png 150w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3-768x768.png 768w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3-1536x1536.png 1536w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3-1000x1000.png 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3-100x100.png 100w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home-2-slider-img-3-50x50.png 50w" sizes="(max-width: 1550px) 100vw, 1550px" />													</div>
				</div>
				<div class="elementor-element elementor-element-96a87c9 elementor-absolute wdt-slider-bg-img elementor-widget__width-initial elementor-widget elementor-widget-image" data-id="96a87c9" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img decoding="async" width="1200" height="1154" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1.png" class="attachment-full size-full wp-image-913" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1.png 1200w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-300x289.png 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-1024x985.png 1024w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-768x739.png 768w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/frame-img-1-1000x962.png 1000w" sizes="(max-width: 1200px) 100vw, 1200px" />													</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-be650f2 elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="be650f2" data-element_type="column">
			<div class="elementor-widget-wrap">
							</div>
		</div>
					</div>
		</section>
				</div>
		</div></div></div></div><div class="wdt-carousel-pagination-wrapper"><div class="wdt-swiper-pagination wdt-swiper-pagination-c43832b"></div><div class="wdt-carousel-arrow-pagination"><div class="wdt-arrow-pagination-prev wdt-arrow-pagination-prev-c43832b"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve"><polygon points="11.1,9.1 6,4 0.9,9.1 0.1,8.4 6,2.5 11.9,8.4 "></polygon></svg></i></div><div class="wdt-arrow-pagination-next wdt-arrow-pagination-next-c43832b"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 12" style="enable-background:new 0 0 12 12;" xml:space="preserve"><polygon points="11.1,2.5 6,7.7 0.9,2.5 0.1,3.3 6,9.1 11.9,3.3 "></polygon></svg></i></div></div></div></div>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-ddf1d47 wdt-section-wrap-col elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ddf1d47" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="wdt-sticky-column elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-68f8153 elementor-hidden-tablet_extra elementor-hidden-mobile_extra elementor-hidden-mobile elementor-hidden-tablet" data-wdt-settings="{&quot;id&quot;:&quot;68f8153&quot;,&quot;sticky&quot;:true,&quot;topSpacing&quot;:50,&quot;bottomSpacing&quot;:50,&quot;stickyOn&quot;:[&quot;tablet_extra&quot;],&quot;overflowHidden&quot;:false}" data-id="68f8153" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-f050a44 animated-slow elementor-invisible elementor-widget elementor-widget-image" data-id="f050a44" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="1000" height="1523" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/yoga-with-mat.png" class="attachment-full size-full wp-image-658" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/yoga-with-mat.png 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/yoga-with-mat-197x300.png 197w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/yoga-with-mat-672x1024.png 672w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/yoga-with-mat-768x1170.png 768w" sizes="(max-width: 1000px) 100vw, 1000px" />													</div>
				</div>
				<div class="elementor-element elementor-element-bf538c1 elementor-absolute animated-fast elementor-invisible elementor-widget elementor-widget-image" data-id="bf538c1" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;auto-movement&quot;,&quot;wdt_ame_duration&quot;:{&quot;unit&quot;:&quot;dpt&quot;,&quot;size&quot;:20,&quot;sizes&quot;:[]},&quot;wdt_ame_direction&quot;:&quot;custom&quot;,&quot;wdt_ame_custom_directions&quot;:[{&quot;_id&quot;:&quot;ba217d7&quot;,&quot;wdt_rotate&quot;:&quot;true&quot;,&quot;wdt_opacity&quot;:&quot;true&quot;,&quot;wdt_x_direction&quot;:&quot;&quot;,&quot;wdt_x_depth&quot;:null,&quot;wdt_x_depth_laptop&quot;:null,&quot;wdt_x_depth_tablet_extra&quot;:null,&quot;wdt_x_depth_tablet&quot;:null,&quot;wdt_x_depth_mobile_extra&quot;:null,&quot;wdt_x_depth_mobile&quot;:null,&quot;wdt_y_direction&quot;:&quot;&quot;,&quot;wdt_y_depth&quot;:null,&quot;wdt_y_depth_laptop&quot;:null,&quot;wdt_y_depth_tablet_extra&quot;:null,&quot;wdt_y_depth_tablet&quot;:null,&quot;wdt_y_depth_mobile_extra&quot;:null,&quot;wdt_y_depth_mobile&quot;:null,&quot;wdt_rotate_angle&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_scale&quot;:&quot;&quot;,&quot;wdt_scale_value&quot;:null,&quot;wdt_scale_value_laptop&quot;:null,&quot;wdt_scale_value_tablet_extra&quot;:null,&quot;wdt_scale_value_tablet&quot;:null,&quot;wdt_scale_value_mobile_extra&quot;:null,&quot;wdt_scale_value_mobile&quot;:null,&quot;wdt_blur&quot;:&quot;&quot;,&quot;wdt_blur_value&quot;:null,&quot;wdt_blur_value_laptop&quot;:null,&quot;wdt_blur_value_tablet_extra&quot;:null,&quot;wdt_blur_value_tablet&quot;:null,&quot;wdt_blur_value_mobile_extra&quot;:null,&quot;wdt_blur_value_mobile&quot;:null,&quot;wdt_opacity_value&quot;:{&quot;unit&quot;:&quot;value&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}},{&quot;wdt_rotate&quot;:&quot;true&quot;,&quot;wdt_rotate_angle&quot;:{&quot;unit&quot;:&quot;deg&quot;,&quot;size&quot;:360,&quot;sizes&quot;:[]},&quot;wdt_opacity&quot;:&quot;true&quot;,&quot;_id&quot;:&quot;1c1c72d&quot;,&quot;wdt_x_direction&quot;:&quot;&quot;,&quot;wdt_x_depth&quot;:null,&quot;wdt_x_depth_laptop&quot;:null,&quot;wdt_x_depth_tablet_extra&quot;:null,&quot;wdt_x_depth_tablet&quot;:null,&quot;wdt_x_depth_mobile_extra&quot;:null,&quot;wdt_x_depth_mobile&quot;:null,&quot;wdt_y_direction&quot;:&quot;&quot;,&quot;wdt_y_depth&quot;:null,&quot;wdt_y_depth_laptop&quot;:null,&quot;wdt_y_depth_tablet_extra&quot;:null,&quot;wdt_y_depth_tablet&quot;:null,&quot;wdt_y_depth_mobile_extra&quot;:null,&quot;wdt_y_depth_mobile&quot;:null,&quot;wdt_rotate_angle_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_rotate_angle_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_scale&quot;:&quot;&quot;,&quot;wdt_scale_value&quot;:null,&quot;wdt_scale_value_laptop&quot;:null,&quot;wdt_scale_value_tablet_extra&quot;:null,&quot;wdt_scale_value_tablet&quot;:null,&quot;wdt_scale_value_mobile_extra&quot;:null,&quot;wdt_scale_value_mobile&quot;:null,&quot;wdt_blur&quot;:&quot;&quot;,&quot;wdt_blur_value&quot;:null,&quot;wdt_blur_value_laptop&quot;:null,&quot;wdt_blur_value_tablet_extra&quot;:null,&quot;wdt_blur_value_tablet&quot;:null,&quot;wdt_blur_value_mobile_extra&quot;:null,&quot;wdt_blur_value_mobile&quot;:null,&quot;wdt_opacity_value&quot;:{&quot;unit&quot;:&quot;value&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_opacity_value_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}],&quot;_animation&quot;:&quot;zoomIn&quot;,&quot;wdt_ame_iteration&quot;:&quot;infinity&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="600" height="617" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/circle-dots.png" class="attachment-full size-full wp-image-659" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/circle-dots.png 600w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/circle-dots-292x300.png 292w" sizes="(max-width: 600px) 100vw, 600px" />													</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-8c20638" data-id="8c20638" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-2470e9d start center elementor-widget-tablet_extra__width-initial elementor-widget-mobile_extra__width-inherit elementor-widget elementor-widget-wdt-heading" data-id="2470e9d" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-2470e9d"><h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Shape Your Perfect Body</span></h2><div class="wdt-heading-content-wrapper">Shape your perfect body through yoga by embracing every stretch, movement, and breath. It's not about perfection, but about building strength, flexibility, and a deeper connection to yourself, cultivating a body that feels strong, healthy, and balanced.</div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-acfa5f5 start start elementor-widget-tablet__width-inherit wdt-custom-btn  center animated-slow elementor-invisible elementor-widget elementor-widget-wdt-button" data-id="acfa5f5" data-element_type="widget" data-settings="{&quot;item_normal_background_background&quot;:&quot;classic&quot;,&quot;item_hover_background_background&quot;:&quot;classic&quot;,&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-acfa5f5"><a class="wdt-button" href="./yogaclassschedule.php"><div class="wdt-button-text"><span>Check Schedule</span></div></a></div>		</div>
				</div>
				<div class="elementor-element elementor-element-47dfdac start wdt-cus-fill3-counter animated-slow elementor-invisible elementor-widget elementor-widget-wdt-counter" data-id="47dfdac" data-element_type="widget" data-settings="{&quot;columns_mobile_extra&quot;:&quot;2&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;columns&quot;:2,&quot;columns_laptop&quot;:2,&quot;columns_tablet_extra&quot;:2,&quot;columns_tablet&quot;:2,&quot;columns_mobile&quot;:1,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-counter.default">
				<div class="elementor-widget-container">
			<div class="wdt-counter-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template" id="wdt-counter-47dfdac" data-settings=""><div class="wdt-column-wrapper wdt-column-gap-custom " data-column-settings="" data-module-id="wdt-module-id-47dfdac" id="wdt-module-id-47dfdac"><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-counter-wrapper"><div class="wdt-content-counter"><span class="wdt-content-counter-number" data-from="0" data-to="0" data-speed="1000" data-refresh-interval="100"></span><span class="wdt-content-counter-suffix"></span></div></div><div class="wdt-content-title"><h5>Happy Clients</h5></div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-counter-wrapper"><div class="wdt-content-counter"><span class="wdt-content-counter-number" data-from="0" data-to="0" data-speed="1000" data-refresh-interval="100"></span><span class="wdt-content-counter-suffix">+</span></div></div><div class="wdt-content-title"><h5>Yoga Coaches</h5></div></div></div></div>
		</div></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-43e7675" data-id="43e7675" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-67af8ec wdt-cus-fill3-img01 animated-slow elementor-invisible elementor-widget elementor-widget-image" data-id="67af8ec" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="1000" height="1124" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fiiller3-img.jpg" class="attachment-full size-full wp-image-657" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fiiller3-img.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fiiller3-img-267x300.jpg 267w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fiiller3-img-911x1024.jpg 911w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/fiiller3-img-768x863.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" />													</div>
				</div>
				<div class="elementor-element elementor-element-744b06a elementor-widget__width-initial elementor-absolute elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon" data-id="744b06a" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;mouse-move&quot;,&quot;wdt_mme_depth&quot;:{&quot;unit&quot;:&quot;dpt&quot;,&quot;size&quot;:0.2,&quot;sizes&quot;:[]},&quot;wdt_mme_invert_movement&quot;:&quot;true&quot;,&quot;wdt_mme_speed&quot;:{&quot;unit&quot;:&quot;ms&quot;,&quot;size&quot;:0.1,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_move_along&quot;:&quot;both&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250 22" style="enable-background:new 0 0 250 22;" xml:space="preserve"><g>	<path d="M233,17.3c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8c-10.7,0-15.9,2.8-21.4,5.8c-5.4,2.9-10.9,5.9-21.8,5.9  c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8S87.5,8.5,82,11.4c-5.4,2.9-10.9,5.9-21.8,5.9s-16.5-3-21.8-5.9  c-5.5-3-10.7-5.8-21.4-5.8v-1c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9  c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9c10.9,0,16.5,3,21.8,5.9  c5.5,3,10.7,5.8,21.4,5.8V17.3z"></path></g></svg>			</div>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-9bcdcf1 elementor-widget__width-initial elementor-absolute elementor-hidden-mobile elementor-view-default elementor-widget elementor-widget-icon" data-id="9bcdcf1" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;wdt_animation_effect&quot;:&quot;mouse-move&quot;,&quot;wdt_mme_depth&quot;:{&quot;unit&quot;:&quot;dpt&quot;,&quot;size&quot;:0.2,&quot;sizes&quot;:[]},&quot;wdt_mme_speed&quot;:{&quot;unit&quot;:&quot;ms&quot;,&quot;size&quot;:0.1,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_speed_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_depth_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_mme_move_along&quot;:&quot;both&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 250 22" style="enable-background:new 0 0 250 22;" xml:space="preserve"><g>	<path d="M233,17.3c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8c-10.7,0-15.9,2.8-21.4,5.8c-5.4,2.9-10.9,5.9-21.8,5.9  c-10.9,0-16.5-3-21.8-5.9c-5.5-3-10.7-5.8-21.4-5.8S87.5,8.5,82,11.4c-5.4,2.9-10.9,5.9-21.8,5.9s-16.5-3-21.8-5.9  c-5.5-3-10.7-5.8-21.4-5.8v-1c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9  c10.9,0,16.5,3,21.8,5.9c5.5,3,10.7,5.8,21.4,5.8c10.7,0,15.9-2.8,21.4-5.8c5.4-2.9,10.9-5.9,21.8-5.9c10.9,0,16.5,3,21.8,5.9  c5.5,3,10.7,5.8,21.4,5.8V17.3z"></path></g></svg>			</div>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-42d1215 elementor-widget__width-auto elementor-absolute wdt-cus-iconbox-fill3 animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-icon-box" data-id="42d1215" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-icon-box.default">
				<div class="elementor-widget-container">
			<div class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-default" id="wdt-icon-box-42d1215"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-icon-wrapper"><div class="wdt-content-icon"><span><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></span></div></div><div class="wdt-content-title"><h5>Refresh &amp; Renew</h5></div></div><div class="wdt-content-detail-group"></div></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-ec1d826 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet_extra elementor-hidden-tablet elementor-hidden-mobile_extra elementor-hidden-mobile wdt-cus-sun animated-slow elementor-view-default elementor-invisible elementor-widget elementor-widget-icon" data-id="ec1d826" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:200,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon.default">
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
	
				<section class="elementor-section elementor-top-section elementor-element elementor-element-a2a27df elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a2a27df" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-d53f3f0" data-id="d53f3f0" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-556fa24 wdt-cus-filler4-img1 animated-slow elementor-invisible elementor-widget elementor-widget-image" data-id="556fa24" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="1000" height="1291" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-01.jpg" class="attachment-full size-full wp-image-671" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-01.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-01-232x300.jpg 232w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-01-793x1024.jpg 793w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-01-768x991.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" />													</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-ef09a0d" data-id="ef09a0d" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-7fdfa98 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="7fdfa98" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6582f7e" data-id="6582f7e" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-96348bf elementor-widget-laptop__width-initial wdt-text-img elementor-widget elementor-widget-wdt-text-image" data-id="96348bf" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-text-image.default">
				<div class="elementor-widget-container">
			<div class="wdt-elementor-repeater-container"><h2 class="wdt-elementor-repeater-container-wrapper"><span class="wdt-text-tile elementor-repeater-item-497b980">mind</span><span class="wdt-text-tile elementor-repeater-item-cba1c62">relax</span><span class="elementor-repeater-item-0676a64"><img src=https://dtmantra.wpengine.com/wp-content/uploads/2024/04/client.png></span><span class="wdt-text-tile elementor-repeater-item-b5483a6">Revitalize</span><span class="wdt-text-tile elementor-repeater-item-3e1f734">self</span><span class="wdt-text-tile elementor-repeater-item-5b1e580">Care</span></h2></div>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				<div class="elementor-element elementor-element-ba53507 start start center elementor-invisible elementor-widget elementor-widget-wdt-heading" data-id="ba53507" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-ba53507"><div class="wdt-heading-content-wrapper">Yoga in life brings balance, helping us connect with our true selves while fostering mental, physical, and emotional well-being. It teaches mindfulness, grounding us in the present moment and offering peace in the chaos of daily life. Through consistent practice, yoga becomes a powerful tool for transformation and self-discovery.</div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-eb96dbf start start elementor-widget-tablet__width-inherit wdt-custom-btn  center elementor-invisible elementor-widget elementor-widget-wdt-button" data-id="eb96dbf" data-element_type="widget" data-settings="{&quot;item_normal_background_background&quot;:&quot;classic&quot;,&quot;item_hover_background_background&quot;:&quot;classic&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:300,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-eb96dbf"><a class="wdt-button" href="workoutless18.php"><div class="wdt-button-text"><span>Start Today</span></div></a></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-618c386" data-id="618c386" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-2929ed4 wdt-cus-filler4-img2 elementor-widget-tablet__width-initial elementor-widget-mobile_extra__width-inherit animated-slow elementor-invisible elementor-widget elementor-widget-image" data-id="2929ed4" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="500" height="562" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-02.jpg" class="attachment-full size-full wp-image-672" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-02.jpg 500w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-02-267x300.jpg 267w" sizes="(max-width: 500px) 100vw, 500px" />													</div>
				</div>
				<div class="elementor-element elementor-element-9410c3b elementor-widget__width-auto wdt-cus-rotate-img animated-fast elementor-invisible elementor-widget elementor-widget-wdt-rotate-image" data-id="9410c3b" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;zoomIn&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-rotate-image.default">
				<div class="elementor-widget-container">
			<div class="wdt-rotate-image-container" data-settings="{&quot;rotation_side&quot;:&quot;anti-clock&quot;}"><div class="wdt-rotate-image"><a href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/rotate-2.svg" target="_blank" rel="nofollow"><img loading="lazy" loading="lazy" decoding="async" width="165" height="175" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/rotate-2.svg" class="attachment-full size-full wp-image-676" alt="" /></a></div><div class="wdt-rotate-second-image"><a href="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/rotate-1.svg" target="_blank" rel="nofollow"><img loading="lazy" loading="lazy" decoding="async" width="165" height="175" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/rotate-1.svg" class="attachment-full size-full wp-image-675" alt="" /></a></div></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-f188809 elementor-hidden-mobile_extra elementor-hidden-mobile" data-id="f188809" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-823157c elementor-widget-tablet__width-auto animated-slow elementor-invisible elementor-widget elementor-widget-image" data-id="823157c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="400" height="1235" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-03.png" class="attachment-full size-full wp-image-673" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-03.png 400w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-03-97x300.png 97w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler4-img-03-332x1024.png 332w" sizes="(max-width: 400px) 100vw, 400px" />													</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				
				<section class="elementor-section elementor-top-section elementor-element elementor-element-cfcfcfd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="cfcfcfd" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-02f6be7" data-id="02f6be7" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-a7826ed elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="a7826ed" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-beb96e3" data-id="beb96e3" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-de3ea4d wdt-cus-text-icon-img-h2 animated-slow elementor-invisible elementor-widget elementor-widget-wdt-text-image" data-id="de3ea4d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-text-image.default">
				<div class="elementor-widget-container">
			<div class="wdt-elementor-repeater-container"><h2 class="wdt-elementor-repeater-container-wrapper"><span class="wdt-text-tile elementor-repeater-item-9b5453f">Find </span><span class="elementor-repeater-item-28b2f37"><img src=https://dtmantra.wpengine.com/wp-content/uploads/2024/03/text-img-01.jpg></span><span class="wdt-text-tile elementor-repeater-item-b2424c6">The Strength</span><span class="wdt-opt-icon  elementor-repeater-item-7c0bec2"><i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 68 45"><path d="M45.09.45a23.42,23.42,0,0,0-3.36.24.85.85,0,0,0-.74,1,.87.87,0,0,0,1,.7,22.85,22.85,0,0,1,3.1-.22c11.65,0,21.13,9.08,21.15,20.25v.25c0,11.17-9.49,20.25-21.15,20.25a21.64,21.64,0,0,1-9.36-2.11A21.6,21.6,0,0,0,45.81,22.58V22.4c0-12.11-10.28-22-22.91-22S0,10.31,0,22.49v0c0,12.15,10.28,22,22.9,22a24.51,24.51,0,0,0,3.43-.24.84.84,0,0,0,.73-1,.87.87,0,0,0-1-.71,22,22,0,0,1-3.16.23c-11.66,0-21.15-9.14-21.15-20.38S11.25,2.12,22.9,2.12a21.73,21.73,0,0,1,9.38,2.11,22,22,0,0,0-10.1,18.26v0c0,12.15,10.28,22,22.91,22v0c12.63,0,22.91-9.85,22.91-22v-.18C68,10.31,57.72.45,45.09.45ZM34.82,5.66a20.59,20.59,0,0,1,6.6,7c-1,.76-3.49,2.74-6.6,5.47Zm0,14.72c3.33-3,6.16-5.24,7.42-6.21A19.31,19.31,0,0,1,44,20.71a.76.76,0,0,0-.19.12l-9,7.33ZM33.06,39.26A20.19,20.19,0,0,1,24,22.92l9.11,7.45Zm0-11.11-9-7.32L24,20.77a19.64,19.64,0,0,1,1.75-6.53c1.3,1,4.06,3.23,7.29,6.12Zm0-10.09c-3-2.62-5.44-4.55-6.48-5.36a20.77,20.77,0,0,1,6.48-6.95Zm1.76,12.31,9.24-7.54a20,20,0,0,1-9.24,16.5Z"></path></svg></i></span><span class="wdt-text-tile elementor-repeater-item-2f1f3e3">Of Your Mind </span><span class="wdt-text-tile elementor-repeater-item-931783e">And Keep </span><span class="wdt-text-tile elementor-repeater-item-8b5159f">The Health </span><span class="wdt-opt-icon  elementor-repeater-item-892e26f"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450 450" style="enable-background:new 0 0 450 450;" xml:space="preserve"><g class="wdt-leaf">	<path class="wdt-leaf-01" d="M221.9,357.4c0,0-36.6-77.5-25.1-156.5c11.5-79,21.3-112.3,108.2-173.1c41.9,102.2-7.3,148-41.7,192  C213.6,275.3,221.9,357.4,221.9,357.4z"></path>	<path class="wdt-leaf-02" d="M242.5,376.8c0,0-10.1-71.9,18.6-111s28.1-39.9,51.8-50.1c23.7-10.2,26.4-38.7,83.5-47.3c18.4,97.7-65,134-81.7,141.7  C298,317.9,262.8,322.6,242.5,376.8z"></path>	<path class="wdt-leaf-03" d="M51,249.4c0,0,61.9-7,85.2,20.5c23.3,27.5,46,37.6,60.4,63.9c14.3,26.2,43.6,88.5,43.6,88.5s-45.1-26.3-64.4-34.7  c-19.3-8.4-31.4-23.9-48.6-30.8c-17.2-6.9-34.2-21.2-49.2-59.7C63,258.6,51,249.4,51,249.4z"></path></g></svg></i></span><span class="wdt-text-tile elementor-repeater-item-afdea8e">And Beauty </span><span class="elementor-repeater-item-304654d"><img src=https://dtmantra.wpengine.com/wp-content/uploads/2024/04/heading-img-h21.jpg></span><span class="wdt-text-tile elementor-repeater-item-3d5587a">Of Your Soul</span></h2></div>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-43cf684 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="43cf684" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b1427d5" data-id="b1427d5" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-3c5da04 animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-heading" data-id="3c5da04" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default"></div>
				<div class="wellness-container">
  <div class="elementor-widget-container">
    <div class="wdt-heading-holder" id="wdt-heading-3c5da04"  >
      <h3 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper" style="display:flex;justify-content:center; margin-bottom:4rem;" >
        <span class="wdt-heading-title" >JuniorFit Wellness Hub</span>
      </h3>
    </div>
  </div>
				
				<!--- this is for junior--->
				<div class="elementor-element elementor-element-096e3b1 wdt-cus-team-section animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-team" data-id="096e3b1" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;5&quot;,&quot;columns_laptop&quot;:&quot;5&quot;,&quot;columns_tablet_extra&quot;:&quot;4&quot;,&quot;columns_tablet&quot;:&quot;3&quot;,&quot;columns_mobile_extra&quot;:&quot;2&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;columns_mobile&quot;:1,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-team.default">
				<div class="elementor-widget-container">
			<div class="wdt-team-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template" id="wdt-team-096e3b1" data-settings=""><div class="wdt-column-wrapper wdt-column-gap-custom wdt-snap-scroll-enabled" data-column-settings="{&quot;columnDevices&quot;:[&quot;tablet_extra&quot;,&quot;tablet&quot;,&quot;mobile_extra&quot;,&quot;mobile&quot;]}" data-module-id="wdt-module-id-096e3b1" id="wdt-module-id-096e3b1"><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow"> <video src="video/less18/wallsit.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Wall Sit</a></h5></div><div class="wdt-content-subtitle">Back on wall, sit-like hold, strengthens thighs and endurance. </div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/less18/jumpingjack.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Jumping Jacks</a></h5></div><div class="wdt-content-subtitle">Jumping with arm-leg motion, great cardio and full-body warm-up.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/less18/arm.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Arm Circles</a></h5></div><div class="wdt-content-subtitle">Rotate arms slowly, improves shoulder strength and flexibility.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/less18/bicycle.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Bicycle Crunch</a></h5></div><div class="wdt-content-subtitle">Elbow to opposite knee, tones abs and side belly.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow"> <video src="video/less18/bodysquat1.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Body Squat</a></h5></div><div class="wdt-content-subtitle">Sit-down-stand-up motion, builds leg, core, and lower strength.</div></div></div></div></div><div class="wdt-column-pagination wdt-snap-scroll-pagination">
						<button class="wdt-pagination-prev wdt-module-id-096e3b1">Previous</button>
						<button class="wdt-pagination-next wdt-module-id-096e3b1">Next</button></div></div>		</div>
				</div>
				<div class="explore-more-container">
    <a href="workoutless18.php"><button class="explore-button">Explore JuniorFit Programs</button></a>
  </div>
</div>
				<!--- end here junior fitness--->
				<!------ this is for youth------>
				<div class="wellness-container">
  <div class="elementor-widget-container">
    <div class="wdt-heading-holder" id="wdt-heading-3c5da04">
      <h3 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"   style="display:flex;justify-content:center; margin-bottom:4rem;">
        <span class="wdt-heading-title">YouthFit Wellness Hub</span>
      </h3>
    </div>
  </div>
						<div class="elementor-element elementor-element-096e3b1 wdt-cus-team-section animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-team" data-id="096e3b1" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;5&quot;,&quot;columns_laptop&quot;:&quot;5&quot;,&quot;columns_tablet_extra&quot;:&quot;4&quot;,&quot;columns_tablet&quot;:&quot;3&quot;,&quot;columns_mobile_extra&quot;:&quot;2&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;columns_mobile&quot;:1,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-team.default">
				<div class="elementor-widget-container">
			<div class="wdt-team-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template" id="wdt-team-096e3b1" data-settings=""><div class="wdt-column-wrapper wdt-column-gap-custom wdt-snap-scroll-enabled" data-column-settings="{&quot;columnDevices&quot;:[&quot;tablet_extra&quot;,&quot;tablet&quot;,&quot;mobile_extra&quot;,&quot;mobile&quot;]}" data-module-id="wdt-module-id-096e3b1" id="wdt-module-id-096e3b1"><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/more18/calf.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Calf Raise</a></h5></div><div class="wdt-content-subtitle">Lift heels up, strengthens calves and improves ankle balance.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/more18/plank.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Plank</a></h5></div><div class="wdt-content-subtitle">Body straight hold, builds core, shoulders, and back strength.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/more18/pushup.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Push-up</a></h5></div><div class="wdt-content-subtitle">Chest-to-floor move, strengthens arms, chest, and upper body.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/more18/stepup.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Step-up</a></h5></div><div class="wdt-content-subtitle">Step on platform, strengthens legs, balance, and coordination. </div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/more18/sidebend.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Side Bend</a></h5></div><div class="wdt-content-subtitle">Bend sideways, stretches waist and strengthens side muscles.</div></div></div></div></div><div class="wdt-column-pagination wdt-snap-scroll-pagination">
						<button class="wdt-pagination-prev wdt-module-id-096e3b1">Previous</button>
						<button class="wdt-pagination-next wdt-module-id-096e3b1">Next</button></div></div>		</div>
				</div>
				<div class="explore-more-container">
    <a href="login-signup.php"><button class="explore-button">Explore YouthFit Programs</button></a>
  </div>
</div>
				
				<!--- end youth part---->
				
				<!---- this is for old person------>
				<div class="wellness-container">
  <div class="elementor-widget-container">
    <div class="wdt-heading-holder" id="wdt-heading-3c5da04">
      <h3 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"  style="display:flex;justify-content:center; margin-bottom:4rem;">
        <span class="wdt-heading-title">OldFit Wellness Hub</span>
      </h3>
    </div>
  </div>
				
				<div class="elementor-element elementor-element-096e3b1 wdt-cus-team-section animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-team" data-id="096e3b1" data-element_type="widget" data-settings="{&quot;columns&quot;:&quot;5&quot;,&quot;columns_laptop&quot;:&quot;5&quot;,&quot;columns_tablet_extra&quot;:&quot;4&quot;,&quot;columns_tablet&quot;:&quot;3&quot;,&quot;columns_mobile_extra&quot;:&quot;2&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;columns_mobile&quot;:1,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-team.default">
				<div class="elementor-widget-container">
			<div class="wdt-team-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-custom-template" id="wdt-team-096e3b1" data-settings=""><div class="wdt-column-wrapper wdt-column-gap-custom wdt-snap-scroll-enabled" data-column-settings="{&quot;columnDevices&quot;:[&quot;tablet_extra&quot;,&quot;tablet&quot;,&quot;mobile_extra&quot;,&quot;mobile&quot;]}" data-module-id="wdt-module-id-096e3b1" id="wdt-module-id-096e3b1"><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/greater40/ankle.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Ankle Rotations</a></h5></div><div class="wdt-content-subtitle">Rotate ankles slowly, improves flexibility and joint movement.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/greater40/seatleg.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div><</div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Seated Leg Extension (Seat Leg)</a></h5></div><div class="wdt-content-subtitle">Sit, lift leg forward, strengthens thighs and knee joints.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/greater40/wallpush.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Wall Push (Wall Push-up)</a></h5></div><div class="wdt-content-subtitle">Push wall standing, builds chest, arm, and shoulder strength.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/greater40/singleleg.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div></div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Single Leg Stand</a></h5></div><div class="wdt-content-subtitle">Balance on one leg, improves focus, balance, and stability.</div></div></div></div><div class="wdt-column"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-elements-group wdt-media-group wdt-media-image-overlay"><div class="wdt-content-image-wrapper "><div class="wdt-content-image"><a href="#" target="_blank" rel="nofollow" ><video src="video/greater40/hipcircle.mp4" width="500" style="height:23vh;" controls autoplay loop muted>
  Your browser does not support the video tag.
</video></a></div></div>Hip Circles</div></div><div class="wdt-content-detail-group"><div class="wdt-content-title"><h5><a href="#" target="_blank" rel="nofollow" >Hip Circles</a></h5></div><div class="wdt-content-subtitle">Rotate hips in circles, loosens waist and improves balance. </div></div></div></div></div><div class="wdt-column-pagination wdt-snap-scroll-pagination">
						<button class="wdt-pagination-prev wdt-module-id-096e3b1">Previous</button>
						<button class="wdt-pagination-next wdt-module-id-096e3b1">Next</button></div></div>		</div>
						
				</div>
				<div class="explore-more-container">
    <a href="login-signup.php"><button class="explore-button">Explore OldFit Programs</button></a>
  </div>
</div>
				
				
				<!---- end old part---->
				<div class="elementor-element elementor-element-ddad8be animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-button" data-id="ddad8be" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:100,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<!--<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-ddad8be"><a class="wdt-button" href="#"><div class="wdt-button-text"><span>View All Yoga</span></div></a></div>-->		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-35f55a0 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="35f55a0" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2126bb2" data-id="2126bb2" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-6a354da start center animated-slow elementor-invisible elementor-widget elementor-widget-wdt-heading" data-id="6a354da" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-6a354da"><h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Gallery</span></h2></div>		</div>
				</div>
				<div class="elementor-element elementor-element-bd03cc3 end wdt-custom-gallery-tab animated-slow elementor-invisible elementor-widget elementor-widget-wdt-tabs" data-id="bd03cc3" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200,&quot;icon_show&quot;:&quot;true&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-tabs.default">
				<div class="elementor-widget-container">
			<div class="wdt-tabs-container wdt-layout-horizontal wdt-template-classic wdt-icon-style-block" data-class-items="wdt-layout-horizontal wdt-template-classic wdt-icon-style-block"><div class="wdt-tabs-list-wrapper"><ul class="wdt-tabs-list"><li><a href="#wdt-tabs-0"><div class="wdt-content-title">All Yoga</div></a></li><li><a href="#wdt-tabs-1"><div class="wdt-content-title">Meditation</div></a></li><li><a href="#wdt-tabs-2"><div class="wdt-content-title">Standing Yoga</div></a></li><li><a href="#wdt-tabs-3"><div class="wdt-content-title">Sitting Yoga</div></a></li></ul></div><div class="wdt-tabs-content-wrapper"><div id="wdt-tabs-0" class="wdt-tabs-content"><style>.elementor-4390 .elementor-element.elementor-element-a2422ea .gallery-item .gallery-caption{text-align:center;}</style>		<div data-elementor-type="page" data-elementor-id="4390" class="elementor elementor-4390">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-ba2154c elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="ba2154c" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4d2dce2" data-id="4d2dce2" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-a2422ea wdt-custom-gallery elementor-widget elementor-widget-image-gallery" data-id="a2422ea" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image-gallery.default">
				<div class="elementor-widget-container">
					<div class="elementor-image-gallery">
			<div id='gallery-5' class='gallery galleryid-1037 gallery-columns-4 gallery-size-full'><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="gallery-img-1" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDM4OCwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2dhbGxlcnktaW1nLTEuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-1.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-1.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-1.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-1-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-1-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="gallery-img-2" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDM4NywidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2dhbGxlcnktaW1nLTIuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-2.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-2.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-2.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-2-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-2-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="gallery-img-3" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDM4NiwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2dhbGxlcnktaW1nLTMuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-3.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-3.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-3.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-3-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-3-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="gallery-img-4" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDM4NSwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2dhbGxlcnktaW1nLTQuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-4.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-4.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-4.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-4-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-4-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="gallery-img-5" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDM4NCwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2dhbGxlcnktaW1nLTUuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-5.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-5.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-5.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-5-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-5-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="gallery-img-6" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDM4MywidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2dhbGxlcnktaW1nLTYuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-6.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-6.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-6.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-6-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-6-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="gallery-img-7" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDM4MiwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2dhbGxlcnktaW1nLTcuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-7.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-7.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-7.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-7-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/gallery-img-7-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure>
		</div>
		</div>
				</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				</div>
		</div><div id="wdt-tabs-1" class="wdt-tabs-content"><style>.elementor-4635 .elementor-element.elementor-element-a2422ea .gallery-item .gallery-caption{text-align:center;}</style>		<div data-elementor-type="page" data-elementor-id="4635" class="elementor elementor-4635">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-ba2154c elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="ba2154c" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4d2dce2" data-id="4d2dce2" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-a2422ea wdt-custom-gallery elementor-widget elementor-widget-image-gallery" data-id="a2422ea" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image-gallery.default">
				<div class="elementor-widget-container">
					<div class="elementor-image-gallery">
			<div id='gallery-6' class='gallery galleryid-1037 gallery-columns-4 gallery-size-full'><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_02" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc4NiwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMDIuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_02.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_02.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_02.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_02-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_02-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_03" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc4NywidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMDMuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_03.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_03.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_03.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_03-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_03-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_06" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5MCwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMDYuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_06.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_06.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_06.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_06-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_06-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_05" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc4OSwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMDUuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_05.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_05.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_05.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_05-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_05-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_04" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc4OCwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMDQuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_04.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_04.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_04.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_04-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_04-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_08" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5MSwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMDguanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_08.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_08.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_08.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_08-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_08-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_09" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5MiwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMDkuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_09.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_09.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_09.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_09-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_09-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure>
		</div>
		</div>
				</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				</div>
		</div><div id="wdt-tabs-2" class="wdt-tabs-content"><style>.elementor-4634 .elementor-element.elementor-element-a2422ea .gallery-item .gallery-caption{text-align:center;}</style>		<div data-elementor-type="page" data-elementor-id="4634" class="elementor elementor-4634">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-ba2154c elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="ba2154c" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4d2dce2" data-id="4d2dce2" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-a2422ea wdt-custom-gallery elementor-widget elementor-widget-image-gallery" data-id="a2422ea" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image-gallery.default">
				<div class="elementor-widget-container">
					<div class="elementor-image-gallery">
			<div id='gallery-7' class='gallery galleryid-1037 gallery-columns-4 gallery-size-full'><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_10" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5MywidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTAuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_10.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_10.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_10.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_10-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_10-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_11" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5NCwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTEuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_11.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_11.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_11.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_11-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_11-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_12" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5NSwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTIuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_12.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_12.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_12.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_12-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_12-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_13" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5NiwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTMuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_13.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_13.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_13.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_13-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_13-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_14" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5NywidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTQuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_14.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_14.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_14.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_14-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_14-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_15" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5OCwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTUuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_15.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_15.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_15.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_15-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_15-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_16" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDc5OSwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTYuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_16.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_16.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_16.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_16-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_16-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure>
		</div>
		</div>
				</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				</div>
		</div><div id="wdt-tabs-3" class="wdt-tabs-content"><style>.elementor-4633 .elementor-element.elementor-element-a2422ea .gallery-item .gallery-caption{text-align:center;}</style>		<div data-elementor-type="page" data-elementor-id="4633" class="elementor elementor-4633">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-ba2154c elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="ba2154c" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4d2dce2" data-id="4d2dce2" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-a2422ea wdt-custom-gallery elementor-widget elementor-widget-image-gallery" data-id="a2422ea" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image-gallery.default">
				<div class="elementor-widget-container">
					<div class="elementor-image-gallery">
			<div id='gallery-8' class='gallery galleryid-1037 gallery-columns-4 gallery-size-full'><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_17" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDgwMCwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTcuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_17.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_17.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_17.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_17-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_17-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_18" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDgwMSwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTguanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_18.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_18.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_18.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_18-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_18-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_19" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDgwMiwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMTkuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_19.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_19.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_19.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_19-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_19-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_20" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDgwMywidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMjAuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_20.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_20.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_20.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_20-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_20-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_21" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDgwNCwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMjEuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_21.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_21.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_21.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_21-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_21-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_01" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDgyNywidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMDEuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_01.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_01.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_01.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_01-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_01-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure><figure class='gallery-item'>
			<div class='gallery-icon landscape'>
				<a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="a2422ea" data-elementor-lightbox-title="home2_image_gallery_07" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6NDgyOCwidXJsIjoiaHR0cHM6XC9cL2R0bWFudHJhLndwZW5naW5lLmNvbVwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyNFwvMDRcL2hvbWUyX2ltYWdlX2dhbGxlcnlfMDcuanBnIiwic2xpZGVzaG93IjoiYTI0MjJlYSJ9" href='https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_07.jpg'><img loading="lazy" loading="lazy" decoding="async" width="1000" height="870" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_07.jpg" class="attachment-full size-full" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_07.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_07-300x261.jpg 300w, https://dtmantra.wpengine.com/wp-content/uploads/2024/04/home2_image_gallery_07-768x668.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</div></figure>
		</div>
		</div>
				</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				</div>
		</div></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-6c81fb2 animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-button" data-id="6c81fb2" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:100,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-6c81fb2"><a class="wdt-button" href="#"><div class="wdt-button-text"><span>View All Images</span></div></a></div>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-775f78d elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="775f78d" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="wdt-sticky-column elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4907268" data-wdt-settings="{&quot;id&quot;:&quot;4907268&quot;,&quot;sticky&quot;:true,&quot;topSpacing&quot;:50,&quot;bottomSpacing&quot;:50,&quot;stickyOn&quot;:[&quot;laptop&quot;,&quot;tablet_extra&quot;,&quot;tablet&quot;],&quot;overflowHidden&quot;:false}" data-id="4907268" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-d188f9d elementor-widget__width-initial elementor-widget-tablet__width-inherit animated-slow elementor-invisible elementor-widget elementor-widget-image" data-id="d188f9d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="1000" height="1214" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler5-img-01.jpg" class="attachment-full size-full wp-image-694" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler5-img-01.jpg 1000w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler5-img-01-247x300.jpg 247w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler5-img-01-843x1024.jpg 843w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler5-img-01-768x932.jpg 768w" sizes="(max-width: 1000px) 100vw, 1000px" />													</div>
				</div>
				<div class="elementor-element elementor-element-352edd5 elementor-widget__width-initial elementor-widget-laptop__width-auto elementor-widget-tablet_extra__width-auto elementor-absolute wdt-cus-leaf elementor-view-default elementor-invisible elementor-widget elementor-widget-icon" data-id="352edd5" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;_animation_delay&quot;:250,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="558" height="627" viewBox="0 0 558 627" fill="none"><path d="M256.354 120.518C278.232 82.2684 314.061 47.3571 378.443 2.2539C409.373 77.9975 406.592 132.832 389.749 176.897C375.897 213.138 352.532 242.116 330.448 269.506C325.588 275.533 320.791 281.484 316.17 287.418C279.014 328.891 263.553 380.255 257.376 421.221C254.286 441.71 253.517 459.609 253.521 472.387C253.522 478.777 253.717 483.886 253.912 487.4C253.966 488.384 254.02 489.242 254.071 489.969C253.754 489.252 253.378 488.393 252.949 487.397C251.495 484.013 249.436 479.045 247.017 472.715C242.18 460.055 235.908 441.948 230.171 420.162C218.695 376.586 209.365 318.324 217.913 259.525C226.475 200.629 234.416 158.872 256.354 120.518Z" stroke="#27282C"></path><path d="M285.7 519.723C285.612 519.001 285.507 518.089 285.389 517.001C285.06 513.963 284.637 509.555 284.264 504.084C283.517 493.141 282.966 477.944 283.752 460.932C285.324 426.886 292.243 385.663 313.557 356.679C316.509 352.664 319.253 348.922 321.815 345.427C337.84 323.568 346.731 311.441 354.92 303.291C364.381 293.877 372.895 289.783 390.537 282.13C399.44 278.294 406.365 272.744 413.061 266.405C415.643 263.961 418.18 261.411 420.781 258.797C424.953 254.605 429.289 250.247 434.237 245.895C450.172 231.882 472.259 218.133 514.368 211.666C527.857 284.017 503.745 333.637 473.152 366.637C443.761 398.34 408.379 414.715 394.519 421.129C393.911 421.41 393.344 421.672 392.822 421.916C389.013 423.689 384.572 425.348 379.645 427.188C376.543 428.347 373.247 429.578 369.795 430.955C360.888 434.507 351.019 439.006 340.977 445.68C321.194 458.83 300.787 480.395 285.7 519.723Z" stroke="#27282C"></path><path d="M280.762 588.178C280.334 587.93 279.811 587.627 279.202 587.274C277.306 586.176 274.565 584.594 271.187 582.657C264.431 578.782 255.123 573.486 244.917 567.801C224.513 556.436 200.492 543.5 186.101 537.264C171.8 531.068 160.135 522.196 148.81 513.554L148.589 513.386C137.358 504.815 126.434 496.48 113.641 491.345C88.1947 481.131 62.8606 459.957 40.6508 402.705C29.5164 374.003 19.4533 356.19 12.1625 345.543C8.51698 340.219 5.56426 336.687 3.51696 334.481C2.52372 333.411 1.74361 332.653 1.2009 332.154C1.87838 332.088 2.84499 332 4.0696 331.903C6.65264 331.698 10.3831 331.45 14.9689 331.28C24.1416 330.94 36.731 330.913 50.4012 332.164C77.7822 334.668 109.335 342.285 126.566 362.604C141.112 379.757 155.514 392.39 168.886 404.12C171.508 406.42 174.09 408.685 176.627 410.943C192.103 424.72 205.866 438.227 216.513 457.698C227.138 477.193 243.369 510.172 256.948 538.286C263.737 552.341 269.861 565.177 274.288 574.5C276.502 579.161 278.291 582.943 279.527 585.561C280.035 586.637 280.45 587.516 280.762 588.178Z" stroke="#27282C"></path></svg>			</div>
		</div>
				</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-68664d1" data-id="68664d1" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-bdd81dc elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="bdd81dc" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7bd64b5" data-id="7bd64b5" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-16cd0fa start wdt-cus-fill5-iconbox animated-slow elementor-invisible elementor-widget elementor-widget-wdt-icon-box" data-id="16cd0fa" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-icon-box.default">
				<div class="elementor-widget-container">
			<div class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-default" id="wdt-icon-box-16cd0fa"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-icon-wrapper"><div class="wdt-content-icon"><span><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"><path d="M25,9.8c0,0-4.4,2.9-6.6,7.9c1.7,1.2,3.3,2.8,4.5,4.9c1,1.7,1.7,3.6,2.1,5.5c0.4-1.9,1.1-3.8,2.1-5.5 c1.2-2.1,2.8-3.7,4.5-4.9C29.4,12.7,25,9.8,25,9.8z M10.3,15.3c0,0-1.4,9.6,2.3,15.9c3.6,6.3,11.7,7.6,11.7,7.6s1.2-9.3-2.5-15.6 C18.2,16.9,10.3,15.3,10.3,15.3z M39.7,15.3c0,0-7.9,1.6-11.6,7.9c-3.6,6.3-2.5,15.6-2.5,15.6s8.1-1.3,11.7-7.6 C41.1,24.9,39.7,15.3,39.7,15.3z M5.9,24.9c-3.4,0-5.9,0.9-5.9,0.9s3.7,9,10,12.6c4.7,2.7,10.1,1.8,12.6,1.2 c-2.7-0.7-8.1-2.7-11.1-7.8c-1.2-2-1.9-4.3-2.3-6.5C8.1,25,7,24.9,5.9,24.9z M44.1,24.9c-1,0-2.2,0.1-3.3,0.3 c-0.4,2.2-1.1,4.5-2.3,6.5c-3,5.1-8.4,7.1-11.1,7.8c2.5,0.6,7.9,1.5,12.6-1.2c6.3-3.6,10-12.6,10-12.6S47.4,24.9,44.1,24.9z"></path></svg></i></span></div></div><div class="wdt-content-title"><h5>Mind Calming</h5></div><div class="wdt-content-description"> "Calm Mind" is the key to inner peace, clarity, and a stress-free life through mindfulness and yoga.</div></div><div class="wdt-content-detail-group"></div></div></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-aef1858 elementor-hidden-tablet" data-id="aef1858" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-72956f9 elementor-widget__width-auto elementor-hidden-mobile elementor-view-default elementor-invisible elementor-widget elementor-widget-icon" data-id="72956f9" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="icon.default">
				<div class="elementor-widget-container">
					<div class="elementor-icon-wrapper">
			<div class="elementor-icon">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 132 184" style="enable-background:new 0 0 132 184;" xml:space="preserve"><path d="M1,63.3l0,56.5c0,18.8,8.8,36.3,24.2,48.1c1.5,1.2,3.1,2.3,4.8,3.3c1,0.6,1.9,1.2,2.9,1.7c1.1,0.6,2.2,1.2,3.4,1.8 c0.9,0.4,1.7,0.8,2.6,1.2c2.2,1,4.5,1.8,6.8,2.5c6.5,2,13.3,3,20.2,3c35.8,0,65-27.7,65-61.7V63.3V2.7c0-0.6-0.5-1-1.1-1l-23.6,0 l-80.7,0l-23.6,0C1.5,1.6,1,2.1,1,2.7L1,63.3C1,63.3,1,63.3,1,63.3L1,63.3z M101.3,23.2l27.5,15.1v22.6L96,29.7 C98,27.7,99.8,25.5,101.3,23.2L101.3,23.2z M128.8,35.9l-26.4-14.5c1.4-2.4,2.5-4.9,3.3-7.6l23.1,5.9V35.9z M103.9,12.3 C103.9,12.3,103.9,12.3,103.9,12.3C103.9,12.3,103.9,12.3,103.9,12.3c-3.6,12.8-14.3,22.9-27.8,26.4c0,0,0,0,0,0c0,0,0,0,0,0 c-3.2,0.8-6.6,1.3-10.1,1.3c-3.5,0-6.9-0.4-10.1-1.3c0,0,0,0,0,0c0,0,0,0,0,0c-13.5-3.4-24.1-13.5-27.7-26.3c0,0,0,0,0,0 c0,0,0,0,0,0c-0.8-2.8-1.2-5.6-1.3-8.6l78.5,0C105.2,6.6,104.7,9.5,103.9,12.3z M29.6,21.4L3.2,35.9V19.7l23.1-5.9 C27.1,16.5,28.2,19,29.6,21.4z M3.2,38.3l27.5-15.1c1.5,2.3,3.3,4.5,5.3,6.5L3.2,60.8L3.2,38.3z M26.7,162.3 c0-22.7,19.5-41.2,43.4-41.2c12.8,0,24.9,5.4,33.2,14.6c-4.1-1.1-8.4-1.7-12.7-1.7c-24.7,0-44.9,18.7-45.6,42 c-0.4-0.1-0.8-0.3-1.3-0.4c-0.1,0-0.2-0.1-0.2-0.1c-0.3-0.1-0.7-0.3-1-0.4c-0.1-0.1-0.3-0.1-0.4-0.2c-0.3-0.1-0.6-0.2-0.8-0.3 c-0.2-0.1-0.3-0.1-0.5-0.2c-0.3-0.1-0.5-0.2-0.8-0.3c-0.2-0.1-0.3-0.1-0.5-0.2c-0.2-0.1-0.5-0.2-0.7-0.3c-0.2-0.1-0.3-0.2-0.5-0.2 c-0.2-0.1-0.5-0.2-0.7-0.3c-0.2-0.1-0.3-0.2-0.5-0.2c-0.2-0.1-0.5-0.2-0.7-0.4c-0.2-0.1-0.3-0.2-0.5-0.3c-0.2-0.1-0.5-0.2-0.7-0.4 c-0.2-0.1-0.3-0.2-0.5-0.3c-0.2-0.1-0.5-0.3-0.7-0.4c-0.2-0.1-0.3-0.2-0.5-0.3c-0.3-0.1-0.5-0.3-0.8-0.4c-0.1-0.1-0.3-0.2-0.4-0.2 c-0.3-0.2-0.6-0.4-1-0.6c-0.1,0-0.1-0.1-0.2-0.1c-0.4-0.2-0.8-0.5-1.1-0.7c-0.1-0.1-0.2-0.1-0.3-0.2c-0.3-0.2-0.5-0.4-0.8-0.6 c-0.1-0.1-0.3-0.2-0.4-0.3c-0.2-0.2-0.5-0.3-0.7-0.5c-0.2-0.1-0.3-0.2-0.4-0.3c-0.2-0.1-0.3-0.2-0.4-0.3 C26.8,165.2,26.7,163.7,26.7,162.3L26.7,162.3z M66,179.4c-6.4,0-12.7-0.9-18.8-2.7c0.3-22.5,19.7-40.6,43.4-40.6 c5.3,0,10.5,0.9,15.4,2.7c0.4,0.2,1,0,1.2-0.3c0.3-0.4,0.3-0.9,0-1.2c-8.6-11.4-22.4-18.1-37.1-18.1c-25.1,0-45.6,19.4-45.6,43.3 c0,0.8,0,1.6,0.1,2.4C11,153.3,3.2,137.1,3.2,119.8V63.7l34.3-32.6c2.1,1.9,4.4,3.6,6.9,5L15.5,83.6c-0.3,0.5-0.1,1.1,0.4,1.4 c0.5,0.3,1.2,0.1,1.5-0.4l28.8-47.4c2.5,1.3,5.2,2.4,8,3.2L39.3,93.2c-0.2,0.5,0.2,1.1,0.8,1.3c0.6,0.1,1.2-0.2,1.3-0.7l14.9-52.9 c2.8,0.6,5.6,1,8.6,1.1v54.7c0,0.6,0.5,1,1.1,1s1.1-0.5,1.1-1V42c2.9-0.1,5.8-0.4,8.6-1.1l14.9,52.9c0.2,0.5,0.8,0.9,1.3,0.7 c0.6-0.1,0.9-0.7,0.8-1.3L77.8,40.4c2.8-0.8,5.5-1.8,8-3.2l28.8,47.4c0.3,0.5,1,0.7,1.5,0.4c0.5-0.3,0.7-0.9,0.4-1.4L87.6,36.2 c2.5-1.4,4.8-3.1,6.9-5l34.3,32.6v56.1C128.8,152.7,100.6,179.4,66,179.4z M128.8,17.6l-22.5-5.7c0.7-2.6,1.1-5.4,1.1-8.1h21.4V17.6 z M24.6,3.7c0.1,2.8,0.5,5.5,1.1,8.1L3.2,17.6V3.7H24.6z"></path></svg>			</div>
		</div>
				</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-8d1528a elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="8d1528a" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-0ed17de" data-id="0ed17de" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-e68efac start wdt-cus-fill5-iconbox animated-slow elementor-invisible elementor-widget elementor-widget-wdt-icon-box" data-id="e68efac" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;carousel_arrows_prev_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_prev_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_vertical_top_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_laptop&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile_extra&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;carousel_arrows_next_arrow_horizontal_left_indent_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-icon-box.default">
				<div class="elementor-widget-container">
			<div class="wdt-icon-box-holder wdt-content-item-holder wdt-column-holder wdt-rc-template-default" id="wdt-icon-box-e68efac"><div class="wdt-content-item"><div class="wdt-content-media-group"><div class="wdt-content-icon-wrapper"><div class="wdt-content-icon"><span><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"><path d="M18.1,7.7c-0.6,0.1-1,0.6-1,1.1v5.8v21c-1.4-1-3.4-1.3-5.5-0.7c-3.1,1-4.9,3.7-4.1,6.1c0.8,2.4,3.9,3.6,6.9,2.6 c2.6-0.8,4.3-2.9,4.3-5V14.4L41,11.8v20.8c-1.4-1-3.4-1.3-5.5-0.7c-3.1,1-4.9,3.7-4.1,6.1c0.8,2.4,3.9,3.6,6.9,2.6 c2.6-0.8,4.3-2.9,4.3-5V11.7V6.1c0-0.7-0.6-1.2-1.3-1.1L18.1,7.7z"></path></svg></i></span></div></div><div class="wdt-content-title"><h5>Relaxing Music</h5></div><div class="wdt-content-description">"Relaxing Music" creates a calming atmosphere, enhancing focus, meditation, and overall well-being.</div></div><div class="wdt-content-detail-group"></div></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-b8fe08a elementor-widget__width-auto wdt-cus-fill5-popup animated-slow elementor-invisible elementor-widget elementor-widget-wdt-popup-box" data-id="b8fe08a" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;show_close_Button&quot;:&quot;true&quot;,&quot;esc_to_exit&quot;:&quot;true&quot;,&quot;click_to_exit&quot;:&quot;true&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-popup-box.default">
				<div class="elementor-widget-container">
			<div class="wdt-popup-box-trigger-holder wdt-click-element-icon" id="wdt-popup-box-trigger-b8fe08a" data-settings="{&quot;module_id&quot;:&quot;b8fe08a&quot;,&quot;module_ref_id&quot;:&quot;wdt-popup-box-b8fe08a&quot;,&quot;popup_class&quot;:&quot;wdt-popup-box-window wdt-popup-box-window-b8fe08a wdt-fade-zoom&quot;,&quot;trigger_type&quot;:&quot;on-click&quot;,&quot;on_load_delay&quot;:null,&quot;on_load_after&quot;:null,&quot;external_class&quot;:null,&quot;external_id&quot;:null,&quot;show_close_Button&quot;:true,&quot;esc_to_exit&quot;:true,&quot;click_to_exit&quot;:true,&quot;mfp_src&quot;:&quot;https://vimeo.com/205305443&quot;,&quot;mfp_type&quot;:&quot;iframe&quot;}"><div class="wdt-popup-box-trigger-element"><span class="wdt-popup-box-trigger-item wdt-popup-box-trigger-icon"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve"><path d="M28.3,15L1.7,30l0-30L28.3,15z"></path></svg></i></span></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-2067d6f elementor-widget__width-auto animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-heading" data-id="2067d6f" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;_animation_delay&quot;:150,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-2067d6f"><h5 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Shape Your Perfect Body</span></h5></div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-c3651eb elementor-hidden-tablet" data-id="c3651eb" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-28f4639 animated-slow elementor-invisible elementor-widget elementor-widget-image" data-id="28f4639" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img loading="lazy" loading="lazy" decoding="async" width="600" height="831" src="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler5-img-02.jpg" class="attachment-full size-full wp-image-695" alt="" srcset="https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler5-img-02.jpg 600w, https://dtmantra.wpengine.com/wp-content/uploads/2024/03/filler5-img-02-217x300.jpg 217w" sizes="(max-width: 600px) 100vw, 600px" />													</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-6e1350e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6e1350e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
							<div class="elementor-background-overlay"></div>
							<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-78aadfe" data-id="78aadfe" data-element_type="column">
			<div class="elementor-widget-wrap">
							</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-c8f989b" data-id="c8f989b" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-ec2122b elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="ec2122b" data-element_type="section" data-settings="{&quot;wdt_bg_image&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_laptop&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_tablet&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile_extra&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_image_mobile&quot;:{&quot;url&quot;:&quot;&quot;,&quot;id&quot;:&quot;&quot;,&quot;size&quot;:&quot;&quot;},&quot;wdt_bg_position&quot;:&quot;center center&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-4508e8c" data-id="4508e8c" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
						<div class="elementor-element elementor-element-355e813 animated-slow elementor-widget__width-initial center elementor-invisible elementor-widget elementor-widget-wdt-heading" data-id="355e813" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default">
				<div class="elementor-widget-container">
			<div class="wdt-heading-holder " id="wdt-heading-355e813"><h2 class="wdt-heading-title-wrapper wdt-heading-align-center wdt-heading-deco-wrapper"><span class="wdt-heading-title">Commonly Posing Queries</span></h2><div class="wdt-heading-content-wrapper"> Frequently asked questions about yoga poses, their benefits, techniques, and how to practice them correctly.</div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-2c40c74 start wdt-cus-faq animated-slow elementor-invisible elementor-widget elementor-widget-wdt-accordion-and-toggle" data-id="2c40c74" data-element_type="widget" data-settings="{&quot;item_background_background&quot;:&quot;classic&quot;,&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:150,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-accordion-and-toggle.default">
				<div class="elementor-widget-container">
			<div class="wdt-accordion-toggle-holder wdt-module-accordion wdt-template-default wdt-expand-collapse-position-end" id="wdt-accordion-and-toggle-2c40c74"><div class="wdt-accordion-toggle-wrapper"><div class="wdt-accordion-toggle-title-holder"><div class="wdt-accordion-toggle-title">Best &amp; essential yoga accessories for beginners?</div><div class="wdt-accordion-toggle-icon"><div class="wdt-accordion-toggle-icon-expand"><svg aria-hidden="true" class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div><div class="wdt-accordion-toggle-icon-collapse"><svg aria-hidden="true" class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div></div></div><div class="wdt-accordion-toggle-description"><div class="elementor-element elementor-element-0970e81 start elementor-widget elementor-widget-wdt-heading" data-id="0970e81" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default"><div class="elementor-widget-container"><div id="wdt-heading-0970e81" class="wdt-heading-holder "><div class="wdt-heading-content-wrapper">For beginners, having the right yoga accessories can make practice more comfortable and effective. A yoga mat is essential for grip and cushioning, preventing slips and providing support. Yoga blocks and straps help with flexibility and alignment, making poses easier to achieve. Wearing comfortable, stretchable clothing ensures free movement, while a water bottle keeps you hydrated.</div></div></div></div><div class="elementor-element elementor-element-bc120c7 start elementor-widget elementor-widget-wdt-heading" data-id="bc120c7" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default"><div class="elementor-widget-container"><div id="wdt-heading-bc120c7" class="wdt-heading-holder "><div class="wdt-heading-content-wrapper">Additional accessories like a yoga bolster provide support for relaxation and restorative poses, and a meditation cushion helps maintain good posture during meditation. A towel is useful, especially for hot yoga, to absorb sweat and maintain grip. These essentials create a strong foundation for a smooth and enjoyable yoga journey.</div></div></div></div></div></div><div class="wdt-accordion-toggle-wrapper"><div class="wdt-accordion-toggle-title-holder"><div class="wdt-accordion-toggle-title">How to choose the right yoga mat?</div><div class="wdt-accordion-toggle-icon"><div class="wdt-accordion-toggle-icon-expand"><svg aria-hidden="true" class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div><div class="wdt-accordion-toggle-icon-collapse"><svg aria-hidden="true" class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div></div></div><div class="wdt-accordion-toggle-description"><div class="elementor-element elementor-element-0970e81 start elementor-widget elementor-widget-wdt-heading" data-id="0970e81" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default"><div class="elementor-widget-container"><div id="wdt-heading-0970e81" class="wdt-heading-holder "><div class="wdt-heading-content-wrapper">Choosing the right yoga mat depends on thickness, material, and grip. A standard 4-6mm thick mat provides good cushioning for comfort, while a 1-3mm mat is better for travel. Mats made of PVC offer durability and stickiness, while natural rubber or TPE mats are eco-friendly and provide a good grip.</div></div></div></div><div class="elementor-element elementor-element-bc120c7 start elementor-widget elementor-widget-wdt-heading" data-id="bc120c7" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default"><div class="elementor-widget-container"><div id="wdt-heading-bc120c7" class="wdt-heading-holder "><div class="wdt-heading-content-wrapper">Consider your practice style—grippy mats work best for dynamic yoga like Vinyasa, while extra-cushioned mats are ideal for restorative yoga. Also, check the size, texture, and ease of cleaning to ensure convenience. Choosing a mat that suits your needs will enhance your yoga experience and comfort.</div></div></div></div></div></div><div class="wdt-accordion-toggle-wrapper"><div class="wdt-accordion-toggle-title-holder"><div class="wdt-accordion-toggle-title">What is the appropriate clothing for yoga practice?</div><div class="wdt-accordion-toggle-icon"><div class="wdt-accordion-toggle-icon-expand"><svg aria-hidden="true" class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div><div class="wdt-accordion-toggle-icon-collapse"><svg aria-hidden="true" class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div></div></div><div class="wdt-accordion-toggle-description"><div class="elementor-element elementor-element-0970e81 start elementor-widget elementor-widget-wdt-heading" data-id="0970e81" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default"><div class="elementor-widget-container"><div id="wdt-heading-0970e81" class="wdt-heading-holder "><div class="wdt-heading-content-wrapper">For yoga practice, it’s best to wear comfortable, stretchable, and breathable clothing that allows free movement. Fitted yet flexible tops and bottoms made of moisture-wicking fabric help in maintaining comfort during poses. Avoid overly loose clothes that may get in the way of movements or slide down in certain postures.</div></div></div></div><div class="elementor-element elementor-element-bc120c7 start elementor-widget elementor-widget-wdt-heading" data-id="bc120c7" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default"><div class="elementor-widget-container"><div id="wdt-heading-bc120c7" class="wdt-heading-holder "><div class="wdt-heading-content-wrapper">For women, sports bras provide necessary support, while men can opt for fitted t-shirts or tank tops. Leggings, yoga pants, or shorts are great choices for the lower body. Barefoot practice is ideal for grip, but yoga socks with anti-slip grips can be used if needed. The key is to feel comfortable and unrestricted while practicing. </div></div></div></div></div></div><div class="wdt-accordion-toggle-wrapper"><div class="wdt-accordion-toggle-title-holder"><div class="wdt-accordion-toggle-title">Is it necessary to buy blocks and straps for beginners?</div><div class="wdt-accordion-toggle-icon"><div class="wdt-accordion-toggle-icon-expand"><svg aria-hidden="true" class="e-font-icon-svg e-fas-plus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div><div class="wdt-accordion-toggle-icon-collapse"><svg aria-hidden="true" class="e-font-icon-svg e-fas-minus" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></div></div></div><div class="wdt-accordion-toggle-description"><div class="elementor-element elementor-element-0970e81 start elementor-widget elementor-widget-wdt-heading" data-id="0970e81" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default"><div class="elementor-widget-container"><div id="wdt-heading-0970e81" class="wdt-heading-holder "><div class="wdt-heading-content-wrapper">Yoga blocks and straps are not necessary for beginners, but they can be very helpful. Blocks provide support in balancing poses and help with flexibility, making it easier to reach the floor or maintain proper alignment. Straps assist in stretching, allowing beginners to extend their reach without straining, especially in poses that require flexibility.</div></div></div></div><div class="elementor-element elementor-element-bc120c7 start elementor-widget elementor-widget-wdt-heading" data-id="bc120c7" data-element_type="widget" data-settings="{&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-heading.default"><div class="elementor-widget-container"><div id="wdt-heading-bc120c7" class="wdt-heading-holder "><div class="wdt-heading-content-wrapper">While these accessories can enhance your practice, they are optional. Many poses can be modified using household items like books or a scarf instead of blocks and straps. As you progress, you can decide whether investing in them will improve your comfort and alignment in yoga. </div></div></div></div></div></div></div>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-8245736" data-id="8245736" data-element_type="column">
			<div class="elementor-widget-wrap">
							</div>
		</div>
					</div>
		</section>
				
				</div>
		</div></div></div></div><div class="wdt-carousel-pagination-wrapper"><div class="wdt-swiper-pagination wdt-swiper-pagination-a7e405c"></div></div></div>		</div>
				</div>
				<div class="elementor-element elementor-element-59f2a97 animated-slow center elementor-invisible elementor-widget elementor-widget-wdt-button" data-id="59f2a97" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:100,&quot;wdt_animation_effect&quot;:&quot;none&quot;}" data-widget_type="wdt-button.default">
				<div class="elementor-widget-container">
			<div class="wdt-button-holder wdt-template-bordered wdt-button-link wdt-button-style-default wdt-button-size-nm wdt-animation- wdt-button-icon-after" id="wdt-button-59f2a97"><a class="wdt-button" href="#"><div class="wdt-button-text"><span>View All Events</span></div></a></div>		</div>
				</div>
					</div>
		</div>
					</div>
		</section>
				</div>
		                                    </div><!-- ** Container End ** -->
            </div><!-- **Main - End ** -->

            
            <!-- **Footer** -->
			 <?php include ("footer1.php"); 
			 
			 
			 
			 footer1(); ?>
           <!-- **Footer - End** -->
        </div><!-- **Inner Wrapper - End** -->

    </div><!-- **Wrapper - End** -->

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
<link rel='stylesheet' id='elementor-post-862-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-862.css?ver=1715265394' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4623-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4623.css?ver=1715265394' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4622-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4622.css?ver=1715265394' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-swiper-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/css/swiper.min.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-carousel-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/css/carousel.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-repeater-content-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/repeater-contents/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-advanced-carousel-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/advanced-carousel/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-column-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/css/column.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-counter-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/counter/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<style id='wdt-counter-inline-css' type='text/css'>

@media only screen and (min-width: 480px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (min-width: 480px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 767px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 767px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (min-width: 480px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 767px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-counter-47dfdac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 767px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-counter-47dfdac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

</style>
<link rel='stylesheet' id='wdt-icon-box-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/icon-box/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<style id='wdt-icon-box-inline-css' type='text/css'>

@media only screen and (min-width: 480px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-42d1215 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-16cd0fa .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
}
}

@media only screen and (min-width: 480px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-e68efac .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 767px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

@media only screen and (max-width: 479px) {
#wdt-icon-box-e68efac .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

</style>
<link rel='stylesheet' id='wdt-animation-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/animation/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-text-image-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/text-image/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-rotate-image-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/rotate-image/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-interactive-showcase-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/interactive-showcase/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-team-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/team/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<style id='wdt-team-inline-css' type='text/css'>

@media only screen and (min-width: 480px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 20%;
}
}

@media only screen and (min-width: 480px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 20%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 20%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 25%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 33.33%;
}
}

@media only screen and (max-width: 767px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 20%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 25%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 33.33%;
}
}

@media only screen and (max-width: 767px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}


@media only screen and (min-width: 480px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 20%;
}
}

@media only screen and (min-width: 480px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 20%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 20%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 25%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 33.33%;
}
}

@media only screen and (max-width: 767px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-team-096e3b1 .wdt-column-wrapper:not(.wdt-snap-scroll-enabled) .wdt-column {
width: 100%;
}
}

@media only screen and (max-width: 1540px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 20%;
}
}

@media only screen and (max-width: 1280px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 25%;
}
}

@media only screen and (max-width: 1024px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 33.33%;
}
}

@media only screen and (max-width: 767px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 50%;
}
}

@media only screen and (max-width: 479px) {
#wdt-team-096e3b1 .wdt-column-wrapper.wdt-snap-scroll-enabled .wdt-column {
flex: 0 0 100%;
}
}

</style>
<link rel='stylesheet' id='elementor-post-4390-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4390.css?ver=1715265394' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4635-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4635.css?ver=1715265394' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4634-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4634.css?ver=1715265394' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4633-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4633.css?ver=1715265394' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-tabs-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/tabs/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-accordion-and-toggle-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/accordion-and-toggle/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-710-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-710.css?ver=1715265395' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4805-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4805.css?ver=1715265395' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4806-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4806.css?ver=1715265395' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4808-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4808.css?ver=1715265395' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4970-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4970.css?ver=1715265395' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4971-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4971.css?ver=1715265395' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-489-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-489.css?ver=1715332464' type='text/css' media='all' />
<link rel='stylesheet' id='wdt-mailchimp-css' href='https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/mailchimp/assets/css/style.css?ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-4990-css' href='https://dtmantra.wpengine.com/wp-content/uploads/elementor/css/post-4990.css?ver=1715330100' type='text/css' media='all' />
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
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/mantras-pro/modules/woocommerce/listings/elementor/widgets/products/assets/js/swiper.min.js?ver=6.7.1" id="jquery-swiper-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/js/carousel.js?ver=6.7.1" id="wdt-carousel-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/common-controls/layout/assets/js/column.js?ver=6.7.1" id="wdt-column-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/counter/assets/js/jquery.countTo.js?ver=6.7.1" id="jquery-countTo-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/counter/assets/js/script.js?ver=6.7.1" id="wdt-counter-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/animation/assets/js/script.js?ver=6.7.1" id="wdt-animation-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/rotate-image/assets/js/script.js?ver=6.7.1" id="wdt-rotate-image-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/interactive-showcase/assets/js/script.js?ver=6.7.1" id="wdt-interactive-showcase-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/jquery/ui/core.js?ver=1.13.3" id="jquery-ui-core-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/jquery/ui/tabs.js?ver=1.13.3" id="jquery-ui-tabs-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/tabs/assets/js/jquery.scrolltabs.min.js?ver=6.7.1" id="jquery.scrolltabs-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/tabs/assets/js/script.js?ver=6.7.1" id="wdt-tabs-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-includes/js/jquery/ui/accordion.js?ver=1.13.3" id="jquery-ui-accordion-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/accordion-and-toggle/assets/js/script.js?ver=6.7.1" id="wdt-accordion-and-toggle-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/wedesigntech-elementor-addon/inc/widgets/mailchimp/assets/js/script.js?ver=6.7.1" id="wdt-mailchimp-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/elementor/assets/js/webpack.runtime.js?ver=3.21.5" id="elementor-webpack-runtime-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/elementor/assets/js/frontend-modules.js?ver=3.21.5" id="elementor-frontend-modules-js"></script>
<script type="text/javascript" src="https://dtmantra.wpengine.com/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.js?ver=4.0.2" id="elementor-waypoints-js"></script>
<script type="text/javascript" id="elementor-frontend-js-before">
/* <![CDATA[ */
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":true},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselWrapperAriaLabel":"Carousel | Horizontal scrolling: Arrow Left & Right","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":480,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":479,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":767,"default_value":880,"direction":"max","is_enabled":true},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1280,"default_value":1200,"direction":"max","is_enabled":true},"laptop":{"label":"Laptop","value":1540,"default_value":1366,"direction":"max","is_enabled":true},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.21.5","is_static":false,"experimentalFeatures":{"e_optimized_assets_loading":true,"e_optimized_css_loading":true,"e_font_icon_svg":true,"additional_custom_breakpoints":true,"e_swiper_latest":true,"container_grid":true,"home_screen":true,"ai-layout":true,"landing-pages":true},"urls":{"assets":"https:\/\/dtmantra.wpengine.com\/wp-content\/plugins\/elementor\/assets\/"},"swiperClass":"swiper","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_mobile":479,"viewport_mobile_extra":767,"viewport_tablet":1024,"viewport_tablet_extra":1280,"viewport_laptop":1540,"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":1037,"title":"Home%202%20%E2%80%93%20Mantra%20Site","excerpt":"","featuredImage":false}};
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


</body>
</html>

