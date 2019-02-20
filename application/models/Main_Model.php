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
        $data = array(
            'UserName' => $username,
            'Name' => $name,
            'Email' => $email,
            'Password' => $password
        );
      if($this->db->insert('accounts', $accounts)){
           $data['accountId'] = $last_insert_id;
            $this->db->insert('users', $data);
            return $last_insert_id;
      }
    } //end register

    public function validateReg($email)
    {
        $this->db->where('Email', $email);
        $query = $this->db->get(['users']);
        if($query->num_rows()>0)
        {
            return false;
        }else{
            return true;
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
            return $query->result();
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
        $this->db->where('userid', $id);
        $query = $this->db->get('users');
        return $query->result();
    }
    /** 
     * User registration and details
     *
     * @return updateProfile
     **/
    public function updateProfile($id, $name, $username)
    {
        $data = array(
            "Name" => $name,
            "UserName" => $username,
        );
        $this->db->where('userid', $id);
       if($this->db->update('users', $data)){
           return true;
       }else{
           return false;
       }
    }


    /**
     * User registration and details
     *
     * @return updatePassword
     **/
    public function updatePassword($id, $oldpassword, $newpassword)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('userId', $id);
        $query = $this->db->get();
        $data =$query->result();

        foreach($data as $row){
            $dbpass = $row->Password;
        }

        if($oldpassword == $dbpass){
            $this->db->set('Password', $newpassword);
            $this->db->update('users');
            return true;
        }else{
            return false;
        }

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

    public function details($userid){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('accounts', 'accounts.id = users.accountId');
        $this->db->where('userId', $userid);
        $query = $this->db->get();
        return $query->result();
    }

public function validateCatname($name, $catOrgId){
    $this->db->where('Name', $name);
    $this->db->where('CatOrgId', $catOrgId);
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

    public function validateCont($contPhone, $contCreator){
        $this->db->where('ContPhone', $contPhone);
        $this->db->where('ContCreator',$contCreator);
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
            'ContCatID' =>$contCatId,
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
    public function displayContacts($userid)
    {
        // display all contacts here 
        $this->db->select('*');
        $this->db->from('contacts');
        $this->db->where('ContCreator',$userid);
        $query = $this->db->get();
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
    public function displayCategories($catOrgId)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('CatOrgId', $catOrgId);
        $query = $this->db->get();
        return $query->result();
    }

     public function displContbyCat ($catOrgId)
    {
        $this->db->select('*');
        $this->db->from('contacts');
        $this->db->join('categories', 'categories.CatID = contacts.ContCatID');
        $this->db->where('catOrgId', $catOrgId);
        $query = $this->db->get();
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

    public function saveMessages()
    {
        $created = now();
        $data = array(
'MsgText'=>$ujumbe,
'MsgCreateTime'=>$created,
'MsgSender'=>$userid
        );
        $data1 = array(
'Recipients'=>$recipients
);
        $this->db->insert('messages');

        if($this->db->insert('messages'))
        {
            $last_insert_id = $this->db->insertid();
            $data1['MsgID'] = $last_insert_id;
            $this->db->insert('msgdata', $data1);
        }else{
            return;
        }
       
    }
}
