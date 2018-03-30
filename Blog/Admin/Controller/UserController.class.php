<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
use Think\Page;
class UserController extends Controller {
    public function index(){
        $pageSize = 5;      // 分页显示条数
        // 查询条件数组
        $map = array();
		$txt = '';
        if(isset($_GET['nickname']) && $_GET['nickname'] != ''){
            $map['nickname'] = array('like',"%{$_GET['nickname']}%");
			$txt .= "&nickname=".$_GET['nickname'];
        }
        if(isset($_GET['phone']) && $_GET['phone'] != ''){
            $map['phone'] = array('like',"%{$_GET['phone']}%");
			$txt .= "&phone=".$_GET['phone'];
        }
        if(isset($_GET['status']) && $_GET['status'] != ''){
            $map['status'] = $_GET['status'];
			$txt .= "&status=".$_GET['status'];
        }

        $users = M('users');

        if(count($map) > 0){
            // 有查询条件
            // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
            $data = $users->where($map)->page('0,'.$pageSize)->select();
            $count = $users->where($map)->count();// 查询满足要求的总记录数
        }else{
            $data = $users->page('0,'.$pageSize)->select();
            $count = $users->count();// 查询满足要求的总记录数
        }
		
		$total = ceil($count/$pageSize);
        if(!$data) $data = [];		//如果查询结果没有数据，定义为空数组

        $status = [1=>'开启',2=>'锁定'];

        $this->assign('data',$data);
        $this->assign('status',$status);
        $this->assign('total',$total);
        $this->assign('txt',$txt);
		
        $this->display("User/index");
    }

	public function ajax(){
		$curPage = I('get.p', 1);   // 获得当前页
        $pageSize = 5;      // 分页显示条数

        // 查询条件数组
        $map = array();
        if(isset($_GET['nickname']) && $_GET['nickname'] != ''){
            $map['nickname'] = array('like',"%{$_GET['nickname']}%");
			$arr['map']['nickname'] = $_GET['nickname'];
        }
        if(isset($_GET['phone']) && $_GET['phone'] != ''){
            $map['phone'] = array('like',"%{$_GET['phone']}%");
			$arr['map']['phone'] = $_GET['phone'];
        }
        if(isset($_GET['status']) && $_GET['status'] != ''){
            $map['status'] = $_GET['status'];
			$arr['map']['status'] = $_GET['status'];
        }

        $users = M('users');

        if(count($map) > 0){
            // 有查询条件
            // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
            $data = $users->where($map)->page($curPage.','.$pageSize)->select();
            $count = $users->where($map)->count();// 查询满足要求的总记录数
        }else{
            $data = $users->page($curPage.','.$pageSize)->select();
            $count = $users->count();// 查询满足要求的总记录数
        }
		
		$arr['data'] = $data;
		$this->ajaxReturn($arr,'json');
	}

    /*
     *  删除信息
     */
    public function del(){

        //获取要删除信息的 id
        $id = I('get.id');

        $user = M('users');

        $res = $user->delete($id);

        if($res){
            $this->ajaxReturn('success');
        }else{
            $this->ajaxReturn('error');
        }
    }

    /*
     *  修改status状态
     */
    public function change()
    {
        $id = I('get.id');
        $users = M('users');

        $info = $users->find($id);

        if($info['status'] == 1){
            $info['status'] = 2;
        }else{
            $info['status'] = 1;
        }
        if($users->save($info)){
            $this->ajaxReturn('success');
        }else{
            $this->ajaxReturn('error');
        }
    }

    public function insert(){
        /*
         *  上传头像
         */
        $upload = new Upload();
        $upload->maxSize = 3175428;
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->rootPath = $dir_path =  './Public/Admin/images/';
        $upload->autoSub = false;

        $info = $upload->upload();
        if(!$info){
            $this->error($upload->getError(), U('User/add'), 2);
            die;
        }
        //对图像进行缩放
        $img = new Image();
        $filename = $info['avatar']['savename'];
        $img->open($dir_path.$filename);
        $img->thumb(65,65)->save($dir_path.'s_'.$filename);
        unlink($dir_path.$filename);      //删除原图

        $_POST['avatar'] = 's_'.$filename;
		unset($_POST['checkpass']);
		date_default_timezone_set('PRC');
		$time = date("Y-m-d H:i:s", time());
		$_POST['register_at'] = $time;
		$_POST['password'] = md5($_POST['password']);
		
		$user = M('users');
		if($user->add($_POST)){
            $this->success('添加成功！', I('server.HTTP_REFERER'), 2);
        }else{
            $this->error('添加失败！', I('server.HTTP_REFERER'), 2);
        }
    }

    public function update(){

        $id = I('get.id');

        $user = M("users");

        //是否修改了 图片
        if($_FILES['picture']['error'] == 4){
            // 没有修改图片
            $res = $user->where('id='.$id)->save($_POST);
            if($res){
                $this->success('修改成功！', I('server.HTTP_REFERER'), 2);
            }else{
                $this->error('修改失败！', I('server.HTTP_REFERER'), 2);
            }
        }else{
            // 修改了图片

            // 获取图片原名
            $oldPic = $user->field('picture')->find($id)['picture'];

            // 删除原图像
            unlink("./Public/Admin/images/s_".$oldPic);
        }
    }
	
	public function add(){
		$this->display('User/add');
	}
}