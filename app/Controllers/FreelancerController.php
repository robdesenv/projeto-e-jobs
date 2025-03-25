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

        $data['titulo'] = 'teste';
        $data['msg'] = $this->request->getMethod();
        $user_id = user_id();
        $db = db_connect();
        $sql = 'SELECT user_id FROM `freelancer` WHERE user_id = ' .$user_id ;
        $resultado = $db->connID->query($sql);
        $num_rows = mysqli_num_rows($resultado);
       
        if ($num_rows >= 1){
            return view('freelancer/meucurriculo', $data);
        }else{
            if($this->request->getMethod() === 'POST'){
                $freelancerModel = new \App\Models\freelancerModel();
                $freelancerModel->set('nome', $this->request->getPost('nome'));
                $freelancerModel->set('telefone', $this->request->getPost('telefone'));
                $freelancerModel->set('email', $this->request->getPost('email'));
                $freelancerModel->set('dataNasc', $this->request->getPost('dataNasc'));
                $freelancerModel->set('estado', $this->request->getPost('estado'));
                $freelancerModel->set('cidade', $this->request->getPost('cidade'));
                $freelancerModel->set('formacoes', $this->request->getPost('formacoes'));
                $freelancerModel->set('cargos', $this->request->getPost('cargos'));
                $freelancerModel->set('user_id', user_id());
    
                if($freelancerModel->insert()){
                    $data['msg'] = 'Curriculo cadastrado';
                }else{
                    $data['msg'] = 'Erro ao cadastrar';
                }
            }
            return view('curriculoteste', $data);
        }

        


        
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
