<!-- header -->
<?php
include("../../layouts/header.php");
// database connection
require_once "../../config/database.php";

// filter name
function filterName($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if (filter_var(
        $field,
        FILTER_VALIDATE_REGEXP,
        array("options" => array("regexp" => "/^[a-zA-Z\s]+$/"))
    )) {
        return $field;
    } else {
        return FALSE;
    }
}

// filter email
function filterEmail($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return $field;
    } else {
        return FALSE;
    }
}

// filter password
function filterPassword($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if (!empty($field)) {
        return $field;
    } else {
        return FALSE;
    }
}

// initialize properties
$nameError = $emailError = $passwordError = "";
$name = $email = $hashPassword = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate name
    if (empty($_POST['name'])) {
        $nameError = "Name cannot be empty!";
    } else {
        $name = filterName($_POST['name']);
        if ($name == FALSE) {
            $nameError = "Please enter a valid name!";
        } else {
            $name = $_POST['name'];
        }
    }
    // validate email
    if (empty($_POST['email'])) {
        $emailError = "Email cannot be empty!";
    } else {
        $email = filterEmail($_POST['email']);
        if ($email == FALSE) {
            $emailError = "Please enter a valid email!";
        } else {
            $email = $_POST['email'];
        }
    }
    // validate password
    if (empty($_POST['password'])) {
        $passwordError = "password cannot be empty!";
    } else {
        $hashPassword = filterPassword($_POST['password']);
        if ($hashPassword == FALSE) {
            $passwordError = "Please enter a valid password!";
        } else {
            // encrypt
            $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    }

    // all fields is valid
    if (empty($nameError) && empty($emailError) && empty($passwordError)) {
        if (!empty($name) && !empty($email) && !empty($hashPassword)) {
            // query to register process
            $sql = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$hashPassword')";
            if ($con->query($sql) === TRUE) {
                echo "<script type='text/javascript'>alert('New user registered!');</script>";
                echo "<script type='text/javascript'>location.href='http://localhost/training-php/web/pages/auth/login.php';</script>";
            } else {
                echo "Error: " . $sql . " - " . $con->error;
            }
        }
    }
}

?>

<!-- content -->
<div class="container mt-5 py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><strong>Register</strong></h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <div class="row mb-3">
                            <label for="name" class="col-md-3 col-form-label">
                                Enter your name
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" autocomplete="off">
                                <small class="text-danger" name="nameError"><?php echo $nameError ?></small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-3 col-form-label">
                                Enter your email
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control" autocomplete="off">
                                <small class="text-danger" name="emailError"><?php echo $emailError ?></small>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="password" class="col-md-3 col-form-label">
                                Enter your password
                            </label>
                            <div class="col-md-9">
                                <input type="text" name="password" class="form-control" autocomplete="off">
                                <small class="text-danger" name="passwordError"><?php echo $passwordError ?></small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php
include("../../layouts/footer.php");
?>