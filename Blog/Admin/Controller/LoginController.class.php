<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
       	$this->display('Login/index');
    }

    public function login(){
		$admin = M('admin');
		$username = I("post.username");

		$res = $admin->where("username = '{$username}'")->select();
		if($res && $res[0]['password'] == $_POST['password']){

			// session中添加登入用户信息
			session('username', $_POST['username']);
			$this->success('登入成功', U('Index/index'), 2);
		}else{
			$this->error('登入失败', I('server.HTTP_REFERER'), 2);
		}
    }
	
	public function logout(){
		
		session('username', null);
		$this->success('退出成功', U('Login/index'), 2);
		
	}
}