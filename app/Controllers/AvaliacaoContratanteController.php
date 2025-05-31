<?php

namespace App\Controllers;
use \App\Models\avaliacaoContratanteModel;

class AvaliacaoContratanteController extends BaseController
{
    public function avaliacaoContratante()
    {
        //exibir avaliação
        $db = db_connect();
        $user_id = user_id();
        $sql = 'SELECT 
                    eventos.id,
                    eventos.user_id,
                    contratante.nome AS contratante, 
                    eventos.nome AS evento,
                    cargos.cargo,
                    DATE_FORMAT(eventos.finalizado_em, "%d/%m/%Y") as finalizado_em
                FROM eventos
                JOIN contratante ON eventos.user_id = contratante.user_id
                JOIN vagas ON vagas.evento_id = eventos.id
                JOIN cargos ON vagas.cargo_id = cargos.id
                WHERE eventos.status = TRUE AND (SELECT COUNT(*) FROM `contratados` WHERE contratados.status=true and evento_id = eventos.id and contratados.vagas_id = vagas.id and freelancer_id = ?) != 0 AND 
                (SELECT COUNT(*) FROM avaliacao_contratante WHERE 	
                avaliacao_contratante.evento_id = eventos.id AND 
                avaliacao_contratante.contratante_id = eventos.user_id) = 0;';
        
        $query = $db->query($sql, [$user_id]);
        $data['avaliacao'] = $query->getResultArray();


        //enviar avaliacao
        if($this->request->getMethod() == "POST"){
            $avaliacaoModel = new avaliacaoContratanteModel();

            $avaliacaoModel->set('evento_id',$this->request->getPost('eventoId'));
            $avaliacaoModel->set('contratante_id',$this->request->getPost('contratanteId'));
            $avaliacaoModel->set('qualidade_trabalho',$this->request->getPost('quality'));
            $avaliacaoModel->set('ambiente',$this->request->getPost('ambiente'));
            $avaliacaoModel->set('comentario',$this->request->getPost('comment'));

            if($avaliacaoModel->insert()){
                session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">
                                                    Avaliação cadastrada com sucesso!!
                                                </div>');
                return redirect()->to(base_url("freelancer/avaliacao"));
            }

        }


        return view('freelancer/avaliacao',$data);
    }

    public function mediaAvaliacao($id){
        $db = db_connect();
        $sql = 'SELECT ROUND(AVG(avaliacao_contratante.qualidade_trabalho),1) as avaliacao_media from contratante 
        JOIN avaliacao_contratante ON contratante.user_id = avaliacao_contratante.contratante_id
        WHERE contratante.user_id = ?';
        $query = $db->query($sql, [$id]);

        return $query->getResultArray();
    }

    public function comentariosAvaliacao($id){
        $db = db_connect();
        $sql = 'SELECT comentario from contratante 
        JOIN avaliacao_contratante ON contratante.user_id = avaliacao_contratante.contratante_id
        WHERE contratante.user_id = ?';
        $query = $db->query($sql, [$id]);

        return $query->getResultArray();
    }

}
