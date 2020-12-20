<?php

namespace App\Http\Controllers;

use App\Models\Paraguayans as paraguayansModel;

class Paraguayans extends Controller
{
    public function getParaguayans()
    {
        $paraguayans = new paraguayansModel();

        $result = $paraguayans->getParaguayans();
        $geo_json = $result['data'];
        return $this->create_geo_json($geo_json);
    }

    private function create_geo_json($locales)
    {
        $features = array();

        foreach($locales as $value)
        {
            $features[] = array(
                'type' => 'Feature',
                'geometry' => array(
                    'type' => 'Point', 
                    'coordinates' => array(
                        (float)$value->longitude,
                        (float)$value->latitude
                    )
                ),
                'properties' => array(
                    'name' => $value->user_name . " " .  $value->last_name,
                    'sex' => $value->sex,
                    'company' => $value->company,
                    'position' => $value->position,
                    'area' => $value->area,
                    'mode' => $value->mode,
                    'contact' => ($value->contact)? $value->contact : '-',
                    'phone' => ($value->phone)? $value->phone : '-',
                    'linkedin' => ($value->linkedin)? $value->linkedin : '-',
                    'website' => ($value->website)? $value->website : '-'
                )
            );
        }

        $allfeatures = array(
            'type' => 'FeatureCollection', 
            'features' => $features
        );
        return json_encode($allfeatures, JSON_PRETTY_PRINT);
    }
}