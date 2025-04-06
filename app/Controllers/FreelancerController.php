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

        $data['acao'] = 'Salvar';
        $user_id = user_id();
        $db = db_connect();
        $sql = 'SELECT user_id FROM `freelancer` WHERE user_id = ' .$user_id ;
        $resultado = $db->connID->query($sql);
        $num_rows = mysqli_num_rows($resultado);
       
        if ($num_rows >= 1){

            $freelancerModel = new \App\Models\freelancerModel();
            $data['freelancers'] = $freelancerModel->where('user_id',$user_id)->find();;

            //exibir cargos
            $cargoModel = new \App\Models\cargosModel();
            $data['cargos'] = $cargoModel->findAll();

            //iserir cargo ao freelancer
            if($this->request->getMethod() === 'POST'){
                $cargofreelancerModel = new \App\Models\cargofreelancerModel();
                $cargos_id = intval($this->request->getPost('cargo_id'));
                $cargofreelancerModel->set('user_id', user_id());
                $cargofreelancerModel->set('cargo_id', $cargos_id);

                $cargofreelancerModel->insert();

                header("Refresh: 0");
            }

            //exibir os cargos cadastrados para o freelancer
            $sql = 'SELECT cargo_freelancer.user_id, cargos.cargo FROM cargos JOIN cargo_freelancer ON cargos.id = cargo_freelancer.cargo_id WHERE cargo_freelancer.user_id = '.$user_id;
            $data['cargosfreelancer'] = $db->connID->query($sql);
        
            return view('freelancer/exibircurriculo', $data);
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
                header("Refresh: 0");
            }
            return view('freelancer/meucurriculo', $data);
        }
    }

    public function editCurriculo($id){

        $data['acao'] = 'Editar';
        $freelancerModel = new \App\Models\freelancerModel();
        $freelancer = $freelancerModel->find($id);

        if($this->request->getMethod() == 'POST'){
            $freelancer['nome'] = $this->request->getPost('nome');
            $freelancer['telefone'] = $this->request->getPost('telefone');
            $freelancer['email'] = $this->request->getPost('email');
            $freelancer['dataNasc'] = $this->request->getPost('dataNasc');
            $freelancer['estado'] = $this->request->getPost('estado');
            $freelancer['cidade'] = $this->request->getPost('cidade');
            $freelancer['formacoes'] = $this->request->getPost('formacoes');
            $freelancer['cargos'] = $this->request->getPost('cargos');

            if ($freelancerModel->update($id, $freelancer)) {
                return redirect('freelancer/meucurriculo');
            }
        }
        $data['freelancer'] = $freelancer;

        echo view('freelancer/meucurriculo', $data);

}


    public function servicosprestados(){
        return view('freelancer/servicosprestados');
    }

    public function telabusca(){
        $eventosModel = new \App\Models\eventosModel();
        $data = [
            'eventos' => $eventosModel->paginate(10),
            'pager' => $eventosModel->pager
        ];
        return view('freelancer/telabusca', $data);
    }

    public function transrecebidas(){
        return view('freelancer/transrecebidas');
    }
}
