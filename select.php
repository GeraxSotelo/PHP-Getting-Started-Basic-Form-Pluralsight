<ul>
<?php

$db = new mysqli(
    'localhost',
    'testuser',
    'password',
    'php'
);

$sql = 'SELECT * FROM users';
$result = $db->query($sql);

foreach ($result as $row) {
    printf(
        '<li>%s (%s) <a href="update.php?id=%s">Update</a> <a href="delete.php?id=%s">Delete</a></li>',
        htmlspecialchars($row['name'], ENT_QUOTES),
        htmlspecialchars($row['gender'], ENT_QUOTES),
        htmlspecialchars($row['id'], ENT_QUOTES),
        htmlspecialchars($row['id'], ENT_QUOTES)
    );
}

$db->close();

?>
</ul>