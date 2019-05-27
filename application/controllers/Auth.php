<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
 function __construct() {
   parent::__construct();
   $this->load->model('core');
   $this->load->model('main');
 }

 function index()
	{
    $login = $this->session->userdata('login');
    if($login == true){
      redirect('/main');
    }
		$this->load->view('login');
	}


  function cekLogin() {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $where = array(
      'a.email' =>  $email,
      'a.password' => $password
    );

    $cek = $this->main->select_user($where);
    if($cek->num_rows() == 1){
      foreach($cek->result() as $key){
          $no_kk = $key->no_kk;
          $level = $key->level;
          $rtrw = $key->rtrw;
          $email = $key->email;
      }

      $session = array(
        'no_kk' => $no_kk,
        'rtrw' => $rtrw,
        'level' => $level,
        'email' => $email,
        'login' => true
      );

      $this->session->set_userdata($session);
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }


  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url().'');
  }

  function ganti_password()
  {
     $email    = $this->session->userdata('email');
     $new_pass = $this->input->post('new_pass');
     $old_pass = $this->input->post('old_pass');
     $where = array(
       'email' => $email,
       'password' => $old_pass
     );
     $data = array(
       'password' => $new_pass
     );
     $rows = $this->core->select('user', $where)->num_rows();
     if($rows == 1)
     {
       $cek = $this->core->edit_data('user', $data, $where);
       if($cek)
       {
         echo "berhasil";
       } else {
         echo "gagal";
       }
     }  else {
       echo "gagal";
     }
   }


}
?>
