<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\vagasModel;
use App\Models\contratadosModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\CargosFreelancerController;
use App\Models\contratanteModel;
use App\Controllers\AvaliacaoContratanteController;

class FreelancerController extends BaseController
{
    public function VerificaCadastroCurriculo():int 
    {
        $user_id = user_id();
        $db = db_connect();
        $sql = 'SELECT user_id FROM `freelancer` WHERE user_id = ? ';
        $stmt = $db->connID->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $num_rows = $result->num_rows;
        return $num_rows;
    }

    public function VerificaCadastroCargos($cargo_id):int 
    {
        $user_id = user_id();
        $db = db_connect();
        $sql = 'SELECT user_id, cargo_id FROM `cargo_freelancer` WHERE user_id = ? and cargo_id = ? ';
        $stmt = $db->connID->prepare($sql);
        $stmt->bind_param('ii', $user_id, $cargo_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $num_rows = $result->num_rows;
        return $num_rows;
    }

    public function VerificaFreelancerContratado($freelancerId, $eventoId){
        //verifica se o freelancer já foi contratado para o evento
        $db = db_connect();
        $sql = 'SELECT * FROM `contratados` WHERE freelancer_id = ? and evento_id = ? AND contratados.status = true' ;
        $stmt = $db->connID->prepare($sql);
        $stmt->bind_param('ii', $freelancerId, $eventoId);
        $stmt->execute();
        $result = $stmt->get_result();
        $num_rows = $result->num_rows;
        return $num_rows;
    }


    public function index()
    {
        return view(name: 'freelancer/iniciofreelancer');
    }

    public function meucurriculo(){

        $data['acao'] = 'Salvar';
        $user_id = user_id();
        $db = db_connect();
       
        if ($this->VerificaCadastroCurriculo() >= 1)
        {
            //página para exibir o curriculo caso tenha já cadastrado
            $freelancerModel = new \App\Models\freelancerModel();
            $data['freelancers'] = $freelancerModel->where('user_id',$user_id)->find();

            //criar novo cargo

            if($this->request->getMethod() == 'POST')
            {
                $btncargo = $this->request->getPost('btn-cargo');

                if($btncargo == "novocargo")
                {
                    //criar novo cargo
                    $sql = "SELECT cargos.cargo FROM cargos";
                    $resultados = $db->connID->query($sql);
                    $novocargo = ucfirst(strtolower($this->request->getPost("novocargo")));
                    $contador = 0;
                    //conferirndo se o cargo que está sendo inserido não está cadastrado no banco
                    foreach($resultados as $resultado)
                    {
                        $palavrainserida = strtolower(str_replace(" ","",$novocargo));
                        $palavrabanco = strtolower(str_replace(" ","",$resultado['cargo']));
                        $caracteres = array_diff(str_split($palavrainserida), str_split($palavrabanco));
                        if(empty($caracteres))
                        {
                            $contador++;
                        }
                    }
                    //insindo cargo caso não esteja no banco
                    if($contador == 0)
                    {
                        $cargosModel = new \App\Models\cargosModel();
                        $cargosModel->set('cargo',$novocargo);
                        $cargosModel->insert();

                        session()->setFlashdata('msg', "Cargo criado com sucesso. Selecione o cargo para adicionar.");
                        return redirect()->to(base_url('freelancer/meucurriculo'));
                    }else
                    {
                        session()->setFlashdata('msg-error', "O cargo que você tentou incluir já existe.");
                        return redirect()->to(base_url('freelancer/meucurriculo'));
                    }
                    
                }elseif($btncargo == "adicionarcargo")
                {
                    //iserir cargo ao freelancer
                    $cargofreelancerModel = new \App\Models\cargofreelancerModel();
                    $cargos_id = intval($this->request->getPost('cargo_id'));

                    if($this->VerificaCadastroCargos($cargos_id) >= 1){
                        session()->setFlashdata('msg-error', "Cargo já cadastrado.");
                        return redirect()->to(base_url('freelancer/meucurriculo'));
                    }else{
                        $cargofreelancerModel->set('user_id', user_id());
                        $cargofreelancerModel->set('cargo_id', $cargos_id);

                        $cargofreelancerModel->insert();

                        session()->setFlashdata('msg', "Cargo adicionado com sucesso.");
                        return redirect()->to(base_url('freelancer/meucurriculo'));
                    }
                    

                    
                }
            }
            

            //exibir cargos
            $cargoModel = new \App\Models\cargosModel();
            $data['cargos'] = $cargoModel->findAll();

            
            

            //exibir os cargos cadastrados para o freelancer
            $cargofreelancerController = new  CargosFreelancerController();
            $data['cargosfreelancer'] = $cargofreelancerController->ExibirCargosFreelancer($user_id);
            
        
            return view('freelancer/exibircurriculo', $data);
        }else
        {
            //página para cadastrar o curriculo caso  não tenha
            if($this->request->getMethod() === 'POST')
            {
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
                return redirect()->to(base_url('freelancer/meucurriculo'));
            }
            return view('freelancer/meucurriculo', $data);
        }
    }

    public function editCurriculo($id)
    {

        $data['acao'] = 'Editar';
        $freelancerModel = new \App\Models\freelancerModel();
        $freelancer = $freelancerModel->find($id);

        if($this->request->getMethod() == 'POST')
        {
            $freelancer['nome'] = $this->request->getPost('nome');
            $freelancer['telefone'] = $this->request->getPost('telefone');
            $freelancer['email'] = $this->request->getPost('email');
            $freelancer['dataNasc'] = $this->request->getPost('dataNasc');
            $freelancer['estado'] = $this->request->getPost('estado');
            $freelancer['cidade'] = $this->request->getPost('cidade');
            $freelancer['formacoes'] = $this->request->getPost('formacoes');
            $freelancer['cargos'] = $this->request->getPost('cargos');

            if ($freelancerModel->update($id, $freelancer)) 
            {
                return redirect('freelancer/meucurriculo');
            }
        }
        $data['freelancer'] = $freelancer;

        echo view('freelancer/meucurriculo', $data);
    }


    public function excluirCargo($id)
    {
        $cargofreelancerModel = new \App\Models\cargofreelancerModel();
        if($cargofreelancerModel->delete($id))
        {
            //cargo deletado
        }

        return redirect()->to(base_url('freelancer/meucurriculo'));
    }


    public function servicosprestados()
    {

        $db = db_connect();
        $user_id = user_id();
        $sql = 'SELECT contratados.id,contratados.solicitante_id, contratados.freelancer_id, contratados.evento_id, eventos.nome,eventos.endereco,eventos.cidade,eventos.data,eventos.descricao,cargos.cargo,contratados.status, vagas.valor
        FROM contratados JOIN eventos on contratados.evento_id = eventos.id 
        JOIN vagas on contratados.vagas_id = vagas.id 
        JOIN cargos on vagas.cargo_id = cargos.id
        WHERE contratados.freelancer_id = ?
        ORDER BY CASE 
            WHEN contratados.status = 1 THEN 1
            WHEN contratados.status IS NULL THEN 2
            WHEN contratados.status = 0 THEN 3
        END;';

        $stmt = $db->connID->prepare($sql);
        $stmt->bind_param('i', $user_id); 
        $stmt->execute();
        $data['contratados'] = $stmt->get_result();

        $idVaga = $this->request->getGet('idVaga');
        $idEvento = $this->request->getGet('idEvento');
        $btn = $this->request->getGet('btn');

        if($idVaga){
            if($btn == 'aceitar'){
                if($this->VerificaFreelancerContratado($user_id, $idEvento) == 0){
                    $contratadosModel = new contratadosModel();
            
                    $contratados['status'] = true;

                    if($contratadosModel->update($idVaga, $contratados))
                    {
                        $contratadosModel = new contratadosModel();
                        
                        $contratados = $contratadosModel->where('freelancer_id',$user_id)->where('evento_id',$idEvento)->where('id !=', $idVaga)->findAll();

                        foreach($contratados as $contratado){
                            $contratado['status'] = false;

                            $contratadosModel->update($contratado['id'], $contratado);
                        }

                        $resposta = ['msg'=> '<div class="alert alert-success" role="alert">
                                                Contratado.
                                            </div>', 'contratados' => $contratados];
                    }
                }else{
                    $resposta = ['msg'=> '<div class="alert alert-danger" role="alert">
                                                Freelancer já contratado para este evento.
                                            </div>'];

                    $contratadosModel = new contratadosModel();
                    $contratados['status'] = false;
                    $contratadosModel->update($idVaga, $contratados);
                }
                
                
            }elseif($btn == 'recusar'){
                $contratadosModel = new contratadosModel();

                $contratados['status'] = false;

                if($contratadosModel->update($idVaga, $contratados))
                {
                    $resposta = ['msg'=> 'recusado','btn'=> $btn];
                }
            }

            return $this->response->setJSON($resposta);
            
        }

        return view('freelancer/servicosprestados',$data);
    }

    public function telabusca(){

        $db = db_connect();

        //exibir vagas
        $sql = 'SELECT E.user_id, V.id,V.evento_id, E.nome,E.endereco,E.cidade,E.estado ,E.data,E.descricao, C.cargo, V.cargo_id,V.valor
                                           FROM eventos as E JOIN vagas as V ON V.evento_id = E.id
				                            JOIN cargos as C ON V.cargo_id = C.id';
        $data['vagas'] = $db->connID->query($sql);


        //exibir cargos
        $cargoModel = new \App\Models\cargosModel();
        $data['cargos'] = $cargoModel->findAll();

        
        return view('freelancer/telabusca', $data);
    }

    public function exibirInformacoesContratante(){

        $contratanteId = $this->request->getGet('idContratante');

        if($contratanteId){

            $contratanteModel = new contratanteModel();

            $contratante = $contratanteModel->where('user_id',$contratanteId)->findAll();

            $AvaliacaoContratanteController =  new AvaliacaoContratanteController();
            foreach($contratante as $resultado)
                {
                     $avaliacoesContratante[] = $AvaliacaoContratanteController->mediaAvaliacao($resultado['user_id']);

                     $comentariosAvaliacoes[] = $AvaliacaoContratanteController->comentariosAvaliacao($resultado['user_id']);
                }

            $reponse = ['id' => $contratanteId, 'contratante' =>$contratante, 'media_avaliacao' => $avaliacoesContratante, 'comentarios' => $comentariosAvaliacoes];

            return  $this->response->setJSON($reponse);
        }

        

    }


    public function transrecebidas()
    {
        return view('freelancer/transrecebidas');
    }



    public function candidatarvaga()
    {

        $idVaga = $this->request->getGet('idVaga');
        $idEvento = $this->request->getGet('idEvento');
        $user_id = user_id();

        $db = db_connect();
        $sql = 'SELECT vagas_id, freelancer_id FROM contratados WHERE vagas_id = ? AND freelancer_id = ?';
        $stmt = $db->connID->prepare($sql);
        $stmt->bind_param('ii', $idVaga, $user_id); // 'ii' indica que ambos são inteiros
        $stmt->execute();
        $result = $stmt->get_result();
        $num_rows = $result->num_rows;

        if($this->VerificaCadastroCurriculo() >= 1)
        {
            if($this->VerificaFreelancerContratado($user_id, $idEvento) == 0){

                if($num_rows == 0)
                {
                    $contratadosModel = new contratadosModel();
                    $contratadosModel->set('evento_id',$idEvento);
                    $contratadosModel->set('freelancer_id', user_id());
                    $contratadosModel->set('solicitante_id', user_id());
                    $contratadosModel->set('vagas_id', $idVaga);
                    $contratadosModel->set('status', NULL);
                    $contratadosModel->insert();
            
                    $resposta = ['msg' => "Candidatou-se a vaga com sucesso.", 'success' => true];
            
                    return $this->response->setJSON($resposta);

                }
                else
                {

                    $resposta = ['msg' => "Já se candidatou a essa vaga ou o contratante já solicitou seu serviço. Verifique a tela de serviços", "success"=> false];

                    return $this->response->setJSON($resposta);
                }

            }else{
                $resposta = ['msg' => "Já foi contratado para esse evento", "success"=> false];

                return $this->response->setJSON($resposta);
            }
            
                
        }
        else
        {
            $resposta = ['msg' => "É necessário cadastrar o currículo antes de se candidatar a vaga!!"];

            return $this->response->setJSON($resposta);
        }
    }



}
