<?php 
	include('header.php');
 ?>
 <div class="container">
<ul class="breadcrumb">
  <li class="active">Home</li>
</ul>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Woohoo, you're reading this text in a modal!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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
	<div v-on:mouseover="mouseOver" v-on:mouseout="mouseOver" v-bind:class="{'card': !hoverCard, 'card card-hover': hoverCard}" style="width: 20rem;">
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
	    <a href="#" class="card-link" data-toggle="modal" data-target="#exampleModal">Delete link</a>
	  </div>
	</div>

	<div v-on:mouseover="mouseOver" v-on:mouseout="mouseOver" v-bind:class="{'card': !hoverCard, 'card card-hover': hoverCard}" style="width: 20rem;">
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

	<div v-on:mouseover="mouseOver" v-on:mouseout="mouseOver" v-bind:class="{'card': !hoverCard, 'card card-hover': hoverCard}" style="width: 20rem;">
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

	<div v-on:mouseover="mouseOver" v-on:mouseout="mouseOver" v-bind:class="{'card': !hoverCard, 'card card-hover': hoverCard}" style="width: 20rem;">
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
			test: 200,
			hoverCard: false,
			hoverClass: "card"
		},
		computed: {
			
		},
		methods: {
			testingMethod: function() {
				console.log(this.src);
			},
			openAdd: function() {
				window.location.href="/add.php";
			},
			mouseOver: function() {
				this.hoverCard = !this.hoverCard;

			},
			hoverCls: function() {
				if (this.hoverClass) {
					return "card card-hover";
				}
				return "card";
			}
		}
	});
</script>
<?php 
	include('footer.php');
 ?>
