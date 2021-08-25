<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Produk_model extends CI_Model
{
	private $_table = "produk";
	public $id_produk;
	public $p_nama_produk;
	public $p_qty;
	public $p_format;
	public $p_deskripsi;
	public $p_harga;
	public $p_foto_produk = "default.jpg";
	public $p_digi_file;
	public $p_sample;

	public function rules()
    {
        return [
            ['field' => 'p_nama_produk',
            'label' => 'Nama Produk',
            'rules' => 'required'],

            ['field' => 'p_qty',
            'label' => 'Qty',
            'rules' => 'numeric'],

            ['field' => 'p_format',
            'label' => 'Format',
            'rules' => 'numeric'],

            ['field' => 'p_deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required'],

            ['field' => 'p_harga',
            'label' => 'Harga',
            'rules' => 'numeric']
        ];
    }
	
	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_produk = uniqid();
        $this->p_nama_produk = $post["p_nama_produk"];
        $this->p_qty = $post["p_qty"];
        $this->p_format = $post["p_format"];
        $this->p_harga = $post["p_harga"];
        $this->p_deskripsi = $post["p_deskripsi"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->p_nama_produk = $post["p_nama_produk"];
        $this->p_qty = $post["p_qty"];
        $this->p_format = $post["p_format"];
        $this->p_harga = $post["p_harga"];
        $this->p_deskripsi = $post["p_deskripsi"];
        return $this->db->update($this->_table, $this, array('id_produk' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }
}