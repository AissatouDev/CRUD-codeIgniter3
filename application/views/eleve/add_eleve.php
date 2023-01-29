<?php $this->load->view('includes/header'); ?>

	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-center">Ajouter Elève</h5>
					<form method="post" action="<?= base_url() ?>eleve/add">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Prénom</label>
							<input type="text" class="form-control <?php echo form_error('prenom') ? 'is-invalid':'' ; ?> " name="prenom" id="exampleFormControlInput1"
							value="<?php echo set_value('prenom'); ?>">
							<span class="text-danger"><?= form_error('prenom') ?></span>
						</div>
						
						<div class="mb-3">
							<label for="exampleFormControlInput2" class="form-label">Nom</label>
							<input type="text" name="nom" class="form-control <?php echo form_error('nom') ? 'is-invalid':'' ; ?> "
							id="exampleFormControlInput2">
							<span class="text-danger"><?= form_error('nom') ?></span>
						</div>

						<div class="mb-3">
							<label for="sexe" class="form-label">Sexe</label>
							<select id="sexe" name="sexe" class="form-select <?php echo form_error('sexe') ? 'is-invalid':'' ; ?> ">
								<option value="">Sélectionner</option>
								<option value="Homme">Homme</option>
								<option value="Femme">Femme</option>
							</select>
							<span class="text-danger"><?= form_error('sexe') ?></span>
						</div>

						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Date naissance</label>
							<input name="date_naiss" type="date" class="form-control <?php echo form_error('date_naiss') ? 'is-invalid':'' ; ?> " id="exampleFormControlInput1">
							<span class="text-danger"><?= form_error('date_naiss') ?></span>
						</div>

						<div class="mb-3">
							<label for="pays_id">Pays</label>
							<select class="form-select <?php echo form_error('pays_id') ? 'is-invalid':'' ; ?> " id="pays_id" name="pays_id">
								<option value="">Sélectionner un pays</option>
								<?php foreach($pays as $row) { ?>
									<option value="<?=$row->id?>"><?=$row->libelle?></option>
								<?php } ?>
							</select>
							<span class="text-danger"><?= form_error('pays_id') ?></span>
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

    