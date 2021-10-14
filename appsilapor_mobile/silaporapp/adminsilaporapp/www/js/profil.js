
function getprofildiri() {
    var id = localStorage.getItem('id');
    $.get(baseUrl + 'default/profildiri', {
        id : id
    })
        .done(function () {
           
                loading('Hadang sanak...')
            
        })
        .always(function (data) {
            $("#id").val(data.id);
            $("#no_induk").val(data.no_induk);
            $("#nama").val(data.nama);
            $("#alamat").val(data.alamat);
            $("#jkel").val(data.jkel);
            $("#nope").val(data.nope);
            $("#username").val(data.username);
            $("#password").val(data.password_hash);
            closeLoading();
        })
}
function updateprofil() {
    var id = $("#id").val();
    var no_induk = $("#no_induk").val();
   var nama =  $("#nama").val();
   var alamat =  $("#alamat").val();
   var jkel = $("#jkel").val();
   var nope = $("#nope").val();
   $.post(baseUrl + 'default/update-profil', {
       id: id,
       no_induk: no_induk,
       nama: nama,
       alamat: alamat,
       jkel: jkel,
       nope:nope,
   })
       .done(function () {
           loading('Hadang sanak...')
       })
       .always(function (data) {
           openToast({
               message: JSON.stringify(data.message),
               position: 'top'
           })
           closeLoading();
       })
}

function updateakun() {

    var id = localStorage.getItem('id');
    var username = $("#username").val();
    var password_new = $("#password_new").val();
    $.post(baseUrl + 'default/update-akun', {
        id: id,
        username: username,
        password: password_new
    })
        .done(function () {
            loading('Hadang sanak...')
        })
        .always(function (data) {
            showWithCustomId()
            closeLoading();
        })
}

function showWithCustomId() {
    alert({
        title: 'Informasi..',
        message: 'Anda login ulang',
        id: 'my-custom-id-alert',
        buttons: [
            {
                label: 'OK',
                onclick: function () {
                    localStorage.clear();
                    window.location.href = 'index.html';
                }
            }]
    });
}




/*
document.addEventListener('openPage', function (e) {
    if (e.detail == "home.html") {

        document.addEventListener('deviceready', onDeviceReady, false);
    }
})
function onDeviceReady() {
    document.addEventListener("backbutton", tombolKeluar, false);

}
function tombolKeluar() {
    function exitAplication(buttonIndex) {
        if (buttonIndex == 1) { // nomer 1 adalah urutan tombol Ya 
            navigator.app.exitApp(); // perintah untuk keluar dari aplikasi
        }
    }
    navigator.notification.confirm(
        'Yakin untuk Keluar Aplikasi ?', // pesan
        exitAplication, // callback saat tombol ditekan
        'Konfirmasi', // title
        ['Ya', 'Tidak']     // buttonLabels
    );
}
*/