<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Affiche la vue du formulaire de calculatrice
     *
     * Principe SOLID : SRP (Single Responsibility Principle) — cette méthode
     * est uniquement responsable de renvoyer la vue, rien d'autre.
     */
    public function index()
    {
        return view('calculator');
    }

    /**
     * Traite le formulaire soumis et effectue le calcul
     *
     * Respecte le principe SRP (Single Responsibility Principle) :
     * cette méthode valide les données, exécute la logique métier et retourne la vue avec le résultat.
     * DRY (Don't Repeat Yourself) : la logique de calcul est centralisée dans un match()
     */
    public function calculate(Request $request)
    {
        // Validation des entrées utilisateur (Principe de robustesse + SRP)
        $validated = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'operation' => 'required|in:add,subtract,multiply,divide',
        ]);

        // Application de la logique métier à l’aide du match (PHP 8)
        // Respect du principe DRY : évite les structures conditionnelles répétitives
        $result = match ($validated['operation']) {
            'add' => $validated['number1'] + $validated['number2'],
            'subtract' => $validated['number1'] - $validated['number2'],
            'multiply' => $validated['number1'] * $validated['number2'],
            'divide' => $validated['number2'] != 0
                ? $validated['number1'] / $validated['number2']
                : 'Erreur : division par zéro',
        };

        // Retourne la vue avec le résultat du calcul
        return view('calculator', [
            'result' => $result,
            'old' => $validated // DRY : on réutilise les données validées pour préremplir le formulaire
        ]);
    }
}
