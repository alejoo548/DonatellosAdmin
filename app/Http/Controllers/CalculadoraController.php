<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CalculadoraController extends Controller
{
    public function index()
    {
        return view('operations.calculadora');
    }

    // Hacer el cálculo
    public function calculate(Request $request)
    {
        $num1 = $request->num1;
        $num2 = $request->num2;
        $operacion = $request->operacion;

        $resultado = 0;

        if ($operacion == 'sumar') {
            $resultado = $num1 + $num2;
        } elseif ($operacion == 'restar') {
            $resultado = $num1 - $num2;
        } elseif ($operacion == 'multiplicar') {
            $resultado = $num1 * $num2;
        } elseif ($operacion == 'dividir') {
            if ($num2 == 0) {
                return back()->with('error', 'No se puede dividir entre cero');
            }
            $resultado = $num1 / $num2;
        }

        return back()->with('resultado', $resultado)
                     ->with('num1', $num1)
                     ->with('num2', $num2)
                     ->with('operacion', $operacion);
    }
}