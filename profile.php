<?php

$id = $_POST["id"];

$connection = new mysqli("localhost","root","","ajax129");

$sql = "SELECT * FROM students WHERE id = '$id'";

$data = $connection->query($sql);

$profile_data = $data->fetch_object();



?>
	<div class="wrap shadow">
	    <div class="card">
	        <div class="card-body">
	            <h2>User Profile : <?php echo $profile_data->name;?></h2>
	            <img style="width: 300px; height: 300px; border-radius:50%;margin:0 auto;display:block"
	                src="photos/<?php echo $profile_data->photo;?>" alt="">
	            <h1 style="text-align: center"><?php echo $profile_data->name;?></h1>
	        </div>
	    </div>

		<table class="table table-striped">
			<tr>
				<td>Name</td>
				<td><?php echo $profile_data->name;?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $profile_data->email;?></td>
			</tr>
			<tr>
				<td>Cell</td>
				<td><?php echo $profile_data->cell;?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $profile_data->username;?></td>
			</tr>
		</table>
		<a id="back" class="btn btn-sm btn-primary" href="">Back</a>
	</div>
	
