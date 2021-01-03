<?php
class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		//memanggil construct model dan library
		parent::__construct();
		$this->load->model('mahasiswa_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		//variabel judul
		$data['judul'] = 'Daftar Data Mahasiswa';
		//variabel data mahasiswa yang berisi model mahasiswa dari function getallmahasiswa
		$data['mahasiswa'] = $this->mahasiswa_model->getAllMahasiswa();
		//jika ada input post dadri name keyword maka isi nya data mahasiswa dari model mahasiswa dan function caridatamahasiswa
		if ($this->input->post('keyword')) {
			$data['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
		}
		//jika tidak ada keyword memanggil view
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		//variabel judul
		$data['judul'] = 'form tambah data mahasiswa';
		//set rules untuk form valiidation (nama form, alias, rules yang di inginkan)
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//jika validasi berjalan tidak sesuai/false maka menampilkan view tambah
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/tambah');
			$this->load->view('templates/footer');
		//jika validasi berjalan sesuai dengan rules maka load model mahasiswa dan function tambahdatamahasiswa, dan set_flashdata menampilkan data berhasil di tambahkan
		//lalu redirect ke controller mahasiswa
		} else {
			$this->mahasiswa_model->tambahDataMahasiswa();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('mahasiswa');
		}
	}

	public function hapus($id)
	{
		//load model dengan function hapusdatamahasiswa dengan parameter $id
		$this->mahasiswa_model->hapusDataMahasiswa($id);
		//memunculkan session flash data
		$this->session->set_flashdata('flash', 'dihapus');
		//balik ke controller mahasiswa
		redirect('mahasiswa');
	}

	public function detail($id)
	{
		//variabel judul
		$data['judul'] = 'Detail data mahasiswa';
		//variabel data yang isi nya dari model mahasiswa dan method getmahasiswabyId yang berisi parameteer id
		$data['mahasiswa'] =  $this->mahasiswa_model->getMahasiswaById($id);
		//tampilkan view detail dan data diatas
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/detail', $data);
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		//variabel judul
		$data['judul'] = 'form ubah data mahasiswa';
		//variabel data mahasiswa yang berisi mahasiswamodel method nya getmahasiswabyid dengan parameter $id
		$data['mahasiswa'] = $this->mahasiswa_model->getMahasiswaById($id);
		//varibel jurusan yang berisi array
		$data['jurusan'] = ['teknik informatika', 'sisitem informasi', 'management informatika', 'psikologi', 'teknik lingkungan'];
		//set rules form validasi
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'NRP', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//jika form validasi run nilai nya false menampilkan view ubah dan var data
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/ubah', $data);
			$this->load->view('templates/footer');
			//else ke mahasiswa model dan method ubah data
			//dan menampilkan session
			//redirect ke controller mahasiswa
		} else {
			$this->mahasiswa_model->ubahDataMahasiswa();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('mahasiswa');
		}
	}
}
