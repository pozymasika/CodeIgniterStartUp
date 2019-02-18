<?php

/**
 * Parses and verifies the doc comments for functions.
 *
 * @author    Evans Koech <evanskk@example.com>
 * @copyright 2015-2020 MIT licences
 * @license   MIT license group
 *
 *
 */

class Main_Model extends CI_Model
{
    /**
     * User registration and details
     *
     * @return register
     **/
    public function register($name, $username, $country, $location, $phone, $orgName, $type, $email, $password)
    {
          $accounts = array(
            'OrganisationName'=>$orgName,
                'CountryCode'=>$country,
                'phone'=>$phone,
               ' AccountLocation'=>$location,
                'AccountType'=>$type
          );
        $this->db->insert('accounts', $accounts);
        $data = array(
            'accountId' => 1,
            'UserName' => $username,
            'Name' => $name,
            'Email' => $email,
            'Password' => $password
        );
        $this->db->insert('users', $data);
    } //end register

    public function validateReg($email)
    {
        $options =" ";
        $this->db->where('Email', $email);
        $query = $this->db->get(['users']);
        if($query->num_rows()>0)
        {
            return true;
        }else{
            return false;
        }
    }
    /**
     * User registration and details
     *
     * @return login
     *  */
    public function login($email, $password)
    {
        $this->db->where('Email', $email);
        $this->db->where('Password', $password);;
        $query = $this->db->get('users');

        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    } //end login

    /**
     * User registration and details
     *
     * @return readprofile
     **/
    public function readProfile($id)
    {
        $this->db->where('id', $id);
        $this->db->get('users');;
    }
    /** 
     * User registration and details
     *
     * @return updateProfile
     **/
    public function updateProfile($id, $name, $username, $email)
    {
        $data = array(
            "Name" => $name,
            "UserName" => $username,
            "Email" => $email
        );
        $this->db->where('userid', $id);
        $this->update('users');
    }


    /**
     * User registration and details
     *
     * @return updatePassword
     **/
    public function updatePassword($oldpassword, $newPassword)
    {
        $this->db->set('Password', $password, false);
        $this->db->update('users');
    }

    /**
     * User registration and details
     *
     * @return deleteAccount
     **/
    public function deleteAccount($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('accounts');
    }

public function validateCatname($name){
    $this->db->where('Name', $name);
    $query = $this->db->get('categories');
    if($query->num_rows() >0)
    {
        return false;
    }else{
        return true;
    }
}

    /**
     * User registration and details
     *
     * @return addCategory
     **/
    public function addCategory($catOrgId, $name, $catDesc)
    {
        $data = array(
            'CatOrgId' => $catOrgId,
            'Name' => $name,
            'Description' => $catDesc
        );
        $this->db->insert('categories', $data);
    }

    /**
     * User registration and details
     *
     * @return readCategory
     **/
    public function readCategory($id)
    {
// display category details  
        $this->db->where('CatID', $id);
        $query = $this->db->get('categories');
       return  $query->result();
    }


    /**
     * User registration and details
     *
     * @return updateCategory
     **/
    public function updateCategory($catid, $name, $desc)
    {
        $data = array(
            'Name' => $name,
            'Description' => $desc
        );
        $this->db->where('CatID', $catid);
        $query = $this->db->update('categories', $data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    /**
     * User registration and details
     *
     * @return deleteCategory
     **/
    public function deleteCategory($id)
    {
        $this->db->where('CatID', $id);
        $this->db->delete('categories');
    }

    public function validateCont($contPhone){
        $this->db->where('ContPhone', $contPhone);
        $query = $this->db->get('contacts');
        if($query->num_rows()>0){
            return false;
        }else{
            return true;
        }
    }
    // contacts
    /**
     * User registration and details
     *
     * @return addContacts
     **/
    public function addcontacts($contCatId, $country, $contPhone, $contName, $contCreator, $contEmail)
    {
        $data = array(
            'ContCatID' => 1,
            'CountryCode' => $country,
            'ContPhone' => $contPhone,
            'ContName' => $contName,
            'ContCreator' => $contCreator,
            'ContEmail' => $contEmail
        );

        $this->db->insert('contacts', $data);
    }
    /**
     * User registration and details
     *
     * @return displayContacts
     **/
    public function displayContacts()
    {
        // display all contacts here 
        $query = $this->db->query("SELECT * FROM `contacts`");
        return $query->result();

    }
    
    public function readContact($id){
        $this->db->where('ContID', $id);
        $query = $this->db->get('contacts');
        return $query->result();
    }
    /**
     * User registration and details
     *
     * @return updateContacts
     **/
    public function updateContacts($id, $country, $contPhone, $contName, $contEmail)
    {
        $data = array(
            'CountryCode' => $country,
            'ContPhone' => $contPhone,
            'ContName' => $contName,
            'ContEmail' => $contEmail
        );
        $this->db->where('ContID', $id);
        if($this->db->update('contacts', $data))
        {
            return true;
        }else{
            return false;
        }
    }
    /**
     * User registration and details
     *
     * @return deleteContacts
     **/
    public function deleteContacts($id)
    {
        $this->db->where('ContID', $id);
        $this->db->delete('contacts');
    }
    /**
     * User registration and details
     *
     * @return displayCategories
     **/
    public function displayCategories()
    {
        $query = $this->db->query("SELECT * FROM `categories`");
        return $query->result();
    }

    // Messages
    /**
     * User registration and details
     *
     * @return addMessage
     **/
    public function addMessage($creator, $ujumbe, $contact)
    {
        $time =now();
        $data = array(
            'MsgText'=>$ujumbe,
            'MsgCreateTime'=>$time,
            'MsgSender'=>$creator
        );
        
    }
    /**
     * User registration and details
     *
     * @return resendMessage
     **/
    public function resendMessage()
    {
        // resend message if status if failed
    }
    /**
     * User registration and details
     *
     * @return displayMessage
     **/
    public function displayMessages()
    {
        $query = $this->db->query("SELECT * FROM `messages`");
        return $query->result();
    }
    /**
     * User registration and details
     *
     * @return dispMsgDetails
     **/
    public function dispMsgDetails()
    {
        // display message sent to individual or category


    }

    // Statistics
    /**
     * User registration and details
     *
     * @return totalSentSMS
     **/
    public function totalSentSMS()
    {
        // get the total messages sent by a user;
        $query = $this->db->query('SELECT * FROM messages');

        return $query->num_rows();
    }
    /**
     * User registration and details
     *
     * @return totalContacts
     **/
    public function totalContacts()
    {
        // get the total number of contacts added by a user
        $query = $this->db->query('SELECT * FROM contacts');

        return $query->num_rows();
    }
    /**
     * User registration and details
     *
     * @return totalcategories
     **/
    public function totalcategories()
    {
        // get total number of categories added by a user;
        $query = $this->db->query('SELECT * FROM categories');
        return $query->num_rows();
    }
}
