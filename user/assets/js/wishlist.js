
function addwishlist(e){

    //alert($(e).attr("data-pid"));

    $.ajax({
        url: "ajax.php?action=addwishlist", 
        type: "POST",
        data: {
            productid : $(e).attr("data-pid"),
        },
        success: function(result){   
       
                Swal.fire({
                    icon: 'success',
                    title: 'Added to Wishlist '
                  });
        }
    });
}