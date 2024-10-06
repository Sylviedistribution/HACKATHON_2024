document.addEventListener("DOMContentLoaded", function() {
    let questionIndex = 0;
    let score = 0;
    let lives = 3;

    // Fonction pour démarrer le quiz
    function startQuiz() {
        fetch('/quiz/start', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    displayQuestion(data[questionIndex]);
                }
            });
    }

    // Fonction pour afficher une question
    function displayQuestion(question) {
        document.getElementById('question-text').innerText = question.text;
        const answersContainer = document.getElementById('answers-container');
        answersContainer.innerHTML = '';

        // Afficher les réponses (mélanger les réponses correctes et incorrectes)
        let allAnswers = [question.correct_answer, ...JSON.parse(question.wrong_answers)];
        allAnswers = shuffleArray(allAnswers);  // Mélanger les réponses

        allAnswers.forEach(answer => {
            let button = document.createElement('button');
            button.innerText = answer;
            button.classList.add('answer-btn');
            button.onclick = () => submitAnswer(answer);
            answersContainer.appendChild(button);
        });
    }

    // Fonction pour soumettre une réponse
    function submitAnswer(answer) {
        fetch('/quiz/submit-answer', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ answer: answer })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'game_over') {
                    alert('Game Over! Your score: ' + data.score);
                    resetQuiz();
                } else if (data.status === 'next_question') {
                    score = data.score;
                    lives = data.lives;
                    updateScoreAndLives();
                    getNextQuestion();
                }
            });
    }

    // Fonction pour récupérer la prochaine question
    function getNextQuestion() {
        fetch('/quiz/next-question', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'finished') {
                    alert('Quiz terminé! Votre score: ' + data.score);
                    resetQuiz();
                } else {
                    displayQuestion(data.question);
                }
            });
    }

    // Fonction pour mélanger les réponses
    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    // Fonction pour mettre à jour le score et les vies
    function updateScoreAndLives() {
        document.getElementById('lives-count').innerText = lives;
        document.getElementById('score-count').innerText = score;
    }

    // Fonction pour réinitialiser le quiz
    function resetQuiz() {
        questionIndex = 0;
        score = 0;
        lives = 3;
        updateScoreAndLives();
        startQuiz();
    }

    // Démarrer le quiz lorsque la page est chargée
    startQuiz();
});
