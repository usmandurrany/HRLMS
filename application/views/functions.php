<?php
$page="functions";
include'db_conn.php';
if (isset($_POST['login'])){

    $usr_name = $_POST['username'];
    $usr_pass = $_POST['password'];
    $query = 'SELECT * FROM `login` WHERE usr_name ="'.$usr_name.'" AND usr_pass="'.$usr_pass.'"';
    echo $query;
    $result = mysql_query($query);
    $num_rows = mysql_num_rows($result);
    $row = mysql_fetch_array($result);
    if($num_rows == 1){
        setcookie("usr_name",$row['usr_name'],0,"/lmstest");
        setcookie("is_admin",$row['is_admin'],0,"/lmstest");
        header("location: ../index.php");
    }
else {
        header("location: ../login.php");
}
}


if (isset($_POST['do'])) {
    $id = $_POST['id'];
    $page = $_POST['page'];
    // $type = $_POST['type'];
    $name = $_POST['name'];
    // $name2 = ereg_replace("_", " ", $name);


    // if ($type == 'sale') {
    //     $table = "client_" . $name;
    //     $id_table= "id_clients";
    // } elseif ($type == 'purchase') {
    //     $table = "supplier_" . $name;
    //     $id_table= "id_suppliers";
    // }

    if($page=='all_emp'){
        mysql_query("DELETE FROM employees WHERE `id`='".$id."'")or die(mysql_error());
        mysql_query("DELETE FROM leaves WHERE `emp_id`='".$id."'")or die(mysql_error());

    }
    elseif(($page=='all_leaves')||($page=="emp_leaves")){
        $emp_id=mysql_query("SELECT emp_id FROM leaves WHERE id='".$id."'")or die(mysql_error());
        $emp_id=mysql_fetch_array($emp_id);
        mysql_query("DELETE FROM leaves WHERE id='".$id."'")or die(mysql_error());
        $query="SELECT SUM(tot_leaves) FROM leaves WHERE emp_id='".$emp_id[0]."'";
        $query2="SELECT allowed_leaves FROM employees WHERE id='".$emp_id[0]."'";
        $query=mysql_query($query)or die(mysql_error());
        $query2=mysql_query($query2)or die(mysql_error());
        $num_leaves=mysql_fetch_array($query);
        $allowed_leaves=mysql_fetch_array($query2);
        $num_leaves=$allowed_leaves[0]-intval($num_leaves[0]);
        mysql_query("UPDATE employees SET leaves_left='".$num_leaves."' WHERE id='".$emp_id[0]."'")or die(mysql_error());
        // echo $num_leaves;    //FOR DEBUGGING
        // echo $emp_id[0];
        // echo $id;
    }
    

}

if (isset($_POST['profile'])){
    $id=$_POST["id"];
    $ename=$_POST["ename"];
    $desig=$_POST["desig"];
    $dept=$_POST["dept"];
    $doa=$_POST["doa"];
    $dob=$_POST["dob"];
    $ph1=$_POST["ph1"];
    $ph2=$_POST["ph2"];
    $email=$_POST["email"];
    $address=$_POST["address"];
   // move_uploaded_file($_FILES["picture"]["tmp_name"],"images/profile_pics/" . $_FILES["picture"]["name"])or die();
    $query="UPDATE `employees` SET `ename`=\"$ename\",`desig`=\"$desig\",`dept`=\"$dept\",`doa`=\"$doa\",`dob`=\"$dob\",`ph1`=\"$ph1\",`ph2`=\"$ph2\",`email`=\"$email\",`address`=\"$address\" WHERE `id`=\"$id\"";
    if(mysql_query($query)){
        header("location: ../index.php");
    }
    echo $query;

}


if(isset($_GET['add_leave'])){
	   $date=date('Y-m-d',strtotime($_POST['leave_date']));
	   
	   $emp_name=$_POST['ename'];
	   $leave_type=$_POST['type'];
    if($leave_type=="Full Leave"){
	   $leave_from=$_POST['date-from'];
	   $leave_to=$_POST['date-to'];

       $days_from=explode("/", $leave_from);
       $days_to=explode("/", $leave_to);

       $days=$days_to[1]-$days_from[1];
       $weight=1;
    }
	else{
	   $leave_from=$_POST['time-from'];
	   $leave_to=$_POST['time-to'];

       $days=1;
    if($leave_type=="Half Day"){
        $weight="0.5";
    }
    elseif($leave_type=="Short Leave"){
        $weight="0.3";
    }
    }
	   $reason=$_POST['reason'];
	   $emp_id=$_POST['id'];
	   $num_leaves=$_POST['num_leaves'];
       $tot_leaves=($weight*$days);

if ($_POST["edit"]=="do") {
if(mysql_query("UPDATE `leaves` SET `type`='".$leave_type."',`from`='".$leave_from."',`to`='".$leave_to."',`reason`='".$reason."',`weight`='".$weight."',`days`='".$days."',`tot_leaves`='".$tot_leaves."' WHERE id='".$_POST["l_id"]."'"))
            {  
                $query="SELECT SUM(tot_leaves) FROM leaves WHERE emp_id='".$emp_id."'";
        $query2="SELECT allowed_leaves FROM employees WHERE id='".$emp_id."'";
        $query=mysql_query($query)or die(mysql_error());
        $query2=mysql_query($query2)or die(mysql_error());
        $num_leaves=mysql_fetch_array($query);
        $allowed_leaves=mysql_fetch_array($query2);
        $num_leaves=$allowed_leaves[0]-intval($num_leaves[0]);
        mysql_query("UPDATE employees SET leaves_left='".$num_leaves."' WHERE id='".$emp_id."'")or die(mysql_error());
                header('Location: ../index.php');
            }
            else
            { 
                die(mysql_error());
            }
        }
else{
            if(mysql_query('INSERT INTO `leaves`(`date`, `name`, `type`, `from`, `to`, `reason`, `emp_id`, `weight`, `days`, `tot_leaves`) VALUES ("'.$date.'","'.$emp_name.'","'.$leave_type.'","'.$leave_from.'","'.$leave_to.'","'.$reason.'","'.$emp_id.'", "'.$weight.'", "'.$days.'", "'.$tot_leaves.'")'))
            {  
                $query="SELECT SUM(tot_leaves) FROM leaves WHERE emp_id='".$emp_id."'";
        $query2="SELECT allowed_leaves FROM employees WHERE id='".$emp_id."'";
        $query=mysql_query($query)or die(mysql_error());
        $query2=mysql_query($query2)or die(mysql_error());
        $num_leaves=mysql_fetch_array($query);
        $allowed_leaves=mysql_fetch_array($query2);
        $num_leaves=$allowed_leaves[0]-intval($num_leaves[0]);
        mysql_query("UPDATE employees SET leaves_left='".$num_leaves."' WHERE id='".$emp_id."'")or die(mysql_error());
                header('Location: ../index.php');
            }
            else
            { 
                die(mysql_error());
            }
    }
   // echo "'.$date.'","'.$emp_name.'","'.$leave_type.'","'.$leave_to.'","'.$leave_from.'","'.$reason.'","'.$emp_id.'";
   }
 if(isset($_POST["add_emp"])){
    $ename=$_POST["ename"];
    $desig=$_POST["desig"];
    $dept=$_POST["dept"];
    $doa=$_POST["doa"];
    $dob=$_POST["dob"];
    $ph1=$_POST["ph1"];
    $ph2=$_POST["ph2"];
    $email=$_POST["email"];
    $address=$_POST["address"];
     $picture=$_POST["picture"];

     if(mysql_query('INSERT INTO `employees`(`ename`, `desig`, `dept`, `doa`, `dob`, `ph1`, `ph2`, `email`, `address`,`picture_id`) VALUES ("'.$ename.'","'.$desig.'","'.$dept.'","'.$doa.'","'.$dob.'","'.$ph2.'","'.$ph1.'","'.$email.'","'.$address.'","'.$picture.'")')){
        $query = 'SELECT id FROM `employees` WHERE ename ="'.$ename.'"';
        $row= mysql_fetch_assoc(mysql_query($query));
        header("location: ../index.php");
     }
}
if(isset($_POST["add_emp_pic"])){
    $picture="images/profile_pics/" . $_FILES["picture"]["name"];
    
     if(move_uploaded_file($_FILES["picture"]["tmp_name"],"images/profile_pics/" . $_FILES["picture"]["name"])){
        mysql_query('INSERT INTO `pictures`(`pic_url`) VALUES("'.$picture.'")');
        $query = 'SELECT id FROM `pictures` ORDER BY id DESC LIMIT 1';
        $row= mysql_fetch_assoc(mysql_query($query));
        header('Location: ../index.php');
     }
}
if(isset($_POST["profile_pic"])){
    $picture="img/profile_pics/" . $_FILES["picture"]["name"];
    $id=$_POST["id"];

     if(move_uploaded_file($_FILES["picture"]["tmp_name"],"../img/profile_pics/" . $_FILES["picture"]["name"])){
        if(mysql_query('INSERT INTO `pictures`(`pic_url`) VALUES("'.$picture.'")')){
            $query = 'SELECT id FROM `pictures` ORDER BY id DESC LIMIT 1';
            $row= mysql_fetch_assoc(mysql_query($query));
            mysql_query('UPDATE `employees` SET `picture_id`="'.$row["id"].'" WHERE id="'.$id.'"')or die(mysql_error());
            header('Location: ../index.php');

        }
        
     }
}
 
     
 
?>