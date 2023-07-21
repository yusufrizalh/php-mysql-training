<?php
include("../../layouts/header.php");
?>

<div class="container mt-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4><strong>Create New Course</strong></h4>
                    </div>
                    <div class="card-body">
                        <form action="./store.php" method="post">
                            <div class="mb-3">
                                <input type="text" name="cou_name" class="form-control" autocomplete="off" placeholder="Enter course name" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" name="cou_price" class="form-control" autocomplete="off" placeholder="Enter course price" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" name="cou_duration" class="form-control" autocomplete="off" placeholder="Enter course duration" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="cou_description" cols="20" rows="6" class="form-control" placeholder="Enter course description"></textarea>
                            </div>
                            <div class="mb-3">
                                <?php
                                require_once "../../config/database.php";
                                $sql = "SELECT * FROM categories ORDER BY cat_name ASC";
                                $result = $con->query($sql);
                                ?>
                                <select name="fk_cat_id" class="form-control" required>
                                    <option disabled selected>Choose One!</option>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-md btn-primary" name="save">
                                    Save
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
include("../../layouts/footer.php");
?>