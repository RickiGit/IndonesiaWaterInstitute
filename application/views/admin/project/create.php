<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Project</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Project</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitProjects">
                <div class="row">
                    <div class="col col-md-12">
                        <label class="m-bottom5">Title*</label>
                        <input type="text" name="title" id="title" class="form-control m-bottom10">
                        <label class="m-bottom5">Cover*</label>
                        <input type="file" name="image" id="image" class="form-control m-bottom10">
                        <label class="m-bottom5">Content*</label>
                        <textarea name="contentdesc" id="contentdesc" class="form-control m-bottom10"></textarea>
                        <label class="m-bottom5">Status*</label>
                        <select class="form-control m-bottom10" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
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