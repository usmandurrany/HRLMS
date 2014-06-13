<?php 
include "db_conn.php"; 
?>
<?php $page="emp_leaves" ;?>
<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">

            <div id="top-panel" class="col-xs-12">
                <h1 class="pull-left">
                    Employee leaves


                </h1>
                
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
                    <th>Date</th>
                    <th class="extra">Name</th>
                    <th>From</th>
                    <th>To</th>
                    <th class="extra">Reason</th>
                    <th>Type</th>
                    <th>Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php if($result != FALSE){?>
            <tbody>
                <?php foreach ($result as $row) {?>
                <tr>
                    <td class="extra">
                        <?php echo $row->id ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y',strtotime($row->date)); ?>
                    </td>
                    <td class="extra">
                        <?php echo $row->name ?>
                    </td>
                    <td>
                        <?php echo $row->from ?>
                    </td>
                    <td>
                        <?php echo $row->to ?>
                    </td>
                    <td class="extra">
                        <?php echo $row->reason ?>
                    </td>
                    <td>
                        <?php echo $row->type ?>
                    </td>
                                            <td class="extra"><?php echo $row->days; ?></td>

<td><a href="javascript: void(0);" id="<?php echo $row->id ?>" name="<?php echo $row->name; ?>" page="emp_leaves" class="delete"><span class="glyphicon glyphicon-trash"></span></a>
<a href="<?php echo base_url();?>index.php/view/view_profile_page/<?php echo $id;?>" class="ajax-link"><span class="glyphicon glyphicon-pencil"></span></a></td> 
                </tr>
                <?php }?>
            </tbody>
            <?php }else{ echo "no leaves found!";}?>
            <tfoot>
                <tr>
                    <td class="extra"></td>
                    <td class="extra"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right;font-weight:bold">Total Leaves left:</td>
                    <td>
                        <?php echo $num_leaves; ?>
                    </td>
                </tr>
            </tfoot>
                
            
        </table>
    </div>
</div>
