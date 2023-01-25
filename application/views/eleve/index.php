<?php $this->load->view('includes/header'); ?>

	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-center">Liste des élèves</h5>
						</div>
						<div class="col">
							<a href="<?= base_url() ?>eleve/add">Ajouter</a>
						</div>
					</div>
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>N°</th>
								<th>Prénom</th>
								<th>Nom</th>
								<th>Sexe</th>
								<th>Date Naissance</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($eleves as $row) { ?> 
							<tr>
								<td><?=$i++?></td>
								<td><?=$row['prenom']?></td>
								<td><?=$row['nom']?></td>
								<td><?=$row['sexe']?></td>
								<td><?=$row['date_naiss']?></td>
								<td>
									<a href="<?=base_url()?>eleve/edit/<?=$row['id']?>" class="btn btn-sm btn-primary">Edit</a>
									<a href="<?=base_url()?>eleve/delete/<?=$row['id']?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer cet élève ?')" class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
                	</table>
					<?php
					if ($this->session->flashdata('success')) { ?>
						<div class="alert alert-success" role="alert">
							Enregistré avec succès!
						</div>
					<?php }
					?>
					<?php
					if ($this->session->flashdata('deleted')) { ?>
						<div class="alert alert-success" role="alert">
							Elève supprimé avec succès!
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

    