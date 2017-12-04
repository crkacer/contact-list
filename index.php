<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('header.php');
include('functions.php');
?>

<div class="container">
    <ul class="breadcrumb">
        <li class="active">Home</li>
    </ul>

    <h2 class="display-4">All Contacts</h2>
    <div id="app">
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

        <button @click="openAdd" type="button" class="btn btn-light" style="margin-bottom: 30px;">Create a new Contact
        </button>
        <div class="col-lg-6">
            <form action="search.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="value" placeholder="Search for..."
                           aria-label="Search for...">
                    <span class="input-group-btn">
            <input class="btn btn-secondary" type="submit" value="Search!"/>
          </span>
                </div>
            </form>
        </div>
        <div class="contact-list" style="padding: 30px;">
            <?php
            // Read the text file and render data
            $content = readRecords();
            if (count($content) > 0) {

                foreach ($content as $c) { ?>
                    <div class="card" style="width: 20rem; float: left; hover: box-shadow: 2px 2px;">
                        <img class="card-img-top" src="<?php echo $c['location']; ?>" alt="photo"
                             style='height: 198px; width: 198px; object-fit: cover'>
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo $c['title']; ?>
                            </h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <?php echo $c['fname']; ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo $c['lname']; ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo $c['email']; ?>
                            </li>
                        </ul>
                        <div class="card-body">
                            <a href="/edit.php?id=<?php echo $c['id']; ?>" class="card-link">Update link</a>
                            <a href="#" id="<?php echo $c['id']; ?>" class="card-link" @click="deleteContact"
                               data-toggle="modal" data-target="#exampleModal">Delete link</a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>


        </div>
    </div>
</div>

<script type="text/javascript">
    var vm = new Vue({
        el: '#app',
        data: {
            test: 200,
            hoverCard: false,
            hoverClass: "card",
            deleteID: null,
        },
        methods: {
            testingMethod: function () {
                console.log(this.src);
            },
            openAdd: function () {
                window.location.href = "/add.php";
            },
            deleteContact: function (event) {
                this.deleteID = event.path[0].id
            },
            confirmDelete: function () {
                window.location.href = '/delete.php?id=' + this.deleteID;
//                console.log(1);
            }

        }
    });
</script>
<?php
include('footer.php');
?>
