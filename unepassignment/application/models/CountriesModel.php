<?php
class CountriesModel extends CI_Model {
	function __construct() {
		parent::__construct(); 
	}

	public function getCountryListing() {
		$this->db->select('ID, Code, Name');
		$this->db->from('Countries A');
		$query = $this->db->get();

		if ($query->num_rows() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}

	public function getSelectedCountry($id) {
		$this->db->select('ID, Code, Name');
		$this->db->from('Countries A');
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