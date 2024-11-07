document.querySelectorAll('.delete-blog').forEach(function(deleteButton) {
    deleteButton.addEventListener('click', function (e) {
        e.preventDefault();
        const blogId = this.getAttribute('data-id');
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
                document.getElementById(`delete-form-${blogId}`).submit();
            }
        });
    });
});