<?php

class Pays extends CI_Controller
 {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pays_model');
	}

	function index()
	{
		$data = array("data"=>$this->Pays_model->getAllPays());
		$this->load->view('pays/index', $data);
	}

	function add()
	{
		$libelle = $this->input->post('libelle');

		$this->form_validation->set_rules('libelle', 'Libelle', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('pays/add_pays');
		} else {
			$data = array(
				'libelle'=>$libelle
			);
			$status = $this->Pays_model->insertPays($data);
			if ($status == true) {
				$this->session->set_flashdata('success', 'Ajouté avec succès!');
				redirect(base_url('pays/index'));
			}else{
				$this->session->set_flashdata('error', 'Une erreur est survenue');
				$this->load->view('pays/add_pays');
			}
		}
	}

	function edit($id)
	{
		$data['pays'] = $this->Pays_model->getOnePays($id);
        $data['id']=$id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$libelle = $this->input->post('libelle');
			$data = array(
				'libelle'=>$libelle
			);
			$status = $this->Pays_model->updatePays($data, $id);
            if ($status == true) {
                $this->session->set_flashdata('success', 'Modification effectuée avec succès!');
                redirect(base_url('pays/index'));
            } else {
                $this->session->set_flashdata('error', 'Erreur');
                $this->load->view('pays/edit_pays');
            }
        }

        $this->load->view('pays/edit_pays',$data);
	}


	function delete($id)
	{
		if(is_numeric($id))
        {
            $status =$this->Pays_model->deletePays($id);
            if ($status == true) {
                $this->session->set_flashdata('deleted', 'Suppression effectuée avec succès!');
                redirect(base_url('pays/index/'));
            } else {
                $this->session->set_flashdata('error', 'Error');
                redirect(base_url('pays/index/'));
            }
        }
	}
 }
