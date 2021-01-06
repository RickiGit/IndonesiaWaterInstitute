var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

$(document).ready(function(){
    $('#selectLanguage').on('change', function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });

    $('#vision').summernote({
        height: "150px",
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0], "#vision");
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
                uploadImage(image[0], "#mission");
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
                uploadImage(image[0], "#strategy");
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
                uploadImage(image[0], "#history");
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
                debugger;
                uploadImage(image[0], "#contentdesc");
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    $('#editcontentdesc').summernote({
        height: "180px",
        callbacks: {
            onImageUpload: function(image) {
                debugger;
                uploadEditImage(image[0], "#editcontentdesc");
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    function uploadImage(image, target) {
        debugger;
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

    function uploadEditImage(image, target) {
        debugger;
        var baseurl=$('#baseurl').val();
        baseurl = baseurl + "/admin/uploadimage";
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: baseurl,
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

    if(name == "" || job == "" || graduate == "" ){
        alert("Name, Job Position, and Graduate can't be empty");
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

// Insert Data Events
$("#submitEvents").on('submit' , function(e) {
    e.preventDefault();
    var title=$('#title').val();
    var content=$('#contentdesc').val();
    var image=$('#image').val();
    var formData = new FormData(this);

    if(title == "" || content == "" || image == ""){
        alert("Title, Cover, and Content can't be empty");
    }else{
        $.ajax({
            url:"insertevent",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormEvent();
                alert(data);
            }
        });
    }

    return false;
});


// Update Data Events
$("#submitEditEvent").on('submit' , function(e) {
    e.preventDefault();
    debugger;

    var title=$('#title').val();
    var content=$('#contentdesc').val();
    var urlAction = $('#submitEditEvent').attr('action');

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
                window.location = baseUrl + '/admin/events';
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

// Insert Data News
$("#submitNews").on('submit' , function(e) {
    e.preventDefault();
    debugger;
    var title=$('#title').val();
    var content=$('#contentdesc').val();
    var image=$('#image').val();
    var formData = new FormData(this);

    if(title == "" || image == "" || content == ""){
        alert("Title, Cover, and Content can't be empty");
    }else{
        $.ajax({
            url:"insertnews",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormNews();
                alert(data);
            }
        });
    }

    return false;
});

// Update Data News
$("#submitEditNews").on('submit' , function(e) {
    e.preventDefault();

    debugger;
    var title=$('#title').val();
    var content=$('#contentdesc').val();
    var urlAction = $('#submitEditNews').attr('action');

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
                window.location = baseUrl + '/admin/news';
            }
        });
    }

    return false;
});

// Insert Data User
$("#submitUser").on('submit' , function(e) {
    e.preventDefault();
    debugger;
    var name=$('#name').val();
    var phone=$('#phone').val();
    var email=$('#email').val();
    var image=$('#image').val();
    var password=$('#password').val();
    var confirmpassword=$('#confirmpassword').val();

    var formData = new FormData(this);

    if(name == "" || phone == "" || email == "" || image == "" || password == ""){
        alert("Name, Phone, Email, Password, and Image can't be empty");
    }else if(password != confirmpassword){
        alert("Password not match with Confirmation Password");
    }
    else{
        $.ajax({
            url:"insertuser",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormUser();
                alert(data);
            }
        });
    }

    return false;
});

// Update Data User
$("#submitEditUser").on('submit' , function(e) {
    
    e.preventDefault();

    var id=$('#id').val();
    var name=$('#name').val();
    var phone=$('#phone').val();
    var email=$('#email').val();

    var urlAction = $('#submitEditUser').attr('action');

    var formData = new FormData(this);

    if(name == "" || phone == "" || email == ""){
        alert("Name, Phone, and Email can't be empty");
    }else{
        debugger;
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
                window.location = baseUrl + '/admin/user';
            }
        });
    }

    return false;
});

// Update Data Password User
$("#submitEditUserPassword").on('submit' , function(e) {
    
    e.preventDefault();

    var currentpass=$('#currentpassword').val();
    var newpass=$('#password').val();
    var confirmpass=$('#confirmpassword').val();

    var urlAction = $('#submitEditUserPassword').attr('action');

    var formData = new FormData(this);

    if(currentpass == "" || newpass == "" || confirmpass == ""){
        alert("Current Password, New Password and Confirmation Password can't be empty");
    }else if(newpass != confirmpass){
        alert("New Password and Confirmation Password is not match");
    }
    else{
        debugger;
        $.ajax({
            url:urlAction,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                if(data == "0"){
                    alert("Current Password is Wrong");
                }else{
                    alert("Data saved successfully");
                    window.location = baseUrl + '/admin/user';
                }
                
            }
        });
    }

    return false;
});

// Insert Data Slide Header
$("#submitSlideHeader").on('submit' , function(e) {
    e.preventDefault();
    debugger;
    var title=$('#title').val();
    var description=$('#description').val();

    var formData = new FormData(this);

    if(title == "" || description == ""){
        alert("Title and Description can't be empty");
    }
    else{
        $.ajax({
            url:"insertslideheader",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                clearFormSlide();
                alert(data);
            }
        });
    }

    return false;
});

// Update Data Slide Header
$("#submitEditSlideHeader").on('submit' , function(e) {
    
    e.preventDefault();

    var title=$('#title').val();
    var description=$('#description').val();

    var urlAction = $('#submitEditSlideHeader').attr('action');

    var formData = new FormData(this);

    if(title == "" || description == ""){
        alert("Title and Description can't be empty");
    }
    else
    {
        debugger;
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
                window.location = baseUrl + '/admin/slideheader';
            }
        });
    }

    return false;
});


// Update Data Home Content
$("#submitEditHomeContent").on('submit' , function(e) {
    e.preventDefault();
    debugger;

    var id=$('#id').val();
    var descabout=$('#descabout').val();
    var descservices=$('#descservices').val();
    var descproject=$('#descproject').val();
    var descteams=$('#descteams').val();
    var name=$('#name').val();
    var position=$('#position').val();
    var desclead=$('#desclead').val();

    var urlAction = $('#submitEditHomeContent').attr('action');
    var endUrl = "id";
    if(id == "IWIHO001"){
        endUrl = "homecontent_id";
    }else{
        endUrl = "homecontent_en";
    }

    var formData = new FormData(this);

    if(descabout == "" || descservices == "" || descproject == "" || descteams == "" || name == "" || position == "" || desclead == ""){
        alert("Desc About, Desc Services, Desc Project, Desc Teams, Lead Name, Lead Position, and Desc Lead can't be empty");
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
                window.location = baseUrl + '/admin/' + endUrl;
            }
        });
    }

    return false;
});


// Check Login
$("#loginform").on('submit' , function(e) {
    e.preventDefault();
    debugger;
    var name=$('#email').val();
    var password=$('#password').val();

    var formData = new FormData(this);

    if(name == "" || password == ""){
        alert("Name, and Password can't be empty");
    }
    else{
        $.ajax({
            url:"admin/login",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                if(data != "1"){
                    alert("Username or Password is wrong");
                }else{
                    window.location = baseUrl + '/admin/slideheader';
                }
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
function clearFormEvent(){
    $("#title").val("");
    $("#contentdesc").summernote("reset");
    $("#image").val("");
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

// Clear Form News
function clearFormNews(){
    $("#title").val("");
    $("#contentdesc").summernote("reset");
    $("#image").val("");
}

// Clear Form User
function clearFormUser(){
    $("#name").val("");
    $("select#gender")[0].selectedIndex = 0;
    $("#phone").val("");
    $("#email").val("");
    $("select#level")[0].selectedIndex = 0;
    $("#image").val("");
    $("#password").val("");
    $("#confirmpassword").val("");
}

function clearFormSlide(){
    $("#title").val("");
    $("#description").val("");
}