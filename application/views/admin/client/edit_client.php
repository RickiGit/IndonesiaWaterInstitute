<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Client</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Client</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEditClient" action="<?php echo base_url()?>admin/updateclient/<?php echo $client['id']?>">
                <div class="row">
                    <div class="col col-md-6">
                        <label class="m-bottom5">Name*</label>
                        <input type="text" name="name" id="name" class="form-control m-bottom10" value="<?php echo $client['name']?>">
                        <label class="m-bottom5">Country*</label>
                        <select name="country" id="country" class="form-control m-bottom10">
                            <?php
                                foreach($country as $c){
                            ?>
                                    <option value="<?php echo $c['id']?>" <?php echo ($client['idcountry'] == $c['id']) ? 'selected':''?> ><?php echo $c['name']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <label class="m-bottom5">Logo</label>
                        <input type="file" name="image" id="image" class="form-control m-bottom10">
                        <input type="hidden" name="currentimage" id="currentimage" value="<?php echo $client['image']?>">
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