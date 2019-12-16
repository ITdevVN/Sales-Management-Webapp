$(document).ready(function(){
    $('.cart-add').click(function(){
        var ID=parseInt($(this).attr("id").match(/\d+/));
    alert(ID)
    })

    $('.themgiohang_hethang_quickview').click(function(){
        var IDD=parseInt($(this).attr("id").match(/\d+/));
    })
})
