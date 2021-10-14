function pageanggota() {
    var id_sub_unit = localStorage.getItem('id_sub_unit');
    openPage('page_anggota', { 'id_sub_unit': id_sub_unit }, 'getAnggota');
  
}

function getAnggota(params) {
    //var id_sub_unit = window.localStorage.getItem('id_sub_unit');
    var id_sub_unit = params.id_sub_unit;
    $.post(baseUrl + 'anggota/get-anggota-by-subunit', {
        id_sub_unit: id_sub_unit
    })
        .done(function () {
            $("#namasubunit1").html('Daftar Anggota '+namaunit);
        })
        .always(function (data) {
            // var data = data.message;
            dataanggota.length = 0 // clear array contacts
            for (var index = 0; index < data.length; index++) {
                dataanggota.push(data[index])
            }


        })
}
//perlengkapan/peralatan
function pageperlengkapan() {
  //  var id_sub_unit = localStorage.getItem('id_sub_unit');
    openPage('page_perlengkapan',  'getPerlengkapan');

}

function getPerlengkapan() {
    var id_sub_unit = window.localStorage.getItem('id_sub_unit');
//    var id_sub_unit = params.id_sub_unit;

     $.post(baseUrl + 'anggota/get-perlengkapan-by-subunit', {
        id_sub_unit: id_sub_unit
    })
        .done(function () {
            $("#namasubunit2").html('Daftar Perlengkapan ' + namaunit);
        })
        .always(function (data) {
            dataperlengkapan.length = 0 // clear array contacts
            for (var index = 0; index < data.length; index++) {
                dataperlengkapan.push(data[index])
            }


        })
}
function getPerlengkapanx(params) {
    //var id_sub_unit = window.localStorage.getItem('id_sub_unit');
    var id_sub_unit = params.id_sub_unit;

    alert(id_sub_unit)
}
function bukaformperlengkapan() {
    var id_sub_unit = localStorage.getItem('id_sub_unit');
    openPage('form_perlengkapan');

}
function bukaformupdateperlengkapan() {
    var id_sub_unit = localStorage.getItem('id_sub_unit');
    openPage('form_perlengkapan', { 'id_sub_unit': id_sub_unit }, 'tampilkanPerlengkapan');

}
function simpanperlengkapan() {
    var id_detail_pelayanan = window.localStorage.getItem('id_sub_unit');
    var no_seri = $("#no_seri").val();
    var nm_alat = $("#nm_alat").val();
    var kapasitas = $("#kapasitas").val();
    var tgl_beli = $("#tgl_beli").val();
    var masa_kadaluarsa = $("#masa_kadaluarsa").val();
    var satuan_masa = $("#satuan_masa").val();
    var ket = $("#ket").val();
    $.post(baseUrl + 'anggota/simpan-perlengkapan', {
        id_detail_pelayanan: id_detail_pelayanan,
        no_seri: no_seri,
        nm_alat: nm_alat,
        kapasitas: kapasitas,
        tgl_beli: tgl_beli,
        masa_kadaluarsa: masa_kadaluarsa,
        satuan_masa: satuan_masa,
        ket : ket
    })
        .done(function () {
            loading("hadang sanaklah....")
        })
        .always(function (data) {
            openToast({
                message: data.message,
                position: 'top'
            })
            getPerlengkapan();
         
            closeLoading();
            backPage();
        })
    

}

function tampilkanPerlengkapan(params) {
    $("#idnya").val(params.id);
    $("#no_seri").val(params.no_seri);
    $("#nm_alat").val(params.nm_alat);
    $("#kapasitas").val(params.kapasitas);
    $("#tgl_beli").val(params.tgl_beli);
    $("#masa_kadaluarsa").val(params.masa_kadaluarsa);
    $("#satuan_masa").val(params.satuan_masa);
    $("#ket").val(params.ket);

}
function updateperlengkapan() {
    var id_detail_pelayanan = window.localStorage.getItem('id_sub_unit');
    var id = $("#idnya").val();
    var no_seri = $("#no_seri").val();
    var nm_alat = $("#nm_alat").val();
    var kapasitas = $("#kapasitas").val();
    var tgl_beli = $("#tgl_beli").val();
    var masa_kadaluarsa = $("#masa_kadaluarsa").val();
    var satuan_masa = $("#satuan_masa").val();
    var ket = $("#ket").val();
    $.post(baseUrl + 'anggota/update-perlengkapan', {
        id : id,
        id_detail_pelayanan: id_detail_pelayanan,
        no_seri: no_seri,
        nm_alat: nm_alat,
        kapasitas: kapasitas,
        tgl_beli: tgl_beli,
        masa_kadaluarsa: masa_kadaluarsa,
        satuan_masa: satuan_masa,
        ket: ket
    })
        .done(function () {
            loading("hadang sanaklah....")
        })
        .always(function (data) {
            openToast({
                message: data.message,
                position: 'top'
            })
                  getPerlengkapan()
                  closeLoading();
                  backPage();
        })


}
function deleteItemPerlengkapan(id, no_seri) {
    alert({
        title: 'Alert',
        message: 'Apakah anda yakin ingin menghapus item ini, No Seri : ' + no_seri + '?',
        class: 'red',
        buttons: [
            {
                label: 'YES',
                class: 'red-900',
                 onclick: function () {
                     $.post(baseUrl + 'anggota/delete-perlengkapan', {
                         id: id
                     })
                        
                         .always(function (data) {
                             openToast({
                                 message: data.message,
                                 position: 'top'
                             })
                             getPerlengkapan()
                         })
                     closeAlert();
                   
                 }
            },
            {
                label: 'NO',
                class: 'text-white',
                onclick: function () {
                    closeAlert();
                }
            }
        ]
    });
}
//transportasi
function pagetransportasi() {
    //  var id_sub_unit = localStorage.getItem('id_sub_unit');
    openPage('page_transportasi', 'getTransportasi');

}

function getTransportasi() {
    var id_sub_unit = window.localStorage.getItem('id_sub_unit');
    //    var id_sub_unit = params.id_sub_unit;

    $.post(baseUrl + 'anggota/get-transportasi-by-subunit', {
        id_sub_unit: id_sub_unit
    })
        .done(function () {
            $("#namasubunit2").html('Daftar Transportasi ' + namaunit);
        })
        .always(function (data) {
               datatransportasi.length = 0 // clear array contacts
            for (var index = 0; index < data.length; index++) {
                datatransportasi.push(data[index])
            }


        })
}

function bukaformtransportasi() {
    var id_sub_unit = localStorage.getItem('id_sub_unit');
    openPage('form_transportasi');

}
function bukaformupdatetransportasi() {
    var id_sub_unit = localStorage.getItem('id_sub_unit');
    openPage('form_transportasi', { 'id_sub_unit': id_sub_unit }, 'tampilkanTransportasi');

}
function simpantransportasi() {
    var id_detail_pelayanan = window.localStorage.getItem('id_sub_unit');
    var no_seri = $("#no_seri").val();
    var qty = $("#qty").val();
    var tgl_beli = $("#tgl_beli").val();
    var jns_kendaraan = $("#jns_kendaraan").val();
    var ket = $("#ket").val();
    $.post(baseUrl + 'anggota/simpan-transportasi', {
        id_detail_pelayanan: id_detail_pelayanan,
        no_seri: no_seri,
        qty: qty,
        tgl_beli: tgl_beli,
        jns_kendaraan: jns_kendaraan,
        ket: ket
    })
        .done(function () {
            loading("hadang sanaklah....")
        })
        .always(function (data) {
       //     console.log(data);
            openToast({
                message: JSON.stringify(data.message),
                position: 'top'
            })
            getTransportasi();

            closeLoading();
            backPage();
        })


}

function tampilkanTransportasi(params) {
    $("#idnya").val(params.id);
    $("#no_seri").val(params.no_seri);
    $("#qty").val(params.qty);
    $("#tgl_beli").val(params.tgl_beli);
    $("#jns_kendaraan").val(params.jns_kendaraan);
    $("#ket").val(params.ket);

}
function updatetransportasi() {
    var id_detail_pelayanan = window.localStorage.getItem('id_sub_unit');
    var id = $("#idnya").val();
    var no_seri = $("#no_seri").val();
    var qty = $("#qty").val();
    var tgl_beli = $("#tgl_beli").val();
    var jns_kendaraan = $("#jns_kendaraan").val();
    var ket = $("#ket").val();
    $.post(baseUrl + 'anggota/update-transportasi', {
        id: id,
        id_detail_pelayanan: id_detail_pelayanan,
        no_seri: no_seri,
        qty: qty,
        tgl_beli: tgl_beli,
        jns_kendaraan: jns_kendaraan,
        ket: ket
    })
        .done(function () {
            loading("hadang sanaklah....")
        })
        .always(function (data) {
            openToast({
                message: data.message,
                position: 'top'
            })
            getTransportasi()
            closeLoading();
            backPage();
        })


}
function deleteItemTransportasi(id,no_seri) {
    alert({
        title: 'Alert',
        message: 'Apakah anda yakin ingin menghapus item ini, No Seri : ' + no_seri + '?',
        class: 'red',
        buttons: [
            {
                label: 'YES',
                class: 'red-900',
                onclick: function () {
                    $.post(baseUrl + 'anggota/delete-transportasi', {
                        id: id
                    })

                        .always(function (data) {
                            openToast({
                                message: data.message,
                                position: 'top'
                            })
                            getTransportasi()
                        })
                    closeAlert();

                }
            },
            {
                label: 'NO',
                class: 'text-white',
                onclick: function () {
                    closeAlert();
                }
            }
        ]
    });
}
//batelponan
function call_center(nopex) {
    var nopenya = nopex;
    var nopeku = nopenya.toString().substr(-11);
    cordova.plugins.phonedialer.call(
        "0" + nopeku,
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