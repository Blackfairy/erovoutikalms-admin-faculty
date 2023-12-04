<!-- PHP code to establish connection with the localserver -->
<?php

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'erovoutikalms';

// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM usertable ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Management</title>
</head>
<body>
  <h1>User Management</h1>
  <div id="users-list"></div>
  <form id="update-user-form">
    <label for="name">name:</label>
    <!-- PHP CODE TO FETCH DATA FROM ROWS -->
    <?php 
          // LOOP TILL END OF DATA
          while($rows=$result->fetch_assoc())
          {
      ?>
    <input type="text" id="name" name="name" value="<?php echo $rows['name'];?>"><br><br>
    <?php
        }
    ?>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <button type="submit">Update User</button>
  </form>
  <form id="delete-user-form">
    <label for="name">name:</label>
    <input type="text" id="name" name="name"><br><br>
    <button type="submit">Delete User</button>
  </form>
 <script src="script.js"></script>
  <style>
    #users-list {
  display: flex;
  flex-direction: column;
}

#users-list div {
  margin: 5px;
  padding: 10px;
  border: 1px solid #ccc;
}

#users-list div:hover {
  background-color: #f4f4f4;
}
#update-user-form, #delete-user-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 10px;
}

#update-user-form label, #delete-user-form label {
  margin-bottom: 5px;
}

#update-user-form input[type="text"], #delete-user-form input[type="text"] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

#update-user-form button[type="submit"], #delete-user-form button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#update-user-form button[type="submit"]:hover, #delete-user-form button[type="submit"]:hover {
  background-color: #45a049;
}
  </style>
</body>
</html>