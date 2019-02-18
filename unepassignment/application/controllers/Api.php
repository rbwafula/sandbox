<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() {
		parent::__construct(); // call to parent constructor
	}

	public function projects($method = NULL, $value = NULL) {
		if(isset($method)) {
			if ($method == 'all') {
				// List all projects
				$this->load->model('ProjectsModel');
				$projectslist = $this->ProjectsModel->getProjectListing();
				echo json_encode($projectslist);
			} else if ($method == 'country') {
				if (isset($value)) {
					// List all projects from selected country value
					$this->load->model('ProjectsModel');
					$projectslist = $this->ProjectsModel->getProjectListingByCountry($value);
					echo json_encode($projectslist);
				} else {
					echo "Please select a country";
				}
			}  else if ($method == 'status') {
				if (isset($value)) {
					// List all projects from selected status value
					$this->load->model('ProjectsModel');
					$projectslist = $this->ProjectsModel->getProjectListingByStatus($value);
					echo json_encode($projectslist);
				} else {
					echo "Please select a status";
				}
			} else {
				echo "wrong syntax for API";
			}
		}
	}
}
