<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load helpers
        $this->load->helpers('form');
        //load form validationn library
        $this->load->library('form_validation');
        // load model
        $this->load->model('Main_Model');

    }

    public function index()
    {
        $this->load->view('login_view');
    }
    // signup

    public function signup()
    {
        $this->load->view('signup');
    }

    //process signup form
    public function sprocess()
    {
        // if($this->input->post('submit')){
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $country = $this->input->post('country');
            $location = $this->input->post('location');
            $type = $this->input->post('type');
            $phone = $this->input->post('orgPhone');
            $orgName = $this->input->post('orgName');
            $validation = $this->Main_Model->validateReg($email);
           
            if($validation){
                $this->Main_Model->register($name, $username, $country, $location, $phone, $orgName, $type, $email, $password);
                $this->session->set_flashdata('success_msg', 'Registration Successfull Login to your account');
                redirect('login/index');
            }else{
                $this->session->set_flashdata("error_msg", "Email already taken");
                redirect('login/signup');
            }
            
}

    //process login
    public function process()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
// check if username and password checkoff
        $lvalidation = $this->Main_Model->login($email, $password);

        if ($lvalidation) {
            $result['data']  = $this->Main_Model->totalcategories();
            $result['data1'] = $this->Main_Model->totalContacts();
            $result['data2'] = $this->Main_Model->totalSentSMS();
            // $this->session->set_userdata(array('user' => $user));
            $this->load->view('welcome_view', $result);
            $this->load->view('template/footer.php');
        } else {
            $this->session->set_flashdata("error_msg", "Email or Password is incorrect");
            $this->load->view('login_view');
        }
    }

// dashboard
    public function welcome()
    {
        $this->load->view('template/header.php');
        $this->load->view('welcome_view');
        $this->load->view('template/footer.php');
    }

//     // process logout
//     public function logout()
//     {
//         $this->session->unset_userdata('user');
//         redirect('Login');
//     }

//     //process category add new
    public function addCategory(){
        $name= $this->input->post('catName');
        $desc = $this->input->post('catDesc');
        $catOrgId = 2;
        $validation =$this->Main_Model->validateCatname($name);

        if($validation)
        {
            $this->Main_Model->addCategory($catOrgId, $name, $desc);
            $this->session->set_flashdata('success_msg', 'Category added successfully');
            redirect('Login/contacts');
        }else{
           
            $this->session->set_flashdata('error_msg', 'Category Name Already exist');
            redirect('Login/category');
        }
    }
    public function category()
    {
        $result['data'] = $this->Main_Model->displayCategories();
        $this->load->view('template/header.php');
        $this->load->view('category', $result);
        $this->load->view('template/footer.php');
    }

    public function editCategory()
    {
        $name = $this->input->post('name');
        $desc    = $this->input->post('desc');
        $catOrgId =1;
        $validation = $this->Main_Model->validateCatname($name);
        if($validation)
        {
            $this->Main_Model->updateCategory($catOrgId, $name, $catDesc);
            $this->session->set_flashdata('success_msg', 'Category Successfully edited');
            redirect('Login/category');
        }else{
            $this->session->set_flashdata('error_msg', 'Category Name Already exist');
            redirect('Login/category');
        }
    }

    public function deleteCategory()
    {
        $id = $this->input->get('id');
        if ($this->Main_Model->deleteContacts($id)) {
            $this->session->set_flashdata('success_msg', 'Category successfully deleted');
            redirect('Login/category');
        } else {
            $this->session->set_flashdata('error', 'Error deleting category');
            redirect('Login/category');
        }
    }
    

    // Process contacts
    public function contacts()
    {
        $result['data']  = $this->Main_Model->displayContacts();
        $result['data1'] = $this->Main_Model->displayCategories();
        $this->load->view('template/header.php');
        $this->load->view('contacts', $result);
        $this->load->view('template/footer.php');
    }

    public function addContact()
    {
        $contCatId =1;
        $contCreator =1;
        $contName = $this->input->post('contName');
        $country = $this->input->post('country');
        $contEmail= $this->input->post('contmail');
        $contPhone =$this->input->post('phone');
        $validation = $this->Main_Model->validateCont($contPhone);
        if($validation)
        {
            $this->Main_Model->addcontacts($contCatId, $country, $contPhone, $contName, $contCreator, $contEmail);
            $this->session->set_flashdata('success_msg', 'Contact was successfully created');
            redirect('Login/contacts');
        }else{
            $this->session->set_flashdata('error_msg', "Contact already exists");
            redirect('Login/contacts');
        }
    }

    public function editContacts()
    {
        $contName = $this->input->post('');
        $phone= $this->input->post('');
        $contPhone = $this->input->post('');
        $contEmail = $this->input->post('');
        $validation = $this->Main_Model->validateCont($contPhone);
        if($validation)
        {
            $this->Main_Model->updateContacts($country, $contPhone, $contName, $contEmail);
            $this->session->set_flashdata('success_msg', 'Contact successfully updated');
            redirect('Login/contacts');
        }else{
            $this->session->set_flashdata('error', 'Error updating content phone number already exist');
            redirect('Login/editcontacts.php');
        }
    }

    public function deleteContacts()
    {
        $id = $this->input->get('id');
        if($this->Main_Model->deleteContacts($id)){
            $this->session->set_flashdata('success_msg', 'Contact successfully deleted');
            redirect('Login/contacts');
        }else{
            $this->session->set_flashdata('error', 'Error deleting contact');
            redirect('Login/contacts');
        }
    }

    // messages
    // public function message()
    // {
    //     $result['cont'] = $this->Main_Model->displayContacts();
    //     $result['cate'] = $this->Main_Model->displayCategories();
    //     $result['data'] = $this->Main_Model->displayMessages();
    //     $this->load->view('template/header.php');
    //     $this->load->view('message', $result);
    //     $this->load->view('template/footer.php');
    // }

    // public function resendMsg()
    // {

    // }

    // public function displMsgDetails()
    // {

    // }
}