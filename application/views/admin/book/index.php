<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Book</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List Book & Journal</h6>
            <a href="<?php echo base_url()?>admin/createbook" class="btn btn-primary btn-create-data">Create Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($book as $b){
                        ?>
                            <tr>
                                <td><?php echo $b['title']?></td>
                                <td><?php echo $b['author']?></td>
                                <td><?php echo $b['publisher']?></td>
                                <?php
                                    if($b['type'] == 1){
                                        echo "<td>Book</td>";
                                    }else{
                                        echo "<td>Journal</td>";
                                    }
                                ?>
                                <td>
                                    <a href="<?php echo base_url()?>admin/deletebook/<?php echo $b['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                    <a href="<?php echo base_url()?>admin/editbook/<?php echo $b['id']?>" class="btn btn-info">Edit</a>
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