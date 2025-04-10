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
            //página para exibir o cúrrico caso tenha já cadastrado
            $freelancerModel = new \App\Models\freelancerModel();
            $data['freelancers'] = $freelancerModel->where('user_id',$user_id)->find();

            //criar novo cargo

            if($this->request->getMethod() == 'POST'){
                $btncargo = $this->request->getPost('btn-cargo');

                if($btncargo == "novocargo"){
                    //criar novo cargo
                    $sql = "SELECT cargos.cargo FROM cargos";
                    $resultados = $db->connID->query($sql);
                    $novocargo = ucfirst(strtolower($this->request->getPost("novocargo")));
                    $contador = 0;
                    //conferirndo se o cargo que está sendo inserido não está cadastrado no banco
                    foreach($resultados as $resultado){
                        $palavrainserida = strtolower(str_replace(" ","",$novocargo));
                        $palavrabanco = strtolower(str_replace(" ","",$resultado['cargo']));
                        $caracteres = array_diff(str_split($palavrainserida), str_split($palavrabanco));
                        if(empty($caracteres)){
                            $contador++;
                        }
                    }
                    //insindo cargo caso não esteja no banco
                    if($contador == 0){
                        $cargosModel = new \App\Models\cargosModel();
                        $cargosModel->set('cargo',$novocargo);
                        $cargosModel->insert();

                        header("Refresh: 0");
                    }else{
                        echo "O cargo que você tentou incluir já existe";
                    }
                    
                }elseif($btncargo == "adicionarcargo"){
                    //iserir cargo ao freelancer
                    $cargofreelancerModel = new \App\Models\cargofreelancerModel();
                    $cargos_id = intval($this->request->getPost('cargo_id'));
                    $cargofreelancerModel->set('user_id', user_id());
                    $cargofreelancerModel->set('cargo_id', $cargos_id);

                    $cargofreelancerModel->insert();

                    header("Refresh: 0");
                }
            }
            

            //exibir cargos
            $cargoModel = new \App\Models\cargosModel();
            $data['cargos'] = $cargoModel->findAll();

            
            

            //exibir os cargos cadastrados para o freelancer
            $sql = 'SELECT cargo_freelancer.id, cargos.cargo FROM cargos JOIN cargo_freelancer ON cargos.id = cargo_freelancer.cargo_id WHERE cargo_freelancer.user_id = '.$user_id;
            $data['cargosfreelancer'] = $db->connID->query($sql);
        
            return view('freelancer/exibircurriculo', $data);
        }else{
            //página para cadastrar o curriculo caso  não tenha
            if($this->request->getMethod() === 'POST'){
                $freelancerModel = new \App\Models\freelancerModel();
                $freelancerModel->set('nome', $this->request->getPost('nome'));
                $freelancerModel->set('telefone', $this->request->getPost('telefone'));
                $freelancerModel->set('email', $this->request->getPost('email'));
                $freelancerModel->set('dataNasc', $this->request->getPost('dataNasc'));
                $freelancerModel->set('estado', $this->request->getPost('estado'));
                $freelancerModel->set('cidade', $this->request->getPost('cidade'));
                $freelancerModel->set('formacoes', $this->request->getPost('formacoes'));
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


    public function excluirCargo($id){
        $cargofreelancerModel = new \App\Models\cargofreelancerModel();
        if($cargofreelancerModel->delete($id)){
        }
        return redirect()->to(base_url('freelancer/meucurriculo'));
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

        //exibir cargos
        $cargoModel = new \App\Models\cargosModel();
        $data['cargos'] = $cargoModel->findAll();
        
        return view('freelancer/telabusca', $data);
    }

    public function transrecebidas(){
        return view('freelancer/transrecebidas');
    }
}
