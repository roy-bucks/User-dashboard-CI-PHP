<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wall extends CI_Controller {

	/*
		This function is for displaying user information both users and admin can access this fucntion 
	*/
	public function user_info($i){
		$this->load->model('wall_process');
		$this->load->model('account');
		$user['data'] = $this->account->get_user_by_id($i);
		$user['message'] = $this->wall_process->get_message_by_id($i);
		$user['comment'] = $this->wall_process->get_comment_by_id($i);
		$this->load->view('user_info', $user);

	}
	/*
		This function is responsible for retrieving data from form and pass the data on model for process on saving on database
	*/
	public function save_message(){
		$get_message = $this->input->post();
		$this->load->model('wall_process');
		$this->wall_process->adding_message($get_message);
		redirect("user_info/"."{$get_message['account_id']}");
	}
	/*
		This function is for processing comment to be save into the database

	*/
	public function save_comment(){
		$get_comment = $this->input->post();
		var_dump($get_comment);
		$this->load->model('wall_process');
		$this->wall_process->adding_comment($get_comment);
		redirect("user_info/"."{$get_comment['account_id']}");
	}
}

?>