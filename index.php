<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container" id="addStudentdiv">
		<div class="row mt-5">
			<div class="col-12 text-center">
				<h1 class="display-4"> Add New Student </h1>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col align-self-center">
				<form action="addStudent.php" method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="profile" class="col-sm-2 col-form-label"> Profile </label>
					    <div class="col-sm-10">
					    	<input type="file"  id="profile" name="profile">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Name </label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Email </label>
					    <div class="col-sm-10">
					    	<input type="email" class="form-control" id="name" placeholder="Enter Email" name="email">
					    </div>
					</div>

					<fieldset class="form-group">
					    <div class="row">
					    	<legend class="col-form-label col-sm-2 pt-0"> Gender </legend>
					      
					      	<div class="col-sm-10">
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
					          		<label class="form-check-label" for="male">
					            		Male
					          		</label>
					        	</div>
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="gender" id="female" value="Female">
					          		<label class="form-check-label" for="female">
					            		Female
					          		</label>
					        	</div>
					        
					      </div>
					    </div>
					</fieldset>

					<div class="form-group row">
						<label for="address" class="col-sm-2 col-form-label"> Address </label>
					    <div class="col-sm-10">
					    	<textarea class="form-control" rows="5" name="address"></textarea>
					    </div>
					</div>

					<div class="form-group row">
					    <div class="col-sm-10">
					   		<button type="submit" class="btn btn-primary">
					   			SAVE
					   		</button>
					    </div>
					</div>


				</form>
			</div>
		</div>
	</div>

	<!-- Edit -->
	<div class="container" id="editStudentdiv">
		<div class="row mt-5">
			<div class="col-12 text-center">
				<h1 class="display-4"> Add Edit Student </h1>
			</div>
		</div>
		

		<div class="row mt-5">
			<div class="col align-self-center">
				<form action="editStudent.php" method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="profile" class="col-sm-2 col-form-label"> Profile </label>
					    <div class="col-sm-10">
					    	<input type="file"  id="editprofile" name="editprofile">
					    	<img src="" id="editimg" class="d-block mt-1" width="100px" height="100px">
					    </div>
					</div>
					<input type="text" name="oldphoto" id="oldphoto">
					<input type="text" name="editid" id="editid">

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Name </label>
					    <div class="col-sm-10">
					    	<input type="text" class="form-control" id="editname" placeholder="Enter Name" name="editname">
					    </div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label"> Email </label>
					    <div class="col-sm-10">
					    	<input type="email" class="form-control" id="editemail" placeholder="Enter Email" name="editemail">
					    </div>
					</div>

					<fieldset class="form-group">
					    <div class="row">
					    	<legend class="col-form-label col-sm-2 pt-0"> Gender </legend>
					      
					      	<div class="col-sm-10">
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="editgender" id="editmale" value="Male" checked>
					          		<label class="form-check-label" for="male">
					            		Male
					          		</label>
					        	</div>
					        
					        	<div class="form-check">
					          		<input class="form-check-input" type="radio" name="editgender" id="editfemale" value="Female">
					          		<label class="form-check-label" for="female">
					            		Female
					          		</label>
					        	</div>
					        
					      </div>
					    </div>
					</fieldset>

					<div class="form-group row">
						<label for="address" class="col-sm-2 col-form-label"> Address </label>
					    <div class="col-sm-10">
					    	<textarea class="form-control" rows="5" name="editaddress" id="editaddress"></textarea>
					    </div>
					</div>

					<div class="form-group row">
					    <div class="col-sm-10">
					   		<button type="submit" class="btn btn-primary">
					   			UPDATE
					   		</button>
					    </div>
					</div>


				</form>
			</div>
		</div>
	</div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th> # </th>
				<th> Name </th>
				<th> Gender </th>
				<th> Email </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>


<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
		$(document).ready(function()
		{
			$("#addStudentdiv").show();
			$("#editStudentdiv").hide();
			showData();
			function showData()
			{
				$.get('student.json',function(response)
				{
					//console.log(response);
					if(response)
					{
						var j=1;
						//var stuArray=JSON.parse(response);
						var html=' ';
						$.each(response,function(i,v)
						{
							html+=`<tr>
							<td>${j++}</td>
							<td>${v.name}</td>
							<td>${v.gender}</td>
							<td>${v.email}</td>
							<td><button class="btn btn-primary detail" data-id="${i}" data-name="${v.name}" data-gender="${v.gender}" data-email="${v.email}" data-address="${v.address}" data-profile="${v.profile}">Detail</button>
							<button class="btn btn-warning edit" data-id="${i}" >
								Edit</button>
								<button class="btn btn-danger delete" data-id="${i}">
								Delete</button>
							</td>
							
							</tr>`
						});
						$("tbody").html(html);

					}
				});
			}
			

			$("tbody").on("click",".detail",function()
			{
				var id=$(this).data("id");
				var name=$(this).data("name");
				var email=$(this).data("email");
				var gender=$(this).data("gender");
				var address=$(this).data("address");
				var profile=$(this).data("profile");

				//console.log(profile);

				$("#stu_img").attr("src",profile);
				$("#stu_name").text("Name :"+name);
				$("#stu_gender").text("Gender :"+gender);
				$("#stu_email").text("Email :"+email);
				$("#stu_address").text("Address :"+address);
				$("#detailModal").modal("show");

			});

			

			$("tbody").on("click",".delete",function()
			{
				var id=$(this).data("id");
				console.log(id);

				var ans=confirm("Are you sure to delete!");
				//console.log(ans);
				if(ans)
				{
					$.post("deleteStudent.php",{id:id},function(response)
					{
						//console.log(response);
						showData();

					})
				}
			})
			$("tbody").on("click",".edit",function(){

				//alert("hi");
				$("#editStudentdiv").show();
				$("#addStudentdiv").hide();
				var id=$(this).data("id");

				$.get("student.json",function(response)
				{
					// console.log(typeof(response));if string to array

					if(response)
					{
						var data_arr=response;
						console.log(data_arr);
						var edit_name=data_arr[id].name;
						var edit_email=data_arr[id].email;
						var edit_gender=data_arr[id].gender;
						var edit_address=data_arr[id].address;
						var edit_profile=data_arr[id].profile;

						$("#editid").val(id);
						//console.log(edit_name+edit_email+edit_gender+edit_address+editprofile);

						$("#editname").val(edit_name);
						$("#editemail").val(edit_email);
						$("#editaddress").val(edit_address);
						$("#editimg").attr("src",edit_profile);
						$("#oldphoto").val(edit_profile);

						//$("#editprofile").(edit_profile);


						if(edit_gender=="Male")
						{
							$("#editmale").prop("checked","checked");
						}
						else
						{
							$("#editfemale").prop("checked","checked");
						}

						showData();




					}

				})
			})
		})
</script>

<div class="modal" id="detailModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Student Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="container">
        	<div class="row">
        		<div class="col-md-5">
        			<img src="" id="stu_img" class="img-fluid">
        		</div>
        		<div class="col-md-7">
        			<p id="stu_name"></p>
        			<p id="stu_gender"></p>
        			<p id="stu_email"></p>
        			<p id="stu_addresss"></p>
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>