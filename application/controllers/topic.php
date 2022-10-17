<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Topic extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('topic_model');
		$this->load->helper('url');
	}

	function list() {
		$topics = $this->topic_model->gets();
		$this->load->view('fragement/head');
		$this->load->view('topic_list', array('topics' => $topics));
		$this->load->view('fragement/footer');
	}

	function get($id){
		$topics = $this->topic_model->gets();
		$topic = $this->topic_model->get($id);

		$this->load->view('fragement/head');
		$this->load->view('topic_list', array('topics' => $topics));
		$this->load->view('get', array('topic' => $topic));
		$this->load->view('fragement/footer');
	}

	function write(){
		if (empty($_REQUEST) === false) {
			$result = $this->topic_model->insert(
				array(
					'title'=> $_REQUEST['title'],
					'description'=> $_REQUEST['description']
				)
			);

			if ($result) {
				redirect('/topic/list');
			}
		} else {
			$this->load->view('fragement/head');
			$this->load->view('topic_write');
			$this->load->view('fragement/footer');
		}
	}
}
?>
