// =========================================================
// Element - v3.0.0
// =========================================================

// Copyright 2023 Tiny Rebels (https://github.com/tiny-rebels)
// Licensed under MIT (https://github.com/tiny-rebels/element-nexus?tab=MIT-1-ov-file#readme)

// Coded by Tiny Rebels

// =========================================================

// The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
(function() {

    const idleDurationSecs = 180;              // X number of seconds
    const redirectUrl = '/auth/lock-system';    // Redirect idle users to this URL
    let idleTimeout;                                   // variable to hold the timeout, do not modify

    const resetIdleTimeout = function() {

        // Clears the existing timeout
        if(idleTimeout) clearTimeout(idleTimeout);

        // Set a new idle timeout to load the redirectUrl after idleDurationSecs
        idleTimeout = setTimeout(() => location.href = redirectUrl, idleDurationSecs * 1000);
    };

    // Init on page load
    resetIdleTimeout();

    // Reset the idle timeout on any of the events listed below
    ['click', 'touchstart', 'mousemove'].forEach(evt =>
        document.addEventListener(evt, resetIdleTimeout, false)
    );

})();