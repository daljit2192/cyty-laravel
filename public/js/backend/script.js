$("document").ready(function(){
    $("._delete_cat").on("click",function(){
        $("body").find("#_category_id").val($(this).attr("data-id"));
    });
    
    $("._delete_ok").on("click",function(){
        $.ajax({
            url:"http://"+window.location.host+"/admin/category/delete/"+$("body").find("#_category_id").val(),
            type:"get",
            success:function(){
                $("body").find(".cat_row_"+$("body").find("#_category_id").val()).remove();
            },
            error:function(){
                console.log("error");
            }
        });
    });
});