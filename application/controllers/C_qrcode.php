<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class C_qrcode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('Ciqrcode');
        
    }
    public function index()
    {
       $this->load->view('tampil_qr');       
    }
}

/* End of file C_qrcode.php and path \application\controllers\C_qrcode.php */
