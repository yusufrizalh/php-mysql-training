<!-- header -->
<?php
include("../../layouts/header.php");
// database connection
require_once "../../config/database.php";

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
$emailError = $passwordError = "";
$email = $hashPassword = "";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            $hashPassword = $_POST['password'];
        }
    }

    // all fields is valid
    if (empty($emailError) && empty($passwordError)) {
        if (!empty($email) && !empty($hashPassword)) {
            // query to register process
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $con->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // verify password (decrypt)
                if (password_verify($hashPassword, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    echo "<script type='text/javascript'>alert('Now user logged in!');</script>";
                    echo "<script type='text/javascript'>location.href='http://localhost/training-php/web/pages/auth/dashboard.php';</script>";
                } else {
                    $passwordError = "Wrong Password!";
                }
            } else {
                $emailError = "No user found!";
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
                    <h4><strong>Login</strong></h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
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
                                <input type="password" name="password" class="form-control" autocomplete="off">
                                <small class="text-danger" name="passwordError"><?php echo $passwordError ?></small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
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