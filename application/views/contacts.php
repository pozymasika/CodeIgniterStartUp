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
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                                <div class="table-title">
                                    <button type="submit" class="btn btn-success" value=""><a href="#myModal" class="btn btn-success" data-toggle="modal">Add new Contact </a></button>
                                </div>
                        </div>
                </div>
            </div>
            </nav>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Country Code</th>
            <th>Phone</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
     </thead>  
     <tbody>    
<?php 
foreach($data as $row){
?>
    <tr>
			<td><?php echo $row->ContName; ?></td>
			<td><?php echo $row->ContEmail; ?></td>
			<td><?php echo $row->CountryCode; ?></td>
			<td><?php echo $row->ContPhone; ?></td>
            <td><button type="button" class="btn btn-warning"><a href="includes\contacts\editContact.php?id=<?php echo $row->ContID ?>"><i class="fas fa-edit"></i></a></button></td>
            <td><button type="button" class="btn btn-danger"><a href="deleteContacts?id=<?php echo $row->ContID ?>"><i class="fas fa-trash-alt"></i></a></button></td>
    </tr>
<?php }?>

    </tbody>
</table>
        </div>

	</div> 
    <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">New Contact</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
     
    <form action="" method="post">
            <div class="form-group">
            <label for="category">Select Category: </label>
        <select name="type" id="" class="form-control">
        <?php
        foreach ($data1 as $category) {
            ?>
                <option value="<?php echo $category->CatID ?> "><?php echo $category->Name ?></option>
    <?php }
            ?>

        </select>
    </div>
    <div class="form-group">
    <label for="country">Select Country: </label>
    <select name="country" id="" class="form-control" >
   
            <option value="+254">Kenya</option>
            <option value="+252">Uganda</option>
            <option value="+255">Tanzania</option>
    </select>
    
    </div>
            <div class="form-group">
                <label for="OrgName">Contact Name:</label> <input type="text" name="contName" id="OrgName" class="form-control form-control-sm" placeholder="QQ software ltd" required>
            </div>
            <div class="form-group">
                <label for="Phone">Phone:</label>  <input type="text" name="phone" id="contPhone" class="form-control form-control-sm" placeholder="0727143163" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label> <input type="email" name="contmail" id="mail" placeholder="example@gmail.com" class="form-control form-control-sm" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<!-- Edit Modal HTML -->
	<div id="editContactModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Contact</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
					<div class="form-group">
						<label for="category">Select Category</label>
						<select name="type" id="" class="form-control">
							<option value="254">Kenya</option>
							<option value="255">Tanzania</option>
							<option value="253">Uganda</option>
							<option value="260">Rwanda</option>
						</select>
						</div>
						<div class="form-group">
							<label for="country">Select Country</label>
						<select name="type" id="" class="form-control">
							<option value="254">Kenya</option>
							<option value="255">Tanzania</option>
							<option value="253">Uganda</option>
							<option value="260">Rwanda</option>
						</select>
						</div>					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-php- Delete Modal HTML -->
	<div id="deleteContactModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Contact</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
