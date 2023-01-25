<?php $this->load->view('includes/header'); ?>

	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-center">Ajouter Elève</h5>
					<form method="post" action="<?= base_url() ?>eleve/add">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Prénom</label>
							<input type="text" class="form-control" name="prenom" id="exampleFormControlInput1">
						</div>
						<div class="mb-3">
							<label for="exampleFormControlInput2" class="form-label">Nom</label>
							<input type="text" name="nom" class="form-control" id="exampleFormControlInput2">
						</div>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Sexe</label>
							<select name="sexe" class="form-select" aria-label="Default select example">
								<option selected>Sélectionner</option>
								<option value="Homme">Homme</option>
								<option value="Femme">Femme</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Date naissance</label>
							<input name="date_naiss" type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
						</div>
						<button type="submit" class="btn btn-primary">Créer</button>
					</form>
					<?php
					if ($this->session->flashdata('success')) { ?>
						<div class="alert alert-success" role="alert">
							Elève ajouté avec succès!
						</div>
					<?php }
					?>
					<?php
					if ($this->session->flashdata('error')) { ?>
						<div class="alert alert-danger" role="alert">
							Une erreur est survenue
						</div>
					<?php }
					?>
				</div>	
			</div>	
		</div>	
    </div>

<?php $this->load->view('includes/footer'); ?>

    