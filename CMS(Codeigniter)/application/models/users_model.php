<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function create_user($data){
        $username = strip_tags($data['username']);
        $email = strip_tags($data['email']);
        $password = strip_tags($data['password']);
        // hash password
    	$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
            $password = hash('sha256', $password . $salt); 
            for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }
    	$data = array(
    			'username'=>$username,
    			'email'=>$email,
    			'password'=>$password,
                'user_pic'=>$data['user_pic'],
                'tokenCode'=>$data['tokenCode'],
                'psalt'=>$salt
    				);
    	$this->db->insert('persons', $data);
    	$inserted_id = $this->db->insert_id(); 
    	return $inserted_id;
        
    }

    public function delete_user_for_sending_err($email, $pic){
        $this->db->delete('persons', array('email' => $email));
        unlink("uploads/images/users/" . $pic);
    }

    public function save_id_code($data){
        $this->is_person();
        $data = array('id'=>$data['id'],'code'=>$data['code'],'email' => $data['email']);
        $this->db->insert('id_code_for_reg', $data);
    }

    public function del_id_code(){
        $this->db->empty_table('id_code_for_reg');
    }

    public function get_the_id_code(){
        $query = $this->db->get('id_code_for_reg');
        return $query->result();
    }


    public function verify($data){
        $id = base64_decode($data["id"]);
        $sql = "SELECT id,userStatus FROM persons WHERE id = '" . $id . "' AND tokenCode = '" . $data["code"] . "' LIMIT 1";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            $userStatus = $query->row(13)->userStatus;
            if($userStatus == "N"){
                $this->db->set('userStatus', 'Y');
                $this->db->where('id', $id);
                $this->db->update('persons');
                $this->add_time($id);
                return "30 Days Trial Activated";
            } else {
                return "Already Activated";
            }

        } else {
                return "No Account Found";
        }

    }

    public function check_user($data){
            $sql = "SELECT * FROM persons WHERE email = '" . $data['email'] . "'";
            $query = $this->db->query($sql); 
            if($query->num_rows()>0){

                $id = $query->row(0)->id;
                $userStatus = $query->row(13)->userStatus;
                $accessing_status = $query->row(6)->accessing_status;
                $psalt = $query->row(11)->psalt;
                $password = $query->row(10)->password;
                $isnotExp = $this->check_exp_date($id);

                if($userStatus == 'Y'){
                  if($isnotExp){
                    if($accessing_status == 'UB'){
                        $login_ok = false; 
                        $c_password = hash('sha256', $data['password'] . $psalt); 
                        for($round = 0; $round < 65536; $round++){$c_password = hash('sha256', $c_password . $psalt);} 

                        if($c_password === $password){
                            $login_ok = true;
                        } if($login_ok){
                            $email = $query->row(8)->email;
                            $username = $query->row(9)->username;
                            $pic = $query->row(14)->user_pic;
                            $id = $query->row(0)->id;
                            $exp_date = $query->row(15)->exp_date;

                            $fetch_data = array("email"=>$email,
                                                "user_pic"=>$pic, 
                                                "id"=>$id,
                                                "exp_date"=>$exp_date,
                                                "username"=>$username);
                            return $fetch_data;

                        } else {
                            return "Wrong Password ! ";
                        }
                    } else {
                        return "Sorry ! You can't access to your home page.";
                    }
                  } else{
                         $this->update_exp_status($id);
                      return "Your 30 days trial has expired ! ";
                  }
                } else {
                    return "You're not registered yet ! Go to your email and click on activate link.";
                }
            } else {
                return "You have to create an account first !";
            }      

    }

    public function get_time($id){
        $sql = "SELECT exp_date FROM persons WHERE id = '" . $id . "'";
        $query = $this->db->query($sql);
        return $query->row(15)->exp_date;
    }

    private function update_exp_status($id){
        $this->db->set('exp_date_status', 'over');
        $this->db->where('id', $id);
        $this->db->update('persons');
    }

    private function check_exp_date($id){
       $query = $this->db->query("SELECT IF(exp_date > NOW(),TRUE,FALSE) AS isExpired FROM persons WHERE id = '" . $id . "'");
       return $query->row(15)->isExpired;
    }

    private function add_time($id){
       $query = $this->db->query("SELECT DATE_ADD(reg_date,INTERVAL 30 DAY) AS exp_date FROM persons");
       $this->db->set('exp_date', $query->row(7)->exp_date);
       $this->db->where('id', $id);
       $this->db->update('persons');
    }
    
    private function reset_person(){
        $this->db->empty_table('id_code_for_reg');
      }

    private function is_person(){
        $query = $this->db->get('id_code_for_reg');
        if($query->num_rows()>0){
            $this->reset_person();
        }
      }

    /*public function get_the_current_time(){
        // get the current time from database
        return $this->db->query("SELECT NOW();")->row_array()['NOW()'];
      }*/
    
}