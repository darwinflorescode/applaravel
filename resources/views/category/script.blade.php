<script>
/* CARGAR SUMMERNOTE */
$(document).ready(function() {
    $('#contenido').summernote({
        placeholder: 'Describe the Content',
        height: 100,
        imageAttributes: {
            icon: '<i class="note-icon-pencil"/>',
            figureClass: 'figureClass',
            figcaptionClass: 'captionClass',
            captionText: 'Caption Goes Here.',
            manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
        },
        lang: 'en-US',
        popover: {
            image: [
                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']], ,
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['custom', ['imageAttributes']],
            ],
        },

    });

    $('#contenidoedit').summernote({
        placeholder: 'Describe the Content',
        height: 400,
        codemirror: { // codemirror options
            mode: 'text/html',
            htmlMode: true,
            lineNumbers: true,
            theme: 'monokai'
        },
        imageAttributes: {
            icon: '<i class="note-icon-pencil"/>',
            figureClass: 'figureClass',
            figcaptionClass: 'captionClass',
            captionText: 'Caption Goes Here.',
            manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
        },
        lang: 'en-US',
        popover: {
            image: [
                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']], ,
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['custom', ['imageAttributes']],
            ],
        },

    });

});



$(function() {
    // fetch all category ajax request
    fetchAllCategory();

    function fetchAllCategory() {
        $.ajax({
            url: "{{ route('fetchAll') }}",
            method: 'get',
            success: function(response) {
                $("#show_all_categories").html(response);
                $("table").DataTable({
                    order: [0, 'desc']
                });
            }
        });
    }



    // View Category ajax request
    $(document).on('click', '.viewIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');

        $.ajax({
            url: "{{ route('load.content') }}",
            method: 'get',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {

                $("#viewInfo").html(
                    '<div>' + response.content + '</div>'
                );
                $("#title-view").html(
                    '<span>' + response.title + '</span>'
                );


            }

        });
    });

    // add new category ajax request


    $("#add_category_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);

        $("#add_category_btn").text('Adding...');
        $.ajax({
            url: "{{ route('store') }}",
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                console.log(response)
                if (response.alerta == "danger") {
                    let title = document.querySelector(".errors-title");
                    title.textContent = response.title[0];
                    let contenido = document.querySelector(".errors-contenido");
                    contenido.textContent = response.contenido[0];
                    let status = document.querySelector(".errors-status");
                    status.textContent = response.status[0];
                    let foto = document.querySelector(".errors-foto");
                    foto.textContent = response.foto[0];
                    let badge = document.querySelectorAll(".badge");
                    badge.forEach(span => {
                        span.style.display = "block"
                        span.style.textAlign = "left";
                    });
                    setTimeout(() => {
                        badge.forEach(span => {
                            span.style.display = "none";
                        });
                    }, 3000);

                    $("#add_category_btn").text('Add Category');
                }


                if (response.status == 200) {
                    Swal.fire(
                        'Added!',
                        'Category Added Successfully!',
                        'success'
                    );
                    fetchAllCategory();
                    $("#add_category_btn").text('Add Category');
                    $('#contenido').summernote('reset');
                    $("#add_category_form")[0].reset();
                    /* $("#addcategory").modal('hide'); */
                }

            }
        });
    });


    // delete employee ajax request
    $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
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
                $.ajax({
                    url: "{{ route('delete') }}",
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        fetchAllCategory();


                    }
                });
            }
        })
    });

    // edit employee ajax request
    $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            url: "{{ route('load.content') }}",
            method: 'get',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $("#titleedit").val(response.title);
                $('#contenidoedit').summernote('code', response.content);
                $("#statusedit").val(response.status);
                $("#fotoeditview").html(
                    '<img src="../storage/images/' + response.image +
                    '" width="100" class="img-fluid img-thumbnail rounded circle">'
                );
                $("#idcategory").val(response.id);
                $("#enlaceimg").val(response.image);
            }
        });
    });


    // update employee ajax request
    $("#edit_category_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_category_btn").text('Updating...');
        $.ajax({
            url: "{{ route('update') }}",
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    Swal.fire(
                        'Updated!',
                        'Category Updated Successfully!',
                        'success'
                    )
                    fetchAllCategory();
                }
                $("#edit_category_btn").text('Update Category');
                $("#fotoedit").val(null);

            }
        });
    });
});
</script>