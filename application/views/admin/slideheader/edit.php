<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Slide Header</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Slide Header</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEditSlideHeader" action="<?php echo base_url()?>admin/updateslideheader/<?php echo $slide['id']?>">
                <div class="row">
                    <div class="col col-md-6">
                        <label class="m-bottom5">Title*</label>
                        <input type="text" name="title" id="title" class="form-control m-bottom10" value="<?php echo $slide['title']?>">
                        <label class="m-bottom5">Description*</label>
                        <textarea name="description" id="description" class="form-control m-bottom10"><?php echo $slide['description']?></textarea>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-md-6">
                        <input type="submit" class="btn btn-primary btn-save" value="Save Data"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>