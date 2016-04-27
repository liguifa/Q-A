<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller 
{
    /*
    处理用户登录
    */
    public function Login()
    {
        $username = $_POST['userName']; 
        $password = $_POST['userPassword'];
        $user = M('user')->where("email='$username'")->select();
        if($user!=null && $user.length>0)
        {
            if($password == $user[0]["pwd"])
            {
                $res["isLogin"] = 0;
            }
            else
            {
                $res["isLogin"] = -2;
            }
        }
        else
        {
            $res["isLogin"] = -2;
        }
        $this->ajaxReturn($res,'json');
    }
}