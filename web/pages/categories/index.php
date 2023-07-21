<?php
include("../../layouts/header.php");
?>

<!-- get all categories -->
<div class="container mt-5 py-5">
    <?php
    require_once "../../config/database.php";
    $sql = "SELECT * FROM categories ORDER BY cat_name ASC";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>All Categories</h3>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="./create.php" class="btn btn-md btn-primary">New Categories</a>
                    &nbsp;
                    <a href="" class="btn btn-md btn-primary">Export PDF</a>
                </div>
            </div>
            <hr>

            <!-- display results with table -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-dark text-center">
                        <th>NO.</th>
                        <th>Category Name</th>
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
                                <a href="./categories.php?cat_id=<?php echo $row['cat_id'] ?>&cat_name=<?php echo $row['cat_name'] ?>" class="text-primary" style="text-decoration: none;">
                                    <?php echo $row['cat_name']; ?>
                                </a>
                            </td>
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