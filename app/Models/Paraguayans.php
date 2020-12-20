<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Paraguayans
{
    /**
     * 
     * @method getParaguayans
     * @param  void
     * @return array
     */
    public function getParaguayans()
    {
        $expression_raw = 'SQL_CALC_FOUND_ROWS u.name as user_name, u.last_name, u.sex, u.linkedin, 
          u.contact, u.phone_number as phone, u.website, com.name as company, com.longitude,
          com.latitude, com.position, com.mode, ar.name as area';

        $query = DB::table('users as u')
          ->select(array( DB::raw($expression_raw)))
          ->join('users_companies as u_com', 'u.id', '=' ,'u_com.users_id')
          ->join('companies as com', 'com.id', '=' ,'u_com.companies_id')
          ->join('companies_areas as com_ar', 'com_ar.companies_id', '=' ,'u_com.companies_id')
          ->join('areas as ar', 'ar.id', '=' ,'com_ar.areas_id');

        $result = $query->get();
        $total = DB::select(DB::raw("SELECT FOUND_ROWS() AS total;"))[0];

        return [
          'total' =>  $total->total,
          'data'  =>  $result->all()
      ];
    }
}