<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Matrix;

class MatrixTest extends TestCase
{
    /** @test */
    public function matrix_multiplication_calc_is_true()
    {
        $m1 = [[2, 3, 1], [2, 7, 4]];
        $m2 = [[3, 4, 5], [1, 1, 4], [2, 1, 4]];
        $expected = [["K", "L", "Z"], ["U", "S", "BB"]];

        $mat = new Matrix();
        $result = $mat->calc_matrix_multiplication($m1, $m2);
        $this->assertThat($result, $this->equalTo($expected));
    }

    /** @test */
    public function matrix_multiplication_calc_returns_validation_error()
    {
        $m1 = [[2, 3, 1], [2, 7, 4]];
        $m2 = [[3, 4, 5], [1, 1, 4]];
        $expected = response()->json('Incompatible matrices', 422);

        $mat = new Matrix();
        $result = $mat->calc_matrix_multiplication($m1, $m2);
        $this->assertThat($result, $this->equalTo($expected));
    }
}
