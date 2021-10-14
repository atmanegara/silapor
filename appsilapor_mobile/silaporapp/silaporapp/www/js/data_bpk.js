

function getListBpk(params) {
    ListBpk(params.id);

}
function ListBpk(id_data_pelayanan) {
    $.post(baseUrl + 'pelayanan-masyarakat/detail-pelayanan', {
        id_data_pelayanan : id_data_pelayanan
    })
        .done(function () {
            loading('sabar sanak.....')
        })
        .always(function (data) {
            
            getdetailpelayanan.length = 0 // clear array contacts
            for (var index = 0; index < data.length; index++) {
                getdetailpelayanan.push(data[index])
            } 

        closeLoading();

           
        })
}
