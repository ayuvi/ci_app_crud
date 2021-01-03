<div class="container">
	<!-- jika session di panggil -->
	<?php if ($this->session->flashdata('flash')) : ?>
		<div class="row mt-3">
			<div class="col-md-6">
				<!-- menampilkan flash data -->
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Mahasiswa <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="row mt-3">
		<div class="col-md-6">
			<!-- base url menampilkan controller mahasiswa dan function tambah -->
			<a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<form action="" method="post">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Cari Data Mahasiswa.." name="keyword">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit">Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<!-- memanggil var judul -->
			<h3><?= $judul; ?></h3>
			<!-- jika data yang di cari tidak ada pada var mahasiswa -->
			<?php if (empty($mahasiswa)) : ?>
				<div class="alert alert-danger" role="alert">
					Data mahasiswa tidak di temukan
				</div>
			<?php endif; ?>
			<ul class="list-group">
				<!-- mengulang dan menampilkan pada data var mahasiswa -->
				<?php foreach ($mahasiswa as $mhs) : ?>
					<li class="list-group-item">
						<!-- menampilkan field nama -->
						<?= $mhs['nama']; ?>
						<!-- base url ke controller mahasiswa method hapus/detail/ubah dan id dari field mhs -->
						<a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin');">Hapus</a>
						<a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right">Detail</a>
						<a href="<?= base_url(); ?>mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success float-right">Ubah</a>
					</li>

				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
