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
    public function minhaempresa()
    {
        return view(name: 'contratante/minhaempresa');
    }
    public function vagaspub()
    {
        return view(name: 'contratante/vagaspub');
    }
    public function busca()
    {
        return view(name: 'contratante/busca');
    }
    public function pagamentos()
    {
        return view(name: 'contratante/pagamentos');
    }
}
