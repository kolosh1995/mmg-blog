document.getElementById('comment').addEventListener('click', function () {
    let author = document.getElementById('author').value;
    let content = document.getElementById('content').value;
    let commentable_id = document.getElementById('commentable_id').value;
    let commentable_type = document.getElementById('commentable_type').value;
    $.ajax({
        type: "POST",
        url: "/comment",
        data: { author: author, content: content, commentable_id: commentable_id, commentable_type: commentable_type }
    }).done(function( data ) {
        location.reload()
    }).fail(function (error) {
        alert(error.responseText)
    });
});

