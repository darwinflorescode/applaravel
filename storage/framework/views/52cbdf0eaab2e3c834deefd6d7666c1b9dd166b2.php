<script>
    $(function() {

        fetchAllCourseTopic();

        function fetchAllCourseTopic() {
            let id = $("#id_courses").val();
            let csrf = '<?php echo e(csrf_token()); ?>';
            /* 
                        alert(id); */
            $.ajax({
                url: "<?php echo e(route('courses-topic.fetchAll')); ?>",
                method: 'get',
                data: {
                    id: id,
                    _token: csrf
                },
                success: function(response) {
                    $("#show_all_courses_topic").html(response);
                    $("table").DataTable({
                        order: [0, 'desc']
                    });
                }
            });
        }


        // add new category ajax request


        $("#add_form_register").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_form_btn").text('Adding...');
            $.ajax({
                url: "<?php echo e(route('topic.store.course')); ?>",
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if (response.alerta == "danger") {
                        let id_topic = document.querySelector(".errors-id_topic");
                        id_topic.textContent = response.id_topic[0];
                        let badge = document.querySelectorAll(".error");
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
                            'information'
                        );
                        fetchAllCourseTopic();

                        $("#add_form_btn").text('Add Topic');
                        $("#add_form_register")[0].reset();
                        /* $("#addcategory").modal('hide'); */
                    }


                    if (response.status == 100) {
                        Swal.fire(
                            'Existe!',
                            'Topic found!',
                            'warning'
                        );
                    }

                }
            });
        }); /* FIN GUARDAR COURSE TOPIC */


        // delete topic course ajax request
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
                        url: "<?php echo e(route('topic.course.deleted')); ?>",
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
                            fetchAllCourseTopic();


                        }
                    });
                }
            })
        });

    });



    $(document).ready(function() {

        $('#search_data').autocomplete({


            source: "<?php echo e(route('course-search')); ?>",
            minLength: 1,
            select: function(event, ui) {
                $('#id_topic').val(ui.item.idcurso);
                /*      alert(ui.item.idcurso); */
            }
        }).data('ui-autocomplete')._renderItem = function(ul, item) {
            $('#id_topic').val('');
            return $("<li class='ui-autocomplete-row'></li>")
                .data("item.autocomplete", item)
                .append(item.label)
                .appendTo(ul);
        };

    });
</script>
<?php /**PATH C:\xampp\htdocs\api\Laravel\laravelproyectweb\resources\views/topic-course/script.blade.php ENDPATH**/ ?>