<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helpers('form');
        $this->load->library('form_validation');
        $this->load->model('Main_Model');
        $this->load->library('SendSMS');
    }

    public function index()
    {
        $this->load->view('login_view');
    }

    public function signup()
    {
        $this->load->view('signup');
    }

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
                if($this->Main_Model->register($name, $username, $country, $location, $phone, $orgName, $type, $email, $password) )
                {
                $this->session->set_flashdata('success_msg', 'Registration Successfull Login to your account');
                redirect('login/index');
                }else{
                $this->session->set_flashdata("error_msg", "Transaction not complete");
                redirect('login/signup');
                }
            }else{
                $this->session->set_flashdata("error_msg", "Email already taken");
                redirect('login/signup');
            }
}

    public function process()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $lvalidation = $this->Main_Model->login($email, $password);
        if ($lvalidation) {
            $data = $this->Main_Model->login($email, $password);
            foreach($data as $row){
                $userid = $row->userId;
                $accountId = $row->accountId;
            }
            $result['data']  = $this->Main_Model->totalcategories();
            $result['data1'] = $this->Main_Model->totalContacts();
            $result['data2'] = $this->Main_Model->totalSentSMS();
            $this->session->set_userdata('username', $email);
            $this->session->set_userdata('accountId', $accountId);
            $this->session->set_userdata('userid', $userid);
            $this->session->set_userdata('logged_in', true);
            $this->load->view('welcome_view', $result);
            $this->load->view('template/footer.php');
        } else {
            $this->session->set_flashdata("error_msg", "Email or Password is incorrect");
            $this->load->view('login_view');
        }
    }

    public function check_auth($page){
        if(!$this->session->userdata('logged_in')){
            redirect('Login/index');
        }
    }
// dashboard
    public function welcome()
    {
        $result['data'] = $this->Main_Model->totalcategories();
        $result['data1'] = $this->Main_Model->totalContacts();
        $result['data2'] = $this->Main_Model->totalSentSMS();
        $this->check_auth('welcome');
        $this->load->view('welcome_view', $result);
        $this->load->view('template/footer.php');
    }

    // process logout
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        redirect('Login/index');
    }

    // function edit profile 
    public function profile()
    {
        $this->check_auth('profile');
        $id = $this->session->userdata('userid');
        $result['data']= $this->Main_Model->readProfile($id);
        $this->load->view('template/header.php');
        $this->load->view('profile', $result);
        $this->load->view('template/footer.php');
    }
public function updateprof()
{
     $this->check_auth('updateprof');
        $id = $this->session->userdata('userid');
        $name = $this->input->post('name');
        $username = $this->input->post('username');

        if ($this->Main_Model->updateProfile($id, $name, $username))
         {
            $this->session->set_flashdata('success_msg', 'Account info Successfully updated');
            redirect('login/welcome');
        } else {
            $this->session->set_flashdata("error_msg", "Could not update");
            redirect('login/profile');
        }
}
    public function password()
    {
        $this->check_auth('password');
        $id = $this->session->userdata('userid');
        $this->load->view('template/header.php');
        $this->load->view('password');
        $this->load->view('template/footer.php');
    }
    public function updatePass()
    {
        $this->check_auth('updatePass');
        $id = $this->session->userdata('userid');
        $oldpassword = $this->input->post('oldpassword');
        $newpassword = $this->input->post('newpassword');
        if($this->Main_Model->updatePassword($id , $oldpassword, $newpassword))
        {
        $this->session->set_flashdata('success_msg', 'Password Updated  successfully deleted');
        redirect('Login/index');
        } else {
        $this->session->set_flashdata('error_msg', 'Error Updating password');
        redirect('Login/password');
    }
}
    //process category add new
    public function addCategory(){
        $this->check_auth('addCategory');
        $catOrgId = $this->session->userdata('accountId');
        $name= $this->input->post('catName');
        $desc = $this->input->post('catDesc');
        $catOrgId = $this->session->userdata('accountId');
        $validation =$this->Main_Model->validateCatname($name, $catOrgId);
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
        
        $this->check_auth('category');
        $catOrgId = $this->session->userdata('accountId');
        $result['data'] = $this->Main_Model->displayCategories($catOrgId);
        $this->load->view('template/header.php');
        $this->load->view('category', $result);
        $this->load->view('template/footer.php');
    }
    public function editcat(){
        $this->check_auth('editcat');
      $id =   $this->input->get('id');
        $result['data'] = $this->Main_Model->readCategory($id);
        $this->load->view('template/header.php');
        $this->load->view('editCategory',$result);
        $this->load->view('template/footer.php');
    }
    public function editCategory()
    {
        $this->check_auth('editCategory');
        $catOrgId = $this->session->userdata('accountId');
        $catid = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');
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
        $this->check_auth('deleteCategory');
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
        $this->check_auth('contacts');
        $userid =$this->session->userdata('userid');
        $catOrgId = $this->session->userdata('accountId');
        $result['data']  = $this->Main_Model->displayContacts($userid);
        $result['data1'] = $this->Main_Model->displayCategories($catOrgId);
        $this->load->view('template/header.php');
        $this->load->view('contacts', $result);
        $this->load->view('template/footer.php');
    }

    public function addContact()
    {
        $this->check_auth('addContact');
        $contCreator = $this->session->userdata('userid');
        $catOrgId = $this->session->userdata('accountId');

        $contName = $this->input->post('contName');
        $country = $this->input->post('country');
        $contEmail= $this->input->post('contmail');
        $contPhone =$this->input->post('phone');
        $contCatId = $this->input->post('type');
        $validation = $this->Main_Model->validateCont($contPhone, $contCreator);
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
        $this->check_auth('editcontact');
       $id =  $this->input->get('id');
            $result['data'] = $this->Main_Model->readContact($id);
            $this->load->view('template/header.php');
            $this->load->view('editContact', $result);
            $this->load->view('template/footer.php');
    }
    public function editContacts()
    {
        $this->check_auth('editContacts');
        $contCreator = $this->session->userdata('userid', $userid);
        $id = $this->input->post('id');
        $country = $this->input->post('country');
        $contName = $this->input->post('contName');
        $contPhone= $this->input->post('phone');
        $contEmail = $this->input->post('contmail');
        $validation = $this->Main_Model->validateCont($phone, $contCreator);
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
        $this->check_auth('deleteContacts');
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
        $this->check_auth('message');
        $userid = $this->session->userdata('userid');
        $result['cont'] = $this->Main_Model->displayContacts($userid);
        $catOrgId = $this->session->userdata('accountId');
        $result['cate'] = $this->Main_Model->displayCategories($catOrgId);
        $result['data'] = $this->Main_Model->displayMessages();
        $this->load->view('template/header.php');
        $this->load->view('message', $result);
        $this->load->view('template/footer.php');
    }
    // public function resendMsg()
    // {

    // }

    // public function displMsgDetails()
    // {

    // }

    public function sendmessage(){
        $message  = $this->input->post('ujumbe');
        $recipients = $this->input->post('contact');
        $from ="0733248479";
        $result['data1'] = $this->sendsms->fetchMessage($recipients, $message, $from);
        if($result == TRUE){
            $this->Main_Model->saveMessages($message, $recipients);
            $this->load->view('template/header.php');
            $this->load->view('test', $result);
            $this->load->view('template/footer.php');
        }else{
            $this->Main_Model->saveMessages();
            $this->session->set_flashdata('error_msg', "Hey there was an error sending Messages");
            $this->load->view('template/header.php');
            $this->load->view('test', $result);
            $this->load->view('template/footer.php');
        }

    }
}