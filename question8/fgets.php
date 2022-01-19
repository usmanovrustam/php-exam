<html>

<head>
    <title>PHP fgets() Example</title>
</head>

<body>
    <form method="POST">
        <input type="submit" name="submit" value="Read File - gets()">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $file = fopen("fgets.txt", "r");

        $readfile = fgets($file);
        echo $readfile;

        fclose($file);
    }
    ?>
</body>