<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Uploads extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}
	
		public function emp_pic($type)
		{
			if($_FILES["picture"]["name"] != ""){
				$config['upload_path'] = './img/profile_pics/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = true;
				$config['file_name'] = md5($this->input->get_post('id')).".png";

				$this->load->library('upload', $config);
				$this->upload->initialize($config);


				if ( ! $this->upload->do_upload("picture"))
				{
					$error = $this->upload->display_errors();
					// echo "<"."script".">alert('".print_r($error)."');</"."script".">";

				}
				else{
					$this->load->model('process');
					if($this->process->process_emp_pic($_FILES,$type,""))
						redirect("view/view_profile_page/".$this->input->get_post('id'));
				}
			}
			else
			{
				$this->load->model('process');
				if($this->process->process_emp_pic($_FILES,$type,"skip"))
					redirect("view/view_profile_page/".$this->input->get_post('id'));
			}
		}
	}
	
	/* End of file uploads.php */
	/* Location: ./application/controllers/uploads.php */