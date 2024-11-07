document.getElementById('AddComment').addEventListener('submit', (Event) => {
    Event.preventDefault();
    const Form = Event.target;
    const Data = new FormData(Form);
    const FormAction = Form.getAttribute("action");
    const Method = Form.getAttribute("method") ?? "GET";

    axios({
        method: Method,
        url: FormAction,
        data: Data,
    })
        .then(response => {
            Swal.fire({
                title: 'Success!',
                text: 'Your Comment added successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                Form.reset();
                window.location.reload();
            });
        })
        .catch(error => {
            if (error.response && error.response.data.errors) {
                const errors = error.response.data.errors;

                if (errors.name) {
                    document.getElementById('error_comment').innerText = errors.name[0];
                }
            }
        });
});

$(document).ready(function() {
    $(document).on('click', '.commentEdit', function(e) {
        e.preventDefault();
        
        var commentId = $(this).data('id');
        var commentContent = $(this).data('comment');  

        Swal.fire({
            title: 'Edit Comment',
            input: 'textarea',
            inputLabel: 'Update your comment',
            inputValue: commentContent,  
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!';
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var updatedComment = result.value;

                axios.post(`/edit-comment/${commentId}`, {
                    comment: updatedComment
                })
                .then(response => {
                    Swal.fire({
                        title: 'Updated!',
                        text: response.data.message,
                        icon: 'success'
                    }).then(() => {
                        window.location.reload();
                    });
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: error.response.data.message || 'An error occurred!',
                        icon: 'error'
                    });
                });
            }
        });
    });


    $(document).on('click', '.commentDelete', function(e) {
        e.preventDefault();
        var commentId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`/delete-comment/${commentId}`)
                .then(response => {
                    Swal.fire({
                        title: 'Deleted!',
                        text: response.data.message,
                        icon: 'success'
                    }).then(() => {
                        window.location.reload(); 
                    });
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: error.response.data.message || 'An error occurred!',
                        icon: 'error'
                    });
                });
            }
        });
    });

    $(document).on('click', '.reply', function(e) {
        e.preventDefault();
        
        var commentId = $(this).data('id');
        var replyForm = `
            <form class="reply-form" method="post" action="/add-sub-comment" data-id="${commentId}">
                <div class="form-group">
                    <textarea name="sub_comment" class="form-control" placeholder="Your Reply*" required></textarea>
                </div>
                <div class="submit text-right">
                    <button type="submit" class="btn btn-style btn-primary">Post Reply</button>
                </div>
            </form>
        `;
        
        // Append the form inside the reply-form-container and show it
        $(`#reply-form-${commentId}`).html(replyForm).show();
    });

    // Handle reply form submission using axios
    $(document).on('submit', '.reply-form', function(e) {
        e.preventDefault();

        var commentId = $(this).data('id');
        var subComment = $(this).find('textarea[name="sub_comment"]').val();

        axios.post('/subcomment', {
            comment_id: commentId,
            comment: subComment
        })
        .then(response => {
            Swal.fire({
                title: 'Success!',
                text: response.data.message,
                icon: 'success'
            }).then(() => {
                // Reload the page to show the new sub-comment
                window.location.reload();
            });
        })
        .catch(error => {
            Swal.fire({
                title: 'Error!',
                text: error.response.data.message || 'An error occurred!',
                icon: 'error'
            });
        });
    });

    $(document).on('click', '.subCommentEdit', function(e) {
        e.preventDefault();
        
        var commentId = $(this).data('id');
        var commentContent = $(this).data('comment');  

        Swal.fire({
            title: 'Edit Comment',
            input: 'textarea',
            inputLabel: 'Update your comment',
            inputValue: commentContent,  
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to write something!';
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var updatedComment = result.value;

                axios.post(`/edit-subcomment/${commentId}`, {
                    comment: updatedComment
                })
                .then(response => {
                    Swal.fire({
                        title: 'Updated!',
                        text: response.data.message,
                        icon: 'success'
                    }).then(() => {
                        window.location.reload();
                    });
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: error.response.data.message || 'An error occurred!',
                        icon: 'error'
                    });
                });
            }
        });
    });


    $(document).on('click', '.subCommentDelete', function(e) {
        e.preventDefault();
        var commentId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post(`/delete-subcomment/${commentId}`)
                .then(response => {
                    Swal.fire({
                        title: 'Deleted!',
                        text: response.data.message,
                        icon: 'success'
                    }).then(() => {
                        window.location.reload(); 
                    });
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: error.response.data.message || 'An error occurred!',
                        icon: 'error'
                    });
                });
            }
        });
    });
});