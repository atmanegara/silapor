function getListAduan(params) {
    kotak_masuk_aduan(params.id);

}

function kotak_masuk_aduan(id) {
    loading('Sabar sanak.....');
       $.post(baseUrl + 'data-aduan/by-id', {
        id : id
    })
        .done(function () {
        })
        .always(function (data) {
           // var data = data.message;
     //       console.log(data);
            getaduan.length = 0 // clear array contacts
     //       console.log(data.length);
            for (var index = 0; index < data.length; index++) {
                getaduan.push(data[index])
            }

            closeLoading();

        })
}

function list_per_aduaun(params) {
  //  console.log(params);
    $("#pelapor").val(params.nope_pengguna);
    $("#rincian_aduan").val(params.rincian_aduan);
    var image = document.getElementById('foto_lokasi');
    image.src=params.foto;
    $("#lokasi_kejadian").val(params.lokasi_kejadian_lat + ' - ' + params.lokasi_kejadian_long);

    $('#bukamap').on('click', function () {
        window.location.href = "https://www.google.com/maps/@" + params.lokasi_kejadian_lat + "," + params.lokasi_kejadian_long+",15z"
    })
}

function getlokasidarurat() {

    window.location.href = "lacak_lokasi.html";

    
}
function total_kotak_masuk_aduan(id) {
    $.post(baseUrl + 'data-aduan/by-id', {
        id: id
    })
        .done(function () {
        })
        .always(function (data) {
            totaladuan = data.length;
         

        })
}