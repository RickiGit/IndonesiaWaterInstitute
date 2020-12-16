<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Project</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List IWI Project</h6>
            <a href="<?php echo base_url()?>admin/createproject" class="btn btn-primary btn-create-data">Create Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Total View</th>
                            <th>Created By</th>
                            <th>Created</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($projects as $p){
                        ?>
                            <tr>
                                <td><?php echo $p['title']?></td>
                                <td><?php echo $p['totalview']?></td>
                                <td><?php echo $p['createdby']?></td>
                                <td><?php echo date("j F Y", strtotime($p['created']))?></td>
                                <?php
                                        if($p['isactive'] == 0){
                                    ?>  
                                        <td>Not Publish</td>
                                    <?php
                                        }else{
                                    ?>
                                        <td>Published</td>
                                    <?php 
                                        }
                                    ?>
                                <td>
                                    <a href="<?php echo base_url()?>admin/deleteProject/<?php echo $p['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                    <a href="<?php echo base_url()?>admin/editProject/<?php echo $p['id']?>" class="btn btn-info">Edit</a>
                                    <?php
                                        if($p['isactive'] == 0){
                                    ?>  
                                        <a href='<?php echo base_url()?>admin/updatestatusproject/<?php echo $p['id']?>/1' class='btn btn-success' onclick="return confirm('Are you sure want to publish?')">Publish</a>
                                    <?php
                                        }else{
                                    ?>
                                            <a href='<?php echo base_url()?>admin/updatestatusproject/<?php echo $p['id']?>/0' class='btn btn-warning' onclick="return confirm('Are you sure want to deactive?')">Not Active</a>
                                    <?php 
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>