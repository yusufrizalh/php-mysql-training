<?php
include("../../layouts/header.php");
session_start();
if (!isset($_SESSION['name'])) {
    header("location: login.php");
    exit();
}
?>

<div class="container mt-5 py-5">
    <h3>Dashboard &middot; <strong><?php echo $_SESSION['name'] ?></strong></h3>
</div>

<?php
include("../../layouts/footer.php");
?>