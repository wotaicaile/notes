<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>学生信息管理</title>
	<style type="text/css">
		html,body{
		margin: 0;
		padding: 0;
}
	html{
		background-color: #CCCCCC;
}
	footer{
		height: 20px;
		width: 100%;
		position: fixed;
		bottom: 0px;
		text-align:center;
		color: white;
		background-color: #000066;
}
</style>

</head>
<body>
	<center>
		<?php include("./menu.php"); ?>
		<h3>浏览学生信息</h3>
		<table width="700" border= "1px" cellspacing="0">
			<tr> 
				<th>学号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>年龄</th>
				<th>班级</th>
				<th>操作</th>
			</tr>
		<footer>@liujina</footer>
	</center>
</body>
</html>
		
		<?php
		//导入配置文件
			require("./config.php");
			try{
				//实例化PDO获取数据库连接
			$create = new PDO(DSN,USER,PASS);

				//当数据库不存在时创建
			$create->exec("Create Database If Not Exists mydemo Character Set UTF8");
				//当表格不存在时创建
		 	$sql ="use mydemo;
			create table if not exists stu(
    			 id int primary key,
     			name varchar(16) ,
   	 			 sex char(10) ,
   	 			age int unsigned ,
   				 classid char(6) 
     )";

			$create->exec($sql);
//			exec("drop Database  mydemo ");
			$pdo = new PDO(dsn,USER,PASS);
			//解决中文乱码问题
        	$pdo->query("SET NAMES 'UTF8'");
			//	学生信息查询
			$stmt = $pdo->query("select * from stu");
								
			//解析数据
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(empty($list))
				{
					echo "当前列表为空，可添加数据";
					}
			else{
				//遍历输出信息
				foreach($list as $stu){
					echo "<tr>";
					echo "<td>{$stu['id']}</td>";
					echo "<td>{$stu['name']}</td>";
					echo "<td>{$stu['sex']}</td>";
					echo "<td>{$stu['age']}</td>";
					echo "<td>{$stu['classid']}</td>";
					echo "<td> <a href='edit.php?id={$stu['id']}'>编辑</a>    
							   <a href='action.php?a=del&id={$stu['id']}'>删除</a> </td>";
					echo "</tr>";
					}
 				}
			}catch(PDOException $e){
		//捕获异常
		 die("fail to connect db".$e->getMessage());
	}
?>
