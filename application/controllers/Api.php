<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Api extends CI_Controller {

    function __construct()
    {
      parent::__construct();
      $this->load->model('core');
      $this->load->model('main');
    }

    function profile_keluarga()
    {
        header('Content-Type: application/json');

        $where = array(
          'a.no_kk' => $this->session->userdata('no_kk'),
          'a.status_keluarga' => 'Kepala Keluarga'
        );

        $where1 = array(
          'no_kk' => $this->session->userdata('no_kk')
        );

        $data['keluarga'] = $this->main->show_keluarga($where)->result();
        $data['anggota'] = $this->core->select('anggota', $where1)->result();

        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function show_pengajuan()
    {
      header('Content-Type: application/json');

      $where = array('no_kk' => $this->session->userdata('no_kk'));
      $data['pengajuan'] = $this->main->show_pengajuan($where)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function add_pengajuan()
    {
      $data = array(
        'no_pengajuan' => $this->core->buatKode('pengajuan', 'PJ', 'no_pengajuan', 11),
        'no_kk' => $this->session->userdata('no_kk'),
        'tgl_pengajuan' => date('Y-m-d'),
        'NIK' => $this->input->post('nik'),
        'nama_pengajuan' => $this->input->post('nama_pengajuan'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'pekerjaan' => $this->input->post('pekerjaan'),
        'kewarganegaraan' => $this->input->post('kewarganegaraan'),
        'pendidikan' => $this->input->post('pendidikan'),
        'agama' => $this->input->post('agama'),
        'alamat' => $this->input->post('alamat'),
        'keperluan' => $this->input->post('keperluan'),
        'status_pengajuan' => 'Proses'
      );

      $cek = $this->core->add_data('pengajuan', $data);

      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }
    }

    function batal_pengajuan($param)
    {
      $where = array(
        'no_pengajuan' => $param
      );

      $cek = $this->core->hapus_data('pengajuan', $where);

      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }
    }

    function upload_dokumen()
    {
      $no_pengajuan = $this->input->post('no_pengajuan');
      $keterangan = $this->input->post('keterangan');

      $upload = $this->main->upload($no_pengajuan);

      // echo $upload['result'];
      if($upload['result'] == "success"){

        $data = array(
  				'no_pengajuan' => $no_pengajuan,
          'keterangan' => $keterangan,
          'foto_dokumen' => $upload['file']['file_name']
  			);

        $cek = $this->core->add_data('pelengkap', $data);
        if($cek){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      }
    }

    function detail_pengajuan($no_pengajuan)
    {
      header('Content-Type: application/json');

      $where = array('no_pengajuan' => $no_pengajuan);
      $data['detail'] = $this->core->select('pengajuan', $where)->result();
      $data['pelengkap'] = $this->core->select('pelengkap', $where)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function select_pengajuan()
    {
      header('Content-Type: application/json');

      $level = $this->session->userdata('level');

      if($level == 'RT'){
        $where = array(
          'a.status_pengajuan' => 'Proses',
          'b.rtrw' => $this->session->userdata('rtrw')
        );

        $where1 = array(
          'rtrw' => $this->session->userdata('rtrw')
        );
        $status = 'Proses';
      } elseif($level == 'RW'){
        $where = array(
          'a.status_pengajuan' => 'Menunggu',
        );

        $where1 = null;
        $status = 'Menunggu';
      }

      $data['pengajuan'] = $this->main->select_pengajuan($where)->result();
      $data['summary'] = $this->main->select_summary($where1, $status)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function validasi_pengajuan()
    {

      // $id_daftar = $this->input->post('id_daftar');
      // $status = $this->input->post('status');
      // $email = $this->input->post('email');
      // $maildata['id_daftar'] = $this->input->post('id_daftar');
      // $maildata['nama_wali'] = $this->input->post('nama_wali');
      // $maildata['nama_murid'] = $this->input->post('nama_murid');
      //
      // if($status == 'Terima'){
      //   $message = $this->load->view('admin/v_email_accept', $maildata,  TRUE);
      // } else {
      //   $message = $this->load->view('admin/v_email_reject', $maildata,  TRUE);
      // }

      // $config = [
      //     'useragent' => 'CodeIgniter',
      //     'protocol'  => 'smtp',
      //     'mailpath'  => '/usr/sbin/sendmail',
      //     'smtp_host' => 'ssl://smtp.gmail.com',
      //     'smtp_user' => 'mawarpaud15@gmail.com',   // Ganti dengan email gmail Anda.
      //     'smtp_pass' => 'paudmawar015',             // Password gmail Anda.
      //     'smtp_port' => 465,
      //     'smtp_keepalive' => TRUE,
      //     'smtp_crypto' => 'SSL',
      //     'wordwrap'  => TRUE,
      //     'wrapchars' => 80,
      //     'mailtype'  => 'html',
      //     'charset'   => 'utf-8',
      //     'validate'  => TRUE,
      //     'crlf'      => "\r\n",
      //     'newline'   => "\r\n",
      // ];
      // $config['mailtype'] = 'html';
      //
      // $this->email->initialize($config);
      // $this->email->from('mawarpaud15@gmail.com','PAUD MAWAR 015');
      // $this->email->to($email);
      // $this->email->subject('Hasil Penerimaan Murid PAUD 015');
      // $this->email->message($message);

      $where = array('no_pengajuan' => $this->input->post('no_pengajuan'));
      $data = array('status_pengajuan' => 'Menunggu');

      $cek = $this->core->edit_data('pengajuan', $data, $where);

      if($cek){
        echo "berhasil";
        // $this->email->send();
      } else {
        echo "gagal";
      }
    }

    function select_keluarga()
    {
      header('Content-Type: application/json');

      $level = $this->session->userdata('level');

      if($level == 'RT'){
        $where = array('rtrw' => $this->session->userdata('rtrw'));
      } elseif($level == 'RW'){
        $where = null;
      }

      $data['keluarga'] = $this->main->select_keluarga($where)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function select_ktp()
    {
      header('Content-Type: application/json');

      $level = $this->session->userdata('level');

      if($level == 'RT'){
        $where = array(
          'a.status_pengajuan' => 'Menunggu',
          'a.keperluan' => 'Pembuatan KTP',
          'b.rtrw' => $this->session->userdata('rtrw')
        );
      } elseif($level == 'RW'){
        $where = array(
          'a.status_pengajuan' => 'Selesai',
          'a.keperluan' => 'Pembuatan KTP'
        );
      }

      $data['ktp'] = $this->main->select_pengajuan($where)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function select_domisili()
    {
      header('Content-Type: application/json');

      $level = $this->session->userdata('level');

      if($level == 'RT'){
        $where = array(
          'a.status_pengajuan' => 'Menunggu',
          'a.keperluan' => 'Surat Domisili',
          'b.rtrw' => $this->session->userdata('rtrw')
        );
      } elseif($level == 'RW'){
        $where = array(
          'a.status_pengajuan' => 'Selesai',
          'a.keperluan' => 'Surat Domisili'
        );
      }


      $data['ktp'] = $this->main->select_pengajuan($where)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function select_kehilangan()
    {
      header('Content-Type: application/json');

      $level = $this->session->userdata('level');

      if($level == 'RT'){
        $where = array(
          'a.status_pengajuan' => 'Menunggu',
          'a.keperluan' => 'Surat Kehilangan',
          'b.rtrw' => $this->session->userdata('rtrw')
        );
      } elseif($level == 'RW'){
        $where = array(
          'a.status_pengajuan' => 'Selesai',
          'a.keperluan' => 'Surat Kehilangan'
        );
      }

      $data['ktp'] = $this->main->select_pengajuan($where)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function select_kematian()
    {
      header('Content-Type: application/json');

      $level = $this->session->userdata('level');

      if($level == 'RT'){
        $where = array(
          'a.status_pengajuan' => 'Menunggu',
          'a.keperluan' => 'Surat Kematian',
          'b.rtrw' => $this->session->userdata('rtrw')
        );
      } elseif($level == 'RW'){
        $where = array(
          'a.status_pengajuan' => 'Selesai',
          'a.keperluan' => 'Surat Kematian'
        );
      }

      $data['ktp'] = $this->main->select_pengajuan($where)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function select_pindah()
    {
      header('Content-Type: application/json');

      $level = $this->session->userdata('level');

      if($level == 'RT'){
        $where = array(
          'a.status_pengajuan' => 'Menunggu',
          'a.keperluan' => 'Surat Pindah',
          'b.rtrw' => $this->session->userdata('rtrw')
        );
      } elseif($level == 'RW'){
        $where = array(
          'a.status_pengajuan' => 'Selesai',
          'a.keperluan' => 'Surat Pindah'
        );
      }

      $data['ktp'] = $this->main->select_pengajuan($where)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function add_keluarga()
    {
      $data = array(
        'no_kk' => $this->input->post('no_kk'),
        'tgl_kk' => $this->input->post('tgl_kk'),
        'alamat' => $this->input->post('alamat'),
        'rtrw' => $this->session->userdata('rtrw'),
        'kode_pos' => '14440',
        'provinsi' => 'DKI Jakarta',
        'kotamadya' => 'Jakarta Barat',
        'kecamatan' => 'Grogol Petamburan',
        'kelurahan' => 'Grogol'
      );

      $cek = $this->core->add_data('keluarga', $data);
      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }
    }

    function select_anggota($id)
    {
      header('Content-Type: application/json');

      $where = array(
        'a.no_kk' => $id,
        'a.status_keluarga' => 'Kepala Keluarga'
      );

      $where1 = array(
        'no_kk' => $id
      );

      $data['keluarga'] = $this->main->show_keluarga($where)->result();
      $data['anggota'] = $this->core->select('anggota', $where1)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    function add_anggota()
    {

      $data = array(
        'NIK' => $this->input->post('nik'),
        'nama' => $this->input->post('nama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'agama' => $this->input->post('agama'),
        'pendidikan' => $this->input->post('pendidikan'),
        'pekerjaan' => $this->input->post('pekerjaan'),
        'status_perkawinan' => $this->input->post('status_perkawinan'),
        'status_keluarga' => $this->input->post('status_keluarga'),
        'kewarganegaraan' => $this->input->post('kewarganegaraan'),
        'no_paspor' => $this->input->post('no_paspor'),
        'no_kitap' => $this->input->post('no_kitap'),
        'nama_ayah' => $this->input->post('nama_ayah'),
        'nama_ibu' => $this->input->post('nama_ibu'),
        'no_kk' => $this->input->post('no_kk')
      );

      $cek = $this->core->add_data('anggota', $data);
      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }

    }

    function edit_anggota()
    {
      $data = array(
        'nama' => $this->input->post('nama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'agama' => $this->input->post('agama'),
        'pendidikan' => $this->input->post('pendidikan'),
        'pekerjaan' => $this->input->post('pekerjaan'),
        'status_perkawinan' => $this->input->post('status_perkawinan'),
        'status_keluarga' => $this->input->post('status_keluarga'),
        'kewarganegaraan' => $this->input->post('kewarganegaraan'),
        'no_password' => $this->input->post('no_password'),
        'no_kitap' => $this->input->post('no_kitap'),
        'nama_ayah' => $this->input->post('nama_ayah'),
        'nama_ibu' => $this->input->post('nama_ibu'),
        'no_kk' => $this->input->post('no_kk')
      );

      $where = array('NIK' => $this->input->post('nik'));

      $cek = $this->core->edit_data('anggota', $data, $where);
      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }
    }


    function hapus_anggota($id)
    {
      $where = array('NIK' => $id);

      $cek = $this->core->hapus_data('anggota', $where);

      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }
    }

    function hapus_keluarga($id)
    {
      $where = array('no_kk' => $id);

      $cek = $this->core->hapus_data('keluarga', $where);

      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }
    }

    function edit_keluarga()
    {
      $where = array('no_kk' => $this->input->post('no_kk'));

      $data = array(
        'tgl_kk' => $this->input->post('tgl_kk'),
        'alamat' => $this->input->post('alamat')
      );

      $cek = $this->core->edit_data('keluarga', $data, $where);
      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }
    }

    function add_dokumen()
    {
      $id = 'SP-006-010-'.date('dmY').'-';
      $no_dokumen = $this->core->buatKode('dokumen', $id, 'no_dokumen', 4);
      $keterangan = $this->input->post('keterangan');
      $no_pengajuan = $this->input->post('no_pengajuan');
      $diambil_oleh = $this->input->post('diambil_oleh');

      $data = array(
        'no_dokumen' => $no_dokumen,
        'keterangan' => $keterangan,
        'no_pengajuan' => $no_pengajuan,
        'diambil_oleh' => $diambil_oleh,
        'tgl_pengambilan' => date('Y-m-d')
      );

      $data1 = array(
        'status_pengajuan' => 'Selesai'
      );

      $where = array(
        'no_pengajuan' => $this->input->post('no_pengajuan')
      );

      $cek = $this->core->add_data('dokumen', $data);
      if($cek){
        $cek1 = $this->core->edit_data('pengajuan', $data1, $where);
        if($cek1){
          echo "berhasil";
        } else {
          echo "gagal";
        }
      } else {
        echo "gagal";
      }
    }

    function lookup_anggota($id)
    {
      header('Content-Type: application/json');

      $where = array('a.no_kk' => $id);
      $data['anggota'] = $this->main->lookup_anggota($where)->result();

      echo json_encode($data, JSON_PRETTY_PRINT);

    }

    function add_user()
    {
      $data = array(
        'no_kk' => $this->input->post('no_kk'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('level'),
        'level' => $this->input->post('level')
      );

      $cek = $this->core->add_data('user', $data);
      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }
    }

  }

?>
