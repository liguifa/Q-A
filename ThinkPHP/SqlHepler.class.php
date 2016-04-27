<?php
/*********************************
时间：2014-10-29
作者：李贵发
功能：mysql数据库的增删改查
**********************************/
require_once '/Application/Common/Conf/config.php';
class SqlHelper
{
	private static $hostname;             //数据库地址
	private static $username;             //数据库用户名
	private static $password;	          //数据库密码
	private static $databasename;         //数据库名称
	private static $dbInstance;	          //数据库链接对象
	private static $sql;                  //数据库操作sql语句

	private $From=" from ";                      
	private $Select ="select ";
	private $Join=" join ";
	private $Where=" where ";
	private $Insert="insert into ";
	private $Delete="Delete ";
	private $Update="Update ";
	private $Like=" like ";
	private $Equal=" = ";
	private $Limit=" limit ";
	private $Count=" count";
	private $Order=" order by ";
	private $Values=" values ";
    private $On=" on ";
    private $Set=" set ";

	/***************************
	功能：构造函数，从配置文件读取链接字符，创建数据库操作对象
	参数：无
	返回：数据库操作对象，全局静态对象
	****************************/
	public function SqlHelper()
	{
		self::$hostname=MySQLConnect::$dbConnect['host'];     
		self::$username=MySQLConnect::$dbConnect['user'];
		self::$password=MySQLConnect::$dbConnect['pwd'];
		self::$databasename=MySQLConnect::$dbConnect['database'];
		$this->SqlConnect();
	}

	/***************************
	功能：创建数据库链接对象
	参数：无
	返回：数据库操作对象，全局静态对象
	****************************/
	private  function SqlConnect()
	{
		if(!self::$dbInstance)             //检查数据库对象是否存在，如果存在则不创建，如果不存在则创建
		{
			self::$dbInstance = new mysqli(self::$hostname,self::$username,self::$password,self::$databasename);
		}
		return self::$dbInstance;
	}

	/***************************
	功能：数据库查询，表明将要开始查询
	参数：$data : string类型数据，表明要查询的列名
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Select($data)
	{
		self::$sql=$this->Select.$data;     //将要查询的列名添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：数据库操作对象表，表明将要操作的表名
	参数：$table : string类型数据，表明要从那一个表进行操作
	返回：数据库操作对象，全局静态对象
	****************************/
	public function From($table)
	{
		self::$sql=self::$sql.$this->From.$table;    //将要操作的表名添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：数据库联合查询
	参数：$table : string类型数据，表明要要联合的表名
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Join($table)
	{
		self::$sql=self::$sql.$this->Join.$table;      //将要联合的表名添加入全局sql语句中
		return $this;
	}
    
    /***************************
	功能：数据库联合查询定义联合表数据
	参数：$data_1 : string类型数据，表明要要联合的数据1
          $data_2 : string类型数据，表明要要联合的数据2 
	返回：数据库操作对象，全局静态对象
	****************************/
	public function On($data_1,$data_2)
	{
		self::$sql=self::$sql.$this->On.$data_1." = ".$data_2;      //将要联合的联合添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：数据库操作条件
	参数：$where : string类型数据，表明要要操作的数据满足的条件
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Where($where)
	{
		self::$sql=self::$sql.$this->Where.$where;     //将要操作条件添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：数据库增加
	参数：$table : string类型数据，表明要增加的表 
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Insert($table)
	{
		self::$sql=$this->Insert.$table;      //将要增加的表添加入全局sql语句中
		return $this; 
	}

	/***************************
	功能：数据库增加
	参数：$data : string类型数据，表明要增加的数据
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Values($data)
	{
		self::$sql=self::$sql.$this->Values." (".$data.")";      //将要增加的数据添加入全局sql语句中
		return $this; 
	}

	/***************************
	功能：数据库删除
	参数：$data : string类型数据，表明要删除的数据
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Delete($data)
	{
		self::$sql=$this->Delete.$data;      //将要删除的数据添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：数据库更新
	参数：$table : string类型数据，表明要更新的表名
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Update($table)
	{
		self::$sql=$this->Update.$table;          //将要更新的数据添加入全局sql语句中
		return $this;
	}
    
    /***************************
	功能：更新-数据设置
	参数：$col : string类型数据，表明要更新的列名
          $data : string类型数据，要更新的数据
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Set($col,$data)
	{
		self::$sql=self::$sql.$this->Set.$col."=".$data;          //将要更新的数据添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：数据库模糊查询
	参数：$data : string类型数据，表明要模糊查询的数据
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Like($data)
	{
		self::$sql=self::$sql.$this->Like.$data;	//将要模糊查询的数据添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：数据库相等
	参数：$data : string类型数据，表明要相等的数据
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Equal($data)
	{
		self::$sql=self::$sql.$this->Equal.$data;	//将要相等的数据添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：设置取的数据个数
	参数：$number : int类型数据，表明要取的数量
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Limit($startNumber,$endNumber)
	{
		self::$sql=self::$sql.$this->Limit.$startNumber.",".$endNumber;	//将要取的数据个数添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：获取数据库数据数量
	参数：$data : string类型数据，表明要通过那一列获取大小
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Count($data)
	{
		self::$sql=self::$sql.$this->Count."(".$data.") ";	//将要计算的列名添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：指定查询顺序
	参数：$col : string类型数据，表明要通过那一列指定
		  $rank : string类型数据，指定排序方式 desc:降序，esc:升序
	返回：数据库操作对象，全局静态对象
	****************************/
	public function Order($col,$rank)
	{
		self::$sql=self::$sql.$this->Order.$col." ".$rank;   //将排序方式添加入全局sql语句中
		return $this;
	}

	/***************************
	功能：数据库操作执行
	参数：无
	返回：数据库操作结果，查询结果为二维数据
	****************************/
	public function Exec($returnArray=true)
	{
		self::$dbInstance->query("SET NAMES utf8");	//设置编码为utf8防止中文乱码
		$result=self::$dbInstance->query(self::$sql);
        if($returnArray)
        {
            $res=array();
		    for($i=0;$result&&$r=$result->fetch_assoc();$i++)	   //遍历查询结果生成二位数组
		    {
			    $res[$i]=$r;
		    }
            return $res;
        }
		else
        {
            return $result;
        }
	}
}
?>