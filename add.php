<?php 
	include('header.php');
	include('functions.php');
 ?>

 <?php
  if (isset($_POST['title']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])) {

      $currentTime = date('YmdGis');
      $target_dir = realpath(dirname(__FILE__)) . "/assets/img/uploads/". $currentTime;
      if (!file_exists($target_dir)) {
          mkdir($target_dir, 0755, true);
      }
      $target_file = $target_dir . "/". basename($_FILES["avatar"]["name"]);

      uploadImage($target_dir, "avatar");
      writeRecords([
        'id' => "/assets/img/uploads/". $currentTime. "/". basename($_FILES["avatar"]["name"]),
        'location' => $target_file,
        'title' => $_POST['title'],
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email']
      ]);
  }
  
  ?>
 <div class="container">
 <ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li class="active">Add</li>
</ul>

<h2 class="display-4">Add Contact</h2>

 <br>
 <form action="" method="POST" enctype="multipart/form-data">
 	
 	<div class="form-group">
  		<label class="control-label" for="inputLarge">Title</label>
  		<select class="custom-select" name="title">
  			<option selected value="">Choose title</option>
  			<option value="Mr.">Mr.</option>
 			<option value="Ms.">Ms.</option>
  			<option value="Mrs.">Mrs.</option>
		</select>
	</div>

	<div class="form-group">
  		<label class="control-label" for="inputLarge">First Name</label>
  		<input class="form-control input-lg" type="text" id="inputLarge" name="fname">
	</div>

	<div class="form-group">
  		<label class="control-label" for="inputLarge">Last Name</label>
  		<input class="form-control input-lg" type="text" id="inputLarge" name="lname">
	</div>

	<div class="form-group">
  		<label class="control-label" for="inputLarge">Email</label>
  		<input class="form-control input-lg" type="text" id="inputLarge" name="email">
	</div>

     <div class="form-group">
         <label class="control-label">Select File</label>
         <input id="input-b5" name="avatar" type="file">
     </div>

	<div class="form-group">
  		<input type="submit" class="btn btn-primary" value="Add">
  		<input type="button" class="btn btn-danger" value="Delete">
	</div>

 </form>
</div>

<script type="text/javascript">
    $(document).on('ready', function() {
        $("#input-b5").fileinput({showCaption: false});
    });
</script>
<?php 
	include('footer.php');
 ?>
