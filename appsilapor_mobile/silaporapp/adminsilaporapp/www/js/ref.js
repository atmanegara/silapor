function getref() {
  
       $.get(baseUrl + 'ref/ref-group-user')
        .done(function () {
        })
        .always(function (data) {
           // var data = data.message;
            dataunit.length = 0 // clear array contacts
            for (var index = 0; index < data.length; index++) {
                dataunit.push(data[index])
            }


        })
}

function getsubunit(id) {

    $.get(baseUrl + 'ref/get-sub-unit', {
        id:id
    })
        .done(function () {
            console.log('done');
        })
        .always(function (data) {
            datasubunit.length = 0 // clear array contacts
            for (var index = 0; index < data.length; index++) {
                datasubunit.push(data[index])
            }


        })
}

