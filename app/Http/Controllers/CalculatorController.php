<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'operation' => 'required|in:add,subtract,multiply,divide',
        ]);

        $result = match ($validated['operation']) {
            'add' => $validated['number1'] + $validated['number2'],
            'subtract' => $validated['number1'] - $validated['number2'],
            'multiply' => $validated['number1'] * $validated['number2'],
            'divide' => $validated['number2'] != 0 ? $validated['number1'] / $validated['number2'] : 'Error: Division by zero',
        };

        return view('calculator', [
            'result' => $result,
            'old' => $validated
        ]);
    }
}
