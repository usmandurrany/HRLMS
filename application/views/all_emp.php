<?php include 'db_conn.php';?>

<?php $page="all_emp" ; ?>
            <header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            
            <div id="top-panel" class="col-xs-12">
                        
    <h1>All Employees</h1>

                </div>
            </div>
        </div>
</header>
        <div class="col-xs-12 col-sm-12  panel panel-default">
    
    <div class="panel-body">
        <table class="table table-hover" id="table">
            <thead>
                <tr>
                    <th class="extra">#</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                        <?php if($result != FALSE){?>

                <?php foreach($result as $row){?>
                <tr>
                        <td class="extra"><?php echo $row->id?></td>
                        <td class="name"><a href="<?php echo base_url();?>index.php/view/view_profile_page/<?php echo $row->id; ?>" class="ajax-link" ><?php echo $row->ename; ?></a></td>
                        <td><?php echo $row->dept; ?></td>
                        <td><?php echo $row->desig; ?></td>
                        
                        <td><?php echo $row->email; ?></td>
<td><a href="#" id="<?php echo $row->id ?>" name="<?php echo $row->ename; ?>" page="all_emp" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
<a href="<?php echo base_url();?>index.php/view/view_profile_page/<?php echo $row->id; ?>" class="ajax-link"><span class="glyphicon glyphicon-pencil"></span></a></td>                </tr>
                <?php }?>
                <?php }?>
            </tbody>
            
        </table>
       
    </div>
</div>
<!--footer-->
</div>
</div>