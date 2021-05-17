<?php
if (!isset($_SESSION['id']))
    header('location: ' . URLROOT . '/users/login');

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ZooPro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public/Images/logo.png" type="image/x-icon">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/hamburgers.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/profile.css">
    <style>
        input[value="Supprimer"] {
            color: red !important;
            border-color: red;
        }

        input[value="Supprimer"]:hover {
            background-color: red;
            color: white;
            border-color: red;
        }
    </style>
</head>
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="<?php echo URLROOT ?>/public/assets/img/logo/loder.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<?php
require APPROOT . '/views/includes/navigation.php';
?>
<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 pt-70">
                            <h2>Mon profile</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo URLROOT ?>/index">Acceuil</a></li>
                                    <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--?  Contact Area start  -->
    <section class="contact-section">
        <div class="container" style="display: flex;flex-direction: column;justify-content: center;align-items: center;margin-bottom: 50px;">
            <h2 class="contact-title">Photo de profile</h2>
            <form method="POST" action="<?php echo URLROOT; ?>/users/deleteUpdatePic" style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
                <div class="profilePic" style="background-image: url('<?php echo URLROOT; ?>/Images/<?php echo $_SESSION['image']; ?>');"></div>
                <div style="display: flex;flex-direction:column;justify-content: center;align-items: center;">
                    <label for="file" class="label-file">Choisir une image</label>
                    <input type="file" id="file" name="file" class="input-file" accept="image/x-png,image/gif,image/jpeg">
                </div>
                <div style="margin-top: 10px;display:flex;">
                    <input name="save" type="submit" class="button boxed-btn" value="Sauvegarder" style="margin-right: 1%;" />
                    <input name="delete" type="submit" class="button boxed-btn" value="Supprimer" style="margin-left: 1%;" />
                </div>
            </form>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <h2 class="contact-title">Mes informations</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="<?php echo URLROOT ?>/users/update" method="post">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input class="form-control valid" name="username" type="text" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" required>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <input class="form-control email-popup" name="email" id="subject" type="text" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" required>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="password" type="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-sm-8" style="color: red;" id="errorPop"><?php if (isset($data['error'])) {
                                                                                        echo $data['error'];
                                                                                    } ?></div>
                        </div>

                        <div class="form-group mt-3">
                            <input style='margin-bottom:50px;margin-right:15px;' type="submit" class="button button-contactForm boxed-btn" id="sauvegarderB" value="Sauvegarder" />
                            <input type="submit" class="button boxed-btn" name="delete" value="Supprimer" />
                        </div>
                    </form>
                </div>
                <div style="margin-top: -50px;" class="col-lg-3 offset-lg-1">
                    <div>
                        <h2 class="contact-title">Mot de passe</h2>
                    </div>
                    <form class="form-contact contact_form" action="<?php echo URLROOT ?>/users/updatePass" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="New Password" id="card-newPass" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="confirmPassword" type="password" placeholder="Confirm Password" id="card-confirmPass" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="oldPassword" type="password" placeholder="Old Password" required>
                                </div>
                            </div>
                            <div class="col-12" style="color: red;" id='error-msgPass'>
                                <?php if (isset($data['errorPass'])) {
                                    echo $data['errorPass'];
                                } ?>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn" id="card-changerPass">Changer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->
    <footer>
        <div class="footer-wrapper">
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container ">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-3 col-md-8 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-35">
                                        <a href="<?php echo URLROOT ?>/Pages/index"><img
                                                src="<?php echo URLROOT ?>/public/assets/img/logo/logo2_footer.png"
                                                alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>Air, terre et mer nous devons les protéger. Car Dame Nature, c'est notre
                                                liberté !</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                            <div class="single-footer-caption mb-50">

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Zoo</h4>
                                    <ul>
                                        <li><a href="<?php echo URLROOT ?>/Pages/index">Home</a></li>
                                        <li><a href="<?php echo URLROOT ?>/Pages/profile">Profile</a></li>
                                        <li><a href="<?php echo URLROOT ?>/animauxC/afficherList">Animaux</a></li>
                                        <li><a href="<?php echo URLROOT ?>/planteC/afficherList">Végétation</a></li>
                                        <li><a href="<?php echo URLROOT ?>/enclos/afficherList">Enclos</a></li>
                                        <li><a href="<?php echo URLROOT ?>/evenement/afficherList">Evenements</a></li>
                                        <li><a href="<?php echo URLROOT ?>/sponsor/afficherList">Sponsors</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-4">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contactez nous</h4>
                                    <ul>
                                        <li><a href="#">zooproresetpass@gmail.com</a></li>
                                        <li><a href="#">Hay Ghazela City</a></li>
                                        <li class="number"><a href="#">(+216) 71 205 167</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom area -->

            <!-- Footer End-->
        </div>
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
    <!-- JS here -->
    <script src="<?php echo URLROOT ?>/public/js/profile.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?php echo URLROOT ?>/public/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/popper.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?php echo URLROOT ?>/public/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="<?php echo URLROOT ?>/public/assets/js/wow.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/animated.headline.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="<?php echo URLROOT ?>/public/assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/waypoints.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="<?php echo URLROOT ?>/public/assets/js/contact.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.form.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/mail-script.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?php echo URLROOT ?>/public/assets/js/plugins.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/main.js"></script>

    </body>

</html>