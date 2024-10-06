<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- basic -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
    <title>Quiz - Développement Durable</title>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            margin: 5rem auto;
        }
        h1 {
            color: #28a745;
        }
        #lives {
            margin-bottom: 1.5rem;
        }
        .heart {
            font-size: 1.5rem;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #218838;
        }
        #question-text {
            margin: 1.5rem 0;
            font-size: 1.5rem;
            color: #333;
        }
        .answer {
            background-color: #e2e2e2;
            border-radius: 5px;
            margin: 0.5rem 0;
            padding: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .answer:hover {
            background-color: #d4d4d4;
        }

        #score {
            font-size: 1.5rem;
            color: #333;
            margin-top: 1rem;
        }
        #game-over {
            display: none;
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<!-- Navbar en haut -->
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

<br><br><br>

<div class="container">
    <h1>Quiz sur le Développement Durable</h1>
    <div id="lives">
        <h3>Vies restantes :
            <span id="lives-count">3</span>
            <span class="heart" style="color: red;">❤️</span>
            <span class="heart" style="color: red;">❤️</span>
            <span class="heart" style="color: red;">❤️</span>
        </h3>
    </div>

    <div id="score">Score : <span id="score-count">0</span></div>

    <form id="quiz-form">
        <button type="submit">Démarrer le Quiz</button>
    </form>

    <div id="question-container" style="display: none;">
        <h2 id="question-text"></h2>
        <div id="answers-container">
            <!-- Les réponses seront injectées ici via JavaScript -->
        </div>
    </div>

    <div id="game-over">
        <h2>Game Over</h2>
        <h3>Votre score total est : <span id="final-score"></span></h3>
        <button id="restart-button">Recommencer</button>
    </div>
</div>

<audio id="correct-sound" src="audio/correct.mp3"></audio>
<audio id="wrong-sound" src="audio/wrong.mp3"></audio>

<script>
    // Questions simulées pour le quiz
    const quizData = [
        {
            question: "Quelle est l'objectif principal de l'ODD 12 ?",
            correctAnswer: "Assurer des modes de consommation et de production durables",
            wrongAnswers: ["Éliminer la pauvreté", "Protéger la biodiversité", "Assurer l'accès à l'énergie durable"]
        },
        {
            question: "Quel pourcentage de nourriture est gaspillé chaque année à l’échelle mondiale ?",
            correctAnswer: "Environ un tiers",
            wrongAnswers: ["5%", "10%", "La moitié"]
        },
        {
            question: "Quel secteur utilise la plus grande quantité de ressources naturelles ?",
            correctAnswer: "Le secteur industriel",
            wrongAnswers: ["Le secteur agricole", "Le secteur des transports", "Le secteur des services"]
        },
        {
            question: "Pourquoi est-il important de réduire les déchets ?",
            correctAnswer: "Pour limiter l'impact environnemental et préserver les ressources naturelles",
            wrongAnswers: ["Pour réduire les coûts de production", "Pour augmenter les emplois", "Pour améliorer la productivité"]
        },
        {
            question: "Quel est un des moyens pour promouvoir la consommation responsable ?",
            correctAnswer: "Privilégier les produits avec un label éco-responsable",
            wrongAnswers: ["Acheter uniquement des produits importés", "Augmenter sa consommation", "Privilégier les produits les moins chers"]
        },
        {
            question: "Que signifie l'éco-conception ?",
            correctAnswer: "Concevoir des produits avec un impact environnemental minimal",
            wrongAnswers: ["Concevoir des produits de luxe", "Réduire les coûts de production", "Concevoir des produits pour le marché local uniquement"]
        },
        {
            question: "Quel est un exemple d’action individuelle pour soutenir l’ODD 12 ?",
            correctAnswer: "Réduire, réutiliser et recycler les déchets",
            wrongAnswers: ["Augmenter sa consommation d'eau", "Utiliser des sacs en plastique", "Acheter plus de vêtements"]
        },
        {
            question: "Quel est l'impact de la production non durable ?",
            correctAnswer: "Elle épuise les ressources naturelles et endommage l'environnement",
            wrongAnswers: ["Elle favorise la croissance économique", "Elle réduit les inégalités", "Elle améliore la biodiversité"]
        },
        {
            question: "Que vise l'ODD 12 concernant les produits chimiques ?",
            correctAnswer: "Réduire leur utilisation et promouvoir des alternatives plus sûres",
            wrongAnswers: ["Augmenter leur production", "Les interdire complètement", "Les exporter massivement"]
        },
        {
            question: "Pourquoi est-il essentiel de suivre des modèles de consommation durables ?",
            correctAnswer: "Pour réduire l'empreinte écologique et préserver les ressources pour les générations futures",
            wrongAnswers: ["Pour augmenter la productivité", "Pour augmenter les profits des entreprises", "Pour maximiser la consommation des ressources"]
        },
        {
            question: "Quel secteur est fortement lié à la consommation et à la production durables ?",
            correctAnswer: "Le secteur de l'énergie",
            wrongAnswers: ["Le secteur des transports", "Le secteur du divertissement", "Le secteur sportif"]
        },
        {
            question: "Comment les entreprises peuvent-elles contribuer à l'ODD 12 ?",
            correctAnswer: "En adoptant des pratiques de production durables",
            wrongAnswers: ["En augmentant leur production de plastique", "En réduisant leurs coûts de production à tout prix", "En augmentant leurs émissions de CO2"]
        },
        {
            question: "Qu'est-ce que l'économie circulaire ?",
            correctAnswer: "Un modèle qui vise à réduire les déchets en réutilisant les ressources",
            wrongAnswers: ["Un modèle basé sur la consommation illimitée", "Un modèle pour augmenter les profits", "Un modèle pour exporter plus de biens"]
        },
        {
            question: "Quel rôle joue la sensibilisation dans l'ODD 12 ?",
            correctAnswer: "Elle encourage les citoyens et entreprises à adopter des pratiques durables",
            wrongAnswers: ["Elle vise à réduire les taxes", "Elle pousse à consommer davantage", "Elle encourage la production à grande échelle"]
        },
        {
            question: "Quel est un exemple de consommation durable d'énergie ?",
            correctAnswer: "Utiliser des sources d'énergie renouvelables comme le solaire ou l'éolien",
            wrongAnswers: ["Utiliser des combustibles fossiles", "Augmenter l'utilisation de charbon", "Construire plus de centrales nucléaires"]
        }
    ];

    let currentQuestionIndex = 0;
    let lives = 3;
    let score = 0;

    document.getElementById('quiz-form').onsubmit = function(event) {
        event.preventDefault();
        document.getElementById('quiz-form').style.display = 'none';
        document.getElementById('question-container').style.display = 'block';
        loadQuestion();
    };

    function loadQuestion() {
        const currentQuestion = quizData[currentQuestionIndex];
        document.getElementById('question-text').innerText = currentQuestion.question;

        const answersContainer = document.getElementById('answers-container');
        answersContainer.innerHTML = ''; // Réinitialiser le conteneur des réponses

        const allAnswers = [...currentQuestion.wrongAnswers, currentQuestion.correctAnswer];
        allAnswers.sort(() => Math.random() - 0.5); // Mélanger les réponses

        allAnswers.forEach(answer => {
            const div = document.createElement('div');
            div.className = 'answer';
            div.innerText = answer;
            div.onclick = function() {
                checkAnswer(answer, currentQuestion.correctAnswer);
            };
            answersContainer.appendChild(div);
        });
    }

    function checkAnswer(selectedAnswer, correctAnswer) {
        if (selectedAnswer === correctAnswer) {
            document.getElementById('correct-sound').play();
            score += 10; // Ajouter 10 points pour chaque bonne réponse
            document.getElementById('score-count').innerText = score;
        } else {
            document.getElementById('wrong-sound').play();
            lives--;
            updateLives();
        }

        currentQuestionIndex++;
        if (currentQuestionIndex < quizData.length && lives > 0) {
            loadQuestion();
        } else if (lives === 0 || currentQuestionIndex === quizData.length) {
            gameOver();
        }
    }

    function updateLives() {
        document.getElementById('lives-count').innerText = lives;
        const hearts = document.querySelectorAll('.heart');
        for (let i = 0; i < hearts.length; i++) {
            if (i >= lives) {
                hearts[i].hidden;
            }
        }
    }

    function gameOver() {
        document.getElementById('question-container').style.display = 'none';
        document.getElementById('game-over').style.display = 'block';
        document.getElementById('final-score').innerText = score;
    }

    document.getElementById('restart-button').onclick = function() {
        lives = 3;
        score = 0;
        currentQuestionIndex = 0;
        document.getElementById('lives-count').innerText = lives;
        document.getElementById('score-count').innerText = score;
        const hearts = document.querySelectorAll('.heart');
        hearts.forEach(heart => heart.style.color = 'red'); // Réinitialiser les cœurs
        document.getElementById('game-over').style.display = 'none';
        document.getElementById('quiz-form').style.display = 'block';
    };

</script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
