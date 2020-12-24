<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Home Content</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="float:left">Edit Home Content</h6>
            <select class="form-control" style="width:200px; float:right" id="selectLanguage">
                <option value="<?php echo base_url()?>admin/homecontent_id" <?php echo ($home['id'] == "IWIHO001") ? 'selected':''?>>Indonesia</option>
                <option value="<?php echo base_url()?>admin/homecontent_en" <?php echo ($home['id'] == "IWIHO002") ? 'selected':''?>>English</option>
            </select>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEditHomeContent" action="<?php echo base_url()?>admin/updatehomecontent/<?php echo $home['id']?>">
                <div class="row">
                    <div class="col col-md-12">
                        <input type="hidden" name="id" id="id" value="<?php echo $home['id']?>">
                        <label class="m-bottom5">Description About IWI*</label>
                        <textarea name="descabout" id="descabout" class="form-control m-bottom10"><?php echo $home['about']?></textarea>
                        <label class="m-bottom5">Description Services IWI**</label>
                        <textarea name="descservices" id="descservices" class="form-control m-bottom10"><?php echo $home['services']?></textarea>
                        <label class="m-bottom5">Description Client IWI**</label>
                        <textarea name="descproject" id="descproject" class="form-control m-bottom10"><?php echo $home['project']?></textarea>
                        <label class="m-bottom5">Description Teams IWI**</label>
                        <textarea name="descteams" id="descteams" class="form-control m-bottom10"><?php echo $home['teams']?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6">
                        <label class="m-bottom5">Leader Photo</label>
                        <input type="file" name="image" class="form-control m-bottom10">
                        <input type="hidden" name="currentimage" value="<?php echo $home['image']?>">
                        <img src="<?php echo base_url()?>assets/images/<?php echo $home['image']?>" style="width: 120px">
                    </div>
                    <div class="col col-md-6">
                        <label class="m-bottom5">Leader Name*</label>
                        <input type="text" name="name" class="form-control m-bottom10" value="<?php echo $home['name']?>">
                        <label class="m-bottom5">Leader Position*</label>
                        <input type="text" name="position" class="form-control m-bottom10" value="<?php echo $home['position']?>">
                        <label class="m-bottom5">Description Lead*</label>
                        <textarea name="desclead" id="desclead" class="form-control m-bottom10" rows="5"><?php echo $home['aboutlead']?></textarea>
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