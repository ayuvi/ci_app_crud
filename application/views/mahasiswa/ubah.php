<div class="container">

	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
				<div class="card-header">
					<?= $judul; ?>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<!-- ubah id dengan type hidden dan value dari data mahasiswa field id -->
						<input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
						<div class="form-group">
							<label for="nama">Nama</label>
							<!-- value memanggil var mahasiswa field nama & fomr eror ketika nama tidak sesuai dengan validasi -->
							<input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama']; ?>">
							<small class="form-text text-danger"><?= form_error('nama'); ?></small>
						</div>
						<div class="form-group">
							<label for="nrp">NRP</label>
							<input type="text" name="nrp" class="form-control" id="nrp" value="<?= $mahasiswa['nrp']; ?>">
							<small class=" form-text text-danger"><?= form_error('nrp'); ?></small>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" class="form-control" id="email" value="<?= $mahasiswa['email']; ?>">
							<small class=" form-text text-danger"><?= form_error('email'); ?></small>
						</div>
						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<select class="form-control" id="jurusan" name="jurusan">
								<!-- mengulang data pada variable jurusan -->
								<?php foreach ($jurusan as $j) : ?>
									<!-- jika var j == field jurusan pada data mahasiswa -->
									<?php if ($j == $mahasiswa['jurusan']) : ?>
										<!-- memanggil nilai var j dan selected -->
										<option value="<?= $j; ?>" selected><?= $j; ?></option>
									<?php else : ?>
										<!-- jika tidak nilai echo var j -->
										<option value="<?= $j; ?>"><?= $j; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
					</form>
				</div>
			</div>


		</div>
	</div>


</div>
