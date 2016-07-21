<div id="time" data-href="<?php echo Base::baseUrl(); ?>site/time">&nbsp;</div>
<table class="table">
<?php 
    foreach ($posts as $post){
        echo '<tr class="bg-info">';
        echo '<td><h4>'.$post['title'].'</h4></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td><img class="img-thumbnail" style="padding:10px" src="'.$post['pic'].'" width="150px" height="150px" />'.$post['body'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td><b>تاریخ ثبت : '.jDateTime::date('Y/m/d ساعت H:i', $post['ts']).'</b></td>';
        echo '</tr>';
    }
?>
</table>
<h1>فرم ورود کاربر</h1>
<?php 
    $this->renderPartial('_login');
?>