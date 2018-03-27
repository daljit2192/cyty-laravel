$("document").ready(function(){
    var url = window.location.href;
    if(url.split("/")[3] == "login" || url.split("/")[3] == "register" || url.split("/")[4] == "login" || url.split("/")[4] == "register"){
        $(".top").hide();
        $(".header").hide();
        $(".header-top").hide();
        $("#footer").hide();
        $(".footer-bottom").hide();
    }
})