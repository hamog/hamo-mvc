<?php
class AdminController extends Controller
{
    public $layout = 'admin';

    public function __construct()
    {
        $this->model = $this->loadModel('admin'); 
        UserAccess::userController();
    }

    public function actionIndex($errors = array()) 
    {
        $users = $this->model->allUsers();
        $paging = $this->model->output;
        return $this->render('index', array('users'=>$users, 'errors'=>$errors, 'paging'=>$paging));
    }

    public function actionNew()
    {
        $val = Loader::load('GUMP');
        $_POST = $val->sanitize($_POST);

        $rules = array(
            'name'=> 'required',
            'username'=>'required|alpha_dash|min_len,3|max_len,60',
            'password'=> 'required'	
        );
        $filters = array(
            'username'=> 'trim|sanitize_string',
            'password'=> 'trim'	
        );

        $_POST = $val->filter($_POST, $filters);
        $validated = $val->validate($_POST, $rules);
        if($validated === TRUE) {
            $config = Loader::load('Configs');
            $user = $this->model->oneUser($_POST['username']);
            if(!empty($user)){
                $errors = array('این نام کاربری قبلا ثبت نام کرده است');
                return $this->actionIndex($errors);
            }
            $data = array(
                'name'=> $_POST['name'],
                'user'=> $_POST['username'],
                'pass'=> Hash::create('MD5', $_POST['password'], $config->key)
            );

            $result =$this->model->createUser($data);
            if($result){
                Session::init();
                Session::set('success', true);
                return Base::redirect('admin');
            }
        } else {
            $val->set_field_name('name','نام');
            $val->set_field_name('username','نام کاربری');
            $val->set_field_name('password','کلمه عبور');

            $errors = $val->get_readable_errors();
            return $this->actionIndex($errors);
        }
    }

    public function actionDelete($params)
    {
        $id = intval($params['id']);
        $this->model->deleteUser($id);
        return Base::redirect('user');
    }

    public function actionEditForm($params, $errors= array())
    {
        $id = intval($params['id']);
        $user = $this->model->fetchUser($id);
        return $this->render('_form', array('user'=>$user, 'errors'=>$errors));
    }

    public function actionEdit($params)
    {
        if(!Base::captchaCheck($_POST['captcha'])){
            $errors = array('تصویر امنیتی را اشتباه وارد کرده اید');
            return $this->actionEditForm($params, $errors);
        }
        if(isset($_POST['password'])){
            if($_POST['password'] != $_POST['confirm_password']){
                $errors = array('تکرار کلمه عبور با کلمه عبور جدید یکسان نیست!');
                return $this->actionEditForm($params, $errors);
            }
        }
        $id = intval($params['id']);
        $this->model->editUser($id);
        return $this->actionIndex();
    }

    public function actionLogout()
    {
        $session = Loader::load('Session');
        $session->destroy();
        return Base::redirect('site/login');
    }

    public function actionPost($errors= array())
    {
        $cats= $this->model->fetchAllCats();
        return $this->render('post', array('cats'=> $cats, 'errors'=>$errors));
    }

    public function actionNewPost()
    {
        $session = Loader::load('Session');
        $val = new GUMP();
        $_POST = $val->sanitize($_POST);

        $val->validation_rules(array(
            'cat' => 'required|numeric',
            'title'  => 'required',
            'body'   => 'required|max_len,1000|min_len,10',
        ));

        $validated_data = $val->run($_POST);
        if($validated_data === false) {
            $val->set_field_name('cat', 'دسته');
            $val->set_field_name('title', 'عنوان');
            $val->set_field_name('body', 'متن');
            $errors= $val->get_readable_errors();
            $this->actionPost($errors);
            exit;

        } else {
            $result= $this->model->imageUpload();
            $errors = array(101, 102, 103, 104, 105, 106);
            if(in_array($result, $errors)){
                $session->set('upload_error', $result);
                Base::redirect('admin/post');
            }
            $data = array(
                'user_id' => $session->get('user_id'),
                'cat_id'=> $_POST['cat'],
                'title'=> $_POST['title'],
                'body'=> $_POST['body'],
                'pic'=> $result,
                'ts'=> time()
            );
            if($this->model->insertPost($data)){
                $session->set('insert_post', true);
                Base::redirect('admin/post');
            } else {
                $session->set('insert_post', '101');
                Base::redirect('admin/post');
            }
        }
    }
}