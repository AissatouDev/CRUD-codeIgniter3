<?php $this->load->view('includes/header'); ?>

	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-center">Ajouter Pays</h5>
					<form method="post" action="<?= base_url() ?>pays/add">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Libelle</label>
							<input type="text" class="form-control" name="libelle" id="exampleFormControlInput1">
						</div>
						<button type="submit" class="btn btn-primary">Créer</button>
					</form>
					<?php
					if ($this->session->flashdata('success')) { ?>
						<div class="alert alert-success" role="alert">
							Pays ajouté avec succès!
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

    