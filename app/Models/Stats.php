<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Stats
{
    /**
     * 
     * @method getCountMode
     * @param  
     * @return integer
     */
    public function getCountMode($p_mode)
    {
        $expression_raw = 'SQL_CALC_FOUND_ROWS count(*) as count';

        $query = DB::table('companies as com')
          ->select(array( DB::raw($expression_raw)))
          ->whereIn('mode', $p_mode);

        $result = $query->get();
        $return = $result->all();
        return $return[0]->count;
    }
}