     <?php 
foreach($data as $row ){
    $name =$row->ContName;
    $mail =$row->ContEmail;
    $phone =$row->ContPhone;
    $id = $row->ContID;
}

?>
     <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <h4><?php echo $this->session->userdata('username'); ?></h4>

                    </div>
                </div>
            </nav>

<div class="signin-form">
<?php echo form_open('Login/editContacts'); ?>
    <div class="form-group">
    <label for="country">Select Country: </label>
    <select name="country" id="" class="selectpicker" >
            <option value="+254">Kenya</option>
            <option value="+252">Uganda</option>
            <option value="+255">Tanzania</option>
    </select>
    </div>
            <div class="form-group">
                <label for="OrgName">Contact Name:</label> <input type="text" name="contName" id="OrgName" class="form-control form-control-sm" value="<?php echo $name;?>">
            </div>
            <div class="form-group">
                <label for="Phone">Phone:</label>  <input type="text" name="phone" id="contPhone" class="form-control form-control-sm" value="<?php echo $phone;?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label> 
                <input type="email" name="contmail" id="mail" value="<?php echo $mail;?>" class="form-control form-control-sm" >
            </div>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form> 
        </div>
    </div>