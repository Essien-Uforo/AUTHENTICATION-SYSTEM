<?php 

    include("phpcodedash.php"); ?>

<html>
<head>
	<title>Course Dashboard</title>
</head>
<body>

<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

    <style type="text/css">
    body {
    font-size: 19px;
    }
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
    }
tr {
    border-bottom: 1px solid #cbcbcb;
    }
th, td{
    border: none;
    height: 30px;
    padding: 2px;
    }
tr:hover {
    background: #F5F5F5;
}

form {
    width: 45%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}

    </style>

<?php $results = mysqli_query($con, "SELECT * FROM dashtab");  ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Courses</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($user_data = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $user_data['name']; ?></td>
			<td><?php echo $user_data['courses']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $user_data['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="phpcodedash.php?del=<?php echo $user_data['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form>

	<form method="post" action="connection.php" >
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" placeholder="Name">
		</div>
		<div class="input-group">
			<label>Course</label>
			<input type="text" name="courses" placeholder="Course name">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
		</div>
	</form>
</body>
</html>

