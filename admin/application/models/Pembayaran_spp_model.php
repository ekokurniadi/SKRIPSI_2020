<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran_spp_model extends CI_Model
{

    public $table = 'pembayaran_spp';
    public $id = 'id';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    function kode()
    {
             $this->db->select('RIGHT(pembayaran_spp.kode_pembayaran,2) as kode_pembayaran', FALSE);
             $this->db->order_by('kode_pembayaran','DESC');    
             $this->db->limit(1);    
             $query = $this->db->get('pembayaran_spp');  //cek dulu apakah ada sudah ada kode di tabel.    
             if($query->num_rows() <> 0){      
                  //cek kode jika telah tersedia    
                  $data = $query->row();      
                  $kode = intval($data->kode_pembayaran) + 1; 
             }
             else{      
                  $kode = 1;  //cek jika kode belum terdapat pada table
             }
                 $tgl=date('dmY'); 
                 $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
                 $kodetampil = "P-".$tgl.$batas;  //format kode
                 return $kodetampil;  
   }

    // get all
    function get_all()
    {
        $this->db->order_by($this->kode_pembayaran, $this->order);
        return $this->db->get($this->table)->result();
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
	$this->db->or_like('tanggal_jatuh_tempo', $q);
	$this->db->or_like('semester', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('kode_kelas', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    $this->db->or_like('kode_pembayaran', $q);
    $this->db->or_like('tanggal_jatuh_tempo', $q);
	$this->db->or_like('semester', $q);
	$this->db->or_like('bulan', $q);
	$this->db->or_like('kode_kelas', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('status', $q);
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

/* End of file Pembayaran_spp_model.php */
/* Location: ./application/models/Pembayaran_spp_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-04 15:55:34 */
/* http://harviacode.com */