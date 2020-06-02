<?php
    include_once 'config.php';
?>
<html>
<head>
<h1 ><img src="kkk.jpg"width="150"height="100">school salary management system</h1>
<title> Employess </title>
<style>
input{
    margin-left: 20px;
    height: 30px;
}
</style>
</head>
<body bgcolor="green">
<b>
<br>
<br><h2><a href="index.php">Home </a>&nbsp;&nbsp;&nbsp; &nbsp;<a href="employees.php">Employess</a> 
     &nbsp;&nbsp;&nbsp; &nbsp;<a href="deduction.php">Deduction</a>&nbsp;&nbsp;&nbsp; &nbsp;
     <a href="about.php">About </a> <font> </br></h2>
<p> <font color= "white"> <font size ="16"> <marquee direction ="left"> welcome to website school salary management system </marquee> </font> </p> 
<h1 align="center"><img src="logo2.jpg"width="1200"height="500"></h1>

<br/> 
<P>
<form action="employees.php" method="POST">
<label for="first name" > FIRST NAME: </label> 
<input type= "text" id="first name" name="fname"> <br> </br>

<label for="last name"> LAST NAME: </label> 
<input type= "text" id="last name" name="lname" > <br> </br>

<label for="last name"> DEPARTMENT: </label> 
<input type= "text" id="department" name="department"> <br> </br>

<label for="last name"> COUNTRY: </label> 
<input type="text" id="country" name="country" ><br><br>

<label for="DEDUCTION"> DEUCTION:</label>
<input type="text" id="DEDUCTION" name="deduction" ><br><br>

<label for="comment"> COMMENT:</label>
<input type= "text" id="comment" name="comment" style="width:300px; height:50px;"> <br> </br>

<input type= "submit" value="submit" name="submit">
<input type= "Reset" value="cancel">
</form>

<?php

if(isset($_POST['submit'])){
 $Firstname=$_POST['fname'];
 $Lastname=$_POST['lname'];
 $Department=$_POST['department'];
 $Country=$_POST['country'];
 $Deduction=$_POST['deduction'];
 $Comment = $_POST['comment'];


//  echo $harris = "insert into employee(fistname,lastname,departnemt,country,deduction,comment) 
//  VALUES('$Firstname','$Lastname','$Department','$Country','$Deduction','$Comment')";
 
 $insert_user = mysqli_query($con, "insert into employee(firstname,lastname,department,country,deduction,comment) 
 VALUES('$Firstname','$Lastname','$Department','$Country','$Deduction','$Comment')");
 if($insert_user == 1){
     echo "<script>alert('Employee successfully registered!')</script>";
 }   
}
?>
  <hr>
<div style="margin-left: 15%">
<table style="background-color: white"  cellspacing="20px" cellpadding="10px" style="width: 100%;">
  <thead>
  <tr>
              <th>S.N</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Country</th>
                <th>Department</th>
                <th>Deduction</th>
                <th>Comment</th>
                <th>Deduction</th>
              
            </tr>
  </thead>
  <?php
        
       $sel_emp = mysqli_query($con, "Select * from employee");
        $i = 0;
        while($row = mysqli_fetch_array($sel_emp)){
            //here goes the data

                     $fname = $row['firstname'];
                     $lname = $row['lastname'];
                     $country = $row['country'];
                     $department = $row['department'];
                     $deduction = $row['deduction'];
                     $comment =$row['comment'];
                     $emp_id = $row['emp_id'];

                    $i++;
                
    ?>
  <tbody>
  <tr style="text-align: right;">
             <td><?php echo $i; ?></td>
                <td style="text-transform: capitalize;"><?php echo $fname; ?></td>
                <td style="text-transform: capitalize;"><?php echo $lname; ?></td>
                <td ><?php echo $country; ?></td>
                <td><?php echo $department; ?></td>
                <td><?php echo $deduction; ?></td>
                <td><?php echo $comment; ?></td>
                <td><a href="deduction.php?id=<?php echo $emp_id; ?>">Make deduction</a></td>
                
            </tr>
  </tbody>
  <?php } ?>
</table>
</div> 

</body>
</html>
