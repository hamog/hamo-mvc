<?php 
    $session = Loader::load('Session');
?>
<h3>سلام <b class="text-success"><?php echo $session->get('name'); ?></b> خوش آمدید</h3>
<?php 
    if(isset($errors)){
        Base::errors($errors);
    } 
    if($session->get('success') == true){
        Base::success('کاربر با موفقیت ثبت شد.');
        $session->UnsetSession('success');
    }
?>
<form action="<?php echo Base::baseUrl(); ?>admin/new" method="post">
    <table>
        <tr>
            <td>نام :</td>
            <td><input type="text" name="name" /></td>
        </tr>
        <tr>
            <td>نام کاربری :</td>
            <td><input type="text" name="username" /></td>
        </tr>
        <tr>
            <td>کلمه عبور : </td>
            <td><input type="text" name="password" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="ثبت کاربر جدید" /></td>
        </tr>
    </table>
</form>
<h3>همه کاربران ثبت شده</h3>
<?php
	$config = Loader::load('Configs'); 
	echo '<ul>'.PHP_EOL;
	foreach ($users as $user){
		echo '<li>شناسه کاربر : '.$user['id'].'</li>'.PHP_EOL;
		echo '<li>نام : '.$user['name'].'</li>'.PHP_EOL;
		echo '<li>نام کاربری : '.$user['user'].'</li>'.PHP_EOL;
		echo '<li>کلمه عبور : '.$user['pass'].'</li>'.PHP_EOL;
		echo '<a class="btn btn-danger" href="'.$config->baseUrl.'admin/delete/id/'.$user['id'].'" onclick="return confirm(\'آیا اطمینان دارید که می خواهید این کاربر را حذف کنید؟\');">حذف کاربر</a>&nbsp;&nbsp;&nbsp;';
		echo '<a class="btn btn-warning" href="'.$config->baseUrl.'admin/editForm/id/'.$user['id'].'">ویرایش کاربر</a>';
		echo '<hr />'.PHP_EOL;
	}
	echo '</ul>'.PHP_EOL;
	echo '<div class="pagination">'.PHP_EOL;
	echo $paging.PHP_EOL;
	echo '</div>'.PHP_EOL;
	
	//Session regenerate id
	$session->sessionRegID();
?>

