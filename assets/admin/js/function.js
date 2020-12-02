// Insert Data Teams
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
                console.log(data);
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