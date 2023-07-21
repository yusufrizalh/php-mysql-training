<?php
include("../../layouts/header.php");

require_once "../../config/database.php";

if (isset($_GET['course_id']) && !empty(trim($_GET['course_id']))) {
    $course_id = $_GET['course_id'];
    $sql = "SELECT cou.cou_id, cat.cat_id, cou.cou_name, cou.cou_price, cou.cou_duration, cou.cou_description, cat.cat_name FROM categories cat JOIN courses cou ON cou.fk_cat_id = cat.cat_id WHERE cou.cou_id = '$course_id';";
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
                                            <input type="hidden" name="course_id" class="form-control" value="<?php echo $row['cou_id']; ?>">
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
                                            <select name="fk_cat_id" class="form-control">
                                                <?php
                                                require_once "../../config/database.php";
                                                $course_id = $_GET['course_id'];

                                                $sqlcat = "SELECT * FROM categories";
                                                $sql = "SELECT cou.cou_id, cat.cat_id, cou.cou_name, cou.cou_price, cou.cou_duration, cou.cou_description, cat.cat_name FROM categories cat JOIN courses cou ON cou.fk_cat_id = cat.cat_id WHERE cou.cou_id = '$course_id';";

                                                $resultcat = $con->query($sqlcat);
                                                $result = $con->query($sql);

                                                if (($resultcat->num_rows > 0) && ($result->num_rows > 0)) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        if ($row['cat_id'] == $_POST['fk_cat_id']) {
                                                            echo "<option value=" . $row['fk_cat_id'] . "selected>" . $row['cat_name'] . "</option>";
                                                        } else {
                                                            echo "<option value=" . $row['fk_cat_id'] . ">" . $row['cat_name'] . "</option>";
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