<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p style="color:blue ">Previous date </p>
    <?php
    // previous date
    $current_timestamp = time();
    $allowable_start_date = strtotime('yesterday', $current_timestamp);

    echo date('r', $allowable_start_date);

    ?>

    <p style="color:blue ">Current date </p>
    <?php
    //current date 
    echo date('r', time());
    ?>

    <br>

    <p style="color:blue ">Next date </p>
    <?php
    // next date
    $current_timestamp = time();
    $allowable_start_date = strtotime('tomorrow', $current_timestamp);

    echo date('r', $allowable_start_date);

    ?>

</body>

</html>