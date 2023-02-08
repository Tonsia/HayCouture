
function addwishlist(e){

    //alert($(e).attr("data-pid"));

    $.ajax({
        url: "ajax.php?action=addwishlist", 
        type: "POST",
        data: {
            productid : $(e).attr("data-pid"),
        },
        success: function(result){   
            if(result==1){
                alert("Wishlist Added")
            }
            else{
                //alert(result);
                window.location.href="http://localhost/pro/signin.php";
            }
        }
    });
}