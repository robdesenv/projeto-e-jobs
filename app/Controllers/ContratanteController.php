<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \App\Models\contratanteModel;

class ContratanteController extends BaseController
{
    public function VerificaCadastroInformacoes():int {
        $user_id = user_id();
        $db = db_connect();
        $sql = 'SELECT user_id FROM `contratante` WHERE user_id = ' .$user_id;
        $resultado = $db->connID->query($sql);
        $num_rows = mysqli_num_rows($resultado);
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

            $contratanteModel = new \App\Models\contratanteModel();
            $data['contratantes'] = $contratanteModel->where('user_id',$user_id)->find();
        
            return view('contratante/exibirempresa', $data);
        }else{
            if($this->request->getMethod() === 'POST'){
                $contratanteModel = new \App\Models\contratanteModel();
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
                header("Refresh: 0");
            }
            return view('contratante/minhaempresa', $data);
        }
    }
    public function vagaspub()
    {
        $data['msg'] = '';
        $db = db_connect();
        
        if($this->VerificaCadastroInformacoes() >= 1){
            if($this->request->getMethod() == 'POST'){
                $btneventos = $this->request->getPost('btn-eventos');
                if($btneventos == 'adicionarevento'){
                    $btnEventoId = $this->request->getPost('eventoId');
                    if($btnEventoId == ''){ //cadastrar evento
                        $eventosModel = new \App\Models\eventosModel();
                        $eventosModel->set('nome', $this->request->getPost('nome'));
                        $eventosModel->set('descricao',  $this->request->getPost('descricao'));
                        $eventosModel->set('data',$this->request->getPost('data'));
                        $eventosModel->set('endereco', $this->request->getPost('endereco'));
                        $eventosModel->set('cidade', $this->request->getPost('cidade'));
                        $eventosModel->set('status',  $this->request->getPost('status'));
                        $eventosModel->set('user_id', user_id());

                        if($eventosModel->insert()){
                            $data['msg'] = '<p style="color:green;">Evento Criado<p>';
                            header("Refresh: 0");
                        }else{
                            $data['msg'] = '<p style="color:red;">Erro ao criar evento</p>';
                        }
                    }elseif($btnEventoId != ''){ // Editar evento
                        $this->editEventos($btnEventoId);
                        header("Refresh: 0");
                    }
                    
                }elseif($btneventos == 'adicionarvaga'){
                    $vagasModel = new \App\Models\vagasModel();
                    $cargos_id = intval($this->request->getPost('cargo_id'));
                    $vagasModel->set('evento_id', $this->request->getPost('evento_id'));
                    $vagasModel->set('cargo_id', $cargos_id);
                    $vagasModel->set('quantidade', $this->request->getPost('quantidade'));

                    $vagasModel->insert();

                    header("Refresh: 0");
                }
                
            }
        }else{
            $data['msg'] = '<p style="color:red;">ERRO: É necessário cadastrar os dados Pessoais e os dados da Empresa na aba "Ver minha empresa"</p>';
        }


        //exibir eventos
        $user_id = user_id();    
        $eventosModel = new \App\Models\eventosModel();
        $data['eventos'] = $eventosModel->where('user_id',$user_id)->find();

        //exibir cargos
        $cargoModel = new \App\Models\cargosModel();
        $data['cargos'] = $cargoModel->findAll();

        //exibir vagas
        $vagasModel = new \App\Models\vagasModel();

        $sql = 'SELECT vagas.id, cargos.cargo, vagas.quantidade,vagas.evento_id FROM cargos JOIN vagas ON vagas.cargo_id = cargos.id';
        $data['vagas'] = $db->connID->query($sql);

        return view(name: 'contratante/vagaspub',data: $data);

    }

    public function editEventos($id){

        $eventosModel = new \App\Models\eventosModel();

        if($this->request->getMethod() == 'POST'){
            $eventos['nome'] = $this->request->getPost('nome');
            $eventos['endereco'] = $this->request->getPost('endereco');
            $eventos['cidade'] = $this->request->getPost('cidade');
            $eventos['data'] = $this->request->getPost('data');
            $eventos['descricao'] = $this->request->getPost('descricao');
            $eventos['status'] = $this->request->getPost('status');

            if ($eventosModel->update($id, $eventos)) {
                return redirect('contratante/vagaspub');
            }
        }
        echo view('contratante/vagaspub');
    }

    public function deleteEventos($id){
        $eventosModel = new \App\Models\eventosModel();
        if($eventosModel->delete($id)){
        }
        return redirect()->to(base_url('contratante/vagaspub'));
    }

    public function deleteVagas($id){
        $vagasModel = new \App\Models\vagasModel();
        if($vagasModel->delete($id)){
        }
        return redirect()->to(base_url('contratante/vagaspub'));
    }

    public function busca()
    {
        $freelancerModel = new \App\Models\freelancerModel();
        $data = [
            'freelacers' => $freelancerModel->paginate(10),
            'pager' => $freelancerModel->pager
        ];

        //exibir cargos
        $cargoModel = new \App\Models\cargosModel();
        $data['cargos'] = $cargoModel->findAll();

        return view(name: 'contratante/busca',data: $data);
    }
    public function pagamentos()
    {
        return view(name: 'contratante/pagamentos');
    }


    public function editInformacoes($id){

        $data['acao'] = 'Editar';
        $contratanteModel = new \App\Models\contratanteModel();
        $contratante = $contratanteModel->find($id);

        if($this->request->getMethod() == 'POST'){
            $contratante['nome'] = $this->request->getPost('nome');
            $contratante['telefone'] = $this->request->getPost('telefone');
            $contratante['email'] = $this->request->getPost('email');
            $contratante['dataNasc'] = $this->request->getPost('dataNasc');
            $contratante['estado'] = $this->request->getPost('estado');
            $contratante['cidade'] = $this->request->getPost('cidade');
            $contratante['empresa'] = $this->request->getPost('empresa');

            if ($contratanteModel->update($id, $contratante)) {
                return redirect('contratante/minhaempresa');
            }
        }
        $data['contratante'] = $contratante;

        echo view('contratante/minhaempresa', $data);

}
}
