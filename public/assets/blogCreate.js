document.getElementById('CreateBlog').addEventListener('submit', (Event) => {
    Event.preventDefault();
    const Form = Event.target;
    const Data = new FormData(Form);
    const FormAction = Form.getAttribute("action");
    const Method = Form.getAttribute("method") ?? "GET";

    const inputFile = document.getElementById('image');
    const file = inputFile.files[0];

    Data.append('file', file);

    axios({
        method: Method,
        url: FormAction,
        data: Data,
        // headers: Headers,
    })
        .then(response => {
            Swal.fire({
                title: 'Success!',
                text: 'Your blog has been created successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                Form.reset();
            });
        })
        .catch(error => {
            if (error.response && error.response.data.errors) {
                const errors = error.response.data.errors;

                if (errors.name) {
                    document.getElementById('error_name').innerText = errors.name[0];
                }
                if (errors.content) {
                    document.getElementById('error_content').innerText = errors.content[0];
                }
                if (errors.author) {
                    document.getElementById('error_author').innerText = errors.content[0];
                }
                if (errors.date) {
                    document.getElementById('error_date').innerText = errors.content[0];
                }
                if (errors.image) {
                    document.getElementById('error_image').innerText = errors.content[0];
                }
            }
        });
});

document.getElementById('delete-blog').addEventListener('click', function (e) {
    e.preventDefault();
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
            document.getElementById('delete-form').submit();
        }
    });
});
// const quill = new Quill('#editor', {
//     theme: 'snow'
//   });