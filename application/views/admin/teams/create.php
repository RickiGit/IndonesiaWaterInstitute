<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Teams</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Team</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitTeams">
                <div class="row">
                    <div class="col col-md-6">
                        <label class="m-bottom5">Name*</label>
                        <input type="text" name="name" id="name" class="form-control m-bottom10">
                        <label class="m-bottom5">Job Position*</label>
                        <input type="text" name="position" id="position" class="form-control m-bottom10">
                        <label class="m-bottom5">Graduate*</label>
                        <input type="text" name="graduate" id="graduate" class="form-control m-bottom10">
                        <label class="m-bottom5">Image*</label>
                        <input type="file" name="image" id="image" class="form-control m-bottom10">
                    </div>
                    <div class="col col-md-6">
                        <label class="m-bottom5">URL Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control m-bottom10">
                        <label class="m-bottom5">URL Twitter</label>
                        <input type="text" name="twitter" id="twitter" class="form-control m-bottom10">
                        <label class="m-bottom5">URL Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control m-bottom10">
                        <label class="m-bottom5">URL Linkedin</label>
                        <input type="text" name="linkedin" id="linkedin" class="form-control m-bottom10">
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