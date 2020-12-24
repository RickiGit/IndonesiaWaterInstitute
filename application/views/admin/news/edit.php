<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">News / Media</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit News / Media</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEditNews" action="<?php echo base_url()?>admin/updatenews/<?php echo $news['id']?>">
                <div class="row">
                    <div class="col col-md-12">
                        <label class="m-bottom5">Title*</label>
                        <input type="hidden" id="baseurl" value="<?php echo base_url()?>">
                        <input type="text" name="title" id="title" class="form-control m-bottom10" value="<?php echo $news['title']?>">
                        <label class="m-bottom5">Cover</label>
                        <input type="file" name="image" id="image" class="form-control m-bottom10" accept="image/*">
                        <input type="hidden" name="currentimage" id="currentimage" value="<?php echo $news['cover']?>">
                        <label class="m-bottom5">Content*</label>
                        <textarea name="editcontentdesc" id="editcontentdesc" class="form-control m-bottom10"><?php echo $news['content']?></textarea>
                        <label class="m-bottom5">Language*</label>
                        <select class="form-control" name="language" id="language">
                            <option value="0" <?php echo ($news['language'] == 0) ? 'selected':''?>>Indonesia</option>
                            <option value="1" <?php echo ($news['language'] == 1) ? 'selected':''?>>English</option>
                        </select>
                        <!-- <label class="m-bottom5">File</label>
                        <input type="file" name="anotherfile" id="anotherfile" class="form-control m-bottom10" accept="application/pdf"> -->
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col col-md-12">
                        <input type="submit" class="btn btn-primary btn-save" value="Update Data"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>