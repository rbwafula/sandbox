<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	function __construct() {
		parent::__construct(); // call to parent constructor
	}

	public function index() {	
		// Load Models
		$this->load->model('ProjectsModel');
		$userdetails = ['Robert Wafula','System Developer'];

		// Load get data from models
		$projectslist = $this->ProjectsModel->getProjectListing();
			

		$this->load->view('page-includes/header');
		$this->load->view('page-includes/pagecontainer_top', ['userdetails' => $userdetails]);
		$this->load->view('projects_listing', ['projectslist' => $projectslist]);
		$this->load->view('page-includes/pagecontainer_bottom', ['userdetails' => $userdetails]);
	}

	public function add() {
		if (!$this->input->is_ajax_request()) {
			// User should get empty form to fill in

			// Load Models
			$this->load->model('CountriesModel');
			$this->load->model('NAPStatusModel'); 
			$this->load->model('NAPTypeModel');
			$this->load->model('OfficeModel');
			$this->load->model('ProjectStatusModel');

			// Load get data from models
			$countrieslist = $this->CountriesModel->getCountryListing();
			$napstatuslist = $this->NAPStatusModel->getNAPStatusListing();
			$naptypelist = $this->NAPTypeModel->getNAPTypeListing();
			$officelist = $this->OfficeModel->getOfficeListing();
			$statuslist = $this->ProjectStatusModel->getProjectStatusListing();
			$userdetails = ['Robert Wafula','System Developer'];

			// Load interface
			$this->load->view('page-includes/header');
			$this->load->view('page-includes/pagecontainer_top', ['userdetails' => $userdetails]);
			$this->load->view('projects_add', ['countrieslist' => $countrieslist, 'napstatuslist' => $napstatuslist, 'naptypelist' => $naptypelist, 'officelist' => $officelist, 'statuslist' => $statuslist]);
			$this->load->view('page-includes/pagecontainer_bottom', ['userdetails' => $userdetails]);
		} else {
			// Validate and process what user is trying to submit
			$this->form_validation->set_rules('reference','Project Reference','trim|required');
			$this->form_validation->set_rules('title','Project Title','trim|required');
			/*$this->form_validation->set_rules('countries','Countries','trim|required|alpha_numeric');*/
			$this->form_validation->set_rules('implementingoffice','Implementing Office','trim|required|numeric');
			$this->form_validation->set_rules('grantamount','Grant Amount','trim|required|numeric');
			$this->form_validation->set_rules('firstdisbursement','First Disbursement','trim|required|numeric');
			$this->form_validation->set_error_delimiters('<li class="text-left">','</li>');

			if ($this->form_validation->run() == false) {
				echo '{"status": 0, "value": '.json_encode(validation_errors()).'}';
			} else {
				$this->load->model('ProjectsModel');
				return $this->ProjectsModel->createProject();
			}
		}
	}

	public function view($id) {
		// Load Models
		$this->load->model('CountriesModel');
		$this->load->model('NAPStatusModel'); 
		$this->load->model('NAPTypeModel');
		$this->load->model('OfficeModel');
		$this->load->model('ProjectStatusModel');
		$this->load->model('ProjectsModel');

		// Load get data from models
		$countrieslist = $this->CountriesModel->getCountryListing();
		$napstatuslist = $this->NAPStatusModel->getNAPStatusListing();
		$naptypelist = $this->NAPTypeModel->getNAPTypeListing();
		$officelist = $this->OfficeModel->getOfficeListing();
		$statuslist = $this->ProjectStatusModel->getProjectStatusListing();
		$projectdetail = $this->ProjectsModel->viewProject($id)[0];
		$userdetails = ['Robert Wafula','System Developer'];

		// Load interface
		$this->load->view('page-includes/header');
		$this->load->view('page-includes/pagecontainer_top', ['userdetails' => $userdetails]);
		$this->load->view('projects_edit', ['countrieslist' => $countrieslist, 'napstatuslist' => $napstatuslist, 'naptypelist' => $naptypelist, 'officelist' => $officelist, 'statuslist' => $statuslist, 'projectdetail' => $projectdetail]);
		$this->load->view('page-includes/pagecontainer_bottom', ['userdetails' => $userdetails]);


	}

	public function update() {
		$this->load->model('ProjectsModel');
		$this->ProjectsModel->updateProject();
	}

	public function delete() {
		$this->load->model('ProjectsModel');
		$this->ProjectsModel->deleteProject();
	}
}
