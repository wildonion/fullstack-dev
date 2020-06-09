<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function create_admin($data = array()){
        // clean xss 
        $username = strip_tags($data['username']);
        $email = strip_tags($data['email']);
        $password = strip_tags($data['password']);
        // hash password
    	$final_password = $this->bcrypt->hash_password($password);
    	$data = array(
    			'username'=>$username,
    			'email'=>$email,
    			'password'=>$final_password,
                'admin_pic'=>$data['admin_pic']
    				);
    	$this->db->insert('admin', $data);
    	$inserted_id = $this->db->insert_id(); 
    	return $inserted_id;

    }

      public function check_admin($data = array()){

    	$query = $this->db->get_where('admin', array('email' => $data['email']));
    	if($query->num_rows()>0){
    		$enc_pass = $query->row(2)->password;
            if($this->bcrypt->check_password($data['password'], $enc_pass)){
    		return $query->result();
            }
    	  } else{
    	  return false;
    	}
      }

      public function update_pass($data = array()){

        // hash the password
        $final_password = $this->bcrypt->hash_password($data['password']);

        $this->db->set('password', $final_password);
        $this->db->where('email', $data['email']);
        $this->db->update('admin');
        
        }
      public function get_avatar($id){
        $query = $this->db->get_where('admin', array('a_id' => $id));
        return $query->result();

      }
      public function save_ajax($data){
        $this->db->insert('lyrics', $data);
        $inserted_id = $this->db->insert_id(); 
        $this->is_id();
        $sql = "INSERT INTO tempidlyrics(tempid) VALUES (".$inserted_id.")";
        $this->db->query($sql);
      }

      public function ajax_save_lyrics($data){
       $query = $this->db->query('SELECT * FROM tempidlyrics');
       $row = $query->row();
       $id = $row->tempid;
       $this->db->where('l_id', $id);
       $this->db->update('lyrics', $data);
      }

      public function ajax_save_todo($data){
        $this->db->insert('todo', $data);
        $inserted_id = $this->db->insert_id(); 
        return $inserted_id;
      }

      public function ajax_show_todo(){
         $query = $this->db->get('todo');
         return $query->result();
      }

      public function ajax_del_todo($data){
         $this->db->where('id', $data['id']);
         $this->db->delete('todo');
      }

      public function ajax_show_messages(){
        $query = $this->db->select('*')
                ->where('new', 'Y')
                ->order_by('msg_date', 'DESC')
                ->get('msgforadmin');
        if($query->num_rows()>0){
                $res_arr = array(
                        'num_rows'=> $query->num_rows(),
                        'data'=> $query->result()
                    );
              return $res_arr;
           
        } else {
            return false;
        }
      }

      public function show_old_messages(){
        $query = $this->db->select('*')
                          ->from('msgforadmin') 
                          ->order_by('msg_date', 'DESC')
                          ->limit(5, 0)
                          ->get(); 
        return $query->result();

      }

      public function update_message_to_old(){
        $this->db->set('new', 'N');
        $this->db->where('new', 'Y');
        $this->db->update('msgforadmin');
      }
      
      public function save_email($email){
        $this->is_email();
        $data = array('tempemail' => $email);
        $this->db->insert('temp_admin_email', $data);
      }  
    
      public function update_prof($picture){
        $query = $this->db->select('*')
                          ->from('temp_admin_email') 
                          ->get();
        $row = $query->row();
        $tmp_email = $row->tempemail;
        $data = array('admin_pic' => $picture);
        $this->db->where('email', $tmp_email);
        $this->db->update('admin', $data);
      }
    
      public function ajax_update_old_pass($data){
        $query = $this->db->get_where('admin', array('a_id' => $data['id']));
    	if($query->num_rows()>0){
    		$enc_pass = $query->row(2)->password;
            if($this->bcrypt->check_password($data['password'], $enc_pass)){
                 $new_password = strip_tags($data['new_password']);
                 $confirm_new_password = strip_tags($data['confirm_new_pass']);
                 if($new_password == $confirm_new_password){
    	            $final_new_password = $this->bcrypt->hash_password($new_password);
                    $paswd_arr = array('password' => $final_new_password);
                     $this->db->set('password', $paswd_arr);
                     $this->db->where('id', $data['id']);
                     $this->db->update('admin');
                  }
                return true;
                 
               } else {
                return false;
            }
          } 
      }
      
      public function update_bio($data){
         $this->db->set('bio', $data['bio']);
         $this->db->where('a_id', $data['id']);
         $this->db->update('admin');
      }
    
      public function update_b_date($data){
         $this->db->set('birthday_date', $data['b_date']);
         $this->db->where('a_id', $data['id']);
         $this->db->update('admin');
      }
    
      public function update_skills($data){
         $this->db->set('skills', $data['skills']);
         $this->db->where('a_id', $data['id']);
         $this->db->update('admin');
      }
    
      public function get_skills($id){
        $query = $this->db->get_where('admin', array('a_id' => $id));
    	if($query->num_rows()>0){
    		$skills = $query->row(6)->skills;
            return $skills;
        }
      }
    
      public function get_the_lyrics(){
         $query = $this->db->select('*')
                      ->from('lyrics')
                      ->order_by('post_date ', 'DESC')
                      ->get();
         return $query->result();
          
      }
    
      public function insert_like($data){
          $this->db->insert('ipaddress_likes_map', $data);
      }
    
      public function update_like_plus_one($id){
          $this->db->set('likes', 'likes+1');
          $this->db->where('l_id', $id);
          $this->db->update('lyrics');
           
      }
    
      public function delete_like($data){
          $sql = "DELETE FROM ipaddress_likes_map WHERE ip_address = '" . $data['ip_address'] . "' and lyrics_id = '" . $data["lyrics_id"] . "'";
          $this->db->query($sql);
      }
    
      public function update_like_neg_one($id){
          $sql = "UPDATE lyrics SET likes = likes - 1 WHERE l_id='" . $id . "' and likes > 0";
          $this->db->query($sql);
      }
    
      public function get_the_likes($data_for_like){
          $sql = "
          SELECT * FROM ipaddress_likes_map WHERE lyrics_id = '" . $data_for_like["lyrics_id"] . "' and ip_address = '" . $data_for_like["ip_address"] . "'";
          $query = $this->db->query($sql);
          return $query->num_rows();
      }
    
      private function reset_id(){
        $this->db->empty_table('tempidlyrics');
      }
      private function is_id(){
        $query = $this->db->get('tempidlyrics');
        if($query->num_rows()>0){
            $this->reset_id();
        }
      }
    
      private function reset_email(){
        $this->db->empty_table('temp_admin_email');
      }
      private function is_email(){
        $query = $this->db->get('temp_admin_email');
        if($query->num_rows()>0){
            $this->reset_email();
        }
      }
    
      /*public function get_the_current_time(){
        // get the current time from database
        return $this->db->query("SELECT NOW();")->row_array()['NOW()'];
      }*/



   }

?>