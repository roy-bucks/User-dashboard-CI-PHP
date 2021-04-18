<?php
class account extends CI_Model {
    /*
        This function is for getting all users data by ID
    */

    public function get_user_by_id($id){
        $query = "SELECT * FROM users WHERE id = ?"; 
        return $this->db->query($query, $id)->row_array();
    }
    /*
        This function is for upadating data of the user by ID
    */
    public function update_data_by_id($user, $id){
        $password_checker = $this->account->get_user_by_id($id);
        if($password_checker['password'] != $user['password']){
            $password = md5($this->security->xss_clean($user["password"]));
        }
        else{
            $password = $this->security->xss_clean($user["password"]);
        }
       $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ?, description =?, updated_at = ?, user_type =? WHERE Id = ?";
       $values = array(
            $this->security->xss_clean($user['first_name']), 
            $this->security->xss_clean($user['last_name']), 
            $this->security->xss_clean($user['email']), 
            $password,
            $this->security->xss_clean($user['description']),
            date("Y-m-d, H:i:s"),
            $this->security->xss_clean($user['user_type']),
            $id
        );
       return $this->db->query($query, $values);
    }
    /*
        This function is responsible for deleting user data by ID
    */
    public function delete_user_by_id($id){
        $query= "DELETE FROM users WHERE id= ?";
        return $this->db->query($query, $id);
    }
    /*
        This function is for retrieve all users data
    */
    public function get_all(){
        $query = "SELECT * FROM users"; 
        return $this->db->query($query)->result_array();
    }
    /*
        This function will process the signin and will check the email and password on the database
        Owner: Roy
    */

    function signin_process($data){
        $user_data = $this->account->get_all();
        foreach ($user_data as $value) {
            if($value['email'] == $data['email'] && $value['password'] ==md5($data['password'])){
                $this->session->set_userdata('id', $value['Id']);
                return ($value['user_type']);
            }
        }
    }
    /*
        This function will get all data of the user by email.
        Owner: Roy
    */
    function get_user_by_email($email){ 
        $query = "SELECT * FROM users WHERE email=?";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
    }
    /*
        This function will validate the sign in form and it will return an error
    */
    function validate_signin($data){
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
    }

    /*
        This function is a simple registration validation it will return errors and it will check if the email is already taken
        Owner: Roy
    */
    function validate_registration($data)
    { 
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters("<div class='error'>","</div>");
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');        
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]');
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if($this->account->get_user_by_email($data['email'])) {
            return $error = "<div class='error'>"."This email is already taken!"."</div>";
        }
     }
     /*
        This function is for saving new data on the database with simple validation
     */

     function create_account($user){
        $initial_data = $this->account->get_all();
        if(empty($initial_data)){
            $user['user_type'] = 'Admin';
        }
        else{
            $user['user_type'] = 'Normal';
        }
        $user_type_picker = $this->session->userdata('user_account');
        $query = "INSERT INTO users (first_name, last_name, email, password, description, created_at, updated_at, user_type) VALUES (?,?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($user['first_name']), 
            $this->security->xss_clean($user['last_name']), 
            $this->security->xss_clean($user['email']), 
            md5($this->security->xss_clean($user["password"])),
            $this->security->xss_clean($user['description']),
            date("Y-m-d, H:i:s"), 
            date("Y-m-d, H:i:s"),
            $user['user_type']

        ); 
        return $this->db->query($query, $values);
     }

     
}
?>
