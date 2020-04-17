function filepreview(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
        
            $('#lolo').html("<figure><img  src='"+e.target.result+"' />");
        }
        reader.readAsDataURL(input.files[0]);
    }
    /*var imagg = URL.createObjectURL(file);
    var img2 = '<div id ="lala" style=""><figure><img  src="'+imagg+'" /><figcaption><i class="fas fa-times"></i></figcaption></figure></div>';
    $(img2).insertAfter('#btnsubirfoto');*/
}
$('#imagen').change(function(){
    filepreview(this);
});


$(document).on("click","#lolo",function(e){
    $(this).empty();
});