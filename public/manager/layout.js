$(document).ready(function(){
    $('#taikhoan_hienthi').on('click',function(){
        $('#background-hienthi').removeClass('hide');
        $('#popup-them-hienthi').removeClass('hide');

        var idNguoiDung=$('#manhanvien_hienthi').val();
        $.ajax({
            type:"GET",
            url:'homepage/thongtinnguoidung',
            data:{'idNguoiDung':idNguoiDung},
        }).done(function(res){
            $('#hoten_hienthi').val(res[0]);
            $('#email_hienthi').val(res[1]);
            $('#cmnd_hienthi').val(res[2]);
            $('#sodienthoai_hienthi').val(res[3]);
            $('#vaitro_hienthi').val(res[4]);
            $('#ghichu_hienthi').val(res[5]);
            $('#diachi_hienthi').val(res[6]);
        });

    });

    $('#formthem_hienthi').submit(function(e){
        var route=$('#formthem_hienthi').data('route'); //lấy url chuyển tới controller khi click submit
        $.ajax({
            type: "POST",
            url: route,
            data: new FormData(this), // gửi dữ liệu từ form qua controller
            dataType: 'JSON',
            contentType: false,
            cache:false,
            processData: false,
            success: function(res){
                if(res.flag==1){
                    $('#message_hienthi').removeClass('hide');
                    $('#message_hienthi').html("<div class=\"alert alert-success \">Cập nhật thành công</div>");

                }else{
                    $('#message_hienthi').removeClass('hide');
                    $('#message_hienthi').html("<div class=\"alert alert-danger \"  id=\"itemdiv\"></div>");
                    $.each(res.message,function(index,value){
                        $('#itemdiv').append("<li>"+value+"</li>");
                    });
                }
            },
            error: function(res){
                alert("Xuất hiện lỗi: "+res);
            }

        });
        e.preventDefault();
    });

    $('#btnHuy_hienthi').click(function(){
        $('#message_hienthi').addClass('hide');
        $('#background-hienthi').addClass('hide');
        $('#popup-them-hienthi').addClass('hide');
    });

    $('#message_hienthi').click(function(){
        $('#message_hienthi').addClass('hide');
    });

})
