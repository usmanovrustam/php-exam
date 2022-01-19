<html>

<head>
    <title>PHP fgetc() Example</title>
</head>

<body>
    <FORM method="POST">
        <input type="submit" name="submit" value="Read File - getc()">
    </FORM>
    <?php

    if (isset($_POST['submit'])) {
        $file = fopen("fgetc.txt", "r");

        $readfile = fgetc($file);
        echo $readfile;

        fclose($file);
    }
    ?>