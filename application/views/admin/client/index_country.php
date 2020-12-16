<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Country</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List Client Country</h6>
            <a href="<?php echo base_url()?>admin/createcountry" class="btn btn-primary btn-create-data">Create Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($country as $c){
                        ?>
                            <tr>
                                <td><?php echo $c['name']?></td>
                                <td>
                                    <a href="<?php echo base_url()?>admin/deletecountry/<?php echo $c['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete country and all client in this country?')">Delete</a>
                                    <a href="<?php echo base_url()?>admin/editcountry/<?php echo $c['id']?>" class="btn btn-info">Edit</a>
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