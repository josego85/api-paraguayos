<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paraguayans as paraguayansModel;

class Paraguayans extends Controller
{
    public function getParaguayans(Request $request)
    {
        $paraguayans = new paraguayansModel();

        $result = $paraguayans->getParaguayans();
        $geo_json = $result['data'];
        return $this->create_geo_json($geo_json);
    }

    public function getCountRemoteMode()
    {
        $paraguayans = new paraguayansModel();

        $modes = array('Remoto', 'Presencial-Remoto');
        $count = $paraguayans->getCountMode($modes);
        return $count;
    }

    public function getCountPresentialMode()
    {
        $paraguayans = new paraguayansModel();

        $modes = array('Presencial', 'Presencial-Remoto');
        $count = $paraguayans->getCountMode($modes);
        return $count;
    }

    public function getCountPresentialRemoteMode()
    {
        $paraguayans = new paraguayansModel();

        $modes = array('Presencial-Remoto');
        $count = $paraguayans->getCountMode($modes);
        return $count;
    }

    private function create_geo_json($locales)
    {
        $features = array();

        foreach($locales as $key => $value)
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
        };

        $allfeatures = array(
            'type' => 'FeatureCollection', 
            'features' => $features
        );
        return json_encode($allfeatures, JSON_PRETTY_PRINT);
    }
}