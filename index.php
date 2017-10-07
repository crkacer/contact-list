<?php 
	include('header.php');
 ?>
 <div class="container">
<ul class="breadcrumb">
  <li class="active">Home</li>
</ul>
<h2 class="display-4">All Contacts</h2>
<div id="app">
<button @click="openAdd" type="button" class="btn btn-light">Create a new Contact</button>	
<div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button">Go!</button>
      </span>
    </div>
  </div>
<div class="contact-list">	
	<div class="card" style="width: 20rem;">
	  <img class="card-img-top" src="./assets/img/1.jpg" alt="photo" style='height: 100%; width: 100%; object-fit: contain'>
	  <div class="card-body">
	    <h4 class="card-title">Mr. Chairman</h4>
	  </div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">John</li>
	    <li class="list-group-item">Kenedy</li>
	    <li class="list-group-item">john.kenedy@hotmail.com</li>
	  </ul>
	  <div class="card-body">
	    <a href="/edit.php?id=200" class="card-link">Update link</a>
	    <a href="#" class="card-link">Delete link</a>
	  </div>
	</div>

	<div class="card" style="width: 20rem;">
	  <img class="card-img-top" src="./assets/img/2.jpg" alt="photo" style='height: 100%; width: 100%; object-fit: contain'>
	  <div class="card-body">
	    <h4 class="card-title">Mr. Chairman</h4>
	  </div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">John</li>
	    <li class="list-group-item">Kenedy</li>
	    <li class="list-group-item">john.kenedy@hotmail.com</li>
	  </ul>
	  <div class="card-body">
	    <a href="/edit.php?id=200" class="card-link">Update link</a>
	    <a href="#" class="card-link">Delete link</a>
	  </div>
	</div>

	<div class="card" style="width: 20rem;">
	  <img class="card-img-top" src="./assets/img/3.jpg" alt="photo" style='height: 100%; width: 100%; object-fit: contain'>
	  <div class="card-body">
	    <h4 class="card-title">Mr. Chairman</h4>
	  </div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">John</li>
	    <li class="list-group-item">Kenedy</li>
	    <li class="list-group-item">john.kenedy@hotmail.com</li>
	  </ul>
	  <div class="card-body">
	    <a href="/edit.php?id=200" class="card-link">Update link</a>
	    <a href="#" class="card-link">Delete link</a>
	  </div>
	</div>

	<div class="card" style="width: 20rem;">
	  <img class="card-img-top" src="./assets/img/4.jpg" alt="photo" style='height: 100%; width: 100%; object-fit: contain'>
	  <div class="card-body">
	    <h4 class="card-title">Mr. Chairman</h4>
	  </div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">John</li>
	    <li class="list-group-item">Kenedy</li>
	    <li class="list-group-item">john.kenedy@hotmail.com</li>
	  </ul>
	  <div class="card-body">
	    <a href="/edit.php?id=200" class="card-link">Update link</a>
	    <a href="#" class="card-link">Delete link</a>
	  </div>
	</div>


</div>
</div>
</div>

<script type="text/javascript">
	var vm = new Vue({
		el: '#app',
		data: {
			test: 200
		},
		methods: {
			testingMethod: function() {
				console.log(this.src);
			},
			openAdd: function() {
				window.location.href="/add.php";
			}
		}
	});
</script>
<?php 
	include('footer.php');
 ?>
