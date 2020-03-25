<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PruebaController extends Controller {
    public function prueba($param) {
        return 'Estoy dentro de prueba controller y recibi este parametro --> '. $param;
    }
}