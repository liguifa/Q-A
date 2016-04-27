<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller 
{
	/***************************
	功能：显示首页（logo页）
	参数：无
	返回：/View/Index/index.html视图
	****************************/
    public function index()
    {
        $this->display();
    }
	
	public function Tags()
	{
		
	}
	
	public function AddAsk()
	{
		$title = $_POST["questionMap_title"];
		$tag = $_POST["questionMap_tags"];
		$user = $_POST["questionMap_loginCode"];
		$content = $_POST["questionMap_content"];
	}
}