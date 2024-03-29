<ul class="sidebar-menu" id="nav-accordion">

    <li>
        <a class="active" href="{{ url('/user_dashboard') }}">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sub-menu">
        <a href="" >
            <i class="fa fa-laptop"></i>
            <span>Product</span>
        </a>
        <ul class="sub">
            <li><a  href="{{ url('/all-pro') }}">ALL Product</a></li>
            <li><a  href="{{ url('/user/requests') }}">Request Product</a></li>
            <li><a  href="{{ url('/user/delever-product') }}">deliver Product</a></li>
            <li><a  href="{{ url('/user/requests-reject') }}">reject  Product</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="" onclick="closeNav()"><i class="fa fa-bitbucket"></i>
            <span> Add wishlist</span>
        </a>
        <ul class="sub">
            <li class="pointer"><a  href="{{ url('/wishlist') }}">Add wishlist</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="" onclick="closeNav()"><i class="fa fa-lemon-o"></i>
            <span>Repaire</span>
        </a>
        <ul class="sub">
            <li class="pointer"><a  href="{{ route('repair.show') }}">Repair</a></li>
            <li class="pointer"><a  href="{{ url('/repair') }}">Add Repair</a></li>
        </ul>
    </li>


</ul>

@section('script')
    <script>
        $(document).ready(function() {

$.slidebars = function(options) {

    // ----------------------
    // 001 - Default Settings

    var settings = $.extend({
        siteClose: true, // true or false - Enable closing of Slidebars by clicking on #sb-site.
        siteLock: false, // true or false - Prevent scrolling of site when a Slidebar is open.
        disableOver: false, // integer or false - Hide Slidebars over a specific width.
        hideControlClasses: false // true or false - Hide controls at same width as disableOver.
    }, options);

    // -----------------------
    // 002 - Feature Detection

    var test = document.createElement('div').style, // Create element to test on.
        supportTransition = false, // Variable for testing transitions.
        supportTransform = false; // variable for testing transforms.

    // Test for CSS Transitions
    if (test.MozTransition === '' || test.WebkitTransition === '' || test.OTransition === '' || test.transition === '') supportTransition = true;

    // Test for CSS Transforms
    if (test.MozTransform === '' || test.WebkitTransform === '' || test.OTransform === '' || test.transform === '') supportTransform = true;

    // -----------------
    // 003 - User Agents

    var ua = navigator.userAgent, // Get user agent string.
        android = false, // Variable for storing android version.
        iOS = false; // Variable for storing iOS version.

    if (/Android/.test(ua)) { // Detect Android in user agent string.
        android = ua.substr(ua.indexOf('Android') + 8, 3); // Set version of Android.
    } else if (/(iPhone|iPod|iPad)/.test(ua)) { // Detect iOS in user agent string.
        iOS = ua.substr(ua.indexOf('OS ') + 3, 3).replace('_', '.'); // Set version of iOS.
    }

    if (android && android < 3 || iOS && iOS < 5) $('html').addClass('sb-static'); // Add helper class for older versions of Android & iOS.

    // -----------
    // 004 - Setup

    // Site Container
    var $site = $('#sb-site, .sb-site'); // Cache the selector.

    // Left Slidebar
    if ($('.sb-left').length) { // Check if the left Slidebar exists.
        var $left = $('.sb-left'), // Cache the selector.
            leftActive = false; // Used to check whether the left Slidebar is open or closed.
    }

    // Right Slidebar
    if ($('.sb-right').length) { // Check if the right Slidebar exists.
        var $right = $('.sb-right'), // Cache the selector.
            rightActive = false; // Used to check whether the right Slidebar is open or closed.
    }

    var init = false,
        windowWidth = $(window).width(), // Get width of window.
        $controls = $('.sb-toggle-left, .sb-toggle-right, .sb-open-left, .sb-open-right, .sb-close'), // Cache the control classes.
        $slide = $('.sb-slide'); // Cache users elements to animate.

    // Initailise Slidebars
    function initialise() {
        if (!settings.disableOver || (typeof settings.disableOver === 'number' && settings.disableOver >= windowWidth)) { // False or larger than window size.
            init = true; // true enabled Slidebars to open.
            $('html').addClass('sb-init'); // Add helper class.
            if (settings.hideControlClasses) $controls.removeClass('sb-hide'); // Remove class just incase Slidebars was originally disabled.
            css(); // Set required inline styles.
        } else if (typeof settings.disableOver === 'number' && settings.disableOver < windowWidth) { // Less than window size.
            init = false; // false stop Slidebars from opening.
            $('html').removeClass('sb-init'); // Remove helper class.
            if (settings.hideControlClasses) $controls.addClass('sb-hide'); // Hide controls
            if (leftActive || rightActive) close(); // Close Slidebars if open.
        }
    }
    initialise();

    // Inline CSS
    function css() {
        // Set minimum height.
        $site.css('minHeight', ''); // Reset minimum height.
        $site.css('minHeight', $('body').height() + 'px'); // Set minimum height of the site to the minimum height of the body.

        // Set off-canvas margins for Slidebars with push and overlay animations.
        if ($left && ($left.hasClass('sb-style-push') || $left.hasClass('sb-style-overlay'))) $left.css('marginLeft', '-' + $left.css('width'));
        if ($right && ($right.hasClass('sb-style-push') || $right.hasClass('sb-style-overlay'))) $right.css('marginRight', '-' + $right.css('width'));

        // Custom Slidebar Widths
        if ($left && $left.hasClass('sb-width-custom')) $left.css('width', $left.attr('data-sb-width')); // Set user custom width.
        if ($right && $right.hasClass('sb-width-custom')) $right.css('width', $right.attr('data-sb-width')); // Set user custom width.

        // Site lock.
        if (settings.siteLock) $('html').addClass('sb-lock');
    }

    // Resize Functions
    $(window).resize(function() {
        var resizedWindowWidth = $(window).width(); // Get resized window width.
        if (init && windowWidth !== resizedWindowWidth) { // Slidebars is running and window was actually resized.
            windowWidth = resizedWindowWidth; // Set the new window width.
            initialise(); // Call initalise to see if Slidebars should still be running.
            css(); // Reset minimum heights and negative margins.
            if (leftActive) open('left'); // If left Slidebar is open, calling open will ensure it is the correct size.
            if (rightActive) open('right'); // If right Slidebar is open, calling open will ensure it is the correct size.
        }
    });
    // I may include a height check along side a width check here in future.

    // ---------------
    // 005 - Animation

    var animation; // Animation type.

    // Set Animation Type
    if (supportTransition && supportTransform) { // Browser supports css transitions and transforms.
        animation = 'translate'; // Translate for browsers that support it.
        if (android && android < 4.4) animation = 'side'; // Android supports both, but can't translate any fixed positions, so use left instead.
    } else {
        animation = 'jQuery'; // Browsers that don't support css transitions and transitions.
    }

    // Animate Mixin
    function animate(object, amount, side) {
        // Choose selectors depending on animation style.
        var selector;

        if (object.hasClass('sb-style-push')) {
            selector = $site.add(object).add($slide); // Push - Animate site, Slidebar and user elements.
        } else if (object.hasClass('sb-style-overlay')) {
            selector = object; // Overlay - Animate Slidebar only.
        } else {
            selector = $site.add($slide); // Reveal - Animate site and user elements.
        }

        // Apply Animation
        if (animation === 'translate') {
            selector.css('transform', 'translate(' + amount + ')');
        } else if (animation === 'side') {
            if (amount[0] === '-') amount = amount.substr(1); // Remove the '-' from the passed amount for side animations.
            selector.css(side, amount);
            setTimeout(function() {
                if (amount === '0px') {
                    selector.removeAttr('style');
                    css();
                }
            }, 400);
        } else if (animation === 'jQuery') {
            if (amount[0] === '-') amount = amount.substr(1); // Remove the '-' from the passed amount for jQuery animations.
            var properties = {};
            properties[side] = amount;
            selector.stop().animate(properties, 400); // Stop any current jQuery animation before starting another.
            setTimeout(function() {
                if (amount === '0px') {
                    selector.removeAttr('style');
                    css();
                }
            }, 400); // If closed, remove the inline styling on completion of the animation.
        }
    }

    // ----------------
    // 006 - Operations

    // Open a Slidebar
    function open(side) {
        // Check to see if opposite Slidebar is open.
        if (side === 'left' && $left && rightActive || side === 'right' && $right && leftActive) { // It's open, close it, then continue.
            close();
            setTimeout(proceed, 400);
        } else { // Its not open, continue.
            proceed();
        }

        // Open
        function proceed() {
            if (init && side === 'left' && $left) { // Slidebars is initiated, left is in use and called to open.
                $('html').addClass('sb-active sb-active-left'); // Add active classes.
                $left.addClass('sb-active');
                animate($left, $left.css('width'), 'left'); // Animation
                setTimeout(function() { leftActive = true; }, 400); // Set active variables.
            } else if (init && side === 'right' && $right) { // Slidebars is initiated, right is in use and called to open.
                $('html').addClass('sb-active sb-active-right'); // Add active classes.
                $right.addClass('sb-active');
                animate($right, '-' + $right.css('width'), 'right'); // Animation
                setTimeout(function() { rightActive = true; }, 400); // Set active variables.
            }
        }
    }

    // Close either Slidebar
    function close(link) {
        if (leftActive || rightActive) { // If a Slidebar is open.
            if (leftActive) {
                animate($left, '0px', 'left'); // Animation
                leftActive = false;
            }
            if (rightActive) {
                animate($right, '0px', 'right'); // Animation
                rightActive = false;
            }

            setTimeout(function() { // Wait for closing animation to finish.
                $('html').removeClass('sb-active sb-active-left sb-active-right'); // Remove active classes.
                if ($left) $left.removeClass('sb-active');
                if ($right) $right.removeClass('sb-active');
                if (link) window.location = link; // If a link has been passed to the function, go to it.
            }, 400);
        }
    }

    // Toggle either Slidebar
    function toggle(side) {
        if (side === 'left' && $left) { // If left Slidebar is called and in use.
            if (!leftActive) {
                open('left'); // Slidebar is closed, open it.
            } else {
                close(); // Slidebar is open, close it.
            }
        }
        if (side === 'right' && $right) { // If right Slidebar is called and in use.
            if (!rightActive) {
                open('right'); // Slidebar is closed, open it.
            } else {
                close(); // Slidebar is open, close it.
            }
        }
    }

    // ---------
    // 007 - API

    this.open = open; // Maps user variable name to the open method.
    this.close = close; // Maps user variable name to the close method.
    this.toggle = toggle; // Maps user variable name to the toggle method.
    this.init = function() { // Returns true or false whether Slidebars are running or not.
        return init;
    };
    this.active = function(side) { // Returns true or false whether Slidebar is open or closed.
        if (side === 'left' && $left) return leftActive;
        if (side === 'right' && $right) return rightActive;
    };

    // ----------------
    // 008 - User Input

    function eventHandler(event, selector) {
        event.stopPropagation(); // Stop event bubbling.
        event.preventDefault(); // Prevent default behaviour
        if (event.type === 'touchend') selector.off('click'); // If event type was touch turn off clicks to prevent phantom clicks.
    }

    // Toggle Left Slidebar
    $('.sb-toggle-left').on('touchend click', function(event) {
        eventHandler(event, $(this)); // Handle the event.
        toggle('left'); // Toggle the left Slidbar.
    });

    // Toggle Right Slidebar
    $('.sb-toggle-right').on('touchend click', function(event) {
        eventHandler(event, $(this)); // Handle the event.
        toggle('right'); // Toggle the right Slidbar.
    });

    // Open Left Slidebar
    $('.sb-open-left').on('touchend click', function(event) {
        eventHandler(event, $(this)); // Handle the event.
        open('left'); // Open the left Slidebar.
    });

    // Open Right Slidebar
    $('.sb-open-right').on('touchend click', function(event) {
        eventHandler(event, $(this)); // Handle the event.
        open('right'); // Open the right Slidebar.
    });

    // Close a Slidebar
    $('.sb-close').on('touchend click', function(event) {
        eventHandler(event, $(this)); // Handle the event.
        close(); // Close either Slidebar.
    });

    // Close Slidebar via Link
    $('.sb-slidebar a').not('.sb-disable-close').on('click', function(event) {
        eventHandler(event, $(this)); // Handle the event.
        close($(this).attr('href')); // Close the Slidebar and pass link.
    });

    // Close Slidebar via Site
    $site.on('touchend click', function(event) {
        if (settings.siteClose && (leftActive || rightActive)) { // If settings permit closing by site and left or right Slidebar is open.
            eventHandler(event, $(this)); // Handle the event.
            close(); // Close it.
        }
    });

}; // End slidebars function.

});
    </script>
@endsection
