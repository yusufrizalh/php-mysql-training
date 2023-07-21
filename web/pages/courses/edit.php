<?php
include("../../layouts/header.php");

require_once "../../config/database.php";

if (isset($_GET['cou_id']) && !empty(trim($_GET['cou_id']))) {
    $course_id = $_GET['cou_id'];
    $sql = "SELECT cou.cou_id, cou.cou_name, cou.cou_price, cou.cou_duration, cou.cou_description, cat.cat_id, cat.cat_name FROM courses cou JOIN categories cat ON cat.cat_id = cou.fk_cat_id WHERE cou.cou_id = '$course_id'";

    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="container mt-5 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4><strong>Edit Course</strong></h4>
                                </div>
                                <div class="card-body">
                                    <form action="./update.php" method="post">
                                        <div class="mb-3">
                                            <input type="hidden" name="cou_id" class="form-control" value="<?php echo $row['cou_id']; ?>">
                                            <input type="text" name="cou_name" class="form-control" autocomplete="off" required value="<?php echo $row['cou_name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" name="cou_price" class="form-control" autocomplete="off" required value="<?php echo $row['cou_price']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" name="cou_duration" class="form-control" autocomplete="off" required value="<?php echo $row['cou_duration']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="cou_description" cols="20" rows="6" class="form-control" placeholder="Enter course description"><?php echo $row['cou_description']; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <select name="fk_cat_id" class="form-control" required>
                                                <?php
                                                require_once "../../config/database.php";
                                                $course_id = $_GET['cou_id'];

                                                $sqlcat = "SELECT * FROM categories";
                                                $sql = "SELECT cou.cou_id, cou.cou_name, cou.cou_price, cou.cou_duration, cou.cou_description, cat.cat_id, cat.cat_name FROM courses cou JOIN categories cat ON cat.cat_id = cou.fk_cat_id WHERE cou.cou_id = '$course_id'";

                                                $resultcat = $con->query($sqlcat);
                                                $result = $con->query($sql);

                                                if (($result->num_rows > 0) && ($resultcat->num_rows > 0)) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        if ($row['cat_id'] == $_POST['fk_cat_id']) {
                                                            echo "<option value=" . $row['cat_id'] . "selected>" . $row['cat_name'] . "</option>";
                                                        } else {
                                                            echo "<option value=" . $row['cat_id'] . ">" . $row['cat_name'] . "</option>";
                                                        }
                                                    }
                                                    while ($rowcat = $resultcat->fetch_assoc()) {
                                                        echo "<option value=" . $rowcat['cat_id'] . ">" . $rowcat['cat_name'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-md btn-primary" name="update">
                                                Update
                                            </button>
                                        </div>
                                    </form>
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