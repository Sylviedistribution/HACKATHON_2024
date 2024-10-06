<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuizController extends Controller
{
    // Page d'accueil du jeu
    public function index()
    {
        $questions = Question::all();

        return view('game', compact('questions'));    }

    // Démarrer le quiz
    public function start(Request $request)
    {
        // Sélectionner 10 questions aléatoires depuis la base de données
        $questions = Question::inRandomOrder()->take(10)->get();

        // Stocker les questions dans la session
        $request->session()->put('quiz_questions', $questions);
        $request->session()->put('current_question_index', 0);
        $request->session()->put('score', 0);
        $request->session()->put('lives', 3);

        $currentQuestion = $questions->first();
        return view('game', compact('currentQuestion'));    }

    // Obtenir la prochaine question
    public function getNextQuestion(Request $request)
    {
        // Récupérer les questions et l'index actuel depuis la session
        $questions = $request->session()->get('quiz_questions');
        $currentIndex = $request->session()->get('current_question_index');

        // Vérifier s'il reste des questions
        if ($currentIndex >= count($questions)) {
            return response()->json([
                'status' => 'finished',
                'score' => $request->session()->get('score')
            ]);
        }

        // Renvoyer la question actuelle
        $question = $questions[$currentIndex];

        return response()->json([
            'status' => 'ongoing',
            'question' => $question
        ]);
    }

    // Soumettre une réponse
    public function submitAnswer(Request $request)
    {
        // Récupérer les questions depuis la session
        $questions = $request->session()->get('quiz_questions');
        $currentIndex = $request->session()->get('current_question_index');
        $currentQuestion = $questions[$currentIndex];

        // Vérifier la réponse
        if ($request->input('answer') === $currentQuestion['correct_answer']) {
            // Réponse correcte, augmenter le score
            $request->session()->increment('score');
        } else {
            // Réponse incorrecte, diminuer les vies
            $request->session()->decrement('lives');
        }

        // Passer à la question suivante
        $request->session()->increment('current_question_index');

        // Vérifier si le jeu est terminé (plus de vies ou plus de questions)
        if ($request->session()->get('lives') <= 0 || $currentIndex + 1 >= count($questions)) {
            return response()->json([
                'status' => 'game_over',
                'score' => $request->session()->get('score')
            ]);
        }

        return response()->json([
            'status' => 'next_question',
            'score' => $request->session()->get('score'),
            'lives' => $request->session()->get('lives')
        ]);
    }

    // Afficher les résultats
    public function result()
    {
        $score = session()->get('score');
        $lives = session()->get('lives');

        // Passer le score et les vies à la vue des résultats
        return view('quiz.result', compact('score', 'lives'));
    }
}

