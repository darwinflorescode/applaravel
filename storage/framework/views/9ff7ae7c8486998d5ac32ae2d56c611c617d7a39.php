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

    });



    $(function() {


        /* CARGAR SELECT */

        /*   function llenarSelectCategory() {
              $.get("<?php echo e(route('load.content')); ?>", function(data) {
                  $("#id_category").empty();
                  $("#id_category").append("<option value=''>Choose Category...</option>");
              let obj = ["hello","ues","byd"];
                  $.each(obj, function(key, value) {
                      $("#id_category").append("<option value='"+key+"'>"+value+"</option>");
                  });
              });
          }

          llenarSelectCategory(); */


        // fetch all category ajax request
        fetchAllTopics();

        function fetchAllTopics() {
            $.ajax({
                url: "<?php echo e(route('topic.fetchAll')); ?>",
                method: 'get',
                success: function(response) {
                    $("#show_all_topics").html(response);
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
                url: "<?php echo e(route('load.topic')); ?>",
                method: 'get',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
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


        $("#add_form_register").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);

            $("#add_form_btn").text('Adding...');
            $.ajax({
                url: "<?php echo e(route('topic.store')); ?>",
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
                        let id_category = document.querySelector(".errors-id_category");
                        id_category.textContent = response.id_category[0];
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

                        $("#add_form_btn").text('Add Topic');
                    }


                    if (response.status == 200) {
                        Swal.fire(
                            'Added!',
                            'Topic Added Successfully!',
                            'success'
                        );
                        fetchAllTopics();

                        $("#add_form_btn").text('Add Topic');
                        $('#contenido').summernote('reset');
                        $("#add_form_register")[0].reset();
                        /* $("#addcategory").modal('hide'); */
                    }

                }
            });
        });


        // delete course ajax request
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '<?php echo e(csrf_token()); ?>';
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
                        url: "<?php echo e(route('topic.deleted')); ?>",
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
                            fetchAllTopics();


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
                url: "<?php echo e(route('load.topic')); ?>",
                method: 'get',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    $("#titleedit").val(response.title);
                    $('#contenidoedit').summernote('code', response.content);
                    $("#statusedit").val(response.status);
                    $("#id_categoryedit").val(response.categorytopic_id);
                    $("#fotoeditview").html(
                        '<img src="../storage/images/' + response.image +
                        '" width="100" class="img-fluid img-thumbnail rounded circle">'
                    );
                    $("#idcategory").val(response.id);
                    $("#enlaceimg").val(response.image);
                }
            });
        });


        // update course ajax request
        $("#edit_form_register").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_form_btn").text('Updating...');
            $.ajax({
                url: "<?php echo e(route('topic.updated')); ?>",
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
                            'Topic Updated Successfully!',
                            'success'
                        )
                        fetchAllTopics();
                    }
                    $("#edit_form_btn").text('Update Topic');
                    $("#fotoedit").val(null);

                }
            });
        });


        function loadDatos(_id) {
            let id = _id;
            $("#edit_form_register_enlaces")[0].reset();
            $("#id_course_topic_").val(id);
            $("#id_enlaces").val(0);
            fetchAllEnlaces(id);
            $.ajax({
                url: "<?php echo e(route('load.content.enlaces')); ?>",
                method: 'get',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {

                    let id_enlaces = 0;
                    id_enlaces = response.id;
                    $("#id_course_topic_").val(response.topic_id);
                    $("#id_enlaces").val(response.id);
                    $("#article").val(response.topic_theme);
                    $("#youtube").val(response.youtube);
                    $("#facebook").val(response.facebook);
                    $("#twitter").val(response.twitter);
                    $("#tiktok").val(response.tiktok);
                    $("#github").val(response.github);
                    $("#pdf").val(response.pdf);
                    /* Llamar función fetchAllEnlaces */



                }
            });
        }

        // edit employee ajax request
        $(document).on('click', '.editeIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            loadDatos(id);
           
        });


        function fetchAllEnlaces(_id) {
            let id = _id;
            let csrf = '<?php echo e(csrf_token()); ?>';

            /* alert(id); */
            $.ajax({
                url: "<?php echo e(route('cargar.enlaces')); ?>",
                method: 'get',
                data: {
                    id: id,
                    _token: csrf
                },
                success: function(response) {
                    $("#show_all_enlaces").html(response);
                }
            });
        }



        // update course ajax request
        $("#edit_form_register_enlaces").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_form_btn_enlaces").text('Updating...');
            $.ajax({
                url: "<?php echo e(route('enlaces.store')); ?>",
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
                            'Links Updated Successfully!',
                            'success'
                        )
                        fetchAllEnlaces($("#id_course_topic_").val());
                        loadDatos($("#id_course_topic_").val());
                    }
                    $("#edit_form_btn_enlaces").text('Update Links');


                }
            });
        });

    });
</script>
<?php /**PATH C:\xampp\htdocs\api\Laravel\darwinflocode\resources\views/topic/script.blade.php ENDPATH**/ ?>