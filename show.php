<?php
//connection to the backend (host,name,password,dbname)
$connection = new mysqli("localhost", "root", "", "cma01");
//when connection is not okk.
if (!$connection) {
    die("connection failed" . $connection->connect_error);
}
?>
<?php
//query from database
$query = "SELECT * FROM first ";
$give_data = mysqli_query($connection, $query);
$count = mysqli_num_rows($give_data);
if ($count > 0) {
?>
<table>
    <thead class="table">
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>password</th>
            <th>email</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php
        //loop is use for print array. 
        while ($row = mysqli_fetch_assoc($give_data)) {
            //print all // echo" <pre>";
            // print_r("$row");
            // echo" <pre>";
            // $new_id = $row["id"];
            // echo "$new_id";
            // echo "<br>";
            // $new_email = $row['email'];
            // echo "$new_email";
            // echo "<br>";
            // $new_password = $row["password"];
            // echo "$new_password";
            // echo "<br>";
            $new_id = $row['id'];
            $new_name = $row['username'];
            $new_password = $row['password'];
            $new_email = $row['email'];

        ?>
    <tbody>
        <tr>
            <td><?php echo "$new_id"; ?></td>
            <td><?php echo "$new_name"; ?></td>
            <td><?php echo "$new_password" ?></td>
            <td><?php echo "$new_email" ?></td>
            <td><a href="delete.php?id=<?php echo $new_id ?>">Delete</a></td>
        </tr>
    </tbody>
    <?php } ?>
</table>
<?php } else {
    echo "No data no the database!.";
}
?>