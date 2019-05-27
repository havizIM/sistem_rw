<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Core extends CI_Model
  {

    function buatKode($tabel, $inisial, $field, $panjang)
    {
      $sql = "SELECT MAX(RIGHT(".$field.", ".$panjang.")) as kd_max FROM $tabel";
      $q = $this->db->query($sql);

      if($q->num_rows() > 0){
        foreach ($q->result() as $key) {
          $tmp = ((int)$key->kd_max)+1;
          $kd = sprintf("%0".$panjang."s", $tmp);
        }
      } else {
        $kd = sprintf("%0".$panjang."s", $tmp);
      }

      $new_kode = $inisial.$kd;
      return $new_kode;
    }

    function select($table, $where = null)
    {
      if($where == null){
        return $this->db->get($table);
      } else {
        return $this->db->get_where($table, $where);
      }
    }

    function add_data($table, $data)
    {
      return $this->db->insert($table, $data);
    }

    function edit_data($table, $data, $where)
    {
      $this->db->where($where);
      return $this->db->update($table, $data);
    }

    function hapus_data($table, $where)
    {
      $this->db->where($where);
      return $this->db->delete($table);
    }

  }

?>
