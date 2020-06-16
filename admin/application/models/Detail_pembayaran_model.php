<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pembayaran_model extends CI_Model
{

    public $table = 'detail_pembayaran';
    public $id = 'id';
    public $order = 'DESC';
   

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
       $nis = $_SESSION['nis'];
      return $this->db->query("SELECT * FROM detail_pembayaran where nis='$nis' and status_spp='Belum Lunas'")->result();
    }
    function get_all_history()
    {
       $nis = $_SESSION['nis'];
      return $this->db->query("SELECT * FROM detail_pembayaran where nis='$nis' and status_spp!='Belum Lunas'")->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('kode_pembayaran', $q);
	$this->db->or_like('semester', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('kode_kelas', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('nis', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('biaya_spp', $q);
	$this->db->or_like('status_spp', $q);
	$this->db->or_like('biaya_osis', $q);
	$this->db->or_like('status_osis', $q);
	$this->db->or_like('tanggal_jatuh_tempo', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('kode_pembayaran', $q);
	$this->db->or_like('semester', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('kode_kelas', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('nis', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('biaya_spp', $q);
	$this->db->or_like('status_spp', $q);
	$this->db->or_like('biaya_osis', $q);
	$this->db->or_like('status_osis', $q);
	$this->db->or_like('tanggal_jatuh_tempo', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Detail_pembayaran_model.php */
/* Location: ./application/models/Detail_pembayaran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-11 04:10:00 */
/* http://harviacode.com */