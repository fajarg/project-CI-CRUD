<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Siswa extends Model
{
    protected $table = 'siswa';

    // public function __construct()
    // {
    //     $this->db = db_connect();
    //     $this->builder = $this->db->table($this->table);
    // }

    public function getAllData()
    {
        return $this->db->table('siswa')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('siswa')->insert($data);
    }

    public function hapus($id)
    {
        return $this->db->table('siswa')->delete(['id' => $id]);
    }

    public function ubah($data, $id)
    {
        return $this->db->table('siswa')->update($data, ['id' => $id]);
    }
}
