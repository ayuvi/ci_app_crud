<?php 

 class Home extends CI_Controller
 {
 	
 	public function index($nama = '')
 	{
 		//variabel data berisi judul untuk di tampilkan di home
 		$data['judul'] = 'halaman home';
 		// variabel data berisi parameter yang diisi dari argument nama 
 		$data['nama'] = $nama;
 		// memanggil view header,index dan footer yang berisi kan data judul dan nama
 		$this->load->view('templates/header',$data);
 		$this->load->view('home/index', $data);
 		$this->load->view('templates/footer');
 	}
 }
