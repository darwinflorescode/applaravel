
<?php $__env->startSection('titulocenter', 'Últimos Artículos'); ?>
<?php $__env->startSection('tituloprincipal', '¡Bienvenidos!'); ?>
<?php $__env->startSection('contenidocentralsuperior'); ?>

    <?php $__empty_1 = true; $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="single-stories">
            <label><img src="<?php echo e(Storage::url('public/images/') . $row->link_topics->category_topics->image); ?>"
                    alt="<?php echo e($row->link_topics->category_topics->title); ?>"></label>
            <div>
                <a href="<?php echo e(route('web.buscartemas', $row->slug . '-' . $row->id)); ?>" title="<?php echo e($row->link_topics->title); ?>">
                    <img src="<?php echo e(Storage::url('public/images/') . $row->link_topics->image); ?>"
                        alt="<?php echo e($row->link_topics->title); ?>"></a>

                <b><?php echo e($row->link_topics->title); ?></b>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h2 class="text-center text-secondary p-4">¡No se encontraron artículos agregados!</h2>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenidotopicorcourse'); ?>
    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="fb-post1">
            <div class="fb-post1-container">
                <div class="fb-post1-header">
                    <ul>
                        <li class="active"><a
                                href="<?php echo e(route('web.buscarcursos', $row->courses_views->slug . '-' . $row->courses_views->id)); ?>"
                                title="<?php echo e($row->courses_views->title); ?>"><?php echo e($row->courses_views->title); ?></a></li>
                    </ul>
                </div>
                <div class="fb-p1-main">
                    <div class="post-title">
                        <img src="<?php echo e(Storage::url('public/images/') . $row->courses_views->image); ?>" alt="user picture">
                        <ul>
                            <li>
                                <h3>Categoría: <?php echo e($row->courses_views->categories->title); ?> <span> .
                                        <?php echo e($row->courses_views->updated_at->diffForHumans()); ?></span></h3>
                            </li>
                            <li><span>
                                    <?php echo e($row->courses_views->updated_at->formatLocalized('%A %d %B %Y')); ?></span>
                            </li>
                        </ul>
                        <p>
                            <?php echo $row->courses_views->content; ?>

                        </p>

                    </div>

                    <div class="post-images">
                        <div class="post-images1">
                            <img src="<?php echo e(Storage::url('public/images/') . $row->courses_views->image); ?>"
                                alt="<?php echo e($row->courses_views->title); ?>">

                        </div>

                    </div>

                    <div class="post-icon">

                        
                        <?php if($row->link != ''): ?>
                            <a href="<?php echo e($row->link); ?>" target="_blank">
                                <i class="fa-solid fa-globe" data-title="Ver Ejemplo."></i>
                            </a>
                        <?php endif; ?>

                        
                        <?php if($row->youtube != ''): ?>
                            <a href="<?php echo e($row->youtube); ?>" target="_blank">
                                <i class="fa-brands fa-youtube" data-title="Ver video en Youtube"></i>
                            </a>
                        <?php endif; ?>


                        
                        <?php if($row->github != ''): ?>
                            <a href="<?php echo e($row->github); ?>" target="_blank">
                                <i class="fa-brands fa-github" data-title="Código Fuente"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if($row->facebook != ''): ?>
                            <a href="<?php echo e($row->facebook); ?>" target="_blank">
                                <i class="fa-brands fa-facebook" data-title="Ver artículo en facebook"></i>
                            </a>
                        <?php endif; ?>

                        
                        <?php if($row->twitter != ''): ?>
                            <a href="<?php echo e($row->twitter); ?>" target="_blank">
                                <i class="fa-brands fa-twitter" data-title="Ver artículo en Twitter"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if($row->tiktok != ''): ?>
                            <a href="<?php echo e($row->tiktok); ?>" target="_blank">
                                <i class="fa-brands fa-tiktok" data-title="Ver artículo en Tiktok"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php if($row->pdf != ''): ?>
                            <a href="<?php echo e($row->pdf); ?>" target="_blank">
                                <i class="fa-solid fa-file-pdf" data-title="Ver Documento PDF"></i>
                            </a>
                        <?php endif; ?>



                        <div class="like-comment">
                            <ul>
                                <li><i class="fa-regular fa-eye"></i> <span><?php echo e($row->view); ?>

                                        Views</span> </li>
                                <li><i class="fa-solid fa-download"></i>
                                    <span><?php echo e($row->download); ?> Download</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h2 class="text-center text-secondary p-4">¡No se encontraron cursos agregados!</h2>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('sectioncourseright'); ?>
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
            <h2 class="text-center text-secondary p-4">¡No se encontraron cursos destacados!</h2>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('webapp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\api\Laravel\laravelproyectweb\resources\views/web/home.blade.php ENDPATH**/ ?>