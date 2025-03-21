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

        if($this->request->getMethod() === 'POST'){
            $freelancerModel = new \App\Models\freelancerModel();
            $freelancerModel->set('nome', $this->request->getPost('nome'));
            $freelancerModel->set('telefone', $this->request->getPost('telefone'));
            $freelancerModel->set('email', $this->request->getPost('email'));
            $freelancerModel->set('dataNasc', $this->request->getPost('datNasc'));
            $freelancerModel->set('estado', $this->request->getPost('estado'));
            $freelancerModel->set('cidade', $this->request->getPost('cidade'));
            $freelancerModel->set('formacoes', $this->request->getPost('formacoes'));
            $freelancerModel->set('cargos', $this->request->getPost('cargos'));

            if($freelancerModel->insert()){
                $data['msg'] = 'Curriculo cadastrado';
            }else{
                $data['msg'] = 'Erro ao cadastrar';
            }
        }
        return view('freelancer\meucurriculo', $data);
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
