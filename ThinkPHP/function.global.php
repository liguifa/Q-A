<?php
import("BLL.UserBLL","Application/Lib");
import("BLL.NewsBLL","Application/Lib");
import("BLL.BlogThemeBLL","Application/Lib");
import("BLL.AdminBLL","Application/Lib");
import("BLL.TechnologyBLL","Application/Lib");
import("BLL.PostBLL","Application/Lib");
import("BLL.StudyBLL","Application/Lib");
import("BLL.ProjectBLL","Application/Lib");
import("DAL.BaseDAL","Application/Lib");
import("DAL.AdminDAL","Application/Lib");
import("DAL.UserDAL","Application/Lib");
import("DAL.NewsDAL","Application/Lib");
import("DAL.TechnologyDAL","Application/Lib");
import("DAL.PostDAL","Application/Lib");
import("DAL.StudyDAL","Application/Lib");
import("DAL.ProjectDAL","Application/Lib");
import("Common.StatusAttribute","Application/Lib");
import("Common.VerCode","Application/Lib");
import("Common.UpdataFile","Application/Lib");
import("Common.CheckData","Application/Lib");
import("Common.email","Application/Lib");
import("Common.SystemInfo","Application/Lib");
import("Common.StatusAttribute","Application/Lib");
import("Common.CheckData","Application/Lib");
if(!isset($_COOKIE['userdata'])&&$_SERVER['PHP_SELF']!="/index.php")
{
    header("Location: /");
}
/*echo $_SESSION["admin"];die;*/
/*if(!$_SESSION["admin"]&&(!($_SERVER['PHP_SELF']=='/html/index.php/Admin/Index/login'||$_SERVER['PHP_SELF']=='/html/index.php/Admin/Index/VerCode.html'||$_SERVER['PHP_SELF']=='/html/index.php/Admin/Index/loginIn.html')))
{
	header("Location: /html/index.php/Admin/Index/login");
}*/
function GetLoadStatus()
{
	$userBLL=new \UserBLL();
	return $userBLL->GetLoginStatus();
}
?>