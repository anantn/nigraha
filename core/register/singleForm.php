<?php
    if (!isset($_REQUEST['id'])) {
        echo "Please append URL with ?id=<id>"; exit;
    }
    $conn = mysql_connect("localhost", "root", "password") or die(mysql_error());
    mysql_select_db("mnit_profiles", $conn);            
    $det = mysql_query("SELECT * FROM students WHERE userid = '".$_REQUEST['id']."'");
    $det = mysql_fetch_assoc($det);
    $cor = unserialize($det['courses']);
?>
<html>
<head>
  <title>Academic Registration</title>
</head>
<body>
<h1>Malaviya National Institute of Technology</h1>
<h2>Academic Registration Form</h2>
<p>&nbsp;</p>
<h3>Personal Details</h3>                       
<table border="1">
    <tr>
        <td><b>Enrollment No.</b></td>
        <td><?php echo $det['userid']; ?></td>
    </tr>
    <tr>
        <td><b>Full Name</b></td>
        <td><?php echo $det['fullname']; ?></td>
    </tr>
    <tr>
        <td><b>Father's Name</b></td>
        <td><?php echo $det['fathersname']; ?></td>
    </tr>
    <tr>
        <td><b>Mother's Name</b></td>
        <td><?php echo $det['mothersname']; ?></td>
    </tr>
    <tr>
        <td><b>Branch</b></td>
        <td><?php echo $det['dept']; ?></td>
    </tr>
    <tr>
        <td><b>Semester</b></td>
        <td><?php echo $det['semester']; ?></td>
    </tr>
    <tr>
        <td><b>Category</b></td>
        <td><?php echo $det['category']; ?></td>
    </tr>
</table>

<h3>Course Details</h3>
<table width="100%" border="1">
    <tr>
        <td><center><strong>Course Code</strong></center></td>
        <td><center><strong>Title</strong></center></td> 
        <td><center><strong>Credits</strong></center></td>
        <td><center><strong>Category</strong></center></td>
    </tr>
    <?php 
        mysql_select_db("mnit_master");
        $credits = 0;
        foreach($cor as $code) {
            $que1 = mysql_query("SELECT * FROM syllabus WHERE code='".$code."'") or die(mysql_error());
            $list = mysql_fetch_assoc($que1);
                                                                    
            echo "<tr>
                    <td><center>".$code."</center></td>
                    <td><center>".$list['title']."</center></td>"; 
            $dispcredit = $list['credits'];
            if($list['credits'] == '') $dispcredit = 3;
            $credits += $dispcredit;
            echo "<td><center>".$dispcredit."</center></td>
                  <td><center>".$list['area']."</center></td></tr>";
        }
        echo"<tr>
                <td colspan=2>TOTAL CREDITS</td> 
                <td><center>".$credits."</center></td>
                <td>&nbsp;</td>
             </tr>";
    ?>
</table>

<p>
    <b>Signature of Student:</b>
</p>
<p>
    <b>Signature of Faculty Advisor:</b>
</p>
<p>
    <b>Date:</b>
</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>
<center>
    <small><b>&#169; 2007 Nigraha, Dept. of Computer Engg, Malaviya National Institute of Technology</b></small>
</center>
</p>
</body>
</html>
