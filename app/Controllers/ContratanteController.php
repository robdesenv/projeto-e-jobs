<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \App\Models\contratanteModel;

class ContratanteController extends BaseController
{
    public function index()
    {
        return view(name: 'contratante/iniciocontratante');
    }
    public function minhaempresa()
    {
        $data['acao'] = 'Salvar';
        
        $user_id = user_id();
        $db = db_connect();
        $sql = 'SELECT user_id FROM `contratante` WHERE user_id = ' .$user_id ;
        $resultado = $db->connID->query($sql);
        $num_rows = mysqli_num_rows($resultado);
       
        if ($num_rows >= 1){ 

            $contratanteModel = new \App\Models\contratanteModel();
            $data['contratantes'] = $contratanteModel->where('user_id',$user_id)->find();;
        
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
        return view(name: 'contratante/vagaspub');
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
