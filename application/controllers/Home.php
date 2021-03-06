<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sepatu_model', 'sepatu');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['judul'] = 'Halaman Home';
        $data['css'] = 'home-sepatu.css';
        $data['js'] = 'home sepatu.js';
        $data['isLogin'] = is_logged_in();

        $this->db->select('type');
        $tipe = $this->db->get('type_sepatu')->result_array();
        for ($i = 0; $i < count($tipe); $i++) {
            $tipe[$i] = $tipe[$i]['type'];
        }

        for ($i = 0; $i < count($tipe); $i++) {
            $data['data_sepatu'][$tipe[$i]] = $this->sepatu->getDataShoesByType($tipe[$i]);
        }
        $data['type'] = $tipe;
        $data['test'] = $this->sepatu->getDataShoesByType('ivan');

        $this->load->view('templates/sepatu_header', $data);
        $this->load->view('sepatu/home', $data);
        $this->load->view('templates/sepatu_footer', $data);
    }

    public function detailSepatu($id = null)
    {
        $data['isLogin'] = is_logged_in();

        if ($id == null) {
            redirect('home');
        } else {
            $data['title'] = 'Halaman Detail Sepatu';
            $data['css'] = 'detail-sepatu.css';
            $data['js'] = 'detail sepatu.js';

            $data['shoes'] = $this->sepatu->getDataShoesById($id);
            $data['shoes']['price'] = formatHarga($data['shoes']['price']);

            $shoes_name = $data['shoes']['shoes_name'];
            $data['related'] = $this->sepatu->getRelatedSepatu($shoes_name);

            $this->load->view('templates/sepatu_header', $data);
            $this->load->view('sepatu/detail', $data);
            $this->load->view('templates/sepatu_footer', $data);
        }
    }
}
