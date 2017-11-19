<?php 
	include('header.php');
	include('functions.php');

    $data = readRecords();
    // Get the location of that contact with $_GET['id']
    if (isset($_GET['id'])) {
        // Find the index of that contact in array
        for ($i = 0; $i < count($data); $i++) {
            if (intval($data[$i]['id']) == intval($_GET['id'])) {
                $k = $i;
            }
        }

    }
    // Get the location of that contact with $_POST['id']
    $p = -1;
    if (count($_POST) > 0) {
        // Find the index of that contact in array
        $contactID = intval($_POST['id']);
        for ($i = 0; $i < count($data); $i++) {
            if (intval($data[$i]['id']) == intval($contactID)) {
                $p = $i;
            }
        }

        // overwrite the existing contact
        if ($p != -1) {
            
            $target_file = $data[$p]['location'];

            if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
                $target_dir = realpath(dirname(__FILE__)) . "/assets/img/uploads/". $_POST['id'];
                $target_file = "/assets/img/uploads/". $_POST['id'] . "/". basename($_FILES["avatar"]["name"]);
                uploadImage($target_dir, "avatar");

            }
            $ok = updateRecords([
                'position' => $p,
                'location' => $target_file,
                'title' => $_POST['title'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email']
            ]);
        }
    }

    if (isset($_GET['id'])) { ?>
        <div class="container" id="app">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete contact:</h5>
                            <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure to delete the contact?
                        </div>
                        <div class="modal-footer">
                            <button @click="confirmDelete" type="button" class="btn btn-primary">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Modal  -->


            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Edit <?php echo "- ". $data[$k]['fname']. " ". $data[$k]['lname']; ?></li>
            </ul>

            <h2 class="display-4">Edit Contact</h2>

            <br>
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="control-label" for="inputLarge">Title</label>
                    <select class="custom-select" name="title">
                        <option selected>Choose title</option>
                        <option value="Mr." <?php echo (($data[$k]['title'] == "Mr.") ? "selected" : "") ?>>Mr.</option>
                        <option value="Ms." <?php echo (($data[$k]['title'] == "Ms.") ? "selected" : "") ?>>Ms.</option>
                        <option value="Mrs." <?php echo (($data[$k]['title'] == "Mrs.") ? "selected" : "") ?>>Mrs.</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputLarge">First Name</label>
                    <input type="hidden" name="id" value="<?php echo $data[$k]['id']; ?>">
                    <input class="form-control input-lg" name="fname" type="text" id="inputLarge" value="<?php echo $data[$k]['fname'] ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputLarge">Last Name</label>
                    <input class="form-control input-lg" name="lname" type="text" id="inputLarge" value="<?php echo $data[$k]['lname'] ?>">
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputLarge">Email</label>
                    <input class="form-control input-lg" name="email" type="text" id="inputLarge" value="<?php echo $data[$k]['email'] ?>">
                </div>

                <div class="form-group">
                    <img class="card-img-top" src="<?php echo $data[$k]['location']; ?>" alt="photo" style="height: 198px; width: 198px; object-fit: contain" >
                    <input id="input-b5" name="avatar" type="file" multiple>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                    <a href="#" id="<?php echo $data[$k]['id']; ?>" class="card-link btn btn-danger" @click="deleteContact" data-toggle="modal" data-target="#exampleModal">Delete</a>
                </div>

            </form>
        </div>

<?php } ?>

<script type="text/javascript">
    var vm = new Vue({
        el: '#app',
        data: {
            deleteID: null,
        },
        methods: {
            deleteContact: function(event) {
                this.deleteID = event.path[0].id
            },

            confirmDelete: function () {
                window.location.href = '/delete.php?id=' + this.deleteID;
            }
        }
    });
</script>

<?php 
	include('footer.php');
 ?>
