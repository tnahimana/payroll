<html>
<?php include_once 'config.php'; 
error_reporting(0);
 $id = $_GET['id'];
$sel_emp = mysqli_query($con, "select * from employee where emp_id = '$id'");
while($row = mysqli_fetch_array($sel_emp)){
    $fname = $row['firstname'];
    $lname = $row['lastname'];
}
$name = $fname . " ". $lname;
?>
<head>
<title>Deduction form</title>
<style>
input,select{
    margin-left: 20px;

}
button{
    padding: 7px;
}
select{
    width: 150px;
    height: 20px;
}
</style>
</head>
<body bgcolor="green">
<b>
<br>
<br><h2><a href="index.php">Home </a>&nbsp;&nbsp;&nbsp; &nbsp;<a href="employees.php">Employess</a> &nbsp;&nbsp;&nbsp; 
    &nbsp;<a href="about.php">About </a> &nbsp;&nbsp;&nbsp; &nbsp;<a href="deduction.php">Deduction</a><font> </br></h2>
<p> <font color= "white"> <font size ="16"> <marquee direction ="left"> welcome to website school salary management system </marquee> </font> </p> 
<h1 align="center"><img src="capture0000.jpg"width="1200"height="500"></h1>

<br/> 
<P>
<?php if($id != ""){ ?>
<form action= "deduction.php?id="method="post">
<fieldset><legend>Deduction form</legend>
Deduction ID <input type="text" name="deduction" value="<?php echo $id; ?>"><br><br>
Loan<input type="text" name="loan"><br><br>
Attendency<input tpye="text" name="day"><br><br>
Tax<input type="text" name="tax"><br><br>
Insurance<select name="insurance" required="required">
                  <option selected="">Select Insurance</option>
                  <option  value="mmi">MMI</option>
                  <option  value="rama">RAMA</option>
                  <option  value="mituel">MITUEL</option>
                  <option  value="solas">SOLAS</option>
              </select>
<br><br>
Employees Name<input style="text-transform: capitalize;" type="text" name="name" value="<?php echo $name; ?>">
<p>this announcement is cooncerned to the employees
</p><br>
<button type="submit" name="submit">submit</button>
<button tpye="reset">Reset</button>
</fielset>
</form>
<?php } else {?>


    <div style="margin-left: 15%">
<table style="background-color: white"  cellspacing="20px" cellpadding="10px" style="width: 100%;">
  <thead>
  <tr>
              <th>S.N</th>
                <th>Employee Name</th>
                <th>Loan</th>
                <th>Insurance</th>
                <th>Tax</th>
                <th>Deduction Amount</th>
              
            </tr>
  </thead>
  <?php
        
       $sel_emp = mysqli_query($con, "Select * from deduction");
        $i = 0;
        while($row = mysqli_fetch_array($sel_emp)){
            //here goes the data

                     $name = $row['emp_name'];
                     $loan = $row['loan'];
                     $insurance = $row['insurance'];
                     $tax = $row['tax'];
                     $deduction = $row['amount'];

                    $i++;
                
    ?>
  <tbody>
  <tr style="text-align: right;">
             <td><?php echo $i; ?></td>
                <td style="text-transform: capitalize;"><?php echo $name; ?></td>
                <td ><?php echo $loan; ?></td>
                <td><?php echo $insurance; ?></td>
                <td><?php echo $tax; ?></td>
                <td><?php echo $deduction; ?></td>
                
            </tr>
  </tbody>
  <?php } ?>
</table>



<?php } ?>
<?php
if(isset($_POST['submit'])){
    $emp_id = $_POST['deduction'];
    $Loan = $_POST['loan'];
    $Attendance = $_POST['day'];
    $Insurerace = $_POST['insurance'];
    $emp_name = $_POST['name'];
    $tax1 = $_POST['tax'];
    $amount = ($loan*$Attendance)/200;
    $tax = ($Loan * $tax1)/100;

    $insert_ded = mysqli_query($con, "insert into deduction(emp_name,emp_id,loan,attendance,insurance,tax,amount)
    VALUES('$emp_name','$emp_id','$Loan','$Attendance','$Insurerace','$tax','$amount')");
    if($insert_ded){
        echo "<script>alert('Deduction Registered Successfull');</script>";
        echo "<script>window.open('deduction.php', '_self');</script>";
    }
 
}

?>

</body>
</html>
