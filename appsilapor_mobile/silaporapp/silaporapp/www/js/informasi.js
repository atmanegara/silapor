 $.get(baseUrl + 'pelayanan-masyarakat/informasi')
    .done(function (data) {
        var htmlx = '';
        for (var index = 0; index < data.length; index++) {
            var obj = data[index];
            //      console.log(obj.file_image);
            // informasislide.push(data[index])
            htmlx += "<div class='swiper-slide text-white align-center cover white-opacity-30 blend-soft-light' data-swiper-autoplay='2000' style='background-image:url(data:image/jpeg;base64," + obj.file_image + ");background-repeat: no-repeat;" +
                "background-size: 350px 300px;'>" +
                "<h2> " + obj.title + "</h2>" +
                "<div class='bottom margin-bottom text-shadow padding'>" +
                obj.keterangan +
                "</div></div>";


        }
        //      console.log(htmlx);
        $(".swiper-wrapper").html(htmlx);

    })
    .always(function (data) {
            new Swiper('.swipper-gallery', {
                pagination: '.swiper-pagination',
            autoplay: {
                delay: 2000,
            },
        });

      

    })

