<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling</title>
    <!-- css -->
    <style>
        .error {
            color: crimson;
        }

        .success {
            color: green;
        }
    </style>
</head>

<?php
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

function filterEmail($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return $field;
    } else {
        return FALSE;
    }
}

function filterString($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if (!empty($field)) {
        return $field;
    } else {
        return FALSE;
    }
}

// nilai awal masih kosong
$nameError = $emailError = $messageError = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validasi name
    if (empty($_POST["name"])) {
        $nameError = "Name cannot be empty!";
    } else {
        $name = filterName($_POST["name"]);
        if ($name == FALSE) {
            $nameError = "Please enter a valid name!";
        } else {
            $name = $_POST["name"];
            $nameError = "";
        }
    }
    // validasi email
    if (empty($_POST["email"])) {
        $emailError = "Email cannot be empty!";
    } else {
        $email = filterEmail($_POST["email"]);
        if ($email == FALSE) {
            $emailError = "Please enter a valid email!";
        } else {
            $email = $_POST["email"];
            $emailError = "";
        }
    }
    // validasi message
    if (empty($_POST["message"])) {
        $messageError = "Message cannot be empty!";
    } else {
        $message = filterString($_POST["message"]);
        if ($message == FALSE) {
            $messageError = "Please enter a valid message!";
        } else {
            $message = $_POST["message"];
            $messageError = "";
        }
    }

    // kosongkan seluruh fields
    $name = $email = $message = "";
}

?>

<body>
    <h3>Contact Us</h3>
    <p>Please fill in this form and send us.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <label for="name">Name: <sup>*</sup></label><br>
            <input type="text" name="name" placeholder="Enter your name" autocomplete="off" value="<?php echo $name; ?>">
            <span class="error" name="nameError"><?php echo $nameError; ?></span>
        </div>
        <div>
            <label for="email">Email: <sup>*</sup></label><br>
            <input type="text" name="email" placeholder="Enter your email" autocomplete="off" value="<?php echo $email; ?>">
            <span class="error" name="emailError"><?php echo $emailError; ?></span>
        </div>
        <div>
            <label for="message">Message: <sup>*</sup></label><br>
            <textarea name="message" cols="15" rows="6" placeholder="Enter your message"><?php echo $message; ?></textarea>
            <span class="error" name="messageError"><?php echo $messageError; ?></span>
        </div>
        <div>
            <input type="reset" value="Reset"> &nbsp;
            <input type="submit" value="Submit">
        </div>
    </form>

    <hr>

    <?php
    if (empty($nameError) && empty($emailError) && empty($messageError)) {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    ?>
            <h3>Thank you</h3>
            <p>Here is the information you have submitted.</p>
            <ul>
                <li>Name: <?php echo $_POST["name"]; ?></li>
                <li>Email: <?php echo $_POST["email"]; ?></li>
                <li>Message: <?php echo $_POST["message"]; ?></li>
            </ul>
    <?php
        }
    }
    ?>

</body>

</html>