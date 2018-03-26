<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "admin";
    $password = "m7sekSQfGunC";

    // Create connection
    $conn = new mysqli( $servername, $username, $password );

    // Check connection
    if ( $conn->connect_error ) {
        die( "Connection failed: " . $conn->connect_error );
    }
    echo "Server Connected successfully";

try {
    $conn = new PDO("mysql:host=$servername;dbname=photos_michel_pm",  $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "DB Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    ?>
</body>
</html>