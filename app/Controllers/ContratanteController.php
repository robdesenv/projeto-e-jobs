<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\contratadosModel;
use CodeIgniter\HTTP\ResponseInterface;
use \App\Models\contratanteModel;
use \App\Controllers\CargosFreelancerController;
use LengthException;

class ContratanteController extends BaseController
{
    public function VerificaCadastroInformacoes():int {
        $user_id = user_id();
        $db = db_connect();
        $sql = 'SELECT user_id FROM `contratante` WHERE user_id = ?';
        $stmt = $db->connID->prepare($sql);
        $stmt->bind_param('i', $user_id);
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
        return view(name: 'contratante/iniciocontratante');
    }



    public function minhaempresa()
    {
        $data['acao'] = 'Salvar';
        
        $user_id = user_id();
        
        if ($this->VerificaCadastroInformacoes() >= 1){ 

            $contratanteModel = new contratanteModel();
            $data['contratantes'] = $contratanteModel->where('user_id',$user_id)->find();
        
            return view('contratante/exibirempresa', $data);
        }else{
            if($this->request->getMethod() === 'POST'){
                $contratanteModel = new contratanteModel();
                $contratanteModel->set('nome', $this->request->getPost('nome'));
                $contratanteModel->set('telefone', $this->request->getPost('telefone'));
                $contratanteModel->set('email', $this->request->getPost('email'));
                $contratanteModel->set('data_nasc', $this->request->getPost('data_nasc'));
                $contratanteModel->set('estado', $this->request->getPost('estado'));
                $contratanteModel->set('cidade', $this->request->getPost('cidade'));
                $contratanteModel->set('empresa', $this->request->getPost('empresa'));
                $contratanteModel->set('user_id', user_id());
    
                if($contratanteModel->insert()){
                    $data['msg'] = 'Curriculo cadastrado';
                }else{
                    $data['msg'] = 'Erro ao cadastrar';
                }
                return redirect()->to(base_url('contratante/minhaempresa'));
            }
            return view('contratante/minhaempresa', $data);
        }
    }




    public function vagaspub()
    {
        $data['msg'] = '';
        $db = db_connect();
        
        
            if($this->request->getMethod() == 'POST')
            {
                $btneventos = $this->request->getPost('btn-eventos');

                if($btneventos == 'adicionarevento')
                {
                    if($this->VerificaCadastroInformacoes() >= 1){
                        $btnEventoId = $this->request->getPost('eventoId');
                        if($btnEventoId == '')
                        { //cadastrar evento
                            $eventosModel = new \App\Models\eventosModel();
                            $eventosModel->set('nome', $this->request->getPost('nome'));
                            $eventosModel->set('descricao',  $this->request->getPost('descricao'));
                            $eventosModel->set('data',$this->request->getPost('data'));
                            $eventosModel->set('endereco', $this->request->getPost('endereco'));
                            $eventosModel->set('cidade', $this->request->getPost('cidade'));
                            $eventosModel->set('estado', $this->request->getPost('estado'));
                            $eventosModel->set('status',  false);
                            $eventosModel->set('user_id', user_id());

                            if($eventosModel->insert())
                            {
                                session()->setFlashdata('msg-success', "Evento Criado");
                                return redirect()->to(base_url('contratante/vagaspub'));
                            }
                            else
                            {
                                $data['msg'] = '<p style="color:red;">Erro ao criar evento</p>';
                            }
                        }elseif($btnEventoId != '')
                        { // Editar evento
                            $this->editEventos($btnEventoId);
                            return redirect()->to(base_url('contratante/vagaspub'));
                        }
                    }else{
                        session()->setFlashdata('msg', "ERRO: É necessário cadastrar os dados Pessoais e os dados da Empresa na aba 'Ver minha empresa'");
                        return redirect()->to(base_url('contratante/vagaspub'));
                    }
                    
                    
                }elseif($btneventos == 'adicionarvaga')
                {
                    $vagasModel = new \App\Models\vagasModel();
                    $cargos_id = intval($this->request->getPost('cargo_id'));
                    $vagasModel->set('evento_id', $this->request->getPost('evento_id'));
                    $vagasModel->set('valor', $this->request->getPost('valor'));
                    $vagasModel->set('cargo_id', $cargos_id);
                    $vagasModel->set('quantidade', $this->request->getPost('quantidade'));

                    $vagasModel->insert();

                    session()->setFlashdata('msg-success', "Vaga adicionada.");
                    return redirect()->to(base_url('contratante/vagaspub'));
                }
                
            }
        


        //exibir eventos
        $user_id = user_id();    
        $eventosModel = new \App\Models\eventosModel();
        $data['eventos'] = $eventosModel->where('user_id',$user_id)->find();

        //exibir cargos
        $cargoModel = new \App\Models\cargosModel();
        $data['cargos'] = $cargoModel->findAll();

        //exibir vagas
        $sql = 'SELECT vagas.id, cargos.cargo, vagas.quantidade,vagas.evento_id FROM cargos JOIN vagas ON vagas.cargo_id = cargos.id';
        $data['vagas'] = $db->connID->query($sql);

        //exibir solicitações
        $idVaga = $this->request->getGet('idVaga');

        if($idVaga)
        {
            if(!empty($idVaga))
            {
                $sql = 'SELECT contratados.id, contratados.evento_id, freelancer.id as freelancer_id, freelancer.nome, contratados.status, vagas.id as vaga_id, contratados.solicitante_id, freelancer.user_id
                FROM contratados 
                JOIN freelancer on contratados.freelancer_id = freelancer.user_id 
                JOIN vagas ON contratados.vagas_id=vagas.id
                WHERE vagas.id = ?
                ORDER BY CASE 
                    WHEN contratados.status = 1 THEN 1
                    WHEN contratados.status IS NULL THEN 2
                    WHEN contratados.status = 0 THEN 3
                END;';

                $query = $db->query($sql, [$idVaga]);
                $resultados = $query->getResultArray();

                $retorna = ['msg' => $idVaga, 'solicitacoes' => $resultados];
                }

            return $this->response->setJSON($retorna);
        }
        

        return view( 'contratante/vagaspub',$data);

    }

    public function exibirInformacoesFreelancer()
    {

        $idFreelancer = $this->request->getGet('idFreelancer');

        if($idFreelancer)
        {
            if(!empty($idFreelancer))
            {
                $db = db_connect();

                $sql = 'SELECT * FROM freelancer WHERE id = ?';

                $query = $db->query($sql,[$idFreelancer]);
                $resultados = $query->getResultArray();

                //exibe os cargos do freelancer
                $CargosFreelancerController = new  CargosFreelancerController();
                foreach($resultados as $resultado)
                {
                    $cargosfreelancer = $CargosFreelancerController->ExibirCargosFreelancer($resultado['user_id']);
                }
                

                $retorna = ['informacoes' => $resultados, 'cargosFreelancer'=> $cargosfreelancer];
            }
            return $this->response->setJSON($retorna);
        }
    }



    public function editEventos($id)
    {

        $eventosModel = new \App\Models\eventosModel();

        if($this->request->getMethod() == 'POST')
        {
            $eventos['nome'] = $this->request->getPost('nome');
            $eventos['endereco'] = $this->request->getPost('endereco');
            $eventos['cidade'] = $this->request->getPost('cidade');
            $eventos['estado'] = $this->request->getPost('estado');
            $eventos['data'] = $this->request->getPost('data');
            $eventos['descricao'] = $this->request->getPost('descricao');
            $eventos['status'] = $this->request->getPost('status');

            if ($eventosModel->update($id, $eventos)) 
            {
                return redirect('contratante/vagaspub');
            }
        }

        return view('contratante/vagaspub');
    }

    public function finalizarEvento($id){
        $eventosModel = new \App\Models\eventosModel();
        $data_atual = date("Y-m-d");

        $evento['status'] = true;
        $evento['finalizado_em'] = $data_atual;
        

        if($eventosModel->update($id,$evento)){
            session()->setFlashdata('msg-success', "Evento Finalizado.");
            return redirect()->to(base_url('contratante/vagaspub'));
        }else{
            session()->setFlashdata('msg', "Erro ao finalizar");
            return redirect()->to(base_url('contratante/vagaspub'));
        }

        
    }

    public function deleteEventos($id)
    {
        try 
        {
            $eventosModel = new \App\Models\eventosModel();
            if($eventosModel->delete($id))
            {
                //evento excluido
            }
            session()->setFlashdata('msg-success', "Evento excluido.");
            return redirect()->to(base_url('contratante/vagaspub'));}
        catch(\Exception $e)
        {
            session()->setFlashdata('msg', "Não foi possível excluir o evento pois possui vagas cadastradas. É necessário excluir as vagas primeiro.");
            return redirect()->to(base_url('contratante/vagaspub'));
        }
        
    }



    public function deleteVagas($id)
    {
        try 
        {
            $vagasModel = new \App\Models\vagasModel();
            if($vagasModel->delete($id))
            {
                //vaga excluida
            }
            session()->setFlashdata('msg-success', "Vaga excluida.");
            return redirect()->to(base_url('contratante/vagaspub'));
        }catch(\Exception $e)
        {
            session()->setFlashdata('msg', "Não foi possível excluir. Possui solicitações de Freelancers para essa vaga.");
            return redirect()->to(base_url('contratante/vagaspub'));
        }
    }



    public function solicitacoes()
    {
        $idSolicitacao = $this->request->getGet('IdSolicitacao');
        $idEvento = $this->request->getGet('IdEvento');
        $UserId = $this->request->getGet('UserId');
        $btn = $this->request->getGet('btn');

        

        if($idSolicitacao)
        {

            if($btn == 'contratar')
            {
                if($this->VerificaFreelancerContratado($UserId,$idEvento) == 0){
                    $contratadosModel = new contratadosModel();
            
                    $contratados['status'] = true;

                    if($contratadosModel->update($idSolicitacao, $contratados))
                    {
                        $resposta = ['msg'=> 'atualizado','btn'=> $btn, 'evento'=>$idEvento, 'userid' => $UserId];
                    }
                }else{
                    $resposta = ['msg'=> 'Freelancer já contratado para este evento.'];

                    $contratadosModel = new contratadosModel();
            
                    $contratados['status'] = false;

                    $contratadosModel->update($idSolicitacao, $contratados);
                }
                

                

            }elseif($btn == 'recusar')
            {

                $contratadosModel = new contratadosModel();

                $contratados['status'] = false;

                if($contratadosModel->update($idSolicitacao, $contratados))
                {
                    $resposta = ['msg'=> 'recusado','btn'=> $btn];
                }
            }

            return $this->response->setJSON( $resposta );
        }
    }



    public function busca()
    {


        //exibir cargos
        $cargoModel = new \App\Models\cargosModel();
        $data['cargos'] = $cargoModel->findAll();

        //exibir vagas
        $id = user_id();
        $sql = 'SELECT cargos.cargo, eventos.nome, eventos.user_id, vagas.id, vagas.evento_id
        FROM vagas JOIN cargos ON vagas.cargo_id = cargos.id
        JOIN eventos ON vagas.evento_id = eventos.id
        WHERE eventos.user_id = ?';
        $db = db_connect();
        $query = $db->query($sql, [$id]);
        $data['vagas'] = $query->getResultArray();

        //exibir os cargos cadastrados para o freelancer
        $data['CargosFreelancerController'] = new  CargosFreelancerController();
        

        $data['msg'] = '';
        
        if($this->request->getMethod() === 'POST'){

            $idVaga = $this->request->getPost('idVaga');
            $idFreelancer = $this->request->getPost('idFreelancer');
            $idEvento = $this->request->getPost('idEvento');

            $db = db_connect();
            $sql = 'SELECT vagas_id, freelancer_id FROM contratados WHERE vagas_id = ? AND freelancer_id = ?';
            $stmt = $db->connID->prepare($sql);
            $stmt->bind_param('ii', $idVaga, $idFreelancer);
            $stmt->execute();
            $result = $stmt->get_result();
            $num_rows = $result->num_rows;


            if($this->VerificaFreelancerContratado($idFreelancer, $idEvento) == 0){
                if($num_rows >= 1)
                {
                    session()->setFlashdata('msg', '<div class="alert alert-warning" role="alert">
                                                Já foi criada uma solicitação deste Freelancer para esta vaga.
                                            </div>');
                }else
                {
                    $contratadosModel = new contratadosModel();

                    $contratadosModel->set('evento_id', $this->request->getPost('idEvento'));
                    $contratadosModel->set('solicitante_id', user_id());
                    $contratadosModel->set('freelancer_id', $this->request->getPost('idFreelancer'));
                    $contratadosModel->set('vagas_id', $this->request->getPost('idVaga'));
                    $contratadosModel->set('status', null);

                    if($contratadosModel->insert())
                    {
                        session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">Solicitação enviada com sucesso.</div>');
                        
                    } 
                }
            }else{
                session()->setFlashdata('msg', '<div class="alert alert-danger" role="alert">
                                                Freelancer já contratado para o Evento.
                                            </div>');
            }
            
        }

        return view('contratante/busca',$data);
    }


    public function filtrarFreelancers(){

        $cargoId = $this->request->getGet('cargoId');

        if(!empty($cargoId))
        {
            $db = db_connect();
            $sql = 'SELECT * from freelancer join cargo_freelancer ON cargo_freelancer.user_id = freelancer.user_id WHERE cargo_freelancer.cargo_id = ?';
            $query = $db->query($sql, [$cargoId]);
            $freelancers = $query->getResultArray();
            $num_rows = count($freelancers);

            if($num_rows > 0){
                //procurar cargos caso exista freelancers
                $CargosFreelancerController = new  CargosFreelancerController();
                foreach($freelancers as $resultado)
                {
                    $cargosfreelancer[] = $CargosFreelancerController->ExibirCargosFreelancer($resultado['user_id']);
                }

            $reponse = ['id' => $cargoId, 'freelancers' => $freelancers, 'cargosFreelancer'=> $cargosfreelancer ];
            }else{
                $reponse = ['id' => $cargoId, 'freelancers' => $freelancers ];
            }
            
            return  $this->response->setJSON($reponse);

        }else
        {
            $freelancerModel = new \App\Models\freelancerModel();

            /*$data = [
                'freelacers' => $freelancerModel->paginate(10),
                'pager' => $freelancerModel->pager
            ];*/

            $freelancer = $freelancerModel->findAll();

            $CargosFreelancerController = new  CargosFreelancerController();
                foreach($freelancer as $resultado)
                {
                    $cargosfreelancer[] = $CargosFreelancerController->ExibirCargosFreelancer($resultado['user_id']);
                }

            $response = ['freelancers' => $freelancer, 'cargosFreelancer'=> $cargosfreelancer ];

            return  $this->response->setJSON($response);
        }
    }



    public function editInformacoes($id)
    {

        $data['acao'] = 'Editar';
        $contratanteModel = new contratanteModel();
        $contratante = $contratanteModel->find($id);

        if($this->request->getMethod() == 'POST')
        {
            $contratante['nome'] = $this->request->getPost('nome');
            $contratante['telefone'] = $this->request->getPost('telefone');
            $contratante['email'] = $this->request->getPost('email');
            $contratante['dataNasc'] = $this->request->getPost('dataNasc');
            $contratante['estado'] = $this->request->getPost('estado');
            $contratante['cidade'] = $this->request->getPost('cidade');
            $contratante['empresa'] = $this->request->getPost('empresa');

            if ($contratanteModel->update($id, $contratante)) 
            {
                return redirect('contratante/minhaempresa');
            }
        }

        $data['contratante'] = $contratante;

        return view('contratante/minhaempresa', $data);

    }



    public function pagamentos()
    {
        return view(name: 'contratante/pagamentos');
    }



}
