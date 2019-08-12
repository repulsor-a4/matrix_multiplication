<?php

namespace App;

class Matrix
{
    // function that converts numbers to characters
    public function char_from_num($num)
    {
        $numeric = ($num - 1) % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval(($num - 1) / 26);
        
        if ($num2 > 0)
            return $this->char_from_num($num2) . $letter;
        else
            return $letter;
    }

    public function calc_matrix_multiplication($m1, $m2)
    {
        $m1_rows = count($m1);
        $m2_rows = count($m2);
        $m1_columns = count($m1[0]);
        $m2_columns = count($m2[0]);

        if ( $m1_columns != $m2_rows )
        {
            return response()->json('Incompatible matrices', 422);
        }

        $m3 = [];
        for ($i = 0; $i < $m1_rows; $i++)
        {
            for($j = 0; $j < $m2_columns; $j++)
            {
                $res = 0;
                for($k = 0; $k < $m2_rows; $k++)
                {
                    $res += $m1[$i][$k] * $m2[$k][$j];
                }
                $m3[$i][$j] = $this->char_from_num($res);
		    }
        }

        return($m3);
    }
}
