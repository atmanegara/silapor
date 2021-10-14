var getcallcenter = $.post(baseUrl + 'pelayanan-masyarakat/pelayanan-masyarakat', {
kode_pelayanan : '3'
})
.done(function(){
    loading('Sabar Sanak....')
})
.always(function(data){
    callcenter = data

    MobileUI.validUser = function (disabled) {
        if (disabled) {
            return '<span class="red radius padding">User disabled!</span>'
        } else {
            return ''
        }
    }
    closeLoading();

})


function call_center(nopex) {
    var nopenya = nopex;
    var nopeku = nopenya.toString().substr(-11);
    cordova.plugins.phonedialer.call(
        "0"+nopeku,
        function (err) {
            if (err == "empty") alert("Unknown phone number");
            else alert("Dialer Error:" + err);
        },
        function (success) {
         // alert('Dialing succeeded');
        },
        true
    //    appChooser
    );

}