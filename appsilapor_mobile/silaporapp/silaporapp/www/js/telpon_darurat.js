var getpelayanan = $.post(baseUrl + 'pelayanan-masyarakat/pelayanan-masyarakat', {
    kode_pelayanan: '1'
})
    .done(function () {
        loading('Sabar Sanak....')
    })
    .always(function (data) {
        panggilandarurat = data

        MobileUI.validUser = function (disabled) {
            if (disabled) {
                return '<span class="red radius padding">User disabled!</span>'
            } else {
                return ''
            }
        }
        closeLoading();

    })


function alertdarurat(id) {
    var onSuccess = function (position) {
        /* alert('Latitude: ' + position.coords.latitude + '\n' +
                'Longitude: ' + position.coords.longitude + '\n' +
                'Altitude: ' + position.coords.altitude + '\n' +
                'Accuracy: ' + position.coords.accuracy + '\n' +
                'Altitude Accuracy: ' + position.coords.altitudeAccuracy + '\n' +
                'Heading: ' + position.coords.heading + '\n' +
                'Speed: ' + position.coords.speed + '\n' +
                'Timestamp: ' + position.timestamp + '\n');
       */

        var username = localStorage.getItem('username');
        var id_group_user = id;
        //   alert(foto_lokasi);
        $.post(baseUrl + 'pelayanan-masyarakat/kirim-aduan-darurat', {
            nope_pengguna: username,
            lokasi_kejadian_lat: position.coords.latitude,
            lokasi_kejadian_long: position.coords.longitude,
            lokasi_pengguna_lat: position.coords.latitude,
            lokasi_pengguna_lng: position.coords.longitude,
            rincian_aduan : "Toloonggg",
            id_group_user: id_group_user

        })
            .done(function () {
                console.log('done');
            })
            .always(function (data) {
                var data = JSON.stringify(data);
                console.log(data);
                openToast({
                    message: data,
                    position: 'bottom'
                });
                closeLoading();
                return false;
            })
            .fail(function () {
                closeLoading();
                return false;
            })
    };

    // onError Callback receives a PositionError object
    //
    function onError(error) {
        alert('code: ' + error.code + '\n' +
            'message: ' + error.message + '\n');
    }

    navigator.geolocation.getCurrentPosition(onSuccess, onError);

}

function openpagemap(id)
{
    var onSuccess = function (position) {
        /* alert('Latitude: ' + position.coords.latitude + '\n' +
                'Longitude: ' + position.coords.longitude + '\n' +
                'Altitude: ' + position.coords.altitude + '\n' +
                'Accuracy: ' + position.coords.accuracy + '\n' +
                'Altitude Accuracy: ' + position.coords.altitudeAccuracy + '\n' +
                'Heading: ' + position.coords.heading + '\n' +
                'Speed: ' + position.coords.speed + '\n' +
                'Timestamp: ' + position.timestamp + '\n');
       */
        localStorage.setItem('Latitude', position.coords.latitude);//koordinat yang punya hp
        localStorage.setItem('Longitude', position.coords.longitude);//koordinat yang punya hp
        localStorage.setItem('iddarurat', id);
        window.location.href = "kosong.html";
    };

    // onError Callback receives a PositionError object
    //
    function onError(error) {
        alert('code: ' + error.code + '\n' +
            'message: ' + error.message + '\n');
    }

    navigator.geolocation.getCurrentPosition(onSuccess, onError);

  
}