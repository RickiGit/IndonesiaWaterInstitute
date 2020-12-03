<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Contact IWI</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Contact</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEditContact" action="<?php echo base_url()?>admin/updatecontact/<?php echo $contact['id']?>">
                <div class="row">
                    <div class="col col-md-6">
                        <input type="hidden" name="id" id="id" value="<?php echo $contact['id']?>">
                        <label class="m-bottom5">Address*</label>
                        <textarea name="address" id="address" class="form-control m-bottom10"><?php echo $contact['address']?></textarea>
                        <label class="m-bottom5">Email*</label>
                        <input type="email" name="email" id="email" class="form-control m-bottom10" value="<?php echo $contact['email']?>"/>
                        <label class="m-bottom5">Phone*</label>
                        <input type="text" name="phone" id="phone" class="form-control m-bottom10" value="<?php echo $contact['phone']?>"/>
                        <label class="m-bottom5">Fax</label>
                        <input type="text" name="fax" id="fax" class="form-control m-bottom10" value="<?php echo $contact['fax']?>"/>
                    </div>
                    <div class="col col-md-6">
                        <label class="m-bottom5">Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control m-bottom10" value="<?php echo $contact['facebook']?>"/>
                        <label class="m-bottom5">Twitter</label>
                        <input type="text" name="twitter" id="twitter" class="form-control m-bottom10" value="<?php echo $contact['twitter']?>"/>
                        <label class="m-bottom5">Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control m-bottom10" value="<?php echo $contact['instagram']?>"/>
                        <label class="m-bottom5">LInkedIn</label>
                        <input type="text" name="linkedin" id="linkedin" class="form-control m-bottom10" value="<?php echo $contact['linkedin']?>"/>
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