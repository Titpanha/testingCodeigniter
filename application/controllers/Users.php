<?php
/**
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	function __contruct()
	{
		parent::__contruct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//$this->load->library('session');
		//$this->load->library('upload');
	    $this->load->model('user_model');
	}
	//user register
	public function register()
	{
		$data['title'] = 'Sign Up';
		 

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('username' ,'Username' , 'required|callback_check_username_exist');
		$this->form_validation->set_rules('email','Email','required|callback_check_email_exist');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('password2','Confirm Password','matches[password]');


		if ($this->form_validation->run() === FALSE) {
			// $this->load->view('templates/header');
			$this->load->view('users/register', $data);
			// $this->load->view('templates/footer');
		} else {
			// die('Continue');
			//encrypt password
			$enc_pwd = md5($this->input->post('password'));
			$this->user_model->register($enc_pwd);

			//set message when user registered
			$this->session->set_flashdata('user_registered','Now you are registered account successfully.');
			redirect('services');
		}

	}

	//user login 
	public function login()
	{

		$data['title'] = 'Sign In';
				
		$this->form_validation->set_rules('username' ,'Username' , 'required');
		
		$this->form_validation->set_rules('password','Password','required');



		if ($this->form_validation->run() === FALSE) {
			// $this->load->view('templates/header');
			$this->load->view('users/login', $data);
			// $this->load->view('templates/footer');
		} else {
			//get username
			$username = $this->input->post('username');
			
			//get and encrypt password
			$password = md5($this->input->post('password'));
			
			//login user
			$user_id = $this->user_model->login($username, $password);

			//print_r($user_id); die();
			
			//check $user_id is match or not
			if ($user_id) {
				//create session
				// die('SUCCESS');
				$user_data = array(
					'user_id' => $user_id, 
					'username' => $username,

					'logged_in' => true
				);
				$this->session->set_userdata($user_data);
				// print_r ($user_data);
				// set message for success login
				$this->session->set_flashdata('user_loggedin','You`re loggedin , Welcome back.');
				//redirect('pages/services');
				redirect('users/profile');

			}else
			{
				//set message login fail
				$this->session->set_flashdata('login_failed','Opps, Login is invalid.');
				redirect('users/login');
			}

			
		}

	}

	//logout function
	public function logout()
	{

		//unset user data
		// $this->session->unset_userdata('logged_in');
		// $this->session->unset_userdata('user_id');
		// $this->session->unset_userdata('username');
		// $session_destory = $this->session->unset_userdata('logged_in','user_id','username');
		// print_r($session_destory);
		//message
		$this->session->sess_destroy();
		// echo $this->session->print_debbuger();
		$this->session->set_flashdata('user_loggedout','You are logout');
		redirect('users/login');
	}

	//change password
	public function changePwd()
	{
		//check if user not login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$datas['title'] = 'Change Password';
		$this->form_validation->set_rules('password','Current Password','required|alpha_numeric|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('newPassword','New Password','required|alpha_numeric|min_length[6]|max_length[20]');
		// check the confirm password and new password are matches each other
		$this->form_validation->set_rules('confirmPassword','Confirm Password','matches[newPassword]');

		if ($this->form_validation->run() === FALSE) 
		{
			$this->load->view('backend/template/header');
			$this->load->view('backend/users/changePassword');
			$this->load->view('backend/template/footer');
		}
		else 
		{

			//get current password from user
			$currentPwd = md5($this->input->post('password'));
			//get new password
			$newPassword = md5($this->input->post('newPassword'));
			//get user_id from session userdata which user is login
			$user_id = $this->session->userdata('user_id');

			//get old password from database to be compare with current password were input from user
			$pwd = $this->user_model->getCurrentPwd($user_id);
			// print_r($pwd->password);
			if ($currentPwd == $pwd->password ) {
				$this->user_model->updatePwd($newPassword,$user_id);
				$this->session->set_flashdata('pwd_change_success','Password change successfully.');
				redirect('users/userlist');
			} else {
				$this->session->set_flashdata('cur_pwd','Opps, current password is incorrent. Please check it again!');
				redirect('users/changePwd');
			}
		}

	}
	

	//check if username exist
	public function check_username_exist($username)
	{
		//this message will be show if the username is exist
		$this->form_validation->set_message('check_username_exist','That username is token. Please choose a different one.');
		if ($this->user_model->check_username_exist($username)) {
			return true;
		}else 
		{
			return false;
		}
	}
	//check if email has already exist
	public function check_email_exist($email)
	{
		$this->form_validation->set_message('check_email_exist','That email is a already exist. Please register with a different one.');
		if($this->user_model->check_email_exist($email))
		{
			return true;
		}else
		{
			return false;
		}
	}
	public function userlist()
	{

		//check if user not login
		if(!$this->session->userdata('logged_in') ){
			redirect('users/login');
		}
		$user_id =$this->session->userdata('user_id');
		$role = $this->db->query("SELECT role_id FROM users WHERE id = $user_id")->row_array();
		if($role['role_id'] == 2)
		{
			redirect('posts');
		}
		elseif($role['role_id'] == 1)
		{
			$datas['userslist'] = $this->user_model->usersList();
			// print_r($datas);
			$this->load->view('backend/template/header');
			$this->load->view('backend/users/listusers',$datas);
			$this->load->view('backend/template/footer');
		}
		
	}

	public function editPermission($id){
		if(!$this->session->userdata('logged_in'))
		{
			redirect('users/login');
		}
		$data['getRole'] = $this->user_model->getRole();
		$data['getUserData'] = $this->user_model->getUserData($id);
		$this->form_validation->set_rules('userRole','User Role','required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('backend/template/header');
			$this->load->view('backend/users/edit',$data);
			$this->load->view('backend/template/footer');
		}
		else
		{

			$userRole = $this->input->post('userRole');
			// echo $userRole; die();
			$this->user_model->updateUserRole($userRole,$id);
			$this->session->set_flashdata('userRole_updated','User role has been update successfully');
			redirect('users/userlist');
		}

		
	}
	public function profile()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect('users/login');
		}
		$data['title'] = 'Profile';
		//user_id get from userdata where user is logged in
		$user_id = $this->session->userdata('user_id');
		//query count row number of user posts
		$data['getCountPost'] = $this->user_model->getCountPost($user_id); 
		//query user data
		$data['getUserProfile'] = $this->user_model->getUserProfile($user_id);

		$this->load->view('backend/template/header');
		$this->load->view('backend/users/profile',$data);
		$this->load->view('backend/template/footer');
	}
	public function editProfile($user_id)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}
		$data['title'] = 'Edit Profile';
		$data['getUserProfile'] = $this->user_model->getUserProfile($user_id);
		
		$this->load->view('backend/template/header');
		$this->load->view('backend/users/editprofile',$data);
		$this->load->view('backend/template/footer');
	
	}
	public function updateProfile()
	{
		// if(!$this->session->userdata('logged_in')){
		// 	redirect('users/login');
		// }
		

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|callback_check_email_exist');
		$this->form_validation->set_rules('zipcode','Zipcode','required|numeric');
		$user_id = $this->session->userdata('user_id');
		// var_dump($_FILES); die();

		$config['upload_path'] = '/Applications/MAMP/htdocs/codeIgnitor/addTemplate/assets/images/profile/';
		$config["file_name"] = $user_id.'_'.$_FILES['userfile']['name'];
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
        $config['max_size'] = 100000;
 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

		if ($this->form_validation->run() == FALSE && empty($_FILES['userfile']['name'][0]) ) 
        {
        	
        	redirect("users/profile");
        }
        elseif ($this->form_validation->run() == TRUE && empty($_FILES['userfile']['name'][0])) 
        {
        	$data = array(
				'name' => $this->input->post('name'),
				'email'	=> $this->input->post('email'),
				'zipcode' => $this->input->post('zipcode')
			);
        	$this->post_model->update_profile($user_id,$data);

        }
        elseif ($this->form_validation->run() == TRUE or $this->form_validation->run() == FALSE && !empty($_FILES['userfile']['name'][0])) {
         

				if(!$this->upload->do_upload('userfile'))
				{
					$error = array('error' => $this->upload->display_errors());
		            echo '<div class="alert alert-warning>'.$error.'</div>';
		            redirect('users/updateProfile');
				} else {
					//select old image of col profileImage in data to unlink to be upload new img profle
					$rmImg = $this->db->query("SELECT profileImage FROM users WHERE id = $user_id");
					@unlink('/Applications/MAMP/htdocs/codeIgnitor/addTemplate/assets/images/profile/'.$rmImg);

					//get new image upload from user
					$data = array('upload_data' => $this->upload->data());
					$image_name = $user_id.'_'.$_FILES['userfile']['name'];	
					// print_r($data);

					$data = array(
						'name' => $this->input->post('name'),
						'email'	=> $this->input->post('email'),
						'zipcode' => $this->input->post('zipcode'),
						'profileImage' => $image_name
					);
					
					$this->user_model->update_profile($user_id,$data);

				}	
		}
		//set message
		$this->session->set_flashdata('profile_updated','Your profile update successfully.');
		redirect('users/profile');
		
		// if($_FILES['userfile']['name']!="")
	 //    {
	 //   		$config['upload_path'] = './assets/images/profile/';
	 //   		$config['overwrite'] = TRUE;
	 //        $config['allowed_types'] = 'jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
	 //        $this->load->library('upload', $config);
	      
  //       	$this->upload->initialize($config);

	 //        if ( !$this->upload->do_upload('userfile'))
	 //        {
	 //            $error = array('error' => $this->upload->display_errors());
	 //            $image_name = $this->input->post("SELECT profileImage FROM users WHERE id = $user_id");
	 //        }
	 //        else
	 //        {	
	 //        	//select old image of col profileImage in data to unlink to be upload new img profle
		// 		$rmImg = $this->db->query("SELECT profileImage FROM users WHERE id = $user_id");
		// 		@unlink('/Applications/MAMP/htdocs/codeIgnitor/addTemplate/assets/images/profile/'.$rmImg);

	 //            // $upload_data=$this->upload->data();
	 //            // $image_name=$upload_data['userfile'];
	 //            $data = array('upload_data' => $this->upload->data());
		// 		$image_name = $_FILES['userfile']['name'];
	 //        }

	       
	 //    }
	 //    else{
	 //    	//this point mean it will take the old img 
	 //           $image_name=$this->input->post('userfile');
	 //        }

		
		
	}
}