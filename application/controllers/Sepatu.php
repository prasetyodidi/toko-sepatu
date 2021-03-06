<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sepatu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sepatu_model', 'sepatu');
    }
    public function index()
    {
        $data['judul'] = 'Halaman admin';
        $data['css'] = './css/header.css';
        $data['sepatu'] = $this->sepatu->getAllDataSepatu();
        $this->load->view('templates/header', $data);
        $this->load->view('sepatu/index', $data);
        $this->load->view('templates/footer');
    }
    public function landingPage()
    {
        $this->load->view('sepatu/landing page');
    }

    public function home()
    {
        $tipe = [
            'Equip',
            'Ivan',
            'Hugo'
        ];
        for ($i = 0; $i < count($tipe); $i++) {
            $data['dataSepatu'][$tipe[$i]] = $this->sepatu->getDataSepatuByType($tipe[$i]);
        }

        $data['type'] = $tipe;
        $this->load->view('sepatu/home', $data);
    }

    public function detail($id)
    {
        $data['sepatu'] = $this->sepatu->getDataSepatuById($id);
        $this->load->view('sepatu/detail', $data);
    }

    public function tambah()
    {
        $data['ukuran'] = ['36', '37', '38', '39', '40'];
        // json_encode($data['ukuran']);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/top-nav');
        $this->load->view('sepatu/tambah', $data);
    }

    public function ubah()
    {
        $data['css'] = 'ubah-sepatu.css';
        $this->load->view('templates/sepatu_header', $data);
        $this->load->view('sepatu/ubah');
    }

    public function pindahData($id)
    {
        $sepatu = $this->sepatu->getDataSepatuById($id);
        // var_dump($sepatu);

        $data['shoes_name'] = $sepatu['nama'];
        $data['sizes'] = $sepatu['ukuran'];
        $data['price'] = $sepatu['harga'];
        $data['description'] = $sepatu['deskripsi'];
        $data['specifications'] = $sepatu['spesifikasi'];
        $data['images'] = $sepatu['gambar']['image'];
        $data['thumb'] = $sepatu['gambar']['thumb'];

        // echo $data['shoes_name'] . '</br>';
        // var_dump($data['sizes']);
        // echo '</br>';
        // var_dump($data['price']);
        // echo '</br>';
        // var_dump($data['description']);
        // echo '</br>';
        // var_dump($data['specifications']);
        // echo '</br>';
        // var_dump($data['images']);
        // echo '</br>';
        // var_dump($data['thumb']);
        // echo '</br>';

        $this->sepatu->insertShoesData($data);

        redirect('');
    }
}
