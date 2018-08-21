<?php 
/**
 * 
 */
class User_model extends CI_Model
{
	
	//this function use to insert register form that fill by user
	public function register($enc_pwd)
	{
		//User data array
		$data = array(
			'name' =>$this->input->post('name'),
			'zipcode' =>$this->input->post('zipcode'),
			'email' =>$this->input->post('email'),
			'username' =>$this->input->post('username'),
			'password' =>$enc_pwd,
			'profileImage' => 'avatar_2x.png',
			'role_id' => 2 

		);
		return $this->db->insert('users',$data);

	}

	//login function
	public function login($username,$password)
	{
		//validate
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		// $this->db->select('role_id');

		$result = $this->db->get('users');

// $result = $this->db->query("SELECT name, username, password, role_id FROM users WHERE username = $username and password = $password");
		if($result->num_rows() == 1)
		{
			return $result->row(0)->id;
		}else
		{
			return false;
		}

	}

	//this function is to check username is exist
	public function check_username_exist($username)
	{
		$query = $this->db->get_where('users', array('username' => $username));
		if (empty($query->row_array())) {
			return true;
		}else
		{
			return false;
		}

	}
	//check if email register has already use
	public function check_email_exist($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));
		if(empty($query->row_array()))
		{
			return true;
		}else
		{
			return false;
		}
	}
	public function usersList()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function getRole()
	{
		$this->db->order_by('role_name');
		$sql = $this->db->get('role');
		return $sql->result_array();
	}
	public function getUserData($id)
	{
		$this->db->join('role','role.id = users.role_id');
		$query = $this->db->get_where('users',array('users.id' => $id));
		return $query->row_array();
	}
	public function getCurrentPwd($user_id)
	{
		$query = $this->db->get_where('users', array('id' =>$user_id));
		if ($query->num_rows() > 0) {
			return $query->row();
		}
	}

	public function updatePwd($newPassword,$user_id)
	{
		$data = array(
			'password' => $newPassword
		);
		$this->db->where('id', $user_id);
		return $this->db->update('users',$data);
	}

	public function getUserProfile($user_id)
	{
		$getData = $this->db->query("SELECT name, username, email, zipcode, profileImage FROM users WHERE id = $user_id");
		return $getData->row_array();
	}

	public function getCountPost($user_id)
	{
		$getCount = $this->db->query("SELECT count(*) as n FROM posts WHERE user_id = $user_id");
		return $getCount->row();
	}

	public function update_profile($user_id,$data){

		$this->db->where('id',$user_id);
		return $this->db->update('users',$data);
	}

	public function updateUserRole($userRole,$id)
	{
		// $data = array(
		// 	'role_id'=>$userRole,
		// );

		$this->db->where('id',$id);
		return $this->db->update('users',array('role_id'=>$userRole));
	}
}