<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/logofin.png')); ?>" type="image/png">
    <title>👩‍💻💻 Darwinflocode 🖥👨‍💻 | Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <!-- Meta tag Keywords -->

    <!-- css files -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/login.css')); ?>" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- web-fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext"
        rel="stylesheet">
    <!-- //web-fonts -->
</head>

<body>

    <div class="main-bg">
        <!-- title -->
        <h1>¡Bienvenidos!</h1>
        <!-- //title -->
        <!---728x90--->

        <div class="sub-main-w3">
            <div class="image-style">

            </div>
            <!-- vertical tabs -->
            <div class="vertical-tab">
                <div id="section1" class="section-w3ls">
                    <input type="radio" name="sections" id="option1" checked>
                    <label for="option1" class="icon-left-w3pvt"><span class="fa fa-user-circle"
                            aria-hidden="true"></span>Login</label>
                    <article>
                        <form method="POST" action="<?php echo e(route('login')); ?> "autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <h3 class="legend">Login Here</h3>
                            <div class="input">
                                <span class="fa fa-envelope" aria-hidden="true"></span>
                                <input id="email" type="email"
                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                    value="<?php echo e(old('email')); ?>" placeholder="E-mail" required autofocus>

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="input">
                                <span class="fa fa-key" aria-hidden="true"></span>
                                <input id="password" type="password"
                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                    required autocomplete="current-password" placeholder="********">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button type="submit" class="btn submit">
                                <?php echo e(__('Login')); ?>

                            </button>
                        </form>
                    </article>
                </div>
              
            </div>
            <!-- //vertical tabs -->
            <div class="clear"></div>
        </div>
        <!---728x90--->
        <!-- copyright -->
        <div class="copyright">
            <h2>&copy; 2023 👩‍💻💻 Darwinflocode 🖥👨‍💻. All rights reserved | Design by
                <a href="#" target="_blank">DarwinFloCode</a>
            </h2>
        </div>
        <!-- //copyright -->
        <!---728x90--->
    </div>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\api\Laravel\laravelproyectweb\resources\views/login.blade.php ENDPATH**/ ?>