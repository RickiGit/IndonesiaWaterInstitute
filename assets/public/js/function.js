var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

// Insert Data Inbox
$("#submitInbox").on('submit' , function(e) {
    e.preventDefault();
    debugger;
    var name=$('#name').val();
    var email=$('#email').val();
    var subject=$('#subject').val();
    var message=$('#message').val();
    var captcha=$('#captcha').val();
    var valueCaptcha=$('#valueCaptcha').val();
    var formData = new FormData(this);

    if(name == "" || email == "" || subject == "" || message == ""){
        alert("Name, Email, Subject and Message can't be empty");
    }else if(captcha != valueCaptcha){
        alert("The captcha you entered is incorrect");
    }else{
        $.ajax({
            url:"contact/sendmessage",
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                location.reload();
            }
        });
    }

    return false;
});

// Insert Data Inbox
$("#submitRequest").on('submit' , function(e) {
    e.preventDefault();
    debugger;

    baseUrl = baseUrl + "/publication/sendrequest";

    var captcha=$('#captcha').val();
    var valueCaptcha=$('#valueCaptcha').val();

    var formData = new FormData(this);

    if(captcha != valueCaptcha){
        alert("The captcha you entered is incorrect");
    }else{
        $.ajax({
            url:baseUrl,
            type: "POST",
            mimeType: "multipart/form-data",
            data : formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                window.open(data, '_blank');
                window.history.back();
            }
        });
    }

    return false;
});

function clearFormContact(){
    $("#name").val("");
    $("#email").val("");
    $("#subject").val("");
    $("#message").val("");
}