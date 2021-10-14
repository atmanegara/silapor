var datax = 0;
function getdatadarurat()
{
    var id_group_user = localStorage.getItem('id_group_user');

    $.post(baseUrl + 'data-aduan/data-darurat', {
        id_group_user: id_group_user
    })
        .always(function (data) {
           
       datax = data.length;
            
        })
}
// onSuccess Callback
//
function onSuccess() {
}
/*
function mediaStatus(status) {
    if (isAndroid && status === my_media.MEDIA_STOPPED) {
        my_media.seekTo(0);
        my_media.play();
    }
}
*/
// onError Callback
//
function onError(error) {
}
var path_img = localStorage.getItem('lokasi_img');

setInterval(function () {
   getdatadarurat();

 my_media = new Media(src, onSuccess, onError);

   var image = document.getElementById('avatarlogo1');
   if (datax > 0) {
       image.src = "img/sirine.gif"
       if (numx == 0) {
           my_media.play();
           $("#avatarlogo1").click(function () {
               getlokasidarurat();
           })
        numx++;
       } else {
           numx = 0;
           image.src = path_img;
           if (my_media) {
               my_media.stop();
               my_media.release();
           }
           //     $("#avatarlogo2").css('display', 'none')
           //     $("#avatarlogo1").css('display', 'block')
           //my_media.release();
       }
   }
}, 1000);