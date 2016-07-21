<?php
class SiteController extends Controller 
{
		
    public function actionIndex()
    {
        $js= 'time.js';
        $posts = $this->loadModel('site')->fetchAllPosts();
        return $this->render('index', array(
            'js'=>$js,
            'posts'=>$posts
        ));
    }

    public function actionTime() 
    {
        $date = new jDateTime(true, true, 'Asia/Tehran');
        $this->renderText('<p class="text-info" style="padding:5px;">'.$date->date('l j F Y H:i:s').'</p>');
    }

    public function actionLogin($errors = array()) 
    {
        return $this->render('_login', array('errors'=> $errors));
    }

    public function actionCheckUser()
    {
        $val = Loader::load('GUMP');
        $data= $val->sanitize($_POST);
        $rules = array(
            'username'=> 'required|alpha_dash|min_len,3|max_len,60',
            'password'=> 'required|min_len,3|max_len,20'
        );
        $val->set_field_name('username', 'نام کاربری');
        $val->set_field_name('password', 'کلمه عبور');
        $validated = $val->validate($data, $rules);
        if($validated === true){
            $user = $this->loadModel('admin');
            $check = $user->loginUser($data);
            if(!empty($check)){
                $session = Loader::load('Session');
                $session->set('loggedIn', true);
                $session->set('name', $check[0]['name']);
                $session->set('user_id', $check[0]['id']);
                return Base::redirect('admin/index');
            } else {
                return Base::redirect('site/login/?error=invalid');
            }

        } else {
            $errors = $val->get_readable_errors();
            return $this->actionLogin($errors);
        }

    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }
	
}