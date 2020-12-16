<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Book / Journal</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Book / Journal</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEditBook" action="<?php echo base_url()?>admin/updatebook/<?php echo $book['id']?>">
                <div class="row">
                    <div class="col col-md-6">
                        <label class="m-bottom5">Title*</label>
                        <input type="text" name="title" id="title" class="form-control m-bottom10" value="<?php echo $book['title']?>">
                        <label class="m-bottom5">Author*</label>
                        <input type="text" name="author" id="author" class="form-control m-bottom10" value="<?php echo $book['author']?>">
                        <label class="m-bottom5">Publisher*</label>
                        <input type="text" name="publisher" id="publisher" class="form-control m-bottom10" value="<?php echo $book['publisher']?>">
                        <label class="m-bottom5">Type</label>
                        <select name="type" id="type" class="form-control m-bottom10">
                            <option value="1" <?php echo ($book['type'] == 1) ? 'selected':''?>>Book</option>
                            <option value="2" <?php echo ($book['type'] == 2) ? 'selected':''?>>Journal</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-md-6">
                        <input type="submit" class="btn btn-primary btn-save" value="Update Data"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>