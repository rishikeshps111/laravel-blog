document.getElementById('EditBlog').addEventListener('submit', (Event) => {
    Event.preventDefault();
    const Form = Event.target;
    const Data = new FormData(Form);
    const FormAction = Form.getAttribute("action");
    const Method = Form.getAttribute("method") ?? "GET";

    const inputFile = document.getElementById('image');
    const file = inputFile.files[0];

    Data.append('file', file);

    console.log(Data);

    axios({
        method: Method,
        url: FormAction,
        data: Data,
        // headers: Headers,
    })
        .then(response => {
            Swal.fire({
                title: 'Success!',
                text: 'Your blog has been Updated successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                // window.location.href = "{{ route('blog.index') }}";
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

// const quill = new Quill('#editor', {
//     theme: 'snow'
//   });