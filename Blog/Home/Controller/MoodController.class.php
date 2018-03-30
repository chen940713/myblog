<?php
namespace Home\Controller;
use Think\Controller;
class MoodController extends Controller {
	
	public function index()
	{
		$mood = M('moods');
		$data = $mood->order('insert_at desc')->select();
		$this->assign('data',$data);
		
		$this->display('Mood/index');
	}
}