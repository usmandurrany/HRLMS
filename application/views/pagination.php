<?php 
include("db_conn.php");

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 20; 
$sql = "SELECT * FROM employees ORDER BY ename ASC LIMIT ".$start_from.", 20"; 
$rs_result = mysql_query ($sql)or die(mysql_error()); 
?> 
<table>
<tr><td>Name</td><td>Phone</td></tr>
<?php 
while($row = mysql_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><?php echo $row["ename"]; ?></td>
            <td><?php echo $row["ph1"]; ?></td>
            </tr>
<?php 
} 
?> 
</table>
<?php 
$sql = "SELECT COUNT(id) FROM employees"; 
$rs_result = mysql_query($sql)or die(mysql_error()); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records / 20); 
  
for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='pagination.php?page=".$i."'>".$i."</a> "; 
}
?>