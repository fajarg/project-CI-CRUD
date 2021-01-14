<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Siswa;



class Siswa extends Controller
{

    public function __construct()
    {
        $this->model = new M_Siswa();
        $this->session = service('session');
        $this->auth = service('authentication');
        $this->pager = \Config\Services::pager();
    }

    public function index()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        $currentPage = $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') : 1;

        $data = [
            'judul' => 'Students',
            // 'siswa' => $this->model->getAllData()

            'siswa' => $this->model->paginate('4', 'siswa'),
            'pager' => $this->model->pager,
            'currentPage' => $currentPage,
        ];
        echo view('template/v_header', $data);
        echo view('template/v_sidebar');
        echo view('template/v_topbar');
        echo view('Siswa/index');
        echo view('template/v_footer');
    }

    public function tambah()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }
        $data = [
            'name' => $this->request->getPost('nama'),
            'school' => $this->request->getPost('school'),
            'grade' => $this->request->getPost('grade'),
            'department' => $this->request->getPost('department'),
            'phone_number' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email')
        ];

        // insert
        $success = $this->model->tambah($data);
        if ($success) {
            session()->setFlashData('message', 'add');
            return redirect()->to(base_url('siswa'));
        }
    }

    public function hapus($id)
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }
        $success = $this->model->hapus($id);
        if ($success) {
            session()->setFlashData('message', 'deleted');
            return redirect()->to(base_url('siswa'));
        }
    }

    public function ubah()
    {
        if (!$this->auth->check()) {
            $redirectURL = session('redirect_url') ?? site_url('/');
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }
        $id = $this->request->getPost('id');

        $data = [
            'name' => $this->request->getPost('nama'),
            'school' => $this->request->getPost('school'),
            'grade' => $this->request->getPost('grade'),
            'department' => $this->request->getPost('department'),
            'phone_number' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email')
        ];

        // update
        $success = $this->model->ubah($data, $id);
        if ($success) {
            session()->setFlashData('message', 'edited');
            return redirect()->to(base_url('/siswa'));
        }
    }

    public function excel()
    {
        $data = [
            'siswa' => $this->model->getAllData()
        ];

        echo view('siswa/excel', $data);
    }
}
