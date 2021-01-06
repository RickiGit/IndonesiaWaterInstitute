<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Events</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Event</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitEvents">
                <div class="row">
                    <div class="col col-md-12">
                        <label class="m-bottom5">Title*</label>
                        <input type="text" name="title" id="title" class="form-control m-bottom10">
                        <label class="m-bottom5">Cover*</label>
                        <input type="file" name="image" id="image" class="form-control m-bottom10">
                        <label class="m-bottom5">Content*</label>
                        <textarea name="contentdesc" id="contentdesc" class="form-control m-bottom10"></textarea>
                        <label class="m-bottom5">Language*</label>
                        <select class="form-control" name="language" id="language">
                            <option value="0">Indonesia</option>
                            <option value="1">English</option>
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