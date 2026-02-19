/* Only register a service worker if it's supported */
if ('serviceWorker' in navigator) {

    window.addEventListener('load', function() {

        navigator.serviceWorker

            .register('/public/js/register-service-worker.min.js')

            .then(function(registration) {

                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);

        }, function(err) {

            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
        });
    });
}
