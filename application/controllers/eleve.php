<?php

class Eleve extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Eleve_model');
		$this->load->model('Pays_model');
	}

	function add()
	{
		$prenom = $this->input->post('prenom');
		$nom = $this->input->post('nom');
		$sexe = $this->input->post('sexe');
		$date_naiss = $this->input->post('date_naiss');
		$pays_id = $this->input->post('pays_id');
		$data['pays'] = $this->Pays_model->getAllPays();

		$this->form_validation->set_rules('prenom', 'Prenom', 'required');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('sexe', 'Sexe', 'required');
		$this->form_validation->set_rules('date_naiss', 'Date naissance', 'required');
		$this->form_validation->set_rules('pays_id', 'Pays_id', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('eleve/add_eleve', $data);
		} else {
			$data = array(
				'prenom'=>$prenom,
				'nom'=>$nom,
				'sexe'=>$sexe,
				'date_naiss'=>$date_naiss,
				'pays_id'=>$pays_id
			);
			
			$status = $this->Eleve_model->insertStudent($data);
			if ($status == true) {
				$this->session->set_flashdata('success', 'Ajouté avec succès!');
				redirect(base_url('eleve/index'));
			}else{
				$this->session->set_flashdata('error', 'Une erreur est survenue');
				$this->load->view('eleve/add_eleve');
			}

		} 		
	}

	
	function index()
	{
		$data = array("data"=>$this->Eleve_model->getStudents());
		$this->load->view('eleve/index', $data);
	}

	function edit($id)
    {
        $data['eleve'] = $this->Eleve_model->getStudent($id);
        $data['id']=$id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prenom = $this->input->post('prenom');
			$nom = $this->input->post('nom');
			$sexe = $this->input->post('sexe');
			$date_naiss = $this->input->post('date_naiss');
			$pays_id = $this->input->post('pays_id');
			$data = array(
				'prenom'=>$prenom,
				'nom'=>$nom,
				'sexe'=>$sexe,
				'date_naiss'=>$date_naiss,
				'pays_id'=>$pays_id
			);
			$status = $this->Eleve_model->updateStudent($data, $id);
            if ($status == true) {
                $this->session->set_flashdata('success', 'Modification effectuée avec succès!');
                redirect(base_url('eleve/index'));
            } else {
                $this->session->set_flashdata('error', 'Erreur');
                $this->load->view('eleve/edit_eleve');
            }
        }
		$data['pays'] = $this->Pays_model->getAllPays();
        $this->load->view('eleve/edit_eleve',$data);
    }

    function delete($id)
    {
        if(is_numeric($id))
        {
            $status =$this->Eleve_model->deleteStudent($id);
            if ($status == true) {
                $this->session->set_flashdata('deleted', 'Suppression effectuée avec succès!');
                redirect(base_url('eleve/index/'));
            } else {
                $this->session->set_flashdata('error', 'Error');
                redirect(base_url('eleve/index/'));
            }
        }
    }

}
