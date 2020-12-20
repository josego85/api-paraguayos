<?php

namespace App\Http\Controllers;

use App\Models\Stats as statsModel;

class Stats extends Controller
{
    public function getCountRemoteMode()
    {
        $paraguayans = new statsModel();

        $modes = array('Remoto', 'Presencial-Remoto');

        return $paraguayans->getCountMode($modes);
    }

    public function getCountPresentialMode()
    {
        $paraguayans = new paraguayansModel();

        $modes = array('Presencial', 'Presencial-Remoto');

        return $paraguayans->getCountMode($modes);
    }

    public function getCountPresentialRemoteMode()
    {
        $paraguayans = new paraguayansModel();

        $modes = array('Presencial-Remoto');

        return $paraguayans->getCountMode($modes);
    }
}