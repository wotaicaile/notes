<!DOCTYPE html>
<html>
<head>
<style type="text/css">
html{
		background-color: #CCCCCC;
}
html,body{
	margin: 0;
	padding: 0;
}</style>
	<meta charset="utf-8"/>
	<title>学生信息管理</title>
</head>
<body>
	<center>
		<?php include ("./menu.php"); ?>

		<h3>学生信息操作</h3>
		<?php
		//导入配置文件
			require("./config.php");
				try{
		//实例化PDO获取数据库连接
			$pdo = new PDO(dsn,USER,PASS);
		}catch(PDOException $e){
	//捕获异常
	 die("fail to connect db".$e->getMessage());

}
		//根据参数a的值，执行对应的操作
			switch ($_GET['a']) {
				case 'create':  //添加
					//获取添加信息
		
					$id = $_POST['id'];
					$name = $_POST['name'];
					$sex = $_POST['sex'];
					$age = $_POST['age'];
					$classid = $_POST['classid'];
					//拼装sql语句
			
				// echo "$sex";
					$sql = "use mydemo;insert into stu(id,name,sex,age,classid) values('{$id}','{$name}','{$sex}','{$age}','{$classid}')"; 
					 // $sql = "insert into stu(name,sex,age,classid) values('liujina','男','10','1')"; 
					
					//执行
					$pdo -> exec($sql);
					if($pdo->query("select * from stu"))
						echo "添加成功!";
					else
						echo "添加失败！";
					break;

				case 'del':  //删除
					//定义sql语句
					$sql = "delete from stu where id=".$_GET['id'];

					//执行sql
					$pdo -> exec($sql);
					//跳回到浏览页
					header("Location:index.php");
					break;

				case 'update':  //修改
					//获取要修改的信息
				$id = $_POST['id'];
				$name = $_POST['name'];
				$sex = $_POST['sex'];
				$age = $_POST['age'];
				$classid = $_POST['classid'];
				//拼装修改sql语句
				$sql = "update stu set id ='{$id}',name='{$name}',sex='{$sex}',age='{$age}',classid='{$classid}'";
				//执行修改
				$m = $pdo->exec($sql);
				//判断成功与否
				if($m>=0){
					echo "修改成功！";
				}else{
					echo "修改失败！";
				}
					break;				
				
			}

		?>
		
	</center>
</body>
</html>