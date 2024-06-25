<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "pakaian";

    public $id;
    public $kode_barang;
    public $nama_barang;
    public $ukuran;
    public $deskripsi;
    public $harga;
    public $supplier;
    public $stok;
    public $foto = 'default.jpg';

    public function rules()
    {
        return [
            ['field' => 'kode_barang',
            'label' => 'Kode barang',
            'rules' => 'required'],

            ['field' => 'nama_barang',
            'label' => 'Nama barang',
            'rules' => 'required'],
            
            ['field' => 'ukuran',
            'label' => 'Ukuran',
            'rules' => 'required'],

            ['field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],

            ['field' => 'supplier',
            'label' => 'Supplier',
            'rules' => 'required'],

            ['field' => 'stok',
            'label' => 'Stok',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->kode_barang = $post["kode_barang"];
        $this->nama_barang = $post["nama_barang"];
        $this->ukuran = $post["ukuran"];
        $this->deskripsi = $post["deskripsi"];
        $this->harga = $post["harga"];
        $this->supplier = $post["supplier"];
        $this->stok = $post["stok"];

        $this->foto = '';
        $foto = $_FILES["foto"]["name"];


    
        // Konfigurasi Upload Gambar
        $config['upload_path']          = './upload';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
       
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('foto')) { 
            // Jika upload berhasil
            $gambar = $this->upload->data('file_name');
            $this->foto = $gambar; // Path gambar yang diupload
        } 

         // Insert data ke database
         $this->db->insert($this->_table, $this);
    }
    


    public function update()
    {
        $post = $this->input->post();
        $this->id = $post ["id"];
        $this->kode_barang= $post["kode_barang"];
        $this->nama_barang = $post["nama_barang"];
        $this->ukuran = $post["ukuran"];
        $this->deskripsi = $post["deskripsi"];
        $this->harga = $post["harga"];
        $this->supplier = $post["supplier"];
        $this->stok = $post["stok"];

          // Konfigurasi Upload Gambar
          $config['upload_path']          = './upload';
          $config['allowed_types']        = 'gif|jpg|jpeg|png';
         
          $this->load->library('upload', $config);

          if ($this->upload->do_upload('foto')) {
            // Jika upload berhasil
            $upload_data = $this->upload->data();
            $this->foto = $upload_data['file_name']; // Path gambar yang diupload
        } else {
            // Jika tidak ada upload, gunakan foto lama
            $this->foto = $post["old_foto"];
        }

        // Update data di database
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}