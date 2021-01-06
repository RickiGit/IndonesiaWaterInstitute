<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Teams</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List IWI Teams</h6>
            <a href="<?php echo base_url()?>admin/createteams" class="btn btn-primary btn-create-data">Create Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Job Position</th>
                            <th>Graduate</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($teams as $t){
                        ?>
                            <tr>
                                <td><img src="<?php echo base_url()?>assets/images/teams/<?php echo ($t['images'] != "" ? $t['images'] : 'avatar.jpg') ?>" class="rounded-circle" style="width:50px;"></td>
                                <td><?php echo $t['name']?></td>
                                <td><?php echo $t['position']?></td>
                                <td><?php echo $t['graduate']?></td>
                                <td>
                                    <a href="<?php echo base_url()?>admin/deleteteams/<?php echo $t['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                    <a href="<?php echo base_url()?>admin/editteams/<?php echo $t['id']?>" class="btn btn-info">Edit</a>
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