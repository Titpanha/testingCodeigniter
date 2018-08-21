<?php
/**
 * 
 */
class Category_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}
	public function get_categories()
	{
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}
	public function create_category()
	{
		$data =array(
		'name' => $this->input->post('name'),
		'user_id' => $this->session->userdata('user_id')
		);
		return $this->db->insert('categories',$data);
	}

	//get category`s name
	public function get_single_category($id)
	{
		$query = $this->db->get_where('categories', array('id' => $id));
		return $query->row();
	}


	//get post category by id
	public function updateCategory($id)
	{
		$data = array(
			'name' => $this->input->post('category')
		);
		$this->db->where('id',$id);
		return $this->db->update('categories',$data);
	}


	public function delete_category($id)
	{

		$this->db->where('id',$id);
		$this->db->delete('categories');
		return true;
	}

	//get category by id
	public function getCategory($id)
	{
		$this->db->where('id',$id);

		$getCategory = $this->db->get('categories');
		return $getCategory->row_array();
	}
}