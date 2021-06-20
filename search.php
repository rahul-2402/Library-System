<!DOCTYPE HTML>
<html>
<head>

	<style> 
header{
  position:sticky;
  top:0;
}

.header{
  margin: 0;
  padding: 0px 20px;
  overflow: hidden;
  background-color: #333333;
}

.header h1{
  float: left;
  display: block;
  color: white;
}
.header ul {
  list-style-type: none;
}

.header li {
  float: right;
}

.header li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

.header li a:hover {
  background-color: #111111;
}

footer {
  background-color: #333333;
  padding: 10px;
  text-align: center;
  font-size:20px;
  color: white;  
  bottom:0;
}


body{  
  font-family: Calibri, Helvetica, sans-serif;   
  background-image: url('https://news.harvard.edu/wp-content/uploads/2020/03/Zoom_Background_002-1350x900.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

h2{
	color:white;
}
.container {  
    display: block;
    position:center;
    padding: 10px 100px; 
    margin: 35px 500px;

  background-color: rgba(255,255,255,0.6);  
}  
  
input[type=text], input[type=number] {  
  width: 100%;  
  padding: 10px;  
  margin: 5px 0 22px 0;  
  display: inline-block;  
  border: none;  
  background: #f1f1f1;  
}  
input:focus{  
  background-color: orange;  
  outline: none;  
}  
 div {  
            padding: 10px 0;  
      }  
hr {  
  border: 1px solid #000000;  
  margin-bottom: 5px;  
}  
.btn {  
  background-color: #4CAF50;  
  color: black;  
  padding: 10px 10px;  
  margin: 4px 0;  
  border-radius: 5px;  
  cursor: pointer;  
  width: 100%;  
  opacity: 0.9;  
}  
.btn:hover {  
  opacity: 1; 
  background-color: orange; 

}  
h2{
  color:white;
}
table {
		  border-collapse: collapse;
		  border-spacing: 0;
		  margin-top:20px;
		  margin-left: 400px;
		  margin-right:650px;
		  width: 60%;
		  border: 1px solid #ddd;
		}
		th, td {
		  text-align: left;
		  padding: 16px;
		}
		tr:nth-child(even) {
		  background-color: #f2f2f2;
		}
		tr:nth-child(odd) {
		  background-color: #ffffff;
</style> 
	</head>

<body>  
    <header>
    <div class="header">
         <h1>Div-D Grp No. 9 Library Management System</h1>
         <ul>
            <li><a href="insertform.php">Insert</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="update.php">Update</a></li>
            <li><a href="delete.php">Delete</a></li>
        </ul>
   </div>
</header>

<form action = "search.php" method="post">
	 <div class="container"> 
 <center>  <h1>Search a Book</h1> </center>  
	 <hr>  
<center>
<input type="text" name="search" placeholder="Enter the title of the book to be searched :" size="48">
<br></br>
<input type="submit" name="submit" value="Search for the book" class="btn">
</center>
<br>
</div>
</form>
<?php
	include("connectmain.php");
		
	if (isset($_POST['submit']))
	{
		$search = $_POST["search"];
		$sql = "select * from books where book_title='$search'"; //search with a book name in the table book_info
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
?>	
 
		<table border="2" align="center" >

		<tr>
		<th> ISBN </th>
		<th> Title </th>
		<th> Author </th>
		<th> Publication </th>
		<th> Year </th>
		</tr>
		<?php 	
			  while($row = mysqli_fetch_assoc($result)) {
			  	?>
			  	<tr>
		<td><?php echo $row["book_isbn"];?> </td>
		<td><?php echo $row["book_title"];?> </td>
		<td><?php echo $row["author"];?> </td>
		<td><?php echo $row["publisher"];?> </td>
		<td><?php echo $row["year"];?> </td>
		</tr>
<?php
	    
	  }
	} 
	else {
	  echo "<center><h2><b>Book Not Found</b></h2><center>";
	}
	}
?>


</body> 
</html>  