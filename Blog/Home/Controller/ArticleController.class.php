<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
	
	/*
	 * 文章列表页初始化数据
	 */
    public function index()
	{
		$type = $_GET['t'] ?? 'news';
        $curPage = $_GET['page'] ?? 1;

        $url = "&t={$type}&page={$curPage}";

        $orderby = $type == 'news'? 'insert_at' : 'click_num';

		$article = M('article');

        $count = $article->query("select count(*) count from article")[0]['count'];

        $pageSize = 15;							//分页 条数
        $maxPage = ceil($count / $pageSize);	//总页数
        $limit = ($curPage-1)*$pageSize;		//分页 偏移量
        $articleList = $article->query("select * from article order by {$orderby} desc limit {$limit},{$pageSize}");
		
		$reply = M('reply');
		$res = $reply->query("select COUNT(r.id) count,r.aid,a.title from reply r,article a WHERE r.aid = a.id GROUP BY r.aid ORDER BY count desc");
		$this->assign('hotList', $res);
		$this->assign('reply', $reply);
		
		$clickList = $article->order('click_num desc')->limit('0,10')->select();
        $this->assign('hot',$clickList);
		
		$user = M('users');
        $userList = $user->query("select * from users order by last_login desc limit 0,8");
        $this->assign('users',$userList);

		$this->assign('article',$articleList);
        $this->assign('ac',$type);
        $this->assign('total',$maxPage);
        $this->assign('page',$curPage);
        $this->assign('url', $url);

		$this->display('Article/index');
	}
	
	/*
	 * 文章详情页初始化数据
	 */
	public function detail()
	{
		$id = $_GET['id'];
		$article = M('article');
		$data = $article->find($id);
		
		//添加点击量
		$tmp['click_num'] = $data['click_num'] + 1;
		$data['click_num'] += 1;
		$tmp['id'] = $id;
		$article->save($tmp);
		
		$this->assign('data',$data);

		$reply = M('reply');
		$replyList = $reply->query("select r.*, u.nickname, u.avatar from reply r,users u where r.uid = u.id and r.aid = {$id} order by r.reply_at DESC");
		$this->assign('replys', $replyList);
		
		$reply = M('reply');
		$res = $reply->query("select COUNT(r.id) count,r.aid,a.title from reply r,article a WHERE r.aid = a.id GROUP BY r.aid ORDER BY count desc");
		$this->assign('hotList', $res);
		$this->assign('reply', $reply);
		
		$clickList = $article->order('click_num desc')->limit('0,10')->select();
        $this->assign('hot',$clickList);
		
		$user = M('users');
        $userList = $user->query("select * from users order by last_login desc limit 0,8");
        $this->assign('users',$userList);

		$this->display('Article/detail');
	}
	
	/*
	 * 文章详情页内的回复
	 */
	public function reply()
	{
	    if(session('userid')== null && session('username')== null){
	    	$this->error('抱歉，您还未登入！去登入', U('User/login?back='.$_POST['aid']),2);
	        die;
        }
	    date_default_timezone_set('PRC');
		$_POST['reply_at'] = date('Y-m-d H:i:s');

		$reply = M('reply');
		if($reply->add($_POST)){
            $this->success('回复成功', $_SERVER['HTTP_REFERER'],2);
        }else{
            $this->error('回复失败', $_SERVER['HTTP_REFERER'],2);
        }
	}
	
}