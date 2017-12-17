$(document).ready(function () {
    $(".form-group").focusin(function () {
        $("h1").addClass("rainbow");
    });
    
    $("#fileUpload").on("change" , function () {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#profile_img").attr("src",tmppath);
    });

    $("#clear").click(function () {
        $("#email").val("");
        $("#pw").val("");
        $("#name").val("");
        $("#birthday").val("");
        $("#phone").val("");
    });
});