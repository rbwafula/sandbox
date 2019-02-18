<?php
class NAPTypeModel extends CI_Model {
	function __construct() {
		parent::__construct(); 
	}

	public function getNAPTypeListing() {
		$this->db->select('ID, Name');
		$this->db->from('NAPType');
		$query = $this->db->get();

		if ($query->num_rows() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}

	public function getSelectedNAPType($id) {
		$this->db->select('ID, Name');
		$this->db->from('NAPType');
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