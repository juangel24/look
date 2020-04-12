/*input_msg = $('input[name="msg"]');
icon_send_msg = $('#icon-send-msg');
icon_send_msg.hide();

input_msg.keyup(function() {
    input = $(this);
    parent = input.parent();
    console.log(input.val());

    if (input.val()) {
        icon_send_msg.show();
        parent.addClass('mr-3');
    }
    else {
        icon_send_msg.hide();
        parent.removeClass('mr-3');
    }
});

window.onload = function () {
    comment = $('#div-image-post');
    comment.scrollTop(comment.scrollHeight);
}*/
$(document).ready(function(){
    $('#comment_form').on('submit',function(e){
        e.preventDefault();
        var fd = $(this).serialize();
        $.ajax({
            url: "/comments",
            method: "POST",
            data: fd,
            DataType: "JSON",
            success: function(data){
                if (data.error != '') {
                    $('#comment_form').
                }
            }
        });

    }); 
});