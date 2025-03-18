<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FreelancerController extends BaseController
{
    public function index()
    {
        return view(name: 'freelancer/iniciofreelancer');
    }

    public function meucurriculo(){
        return view('freelancer/meucurriculo');
    }

    public function servicosprestados(){
        return view('freelancer/servicosprestados');
    }

    public function telabusca(){
        return view('freelancer/telabusca');
    }

    public function transrecebidas(){
        return view('freelancer/transrecebidas');
    }
}
