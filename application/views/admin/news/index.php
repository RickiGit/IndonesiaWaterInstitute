<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">News / Media</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List News / Media</h6>
            <a href="<?php echo base_url()?>admin/createnews" class="btn btn-primary btn-create-data">Create Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created By</th>
                            <th>Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($news as $n){
                        ?>
                            <tr>
                                <td><?php echo $n['title']?></td>
                                <td><?php echo $n['createdby']?></td>
                                <td><?php echo date("j F Y", strtotime($n['created']))?></td>
                                <td>
                                    <a href="<?php echo base_url()?>admin/deleteNews/<?php echo $n['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                    <a href="<?php echo base_url()?>admin/editNews/<?php echo $n['id']?>" class="btn btn-info">Edit</a>
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