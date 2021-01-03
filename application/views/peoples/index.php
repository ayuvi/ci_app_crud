<div class="container">
	<h3 class="mt-3">List of Peoples</h3>


	<div class="row">
		<div class="col-md-5">
			<form action="<?= base_url('peoples'); ?>" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Search Keyword.." name="keyword" autocomplete="off" autofocus>
					<div class="input-group-append">
						<input class="btn btn-primary" type="submit" name="submit">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md">
			<!-- menampilkan total dari rows -->
			<h5>Result :<?= $total_rows; ?></h3>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<!-- jika var peoples yang di cari kosoong maka menampilkan data not found -->
						<?php if (empty($peoples)) : ?>
							<tr>
								<td colspan="4">
									<div class="alert alert-danger" role="alert">
										Data Not Found!
									</div>
								</td>
							</tr>
						<?php endif; ?>
						<!-- menampilkan semua data array peoples
						dengan field yang di pilih dan no ++var start agar number berurut -->
						<?php foreach ($peoples as $people) : ?>
							<tr>
								<th><?= ++$start; ?></th>
								<td><?= $people['name']; ?></td>
								<td><?= $people['email']; ?></td>
								<td>
									<a href="" class="badge badge-warning">detail</a>
									<a href="" class="badge badge-success">edit</a>
									<a href="" class="badge badge-danger">delete</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<!-- menampilkan link pada pagination -->
				<?= $this->pagination->create_links(); ?>
		</div>
	</div>
</div>
