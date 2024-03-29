

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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/plante.css">

    
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
                                <h2>detail de la plante</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#" id="nomP"></a></li>
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
                    <div class="section-tittle section-tittle2 mb-30" style="margin: 10px;">
                        <span>Informations de la plante :</span>

                       

                    </div>
                     <div> 
                    <button onClick="window.print()"  class="btn" >Print</button>
                </div>

               


                    <div class="col-md-4 mt-sm-30 listInfo" >
                            <ul class="unordered-list ">
                                <li> Id plante : <span id="idP"></span></li>
                                <li> Nom plante : <span id="nomP1"></span></li>
                                <li> longevite : <span id="longevite"></span></li>
                                <li> origine geographique : <span id="origine"></span></li>
                                <li> taille : <span id="taille"></span></li>
                                <li> famille : <span id="famille"></span></li>
                            
                            </ul>

                           
                           <button class="button" id="incbuttonlike" onclick="incrementlike()"><h7 id="incrementlike">11</h7> j'aime </button>

                           
                           <button class="button" id="incbuttondislike" onclick="incrementdislike()"><h7 id="incrementdislike">19</h7> je n'aime pas </button>
                          
                   
                    </div>
                    
                   

                </div>
                <div class="right-content">

                 <!-- img -->
                 <div class="right-img">
                        <img id="planteImage" src="<?php echo URLROOT ?>" alt="">
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- table start -->
        <section class="especeContainer">
            <form action="<?php echo URLROOT; ?>/especeC/afficherList" method="post" class="afficherespece">
               <input type="text" id="idE" name="idE" style="display: none;">
               <input class="genric-btn primary-border e-large" type="submit" value="Afficher espece " />  
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

    <!-- plante js -->
    <script src="<?php echo URLROOT ?>/public/js/detailplante.js"></script>

</body>

</html>