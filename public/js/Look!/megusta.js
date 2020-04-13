 var postId = 0
$("#like").on('click', function(event){
    //console.log(e);
    event.preventDefault();
    postId =  event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method : 'POST',
        url: urlLike,
        data: {isLike: isLike, postid:postid, _token:token}
    })
    .done(function(){
        
    });
});