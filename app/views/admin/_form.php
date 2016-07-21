<?php 
    if(isset($errors)){
        Base::errors($errors);
    }
?>
<h3>ویرایش کاربر</h3>
<form action="<?php echo Base::baseUrl(); ?>admin/edit/id/<?php echo $user[0]['id']; ?>" method="post">
    <table>
        <tr>
            <td>نام :</td>
            <td><input type="text" name="name" value="<?php echo $user[0]['name']; ?>" /></td>
        </tr>
        <tr>
            <td>نام کاربری :</td>
            <td><input type="text"  name="username" value="<?php echo $user[0]['user']; ?>" /></td>
        </tr>
        <tr>
            <td>کلمه عبور :</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td>تکرار کلمه عبور :</td>
            <td><input type="password" name="confirm_password" /></td>
        </tr>
        <tr>
            <td>کد امنیتی را وارد کنید</td>
            <td><input type="text" name="captcha" required /></td>
        </tr>
        <tr>
            <td>تصویر امنیتی</td>
            <td><?php echo Base::captcha(); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="btn btn-primary" type="submit" value="ویرایش کاربر" /></td>
        </tr>
    </table>
</form>
