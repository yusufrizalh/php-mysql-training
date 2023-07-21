<?php
include("../../layouts/header.php");
?>

<?php
require_once "../../config/database.php";

if (isset($_GET['cat_id']) && isset($_GET['cat_name'])) {
    $cat_id = $_GET['cat_id'];
    $cat_name = $_GET['cat_name'];
    $sql = "SELECT cat.cat_id, cat.cat_name, cou.cou_id, cou.cou_name, cou.cou_price, cou.cou_duration, cou.cou_description FROM categories cat JOIN courses cou ON cou.fk_cat_id = cat.cat_id WHERE cat.cat_id = '$cat_id'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
?>
        <div class="container mt-5 py-5">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Category: <?php echo $cat_name; ?></h3>
                </div>
                <div>
                    <a href="" class="btn btn-md btn-primary">New Category</a>
                </div>
            </div>
            <hr>

            <!-- display results on grid -->
            <div class="row">
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong><?php echo $row['cou_name']; ?></strong>
                            </div>
                            <a href="../courses/show.php?course_id=<?php echo $row['cou_id']; ?>" class="text-dark" style="text-decoration: none;">
                                <div class="card-body">
                                    <p>Course price: <?php echo $row['cou_price']; ?></p>
                                    <p>Course duration: <?php echo $row['cou_duration']; ?></p>
                                </div>
                            </a>
                            <div class="card-footer">
                                <a href="../courses/edit.php?cou_id=<?php echo $row['cou_id']; ?>" class="btn btn-md btn-outline-warning">Edit</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="container mt-5 py-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Warning!</strong>
                    </div>
                    <div class="card-body">
                        <h4>No course on this category found!</h4>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>

<?php
include("../../layouts/footer.php");
?>