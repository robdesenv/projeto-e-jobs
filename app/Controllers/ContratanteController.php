<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ContratanteController extends BaseController
{
    public function index()
    {
        return view(name: 'contratante/iniciocontratante');
    }
}
