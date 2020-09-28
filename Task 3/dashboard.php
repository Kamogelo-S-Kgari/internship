<?php 
$con=mysqli_connect("localhost","root","","test");
$result=mysqli_query($con,"select * from registration");
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  </head>
  <body>
    <h1>Feedback From COVID19-CheckList</h1>
           <a href="#"><img src="images/logo-black.png" alt="" title="" height="45" width="200"/></a>

    <table align="center" border="1px" style="width:600px; line-height:40px;">
        <tr>
            <th colspan="8"><h2>COVID19- Record</h2></th>
        </tr>
        <t>
          
            <th> City </th>
            <th> person diagnosed </th>
            <th> Loss of smell / taste </th>
            <th> Email </th>
            <th>Muscle pain </th>
            <th>Diarrhoea </th>
            <th>Weakness </th>
        </t>
    <?php 
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>        
            <tr>
               
                <td><?php echo $rows['sName']; ?></td>
                <td><?php echo $rows['improve']; ?></td>
                <td><?php echo $rows['rate']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['module']; ?></td>
                <td><?php echo $rows['topic']; ?></td>
                <td><?php echo $rows['ments']; ?></td>
            </tr>
    <?php     
        }
    ?>    
    </table>


<input type="submit" class="btn btn-primary" />
              <?php
date_default_timezone_set("Africa/Johannesburg");
echo "The time is " . date("h:i:sa");
?>
  </body>
</html>
