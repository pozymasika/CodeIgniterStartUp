<?php 

class SmsApi extends CI_Model{

    public function __construct()
    {
        $this->load->library('SendSMS');
    }
}

?>