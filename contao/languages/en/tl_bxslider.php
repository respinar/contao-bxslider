<?php

/*
 * This file is part of Contao bxSlider Bundle.
 *
 * (c) Hamid Peywasti 2023 <abbaszadeh.h@gmail.com>
 *
 * @license MIT
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_bxslider']['title']               = array('Title','Please enter the bxSlider title.');
$GLOBALS['TL_LANG']['tl_bxslider']['mode']                = array('Mode','Type of transition between slides.');
$GLOBALS['TL_LANG']['tl_bxslider']['speed']               = array('Speed','Slide transition duration (in ms).');
$GLOBALS['TL_LANG']['tl_bxslider']['slideMargin']         = array('Slide margin','Margin between each slide.');
$GLOBALS['TL_LANG']['tl_bxslider']['startSlide']          = array('Start slide','Starting slide index (zero-based)');
$GLOBALS['TL_LANG']['tl_bxslider']['randomStart']         = array('Random start','Start slider on a random slide');
$GLOBALS['TL_LANG']['tl_bxslider']['infiniteLoop']        = array('Infinite loop','If checked, clicking "Next" while on the last slide will transition to the first slide and vice-versa');
$GLOBALS['TL_LANG']['tl_bxslider']['hideControlOnEnd']    = array('Hide control on end','If checked, "Next" control will be hidden on last slide and vice-versa. Note: Only used when infiniteLoop: false');
$GLOBALS['TL_LANG']['tl_bxslider']['easing']              = array('Easing','The type of "easing" to use during transitions.');
$GLOBALS['TL_LANG']['tl_bxslider']['captions']            = array('Captions','Include image captions. Captions are derived from the image\'s title attribute');
$GLOBALS['TL_LANG']['tl_bxslider']['video']               = array('Video','If any slides contain video, set this to checked. Also, include plugins/jquery.fitvids.js');
$GLOBALS['TL_LANG']['tl_bxslider']['ticker']              = array('Ticker','Use slider in ticker mode (similar to a news ticker)');
$GLOBALS['TL_LANG']['tl_bxslider']['tickerHover']         = array('Ticker hover','Ticker will pause when mouse hovers over slider. Note: this functionality does NOT work if using CSS transitions!');
$GLOBALS['TL_LANG']['tl_bxslider']['adaptiveHeight']      = array('Adaptive height','Dynamically adjust slider height based on each slide\'s height');
$GLOBALS['TL_LANG']['tl_bxslider']['adaptiveHeightSpeed'] = array('Adaptive height speed','Slide height transition duration (in ms). Note: only used if adaptiveHeight: true');
$GLOBALS['TL_LANG']['tl_bxslider']['responsive']          = array('Responsive','Enable or disable auto resize of the slider. Useful if you need to use fixed width sliders.');
$GLOBALS['TL_LANG']['tl_bxslider']['useCSS']              = array('Use CSS','If checked, CSS transitions will be used for horizontal and vertical slide animations (this uses native hardware acceleration). If false, jQuery animate() will be used.');
$GLOBALS['TL_LANG']['tl_bxslider']['preloadImages']       = array('Preload images','If \'all\', preloads all images before starting the slider. If \'visible\', preloads only images in the initially visible slides before starting the slider (tip: use \'visible\' if all slides are identical dimensions)');
$GLOBALS['TL_LANG']['tl_bxslider']['touchEnabled']        = array('touch enabled','If checked, slider will allow touch swipe transitions');
$GLOBALS['TL_LANG']['tl_bxslider']['swipeThreshold']      = array('Swipe threshold','Amount of pixels a touch swipe needs to exceed in order to execute a slide transition. Note: only used if touchEnabled: true');
$GLOBALS['TL_LANG']['tl_bxslider']['oneToOneTouch']       = array('One to one touch','If checked, non-fade slides follow the finger as it swipes');
$GLOBALS['TL_LANG']['tl_bxslider']['preventDefaultSwipeX'] = array('Prevent default swipe X','If checked, touch screen will not move along the x-axis as the finger swipes');
$GLOBALS['TL_LANG']['tl_bxslider']['preventDefaultSwipeY'] = array('Prevent default swipe Y','If checked, touch screen will not move along the y-axis as the finger swipes');
$GLOBALS['TL_LANG']['tl_bxslider']['pager']               = array('Pager','If checked, a pager will be added');
$GLOBALS['TL_LANG']['tl_bxslider']['pagerType']           = array('Pager type','If \'full\', a pager link will be generated for each slide. If \'short\', a x / y pager will be used (ex. 1 / 5)');
$GLOBALS['TL_LANG']['tl_bxslider']['pagerShortSeparator'] = array('Pager short separator','If pagerType: \'short\', pager will use this value as the separating character');
$GLOBALS['TL_LANG']['tl_bxslider']['controls']            = array('Controls','If checked, "Next" / "Prev" controls will be added');
$GLOBALS['TL_LANG']['tl_bxslider']['nextText']            = array('Next text','Text to be used for the "Next" control');
$GLOBALS['TL_LANG']['tl_bxslider']['prevText']            = array('Prev text','Text to be used for the "Prev" control');
$GLOBALS['TL_LANG']['tl_bxslider']['autoControls']        = array('Auto controls','If checked, "Start" / "Stop" controls will be added');
$GLOBALS['TL_LANG']['tl_bxslider']['startText']           = array('Start text','Text to be used for the "Start" control');
$GLOBALS['TL_LANG']['tl_bxslider']['stopText']            = array('Stop text','Text to be used for the "Stop" control');
$GLOBALS['TL_LANG']['tl_bxslider']['autoControlsCombine'] = array('Auto controls combine','When slideshow is playing only "Stop" control is displayed and vice-versa');
$GLOBALS['TL_LANG']['tl_bxslider']['auto']                = array('Auto','Slides will automatically transition');
$GLOBALS['TL_LANG']['tl_bxslider']['pause']               = array('Pause','The amount of time (in ms) between each auto transition');
$GLOBALS['TL_LANG']['tl_bxslider']['autoStart']           = array('Auto pause','Auto show starts playing on load. If false, slideshow will start when the "Start" control is clicked');
$GLOBALS['TL_LANG']['tl_bxslider']['autoDirection']       = array('Auto direction','The direction of auto show slide transitions');
$GLOBALS['TL_LANG']['tl_bxslider']['autoHover']           = array('Auto hover','Auto show will pause when mouse hovers over slider');
$GLOBALS['TL_LANG']['tl_bxslider']['autoDelay']           = array('Auto delay','Time (in ms) auto show should wait before starting');
$GLOBALS['TL_LANG']['tl_bxslider']['minSlides']           = array('Min slides','The minimum number of slides to be shown. Slides will be sized down if carousel becomes smaller than the original size.');
$GLOBALS['TL_LANG']['tl_bxslider']['maxSlides']           = array('Max slides','The maximum number of slides to be shown. Slides will be sized up if carousel becomes larger than the original size.');
$GLOBALS['TL_LANG']['tl_bxslider']['moveSlides']          = array('Move slides','The number of slides to move on transition. This value must be >= minSlides, and <= maxSlides. If zero (default), the number of fully-visible slides will be used.');
$GLOBALS['TL_LANG']['tl_bxslider']['slideWidth']          = array('Slide width','The width of each slide. This setting is required for all horizontal carousels!');
$GLOBALS['TL_LANG']['tl_bxslider']['ariaLive']            = array('Aria Live attribute','Adds Aria Live attribute to slider.');
$GLOBALS['TL_LANG']['tl_bxslider']['ariaHidden']          = array('Aria Hidden attribute','Adds Aria Hidden attribute to any nonvisible slides.');
$GLOBALS['TL_LANG']['tl_bxslider']['wrapperClass']        = array('Wrapper class','Class to wrap the slider in. Change to prevent from using default bxSlider styles.');
$GLOBALS['TL_LANG']['tl_bxslider']['keyboardEnabled']     = array('Keyboard','Allows for keyboard control of visible slider. Keypress ignored if slider not visible.');
$GLOBALS['TL_LANG']['tl_bxslider']['protected']           = array('Protect bxSlider','Show bxSlider slides to certain member groups only.');
$GLOBALS['TL_LANG']['tl_bxslider']['groups']              = array('Allowed member groups','These groups will be able to see the bxSlider slides in this bxSlider.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_bxslider']['title_legend']     = 'Title';
$GLOBALS['TL_LANG']['tl_bxslider']['options_legend']   = 'Slider options';
$GLOBALS['TL_LANG']['tl_bxslider']['pager_legend']     = 'Pager options';
$GLOBALS['TL_LANG']['tl_bxslider']['controls_legend']  = 'Controls options';
$GLOBALS['TL_LANG']['tl_bxslider']['auto_legend']      = 'Autopaly options';
$GLOBALS['TL_LANG']['tl_bxslider']['carousel_legend']  = 'Carousel options';
$GLOBALS['TL_LANG']['tl_bxslider']['keyboard_legend']  = 'Keyboard';
$GLOBALS['TL_LANG']['tl_bxslider']['aria_legend']      = 'Accessibility';
$GLOBALS['TL_LANG']['tl_bxslider']['class_legend']     = 'Classes';
$GLOBALS['TL_LANG']['tl_bxslider']['protected_legend'] = 'Access protection';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_bxslider']['new']        = array('New bxSlider config','Add a new bxSlider config');
$GLOBALS['TL_LANG']['tl_bxslider']['edit']       = array('Edit bxSlider','Edit bxSlider ID %s');
$GLOBALS['TL_LANG']['tl_bxslider']['editheader'] = array('Edit bxSlider settings','Edit bxSlider settings ID %s');
$GLOBALS['TL_LANG']['tl_bxslider']['copy']       = array('Copy bxSlider','Copy bxSlider ID %s');
$GLOBALS['TL_LANG']['tl_bxslider']['delete']     = array('Delete bxSlider','Delete bxSlider ID %s');
$GLOBALS['TL_LANG']['tl_bxslider']['show']       = array('bxSlider details','Show the details of bxSlider ID %s');

