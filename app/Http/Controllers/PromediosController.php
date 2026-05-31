<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromediosController extends Controller
{
    public function index()
    {
        return view('operations.promedios');
    }

    public function calcular(Request $request)
    {
        $request->validate([
            'nota1' => 'required|numeric|min:0',
            'nota2' => 'required|numeric|min:0',
            'nota3' => 'required|numeric|min:0',
        ]);

        $nota1 = (float) $request->nota1;
        $nota2 = (float) $request->nota2;
        $nota3 = (float) $request->nota3;

        $promedio = ($nota1 + $nota2 + $nota3) / 3;

        $promedio = round($promedio, 2);

        $estado = $promedio >= 6 ? 'Aprobado' : 'Reprobado';

        return back()->with([
            'promedio' => $promedio,
            'nota1'    => $nota1,
            'nota2'    => $nota2,
            'nota3'    => $nota3,
            'estado'   => $estado,
        ]);
    }
}