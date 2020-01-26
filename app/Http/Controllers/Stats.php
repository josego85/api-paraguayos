<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stats as statsModel;

class Stats extends Controller
{
    public function getCountRemoteMode()
    {
        $paraguayans = new statsModel();

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
}