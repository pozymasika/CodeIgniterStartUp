<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . 'third_party/vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;
class SendSMS extends AfricasTalking
{
    var $username;
    var $apiKey;
    private $AT;
    private  $sms;
    var $application;
    public $recipients;
    public $message;
    public $from;
    
    public function __construct(){
        $this->username = "Quadrant";
        $this->apiKey = "987110bf90a5b5167b235b821d62d5c5e45fa6a25f3de13f973dc53eaf9ac32d";
        $this->AT = new AfricasTalking($this->username, $this->apiKey);
        $this->application = $this->AT->application();
        $this->sms = $this->AT->sms();
    }

    public function getBalance()
    {  
        try {
            $data = $this->application->fetchApplicationData();
          return  $data;       
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function fetchMessage($recipients, $message, $from){
        // $data = array($recipients, $message, $from);
        // return $data;
        try {
            $result = $this->sms->send([
                'to' => $recipients,
                'message' => $message,
                'from' => $from
            ]);
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>