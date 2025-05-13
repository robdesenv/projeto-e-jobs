<?php

namespace App\Controllers;
use \App\Models\avaliacaoFreelancerModel;

class avaliacaoFreelancerController extends BaseController
{
    public function avaliacaoFreelancer()
    {
        //exibir avaliação
        $db = db_connect();
        $sql = 'SELECT 
                    vagas.evento_id,
                    freelancer.user_id,
                    freelancer.nome AS freelancer, 
                    eventos.nome AS evento,
                    cargos.cargo,
                    DATE_FORMAT(eventos.finalizado_em, "%d/%m/%Y") as finalizado_em
                FROM freelancer
                JOIN contratados ON contratados.freelancer_id = freelancer.user_id
                JOIN eventos ON contratados.evento_id = eventos.id
                JOIN vagas ON contratados.vagas_id = vagas.id
                JOIN cargos ON cargos.id = vagas.cargo_id
                WHERE contratados.status = TRUE AND eventos.status = TRUE AND (SELECT COUNT(*) FROM avaliacao_freelancer WHERE 	
                                                                               avaliacao_freelancer.evento_id = vagas.evento_id AND 
                                                                               avaliacao_freelancer.freelancer_id = freelancer.user_id) = 0;';
        
        $query = $db->query($sql);
        $data['avaliacao'] = $query->getResultArray();


        //enviar avaliacao
        if($this->request->getMethod() == "POST"){
            $avaliacaoModel = new avaliacaoFreelancerModel();

            $avaliacaoModel->set('evento_id',$this->request->getPost('eventoId'));
            $avaliacaoModel->set('freelancer_id',$this->request->getPost('freelancerId'));
            $avaliacaoModel->set('qualidade_trabalho',$this->request->getPost('quality'));
            $avaliacaoModel->set('comunicacao',$this->request->getPost('communication'));
            $avaliacaoModel->set('comentario',$this->request->getPost('comment'));

            if($avaliacaoModel->insert()){
                session()->setFlashdata('msg', '<div class="alert alert-success" role="alert">
                                                    Avaliação cadastrada com sucesso!!
                                                </div>');
                return redirect()->to(base_url("contratante/avaliacao"));
            }

        }


        return view('contratante/avaliacao',$data);
    }

}
