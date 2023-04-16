<?php $__env->startSection('title', 'Manage Topic Course'); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('topic-course.modales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenttable'); ?>

    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-primary d-flex justify-content-between align-items-center"
                    style="background-color: rgb(106, 4, 141) !important">
                    <h3 class="text-light"><?php echo $__env->yieldContent('title'); ?> - "<?php echo e($courses->title); ?> - <?php echo e($courses->categories->title); ?>"
                    </h3>

                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('topic.store.course')); ?>" method="post" id="add_form_register">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-2">
                            <input type="hidden" name="id_topic" id="id_topic">
                            <input type="hidden" name="id_courses" id="id_courses" value="<?php echo e($courses->id); ?>">
                            <input type="text" required class="form-control" id="search_data" placeholder="Buscar">
                            <br><span class="error badge text-danger errors-id_topic"></span>
                        </div>
                        <div class="row">

                            <div class="col-md-10 text-right">
                                <button type="submit" id="btn_add_topic" class="btn btn-primary">ADD TOPIC</button>
                            </div>
                            <div class="col-md-2">
                                <button type="reset" class="btn btn-secondary">LIMPIAR</button>
                            </div>

                        </div>
                    </form>

                    <hr>
                    <div id="show_all_courses_topic">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('topic-course.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminapp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\api\Laravel\laravelproyectweb\resources\views/topic-course/index.blade.php ENDPATH**/ ?>