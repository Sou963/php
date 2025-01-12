<?php
//check submit button
if (isset($_POST['submit'])) {
    //save the value in php variable
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    if ($username && $password && $email) {
        //server name ,host name,password,dbname
        $connection = new mysqli('localhost', 'root', '', 'cma01');
        //if connection is okk then do not give any massage.
        //is not okk then go to die method
        if (!$connection) {
            die("Connection failed: " . $connection->connect_error);
        }
        //get the query into database.
        $query = "INSERT INTO first (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($connection, $query);
        //it go to the database then print connected. or not print not connected.
        if ($result) {
            echo "connected";
        } else {
            echo "not_connected: " . $connection->error;
        }
    } else {
        echo "Please fill up the from" . $connection->error;
    }

    $connection->close();
}
?>
<!-- from -->
<h1>Mysql connection</h1>
<form action="login.php" method="post">
    <input type="text" name="username" placeholder="username" required>
    <input type="email" name="email" placeholder="email" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="submit" name="submit">
</form>