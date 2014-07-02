<?php include 'db_conn.php';?>
<?php $page="all_leaves" ; ?>
            <header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            
            <div id="top-panel" class="col-xs-12">
                        
    <h1>All Leaves</h1>

                </div>
            </div>
        </div>
</header>
        <div class="col-xs-12 col-sm-12 panel panel-default">
    
    <div class="panel-body">
        <table class="table table-hover" id="table">
            <thead>
                <tr>
                    <th class="extra">#</th>
                    <th>Name</th>
                    <th>From</th>
                    <th>To</th>
                    <th class="extra">Reason</th>
                    <th>Type</th>
                    <th>Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($result != FALSE){?>

                <?php foreach($result as $row){?>
                <tr>
                        <td class="extra"><?php echo $row->id ?></td>
                        <td class="name"><a href="<?php echo base_url();?>index.php/view/view_profile_page/<?php echo $row->emp_id; ?>" class="ajax-link" ><?php echo $row->name; ?></a></td>
                        <td><?php echo $row->from; ?></td>
                        <td class="extra"><?php echo $row->to; ?></td>
                        <td class="extra"><?php echo $row->reason; ?></td>
                        <td class="extra"><?php echo $row->type; ?></td>
                        <td class="extra"><?php echo $row->days; ?></td>
                        <td><a href="javascript: void(0);" id="<?php echo $row->id; ?>" name="<?php echo $row->name; ?>" page="all_leaves" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
<a href="<?php echo base_url();?>index.php/view/view_conf_leave/<?php echo $row->emp_id;?>/<?php echo $row->id;?>/edit" class="ajax-link"><span class="glyphicon glyphicon-pencil"></span></a></td> 
                </tr>
                <?php }?>
                <?php }?>
                
            </tbody>
            
        </table>
        
    </div>
</div>
<!--footer-->
</div>
</div>