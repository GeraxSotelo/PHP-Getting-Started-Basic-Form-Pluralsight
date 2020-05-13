<?php
    $name = '';
    $password = '';
    $gender = '';
    $color = '';
    $languages = [];
    $comments = '';
    $tc = '';

    if (isset($_POST['submit'])) {
        // echo htmlspecialchars($_POST['submit'], ENT_QUOTES);
        $ok = true;
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            $ok = false;
        }
        else {
            $name = $_POST['name'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        if (isset($_POST['color'])) {
            $color = $_POST['color'];
        }
        if (!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages']) === 0) {
            $ok = false;
        } else {
            $languages = $_POST['languages'];
        }

        if (isset($_POST['comments'])) {
            $comments = $_POST['comments'];
        }
        if (isset($_POST['tc'])) {
            $tc = $_POST['tc'];
        }

        if ($ok) {
            printf('User nam: %s 
                <br>Password: %s
                <br>Gender: %s
                <br>Color: %s
                <br>Language(s): %s
                <br>Comments: %s
                <br>T&amp;C: %s',
            htmlspecialchars($name, ENT_QUOTES),
            htmlspecialchars($password, ENT_QUOTES),
            htmlspecialchars($gender, ENT_QUOTES),
            htmlspecialchars($color, ENT_QUOTES),
            htmlspecialchars(implode(' ', $languages), ENT_QUOTES),
            htmlspecialchars($comments, ENT_QUOTES),
            htmlspecialchars($tc, ENT_QUOTES),
        
            );
        }
    }
?>

<form action="" method="post">
    User Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>"><br>
    Password: <input type="password" name="password"><br>
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
    Languages Spoken:
        <select name="languages[]" multiple size="3">
            <option value="en"<?php if(in_array('en', $languages)){echo ' selected';} ?>>English</option>
            <option value="sp"<?php if(in_array('sp', $languages)){echo ' selected';} ?>>Spanish</option>
            <option value="it"<?php if(in_array('it', $languages)){echo ' selected';} ?>>Italian</option>
        </select><br>
        Comments: <textarea name="comments"></textarea><br>
        <input type="checkbox" name="tc" value="ok"<?php if ($tc === 'ok') { echo ' checked'; } ?>> I accept the T&amp;C<br>

    <input type="submit" name="submit" value="Register">
</form>