<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Matrix;

class MatrixController extends Controller
{
    public function matrix_multiplication(Request $request)
    {
        $m1 = $request->get('m1');
        $m2 = $request->get('m2');

        $mat = new Matrix();
        return $mat->calc_matrix_multiplication($m1, $m2);
    }
}
