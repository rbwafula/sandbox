<?php
class NAPStatusModel extends CI_Model {
	function __construct() {
		parent::__construct(); 
	}

	public function getNAPStatusListing() {
		$this->db->select('ID, Name');
		$this->db->from('NAPStatus');
		$query = $this->db->get();

		if ($query->num_rows() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}

	public function getSelectedNAPStatus($id) {
		$this->db->select('ID, Name');
		$this->db->from('NAPStatus');
		$this->db->where('ID', $id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}
}
?>