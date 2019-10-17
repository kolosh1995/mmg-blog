document.getElementById('comment').addEventListener('click', function () {
    let author = document.getElementById('author').value;
    let content = document.getElementById('content').value;
    let post_id = document.getElementById('post_id').value;
    $.ajax({
        type: "POST",
        url: "/comment",
        data: { author: author, content: content, post_id: post_id }
    }).done(function( data ) {
        location.reload()
    }).fail(function (error) {
        alert(error.responseText)
    });
});

