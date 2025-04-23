<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \App\Models\cargofreelancerModel;

class CargosFreelancerController extends BaseController
{
    public function index()
    {
        //
    }

    public function ExibirCargosFreelancer($id){
        //exibir os cargos cadastrados para o freelancer
        $db = db_connect();
        $sql = 'SELECT cargo_freelancer.id, cargos.cargo FROM cargos JOIN cargo_freelancer ON cargos.id = cargo_freelancer.cargo_id WHERE cargo_freelancer.user_id = ?';
        $query = $db->query($sql, [$id]);
        
        
        return $query->getResultArray();
    }
}
