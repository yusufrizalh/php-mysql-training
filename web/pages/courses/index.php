<?php
include("../../layouts/header.php");
?>

<!-- get all courses -->
<div class="container mt-5 py-5">
    <?php
    require_once "../../config/database.php";
    $sql = "SELECT cou.cou_id, cou.cou_name, cou.cou_price, cou.cou_duration, cou.created_at, cat.cat_name FROM categories cat JOIN courses cou ON cou.fk_cat_id = cat.cat_id ORDER BY cou.cou_name ASC;";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>All Courses</h3>
                </div>
                <div class="d-flex-justify-content-between">
                    <a href="" class="btn btn-md btn-primary">New Course</a>
                    &nbsp;
                    <a href="" class="btn btn-md btn-primary">Export PDF</a>
                </div>
            </div>
            <hr>

            <!-- search form -->
            <?php
            include("./search-form.php");
            ?>

            <!-- display results with table -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-dark text-center">
                        <th>NO.</th>
                        <th>Course Name</th>
                        <th>Course Price</th>
                        <th>Course Duration</th>
                        <th>Course Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td>
                                <a href="./show.php?course_id=<?php echo $row['cou_id']; ?>" class="text-primary" style="text-decoration: none;">
                                    <?php echo $row['cou_name']; ?>
                                </a>
                            </td>
                            <td><?php echo "IDR. " . $row['cou_price']; ?></td>
                            <td class="text-center"><?php echo $row['cou_duration'] . " days"; ?></td>
                            <td class="text-center"><?php echo $row['cat_name']; ?></td>
                            <td class="d-flex justify-content-center">
                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                    $no++;
                }
                ?>
            </table>
        </div>
    <?php
    }
    ?>
</div>

<?php
include("../../layouts/footer.php");
?>