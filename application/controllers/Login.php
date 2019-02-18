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

    // process logout
    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('Login');
    }

    // function edit profile 
    public function profile()
    {
        $this->load->view('template/header.php');
        $this->load->view('profile');
        $this->load->view('template/footer.php');
    }
public function updateprof()
{
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $validation = $this->Main_Model->validateReg($email);
        if ($validation) {
            $this->Main_Model->updateProfile($name, $username, $email);
            $this->session->set_flashdata('success_msg', 'Account info Successfully updated');
            redirect('login/profile');
        } else {
            $this->session->set_flashdata("error_msg", "Email already taken");
            redirect('login/profile');
        }
}
    public function password()
    {
        $this->load->view('template/header.php');
        $this->load->view('password');
        $this->load->view('template/footer.php');
    }
    public function updatePass()
    {
        $id = $this->input->post('id');
        $oldpassword = $this->input->post('oldpassword');
        $newpassword = $this->input->post('newpassword');
       
        if($this->Main_Model->updatePassword($oldpassword, $newPassword))
        {
        $this->session->set_flashdata('success_msg', 'Password Updated  successfully deleted');
        redirect('Login/password');
        } else {
        $this->session->set_flashdata('error_msg', 'Error Updating password');
        redirect('Login/password');
    }
}
    //process category add new
    public function addCategory(){
        $name= $this->input->post('catName');
        $desc = $this->input->post('catDesc');
        $catOrgId = 2;
        $validation =$this->Main_Model->validateCatname($name);

        if($validation)
        {
            $this->Main_Model->addCategory($catOrgId, $name, $desc);
            $this->session->set_flashdata('success_msg', 'Category added successfully');
            redirect('Login/category');
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
    public function editcat(){
      $id =   $this->input->get('id');
        $result['data'] = $this->Main_Model->readCategory($id);
        $this->load->view('template/header.php');
        $this->load->view('editCategory',$result);
        $this->load->view('template/footer.php');
    }
    public function editCategory()
    {
        $catid = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');
        $catOrgId = 29;
        $validation = $this->Main_Model->validateCatname($name);
        
        if ($validation) {
            if($this->Main_Model->updateCategory($catid, $name, $desc))
            {
                $this->session->set_flashdata('success_msg', 'Category Successfully edited');
                redirect('Login/category');
            }else{
                $this->session->set_flashdata('error_msg', 'Something went wrong ');
                redirect('Login/category');
            }
        } else {
                $this->session->set_flashdata('error_msg', 'Category Name Already exist');
            redirect('Login/category');
        }
    }

    public function deleteCategory($id)
    {
        $id = $this->input->get('id');

        if ($this->Main_Model->deleteCategory($id)) {
            $this->session->set_flashdata('success_msg', 'Category successfully deleted');
            redirect('Login/category');
        } else {
            $this->session->set_flashdata('error_msg', 'Error deleting category');
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
    public function editcontact()
    {
       $id =  $this->input->get('id');
            $result['data'] = $this->Main_Model->readContact($id);
            $this->load->view('template/header.php');
            $this->load->view('editContact', $result);
            $this->load->view('template/footer.php');
    }
    public function editContacts()
    {
        $id = $this->input->post('id');
        $country = $this->input->post('country');
        $contName = $this->input->post('contName');
        $contPhone= $this->input->post('phone');
        $contEmail = $this->input->post('contmail');
        $validation = $this->Main_Model->validateCont($phone);
        if($validation)
        {
        
           if($this->Main_Model->updateContacts($id, $country, $contPhone, $contName, $contEmail)) {
                $this->session->set_flashdata('success_msg', 'Contact successfully updated');
                redirect('Login/contacts');
           }else{
                $this->session->set_flashdata('error_msg', 'Contact was not updated');
                redirect('Login/contacts');
           }
        }else{
            $this->session->set_flashdata('error_msg', 'Error updating content phone number already exist');
            redirect('Login/editContacts');
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
    public function message()
    {
        $result['cont'] = $this->Main_Model->displayContacts();
        $result['cate'] = $this->Main_Model->displayCategories();
        $result['data'] = $this->Main_Model->displayMessages();
        $this->load->view('template/header.php');
        $this->load->view('message', $result);
        $this->load->view('template/footer.php');
    }
public function sendSMS(){
    $ujumbe = $this->input->post('ujumbe');
    $contact = $this->input->post('contact');
$result['data'] = $ujumbe;
$result['data1'] =$contact;
        $this->load->view('template/header.php');
        $this->load->view('message_view', $result);
        $this->load->view('template/footer.php');
}
    // public function resendMsg()
    // {

    // }

    // public function displMsgDetails()
    // {

    // }
}