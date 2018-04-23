<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Page extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->layout = LAYOUT_LOJA;
	}

	public function contact() {
		$this->load->view ( 'site/contact.html' );
	}

	public function about() {
		$this->load->view ( 'site/about.html' );
	}

	public function services() {
		$this->load->view ( 'site/services.html' );
	}

	public function testimonials() {
		$this->load->view ( 'site/testimonials.html' );
	}

	public function faq() {
		$this->load->view ( 'site/faq.html' );
	}

	public function gallery() {
		$this->load->view ( 'site/gallery.html' );
	}

	public function timeline() {
		$this->load->view ( 'site/timeline.html' );
	}

	public function team() {
		$this->load->view ( 'site/team.html' );
	}

	public function pricing() {
		$this->load->view ( 'site/pricing.html' );
	}

	public function columns() {
		$this->load->view ( 'site/columns.html' );
	}

	public function rightsidebar() {
		$this->load->view ( 'site/rightsidebar.html' );
	}

	public function e404() {
		$this->load->view ( 'site/404.html' );
	}
	
}