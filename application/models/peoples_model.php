<?php
class peoples_model extends CI_model
{
	public function getAllPeoples()
	{
		return $this->db->get('peoples')->result_array();
	}

	public function getPeoples($limit, $start, $keyword = null)
	{
		//jika var kwyword ada maka qwery like
		if ($keyword) {
			$this->db->like('name', $keyword);
			$this->db->or_like('email', $keyword);
		}
		//jika tidak select semua dengan limit dan nilai start
		return $this->db->get('peoples', $limit, $start)->result_array();
	}

	public function countAllPeoples()
	{
		return $this->db->get('peoples')->num_rows();
	}
}
