<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" id="submitUser">
                <div class="row">
                    <div class="col col-md-6">
                        <label class="m-bottom5">Name*</label>
                        <input type="text" name="name" id="name" class="form-control m-bottom10">
                        <label class="m-bottom5">Gender</label>
                        <select class="form-control m-bottom10" name="gender" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label class="m-bottom5">Phone*</label>
                        <input type="text" name="phone" id="phone" class="form-control m-bottom10">
                        <label class="m-bottom5">Image*</label>
                        <input type="file" name="image" id="image" class="form-control m-bottom10">
                    </div>
                    <div class="col col-md-6">
                        <label class="m-bottom5">Email*</label>
                        <input type="text" name="email" id="email" class="form-control m-bottom10">
                        <label class="m-bottom5">Password*</label>
                        <input type="password" name="password" id="password" class="form-control m-bottom10">
                        <label class="m-bottom5">Confirmation Password*</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control m-bottom10">
                        <label class="m-bottom5">Access Level</label>
                        <select class="form-control m-bottom10" name="level" id="level">
                            <option value="1">Administrator</option>
                            <option value="2">Viewer</option>
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