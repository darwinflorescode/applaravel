<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#3700ec">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/logofin.png')); ?>" type="image/png">
    <title>👩‍💻💻 Darwinflocode 🖥👨‍💻 | <?php echo $__env->yieldContent('tituloprincipal'); ?></title>
    <link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>">

    <meta property="og:title" content="<?php echo $__env->yieldContent('tituloarticle'); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('imgog'); ?>">
    <meta property="og:type" content="article">
    <meta property="og:description" content="<?php echo $__env->yieldContent('tituloarticle'); ?>">
    <meta property="og:url" content="<?php echo e(Request::fullUrl()); ?>">

    <meta property="twitter:url" content="<?php echo e(Request::fullUrl()); ?>">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:creator" content="@darwinflocode">
    <meta property="twitter:title" content="<?php echo $__env->yieldContent('tituloarticle'); ?>">
    <meta property="twitter:description" content="<?php echo $__env->yieldContent('tituloarticle'); ?>">
    <meta property="twitter:image" content="<?php echo $__env->yieldContent('imgog'); ?>">

    <!-- PRELOAD -->
    <link rel="preload" href="<?php echo e(asset('assets/css/style.css')); ?>" as="style">
    <link rel="preload" href="<?php echo e(asset('assets/css/prism.css')); ?>" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        as="style">
    <link rel="preload" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" as="style">
    <link rel="preload" href="<?php echo e(asset('assets/css/updated.css')); ?>" as="style">
    <link rel="preload" href="https://code.jquery.com/jquery-3.6.0.js" as="script">
    <link rel="preload" href="https://code.jquery.com/ui/1.13.2/jquery-ui.js" as="script">
    <link rel="preload" href="<?php echo e(asset('assets/js/prism.js')); ?>" as="script">
    <link rel="preload" href="<?php echo e(asset('assets/js/main.js')); ?>" as="script">
    <link rel="preload" href="<?php echo e(asset('assets/js/script.js')); ?>" as="script">
    <link rel="preload" href="<?php echo e(asset('assets/js/search.js')); ?>" as="script">

    <!-- style css link -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/prism.css')); ?>">

    <!-- fontawesome css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jQUERY UI css link -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/updated.css')); ?>">
    <!-- home section end -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body>
    <div id="mensaje">
    </div>
    <div class="componenteloader">

        <div class="container">
            <div class="ring"></div>
            <div class="ring"></div>
            <div class="ring"></div>
            <span class="loading">{ DarwinFloCode... }</span>
        </div>
    </div>
    <div class="scroll-line"></div>
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
                    <form action="" autocomplete="off">
                        <input type="hidden" name="id_topic" id="id_topic">
                        <input type="hidden" name="id_courses" id="id_courses" value="">
                        <input type="text" required class="form-control" id="search_data"
                            placeholder="Buscar...">
                        <i class="fas fa-search"></i>
                    </form>
                </div>

                <div class="iconBox2">
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                   
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
                        <h3>Cursos Free</h3>
                    </div>
                    <div class="pages">
                        <h4 class="mini-headign">Cursos</h4>
                        <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('web.buscarcursos', $row->courses_views->slug . '-' . $row->courses_views->id)); ?>"
                                title="<?php echo e($row->courses_views->title); ?>">
                                <label>
                                    <img src="<?php echo e(Storage::url('public/images/') . $row->courses_views->image); ?>"
                                        alt="<?php echo e($row->courses_views->title); ?>">
                                    <span
                                        id="<?php echo e(route('web.buscarcursos', $row->courses_views->slug . '-' . $row->courses_views->id)); ?>"><?php echo e($row->courses_views->title); ?></span>
                                </label>
                            </a>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h2 class="text-center text-secondary p-4">¡No se encontraron cursos agregados!</h2>
                        <?php endif; ?>

                        <button class="see-more-btn" id="btncurso" title="See More"
                            onclick="javascript:window.location='<?php echo e(route('web.cursos')); ?>'">See more <i
                                class="fa-solid fa-magnifying-glass-arrow-right"></i></button>
                    </div>

                    <div class="group">
                        <h4 class="mini-headign">Artículos</h4>
                        <?php $__empty_1 = true; $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('web.buscartemas', $row->slug . '-' . $row->id)); ?>"
                                title="<?php echo e($row->title); ?>">
                                <label>
                                    <img src="<?php echo e(Storage::url('public/images/') . $row->image); ?>"
                                        alt="<?php echo e($row->title); ?>">
                                    <span id="<?php echo e(route('web.buscartemas', $row->slug . '-' . $row->id)); ?>"
                                        class=""><?php echo e($row->title); ?></span>
                                </label>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h2 class="text-center text-secondary p-4">¡No se encontraron artículos agregados!</h2>
                        <?php endif; ?>

                        <button class="see-more-btn" id="btntema" title="See More"
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
                                    
                                    
                                    <div class="event-date">
                                        <h3><?php echo e($fila->link_topics->created_at->formatLocalized('%d')); ?>

                                            <b><?php echo e($fila->link_topics->created_at->formatLocalized('%B')); ?></b>
                                        </h3>
                                        <h4>El Salvador
                                            <span><?php echo e($fila->link_topics->created_at->translatedFormat('H:i:s a')); ?></span>
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
                                <input type="search" id="searchtopic" placeholder="Buscar Artículos">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <ul>

                                <?php $__empty_1 = true; $__currentLoopData = $topics_article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $datos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li>
                                        <a
                                            href="<?php echo e(route('web.buscartemas', $datos->link_topics->slug . '-' . $datos->link_topics->id)); ?>"><img
                                                src="<?php echo e(Storage::url('public/images/') . $datos->link_topics->image); ?>"
                                                alt="<?php echo e($datos->link_topics->title); ?>"></a>
                                        <a
                                            href="<?php echo e(route('web.buscartemas', $datos->link_topics->slug . '-' . $datos->link_topics->id)); ?>"><b><?php echo e($datos->link_topics->title); ?>

                                                <span><?php echo e($datos->link_topics->category_topics->title); ?> -
                                                    <?php echo e($datos->link_topics->view); ?> views</span></b></a>
                                        <a
                                            href="<?php echo e(route('web.buscartemas', $datos->link_topics->slug . '-' . $datos->link_topics->id)); ?>"><i
                                                class="fa-regular fa-eye"></i></a>
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


    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/prism.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            let slug = "";

            $("#search_data").autocomplete({
                source: "<?php echo e(route('web.buscarview')); ?>",
                minLength: 1,
                select: function(event, ui) {
                    $("#id_topic").val(ui.item.idcurso);

                    if ($("#id_topic").val() > "") {
                        slug = ui.item.slug + "-" + ui.item.idcurso;
                        var url = "<?php echo e(route('web.buscarcursos', ':slug')); ?>";
                        url = url.replace(":slug", slug);
                        location.href = url;
                    }
                },
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                $("#id_topic").val("");
                return $("<li class='ui-autocomplete-row'></li>")
                    .data("item.autocomplete", item)
                    .append(item.label)
                    .appendTo(ul);
            };

            $("#searchtopic").autocomplete({
                source: "<?php echo e(route('web.topicsviewssearch')); ?>",
                minLength: 1,
                select: function(event, ui) {
                    $("#id_topic").val(ui.item.idcurso);

                    if ($("#id_topic").val() > "") {
                        slug = ui.item.slug + "-" + ui.item.idcurso;
                        var url = "<?php echo e(route('web.buscartemas', ':slug')); ?>";
                        url = url.replace(":slug", slug);
                        location.href = url;
                    }
                },
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                $("#id_topic").val("");
                return $("<li class='ui-autocomplete-row'></li>")
                    .data("item.autocomplete", item)
                    .append(item.label)
                    .appendTo(ul);
            };


            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
            $(".pages a span").each(function() {
                if (this.id === path) {
                    $(this).addClass("activo");
                }
            });

            $(".group a span").each(function() {
                if (this.id === path) {
                    $(this).addClass("activo");
                }
            });

            let url = "<?php echo e(Request::root() . '/cursos'); ?>";
            if (path === url) {
                $("#btncurso").addClass("backcolor");
                $("#btncurso").text("Todos los Cursos");
            }

            url = "<?php echo e(Request::root() . '/temas'); ?>";
            if (path === url) {
                $("#btntema").addClass("backcolor");
                $("#btntema").text("Todos los Artículos");
            }
        });
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\api\Laravel\laravelproyectweb\resources\views/webapp/app.blade.php ENDPATH**/ ?>