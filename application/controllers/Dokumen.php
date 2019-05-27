<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Dokumen extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');

      $this->load->model('core');
      $this->load->model('main');
      if($this->session->userdata('login') != true)
      {
        redirect('/');
      }
    }

    function print_surat($id)
    {
      $where = array(
        'no_dokumen' => $id
      );

      $data = $this->main->print_surat($where)->result();

      foreach ($data as $detail) {
        $no_dokumen = $detail->no_dokumen;
        $nama = $detail->nama_pengajuan;
        $jenis_kelamin = $detail->jenis_kelamin;
        $tempat_lahir = $detail->tempat_lahir;
        $tgl_lahir = $detail->tgl_lahir;
        $pekerjaan = $detail->pekerjaan;
        $nik = $detail->NIK;
        $kewarganegaraan = $detail->kewarganegaraan;
        $pendidikan = $detail->pendidikan;
        $agama = $detail->agama;
        $alamat = $detail->alamat;
        $keperluan = $detail->keperluan;
        $rtrw = $detail->rtrw;
      }

      $this->load->library('pdf');
      $pdf = new FPDF('P','mm','A4');
      $pdf->AddPage();

      $pdf->Image('image/logo.png',10,10,30,30);
      $pdf->SetFont('Arial','B',15);
      $pdf->Cell(200,10,'RT/RW : '.$rtrw,0,1,'C');
      $pdf->Cell(200,10,'KEL : GROGOL, KEC : GROGOL PETAMBURAN',0,1,'C');
      $pdf->Cell(200,10,'JAKARTA BARAT',0,1,'C');
      $pdf->ln(5);
      $pdf->Cell(190,0,'',1,0,'C');
      $pdf->ln(5);

      $pdf->SetFont('Arial','B',13);
      $pdf->Cell(80);
      $pdf->Cell(30,5,'SURAT PENGANTAR',0,1,'C');
      $pdf->SetFont('Arial','I',10);
      $pdf->Cell(80);
      $pdf->Cell(30,5,'Nomor: '.$no_dokumen,0,1,'C');
      $pdf->ln(10);

      $pdf->SetFont('Arial','',10);
      $pdf->Cell(0,5,'Yang bertanda tangan di bawah ini, Pengurus RT/RW. '.$rtrw.' Kelurahan Grogol Kecamatan Grogol Petamburan,',0,1);
      $pdf->Cell(0,5,'dengan ini menyatakan bahwa :',0,1);
      $pdf->ln(5);

      $pdf->Cell(50,5,'Nama',0,0);
      $pdf->Cell(50,5,': '.$nama,0,0);
      $pdf->ln(10);

      $pdf->Cell(50,5,'Jenis Kelamin',0,0);
      $pdf->Cell(50,5,': '.$jenis_kelamin,0,0);
      $pdf->ln(10);

      $pdf->Cell(50,5,'Tempat/Tgl.Lahir',0,0);
      $pdf->Cell(50,5,': '.$tempat_lahir.', '.$tgl_lahir,0,0);
      $pdf->ln(10);

      $pdf->Cell(50,5,'Pekerjaan',0,0);
      $pdf->Cell(50,5,': '.$pekerjaan,0,0);
      $pdf->ln(10);

      $pdf->Cell(50,5,'Nomor KTP/KK',0,0);
      $pdf->Cell(50,5,': '.$nik,0,0);
      $pdf->ln(10);

      $pdf->Cell(50,5,'Kewarganegaraan',0,0);
      $pdf->Cell(50,5,': '.$kewarganegaraan,0,0);
      $pdf->ln(10);

      $pdf->Cell(50,5,'Pendidikan',0,0);
      $pdf->Cell(50,5,': '.$pendidikan,0,0);
      $pdf->ln(10);

      $pdf->Cell(50,5,'Agama',0,0);
      $pdf->Cell(50,5,': '.$agama,0,0);
      $pdf->ln(10);

      $pdf->Cell(50,5,'Alamat',0,0);
      $pdf->Cell(50,5,': '.$alamat,0,0);
      $pdf->ln(20);

      if($keperluan == 'Pembuatan KTP'){
        $pdf->Cell(50,5,'Maksud/Keperluan',0,0);
        $pdf->Cell(50,5,': Orang tersebut diatas, adalah benar-benar warga kami '.$rtrw.', Penjaringan, Jakarta Utara',0,0);
        $pdf->ln();
        $pdf->Cell(50,5,'',0,0);
        $pdf->Cell(50,5,'  Surat Pengantar ini dibuat sebagai kelengkapan pengurusan pembuatan',0,0);
        $pdf->ln();
        $pdf->Cell(50,5,'',0,0);
        $pdf->Cell(50,5,'  KTP (Kartu Tanda Penduduk)',0,0);
        $pdf->ln(30);
      } elseif($keperluan == 'Surat Domisili'){
        $pdf->Cell(50,5,'Maksud/Keperluan',0,0);
        $pdf->Cell(50,5,': Benar nama tersebut adalah Warga kami dan berdomisili di wilayah kami',0,0);
        $pdf->ln();
        $pdf->Cell(50,5,'',0,0);
        $pdf->Cell(50,5,'  '.$rtrw.', Penjaringan, Jakarta Utara',0,0);
        $pdf->ln(30);
      } elseif($keperluan == 'Surat Pindah'){
        $pdf->Cell(50,5,'Maksud/Keperluan',0,0);
        $pdf->Cell(50,5,': Orang tersebut diatas, adalah benar-benar warga kami '.$rtrw.', Penjaringan, Jakarta Utara',0,0);
        $pdf->ln();
        $pdf->Cell(50,5,'',0,0);
        $pdf->Cell(50,5,'  Surat Pengantar ini dibuat sebagai kelengkapan pengurusan pembuatan',0,0);
        $pdf->ln();
        $pdf->Cell(50,5,'',0,0);
        $pdf->Cell(50,5,'  Surat Pindah',0,0);
        $pdf->ln(30);
      } elseif($keperluan == 'Surat Kehilangan'){
        $pdf->Cell(50,5,'Maksud/Keperluan',0,0);
        $pdf->Cell(50,5,': Orang tersebut diatas, adalah benar-benar warga kami '.$rtrw.', Penjaringan, Jakarta Utara',0,0);
        $pdf->ln();
        $pdf->Cell(50,5,'',0,0);
        $pdf->Cell(50,5,'  Surat Pengantar ini dibuat sebagai kelengkapan pengurusan pembuatan',0,0);
        $pdf->ln();
        $pdf->Cell(50,5,'',0,0);
        $pdf->Cell(50,5,'  Surat Kehilangan',0,0);
        $pdf->ln(30);
      } elseif($keperluan == 'Surat Kematian'){
        $pdf->Cell(50,5,'Maksud/Keperluan',0,0);
        $pdf->Cell(50,5,': Orang tersebut diatas, adalah benar-benar warga kami '.$rtrw.', Penjaringan, Jakarta Utara',0,0);
        $pdf->ln();
        $pdf->Cell(50,5,'',0,0);
        $pdf->Cell(50,5,'  Surat Pengantar ini dibuat sebagai kelengkapan pengurusan pembuatan',0,0);
        $pdf->ln();
        $pdf->Cell(50,5,'',0,0);
        $pdf->Cell(50,5,'  Surat Kematian',0,0);
        $pdf->ln(30);
      }


      $pdf->Cell(90,5,'Mengetahui',0,0,'C');
      $pdf->Cell(90,5,'Jakarta, ',0,0,'C');
      $pdf->ln(5);

      $pdf->Cell(90,5,'Pengurus RW. 010 / I',0,0,'C');
      $pdf->Cell(90,5,'Pengurus RT.006 / RW.010 ',0,0,'C');
      $pdf->ln(10);

      $pdf->ln();
      $pdf->ln();
      $pdf->ln();
      $pdf->ln();
      $pdf->ln();
      $pdf->ln();

      $pdf->Cell(90,5,'( Ketua RW. 010 )',0,0,'C');
      $pdf->Cell(90,5,'( Ketua RT. '.$rtrw.' )',0,0,'C');
      $pdf->ln(5);

      $pdf->ln(10);

      $pdf->Output();
    }

    function print_pktp()
    {
      $tgl_from = $this->input->post('tgl_mulai');
      $tgl_to = $this->input->post('tgl_selesai');

      $data['tgl_from'] = $tgl_from;
      $data['tgl_to'] = $tgl_to;

      $level = $this->session->userdata('level');
      if($level == 'RT'){
        $where = array(
          'a.status_pengajuan' => 'Menunggu',
          'a.keperluan' => 'Pembuatan KTP',
          'b.rtrw' => $this->session->userdata('rtrw')
        );
      } elseif($level == 'RW') {
        $where = array(
          'a.status_pengajuan' => 'Selesai',
          'a.keperluan' => 'Pembuatan KTP'
        );
      }

      $between = "tgl_pengajuan BETWEEN '$tgl_from' AND '$tgl_to'";
      $data = $this->main->select_pengajuan($where, $between);


        $this->load->library('pdf');
    		$pdf = new FPDF('L','mm','A4');
    		$pdf->AddPage();

        $pdf->Image('image/logo.png',10,10,30,30);
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(280,10,'RT/RW : '. $this->session->userdata('rtrw'),0,1,'C');
        $pdf->Cell(280,10,'KEL : GROGOL, KEC : GROGOL PETAMBURAN',0,1,'C');
        $pdf->Cell(280,10,'JAKARTA UTARA',0,1,'C');
        $pdf->ln(5);
        $pdf->Cell(280,0,'',1,0,'C');
        $pdf->ln(5);

        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(0,5,'Data Pengajuan KTP periode '.$tgl_from.' s/d '.$tgl_to,0,0);
        $pdf->ln(10);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,7,'No.',1,0,'C');
        $pdf->Cell(30,7,'No. Pengajuan',1,0,'C');
        $pdf->Cell(30,7,'Tgl Pengajuan',1,0,'C');
        $pdf->Cell(60,7,'NIK',1,0,'C');
        $pdf->Cell(60,7,'Nama',1,0,'C');
        $pdf->Cell(60,7,'No KK',1,0,'C');
        $pdf->Cell(30,7,'Keperluan',1,0,'C');
        //
        $pdf->SetFont('Arial','',10);
        $no = 1;
        foreach ($data->result() as $key) {
          $pdf->ln();
          $pdf->Cell(10,7,$no++,1,0,'C');
          $pdf->Cell(30,7,$key->no_pengajuan,1,0,'C');
          $pdf->Cell(30,7,$key->tgl_pengajuan,1,0,'C');
          $pdf->Cell(60,7,$key->NIK,1,0,'C');
          $pdf->Cell(60,7,$key->nama_pengajuan,1,0,'C');
          $pdf->Cell(60,7,$key->no_kk,1,0,'C');
          $pdf->Cell(30,7,$key->keperluan,1,0,'C');
        }

        $pdf->Output();
      }

      function print_pdomisili()
      {
        $tgl_from = $this->input->post('tgl_mulai');
        $tgl_to = $this->input->post('tgl_selesai');

        $data['tgl_from'] = $tgl_from;
        $data['tgl_to'] = $tgl_to;

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

        $between = "tgl_pengajuan BETWEEN '$tgl_from' AND '$tgl_to'";
        $data = $this->main->select_pengajuan($where, $between);


          $this->load->library('pdf');
      		$pdf = new FPDF('L','mm','A4');
      		$pdf->AddPage();

          $pdf->Image('image/logo.png',10,10,30,30);
          $pdf->SetFont('Arial','B',15);
          $pdf->Cell(280,10,'RT/RW : '. $this->session->userdata('rtrw'),0,1,'C');
          $pdf->Cell(280,10,'KEL : GROGOL, KEC : GROGOL PETAMBURAN',0,1,'C');
          $pdf->Cell(280,10,'JAKARTA UTARA',0,1,'C');
          $pdf->ln(5);
          $pdf->Cell(280,0,'',1,0,'C');
          $pdf->ln(5);

          $pdf->SetFont('Arial','B',13);
          $pdf->Cell(0,5,'Data Pengajuan Domisili periode '.$tgl_from.' s/d '.$tgl_to,0,0);
          $pdf->ln(10);
          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(10,7,'No.',1,0,'C');
          $pdf->Cell(30,7,'No. Pengajuan',1,0,'C');
          $pdf->Cell(30,7,'Tgl Pengajuan',1,0,'C');
          $pdf->Cell(60,7,'NIK',1,0,'C');
          $pdf->Cell(60,7,'Nama',1,0,'C');
          $pdf->Cell(60,7,'No KK',1,0,'C');
          $pdf->Cell(30,7,'Keperluan',1,0,'C');
          //
          $pdf->SetFont('Arial','',10);
          $no = 1;
          foreach ($data->result() as $key) {
            $pdf->ln();
            $pdf->Cell(10,7,$no++,1,0,'C');
            $pdf->Cell(30,7,$key->no_pengajuan,1,0,'C');
            $pdf->Cell(30,7,$key->tgl_pengajuan,1,0,'C');
            $pdf->Cell(60,7,$key->NIK,1,0,'C');
            $pdf->Cell(60,7,$key->nama_pengajuan,1,0,'C');
            $pdf->Cell(60,7,$key->no_kk,1,0,'C');
            $pdf->Cell(30,7,$key->keperluan,1,0,'C');
          }

          $pdf->Output();
        }

        function print_pkehilangan()
        {
          $tgl_from = $this->input->post('tgl_mulai');
          $tgl_to = $this->input->post('tgl_selesai');

          $data['tgl_from'] = $tgl_from;
          $data['tgl_to'] = $tgl_to;

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

          $between = "tgl_pengajuan BETWEEN '$tgl_from' AND '$tgl_to'";
          $data = $this->main->select_pengajuan($where, $between);


            $this->load->library('pdf');
        		$pdf = new FPDF('L','mm','A4');
        		$pdf->AddPage();

            $pdf->Image('image/logo.png',10,10,30,30);
            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(280,10,'RT/RW : '. $this->session->userdata('rtrw'),0,1,'C');
            $pdf->Cell(280,10,'KEL : GROGOL, KEC : GROGOL PETAMBURAN',0,1,'C');
            $pdf->Cell(280,10,'JAKARTA UTARA',0,1,'C');
            $pdf->ln(5);
            $pdf->Cell(280,0,'',1,0,'C');
            $pdf->ln(5);

            $pdf->SetFont('Arial','B',13);
            $pdf->Cell(0,5,'Data Pengajuan Surat Kehilangan periode '.$tgl_from.' s/d '.$tgl_to,0,0);
            $pdf->ln(10);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,7,'No.',1,0,'C');
            $pdf->Cell(30,7,'No. Pengajuan',1,0,'C');
            $pdf->Cell(30,7,'Tgl Pengajuan',1,0,'C');
            $pdf->Cell(60,7,'NIK',1,0,'C');
            $pdf->Cell(60,7,'Nama',1,0,'C');
            $pdf->Cell(60,7,'No KK',1,0,'C');
            $pdf->Cell(30,7,'Keperluan',1,0,'C');
            //
            $pdf->SetFont('Arial','',10);
            $no = 1;
            foreach ($data->result() as $key) {
              $pdf->ln();
              $pdf->Cell(10,7,$no++,1,0,'C');
              $pdf->Cell(30,7,$key->no_pengajuan,1,0,'C');
              $pdf->Cell(30,7,$key->tgl_pengajuan,1,0,'C');
              $pdf->Cell(60,7,$key->NIK,1,0,'C');
              $pdf->Cell(60,7,$key->nama_pengajuan,1,0,'C');
              $pdf->Cell(60,7,$key->no_kk,1,0,'C');
              $pdf->Cell(30,7,$key->keperluan,1,0,'C');
            }

            $pdf->Output();
          }

          function print_pkematian()
          {
            $tgl_from = $this->input->post('tgl_mulai');
            $tgl_to = $this->input->post('tgl_selesai');

            $data['tgl_from'] = $tgl_from;
            $data['tgl_to'] = $tgl_to;

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

            $between = "tgl_pengajuan BETWEEN '$tgl_from' AND '$tgl_to'";
            $data = $this->main->select_pengajuan($where, $between);


              $this->load->library('pdf');
          		$pdf = new FPDF('L','mm','A4');
          		$pdf->AddPage();

              $pdf->Image('image/logo.png',10,10,30,30);
              $pdf->SetFont('Arial','B',15);
              $pdf->Cell(280,10,'RT/RW : '. $this->session->userdata('rtrw'),0,1,'C');
              $pdf->Cell(280,10,'KEL : GROGOL, KEC : GROGOL PETAMBURAN',0,1,'C');
              $pdf->Cell(280,10,'JAKARTA UTARA',0,1,'C');
              $pdf->ln(5);
              $pdf->Cell(280,0,'',1,0,'C');
              $pdf->ln(5);

              $pdf->SetFont('Arial','B',13);
              $pdf->Cell(0,5,'Data Pengajuan Surat Kematian periode '.$tgl_from.' s/d '.$tgl_to,0,0);
              $pdf->ln(10);
              $pdf->SetFont('Arial','B',10);
              $pdf->Cell(10,7,'No.',1,0,'C');
              $pdf->Cell(30,7,'No. Pengajuan',1,0,'C');
              $pdf->Cell(30,7,'Tgl Pengajuan',1,0,'C');
              $pdf->Cell(60,7,'NIK',1,0,'C');
              $pdf->Cell(60,7,'Nama',1,0,'C');
              $pdf->Cell(60,7,'No KK',1,0,'C');
              $pdf->Cell(30,7,'Keperluan',1,0,'C');
              //
              $pdf->SetFont('Arial','',10);
              $no = 1;
              foreach ($data->result() as $key) {
                $pdf->ln();
                $pdf->Cell(10,7,$no++,1,0,'C');
                $pdf->Cell(30,7,$key->no_pengajuan,1,0,'C');
                $pdf->Cell(30,7,$key->tgl_pengajuan,1,0,'C');
                $pdf->Cell(60,7,$key->NIK,1,0,'C');
                $pdf->Cell(60,7,$key->nama_pengajuan,1,0,'C');
                $pdf->Cell(60,7,$key->no_kk,1,0,'C');
                $pdf->Cell(30,7,$key->keperluan,1,0,'C');
              }

              $pdf->Output();
            }

            function print_ppindah()
            {
              $tgl_from = $this->input->post('tgl_mulai');
              $tgl_to = $this->input->post('tgl_selesai');

              $data['tgl_from'] = $tgl_from;
              $data['tgl_to'] = $tgl_to;

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

              $between = "tgl_pengajuan BETWEEN '$tgl_from' AND '$tgl_to'";
              $data = $this->main->select_pengajuan($where, $between);


                $this->load->library('pdf');
            		$pdf = new FPDF('L','mm','A4');
            		$pdf->AddPage();

                $pdf->Image('image/logo.png',10,10,30,30);
                $pdf->SetFont('Arial','B',15);
                $pdf->Cell(280,10,'RT/RW : '. $this->session->userdata('rtrw'),0,1,'C');
                $pdf->Cell(280,10,'KEL : GROGOL, KEC : GROGOL PETAMBURAN',0,1,'C');
                $pdf->Cell(280,10,'JAKARTA UTARA',0,1,'C');
                $pdf->ln(5);
                $pdf->Cell(280,0,'',1,0,'C');
                $pdf->ln(5);

                $pdf->SetFont('Arial','B',13);
                $pdf->Cell(0,5,'Data Pengajuan Surat Pindah periode '.$tgl_from.' s/d '.$tgl_to,0,0);
                $pdf->ln(10);
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(10,7,'No.',1,0,'C');
                $pdf->Cell(30,7,'No. Pengajuan',1,0,'C');
                $pdf->Cell(30,7,'Tgl Pengajuan',1,0,'C');
                $pdf->Cell(60,7,'NIK',1,0,'C');
                $pdf->Cell(60,7,'Nama',1,0,'C');
                $pdf->Cell(60,7,'No KK',1,0,'C');
                $pdf->Cell(30,7,'Keperluan',1,0,'C');
                //
                $pdf->SetFont('Arial','',10);
                $no = 1;
                foreach ($data->result() as $key) {
                  $pdf->ln();
                  $pdf->Cell(10,7,$no++,1,0,'C');
                  $pdf->Cell(30,7,$key->no_pengajuan,1,0,'C');
                  $pdf->Cell(30,7,$key->tgl_pengajuan,1,0,'C');
                  $pdf->Cell(60,7,$key->NIK,1,0,'C');
                  $pdf->Cell(60,7,$key->nama_pengajuan,1,0,'C');
                  $pdf->Cell(60,7,$key->no_kk,1,0,'C');
                  $pdf->Cell(30,7,$key->keperluan,1,0,'C');
                }

                $pdf->Output();
              }

  }

  ?>
