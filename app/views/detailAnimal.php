<?php if (!isset($_SESSION['id']))
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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/animated-headline.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/animaux.css">
</head>

<body>
    <!-- ? Preloader Start -->
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
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70">
                                <h2>detail de l'animal</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#" id="animalName"></a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <!--? About Area Start -->
        <section class="support-company-area fix pb-padding ">
            <div class="support-wrapper align-items-center">
                <div class="left-content">
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-30" style="margin-top: -30%;">
                        <span>Quelque détails sur l'animal :</span>
                    </div>

                    <div class="col-md-4 mt-sm-30 listInfo">
                        <ul class="unordered-list ">
                            <li> Id animal : <span id="idAnimal"></span></li>
                            <li> Nom Animal : <span id="nomAnimal"></span></li>
                            <li> Type Animal : <span id="typeAnimal"></span></li>
                            <li> Age Animal : <span id="ageAnimal"></span></li>
                            <li> Pays de l'animal : <span id="paysAnimal"></span></li>
                        </ul>
                    </div>
                    <div class="QRCodeContainer">
                        <i class="fas fa-qrcode iconQR"> Scan me :</i>
                        <img src="" id="QRCodePic" class="">
                    </div>
                </div>
                <div class="right-content">

                    <form action="<?php echo URLROOT; ?>/animauxC/SendEmail" id="formEmail" method="POST" class="form-container">
                        <h2> Merci pour tous vos réclamations</h2>
                        <div class="formCss">
                            <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" readonly />
                        </div>
                        <h4> vous recevrez un mail dés que votre réclamation est ajouté</h4>
                        <div class="formCss">
                            <input type="text" id="reclamation" name="reclamation" placeholder="écrire votre réclamation ici ..." />
                        </div>
                        <div class="errormsg" id="errormsg1"></div>
                        <br>
                        <button type="submit" class="btn header-btn" id="submit">Submit</button>

                    </form>

                    <!-- img -->
                    <div class="right-img">
                        <img id="animalImage" src="<?php echo URLROOT ?>" alt="">
                    </div>
                    <div class="support-img-cap text-center d-flex">
                        <div class="single-one">
                            <p>Statut de conservation:</p>
                        </div>
                        <div class="single-two">
                            <p id="status"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- comment affichage -->
            <section class="regimeContainer">
                <form action="<?php echo URLROOT; ?>/animauxC/afficherComment" method="post" class="afficherRegime">
                    <input type="text" id="animalID1" name="animalID1" style="display: none;">
                    <input class="button button-contactForm btn_1 boxed-btn" type="submit" value="Liste des commentaires " id="regimeButton"  />
                </form>

                <div class="comments-area" style="margin-left: 5%;">
                    <?php if (isset($data['commentNumber'])) {
                        echo $data['commentNumber'];
                    } ?>
                    <!-- number comments count-->
                    <div class="comment-list">
                        <?php if (isset($data['comment1'])) {
                            echo $data['comment1'];
                        } ?>
                    </div>
                </div>
            </section>
           
            <!-- end comment affichage -->
            <!-- comment form -->

            <div class="comment-form" style="margin-left: 15%;margin-right:15%;">
                <form class="form-contact comment_form" action="<?php echo URLROOT; ?>/animauxC/addComment" id="commentForm" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="écrire un Commentaire" required></textarea>
                            </div>
                        </div>

                    </div>
                    <textarea name="userName" id="userName" style="display: none;"><?php echo $_SESSION['username']; ?></textarea>

                    <textarea name="animalID" id="animalID"  style="display: none;">  </textarea>
                    <textarea name="imageUser" id="imageUser"  style="display: none;"><?php echo $_SESSION['image']; ?></textarea>
                    <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Ajouter Commentaire</button>
                    </div>
                </form>
            </div>
            <!-- comment form end-->
        </section>
        <!-- table start -->
        <section class="regimeContainer">
            <form action="<?php echo URLROOT; ?>/regimeC/afficherList" method="post" class="afficherRegime">
                <input type="text" id="idRegime" name="id" style="display: none;">
                <input class="genric-btn primary-border e-large" type="submit" value="Afficher régime " id="regimeButton" />
            </form>
            <div class="espace section-top-border">
                <?php if (isset($data['tab'])) {
                    echo $data['tab'];
                } ?>
            </div>
        </section>


    </main>
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
                                        <a href="<?php echo URLROOT ?>/Pages/index"><img src="<?php echo URLROOT ?>/public/assets/img/logo/logo2_footer.png" alt=""></a>
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
    <!-- Progress -->
    <script src="<?php echo URLROOT ?>/public/assets/js/jquery.barfiller.js"></script>

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

    <!-- animaux js -->
    <script src="<?php echo URLROOT ?>/public/js/detailAnimaux.js"></script>

</body>

</html>