function profilefile(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
        
            $('#lala').html("<figure><img  src='"+e.target.result+"' />");
        }
        reader.readAsDataURL(input.files[0]);
    }
    /*var imagg = URL.createObjectURL(file);
    var img2 = '<div id ="lala" style=""><figure><img  src="'+imagg+'" /><figcaption><i class="fas fa-times"></i></figcaption></figure></div>';
    $(img2).insertAfter('#btnsubirfoto');*/
}
$('#profileimage').change(function(){
    profilefile(this);
});


$(document).on("click","#lala",function(e){
    $(this).empty();
});

/*$(document).on("change","#lala",function(){
    console.log(this.files);
    var files = this.files;
    var element;
    var soportaImagenes = ["image/jpeg","image/jpg","image/png"];
    var elemntosnovalidos = false;
    
    for (var i = 0; i < files .length; i++){
        element = files[i];
        if( soportaImagenes.indexOf(element.type) != -1){
            filepreview(element);
        }else{
            elemntosnovalidos = true;
        }
    }
    /*if (elemntosnovalidos){
        showMessage('Elementos no válidos');
    }
    else{
        showMessage('Todos los elementos se guardaron exitosamente');
    }
});*/



// UPDATED PROFILE
$('.btn-conf-info').click( function () {
    $('#arrow').show()
    $('#hrefArrow').hide()
    $('.formUpdate1').hide()
    $('.formUpdate2').show()
})
$('#arrow').click( function () {
    if($('.formUpdate2').show()){
        $('#arrow').hide()
        $('#hrefArrow').show()
        $('.formUpdate2').hide()
        $('.formUpdate1').show()
    }
});

//DELETE POST
function deletepost(){
    var id = $("input[name='id_post']").val();
    var csrf_token = $('meta[name="csrf_token"]').attr('content');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((willdelete) => {
        if (willdelete) {
          $.ajax({
            url : "deletepost/" + id,
            method: "GET",
            data: { '_token': csrf_token},
            success: function(data){
                Swal.fire({
                    title: 'Eliminar publicacion',
                    icon: 'success',
                    button: 'Done'
                });
                location.href = '/profile';
            },
            error: function(){
                swal({
                    title: 'Oopss..',
                    text: 'data.message',
                    type: 'error',
                    timer: '1500'
                });
            }
          });
        }else{
            Swal.fire("hola");
        }
      });
    }    

 