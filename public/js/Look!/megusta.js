 var postId = 0
$("#like").on('click', function(event){
    event.preventDefault();
    var isLike = event.target.previousElementSibling == null;
    var token = $('input[name=_token]').val();
    //console.log(isLike);
    var urlLike = '{{ route("like") }}';
    postId =  event.target.parentNode.parentNode.dataset['postid'];

    $.ajax({
        method : 'POST',
        url: urlLike,
        data: {isLike: isLike, postid:postid, _token:token}
    })
    .done(function(){
        
    });
});