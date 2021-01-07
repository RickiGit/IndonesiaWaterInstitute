<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List IWI User</h6>
            <a href="<?php echo base_url()?>admin/createuser" class="btn btn-primary btn-create-data">Create Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($user as $u){
                        ?>
                            <tr>
                                <td><img src="<?php echo base_url()?>assets/images/user/<?php echo ($u['image'] != '' ? $u['image'] : 'avatar.jpg')?>" class="rounded-circle" style="width:50px;"></td>
                                <td><?php echo $u['name']?></td>
                                <td><?php echo $u['phone']?></td>
                                <td><?php echo $u['email']?></td>
                                <td>
                                    <?php
                                        if($u['level'] == 1){
                                            echo "Administrator";
                                        }else if($u['level'] == 2){
                                            echo "Viewer";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url()?>admin/deleteuser/<?php echo $u['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                    <a href="<?php echo base_url()?>admin/edituser/<?php echo $u['id']?>" class="btn btn-info">Edit</a>
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