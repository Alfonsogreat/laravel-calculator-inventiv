<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Calculator\OperationFactory;

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

        try {
            $operation = OperationFactory::make($validated['operation']);
            $result = $operation->calculate($validated['number1'], $validated['number2']);
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }

        return view('calculator', [
            'result' => $result,
            'old' => $validated
        ]);
    }
}
