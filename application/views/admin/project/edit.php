<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Project</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Project</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEditProjects" action="<?php echo base_url()?>admin/updateproject/<?php echo $project['id']?>">
                <div class="row">
                    <div class="col col-md-12">
                        <input type="hidden" id="baseurl" value="<?php echo base_url()?>">
                        <label class="m-bottom5">Title*</label>
                        <input type="text" name="title" id="title" class="form-control m-bottom10" value="<?php echo $project['title']?>">
                        <label class="m-bottom5">Cover*</label>
                        <input type="file" name="image" id="image" class="form-control m-bottom10">
                        <input type="hidden" name="currentimage" id="currentimage" value="<?php echo $project['title']?>">
                        <label class="m-bottom5">Content*</label>
                        <textarea name="editcontentdesc" id="editcontentdesc" class="form-control m-bottom10"><?php echo $project['content']?></textarea>
                        <label class="m-bottom5">Status*</label>
                        <select class="form-control m-bottom10" name="status" id="status">
                            <option value="1" <?php echo ($project['isactive'] == 1) ? "selected" : ""?>>Active</option>
                            <option value="0" <?php echo ($project['isactive'] == 0) ? "selected" : ""?>>Not Active</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-md-12">
                        <input type="submit" class="btn btn-primary btn-save" value="Save Data"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>