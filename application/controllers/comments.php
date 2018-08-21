<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Comments extends CI_Controller
{
	
	public function create($post_id)
	{
		$slug = $this->input->post('slug');
		$data['post'] = $this->post_model->get_posts($slug);

		if(empty($data['post']))
		{
			show_404();
		}
		$data['title'] = $data['post']['title'];


		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		$this->form_validation->set_rules('body','Body','required');

		if($this->form_validation->run() === FALSE)
		{
			//echo $data;
			$this->load->view('templates/header');
			$this->load->view('pages/posts/view',$data);
			$this->load->view('templates/footer');
			// print_r ($data['title']);

		} else
		{
			//echo $data;
			$this->comment_model->create_comment($post_id);
			redirect('posts/'.$slug);
		}
	}
}