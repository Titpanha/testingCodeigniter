<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Categories extends CI_Controller
{
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$data['title'] = 'Categories';
		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('backend/template/header');
		$this->load->view('backend/category/index',$data);
		$this->load->view('backend/template/footer');
	}
	public function create()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$data['title'] = ' Create Category';

		$this->form_validation->set_rules('name','Name','required');

		if($this->form_validation->run() === false)
		{
			$this->load->view('backend/template/header');
			$this->load->view('backend/category/create',$data);
			$this->load->view('backend/template/footer');
		} else
		{
			$this->category_model->create_category();
			//set message
			$this->session->set_flashdata('category_created','Your category has been created.');
			redirect('categories');
		}
	}


	//category`s post
	public function post($id)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		//this data title will go to get name of category for database
		$data['title'] = $this->category_model->get_single_category($id)->name;
		//this data post will go and get all post of that category id
		$data['post'] = $this->post_model->get_post_by_category($id);

		$this->load->view('templates/header');
		$this->load->view('pages/posts/index',$data);
		$this->load->view('templates/footer');
	}
	public function edit($id)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$data['title'] = 'Edit category';
		// $data['id'] = $id;
		$data['getCategory'] = $this->category_model->getCategory($id);
		$this->load->view('backend/template/header');
		$this->load->view('backend/category/edit',$data);
		$this->load->view('backend/template/footer');
	}
	public function update()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$id = $this->input->post('id');
		// echo $id; die();
		$this->form_validation->set_rules('category','Category','required|min_length[3]');

		$this->category_model->updateCategory($id);
		$this->session->set_flashdata('category_updated','Your category has been updated');
		redirect('categories/index');
	}
	function delete($id)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$this->category_model->delete_category($id);
		//set message
		$this->session->set_flashdata('category_deleted','Your category has been deleted.');
		redirect('categories');
	}

}