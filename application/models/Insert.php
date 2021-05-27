<?php
class Insert extends CI_MODEL{

  public function insert_user($insert){
      return  $this->db->insert('users' ,$insert);
  }
  public function update_user($email, $phone, $pwd){
    $this->db->set('email', $email);
    $this->db->set('phone_num', $phone);
    $this->db->set('pwd', $pwd);
    $this->db->where('email', $_SESSION['email']);
    $update = $this->db->update('users');
    if(!$update){
      return FALSE;
    }
    else{
      return TRUE;
    }
  }
  public function send_code($rand_code, $email){
    $this->db->set('confirm_code', $rand_code);
    $this->db->where('email', $email);
    $insert_code = $this->db->update('users');
    if(!$insert_code){
      return FALSE;
    }
    else{
      return TRUE;
    }
  }

  public function gen_auth($reset_token, $email){
    $status=0;
    $this->db->set('reset_token', $reset_token);
    $this->db->set('reset_status', $status);
    $this->db->where('email', $email);
    $update_auth = $this->db->update('admins');
    if(!$update_auth){
      return FALSE;
    }
    else{
      return TRUE;
    }
  }
  // Get password reset status
  public function get_admin_status($email){
    $status=1;
    $this->db->select('*');
    $this->db->from('admins');
    $this->db->where('email', $email);
    $this->db->where('reset_status', $status);
    $query = $this->db->get();
    if($query->num_rows() > 0){
      foreach($query->result_array() as $row){
        if($row['reset_status']= $status){
          return FALSE;
        }
        else{
          return TRUE;
        }
      }
    }
  }
  public function update_user_status($email, $rand_code){
    $status =1;
    $this->db->set('verify_status', $status);
    $this->db->where('email', $email);
    $this->db->where('confirm_code', $rand_code);
    $update_status = $this->db->update('users');
    if(!$update_status){
      return FALSE;
    }
    else{
      return TRUE;
    }
  }
  public function get_user_status($email, $rand_code){
    $status=0;
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('email', $email);
    $this->db->where('verify_status', $status);
    $this->db->where('confirm_code', $rand_code);
    $results = $this->db->get();
    if($results->num_rows()> 0){
      foreach($results->result_array() as $row){
        if($row['verify_status'] == $status){
          return FALSE;
        }
        else if($row['verify_status'] ==1){
          return TRUE;
        }
      }
    }
  }
    public function acknowledge_user($user_id){
      $status=1;
      $this->db->set('acknowledged', $status);
      $this->db->where('user_id', $user_id);
      $update_status = $this->db->update('users');
      if($update_status){
        return TRUE;
      }
      else{
        return FALSE;
      }
    }

    public function update_admin_pwd($new_pwd, $email){
      $status=1;
      $this->db->set('pass', $new_pwd);
      $this->db->set('reset_status', $status);
      $this->db->where('email', $email);
      $update = $this->db->update('admins');
      if($update){
        return TRUE;
      }
      else{
        return FALSE;
      }
    }
  public function update_cust($fName, $lName, $email, $phone_num, $ticket){
    $this->db->set('email', $email);
    $this->db->set('phone_num', $phone_num);
    $this->db->set('ticket', $ticket);
    $this->db->where('fName',$fName);
    $this->db->where('lName', $lName);
    $update_profile = $this->db->update('users');
    if(!$update_profile){
      return FALSE;
    }
    else{
      return TRUE;
    }

  }
  public function get_messages(){
    $data = $this->db->query('SELECT * FROM messages WHERE acknowledged=0 ORDER BY message_id');
    return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
  }

  public function count_messages(){
    $data = $this->db->query('SELECT * FROM messages ORDER BY message_id');
    return $data->num_rows();
  }
  public function total_users(){
    $data = $this->db->query('SELECT * FROM users');
    return $data->num_rows();
  }
  public function college_members(){
    $data = $this->db->query('');
  }
  public function num_new_users(){
    $data = $this->db->query('SELECT * FROM users WHERE acknowledged=0');
    return $data->num_rows();
  }
  public function get_new_users(){
    $data = $this->db->query('SELECT * FROM users WHERE acknowledged=0');
    return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());

  }
  public function check_user($email, $phone_num){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('email', $this->input->post('email'));
    $this->db->or_where('phone_num', $this->input->post('phone_num'));
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return FALSE;
    }
    else{
      return TRUE;
    }

  }

  public function get_users(){
    $data = $this->db->query('SELECT * FROM users ORDER BY curr_date');
    return array('count'=>$data->num_rows(), 'data'=>$data->result(),'first'=>$data->row());
  }
  public function delete_user($user_id){
    $this->db->where('user_id', $user_id);
    $delete = $this->db->delete('users');
    if($delete){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
  public function search($fName){
    $this->db->like('fName', $fName);
    $results = $this->db->get('users');
    return $results->result_array();
  }
  public function if_exists($email){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('email', $this->input->post('email'));
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return TRUE;
    }
    else{
      return FALSE;
    }
  }
  public function get_admin($user, $pwd){
    $this->db->select('*');
    $this->db->from('admins');
    $this->db->where('username', $user);
    $query = $this->db->get();
    if($query->num_rows() > 0){
      foreach($query->result_array() as $row){
        $fName = $row['fName'];
        $lName = $row['lName'];
        $uname = $row['username'];
        $upass = $row['pass'];
        $email = $row['email'];
        if(!password_verify($pwd, $upass)){
          return FALSE;
        }
        else{
          return TRUE;
          $results = $this->db->query($query)->result();

        }
      }
    }

  }

  public function get_admin_data($email){
    $this->db->select('*');
    $this->db->from('admins');
    $this->db->where('email', $this->input->post('email'));
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return TRUE;
      return $query;
    }
    else{
      return FALSE;
    }
  }

  public function validate($email, $pass){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('email', $email);
    $query= $this->db->get();
    $result =$query->result_array();
    $count = count($result);
    if($count > 0){
      foreach($result as $row){
        $upass = $row['pwd'];
        if(!password_verify($pass, $upass)){
          return FALSE;
        }
        else{
          return TRUE;
        }
      }
      return $result->result();
    }
    //else{
      //return FALSE;
  //  }
  }

  public function get_user($email){
    $sql = "SELECT * FROM users WHERE email='{$email}'";
    $result = $this->db->query($sql)->result();
    return $result;
    }

  public function get_customer($user_id){
    $sql = "SELECT * FROM users WHERE user_id='{$user_id}'";
    $result = $this->db->query($sql)->result();
    return $result;
    }
    public function get_message($message_id){
      $get_msg = "SELECT * FROM messages WHERE message_id='{$message_id}'";
      $result = $this->db->query($get_msg)->result();
      return $result;
    }
    public function send_msg($msg_array){
      return  $this->db->insert('admin_response' ,$msg_array);

    }
  public function message_admin($message_array){
  if($this->db->insert('messages' ,$message_array)){
    return TRUE;
  }
  else{
    return FALSE;
  }

  }
}
?>
