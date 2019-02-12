<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('Main_Model');
    }

    public function index(){
        $this->load->view('login_view');
    }
    // signup 
    public function signup(){
        $this->load->view('signup');
    }

    //process signup form
    public function sprocess(){
        $name = $user = $this->input->post('name');
        $email = $user = $this->input->post('email');
        $location = $user = $this->input->post('location');
        $orgName = $user = $this->input->post('orgName');
        $country = $user = $this->input->post('country');
        $phone = $user = $this->input->post('phone');
        $password = $user = $this->input->post('password');
        $cpassword = $user = $this->input->post('confirm_password');
        $type = $user = $this->input->post('type');   
        $this->Main_Model->register($name, $country, $location,$phone,$orgName,$type, $email, $password);
        $this->load->view('login_view');
    }

    //process login 
    public function process(){
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        if($user=="Evans" && $pass =='9570'){
            $this->session->set_userdata(array('user'=>$user));
            $this->load->view('template/header.php');
            $this->load->view('welcome_view');
            $this->load->view('template/footer.php');
        }else{
            $data['error'] = 'Your Account is invalid';
            $this->load->view('login_view', $data);
        }
    } 
// dashboard 
    public function welcome(){
        $this->load->view('template/header.php');
        $this->load->view('welcome_view');
        $this->load->view('template/footer.php');
    }

    // process logout
    public function logout(){
        $this->session->unset_userdata('user');
        redirect('Login');
    }

    //process category add new 
    public function category(){
        $result['data'] = $this->Main_Model->displayCategories();
        $this->load->view('template/header.php');
        $this->load->view('category', $result);
        $this->load->view('template/footer.php');
    }

    public function editCategory(){
       
        $catName = $this->input->post('name');
        $desc  = $this->input->post('desc');

        $this->Main_Model->addcategory();
    }

    public function deleteCategory(){

    }

    public function displayCategory(){

    }


    // Process contacts
    public function contacts(){

       $result['data'] = $this->Main_Model->displayContacts();
       $result['data1'] = $this->Main_Model->displayCategories();
        $this->load->view('template/header.php');
        $this->load->view('contacts', $result);
        $this->load->view('template/footer.php');
    }

    public function editContacts(){
        
    }

    public function deleteContacts(){
        $id = $this->input->get('id');
        $this->Main_Model->deleteContacts();
        redirect('Login/contacts');
    }

    // messages 

    public function message(){
        $result['cont'] = $this->Main_Model->displayContacts();
        $result['cate'] = $this->Main_Model->displayCategories();
        $result['data'] = $this->Main_Model->displayMessages();
        $this->load->view('template/header.php');
        $this->load->view('message', $result);
        $this->load->view('template/footer.php');
    }
}

?>