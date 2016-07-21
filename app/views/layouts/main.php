<?php $config = Loader::load('Configs'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo $config->title; ?></title>
	<link rel="stylesheet" href="<?php echo Base::baseUrlCss(); ?>bootstrap-responsive.css" />
	<link rel="stylesheet" href="<?php echo Base::baseUrlCss(); ?>custom.css" />
	<link rel="stylesheet" href="<?php echo Base::baseUrlCss(); ?>pagination.css" />
	<link rel="stylesheet" href="<?php echo Base::baseUrlCss(); ?>js-image-slider.css" />
</head>
<body>
<div class="container">
	<h1><a href="<?php echo Base::baseUrl(); ?>"><?php echo $config->title; ?></a></h1>
	<div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li class="active"><a href="<?php echo Base::baseUrl(); ?>">صفحه اصلی</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-th-large"></i> دسته بندی <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">آموزش HTML</a></li>
                                    <li><a href="#">آموزش CSS</a></li>
                                    <li><a href="#">آموزش jQuery</a></li>
                                    <li><a href="#">آموزش PHP</a></li>
                                    <li><a href="#">آموزش MySQL</a></li>
                                </ul>
                            </li>
                            <li><a href="#">مقالات</a></li>
                            <li><a href="#">اخبار</a></li>
                            <li><a href="<?php echo Base::baseUrl(); ?>site/about">درباره ما</a></li>
                            <li><a href="<?php echo Base::baseUrl(); ?>site/contact">تماس با ما</a></li>
                        </ul>
                    </div><!-- End of Div.container in navbar-inner Division -->
                </div><!-- End of navbar-inner Division -->
            </div><!-- End of navbar Division -->
            <?php if($_SERVER['REQUEST_URI'] == '/hamo/'){ ?>
            <div id="myCarousel" class="carousel slide">
			    <ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
				    <li data-target="#myCarousel" data-slide-to="3"></li>
				    <li data-target="#myCarousel" data-slide-to="4"></li>
			    </ol>
			    <!-- Carousel items -->
			    <div class="carousel-inner">
				    <div class="active item"><img src="<?= Base::baseUrlImgs(); ?>slider/image-slider-1.jpg" width="100%" /></div>
				    <div class="item"><img src="<?= Base::baseUrlImgs(); ?>slider/image-slider-2.jpg" width="100%" /></div>
				    <div class="item"><img src="<?= Base::baseUrlImgs(); ?>slider/image-slider-3.jpg" width="100%" /></div>
			    	<div class="item"><img src="<?= Base::baseUrlImgs(); ?>slider/image-slider-4.jpg" width="100%" /></div>
			    	<div class="item"><img src="<?= Base::baseUrlImgs(); ?>slider/image-slider-5.jpg" width="100%" /></div>
			    </div>
			    <!-- Carousel nav -->
			    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		    </div>
            <?php } ?>
            <div class="row">
                <div class="span4">
                    <ul class="nav nav-list">

                        <li class="nav-header">دسترسی های سریع</li>

                        <li class="active"><a href="<?php echo Base::baseUrl(); ?>">صفحه اصلی</a></li>

                        <li><a href="#">دسته بندی</a></li>

                        <li><a href="#">خدمات ما</a></li>

                        <li><a href="<?php echo Base::baseUrl(); ?>site/about">درباره ما</a></li>

                        <li><a href="<?php echo Base::baseUrl(); ?>site/contact">تماس با ما</a></li>
                        <li><a href="<?php echo Base::baseUrl(); ?>site/login">ورود اعضاء</a></li>

                        <li class="nav-header">دوستان ما</li>

                        <li><a href="http://barnamenevis.org/">انجمن برنامه نویس</a></li>

                        <li><a href="http://i-nahad.ir/">ایران نهاد</a></li>

                        <li><a href="http://laitec.ir/">لایتک</a></li>

                        <li><a href="http://www.beyamooz.com/">بیاموز</a></li>

                    </ul>
                </div>
                <!-- Content -->		
				<!-- Content of per pages -->
                <div class="span8" id="content">
                	<?php echo $viewData . PHP_EOL; ?>
                </div>
                <!-- End of content -->
		</div><!-- End of Row 1 -->
	<hr />
		<div class="container-fluid">
	<div class="row" style="height: 200px">
		<div class="span4">
			<h4 class="muted text-center">درباره ما</h4>

		    <p>این پروژه را برای پایان نامه کارشناسی موسسه آموزش عالی میرداماد گرگان در دی ماه 1393 انجام دادم و استاد راهنمای پروژه جناب مهندس یعقوبی می باشد.
		    در این پروژه یک فریم ورک PHP را با الگوی طراحی MVC و کاملا شی گرا پیاده سازی کردم. این فریم ورک کاملا سریع و بهینه می باشد و از جدیدترین تکنیک های وب در ان استفاده کرده ام. </p>

		    <a href="#" class="btn"><i class="icon-user"></i> بیشتر ...</a>
		</div>
		<div class="span4">
			<h4 class="muted text-center">خدمات شرکت ما</h4>

		    <p>آموزش طراحی وب با زبان برنامه نویسی PHP و پایگاه داده MySQL از تخصص اینجانب می باشد. همچنین در سمت کلاینت هم با CSS و HTML و jQuery آشنا خواهیم شد. در نهایت هم در مورد AJAX هم آموزش های کاربردی خواهیم داشت. امیدوارم که این سایت در یادگیری شما مفید واقع گردد. در صورت سوال دکمه پرسش را فشار دهید.</p>
			<br />
		    <a href="#" class="btn btn-success"><i class="icon-star icon-white"></i> پرسش از ما</a>
		</div>
		<div class="span3">
			<h4 class="muted text-center">تماس با ما</h4>

		    <p>همچنین شما می توانید با ایمیل  یا شماره تلفنم با من در تماس باشید.
		    <br>ایمیل : <span>hashemm364@yahoo.com</span>
		    <br>تلفن : 09112702509
		    </p>
			<br /><br />
		    <a href="#" class="btn btn-info">Contact Us</a>
		</div>
	</div>	
	</div>
		<hr />
	<div class="footer" style="text-align:center">
			<p>CopyRight &#169; 2014<br />طراحی و برنامه نویسی : هاشم مقدری</p>
			<p>تمامی این حقوق این وبسایت محفوظ می باشد.</p>
	</div>
	</div><!-- End of Footer Row2 -->
	<hr />

</div><!-- End of Container Division -->

<!-- Load java scripts file -->
<script src="<?php echo Base::baseUrlJs(); ?>jquery.js" type="text/javascript"></script>
<script src="<?php echo Base::baseUrlJs(); ?>bootstrap.js" type="text/javascript"></script>
<script src="<?php echo Base::baseUrlJs(); ?>js-image-slider.js" type="text/javascript"></script>
<?php 
	if(isset($js)){
		echo '<script src="'.Base::baseUrlJs().$js.'" type="text/javascript"></script>'.PHP_EOL;
	}
?>
<!-- End javascrpts -->
</body>
</html>