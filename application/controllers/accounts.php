<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class accounts extends CI_Controller {

	/*
		This function will direct the user into landing page
	*/
	public function index(){
		$this->session->set_userdata('user_count', 1);
		$this->load->view('home');
	}
	/*
		This function is for viewing the sigin form
	*/
	
	public function signin(){
		$this->load->view('signin');	
	}
	/*
		This function is for viewing the registration form
	*/
	
	public function new_user(){
		$this->load->view('new_account');	
	}
	/*
		This function is for ewdirecting into admin page, this function contain simple validation of the user type of the user.
	*/
	public function admin(){
		$session_id = $this->session->userdata('id');
		$this->load->model('account');
		$user_data = $this->account->get_user_by_id($session_id);
		if($user_data['user_type'] == 'Admin'){
			$users['data'] = $this->account->get_all();
			$this->load->view('admin',$users);
		}
		else{
			redirect('user');
		}
	}
	/*
		This function is for viewing the user page
	*/
	public function user(){
		$this->load->model('account');
		$users['data'] = $this->account->get_all();
		$this->load->view('user',$users);
	}
	/*
		This function is for editing profile, This fucntion will is responsible for setting the initial information on the editing form
	*/
	public function edit_profile($i){
		$this->load->model('account');
		$user['data'] = $this->account->get_user_by_id($i);
		$user['user_type'] = $this->account->get_user_by_id($this->session->userdata('id'));
		$this->load->view('edit_account',$user);
	}

	/*
		This function is responsible for updating data of the users after the editing process.
	*/

	public function update_profile($i){
		$this->load->model('account');
		$user = $this->input->post();
		$this->account->update_data_by_id($user, $i);
		redirect('admin');
	}

	/*
		This function is for viewing registration form
	*/
	public function register(){
		$this->load->view('register');	
	}
	/*
		This function is reponsible for removing data of the user on the database only the admin can access this function
	*/

	public function remove($i){
		$this->load->model('account');
		$this->account->delete_user_by_id($i);
		redirect('admin');
	}

	/*
		This function will add a new user. Function has a validation and saving new data on database
		Owner: Roy 
	*/

	public function adding_new_user_process(){
		$this->load->model('account');
		$new_user_data = $this->input->post();
		$validation_result = $this->account->validate_registration($new_user_data);
		if($validation_result){
			$this->session->set_flashdata('errors',$validation_result);
			redirect('new_user');
		}
		else{
			$this->account->create_account($new_user_data);
			redirect('admin');	
		}
	}
	/*
		This is a registration process will connect on the account model will validate data from the form and when validation is okay the new user will be succesfully login
		Owner: Roy
	*/

	public function register_process(){
		$this->load->model('account');
		$registration_data = $this->input->post();
		$validation_result = $this->account->validate_registration($registration_data);
		if($validation_result){
			$this->session->set_flashdata('errors',$validation_result);
			redirect('register');
		}
		else{
			$this->account->create_account($registration_data);
			redirect('signin');
		}
	}
	/*
		This is a singin process the data from will validate firsta and when succesfull will go on home page.
		Owner: Roy
	*/
	public function signin_process(){
		$this->load->model('account');
		$signin_data = $this->input->post();
		$validation_result = $this->account->validate_signin($signin_data);
		if($validation_result){
			$this->session->set_flashdata('errors',$validation_result);
			redirect('signin');
		}
		else{
			$signin_process_result = $this->account->signin_process($signin_data);
			if($signin_process_result){
				if($signin_process_result == 'Normal'){
					redirect('user');
				}
				else{
					redirect('admin');
				}
			}
			else{
				$error = "<div class='error'>"."We can't find this account!"."</div>";
				$this->session->set_flashdata('errors',$error);
				redirect('signin');
			}		
		}
	}

	/*
		This function will destroy the session and view the first landing page
	*/

	public function destroy(){
		session_destroy();
		redirect('/');
	}
}
