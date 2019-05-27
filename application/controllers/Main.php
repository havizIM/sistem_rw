<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

 function index()
 {
   $login = $this->session->userdata('login');
   $level = $this->session->userdata('level');

   if ($login == true) {
     switch ($level) {
        case 'RT':
          $this->load->view('rt/main');
        break;

        case 'RW':
          $this->load->view('rw/main');
        break;

        case 'Warga':
          $this->load->view('warga/main');
        break;

        case 'Admin':
          $this->load->view('admin/main');
        break;

        default:
          redirect('/');
        break;
      }
   } else {
     redirect('/');
   }

	}
}
?>
