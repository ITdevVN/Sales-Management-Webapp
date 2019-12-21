
$(document).ready(function(){


    $('#messagethem').click(function(){
        $('#messagethem').fadeOut();
    })

    $('#messagesua').click(function(){
        $('#messagesua').fadeOut();
    })


    //Sự kiện thêm
    $('#thembutton').on('click',function(){
        $('#background-popup').removeClass('hide');
        $('#popup-them').removeClass('hide');
    });


    $('#formthem').submit(function(e){
        var route=$('#formthem').data('route'); //lấy url chuyển tới controller khi click submit
        $.ajax({
            type: "POST",
            url: route,
            data: new FormData(this), // gửi dữ liệu từ form qua controller
            dataType: 'JSON',
            contentType: false,
            cache:false,
            processData: false,
            success: function(res){
                if (res.flag==1){
                $('#tablediv').fadeOut();
                $('#tablediv').fadeIn();
                $('#tablediv').html(res.output);
                $('#background-popup').addClass('hide');
                $('#popup-them').addClass('hide');

                $('#them_tensanpham').val("");
                $('#them_chitietsanpham').val("");
                $('#them_giaban').val("");
                $('#them_giavon').val("");
                $('#them_tonkho').val("");
                $('#them_trangthai').val("");
                $('#them_file1').val("");
                $('#them_file2').val("");
                $('#them_file3').val("");
                $('#messagethem').fadeOut();
                $('#alert').delay(5).fadeTo("slow",0.6);
                }else{
                    $('#messagethem').fadeIn();
                    $('#messagethem').html("<div class=\"alert alert-danger \"><ul id=\"itemdiv\"></ul></div>");
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


    $('#btnHuyThem').click(function(){
        $('#background-popup').addClass('hide');
        $('#popup-them').addClass('hide');
        $('#them_tensanpham').val("");
                $('#them_chitietsanpham').val("");
                $('#them_giaban').val("");
                $('#them_giavon').val("");
                $('#them_tonkho').val("");
                $('#them_trangthai').val("");
                $('#them_file1').val("");
                $('#them_file2').val("");
                $('#them_file3').val("");
        $('#messagethem').fadeOut();

    });


    //Event for Editing

    $('#suabutton').click(function(){
        //kiểm tra liệu người dùng đã check hay chưa
       if (($('input[type=checkbox]:checked').not('#checkall').length<2) && ($('input[type=checkbox]:checked').not('#checkall').length>=1)){

        $('#background-popup').removeClass('hide');
        $('#popup-sua').removeClass('hide');

        $('.checkbox-group').each(function(){
            if ($(this).prop("checked")==true){
                var ID=parseInt($(this).attr("id").match(/\d+/)); //lấy ra id của nút tick

                $.ajax({
                    type: "GET",
                    url: 'sanpham/laychitietsanpham',
                    data: {'ID':ID}, // gửi dữ liệu từ form qua controller

                    success: function(res){
                        $('#sua_masanpham').val(res[0]);
                        // $('#sua_file1').val(res[1]);
                        // $('#sua_file2').val(res[2]);
                        // $('#sua_file3').val(res[3]);
                        $('#sua_tensanpham').val(res[4]);
                        $('#sua_maloai').val(res[6]);
                        $('#sua_giavon').val(res[7]);
                        $('#sua_giaban').val(res[8]);
                        $('#sua_tonkho').val(res[9]);
                        $('#sua_trangthai').val(res[10]);
                        $('#sua_chitietsanpham').val(res[11]);
                    },
                    error: function(res){
                        alert("Xuất hiện lỗi: "+res);
                    }

                });

            }
        });
       }else{
           $('#result').html('<div class="alert alert-danger">Vui lòng chọn 1 dòng để chỉnh sửa</div>');
       }
    });

    //Xử lý Sửa
    $('#formsua').submit(function(e){

        var route=$('#formsua').data('route'); //lấy url chuyển tới controller khi click submit
        $.ajax({
            type: "POST",
            url: route,
            data: new FormData(this), // gửi dữ liệu từ form qua controller
            dataType: 'JSON',
            contentType: false,
            cache:false,
            processData: false,
            success: function(res){
                if (res.flag==1){
                $('#tablediv').fadeOut();
                $('#tablediv').fadeIn();
                $('#tablediv').html(res.output);
                $('#background-popup').addClass('hide');
                $('#popup-sua').addClass('hide');

                $('#messagesua').fadeOut();
                }else{
                    $('#messagesua').fadeIn();
                    $('#messagesua').html("<div class=\"alert alert-danger\"><ul id=\"itemdiv\"></ul></div>");
                    $.each(res.message,function(index,value){
                        $('#itemdiv').append("<li>"+value+"</li>");
                    });
                }
            }, // Đóng success
            error: function(res){
                alert("Xuất hiện lỗi: "+res);
            }

        }); //Đóng Ajax
        e.preventDefault();
    });


    $('#btnHuysua').click(function(){
        $('#background-popup').addClass('hide');
        $('#popup-sua').addClass('hide');
        $('#messagesua').fadeOut();
    });

    //Event for Deleting
    $('#xoabutton').click(function(){
        if (($('input[type=checkbox]:checked').not('#checkall').length<2) && ($('input[type=checkbox]:checked').not('#checkall').length>=1)){
        //xet 2 truong hop
        if ($('#checkall').prop("checked")==true){

            $.ajax({
                type:"GET",
                url:'sanpham/xoatatca',
                data:"",
            }).done(function(res){
                $('#tablediv').fadeOut();
                $('#tablediv').fadeIn();
                $('#tablediv').html(res);
            })

            $('#background-popup').addClass('hide');
            $('#popup-them').addClass('hide');
            //truong hop xoa tung dong
        }else{
            var listCheckBoxXoa=[];
            $('.checkbox-group').each(function(){
                if ($(this).prop("checked")==true){
                    var ID=parseInt($(this).attr("id").match(/\d+/));
                    listCheckBoxXoa.push(ID);
                    $.ajax({
                        type:"GET",
                        url:'khuyenmai/xoa',
                        data:{'ID':ID},
                    }).done(function(res){
                        $('#tablediv').fadeOut();
                            $('#tablediv').fadeIn();
                            $('#tablediv').html(res);
                    })

                }
            });

         }
        }else{
            $('#result').html('<div class="alert alert-danger">Chọn ít nhất 1 dòng để xóa</div>');
        }
    });

    $('#timkiem').change(function(){
        var loaiTimKiem=$('#SelectForm').find(":selected").val();
        var keyWord=$('#timkiem').val();
        $.ajax({
            type:"GET",
            url:'nhacungcap/timkiem',
            data:{'keyWord':keyWord,'loaiTimKiem':loaiTimKiem}
        }).done(function(res){
            $('#tablediv').fadeOut();
                $('#tablediv').fadeIn();
                $('#tablediv').html(res);
        })
    });

    //Validate

})
