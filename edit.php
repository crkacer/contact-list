<?php
ob_start();
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

        if (file_exists($_FILES['avatar']['tmp_name'])) {
            $target_dir = realpath(dirname(__FILE__)) . "/assets/img/uploads/" . $_POST['id'];
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            $target_file = "/assets/img/uploads/" . $_POST['id'] . "/" . basename($_FILES["avatar"]["name"]);
            uploadImage($target_dir, "avatar");

        }

        $title = $_POST['title'] ?: "Mr.";
        $firstname = $_POST['fname'] ?: "John";
        $lastname = $_POST['lname'] ?: "Doe";
        $email = $_POST['email'] ?: "#NA";
        $site = $_POST['site'] ?: "";
        $cell = $_POST['cell'] ?: "";
        $home = $_POST['home'] ?: "";
        $office = $_POST['office'] ?: "";
        $twitter = $_POST['twitter'] ?: "";
        $facebook = $_POST['facebook'] ?: "";
        $comment = $_POST['comment'] ?: "";

        $ok = updateRecords([
            'position' => $p,
            'location' => $target_file,
            'title' => $title,
            'fname' => $firstname,
            'lname' => $lastname,
            'email' => $email,
            'site' => $site,
            'cell' => $cell,
            'home' => $home,
            'office' => $office,
            'twitter' => $twitter,
            'facebook' => $facebook,
            'comment' => $comment
        ]);


    }
}

if (isset($_GET['id'])) { ?>
    <div class="container" id="app">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
            <li class="active">Edit <?php echo "- " . $data[$k]['fname'] . " " . $data[$k]['lname']; ?></li>
        </ul>

        <h2 class="display-4">Edit Contact</h2>

        <br>
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label class="control-label" for="inputLarge">Title*</label>
                <select class="custom-select" name="title" v-model="title">
                    <option value="">Choose title</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Mrs.">Mrs.</option>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">First Name*</label>
                <input type="hidden" name="id" value="<?php echo $data[$k]['id']; ?>">
                <input class="form-control input-lg" name="fname" type="text" id="inputLarge" v-model="firstname">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">Last Name*</label>
                <input class="form-control input-lg" name="lname" type="text" id="inputLarge" v-model="lastname">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">Email</label>
                <input class="form-control input-lg" name="email" type="text" id="inputLarge"
                       value="<?php echo $data[$k]['email'] ?>">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">Site</label>
                <input class="form-control input-lg" type="text" id="inputLarge" name="site"
                       value="<?php echo @$data[$k]['site'] ?>">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">Cell Number</label>
                <input class="form-control input-lg" type="text" id="inputLarge" name="cell"
                       value="<?php echo @$data[$k]['cell'] ?>">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">Home Number</label>
                <input class="form-control input-lg" type="text" id="inputLarge" name="home"
                       value="<?php echo @$data[$k]['home'] ?>">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">Office Number</label>
                <input class="form-control input-lg" type="text" id="inputLarge" name="office"
                       value="<?php echo @$data[$k]['office'] ?>">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">Twitter</label>
                <input class="form-control input-lg" type="text" id="inputLarge" name="twitter"
                       value="<?php echo @$data[$k]['twitter'] ?>">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">Facebook</label>
                <input class="form-control input-lg" type="text" id="inputLarge" name="facebook"
                       value="<?php echo @$data[$k]['facebook'] ?>">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputLarge">Comment</label>
                <input class="form-control input-lg" type="text" id="inputLarge" name="comment"
                       value="<?php echo @$data[$k]['comment'] ?>">
            </div>

            <div class="form-group">
                <img class="card-img-top" src="<?php echo $data[$k]['location']; ?>" alt="photo"
                     style="height: 198px; width: 198px; object-fit: contain">
                <input id="input-b5" name="avatar" type="file" multiple>
            </div>

            <div class="form-group">
                <label v-if="!validated" class="control-label">Please fill in compulsory fields (*)</label>
                <br>
                <input type="submit" class="btn btn-primary" value="Update" :disabled="!validated">
                <a href="#" id="<?php echo $data[$k]['id']; ?>" class="card-link btn btn-danger" @click="deleteContact"
                   data-toggle="modal" data-target="#exampleModal">Delete</a>
            </div>

        </form>
    </div>

<?php } ?>

<script type="text/javascript">
    var vm = new Vue({
        el: '#app',
        data: {
            deleteID: null,
            title: "<?php echo $data[$k]['title'] ?>",
            firstname: "<?php echo $data[$k]['fname'] ?>",
            lastname: "<?php echo $data[$k]['lname'] ?>"
        },
        computed: {
            validated: function () {
                if (this.title.trim() != "" && this.firstname.trim() != "" && this.lastname.trim() != "") {
                    return true;
                }
                return false;
            }
        },
        methods: {
            deleteContact: function (event) {
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
