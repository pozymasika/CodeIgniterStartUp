<?php
class Main_Model extends CI_Model 
{

    public function register($name, $country,$type, $email, $password){
        $query = "INSERT INTO users (accountId, Name, Email, Password) VALUES('12', '$name','$email', '$password')";
        $this->db->query($query);
    }

    public function displayContacts(){
        $query= $this->db->query("SELECT * FROM `contacts`");
        return $query->result();
    }

    
    public function displayCategories(){
        $query= $this->db->query("SELECT * FROM `categories`");
        return $query->result();
    }

    public function displayMessages(){
        $query= $this->db->query("SELECT * FROM `messages`");
        return $query->result();
    }
    public function deleteContacts($id){
        $this->db->query("delete  from contacts where ContID='".$id."'");
    }
}
?>