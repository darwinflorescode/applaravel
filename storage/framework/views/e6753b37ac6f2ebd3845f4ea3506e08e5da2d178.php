<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/logofin.png')); ?>" type="image/png">
    <title><?php echo $__env->yieldContent('tituloprincipal'); ?></title>
    <!-- style css link -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/prism.css')); ?>">

    <!-- fontawesome css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


<script src="<?php echo e(asset('assets/js/prism.js')); ?>"></script>

</head>

<body>

    <div class="componenteloader">
        <div class="container">
            <div class="ring"></div>
            <div class="ring"></div>
            <div class="ring"></div>
            <span class="loading">{ DarwinFloCode... }</span>
        </div>
    </div>
    <!-- header section start -->
    <header>
        <div class="header-container">
            <div class="header-wrapper">

                <div class="logoBox">
                    <a href="<?php echo e(route('web.home')); ?>" title="DarwinFloCode">
                        <img src="<?php echo e(asset('assets/img/logofin.png')); ?>" alt="logo">
                        <span class="spanname letra">DarwinFloCode&nbsp;&nbsp;<span>&#160;</span></span></a>
                </div>
                <div class="searchBox">
                    <form action="">
                        <input type="search" placeholder="Buscar...">
                        <i class="fas fa-search"></i>
                    </form>
                </div>

                <div class="iconBox2">
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-solid fa-bell" style="color: #161616;"></i></a>
                    <i id="theme-button" class="fa-solid fa-moon"></i>
                </div>
            </div>
        </div>
    </header>


    <!-- header section end -->
    <!-- home section start -->

    <main class="home">
        <div class="container">
            <div class="home-weapper">

                <!-- home left start here -->
                <div class="home-left">

                    <div class="profile">
                        <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="user">
                        <h3>Gratis</h3>
                    </div>
                    <div class="pages">
                        <h4 class="mini-headign">Cursos</h4>
                        <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('web.buscarcursos', encrypt($row->courses_views->id))); ?>"
                                title="<?php echo e($row->courses_views->title); ?>">
                                <label>
                                    <img src="<?php echo e(Storage::url('public/images/') . $row->courses_views->image); ?>"
                                        alt="<?php echo e($row->courses_views->title); ?>">
                                    <span><?php echo e($row->courses_views->title); ?></span>
                                </label>
                            </a>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h2 class="text-center text-secondary p-4">¡No se encontraron cursos agregados!</h2>
                        <?php endif; ?>

                        <button class="see-more-btn" title="See More"
                            onclick="javascript:window.location='<?php echo e(route('web.cursos')); ?>'">See more <i
                                class="fa-solid fa-magnifying-glass-arrow-right"></i></button>
                    </div>

                    <div class="group">
                        <h4 class="mini-headign">Artículos</h4>
                        <?php $__empty_1 = true; $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('web.buscartemas', encrypt($row->id))); ?>" title="<?php echo e($row->title); ?>">
                                <label>
                                    <img src="<?php echo e(Storage::url('public/images/') . $row->image); ?>"
                                        alt="<?php echo e($row->title); ?>">
                                    <span><?php echo e($row->title); ?></span>
                                </label>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h2 class="text-center text-secondary p-4">¡No se encontraron artículos agregados!</h2>
                        <?php endif; ?>

                        <button class="see-more-btn" title="See More"
                            onclick="javascript:window.location='<?php echo e(route('web.temas')); ?>'">See more <i
                                class="fa-solid fa-magnifying-glass-arrow-right"></i></button>


                    </div>
                </div><!-- home left end here -->

                <!-- home center start here -->

                <div class="home-center">
                    <div class="home-center-wrapper">
                        <div class="stories">
                            <h3 class="mini-headign"><?php echo $__env->yieldContent('titulocenter'); ?></h3>
                            <div class="stories-wrapper">
                                <?php echo $__env->yieldContent('contenidocentralsuperior'); ?>
                            </div>
                        </div>

                        <?php echo $__env->yieldContent('contenidotopicorcourse'); ?>

                    </div> <!-- home center wrapper end -->

                </div> <!-- home center end -->

                <div class="home-right">
                    <div class="home-right-wrapper">
                        <div class="event-friend">
                            <div class="event">
                                <h3 class="heading">Último video de Youtube <span>see all</span></h3>
                                <?php $__empty_1 = true; $__currentLoopData = $enlaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$fila): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <iframe src="<?php echo e($fila->youtube); ?>" title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                    
                                    <div class="event-date">
                                        <h3><?php echo e($fila->link_topics->updated_at->formatLocalized('%d')); ?>

                                            <b><?php echo e($fila->link_topics->updated_at->formatLocalized('%B')); ?></b>
                                        </h3>
                                        <h4>El Salvador
                                            <span><?php echo e($fila->link_topics->updated_at->translatedFormat('H:i:s a')); ?></span>
                                        </h4>
                                    </div>
                                    <button><i class="fa-regular fa-star"></i> Subscribete</button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <h2 class="text-center text-secondary p-4">¡No se encontró video de youtube!</h2>
                                <?php endif; ?>
                            </div>


                            <?php echo $__env->yieldContent('sectioncourseright'); ?>

                        </div>


                        <div class="messenger">
                            <div class="messenger-search">
                                <i class="fa-solid fa-box-open"></i>
                                <h4>Artículos Destacados</h4>
                                <input type="search" placeholder="Search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <ul>

                                <?php $__empty_1 = true; $__currentLoopData = $topics_article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $datos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li>
                                        <img src="<?php echo e(Storage::url('public/images/') . $datos->link_topics->image); ?>"
                                            alt="<?php echo e($datos->link_topics->title); ?>">
                                        <b><?php echo e($datos->link_topics->title); ?>

                                            <span><?php echo e($datos->link_topics->category_topics->title); ?> -
                                                <?php echo e($datos->link_topics->view); ?> views</span></b>
                                        <i class="fa-regular fa-eye"></i>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <h2 class="text-center text-secondary p-4">¡No se encontraron artículos destacados!
                                    </h2>
                                <?php endif; ?>


                            </ul>
                        </div>

                    </div><!-- home right wrapper end -->
                </div><!-- home right end -->






            </div>
        </div>
    </main>

    <footer>
        <p class="end">&copy; Copyright: <span>
                DarwinFloCode</span></p>
    </footer>

    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- home section end -->

    <script>
        /*==================== DARK LIGHT THEME ====================*/
        const themeButton = document.getElementById("theme-button");
        const darkTheme = "dark-color";
        const iconTheme = "fa-sun";

        // Previously selected topic (if user selected)
        const selectedTheme = localStorage.getItem("selectedtheme");
        const selectedIcon = localStorage.getItem("selectedicon");

        // We obtain the current theme that the interface has by validating the dark-theme class
        const getCurrentTheme = () =>
            document.body.classList.contains(darkTheme) ? "dark" : "light";
        const getCurrentIcon = () =>
            themeButton.classList.contains(iconTheme) ? "fa-moon" : "fa-sun";

        // We validate if the user previously chose a topic
        if (selectedTheme) {
            // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
            document.body.classList[selectedTheme === "dark" ? "add" : "remove"](
                darkTheme
            );
            themeButton.classList[selectedIcon === "fa-moon" ? "add" : "remove"](
                iconTheme
            );
        }

        // Activate / deactivate the theme manually with the button
        themeButton.addEventListener("click", () => {

            // Add or remove the dark / icon theme
            document.body.classList.toggle(darkTheme);
            themeButton.classList.toggle(iconTheme);
            // We save the theme and the current icon that the user chose
            localStorage.setItem("selectedtheme", getCurrentTheme());
            localStorage.setItem("selectedicon", getCurrentIcon());

        });
    </script>
    <script>
        window.addEventListener('load', () => {
            const contenedor_loader = document.querySelector('.componenteloader');
            contenedor_loader.style.opacity = 0;
            contenedor_loader.style.visibility = 'hidden';
        })
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\api\Laravel\darwinflocode\resources\views/webapp/app.blade.php ENDPATH**/ ?>