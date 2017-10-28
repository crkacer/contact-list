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
            $currentTime = date('YmdGis');
            $target_file = "./img/uploads/". $currentTime . "/". basename($_FILES["avatar"]["name"]);
            uploadImage($currentTime, $_FILES["avatar"]);
            $ok = updateRecords([
                'position' => $p,
                'location' => $target_file,
                'title' => $_POST['title'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'email' => $_POST['email']
            ]);
            header("/edit.php?id=". $contactID);
        }
    }

    if (isset($_GET['id'])) { ?>
        <div class="container">
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
                    <label class="control-label">Select File</label>
                    <input id="input-b5" name="avatar" type="file" multiple value="<?php echo $data[$k]['location'] ?>">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                    <input type="button" class="btn btn-danger" value="Delete">
                </div>

            </form>
        </div>

<?php } ?>

<?php 
	include('footer.php');
 ?>
