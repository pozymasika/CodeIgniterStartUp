<div id="content">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <h4><?php echo $this->session->userdata('username'); ?></h4>

        <div class="col-sm-6">
</div>
<div class="col-sm-6">
<div class="table-title">
<button type="submit" class="btn btn-success" value=""><a href="#individual" class="btn btn-success" data-toggle="modal">Individual </a></button>
<button type="submit" class="btn btn-danger"><a href="#group" class="btn btn-danger" data-toggle="modal">Group </a></button>
</div>
</div>
        </div>
    </div>
</nav>
<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>Message Text</th>
				<th>Date Sent</th>  
				<th>Resend</th>
				<th>View Message Details</th>
			</tr>
		</thead>
<?php
foreach($data as $row) {
?>
<tr>   
	<td><?php echo $row->MsgText ?></td>
	<td><?php echo $row->MsgCreateTime ?></td>
	<td><button type="button" class="btn btn-warning"><a href="includes\message\resendSMS.php?id=<?php echo $row->MsgID; ?> "><i class="far fa-share-square"></i>Resend</a></button></td>
	<td><button type="button" class="btn btn-danger"><a href="includes\category\deleteCategory.php?id=<?php echo $row->MsgID; ?>">View Details</a></button></td>
</tr>
			<?php
}
?>
		</tbody>
</table>


</div>
</div>
<div class="modal" id="individual">
<div class="modal-dialog">
<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Send to Groups</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">

<?php echo form_open('Login/sendSMS') ?>			<div class="form-group"><label for="type">Type:</label>
			<select name="contact[]" class="selectpicker" data-live-search="true" multiple required >
			<?php

foreach ($cont as $category) {

?>
			<option value="<?php echo $category->CountryCode . $category->ContPhone ?> "><?php echo $category->ContPhone;
echo $category->ContName ?></option>
			<?php
}
?>
			</select>
			</div>
			<div class="form-group">
			<label for="Message">Message:</label> <textarea name="ujumbe" id="msg" cols="20" rows="5" class="form-control" required>
			</textarea>
			</div>
			<button type="submit" class="btn btn-sm btn-primary" name="tuma"> Send </button>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
</div>

<div class="modal" id="group">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Send To individuals </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <?php echo form_open('Login/sendSMS') ?>

                            <div class="form-group">
                            <select name="cat_id[]" id="" class="selectpicker" multiple >
                    <?php  
                foreach ($cate as $category) {
                    ?>
                                <option value="<?php echo $category->CatID; ?>"><?php echo $category->Name; ?></option>
<?php
}?>
                            </select>
                            </div>
                            <div class="form-group">
                            <textarea name="ujumbe" id="" cols="30" rows="10" class="form-control">
                            </textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
        </div>
   

