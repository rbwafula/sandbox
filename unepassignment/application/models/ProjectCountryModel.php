<?php
class ProjectCountryModel extends CI_Model {
	function __construct() {
		parent::__construct(); 
	}

	/*public function getProjectCountryListing() {
		// Check if user's role is active
		$this->db->select('ID, Name');
		$this->db->from('ProjectStatus');

		$query = $this->db->get();

		if ($query->num_rows() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}*/

	public function getSelectedProjectCountry($id) {
		// Check if user's role is active
		$this->db->select('ID, Name');
		$this->db->from('ProjectStatus');
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