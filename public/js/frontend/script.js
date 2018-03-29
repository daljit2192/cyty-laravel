$("document").ready(function(){
    var url = window.location.href;
    if(url.split("/")[url.split("/").length - 1] == "login" || url.split("/")[url.split("/").length - 1] == "register"){
        $(".top").hide();
        $(".header").hide();
        $(".header-top").hide();
        $("#footer").hide();
        $(".footer-bottom").hide();
    }
})