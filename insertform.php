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


body{  
  font-family: Calibri, Helvetica, sans-serif;   
  background-image: url('https://uonlib.files.wordpress.com/2018/04/setwidth1280-15-e1589160928987.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

.container {  
    display: block;
    position:center;
    padding: 10px 100px; 
    margin: 40px 500px;

  background-color: rgba(255,255,255,0.6);  
}  
  
input[type=text], input[type=number] {  
  width: 100%;  
  padding: 10px;  
  margin: 5px 0 7px 0;  
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
  margin-bottom: 34px;  
}  
.submitbtn {  
  background-color: #4CAF50;  
  color: white;  
  padding: 18px 30px;  
  margin: 18px 0;  
  border-radius: 5px;  
  cursor: pointer;  
  width: 100%;  
  opacity: 0.9;  
}  
.submitbtn:hover {  
  opacity: 1; 
  background-color: orange; 

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
    }
.error {color: #FF0001;} 
</style> 
  </head>

<?php
include("connectmain.php");
$isbnErr =$titleErr = $authorErr =$pubErr = $yearErr = "" ; 
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
if (isset($_POST['submit']))
{
        if (empty($_POST["isbn"])) {  
            $isbnErr = "Isbn no. is required";  
       } else
       { 
        $isbn = input_data($_POST["isbn"]); 
            if (!preg_match ("/^[0-9]{1,}$/", $isbn) ) {  
            $isbnErr = "Only positive numeric value is allowed.";  
            }    
          if (strlen ($isbn) >5) {  
            $isbnErr = "Isbn no. must contain max 5 digits.";  
            }  
      }  
//String Validation  
    if (empty($_POST["title"])) {  
         $titleErr = "Title is required";  
    } else {  
        $title = input_data($_POST["title"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]{3,100}$/",$title)) {  
                $titleErr = "Only alphabets and white space are allowed of lenth more than 3";  
            }  
    }  
      
//String Validation  
    if (empty($_POST["author"])) {  
         $authorErr = "Author is required";  
    } else {  
        $author = input_data($_POST["author"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]{3,50}$/",$author)) {  
                $authorErr = "Only alphabets and white space are allowed of lenth more than 3";  
            }  
    }  

//String Validation  
    if (empty($_POST["publication"])) {  
         $pubErr = "Publication is required";  
    } else {  
        $publication = input_data($_POST["publication"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]{3,50}$/",$publication)) {  
                $pubErr = "Only alphabets and white space are allowed of lenth more than 3";  
            }  
    }  

    
        if (empty($_POST["year"])) {  
            $yearErr = "Year is required";  
       } else {  
            $year = input_data($_POST["year"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $year) ) {  
            $yearErr = "Only numeric value is allowed.";  
            }  
        //check mobile no length should not be less and greator than 10  
        if (strlen ($year)!=4) {  
            $yearErr = "Year must be of 4 digits and valid";  
            }  
    }  


    if($isbnErr == "" && $titleErr == "" && $authorErr == "" && $pubErr == "" && $yearErr == "") {    
        $sql = "insert into books(book_isbn,book_title,author,publisher,year) values('$isbn','$title','$author','$publication','$year')"; //Insert query to add book 
      if (mysqli_query($conn, $sql)) {
        ?>
        <center><h1 style="color:white; "><b> Book information is inserted successfully </b></h1></center>
        <?php
      } 
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } 
   
}
?>

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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
 <div class="container">  
   <center>  <h1>Insert a Book</h1> </center>  
   <hr>  
   <label> <b> Enter Book ID </b></label>   
   <input type="number" name="isbn" placeholder= "Enter Book id" min=1/>
   <span class="error"><b><?php echo $isbnErr; ?> </b></span> 
   <br>
  <label> <b>Enter Title </b></label>    
  <input type="text" name="title"  placeholder="Enter Title" /> 
  <span class="error"><b><?php echo $titleErr; ?> </b></span> 
  <br>
  <label> <b>Enter Author </b></label>    
  <input type="text" name="author" placeholder="Enter Author's name"  />
  <span class="error"><b><?php echo $authorErr; ?> </b></span>  
  <br>
  <label> <b>Enter Publication</b></label>    
  <input type="text" name="publication" placeholder="Enter Publication"  /> 
  <span class="error"><b><?php echo $pubErr; ?> </b></span> 
  <br>
  <label> <b>Enter Year </b></label>    
  <input type="number" name="year" placeholder="Enter Year" min="1000" max="2020" />
  <span class="error"><b><?php echo $yearErr; ?> </b></span> 
  <br>
  <button type="submit" name="submit" value="submit" class="submitbtn">Submit</button>     
</div>

</form> 

<br>
<br>
<br>



<?php
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
    echo "0 results";
  }

?>

</body>  
</html>  

