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

