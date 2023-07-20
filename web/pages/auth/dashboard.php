<?php
include("../../layouts/header.php");
session_start();
if (!isset($_SESSION['name'])) {
    header("location: login.php");
    exit();
}
?>

<div class="container py-5">
    <h3>Dashboard &middot; <?php echo $_SESSION['name'] ?></h3>
</div>

<?php
include("../../layouts/footer.php");
?>