$(document).ready(function () {
    var postId = -1;
    var postBodyElement = null;

    $('.post').find('.interaction').find('.post-edit').on('click', function (event) {
        event.preventDefault();

        var parent = event.target.parentNode.parentNode;
        var children = parent.childNodes;

        var postBody = null;
        var day = null;

        postId = parent.dataset['postid'];

        $.each(children, function (index, value) {
            if(value.className == 'post-body'){
                postBody = value.textContent;
                postBodyElement = value;
            }
            if(value.className == 'day'){
                day = value.lastChild.textContent;
            }
        });
        $('#post-day').val(day);
        $('#post-body').val(postBody);
        $('#edit-post-modal').modal();
    });

    $('#modal-save').on('click', function () {
        $(postBodyElement).text($('#post-body').val());

        if(postId >= 0){
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    postId: postId,
                    day: $('#post-day').val(),
                    body: $('#post-body').val(),
                    _token: token
                }
            }).done(function (msg) {
                $(postBodyElement).text(msg['new_body']);
                $('#edit-post-modal').modal('hide');
            })
        }
    })
});
