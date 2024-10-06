<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord – Pollution des Sols et de l'Eau</title>
    <!-- Bootstrap CSS pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js pour les graphiques -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Leaflet.js pour les cartes interactives -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- fevicon -->
    <link rel="icon" href="images/logo.jpg" type="image/gif"/>
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
<div class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="logo"><a href="{{route("index")}}"><img style="width:23%" src="images/logo.png"></a></div>
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

<div class="container">
    <h1 class="text-center my-4">Données sur la Pollution des Sols et de l'Eau</h1>

    <!-- Section pour afficher les cartes -->
    <div class="row">
        <div class="col-md-6">
            <h4>Carte de la Pollution des Eaux</h4>
            <div id="waterPollutionMap" style="height: 400px;"></div>
        </div>
        <div class="col-md-6">
            <h4>Carte de la Pollution des Sols</h4>
            <div id="soilPollutionMap" style="height: 400px;"></div>
        </div>
    </div>

    <!-- Section pour afficher les graphiques -->
    <div class="row my-4">
        <div class="col-md-6">
            <h4>Graphique des niveaux de pollution de l'eau</h4>
            <canvas id="waterPollutionChart"></canvas>
        </div>
        <div class="col-md-6">
            <h4>Graphique des niveaux de pollution des sols</h4>
            <canvas id="soilPollutionChart"></canvas>
        </div>
    </div>
</div>

<!-- Script pour afficher les cartes et graphiques -->
<script>
    // Initialiser la carte Leaflet pour la pollution des eaux
    var waterPollutionMap = L.map('waterPollutionMap').setView([20, 0], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(waterPollutionMap);

    // Initialiser la carte Leaflet pour la pollution des sols
    var soilPollutionMap = L.map('soilPollutionMap').setView([20, 0], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(soilPollutionMap);

    // Exemple de données pour les graphiques
    var waterPollutionData = {
        labels: ['2020', '2021', '2022', '2023'],
        datasets: [{
            label: 'Niveau de Pollution de l\'Eau',
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            data: [12, 19, 14, 22]
        }]
    };

    var soilPollutionData = {
        labels: ['2020', '2021', '2022', '2023'],
        datasets: [{
            label: 'Niveau de Pollution des Sols',
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: 'rgba(255, 99, 132, 1)',
            data: [18, 23, 19, 28]
        }]
    };

    // Initialiser les graphiques Chart.js
    var ctxWater = document.getElementById('waterPollutionChart').getContext('2d');
    new Chart(ctxWater, {
        type: 'line',
        data: waterPollutionData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctxSoil = document.getElementById('soilPollutionChart').getContext('2d');
    new Chart(ctxSoil, {
        type: 'line',
        data: soilPollutionData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
