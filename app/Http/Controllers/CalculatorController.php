<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Calculator\OperationFactory;

class CalculatorController extends Controller
{
    /**
     * Affiche la vue de la calculatrice.
     *
     * Principe SOLID : SRP (Single Responsibility Principle)
     * Ce contrôleur ne fait qu'une seule chose ici : retourner la vue.
     */
    public function index()
    {
        return view('calculator');
    }

    /**
     * Gère la requête de calcul soumise par l'utilisateur.
     *
     * - Valide les entrées utilisateurs (validation côté serveur)
     * - Délègue la logique métier à des classes spécialisées selon le pattern Strategy
     * - Utilise le pattern Factory pour instancier dynamiquement la bonne classe d'opération
     * - Renvoie le résultat ou un message d'erreur en cas d'exception
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function calculate(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'operation' => 'required|in:add,subtract,multiply,divide',
        ]);

        try {
            // Factory Pattern : instancie dynamiquement la classe d'opération à utiliser
            $operation = OperationFactory::make($validated['operation']);

            // Strategy Pattern : chaque classe d'opération implémente la méthode calculate()
            $result = $operation->calculate($validated['number1'], $validated['number2']);
        } catch (\Exception $e) {
            // En cas d'erreur (ex : division par zéro), on affiche un message
            $result = $e->getMessage();
        }

        // Retour de la vue avec le résultat et les anciennes valeurs pour réaffichage
        return view('calculator', [
            'result' => $result,
            'old' => $validated
        ]);
    }
}
