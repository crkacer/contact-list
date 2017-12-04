<?php
ob_start();
include('header.php');
include('functions.php');
?>

<?php
if (isset($_POST['submit'])) {

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

    $currentTime = date('YmdGis');
    $fileLocation = "assets/img/default.png";

    if (file_exists($_FILES['avatar']['tmp_name'])) {
        // file exists
        $name = $_FILES["avatar"]["name"];
        $ext = end((explode(".", $name)));
        if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "ico") {
            $target_dir = realpath(dirname(__FILE__)) . "/assets/img/uploads/" . $currentTime;
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            $target_file = $target_dir . "/" . basename($_FILES["avatar"]["name"]);
            $fileLocation = "assets/img/uploads/" . $currentTime . "/" . basename($_FILES["avatar"]["name"]);
            $okUpload = uploadImage($target_dir, "avatar");
        }

    }

    $okWrite = writeRecords([
        'id' => $currentTime,
        'location' => $fileLocation,
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

    header("Location: index.php");
}

?>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="./">Home</a></li>
        <li class="active">Add</li>
    </ul>

    <h2 class="display-4">Add Contact</h2>

    <br>
    <form action="" method="POST" enctype="multipart/form-data" id="addForm">

        <div class="form-group">
            <label class="control-label" for="inputLarge">Title*</label>
            <select class="custom-select" name="title" v-model="title">
                <option selected value="">Choose title</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
            </select>
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">First Name*</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="fname" v-model="firstname">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">Last Name*</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="lname" v-model="lastname">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">Email</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="email">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">Site</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="site">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">Cell Number</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="cell">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">Home Number</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="home">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">Office Number</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="office">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">Twitter</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="twitter">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">Facebook</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="facebook">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputLarge">Comment</label>
            <input class="form-control input-lg" type="text" id="inputLarge" name="comment">
        </div>


        <div class="form-group">
            <label class="control-label">Select File</label>
            <input id="input-b5" name="avatar" type="file">
        </div>

        <div class="form-group">

            <label v-if="!validated" class="control-label">Please fill in compulsory fields (*)</label>
            <br>
            <input name="submit" type="submit" class="btn btn-primary" value="Add" :disabled="!validated">
            <input type="reset" class="btn btn-danger" value="Reset">
        </div>

    </form>
</div>

<script type="text/javascript">
    var vm = new Vue({
        el: "#addForm",
        data: {
            title: "",
            firstname: "",
            lastname: ""
        },
        computed: {
            validated: function () {
                if (this.title.trim() != "" && this.firstname.trim() != "" && this.lastname.trim() != "") {
                    return true;
                }
                return false;
            }
        }
    });
</script>
<?php
include('footer.php');
?>
