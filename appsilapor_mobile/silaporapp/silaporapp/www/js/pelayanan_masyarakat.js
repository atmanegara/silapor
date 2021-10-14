var getpelayanan = $.post(baseUrl + 'pelayanan-masyarakat/pelayanan-masyarakat', {
    kode_pelayanan: '2'
})
    .done(function () {
        loading('Sabar Sanak....')
    })
    .always(function (data) {
        getpelayanan = data

        MobileUI.validUser = function (disabled) {
            if (disabled) {
                return '<span class="red radius padding">User disabled!</span>'
            } else {
                return ''
            }
        }
        closeLoading();

    })


function menujulink(link)
{
    window.location.href = link;
}