<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Inbox</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List IWI Inbox</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($inbox as $i){
                        ?>
                            <tr>
                                <td><?php echo $i['name']?></td>
                                <td><?php echo $i['email']?></td>
                                <td><?php echo $i['subject']?></td>
                                <td><?php echo $i['message']?></td>
                                <td>
                                    <!-- <a href="<?php echo base_url()?>admin/deleteProject/<?php echo $i['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a> -->
                                    <!-- <a href="<?php echo base_url()?>admin/editProject/<?php echo $i['id']?>" class="btn btn-info">Reply</a> -->
                                    <?php
                                        if($i['isread'] == 0){
                                            echo "<a href='".base_url()?>admin/updateinbox/<?php echo $i['id']."' class='btn btn-success'>Read</a>";
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