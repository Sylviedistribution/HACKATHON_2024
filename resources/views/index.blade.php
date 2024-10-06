<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>AHBROS</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
          media="screen">
</head>

<body>
<!-- header section start -->
<div class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="logo"><a href="index"><img style="width:23%" src="images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("index")}}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("data")}}">Données</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("quiz.index")}}">Jeu</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{route("register")}}">S'inscrire</a>
                </form>

            </div>
        </nav>
    </div>
</div>
<!-- header section end -->
<!-- banner section start -->
<div class="banner_section layout_padding">
    <div class="container">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="your_text">Objectifs de Développement Durable</h1>
                            <h2 class="Shows_text">Sensibilisation Globale</h2>
                            <p class="there_text">Les Objectifs de Développement Durable (ODD) sont un appel universel à
                                l'action pour éradiquer la pauvreté, protéger la planète et garantir la prospérité pour
                                tous d'ici 2030.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="image_wrapper">
                                <img src="images/image1.jpg" class="carousel_image"
                                     alt="Objectifs de Développement Durable">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="your_text">ODD 12</h1>
                            <h2 class="Shows_text">Consommation et Production Durables</h2>
                            <p class="there_text">L'ODD 12 vise à garantir des modes de consommation et de production
                                durables, réduisant ainsi l'impact sur notre environnement et préservant les ressources
                                pour les générations futures.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="image_wrapper">
                                <img src="images/image2.jpg" class="carousel_image" alt="Consommation Durable">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="your_text">Recyclage</h1>
                            <h2 class="Shows_text">Un Acte Responsable</h2>
                            <p class="there_text">Le recyclage est une méthode clé pour réduire les déchets, économiser
                                des ressources et limiter notre empreinte écologique. Engagez-vous à recycler et à
                                promouvoir des pratiques durables.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="image_wrapper">
                                <img src="images/image3.png" class="carousel_image" alt="Recyclage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
        <i class="fa-arrow-left"><img src="images/left-arrow.png"></i>
    </a>
    <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
        <i class="fa-angle-right"><img src="images/right-arrow.png"></i>
    </a>
</div>


<!-- banner section end -->

<!-- about section start -->
<div class="about_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="image_2 w-75">
                    <img src="images/photo-group.jpg" alt="Notre Équipe">
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="live_text">Notre Équipe au Challenge de la NASA</h1>
                <p class="lorem_text">Nous sommes un groupe passionné de jeunes innovateurs engagés à éveiller les
                    consciences sur les problèmes liés aux Objectifs de Développement Durable (ODD). Notre participation
                    au challenge de la NASA vise à utiliser la technologie pour sensibiliser et proposer des solutions
                    concrètes aux défis auxquels notre planète est confrontée.</p>
                <div class="online_bt_main">
                    <div class="online_bt"><a href="#">Sensibilisation aux ODD</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about section end -->


<!-- product section start -->
<div class="product_section layout_padding">
    <div class="container">
        <h1 class="tariffs_text">Services</h1>
        <h2 class="" style="color: white">Afin de mener à bien notre mission voici les services que nous proposons.</h2>
        <div class="product_section2">
            <div class="row">
                <div class="offset-1 col-lg-5 col-sm-12">
                    <h2 class="easy_text">Données de la NASA</h2>
                    <h1 class="internet_text">Données</h1>
                    <div class="month_main clearfix">
                        <p class="long_text">Nous utilisons les données fournies par la NASA pour analyser et
                            interpréter les défis environnementaux actuels. Ces données nous permettent de visualiser
                            les impacts des changements climatiques et d'autres problématiques sur notre planète. </p>
                    </div>
                    <div class="seemore_main">
                        <div class="see_more"><a href="{{route("data")}}">Voir plus</a></div>
                    </div>
                </div>

                <div class="offset-1 col-lg-5 col-sm-12">
                    <h2 class="easy_text">Quiz Ludique sur les ODD</h2>
                    <h1 class="internet_text">Jeux</h1>
                    <div class="month_main clearfix">
                        <p class="long_text">Nous avons développé un quiz interactif sur les Objectifs de Développement
                            Durable (ODD) pour sensibiliser les jeunes et les adultes. Ce quiz permet d'évaluer vos
                            connaissances tout en apprenant de manière ludique. </p>
                    </div>
                    <div class="seemore_main">
                        <div class="see_more"><a href="{{route("quiz.index")}}">Voir plus</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product section end -->

<!-- contact section end -->

<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer_logo">
                    <img src="images/footer-logo.png" alt="Logo de l'équipe">
                </div>
                <h1 class="customer_text">SUIVEZ-NOUS</h1>
                <p class="footer_lorem_text">Rejoignez-nous dans notre mission d'éveiller les consciences sur les
                    ODD.</p>
            </div>
            <div class="col-lg-3 col-sm-6">
                <h1 class="customer_text">NOUS CONTACTER</h1>
                <p class="footer_lorem_text">Pour toute question, suggestion ou collaboration, n'hésitez pas à nous
                    contacter.</p>
                <ul>
                    <li>Email : contact@votreprojet.com</li>
                    <li>Téléphone : +221 77 123 4567</li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
                <h1 class="customer_text">RESSOURCES</h1>
                <p class="footer_lorem_text">Accédez à des articles, études de cas et documents sur les ODD.</p>
            </div>
            <div class="col-lg-3 col-sm-6">
                <h1 class="customer_text">NOUS SUIVRE</h1>
                <p class="footer_lorem_text">Suivez-nous sur les réseaux sociaux pour des mises à jour et des
                    nouvelles.</p>
                <div class="social_icon">
                    <ul>
                        <li><a href="#"><img src="images/fb-icon.png" alt="Facebook"></a></li>
                        <li><a href="#"><img src="images/twitter-icon.png" alt="Twitter"></a></li>
                        <li><a href="#"><img src="images/instagram-icon.png" alt="Instagram"></a></li>
                        <li><a href="#"><img src="images/linkedin-icon.png" alt="LinkedIn"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="footer_text">© 2024 Votre Projet. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</div>
<!-- footer section end -->

<!--  footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
    <div class="container">
        <div class="border"></div>
        <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html
                Templates</a></p>
    </div>
</div>
<!-- copyright section end -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<!-- javascript -->
<script src="js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>
