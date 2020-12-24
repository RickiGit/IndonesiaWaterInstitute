<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Slide Header Home</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List Slide Home</h6>
            <a href="<?php echo base_url()?>admin/createslideheader" class="btn btn-primary btn-create-data">Create Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Language</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($slide as $s){
                        ?>
                            <tr>
                                <td><?php echo $s['title']?></td>
                                <td><?php echo $s['description']?></td>
                                <td><?php echo ($s['language'] == 0) ? 'Indonesia':'English'?></td>
                                <td>
                                    <a href="<?php echo base_url()?>admin/deleteslideheader/<?php echo $s['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                    <a href="<?php echo base_url()?>admin/editslideheader/<?php echo $s['id']?>" class="btn btn-info">Edit</a>
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