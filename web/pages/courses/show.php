<?php
include("../../layouts/header.php");
?>

<!-- get course by course_id -->
<?php
require_once "../../config/database.php";

if (isset($_GET['course_id']) && !empty(trim($_GET['course_id']))) {
    $course_id = $_GET['course_id'];
    $sql = "SELECT cou.cou_id, cou.cou_name, cou.cou_price, cou.cou_duration, cou.cou_description, cat.cat_name FROM categories cat JOIN courses cou ON cou.fk_cat_id = cat.cat_id WHERE cou.cou_id = '$course_id';";
    $result = $con->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="container mt-5 py-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo $row['cou_name']; ?></h4>
                            </div>
                            <div class="card-body">
                                <p>Price: <?php echo $row['cou_price']; ?></p>
                                <p>Duration: <?php echo $row['cou_duration']; ?></p>
                                <p>Description: <?php echo $row['cou_description']; ?></p>
                                <p>Category: <?php echo $row['cat_name']; ?></p>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-md btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title fs-5" id="deleteModalLabel">Delete Course</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Are you sure to delete this course?</h4>
                                                <p>
                                                    <strong><?php echo $row['cou_name']; ?></strong>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="./delete.php?course_id=<?php echo $row['cou_id']; ?>" method="post">
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
}
?>

<?php
include("../../layouts/footer.php");
?>