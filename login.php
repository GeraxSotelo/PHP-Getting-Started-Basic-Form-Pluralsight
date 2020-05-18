<?php
require 'config.inc.php';

session_start();

$message = '';

if (isset($_POST['name']) && isset($_POST['password'])) {
    $db = new mysqli(
        MYSQL_HOST,
        MYSQL_USER,
        MYSQL_PASSWORD,
        MYSQL_DATABASE
    );

    $sql = sprintf("SELECT * FROM users WHERE name='%s'", $db->real_escape_string($_POST['name']));

    $result = $db->query($sql);

    //fetch_object() returns back the current row in the result set in form of an object. The db columns will be properties of that object.
    $row = $result->fetch_object();

    if($row != null) {
        $hash = $row->hash; //get value of hash property
        if (password_verify($_POST['password'], $hash)) {
            $message = "Login successful";

            $_SESSION['username'] = $row->name;
            $_SESSION['isAdmin'] = $row->isAdmin;
        } else {
            $message = "Login failed";
        }
    } else {
        $message = "Login failed";
    }

    $db->close();
}
?>

<?php
echo "<div><p>$message</p></div>";
?>

<form method="post">
    <div>
        <label for="name">User name</label> <input type="text" name="name">
    </div>
    <div>
        <label for="password"></label> <input type="password" name="password">
    </div>
    <input type="submit" value="Login">
</form>