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
        
        if($this->VerificaCadastroInformacoes() >= 1){
            if($this->request->getMethod() == 'POST'){
                $eventosModel = new \App\Models\eventosModel();
                $eventosModel->set('nome', $this->request->getPost('nome'));
                $eventosModel->set('descricao',  $this->request->getPost('descricao'));
                $eventosModel->set('data',$this->request->getPost('data'));
                $eventosModel->set('endereco', $this->request->getPost('endereco'));
                $eventosModel->set('cidade', $this->request->getPost('cidade'));
                $eventosModel->set('vagas', $this->request->getPost('vagas'));
                $eventosModel->set('status',  $this->request->getPost('status'));
                $eventosModel->set('user_id', user_id());

                if($eventosModel->insert()){
                    $data['msg'] = '<p style="color:green;">Evento Criado<p>';
                }else{
                    $data['msg'] = '<p style="color:red;">Erro ao criar evento</p>';
                }
            }
        }else{
            $data['msg'] = '<p style="color:red;">ERRO: É necessário cadastrar os dados Pessoais e os dados da Empresa na aba "Ver minha empresa"</p>';
        }


        //exibir eventos
        $user_id = user_id();    
        $eventosModel = new \App\Models\eventosModel();
        $data['eventos'] = $eventosModel->where('user_id',$user_id)->find();


        return view(name: 'contratante/vagaspub',data: $data);

    }

    public function busca()
    {
        return view(name: 'contratante/busca');
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
