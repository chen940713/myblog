<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(!isset($_SESSION['username'])){
    		$this->error('您还没有登入', U("Login/index"), 2);
			die;
    	}
       	$this->display('Index/index');
    }

    public function database(){

        $user = M('users');

        $res = $user->field('id,nickname,status')->where('id<8')->limit('0,3')->order('id desc')->select();

        var_dump($res);
    }
}