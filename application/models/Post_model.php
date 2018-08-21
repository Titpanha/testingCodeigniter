<?php  
/**
 * 
 */
class Post_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	//get posts from database
	public function get_posts($slug = FALSE,$limit = FALSE, $offset = FALSE)
	{
		if($limit){
			$this->db->limit($limit,$offset);
		}
		if($slug === false)
		{
			//to order the to see the last post on the top
			$this->db->order_by('posts.id','DESC');

			//join table categories with posts to get category_id
			$this->db->join('categories', 'categories.id = posts.category_id');
			
			// $this->db->join('users', 'users.id = posts.user_id');
			$query = $this->db->get('posts');
			return $query->result_array();
		}

		$query = $this->db->get_where('posts',array('slug' => $slug));
		return $query->row_array();
	} 

	public function create_post($post_image){
		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body'	=> $this->input->post('body'),
			'category_id' => $this->input->post('category_id'),
			'user_id' => $this->session->userdata('user_id'),
			'post_image' => $post_image

		);
		return $this->db->insert('posts',$data);
	}

	public function delete_post($id)
	{
		//$image_file_name = $this->db->select('post_image')->get_where('post',array('id' => $id))->row()->post_image;
		// $image_file_name = $this->db->query("select * from posts where id = '$id' ")->row()->post_image;
		// $cwd = getcwd();//save the current working directory
		// $cwd = base_url("/assets/images/posts/").$image_file_name;
		//$chdir($image_file_path);
		// @unlink($cwd);
		//$chdir($cwd); //restore the previous working directory



		$image_file_name = $this->db->select('post_image')->get_where('posts', array('id' => $id))->row()->post_image;
		$cwd = getcwd(); // save the current working directory
		$image_file_path = $cwd."\\assets\\images\\posts\\";
		@chdir($image_file_path);
		@unlink($image_file_name);
		@chdir($cwd); // Restore the previous working directory
		$this->db->where('id',$id);
		$this->db->delete('posts');
		return true;
	}

	public function update_post($id,$data)
	{
		// $slug = url_title($this->input->post('title'));

		// if($_FILES['userfile']['name']!="")
	 //    {
	 //   		$config['upload_path'] = '/Applications/MAMP/htdocs/codeIgnitor/addTemplate/assets/images/posts/';
	 //        $config['allowed_types'] = 'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
	 //        $this->load->library('upload', $config);

	 //        if ( ! $this->upload->do_upload('userfile'))
	 //        {
	 //            $error = array('error' => $this->upload->display_errors());
	 //        }
	 //        else
	 //        {
	 //        	// $img = $this->db->query("SELECT post_image FROM posts WHERE slug = $slug");
	 //        	// unlink('./assets/images/posts/.')
	 //            $data = array('upload_data' => $this->upload->data());
	 //            $image_name=$upload_data['file_name']['name'];
	 //        }
	 //    }
	 //    else{
	 //           $image_name=$this->input->post('userfile');
	 //        }
		// $data = array(
		// 	'title' => $this->input->post('title'),
		// 	'slug' => $slug,
		// 	'body'	=> $this->input->post('body'),
		// 	'category_id' => $this->input->post('category_id'),
		// 	// 'post_image' => $image_name


		// );
		$this->db->where('id',$id);
		return $this->db->update('posts',$data);
	}

	
	//get post category by id 
	public function get_post_by_category($category_id)
	{
		$this->db->order_by('posts.id','DESC');
		$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get_where('posts', array('category_id' => $category_id));
			return $query->result_array();
	}
	public function postslist()
	{
		$sql = $this->db->get("posts");
		return $sql->result_array();
	}
}