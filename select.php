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
        '<li>%s (%s)</li>',
        htmlspecialchars($row['name'], ENT_QUOTES),
        htmlspecialchars($row['gender'], ENT_QUOTES)
    );
}

$db->close();

?>
</ul>