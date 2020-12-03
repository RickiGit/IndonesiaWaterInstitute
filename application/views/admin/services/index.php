<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Services</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List IWI Services</h6>
            <a href="<?php echo base_url()?>admin/createservices" class="btn btn-primary btn-create-data">Create Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($services as $s){
                        ?>
                            <tr>
                                <td><?php echo $s['name']?></td>
                                <td><?php echo $s['description']?></td>
                                <td>
                                    <a href="<?php echo base_url()?>admin/deleteservices/<?php echo $s['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                    <a href="<?php echo base_url()?>admin/editservices/<?php echo $s['id']?>" class="btn btn-info">Edit</a>
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