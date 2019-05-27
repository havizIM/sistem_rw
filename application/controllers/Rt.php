<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rt extends CI_Controller {

 function dashboard(){
		$this->load->view('rt/dashboard');
	}

  function ktp(){
    $this->load->view('rt/ktp');
  }

  function domisili(){
    $this->load->view('rt/domisili');
  }

  function kehilangan(){
    $this->load->view('rt/kehilangan');
  }

  function kematian(){
    $this->load->view('rt/kematian');
  }

  function pindah(){
    $this->load->view('rt/pindah');
  }

  function keluarga(){
    $this->load->view('rt/keluarga');
  }

  function anggota($id){
    $data['no_kk'] = $id;
    $this->load->view('rt/anggota', $data);
  }
}
?>
