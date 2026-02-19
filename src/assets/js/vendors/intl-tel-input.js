/**
 *
 */
$(document).ready(function () {

    const phoneInputField = document.querySelector("#mobile_phone");

    const phoneInput = window.intlTelInput(phoneInputField, {

        formatOnDisplay: true,

        geoIpLookup: function(callback) {

            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {

                var countryCode = (resp && resp.country) ? resp.country : "";

                callback(countryCode);
            });
        },

        hiddenInput: "mobile_phone_full",

        initialCountry: "auto",

        //separateDialCode: true,

        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.6/js/utils.min.js",
    });

    return phoneInput.getNumber();

});
