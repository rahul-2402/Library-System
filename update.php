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
}


body{  
  font-family: Calibri, Helvetica, sans-serif;   
  background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mnx8bGlicmFyeXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
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
  margin: 4px 10px;  
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

<form action = "update.php" method="post">
	 <div class="container"> 
 <center>  <h1>Update a Book</h1> </center>  
	 <hr>  
<center>
<label> <b> Enter Book ID </b></label>   
<input type="number" name="isbn" placeholder="Enter the book id :" pattern="[0-9]{5}" min="1" max="99999" required>

<label> <b>Enter Title </b></label>    
  <input type="text" name="title"  placeholder="Enter Title" pattern="[a-zA-Z_ ]{3,100}" /> 

  <label> <b>Enter Author </b></label>    
  <input type="text" name="author" placeholder="Enter Author's name" pattern="[a-zA-Z_ ]{3,50}" />  

  <label> <b>Enter Publication</b></label>    
  <input type="text" name="publication" placeholder="Enter Publication" pattern="[a-zA-Z_ ]{3,50}"  />  

  <label> <b>Enter Year </b></label>    
  <input type="number" name="year" placeholder="Enter Year" pattern="[0-9]{4}" min="1500" max="2020" /> 


<input type="submit" name="submit" value="Update the details" class="btn">
</center>
<br>
</div>
</form>
<?php
  include("connectmain.php");

  if (isset($_POST['submit']))
  {
    $isbn=$_POST["isbn"];
    $title=$_POST["title"];
    $author=$_POST["author"];
    $publication=$_POST["publication"];
    $year=$_POST["year"];


        $sql = "select * from books where book_isbn='$isbn'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) 
        {
          $isbn=$row["book_isbn"];
          if($title=="")
              $title=$row["book_title"];
          if($author=="")
              $author=$row["author"];
          if($publication=="")  
              $publication=$row["publisher"];
          if($year=="")
              $year=$row["year"];
        }


  $query = "UPDATE books SET book_title='".$title."',author='".$author."',publisher='".$publication."',year='".$year."' WHERE book_isbn=".$isbn;
  if (mysqli_query($conn, $query)) {
    echo "New record created successfully";
  } 
  else {
    echo "<center><h2><b>Book Not Found</b></h2><center>";
  }
  } 

 $sql1 = "select * from books";
  $result = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result) > 0) {
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



?>

</body>
</html>