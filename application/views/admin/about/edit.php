<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">About IWI</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit About</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEditAbout" action="<?php echo base_url()?>admin/updateabout/<?php echo $about['id']?>">
                <div class="row">
                    <div class="col col-md-12">
                        <input type="hidden" name="id" id="id" value="<?php echo $about['id']?>">
                        <label class="m-bottom5">Vision*</label>
                        <textarea name="vision" id="vision" class="form-control m-bottom10"><?php echo $about['vision']?></textarea>
                        <label class="m-bottom5">Mission*</label>
                        <textarea name="mission" id="mission" class="form-control m-bottom10"><?php echo $about['mission']?></textarea>
                        <label class="m-bottom5">Strategy*</label>
                        <textarea name="strategy" id="strategy" class="form-control m-bottom10"><?php echo $about['strategy']?></textarea>
                        <label class="m-bottom5">History*</label>
                        <textarea name="history" id="history" class="form-control m-bottom10"><?php echo $about['history']?></textarea>
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