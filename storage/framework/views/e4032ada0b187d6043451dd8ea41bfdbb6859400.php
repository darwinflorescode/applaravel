
<?php $__currentLoopData = $cursoactivo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->startSection('tituloprincipal', $row->courses_views->title); ?>
    <?php $__env->startSection('tituloarticle', '👩‍💻💻 Darwinflocode 🖥👨‍💻 | ' . $row->courses_views->title); ?>
    <?php $__env->startSection('imgog', Storage::url('public/images/') . $row->courses_views->image); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startSection('contenidocentralsuperior'); ?>

    <?php $__empty_1 = true; $__currentLoopData = $cursoactivo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php $__env->startSection('titulocenter', 'Curso: ' . $row->courses_views->title); ?>
        <div class="cursoview">
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
                            <img src="<?php echo e(Storage::url('public/images/') . $row->courses_views->image); ?>"
                                alt="<?php echo e($row->courses_views->title); ?>">
                            <ul>
                                <li>
                                    <h3>Categoría: <?php echo e($row->courses_views->categories->title); ?> <span> .
                                            <?php echo e($row->courses_views->created_at->diffForHumans()); ?></span></h3>
                                </li>
                                <li><span>
                                        <?php echo e($row->courses_views->created_at->formatLocalized('%A %d %B %Y')); ?></span>
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
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h2 class="text-center text-secondary p-4">No post found in the database!</h2>
        <?php endif; ?>
    <?php $__env->stopSection(); ?>



    <?php $__env->startSection('contenidotopicorcourse'); ?>
        <h2>TEMAS DEL CURSO:</h2>
        <?php $__empty_1 = true; $__currentLoopData = $temascurso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <section class="fb-post1" id="topic-<?php echo e($row->topics_views->id); ?>">
                <div class="fb-post1-container">
                    <div class="fb-post1-header">
                        <ul>
                            <li class="active"><a class="activo" href="#topic-<?php echo e($row->topics_views->id); ?>"
                                    title="<?php echo e($row->topics_views->title); ?>"><?php echo e($row->topics_views->title); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="fb-p1-main">
                        <div class="post-title">
                            <img src="<?php echo e(Storage::url('public/images/') . $row->topics_views->image); ?>" alt="user picture">
                            <ul>
                                <li>
                                    <h3>Categoría: <?php echo e($row->topics_views->category_topics->title); ?> <span> .
                                            <?php echo e($row->topics_views->created_at->diffForHumans()); ?></span></h3>
                                </li>
                                <li><span>
                                        <?php echo e($row->topics_views->created_at->formatLocalized('%A %d %B %Y')); ?></span>
                                </li>
                            </ul>
                            <p>
                                <?php echo $row->topics_views->content; ?>


                                <pre>
                                    <code class="language-php line-numbers" >
                         echo "Hello"
                                    </code>
                                </pre>
                            </p>


                        </div>

                        <div class="post-images">
                            <div class="post-images1">
                                <img src="<?php echo e(Storage::url('public/images/') . $row->topics_views->image); ?>"
                                    alt="<?php echo e($row->topics_views->title); ?>">

                            </div>

                        </div>

                        <div class="post-icon">

                            
                            

                            
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
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h2 class="text-center text-secondary p-4">No found in the database!</h2>
        <?php endif; ?>

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('sectioncourseright'); ?>

    <hr>

    <div class="friend" id="friend">
        <h3 class="heading">Contenido del Curso:</h3>
        <?php
            $contar = count($temascurso);
        ?>
        <?php $__empty_1 = true; $__currentLoopData = $temascurso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <ul id="topic-<?php echo e($row->topics_views->id); ?>">
                <li><a href="#topic-<?php echo e($row->topics_views->id); ?>" title="<?php echo e($row->topics_views->title); ?>"><img
                            src="<?php echo e(Storage::url('public/images/') . $row->topics_views->image); ?>"
                            alt="<?php echo e($row->topics_views->title); ?>"></a></li>
                <li>
                    <b><a href="#topic-<?php echo e($row->topics_views->id); ?>" class="topic"
                            title="<?php echo e($row->topics_views->title); ?>"><?php echo e($contar-- . '. ' . $row->topics_views->title); ?></a></b>
                    <p><?php echo e($row->topics_views->category_topics->title); ?> - <?php echo e($row->topics_views->view); ?> views</p>
                </li>
                <span class="indicador"></span>
            </ul>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h2 class="text-center text-secondary p-4">No post found in the database!</h2>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('webapp.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\api\Laravel\laravelproyectweb\resources\views/web/buscarcurso.blade.php ENDPATH**/ ?>