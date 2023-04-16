<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="<?php echo e(asset('uploads/16691543230.png')); ?>" type="image/x-icon">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
         <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
   

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
   

       <!-- Summernote JS - CDN Link -->
       <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    
    <script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
    <!-- Step 5 -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/stilocode.css')); ?>" >
    <title><?php echo $__env->yieldContent('title'); ?></title>

    
    <style type="text/css">
        .ui-autocomplete-row
        {
          padding:8px;
          background-color: #fdf8f8;
          border-bottom:1px solid #ccc;
          font-weight:900;
       
        }
        .ui-autocomplete-row:hover
        {
          background-color: rgb(176, 233, 243);
        }
      </style>
</head>

<body class="bg-light">
    
    <header class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark text-center text-white" style="background-color: #08355E;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Darwin System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo e(route('category.course')); ?>">Category Course</a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route('categorytopic.course')); ?>">category
                                        Topics</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Course
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo e(route('topic')); ?>">Manage
                                        Topic</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('course')); ?>">Manage Course</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="<?php echo e(route('web.home')); ?>">Web</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Example
                    </span>
                </div>
            </div>
        </nav>
    </header>

    <main class="p-5">
        <?php echo $__env->yieldContent('contenttable'); ?>
        
        <?php echo $__env->yieldContent('modal'); ?>
    </main>

    <?php echo $__env->yieldContent('scripts'); ?>
    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #0a4275;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: CTA -->
            <section class="">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">Bienvenido!</span>
                    <button type="button" class="btn btn-outline-light btn-rounded">
                        Registrate!
                    </button>
                </p>
            </section>
            <!-- Section: CTA -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="#">Darwin Flores</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

</html>
<?php /**PATH C:\xampp\htdocs\api\Laravel\darwinflocode\resources\views/adminapp/app.blade.php ENDPATH**/ ?>