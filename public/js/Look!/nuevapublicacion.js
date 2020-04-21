/*$(document).ready(function(){
   
    var id = $('input[name="id"]').val();
    $("#profileimage").change(function(){
        var foto = $(this)[0].files[0];
        var fd = new FormData();
        fd.append('id',id);
        fd.append('foto',foto);
        $.ajax({
            xhr: function(){
               var xhr = new XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(evt){
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        console.log(percentComplete);
                        $('.progress-bar').css('width',percentComplete + '%');
                        if (percentComplete === 100) {
                            console.log('complete 100%');
                            var imageURL = window.URL.createObjectURL(foto);
                            $('#fotodeperfil').attr('src',imageURL);
                            setTimeout(function(){
                                $('.progress-bar').css('width','0%');
                            },2000)
                        }
                    }
                },false);
                return xhr;
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url: "/updatephoto",
            type: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            succes: function(data){
                alert('success');
                console.log(data);
            }
        });
    });
  
  });*/
 