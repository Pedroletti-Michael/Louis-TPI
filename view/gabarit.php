<?php

/**
 * Contains everything "static" in the web pages (menu, footer, etc...)
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 09 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Modal and bootstrap stuff -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="assets/css/variables.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: ZenBlog - v1.0.0
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.php?action=home" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>ZenBlog</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <?php foreach ($categories as $category) { ?>
                                <li><a href="index.php?action=showCategory&cat=<?= $category[0] ?>"><?= $category[1] ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li><a href="index.php?action=contact">Contact</a></li>
                    <?php if ($_SESSION['admin']) { ?>
                        <li class="dropdown"><a href="#"><span>Administration</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="index.php?action=createArticle">Ajouter un article</a></li>
                                <li><a href="index.php?action=manageCategories">Gérer les catégories</a></li>
                                <li><a href="index.php?action=manageAuthors">Gérer les auteurs</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </nav><!-- .navbar -->

            <div class="position-relative">
                <?php if (!$_SESSION['name']) { ?>
                    <a href="#login" class="trigger-btn" data-toggle="modal">
                        <button type="button" class="btn btn-outline-dark">
                            <i class="bi-arrow-right-square-fill me-1"></i>
                            Se connecter
                        </button>
                    </a>
                <?php } else if ($_SESSION['admin'] == 0) { ?>
                    <a href="index.php?action=logout">
                        <button type="button" class="btn btn-outline-dark">
                            <i class="bi-arrow-right-square-fill me-1"></i>
                            Se déconnecter - <?= $_SESSION['name'] ?>
                        </button>
                    </a>
                <?php } else { ?>
                    <a href="index.php?action=logout">
                        <button type="button" class="btn btn-outline-dark">
                            <i class="bi-arrow-right-square-fill me-1"></i>
                            Se déconnecter - <?= $_SESSION['name'] ?> (adm)
                        </button>
                    </a>
                <?php } ?>
                <a href="#" class="mx-2 js-search-open"><span class=""></span></a>
                <i class=""></i>

                <!-- ======= Search Form ======= -->
                <div class="search-form-wrap js-search-form-wrap">
                    <form action="search-result.html" class="search-form">
                        <span class="icon bi-search"></span>
                        <input type="text" placeholder="Search" class="form-control">
                        <button class="btn js-search-close"><span class="bi-x"></span></button>
                    </form>
                </div><!-- End Search Form -->
            </div>
        </div>
        <?php if ($_SESSION['errorMessage']) : ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <div class="text-center">
                    <?= $_SESSION['errorMessage'] ?>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php unset($_SESSION['errorMessage']);
        endif; ?>
    </header><!-- End Header -->

    <!-- Modal Login -->
    <!-- Adapted from https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=elegant-modal-login-form-with-avatar-icon -->
    <div id="login" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Se connecter</h4>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=login" id="loginForm" method="post">
                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" name="login" placeholder="Login" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                        <br />
                        <div class="form-group">
                            <button class="btn btn-outline-dark login-btn g-recaptcha" data-sitekey="6LfzEeceAAAAANIpg2Cc_whPo9y8wHNak4f8xSZz" data-callback='onSubmit' data-action='submit'>Se connecter</button>
                        </div>
                        <a href="#register" class="trigger-btn" data-dismiss="modal" data-toggle="modal">Pas encore de compte? Créez-en un!</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->

    <!-- Modal register -->
    <!-- Adapted from https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=elegant-modal-login-form-with-avatar-icon -->
    <div id="register" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">S'enregistrer</h4>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=register" id="registerForm" method="post">
                        <div class="form-group">
                            <label for="text">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="username" placeholder="JohnDoe123" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse Email</label>
                            <input type="email" class="form-control" name="email" placeholder="example@domaine.com" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <label for="confirm">Confirmez le mot de passe</label>
                            <input type="password" class="form-control" name="confirm" placeholder="Password" required="required">
                        </div>
                        <br />
                        <div class="form-group">
                            <button class="btn btn-outline-dark login-btn g-recaptcha" data-sitekey="6LfzEeceAAAAANIpg2Cc_whPo9y8wHNak4f8xSZz" data-callback='onSubmit' data-action='submit'>S'enregistrer</button>
                        </div>
                        <a href="#login" class="trigger-btn" data-dismiss="modal" data-toggle="modal">Vous avez déjà un compte? Connectez-vous!</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->

    <main id="main">

        <!-- CONTENT -->
        <?= $content ?>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-legal">
            <div class="container">

                <div class="row justify-content-between">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <div class="copyright">
                            © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </footer>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>