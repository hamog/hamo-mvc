<?php 
    if(isset($_GET['error'])){
        echo '<p class="text-error">Invalid username or password!</p>'.PHP_EOL;
    }

    if(isset($errors)){
        Base::errors($errors);
    }
?>
<form action="<?php echo Base::baseUrl(); ?>site/checkUser" method="post">
    <table>
        <tr>
            <td>نام کاربری</td>
            <td><input type="text" name="username" /></td>
        </tr>
        <tr>
            <td>کلمه عبور</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="ورود" /></td>
        </tr>
    </table>
</form>