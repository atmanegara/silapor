// For an introduction to the Blank template, see the following documentation:
// http://go.microsoft.com/fwlink/?LinkID=397704
// To debug code on page load in cordova-simulate or on Android devices/emulators: launch your app, set breakpoints, 
// and then run "window.location.reload()" in the JavaScript Console.
(function () {
    "use strict";

    document.addEventListener('deviceready',onDeviceReady.bind(this), false);

    function onDeviceReady() {
   

    };

    function onPause() {
        alert('ada');
    };

    function onResume() {
        alert('ada');
    };
 
    function gettetangapp() {
        $.get(baseUrl + 'ref/tentang-app')
            .always(function (datanya) {
                $("#tentangapp").html(datanya);
            })
    }
})();