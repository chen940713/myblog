<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
use Think\Image;
use Think\Page;
class ArticleController extends Controller {
    public function index(){
        $pageSize = 8;      // 分页显示条数

        $article = M('article');
		
		$count = $article->count();
		$data = $article->limit('0,'.$pageSize)->select();
				
		$total = ceil($count/$pageSize);
        if(!$data) $data = [];		//如果查询结果没有数据，定义为空数组

        $this->assign('data',$data);
        $this->assign('total',$total);
		
        $this->display("Article/index");
    }

	public function ajax(){
		$curPage = I('get.p', 1);   // 获得当前页
        $pageSize = 8;      // 分页显示条数
        
        $article = M("article");
		$data = $article->page($curPage.",".$pageSize)->select();

		$arr['data'] = $data;
		$this->ajaxReturn($data,'json');
	}

    /*
     *  删除信息
     */
    public function del(){

        //获取要删除信息的 id
        $id = I('get.id');

        $article = M("article");

        $res = $article->delete($id);

        if($res){
            $this->ajaxReturn('success');
        }else{
            $this->ajaxReturn('error');
        }
    }

    public function insert(){
		date_default_timezone_set('PRC');
		$time = date("Y-m-d H:i:s", time());
		$_POST['insert_at'] = $time;
		
		$article = M("article");
		
		if($article->add($_POST)){
            $this->ajaxReturn('success');
        }else{
            $this->ajaxReturn('error');
        }
    }

    public function update(){
    	
		$article = M("article");
		
		$res = $article->save($_POST);
		
		if($res){
            $this->ajaxReturn('success');
        }else{
            $this->ajaxReturn('error');
        }
    }
	
	public function add(){
		$this->display('Article/add');
	}
	public function edit(){
		$id = I('get.id');
		
		$article = M("article");
		
		$data = $article->find($id);
		
		$this->assign('data', $data);
		$this->assign('id', $id);
		
		$this->display('Article/edit');
	}
}