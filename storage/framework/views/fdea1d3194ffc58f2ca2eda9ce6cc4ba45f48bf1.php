<hr>
<div class="friend">
    <h3 class="heading">Últimos Cursos Destacados</h3>
    <?php $__empty_1 = true; $__currentLoopData = $courses_ult; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <ul>
            <li>
                <a href="<?php echo e(route('web.buscarcursos', $row->courses_views->slug . '-' . $row->courses_views->id)); ?>"
                    title="<?php echo e($row->courses_views->title); ?>"><img
                        src="<?php echo e(Storage::url('public/images/') . $row->courses_views->image); ?>"
                        alt="<?php echo e($row->courses_views->title); ?>"></a>
            </li>
            <li>
                <b><a href="<?php echo e(route('web.buscarcursos', $row->courses_views->slug . '-' . $row->courses_views->id)); ?>"
                        title="<?php echo e($row->courses_views->title); ?>"><?php echo e($row->courses_views->title); ?></a></b>
                <p><?php echo e($row->courses_views->categories->title); ?> - <?php echo e($row->courses_views->view); ?> views</p>
            </li>
        </ul>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h2 class="text-center text-secondary p-4">No post found in the database!</h2>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\api\Laravel\laravelproyectweb\resources\views/web/cdestacado.blade.php ENDPATH**/ ?>