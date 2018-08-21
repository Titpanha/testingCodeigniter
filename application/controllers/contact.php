<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Contact extends CI_Controller
{
	function sendMail()
	{
		$name = $this->input->post('name');
		$email= $this->input->post('email');
		$phone= $this->input->post('phonenum');
		$subject= $this->input->post('subject');
		$message= $this->input->post('message');

		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.mailtrap.io',
		  'smtp_port' => 2525,
		  'smtp_user' => 'a458e08858ba00',
		  'smtp_pass' => 'f0fb41ec16fb15',
		  'mailtype' => 'html',
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
	);

		$ci = get_instance();
		$ci->load->library('email');

        $ci->email->initialize($config);
        $ci->email->from($email,$name);
		$ci->email->to('a458e08858ba00');
		$ci->email->subject($subject);
		$ci->email->message($message,$phone);

		if($this->email->send())
		{
			// echo "<script>";
			// echo "alert('Your Email has been sent.');";
			// echo "window.location.href = 'site_url('pages/contact')'";
		 //    echo "</script>";
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}