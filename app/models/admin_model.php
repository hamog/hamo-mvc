<?php
class admin_model extends Model 
{
    public $output;

    public function fetchAllCats() 
    {
        return $this->db->Select("SELECT * FROM `categories` WHERE `visible`='1'");
    }

    public function allUsers()
    {
        $paging = new Pagination(
            array(
                'items_per_page' => 5,   // Records per page to display
                'total_records' => $this->db->TotalRows('users'),
                'url_address' => Base::baseUrl().'admin/?page=',
                'current_page' => (isset($_GET['page']) ? $_GET['page'] : 1)
            )
        );
        $section = $paging->limit();
        $start = $section['start'];
        $limit = $section['limit'];

        $users = $this->db->Select("SELECT * FROM `users` LIMIT {$start}, {$limit}");
        $this->output = $paging->display();
        return $users;
    }

    public function oneUser($userName)
    {
        return $this->db->Select("SELECT `user` FROM `users` WHERE `user`='$userName'");
    }

    public function fetchUser($id)
    {
        return $this->db->Select("SELECT * FROM `users` WHERE `id`='$id'");
    }

    public function createUser($data)
    {
        return $this->db->Insert('users', $data);
    }

    public function deleteUser($id)
    {
        return $this->db->Delete('users', "`id`=$id");
    }

    public function editUser($id)
    {

        $config = Loader::load('Configs');
        if(!empty($_POST['password'])){
            $data = array(
                'name'=> $_POST['name'],
                'user'=>$_POST['username'],
                'pass'=> Hash::create('MD5', $_POST['password'], $config->key)
            );
        } else {
            $data = array(
                'name'=> $_POST['name'],
                'user'=>$_POST['username']
            );
        }
        return $this->db->Update('users', $data, "`id`='$id'");

    }

    public function loginUser($data)
    {
        $username = $data['username'];
        $password = Hash::create('MD5', $data['password'],Loader::load('Configs')->key);
        return $this->db->Select("SELECT * FROM `users` WHERE `user`='$username' AND `pass`='$password'");
    }

    public function imageUpload()
    {
        $img = new ImgUploader($_FILES['image']);
        $f = '/public/images/post_imgs/';
        $name = $_FILES['image']['name'].time();
        $url =$img->upload_unscaled($f, $name);
        if($url){
            return ltrim($url, '/');
        } else {
            return $img->getError();
        }
    }

    public function insertPost($data)
    {
        return $this->db->Insert('posts', $data);
    }
}