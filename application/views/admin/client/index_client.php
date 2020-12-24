<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Client</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List Client</h6>
            <a href="<?php echo base_url()?>admin/createclient" class="btn btn-primary btn-create-data">Create Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($client as $c){
                        ?>
                            <tr>
                                <td><img src="<?php echo base_url()?>assets/images/clients/<?php echo $c['image']?>" class="rounded-circle" style="width:50px;"></td>
                                <td><?php echo $c['name']?></td>
                                <td><?php echo $c['country']?></td>
                                <td>
                                    <a href="<?php echo base_url()?>admin/deleteclient/<?php echo $c['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                    <a href="<?php echo base_url()?>admin/editclient/<?php echo $c['id']?>" class="btn btn-info">Edit</a>
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