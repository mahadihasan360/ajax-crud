
<?php

$edit_id = $_POST["id"];

$connection = new mysqli("localhost","root","","ajax129");

$sql = "SELECT * FROM students WHERE id = '$edit_id'";

$data = $connection->query($sql);

$edit_data = $data->fetch_object();





?>

<div class="wrap">
        <a class="btn btn-sm btn-primary" id="back" href="#">Back</a><br><br>
		<div class="card shadow">
			<div class="card-body">
				<h2>Edit Student Data</h2>
				<form id="edit_form" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input value="<?php echo $edit_data->name;?>" name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input value="<?php echo $edit_data->email;?>" name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input value="<?php echo $edit_data->cell;?>" name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input value="<?php echo $edit_data->username;?>" name="username" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
                        <img style="display: block;width:100%;height:100%;margin-bottom:10px" src="photos/<?php echo $edit_data->photo;?>" alt="">
						<input name="photo" type="file">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Update Student">
					</div>
				</form>
                
			</div>
		</div>
	</div>