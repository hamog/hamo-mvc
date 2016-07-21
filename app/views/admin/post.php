<?php 
    $session = Loader::load('Session');

    if(isset($errors)){
        Base::errors($errors);
    }

    $insert =$session->get('insert_post');
    if($insert === true){
        Base::success('مطلب با موفقیت در بانک اطلاعاتی ذخیره شد و بعد از تایید مدیر نمایش داده خواهد شد.');
    } elseif ($insert === '101'){
        Base::error('متاسفانه مطلب مورد نظر ثبت نشد لطفا دوباره تلاش کنید');	
    }
    $session->UnsetSession('insert_post');

    echo '<ul>';
    switch ($session->get('upload_error')) {
        case 101:
                echo '<li style="color:red">اندازه فایل بیش از ۲ مگابایت است</li>';
        break;

        case 102:
                echo '<li style="color:red">آپلود با شکست مواجه شد!</li>';
        break;
        case 103:
                echo '<li style="color:red">آپلودی انجام نشد!</li>';
        break;
        case 104:
                echo '<li style="color:red">فایل انتخاب شده تصویر نیست</li>';
        break;
        case 105:
                echo '<li style="color:red">تصویر موردنظر معتبر نیست</li>';
        break;
        case 106:
                echo '<li style="color:red">مسیر ‍پوشه آپلود روی دیسک وجود ندارد</li>';
        break;
    }
    echo '</ul>';
    $session->UnsetSession('upload_error');
?>
<form action="<?php echo Base::baseUrl(); ?>admin/newPost" method="post" enctype="multipart/form-data">
<table class="table">
    <tr>
        <td>دسته</td>
        <td>
            <select name="cat">
            <?php 
                foreach ($cats as $cat) { 
                    echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
                }
            ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>عنوان</td>
        <td><input type="text" name="title" /></td>
    </tr>
    <tr>
        <td>متن</td>
        <td><textarea name="body" cols="30" rows="10"></textarea></td>
    </tr>
    <tr>
        <td>تصویر</td>
        <td><input type="file" name="image" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" class="btn btn-primary" value="ثبت مطلب جدید" /></td>
    </tr>
</table>
</form>