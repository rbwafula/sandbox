<?php
class ProjectsModel extends CI_Model {
	function __construct() {
		parent::__construct(); 
	}

	public function getProjectListing() {
		$sql = "SELECT A.ID, A.Reference, GROUP_CONCAT(C.name) AS Countries, D.name AS ImplementingOffice, A.Title, A.GrantAmount, A.gcfdate, A.startdate, A.enddate, E.name as napstatus, F.name as naptype,  A.firstdisbursement, G.name as status
				FROM Projects A
				JOIN ProjectLocation B on A.id = B.projectid
				JOIN Countries C on B.countryid = c.id
				JOIN Office D on A.implementingoffice = D.id
				JOIN NAPStatus E on A.napstatus = E.id
				JOIN NAPType F on A.naptype = F.id
				JOIN ProjectStatus G on A.status = G.id
				GROUP BY A.id, A.reference";

		$query = $this->db->query($sql);
		
		if ($query->result() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}

	public function getProjectListingByCountry($id) {
		$sql = "SELECT A.ID, A.Reference, GROUP_CONCAT(C.name) AS Countries, D.name AS ImplementingOffice, A.Title, A.GrantAmount, A.gcfdate, A.startdate, A.enddate, E.name as napstatus, F.name as naptype,  A.firstdisbursement, G.name as status
				FROM Projects A
				JOIN ProjectLocation B on A.id = B.projectid
				JOIN Countries C on B.countryid = c.id
				JOIN Office D on A.implementingoffice = D.id
				JOIN NAPStatus E on A.napstatus = E.id
				JOIN NAPType F on A.naptype = F.id
				JOIN ProjectStatus G on A.status = G.id
				WHERE C.name = '".urldecode($id)."'
				GROUP BY A.id, A.reference, D.name, A.Title, A.GrantAmount, A.gcfdate, A.startdate, A.enddate, E.name, F.name, A.firstdisbursement, G.name";

		$query = $this->db->query($sql);
		
		if ($query->result() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}

	public function getProjectListingByStatus($id) {
		$sql = "SELECT A.ID, A.Reference, GROUP_CONCAT(C.name) AS Countries, D.name AS ImplementingOffice, A.Title, A.GrantAmount, A.gcfdate, A.startdate, A.enddate, E.name as napstatus, F.name as naptype,  A.firstdisbursement, G.name as status
				FROM Projects A
				JOIN ProjectLocation B on A.id = B.projectid
				JOIN Countries C on B.countryid = c.id
				JOIN Office D on A.implementingoffice = D.id
				JOIN NAPStatus E on A.napstatus = E.id
				JOIN NAPType F on A.naptype = F.id
				JOIN ProjectStatus G on A.status = G.id
				WHERE G.name = '".urldecode($id)."'
				GROUP BY A.id, A.reference, D.name, A.Title, A.GrantAmount, A.gcfdate, A.startdate, A.enddate, E.name, F.name, A.firstdisbursement, G.name";

		$query = $this->db->query($sql);
		
		if ($query->result() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}

	public function createProject() {
		$reference = trim($this->input->post('reference'));
		$title = trim($this->input->post('title'));
		$implementingoffice = trim($this->input->post('implementingoffice'));
		$grantamount  = trim($this->input->post('grantamount'));
		$firstdisbursement = trim($this->input->post('firstdisbursement'));
		$gcfdate = trim($this->input->post('gcfdate'));
		$startdate = trim($this->input->post('startdate'));
		$enddate = trim($this->input->post('enddate'));
		$napstatus = trim($this->input->post('napstatus'));
		$naptype = trim($this->input->post('naptype'));
		$status = trim($this->input->post('projectstatus'));
		$countries = $this->input->post('countries');

		//echo var_dump($countries);
		//exit;

		$new_project_insert_data = array (
			'reference' 			=>	$reference,
			'title' 				=>	$title,
			'implementingoffice' 	=>	$implementingoffice,
			'grantamount' 			=>	$grantamount,
			'firstdisbursement'		=>	$firstdisbursement,
			'gcfdate'				=>	date("Y-m-d", strtotime($gcfdate)),
			'startdate' 			=>  date("Y-m-d", strtotime($startdate)),
			'enddate'				=> 	date("Y-m-d", strtotime($enddate)),
			'napstatus'				=> 	$napstatus,
			'naptype'				=> 	$naptype,
			'status'				=> 	$status,
		);

		$insertProject = $this->db->insert('Projects', $new_project_insert_data);
		if ($insertProject) {
			$insert_id = $this->db->insert_id();
			if (is_array($countries)) {
				foreach ($countries as $country) {
					$this->db->insert('ProjectLocation', ['projectid' => $insert_id, 'countryid' => $country]);
				}
			} else {
				$insertProjectCountry = $this->db->insert('ProjectLocation', ['projectid' => $insert_id, 'countryid' => $countries]);
			}
			echo ('{"status": 1, "value": 1}');
		} else {
			echo ('{"status": 1, "value": 0}');
		}
	}

	public function viewProject($id) {
		$projectid = trim($id);

		$sql = "SELECT A.ID, A.Reference, GROUP_CONCAT(C.name) AS Countries, GROUP_CONCAT(C.id) AS CountriesID, A.implementingoffice AS implementingofficeid, A.Title, A.GrantAmount, A.gcfdate, A.startdate, A.enddate, A.napstatus, A.naptype,  A.firstdisbursement, A.status
				FROM Projects A
				JOIN ProjectLocation B on A.id = B.projectid
				JOIN Countries C on B.countryid = c.id
				WHERE A.id = ".$projectid."
				GROUP BY A.id, A.reference";

		$query = $this->db->query($sql);
		
		if ($query->result() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}

	public function updateProject() {
		$reference = trim($this->input->post('reference'));
		$title = trim($this->input->post('title'));
		$implementingoffice = trim($this->input->post('implementingoffice'));
		$grantamount  = trim($this->input->post('grantamount'));
		$firstdisbursement = trim($this->input->post('firstdisbursement'));
		$gcfdate = trim($this->input->post('gcfdate'));
		$startdate = trim($this->input->post('startdate'));
		$enddate = trim($this->input->post('enddate'));
		$napstatus = trim($this->input->post('napstatus'));
		$naptype = trim($this->input->post('naptype'));
		$status = trim($this->input->post('projectstatus'));
		$projectid = trim($this->input->post('projectid'));
		$countries = $this->input->post('countries');

		//echo var_dump($countries);
		//exit;

		$update_project_insert_data = array (
			'reference' 			=>	$reference,
			'title' 				=>	$title,
			'implementingoffice' 	=>	$implementingoffice,
			'grantamount' 			=>	$grantamount,
			'firstdisbursement'		=>	$firstdisbursement,
			'gcfdate'				=>	date("Y-m-d", strtotime($gcfdate)),
			'startdate' 			=>  date("Y-m-d", strtotime($startdate)),
			'enddate'				=> 	date("Y-m-d", strtotime($enddate)),
			'napstatus'				=> 	$napstatus,
			'naptype'				=> 	$naptype,
			'status'				=> 	$status,
		);

		$this->db->where('id', $projectid);
		$updateproject =  $this->db->update('Projects', $update_project_insert_data); 
		if ($updateproject) {
			$this->db->delete('ProjectLocation', array('projectid' => $projectid)); 
			if (is_array($countries)) {
				foreach ($countries as $country) {
					$this->db->insert('ProjectLocation', ['projectid' => $projectid, 'countryid' => $country]);
				}
			} else {
				$insertProjectCountry = $this->db->insert('ProjectLocation', ['projectid' => $projectid, 'countryid' => $countries]);
			}
			echo ('{"status": 1, "value": 1}');
		} else {
			echo ('{"status": 1, "value": 0}');
		}
	}

	function getProjectCountries($id) {
		$this->db->select('B.name');
		$this->db->from('ProjectLocation A');
		$this->db->where('A.projectid', $id);
		$this->db->join('Countries B', 'A.countryid = B.id');
		
		$query = $this->db->get();

		if ($query->num_rows() > 0) { 	// one or more results found
			return $query->result(); 	// returns array of objects
		} else {
			return NULL;				// no result found
		}
	}

	function deleteProject() {
		$projectid = trim($this->input->post('a'));
		$deleteproject = $this->db->delete('Projects', array('id' => $projectid)); 

		if ($deleteproject) {
			echo ('{"status": 2, "value": 1}');
		} else {
			echo ('{"status": 1, "value": 0}');
		}

	}

	
}
?>