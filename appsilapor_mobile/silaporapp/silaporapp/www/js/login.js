function LogIn() {

    loading('Hadang dulu...');
    var username = $("#username").val();
    var password = $("#password").val();

    var posting = $.post(baseUrl + 'default/login', {
        username: username,
        password : password
    })
        .done(function () {
            localStorage.clear;

        })
        .fail(function () {
            alert('Server tahangkup');
            closeLoading();
            return false;
        })
        .always(function (data) {
                     if (data.code == '200') {
                         openToast({
                             message: data.message,
                             position: 'top'
                         })
                         closeLoading();
                         setTimeout(function () {
                             localStorage.setItem('username', data.username);
                             localStorage.setItem('id_group_user', data.id_group_user);
                             localStorage.setItem('id_sub_unit', data.id_sub_unit);
                             localStorage.setItem('nama_sub_unit', data.nama_sub_unit);
                             localStorage.setItem('email', data.email);
                             localStorage.setItem('id', data.id);
                             localStorage.setItem('lokasi_img', data.lokasi_img);
                             //    openPage('home.html', { username: data.username,email : data.email},tampilkandata);
                             window.location.href = "home.html";
                         }, 1000)
            } else {
                
                         openToast({
                             message: JSON.stringify(data),
                             position: 'top'
                         })
                         closeLoading();

              
                    return false;
                }
            })
           
  
 
}
function SignIn() {
    var no_induk = '';
    var nama_lengkap = $("#nama_lengkap").val();
    var alamat = $("#alamat").val();
    var jkel = $("#jkel").val();
    var nope = $("#nope").val();
    var unit = '999';
    var subunit = '999';
    var jabatan ='9999';
    var email = $("#email").val();
    var passwordbaru = $("#passwordbaru").val();
    var usernamebaru = $("#usernamebaru").val();

    $.post(baseUrl + 'default/signup', {
        no_induk: no_induk,
        nama_lengkap: nama_lengkap,
        alamat: alamat,
        jkel: jkel,
        nope: nope,
        unit: unit,
        subunit: subunit,
        jabatan: jabatan,
        email: email,
        password: passwordbaru,
        username: usernamebaru
    })
        .done(function () {
            loading('sabar sanak...')
        })
        .always(function (data) {
            if (data.code == '200') {
                openToast({
                    message: data.message,
                    position: 'top'
                })
                  setTimeout(function () {
                    backPage()
                }, 1000);
                
            } else {
            //    console.log(JSON.stringify(data));
                openToast({
                    message: JSON.stringify(data),
                    position: 'top'
                })
                closeLoading();
                return false;
            }
            
            closeLoading();
        })
        .fail(function () {
            closeLoading();
            alert('Sabar sabar ini ujian sanak, server lagi takang, mahubungi tukangnya dulu nah...')
            return false;
        })
}
function tampilkandata(params) {
    $("#usernamemenu").html(params.username);
    $("#emailmenu").html(params.email);
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