<?php
require_once "config.php";

$name = $accoun_number = $age = $phone = "";
$name_err = $accoun_number_err = $age_err = $phone_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    $input_accoun_number = trim($_POST["accoun_number"]);
    if (empty($input_accoun_number)) {
        $accoun_number_err = "Please enter an accoun_number.";
    } else {
        $accoun_number = $input_accoun_number;
    }

    $input_age = trim($_POST["age"]);
    if (empty($input_age)) {
        $age_err = "Please enter the age amount.";
    } elseif (!ctype_digit($input_age)) {
        $age_err = "Please enter a positive integer value.";
    } else {
        $age = $input_age;
    }

    $input_phone = trim($_POST["phone"]);
    if (empty($input_phone)) {
        $phone_err = "Please enter the age amount.";
    } else {
        $phone = $input_phone;
    }

    if (empty($name_err) && empty($accoun_number_err) && empty($age_err) && empty($phone_err)) {
        $sql = "INSERT INTO customer (customer_name, customer_acc_num, customer_age, customer_mobile_num) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_accoun_number, $param_age, $param_phone);


            $param_name = $name;
            $param_accoun_number = $accoun_number;
            $param_age = $age;
            $param_phone = $phone;

            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Bank customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Bank customer</h2>
                    <p>Please fill this form and submit to add Customer record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Account Number</label>
                            <textarea name="accoun_number" class="form-control <?php echo (!empty($accoun_number_err)) ? 'is-invalid' : ''; ?>"><?php echo $accoun_number; ?></textarea>
                            <span class="invalid-feedback"><?php echo $accoun_number_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                            <span class="invalid-feedback"><?php echo $age_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>