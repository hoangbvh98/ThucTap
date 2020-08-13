$(document).ready(function() {

    tinymce.init({
        selector: '#editor',
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat fullscreen',
        init_instance_callback: function(editor) {
            tinyInstance = editor
        },
    });
    $(".add-comment-btn").click(function() {
        $.post({
            url: '/ThucTap/public/comments',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                content: $('.comment-content').val(),
                postId: $('#post-id').val()
            },
            dataType: 'json',
            success: function(res) {
                let comment = ` <div class="comment-item">
                                    <img src="http://localhost/ThucTap/public/image/download.jpg" class="avatar" alt="">
                                    <div class="comment-item__body">
                                        <p class="user-create"><strong>` + res.data.userFullName + `</strong><small class="creat">Vừa xong</small></p>
                                        <p class="content">
                                            ` + res.data.content_comment + `
                                        </p>
                                    </div>
                                </div>`
                $('.comment-content').val("")
                $('.list-comment').prepend(comment);
            }
        })
    });
    setTimeout(() => {
        $('.alert').hide();
    }, 7000);
});