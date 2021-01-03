<?php
class Peoples extends CI_Controller
{
	public function index()
	{
		//var judul berisi nilai list of peoples
		$data['judul'] = 'List of Peoples';
		// load model peoples_model as peoples
		$this->load->model('peoples_model', 'peoples');

		//LOAD LIBRARY
		$this->load->library('pagination');

		//ambil data keyword
		//jika ada input post nilai nya submit
		//isi nya var data keyword dari post keyword
		//dan di masukan ke session di set_userdata name keyword isi nya data keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			//jika tidak , data keyword = session dengan userdata name keyword
			$data['keyword'] = $this->session->userdata('keyword');
		}

		//CONFIG
		//select * from peoples like email = data keyword or_like name = data_keyword
		$this->db->like('name', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->from('peoples');
		//config total rowks = function count all results() dari CI untuk mengambil jumlah data
		$config['total_rows'] = $this->db->count_all_results();
		//membuat variable data berisi config total rows 
		$data['total_rows'] = $config['total_rows'];
		//config untuk menampilkan berapa data pada page
		$config['per_page'] = 8;
		//config attribute menambahkan page link pada class paging
		$config['attributes'] = array('class' => 'page-link');

		//INITIALIZE
		//function initialize dari pagination berisi parameter config
		$this->pagination->initialize($config);

		//var data start berisi uri segment ke 3 dari url yang di punya
		//yang berarti data yang di kirimkan dari parameter
		$data['start'] = $this->uri->segment(3);
		//var peoples berisi model peoples dan method getPeoples
		//berisi parameter perpage = jumlah page,start =nilai awal, keyword = session leyword
		$data['peoples'] = $this->peoples->getPeoples($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('peoples/index', $data);
		$this->load->view('templates/footer');
	}
}
