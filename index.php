<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<!-- menu -->
	<div class="menu mt-5 ml-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<a id="all" class="btn btn-sm btn-primary" href="">All Students</a>
					<a id="add_student" class="btn btn-sm btn-primary" href="">Add New Student</a>
				</div>
			</div>
		</div>
	</div>

	<div class="app">
		
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>

	// added create page by ajax request
	$("#add_student").click(function(){
		$.ajax({
			url:"create.php",
			success:function(data){
				$(".app").html(data);
			}
		});
		return false;
	});

   // added profile page by ajax request

	$(document).on("click","#profile",function(e){
		e.preventDefault();

		let id = $(this).attr("profile_id");
		
		$.ajax({
			url:"profile.php",
			method:"POST",
			data:{
				id:id,
			},
			success:function(data){
				$(".app").html(data);
			}
		});
		
	});

   //back
	$(document).on("click","#back",function(e){
		e.preventDefault();

		$.ajax({
			url:"all.php",
			success:function(data){
				$(".app").html(data);
				allData();
			}
		});
		
	});

	// added all page by ajax with click request
	$("#all").click(function(){

		$.ajax({
			url:"all.php",
			success:function(data){
				$(".app").html(data);
				allData();
			}
		});
		return false;
	});

	// added all page by ajax without click request
	$.ajax({
			url:"all.php",
			success:function(data){
				$(".app").html(data);
			}
		});

	// form submit

	$(document).on("submit","#student_form",function(){

		$.ajax({
			url: "ajax_template/create.php",
			method: "POST",
			data: new FormData(this),
			contentType:false,
			processData:false,
			success: function(data){
				swal({
					title:"Successfully",
					text:"Your Data Send Send to Database",
					icon:"success"
				});

				$("#student_form")[0].reset();
			}
		});
		return false;
	});

	// all data show

	allData();
	function allData(){
		$.ajax({
		url:"ajax_template/all_student.php",
		success:function(data){
			$("#all_student_data").html(data);
		}
	});
	}

	// delete

	$(document).on("click",".delete_btn",function(){
		
		
		let id = $(this).attr("delete_id");

		swal({
			title:"Are You Sure",
			text:"Delete Student Data",
			icon:"warning",
			dangerMode:true,
			buttons:true,
		}).then((conf) => {
			if(conf==true){
				$.ajax({
					url:"ajax_template/delete.php",
					method:"POST",
					data:{
						id:id
					},
					success:function(data){
						swal({
							title:"Done",
							text:"Your Data Successfully Deleted",
							icon:"success"
						});
						allData();
					}
				});
			}else{
				swal({
						title:"Safe",
						text:"Your Data Safe Now",
						icon:"success"
						});
			}
		});

		return false;
	});

	</script>
</body>
</html>