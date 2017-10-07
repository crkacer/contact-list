<?php 
	include('header.php');
 ?>
 <div class="container">
 <ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li class="active">Edit <?php if (isset($_GET['id'])) echo "- ". $_GET['id']; ?></li>
</ul>

<h2 class="display-4">Edit Contact</h2>

 <br>
 <form action="" method="">
 	
 	<div class="form-group">
  		<label class="control-label" for="inputLarge">Title</label>
  		<select class="custom-select" name="title">
  			<option selected>Choose title</option>
  			<option value="mr">Mr.</option>
 			<option value="ms">Ms.</option>
  			<option value="mrs">Mrs.</option>
		</select>
	</div>

	<div class="form-group">
  		<label class="control-label" for="inputLarge">First Name</label>
  		<input class="form-control input-lg" type="text" id="inputLarge">
	</div>

	<div class="form-group">
  		<label class="control-label" for="inputLarge">Last Name</label>
  		<input class="form-control input-lg" type="text" id="inputLarge">
	</div>

	<div class="form-group">
  		<label class="control-label" for="inputLarge">Email</label>
  		<input class="form-control input-lg" type="text" id="inputLarge">
	</div>

	<div class="form-group">
  		<input type="submit" class="btn btn-primary" value="Update">
  		<input type="button" class="btn btn-danger" value="Delete">
	</div>

 </form>
</div>
<?php 
	include('footer.php');
 ?>
