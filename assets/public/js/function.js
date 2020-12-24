// Insert Data Inbox
$("#submitInbox").on('submit' , function(e) {
    e.preventDefault();
    debugger;
    var name=$('#name').val();
    var email=$('#email').val();
    var subject=$('#subject').val();
    var message=$('#message').val();
    var formData = new FormData(this);

    if(name == "" || email == "" || subject == "" || message == ""){
        alert("Name, Email, Subject and Message can't be empty");
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

function clearFormContact(){
    $("#name").val("");
    $("#email").val("");
    $("#subject").val("");
    $("#message").val("");
}