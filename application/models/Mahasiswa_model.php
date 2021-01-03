<?php

/**
 * 	
 */
class Mahasiswa_model extends CI_Model
{
	public function getAllMahasiswa()
	{
		//select * from mahasiswa , result_array = menampilkan semua data dalam array
		return $this->db->get('mahasiswa')->result_array();
	}

	public function tambahDataMahasiswa()
	{
		//menyiapkan var data yang berisi
		// "nama" = field pada database
		//=> this->input->post('nama',true) = mengambil method post dari form pada view
		$data = [
			"nama" => $this->input->post('nama', true),
			"nrp" => $this->input->post('nrp', true),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true)
		];
		// inset into mahasiswa (nama,nrp,email,jurusan) values(nama,nrp,email,jurusan)
		$this->db->insert('mahasiswa', $data);
	}

	public function hapusDataMahasiswa($id)
	{
		//delete mahasiswa where id = $id
		//$this->db->where('id', $id);
		$this->db->delete('mahasiswa', ['id' => $id]);
	}

	public function getMahasiswaByid($id)
	{
		return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
		//select mahasiswa from tbl_mahasiswa where id = $id
		//row array menampilkan satu row dari table
	}

	public function ubahDataMahasiswa($id)
	{
		//menyiapkan var data yang berisi
		// "nama" = field pada database
		//=> this->input->post('nama',true) = mengambil method post dari form pada view
		$data = [
			"nama" => $this->input->post('nama', true),
			"nrp" => $this->input->post('nrp', true),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true)
		];
		//update MAHASISWA set nama = value,column2 = value2
		//where id = post('id')
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('mahasiswa', $data);
	}

	public function cariDataMahasiswa()
	{
		//select * from mahasiswa like '%nama%'
		$keyword = $this->input->post('keyword', true);
		//query cari data
		$this->db->like('nama', $keyword);
		$this->db->or_like('jurusan', $keyword);
		$this->db->or_like('email', $keyword);
		$this->db->or_like('nrp', $keyword);
		return $this->db->get('mahasiswa')->result_array();
	}
}
