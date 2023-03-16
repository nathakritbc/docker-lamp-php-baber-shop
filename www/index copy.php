<html>

<head>
    <title>Hello...</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <?php echo "<h1>Hi! I'm happy</h1>"; ?>

        <?php

// Connexion et sélection de la base
        $conn = mysqli_connect('db', 'root', '12345678', "myDb");

        $query = 'SELECT * From Person';
        $result = mysqli_query($conn, $query);
        $query1 = 'SELECT * From users';
        $result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) > 0) {

    while ($row = mysqli_fetch_assoc($result1)) {?>

        <li>id : <?=$row["id"]?> :: name = <?=$row["name"]?>
        </li>

        <?php
}
}
?>
        </ul>


        <?php

mysqli_close($conn);

?>

    </div>
</body>

</html>