function ambilgambar() {
    navigator.camera.getPicture(onSuccess, onFail, {
        quality: 50,
        destinationType: Camera.DestinationType.DATA_URL 
     //  destinationType: Camera.DestinationType.FILE_URI
    });

}
   
function jenisaduan() {

    $.get(baseUrl + 'ref/jenis-aduan')
   
        .always(function (data) {
            // var data = data.message;
          //  console.log(data);
            refjenisaduan.length = 0 // clear array contacts

            for (var index = 0; index < data.length; index++) {
                refjenisaduan.push(data[index])
            }


        })

}

function onSuccess(imageData) {
// var image = document.getElementById('myImage'); 
  //    image.src = "data:image/jpeg;base64," + imageData;
    var image = document.getElementById('showimage');
    image.src = "data:image/jpeg;base64," + imageData; 
}

function onFail(message) {
    alert('Failed because: ' + message);
}

function kirimaduan() {


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
        var id_ref_jenis_aduan = $("#id_ref_jenis_aduan").val();
        var rincian_aduan = $("#rincian_aduan").val();
        var sifataduan = $("#sifataduan").prop('checked');
        var foto_lokasi = document.getElementById('showimage').src;
     //   alert(foto_lokasi);
            $.post(baseUrl + 'data-aduan/kirim-aduan', {
                nope_pengguna: username,
                lokasi_kejadian_lat: position.coords.latitude,
                lokasi_kejadian_long: position.coords.longitude,
                lokasi_pengguna_lat: position.coords.latitude,
                lokasi_pengguna_lng: position.coords.longitude,
            path_foto: foto_lokasi,
            rincian_aduan: rincian_aduan,
            id_ref_jenis_aduan: id_ref_jenis_aduan,
            sifataduan: sifataduan
        })
                .done(function () {
                    loading('Sabar sanak...')
             })
                .always(function (data) {
                    var data = JSON.stringify(data);
                openToast({
                    message: data,
                    position: 'bottom'
                    });
             //   console.log(data)
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


    var nope = localStorage.getItem('username');

    $.get(baseUrl + 'data-aduan/list-aduan-by-nope', {
        nope : nope
    })
        .done(function () {
            loading('Hadang sanak....')
        })
        .always(function (data) {
            listaduanby.length = 0 // clear array contacts
              for (var index = 0; index < data.length; index++) {
                  listaduanby.push(data[index])
            }
              closeLoading();
        })




