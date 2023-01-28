<?php $this->load->view('includes/header'); ?>

	<div class="container">
		<div class="row">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-center">Liste des pays</h5>
						</div>
						<div class="col">
							<a href="<?= base_url() ?>pays/add">Ajouter</a>
						</div>
					</div>
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>N°</th>
								<th>libellé</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($data as $key => $value) :?> 
							<tr>
								<td><?=$i++;?></td>
								<td><?=$value->libelle;?></td>
								<td>
									<a href="<?=base_url()?>pays/edit/<?=$value->id;?>" class="btn btn-sm btn-primary">Edit</a>
									<a href="<?=base_url()?>pays/delete/<?=$value->id;?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer ce pays ?')" class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>
							<?php endforeach; ?>
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
							Pays supprimé avec succès!
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

    