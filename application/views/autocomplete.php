<?php 
$page = "ac";
include'db_conn.php';
if(isset($_GET["type"])){
    if(($_GET["type"]=="dept")||($_GET["type"]=="desig")){
        if($_GET["type"]=="dept")
            $query = 'SELECT DISTINCT `dept` FROM `employees` WHERE dept LIKE "%'.$_GET["term"].'%"';
        else if($_GET["type"]=="desig")
            $query = 'SELECT DISTINCT `desig` FROM `employees` WHERE desig LIKE "%'.$_GET["term"].'%"';
        $result = mysql_query($query)or die(mysql_error());
        $num_rows = mysql_num_rows($result);
        echo "[";
        $i=$num_rows;
        while($row = mysql_fetch_array($result)){
            echo '{"id":"'.$i.'","label":"'.$row[0].'","value":"'.$row[0].'"}'; 
            $i--;
            if($i!=0)
                echo ',';
  
        }
                echo "]";

    }
}
else{
        $query = 'SELECT `id`,`ename` FROM `employees` WHERE ename LIKE "%'.$_GET["term"].'%"';
        $result = mysql_query($query)or die(mysql_error());
        $num_rows = mysql_num_rows($result);
        echo "[";
        $i=$num_rows;
        while($row = mysql_fetch_array($result)){
            echo '{"id":"'.$row[0].'","label":"'.$row[1].'","value":"'.$row[1].'"}'; 
            $i--;
            if($i!=0)
                echo ',';
  
        }
        
        echo "]";
    }
    
?>