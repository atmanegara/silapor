
function login() {


    loading('Hadang dulu...');
    var username = $("#username").val();
    var password = $("#password").val();

    var posting = $.post(baseUrl + 'default/login', {
        username: username,
        password: password
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
            var informasi = data;
            if (data.code == '500') {
                var message = informasi.code.message;
                alert(JSON.stringify(data))
                cordova.plugins.backgroundMode.enable();

                closeLoading();
                return false;
            } else {
                if (data.code == '404') {
                    alert(data.message)


                    return false;
                }
            }
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
                window.location.href = 'home.html';
              

            }, 1000)
        })

}

function SignIn() {
    var no_induk = $("#no_induk").val();
    var nama_lengkap = $("#nama_lengkap").val();
    var alamat = $("#alamat").val();
    var jkel = $("#jkel").val();
    var nope = $("#nope").val();
    var unit = $("#unit").val();
    var subunit = $("#subunit").val();
    var jabatan = $("#jabatan").val();
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
		subunit : subunit,
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
                openToast({
                    message: JSON.stringify(data),
                    position: 'top'
                })
            }
            closeLoading();
        })
        .fail(function () {
            closeLoading();
            alert('Sabar sabar ini ujian sanak, server lagi takang, mahubungi tukangnya dulu nah...')

        })
}