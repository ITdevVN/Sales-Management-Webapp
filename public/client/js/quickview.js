$(document).ready(function(){
    $('.list-item').click(function(){
        var ma_san_pham=$(this).attr("id");
        $.ajax({
            type:"GET",
            url:'homepage/list-item-popup',
            data:{'ma_san_pham':ma_san_pham}
        }).done(function(res){
            //Lấy thông tin sản phẩm dưới database gán cho từng trường
            $('#tensanpham_quickview').html(res.ten_san_pham);
            $('#tennhomhang_quickview').html(res.ten_nhom_hang);
            $('#giaban_quickview').html(res.gia_ban);
            $('#thongtinsanpham_quickview').html(res.thong_tin_san_pham);
            if (res.ton_kho==0){
                $('#tonkho_quickview').html("Trạng thái: <svg class=\"svg-plus\">\
                <use xlink:href=\"#svg-plus\"></use>\
            </svg>\
            <span class=\"not-available\">"+res.trang_thai+"</span>\
            ")
            }else{
                $('#tonkho_quickview').html("\
               Trạng thái <svg class=\"svg-check\">\
                                                <use xlink:href=\"#svg-check\"></use>\
                                            </svg>\
                <span class=\"available\">"+res.trang_thai+"</span>\
                ")
            }

            if (res.ton_kho==0){
                $('#themgiohang_hethang_quickview').html("\
                <svg class=\"svg-plus\">\
                    <use xlink:href=\"#svg-plus\"></use>\
                </svg>\
                Hết hàng\
                ");
                $('#themgiohang_hethang_quickview').removeClass('cart-add');
                $('#themgiohang_hethang_quickview').addClass('button no-stock');
            }else{
                $('#themgiohang_hethang_quickview').html("\
                <svg class=\"svg-plus\">\
                    <use xlink:href=\"#svg-plus\"></use>\
                </svg>\
                Thêm vào giỏ\
                ");
                $('#themgiohang_hethang_quickview').removeClass('no-stock');
                $('#themgiohang_hethang_quickview').addClass('button cart-add');
            }

        })
    });
})
