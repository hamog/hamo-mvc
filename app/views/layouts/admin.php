<!DOCTYPE html>
<html>
  <head>
    <title>مدیریت سایت</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo Base::baseUrlCss(); ?>bootstrap.css">
    <link rel="stylesheet" href="<?php echo Base::baseUrlCss(); ?>pagination.css" />
  </head>

  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo Base::baseUrl(); ?>admin"><h3>بخش مدیریت وبسایت</h3></a>
        </div>
        <div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo Base::baseUrl(); ?>admin">مدیریت کاربران</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">مدیریت مطالب <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo Base::baseUrl(); ?>admin/post">درج مطلب جدید</a></li>
                <li><a href="#">مدیریت مطالب قبلی</a></li>
              </ul>
            </li>
            <li><a href="#">مدیریت کامنت ها</a></li>
            <li><a href="#">ویرایش پروفایل</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo Base::baseUrl(); ?>admin/logout"><span class="glyphicon glyphicon-log-in"></span> خروج</a></li>
          </ul>
        </div>
      </div>
    </nav>
  
    <div class="container">
		<?php echo $viewData . PHP_EOL; ?>
		<hr />
		<div class="footer text-center">
				<p>Copy Right 2014 &copy;</p>
				<p>برنامه نویس و توسعه دهنده : هاشم مقدری</p>
		</div>
    </div>
    
    <script src="<?php echo Base::baseUrlJs(); ?>jquery.js"></script>
    <script src="<?php echo Base::baseUrlJs(); ?>bootstrap.min.js"></script>
  </body>
</html>
