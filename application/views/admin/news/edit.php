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
                        <input type="text" name="title" id="title" class="form-control m-bottom10" value="<?php echo $news['title']?>">
                        <label class="m-bottom5">Cover</label>
                        <input type="file" name="image" id="image" class="form-control m-bottom10" accept="image/*">
                        <input type="hidden" name="currentimage" id="currentimage" value="<?php echo $news['cover']?>">
                        <label class="m-bottom5">Content*</label>
                        <textarea name="contentdesc" id="contentdesc" class="form-control m-bottom10"></textarea>
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

<script>
    window.addEventListener("load", function(){
        debugger;
        $('#contentdesc').summernote('code', "<?php echo str_replace("\"","'", $news['content']) ?>");
    });
</script>