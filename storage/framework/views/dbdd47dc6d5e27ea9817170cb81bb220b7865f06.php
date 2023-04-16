<?php $__env->startSection('title', 'Manage Category Topic'); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('categorytopic.modales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenttable'); ?>

    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-success d-flex justify-content-between align-items-center">
                    <h3 class="text-light"><?php echo $__env->yieldContent('title'); ?></h3>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addcategory"><i
                            class="bi-plus-circle me-2"></i>Add New Category Topic</button>
                </div>
                <div class="card-body" id="show_all_categories">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php echo $__env->make('categorytopic.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminapp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\api\Laravel\laravelproyectweb\resources\views/categorytopic/index.blade.php ENDPATH**/ ?>