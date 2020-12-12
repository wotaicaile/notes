<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>学生信息管理</title>
	<style type="text/css">
html,body{
background-color: #CCCCCC;
margin: 0;
}
</style>
</head>
<body>
	<center>
		<?php include ("./menu.php"); 
			//获取修改的学生信息
			//导入配置
			require("./config.php"); 

			//实例化PDO
			$pdo = new PDO(dsn,USER,PASS);

			//执行查询
			$stmt = $pdo->query("select * from stu where id=".$_GET['id']);

			//解析判断
			
			$stu = $stmt->fetch(PDO::FETCH_ASSOC);
		?>

		<h3>编辑学生信息</h3>
		<form action="action.php?a=update" method="post">

		<table width="400" border="0">
			<tr> 
				<td>学号：</td>
				<td><input name="id" value="<?php echo $stu['id'] ?>"/></td>
			</tr>
			<tr> 
				<td>姓名：</td>
				<td><input type="text" name="name" value="<?php echo $stu['name'] ?>"/></td>
			</tr>

			<tr> 
				<td>性别：</td>
				<td><input type="radio" name="sex" value="男" <?php echo $stu['sex']=="男"?"checked":"";?>/>男
					<input type="radio" name="sex" value="女" <?php echo $stu['sex']=="女"?"checked":"";?>/>女
				</td>
			</tr>
			
			<tr> 
				<td>年龄：</td>
				<td><input type="text" name="age" value="<?php echo $stu['age'] ?>"/></td>
			</tr>
			
			<tr> 
				<td>班级：</td>
				<td><input type="text" name="classid" value="<?php echo $stu['classid'] ?>"/></td>
			</tr>

			<tr> 
				<td align="center" colspan="2"> 
					<input type="submit" value = "保存"/>
					<input type="submit" value = "重置"/>
				</td>

			</tr>
		</table>
		</form>
	</center>
</body>
</html>