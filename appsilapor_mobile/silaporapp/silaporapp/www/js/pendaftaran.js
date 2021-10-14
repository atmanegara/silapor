function SignIn() {
    var username = $("#username").val();
    var password = $("#password").val();

    var nama = $("#nama").val();
    var alamat = $("#alamat").val();
    var telpn = $("#telp").val();

    var signin = $.post(baseUrl + 'sign-in', {
        username: username,
        password: password,
        nama: nama,
        alamat: alamat,
        telp: telpn
    })
        .done(function () {
            loading('Please wait...')
        })
        .always(function (data) {
            if (data.code == '200') {
                openToast({
                    message: data.code + ' : ' + data.message,
                    position: 'center'
                })
            } else {
                openToast({
                    message: data.code + ' : ' + data.message,
                    class: 'red radius-big',
                    position: 'center'
                })
            }
        })
        .fail(function () {
            openToast({
                message: 'server lingu sanakae nah',
                class: 'red radius-big'
            })
        })
}
