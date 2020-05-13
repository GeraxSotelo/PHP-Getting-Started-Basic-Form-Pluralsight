<?php

if(isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
} else {
    //Redirect. Tell PHP to send a HTTP header
    header('Location: select.php');
}

$db = new mysqli(
    'localhost',
    'testuser',
    'password',
    'php'
);

//Within double quotes, PHP replaces variables with their values.
$sql = "DELETE FROM users WHERE id=$id";
$db->query($sql);
echo '<p>User deleted.</p>';
$db->close();

?>