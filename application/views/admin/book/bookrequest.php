<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Book</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary title-table">List Book & Journal Request</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Book / Journal Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($request as $r){
                        ?>
                            <tr>
                                <td><?php echo $r['name']?></td>
                                <td><?php echo $r['email']?></td>
                                <td><?php echo $r['company']?></td>
                                <td><?php echo $r['position']?></td>
                                <td><?php echo $r['book']?></td>
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