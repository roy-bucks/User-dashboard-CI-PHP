 <?php
class wall_process extends CI_Model {
    /*

        This function is for retrieving comment data by ID
    */

    public function get_comment_by_id($id){
        $query = "SELECT comments.message_id,comments.comment,comments.created_at, CONCAT(users.first_name,' ',users.last_name) as name FROM comments INNER JOIN users ON users.Id = comments.user_id WHERE comments.comment_to = ?";
        return $this->db->query($query, $id)->result_array();
    }
    /*
        This function is saving comment into the database
    */

    public function adding_comment($comment_data){

        $query = "INSERT INTO comments (user_id, message_id,comment_to, comment,created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array(
            $this->session->userdata('id'), 
            $this->security->xss_clean($comment_data['message_id']),
            $this->security->xss_clean($comment_data['account_id']), 
            $this->security->xss_clean($comment_data['comment']), 
            date("Y-m-d, H:i:s"), 
            date("Y-m-d, H:i:s"),
        ); 
        return $this->db->query($query, $values);
    }
    /*
        This function is for retrieving message data by ID
    */
    public function get_message_by_id($id){
        $query = "SELECT messages.Id, messages.message, messages.created_at, CONCAT(users.first_name,' ',users.last_name) AS name FROM messages INNER JOIN users ON users.Id = messages.user_id WHERE messages.message_to = ?";
        return $this->db->query($query, $id)->result_array();
    }
    /*
        This function is for saving message into the database
    */

    public function adding_message($message_data){
        $query = "INSERT INTO messages (user_id, message_to,message,created_at, updated_at) VALUES (?,?,?,?,?)";
        $values = array(
            $this->session->userdata('id'),
            $this->security->xss_clean($message_data['account_id']), 
            $this->security->xss_clean($message_data['message']), 
            date("Y-m-d, H:i:s"), 
            date("Y-m-d, H:i:s"),
        ); 
        return $this->db->query($query, $values);
    }
     
}
?>
