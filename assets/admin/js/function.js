var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

$(document).ready(function(){
    $('#vision').summernote({
        height: "150px",
        callbacks: {
            onImageUpload: function(image) {
                uploadImageVision(image[0], "#vision");
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    $('#mission').summernote({
        height: "150px",
        callbacks: {
            onImageUpload: function(image) {
                uploadImageVision(image[0], "#mission");
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    $('#strategy').summernote({
        height: "150px",
        callbacks: {
            onImageUpload: function(image) {
                uploadImageVision(image[0], "#strategy");
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    $('#history').summernote({
        height: "150px",
        callbacks: {
            onImageUpload: function(image) {
                uploadImageVision(image[0], "#history");
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    $('#contentdesc').summernote({
        height: "180px",
        callbacks: {
            onImageUpload: function(image) {
                uploadImageVision(image[0], "#contentdesc");
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    function uploadImageVision(image, target) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: "uploadimage",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                $(target).summernote("insertImage", url);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteImage(src) {
        $.ajax({
            data: {src : src},
            type: "POST",
            url: "deleteimage",
            cache: false,
            success: function(response) {
                console.log(response);
            }
        });
    }

});
// Insert Data Team
$("#submitTeams").on('submit' , function(e) {
    e.preventDefault();
    var name=$('#name').val();
    var job=$('#position').val();
    var graduate=$('#graduate').val();
    var image=$('#image').val();
    var formData = new FormData(this);

    if(name == "" || job == "" || graduate == "" || image == ""){
        alert("Name, Job Position, Graduate, and Image can't be empty");
    }else{
        $.ajax({
            url:"insertteams",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormTeams();
                alert(data);
            }
        });
    }

    return false;
});

// Update Data Teams
$("#submitEditTeams").on('submit' , function(e) {
    e.preventDefault();
    debugger;

    var id=$('#id').val();
    var name=$('#name').val();
    var job=$('#position').val();
    var graduate=$('#graduate').val();
    var urlAction = $('#submitEditTeams').attr('action');

    var formData = new FormData(this);

    if(name == "" || job == "" || graduate == ""){
        alert("Name, Job Position, and Graduate can't be empty");
    }else{
        $.ajax({
            url:urlAction,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                window.location = baseUrl + '/admin/teams';
            }
        });
    }

    return false;
});

// Update Data About
$("#submitEditAbout").on('submit' , function(e) {
    e.preventDefault();
    debugger;

    var id=$('#id').val();
    var vision=$('#vision').val();
    var mission=$('#mission').val();
    var strategy=$('#strategy').val();
    var history=$('#history').val();
    var urlAction = $('#submitEditAbout').attr('action');

    var formData = new FormData(this);

    if(vision == "" || mission == "" || strategy == "" || history == ""){
        alert("Vision, Mission, Strategy, and History can't be empty");
    }else{
        $.ajax({
            url:urlAction,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                window.location = baseUrl + '/admin/about';
            }
        });
    }

    return false;
});

// Update Data Contact
$("#submitEditContact").on('submit' , function(e) {
    e.preventDefault();
    debugger;

    var address=$('#address').val();
    var email=$('#email').val();
    var phone=$('#phone').val();
    var urlAction = $('#submitEditContact').attr('action');

    var formData = new FormData(this);

    if(address == "" || email == "" || phone == "" ){
        alert("Address, Email, and Phone can't be empty");
    }else{
        $.ajax({
            url:urlAction,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                window.location = baseUrl + '/admin/contact';
            }
        });
    }

    return false;
});

// Insert Data Services
$("#submitServices").on('submit' , function(e) {
    e.preventDefault();
    var name=$('#name').val();
    var formData = new FormData(this);

    if(name == ""){
        alert("Name can't be empty");
    }else{
        $.ajax({
            url:"insertservices",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormServices();
                alert(data);
            }
        });
    }

    return false;
});

// Update Data Services
$("#submitEditServices").on('submit' , function(e) {
    e.preventDefault();
    debugger;

    var name=$('#name').val();
    var urlAction = $('#submitEditServices').attr('action');

    var formData = new FormData(this);

    if(name == ""){
        alert("Name can't be empty");
    }else{
        $.ajax({
            url:urlAction,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                window.location = baseUrl + '/admin/services';
            }
        });
    }

    return false;
});

// Insert Data Projects
$("#submitProjects").on('submit' , function(e) {
    e.preventDefault();
    var title=$('#title').val();
    var content=$('#contentdesc').val();
    var image=$('#image').val();
    var formData = new FormData(this);

    if(title == "" || content == "" || image == ""){
        alert("Title, Cover, and Content can't be empty");
    }else{
        $.ajax({
            url:"insertproject",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormProjects();
                alert(data);
            }
        });
    }

    return false;
});

// Update Data Projects
$("#submitEditProjects").on('submit' , function(e) {
    e.preventDefault();
    debugger;

    var title=$('#title').val();
    var content=$('#contentdesc').val();
    var urlAction = $('#submitEditProjects').attr('action');

    var formData = new FormData(this);

    if(title == "" || content == ""){
        alert("Title and Content can't be empty");
    }else{
        $.ajax({
            url:urlAction,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                window.location = baseUrl + '/admin/projects';
            }
        });
    }

    return false;
});

// Insert Data Country
$("#submitCountry").on('submit' , function(e) {
    e.preventDefault();
    debugger;
    var name=$('#name').val();
    var formData = new FormData(this);

    if(name == ""){
        alert("Name can't be empty");
    }else{
        $.ajax({
            url:"insertcountry",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormCountry();
                alert(data);
            }
        });
    }

    return false;
});

// Update Data Projects
$("#submitEditCountry").on('submit' , function(e) {
    e.preventDefault();

    var name=$('#name').val();
    var urlAction = $('#submitEditCountry').attr('action');

    var formData = new FormData(this);

    if(name == ""){
        alert("Name can't be empty");
    }else{
        $.ajax({
            url:urlAction,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                window.location = baseUrl + '/admin/country';
            }
        });
    }

    return false;
});

// Insert Data Client
$("#submitClient").on('submit' , function(e) {
    e.preventDefault();
    debugger;
    var name=$('#name').val();
    var country=$('#country').val();
    var formData = new FormData(this);

    if(name == ""){
        alert("Name can't be empty");
    }else{
        $.ajax({
            url:"insertclient",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormCountry();
                alert(data);
            }
        });
    }

    return false;
});

// Update Data Client
$("#submitEditClient").on('submit' , function(e) {
    e.preventDefault();

    var name=$('#name').val();
    var urlAction = $('#submitEditClient').attr('action');

    var formData = new FormData(this);

    if(name == ""){
        alert("Name can't be empty");
    }else{
        $.ajax({
            url:urlAction,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                window.location = baseUrl + '/admin/client';
            }
        });
    }

    return false;
});

// Insert Data Book
$("#submitBook").on('submit' , function(e) {
    e.preventDefault();
    debugger;
    var title=$('#title').val();
    var author=$('#author').val();
    var publisher=$('#publisher').val();
    var formData = new FormData(this);

    if(title == "" || author == "" || publisher == ""){
        alert("Title, Author, and Publisher can't be empty");
    }else{
        $.ajax({
            url:"insertbook",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormBook();
                alert(data);
            }
        });
    }

    return false;
});

// Update Data Book
$("#submitEditBook").on('submit' , function(e) {
    e.preventDefault();

    var title=$('#title').val();
    var author=$('#author').val();
    var publisher=$('#publisher').val();
    var urlAction = $('#submitEditBook').attr('action');

    var formData = new FormData(this);

    if(title == "" || author == "" || publisher == ""){
        alert("Title, Author, and Publisher can't be empty");
    }else{
        $.ajax({
            url:urlAction,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                window.location = baseUrl + '/admin/book';
            }
        });
    }

    return false;
});

// Clear Form Teams
function clearFormTeams(){
    $("#name").val("");
    $("#position").val("");
    $("#graduate").val("");
    $("#image").val("");
    $("#facebook").val("");
    $("#twitter").val("");
    $("#linkedin").val("");
    $("#instagram").val("");
}

// Clear Form Services
function clearFormServices(){
    $("#name").val("");
    $("#description").val("");
}

// Clear Form Services
function clearFormProjects(){
    $("#title").val("");
    $("#contentdesc").summernote("reset");
    $("#image").val("");
    $("select#status")[0].selectedIndex = 0;
}

// Clear Form Services
function clearFormCountry(){
    $("#name").val("");
}

// Clear Form Book
function clearFormBook(){
    $("#title").val("");
    $("#author").val("");
    $("#publisher").val("");
    $("select#type")[0].selectedIndex = 0;
}