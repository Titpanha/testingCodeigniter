<?php
/**
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller
{
	function __construct()
    {
    	parent::__construct();// you have missed this line.
    	$this->load->helper('form','url');
    	$this->load->library('upload');
    	$this->load->library('session');
    }
	
	public function index($offset = 0)
	{
		// add pagination to the view post page
		$config['base_url'] = base_url() . 'posts/index';
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 3;
		$config['attributes'] = array('class' => 'pagination-link');
		// to determine how many segement do we user to load page pagination
		$config['uri_segment'] = 3;
		//init the config
		$this->pagination->initialize($config);

		$data['title'] = 'Latest Posts';
		$data['post'] = $this->post_model->get_posts(false,$config['per_page'],$offset);

		$this->load->view('templates/header');
		$this->load->view('pages/posts/index', $data);
		$this->load->view('templates/footer');
	}

	//this view function to link the read more button to view the specific detail of that post
	public function view($slug = null)
	{
		$data['post'] = $this->post_model->get_posts($slug);
		//we want to get the specific comments of that post by the specific id
		$post_id = $data['post']['id'];
		$data['comments'] = $this->comment_model->get_comments($post_id);

		if(empty($data['post']))
		{
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('pages/posts/view', $data);
		$this->load->view('templates/footer');
	}

	public function postslist()
	{
		//check if user not login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['lists'] = $this->post_model->postslist();
		$this->load->view('backend/template/header');
		$this->load->view('backend/posts/lists', $data);
		$this->load->view('backend/template/footer');
	}
	
	//this function is to create new post
	public function create()
	{
		//check if user not login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$this->load->helper('form','file','url');
		$this->load->library('form_validation');


		$data['title'] = 'Create Post';
		$data['categories'] = $this->category_model->get_categories();

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');
		// $this->form_validation->set_rules('','Body','required');

		if($this->form_validation->run() === false)
		{
			$this->load->view('backend/template/header');
			$this->load->view('pages/posts/create', $data);
			$this->load->view('backend/template/footer');
		}
		else
		{
	        $config['upload_path'] = '/Applications/MAMP/htdocs/codeIgnitor/addTemplate/assets/images/posts/'; 
	        // $config['file_name'] = $_FILES['userfile']['name'];
	        $config['overwrite'] = TRUE;
	        $config["allowed_types"] = 'jpg|jpeg|png|gif';
	        $config["max_size"] = 2048;
	        // $config["max_width"] = 500;
	        // $config["max_height"] = 500;
	       

	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
			
			if( !$this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
				// print_r($error);
			} else 
			{
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];	
				// print_r($data);
			}
			$this->post_model->create_post($post_image);
			//set message
			$this->session->set_flashdata('post_created','Your post has been created.');
			redirect('posts/postslist');
			
		}
	}
	
	
	function delete($id)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$this->post_model->delete_post($id);
		//set message
		$this->session->set_flashdata('post_deleted','Your post has been deleted.');
		redirect('posts/postslist');
	}
	function edit($slug)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['post'] = $this->post_model->get_posts($slug);

		//check user if that post not create by that user_id it will not allow to access change that post
		if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id'])
		{
			redirect('posts');
		}
		$data['categories'] = $this->category_model->get_categories();
		if(empty($data['post']))
		{
			show_404();
		}

		$data['title'] = 'Edit Post';

		$this->load->view('backend/template/header');
		$this->load->view('backend/posts/edit', $data);
		$this->load->view('backend/template/footer');
	}
	function update()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		//validation
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('body','Body','required');
		// $this->form_validation->set_rules('')
		$id = $this->input->post('id');
		$slug = url_title($this->input->post('title'));


		$config['upload_path'] = '/Applications/MAMP/htdocs/codeIgnitor/addTemplate/assets/images/posts/'; 
        // $config['file_name'] = $_FILES['userfile']['name'];
        $config['overwrite'] = TRUE;
        $config["allowed_types"] = 'jpg|jpeg|png|gif';
        $config["max_size"] = 1000000;
        $config["file_name"] = $id.'_'.$_FILES['userfile']['name'];

        $this->load->library('upload', $config);
	    $this->upload->initialize($config);

        if ($this->form_validation->run() == FALSE && empty($_FILES['userfile']['name'][0]) ) 
        {
        	
        	redirect("posts/postslist");

        }
        elseif ($this->form_validation->run() == TRUE && empty($_FILES['userfile']['name'][0])) 
        {
        	$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body'	=> $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
			);

        	$this->post_model->update_post($id,$data);

        }
        elseif($this->form_validation->run() == TRUE or $this->form_validation->run() == false  && !empty($_FILES['userfile']['name'][0]))
        {
        	if ( ! $this->upload->do_upload('userfile'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            echo '<div class="alert alert-warning>'.$error.'</div>';
	            redirect('posts/edit');
	        } else {
	        	
	        	$rmImg = $this->db->query("SELECT post_image FROM posts WHERE id = $id");
				@unlink('/Applications/MAMP/htdocs/codeIgnitor/addTemplate/assets/images/posts/'.$rmImg);

				//get new image upload from user
				$data = array('upload_data' => $this->upload->data());
				$image_name = $_FILES['userfile']['name'];

				$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'body'	=> $this->input->post('body'),
					'category_id' => $this->input->post('category_id'),
					'post_image' => $id.'_'.$image_name
				);


				$this->post_model->update_post($id,$data);
			}
			// $this->session->set_flashdata('post_updated','Your post has been updated.');
			// redirect('posts/postslist');
        }
		//set message
		$this->session->set_flashdata('post_updated','Your post has been updated.');
		redirect('posts/postslist');
	}
}