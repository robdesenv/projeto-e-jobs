<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view(name: 'geral/telainicial');
    }

    public function teste(): string
    {
        return view(name: 'geral/telainicial');
    }
}
