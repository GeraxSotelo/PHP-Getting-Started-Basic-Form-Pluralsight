<?php
    require 'config.inc.php';

    $name = '';
    $gender = '';
    $color = '';

    if (isset($_POST['submit'])) {
        $ok = true;
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            $ok = false;
        }
        else {
            $name = $_POST['name'];
        }
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        if (isset($_POST['color'])) {
            $color = $_POST['color'];
        }

        if ($ok) {
            $db = new mysqli(
                MYSQL_HOST,
                MYSQL_USER,
                MYSQL_PASSWORD,
                MYSQL_DATABASE
            );
            $sql = sprintf(
                "INSERT INTO users (name, gender, color) VALUES ('%s', '%s', '%s')",
                $db->real_escape_string($name),
                $db->real_escape_string($gender),
                $db->real_escape_string($color)
            );
            $db->query($sql);
            echo '<p>User added.</p>';
            $db->close();
        }
    }
?>

<form action="" method="post">
    User Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>"><br>
    Gender:
        <input type="radio" name="gender" value="f"<?php if($gender === 'f'){echo ' checked';} ?>> Female
        <input type="radio" name="gender" value="m"<?php if($gender === 'm'){echo ' checked';} ?>> Male
        <input type="radio" name="gender" value="p"<?php if($gender === 'p'){echo ' checked';} ?>> Prefer not to say<br>
    Favorite color:
        <select name="color">
            <option value="">Please Select</option>
            <option value="red"<?php if($color === 'red'){echo ' selected';} ?>>Red</option>
            <option value="green"<?php if($color === 'green'){echo ' selected';} ?>>Green</option>
            <option value="blue"<?php if($color === 'blue'){echo ' selected';} ?>>Blue</option>
        </select><br>

    <input type="submit" name="submit" value="Register">
</form>