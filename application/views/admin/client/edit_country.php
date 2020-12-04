<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Country</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Country</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEditCountry" action="<?php echo base_url()?>admin/updatecountry/<?php echo $country['id']?>">
                <div class="row">
                    <div class="col col-md-6">
                        <input type="hidden" name="id" id="id" value="<?php echo $country['id']?>">
                        <label class="m-bottom5">Country*</label>
                        <input type="text" name="name" id="name" class="form-control m-bottom10" value="<?php echo $country['name']?>">
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