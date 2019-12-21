$(document).ready(function() {

    $('#messagethem').click(function() {
        $('#messagethem').fadeOut();
    });

    $('#messagesua').click(function() {
        $('#messagesua').fadeOut();
    });
    $('#messagetao').click(function() {
        $('#messagetao').fadeOut();
    });

    //Event for Adding
    $('#thembutton').on('click', function() {
        $('#background-popup').removeClass('hide');
        $('#popup-them').removeClass('hide');

    });


    $('#formthem').submit(function(e) {
        var route = $('#formthem').data('route'); //lấy url chuyển tới controller khi click submit
        $.ajax({
            type: "POST",
            url: route,
            data: new FormData(this), // gửi dữ liệu từ form qua controller
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.flag == 1) {
                    $('#tablediv').fadeOut();
                    $('#tablediv').fadeIn();
                    $('#tablediv').html(res.output);
                    $('#background-popup').addClass('hide');
                    $('#popup-them').addClass('hide');

                    $('#them_tennhanvien').val("");
                    $('#them_cmnd').val("");
                    $('#them_sodienthoai').val("");
                    $('#them_ngaysinh').val("");
                    $('#them_gioitinh').val("");
                    $('#them_trangthai').val("");
                    $('#them_manguoiquanly').val("");
                    $('#them_ghichu').val("");
                    $('#them_diachi').val("");
                    $('#them_email').val("");
                    $('#them_pass').val("");
                    $('#them_loaitaikhoan').val("");
                    $('#messagethem').fadeOut();
                    $('#alert').delay(5).fadeTo("slow", 0.6);
                    location.reload();
                } else {
                    $('#messagethem').fadeIn();
                    $('#messagethem').html("<div class=\"alert alert-danger \"><ul id=\"itemdiv\"></ul></div>");
                    $.each(res.message, function(index, value) {
                        $('#itemdiv').append("<li>" + value + "</li>");
                    });

                }
            },
            error: function(res) {
                alert("Xuất hiện lỗi: " + res);
            }

        });
        e.preventDefault();
    });


    $('#btnHuyThem').click(function() {
        $('#background-popup').addClass('hide');
        $('#popup-them').addClass('hide');
        $('#them_tennhanvien').val("");
        $('#them_cmnd').val("");
        $('#them_sodienthoai').val("");
        $('#them_ngaysinh').val("");
        $('#them_gioitinh').val("");
        $('#them_trangthai').val("");
        $('#them_manguoiquanly').val("");
        $('#them_ghichu').val("");
        $('#them_diachi').val("");
        $('#them_email').val("");
        $('#them_pass').val("");
        $('#them_loaitaikhoan').val("");
        $('#messagethem').fadeOut();

    });







    //Event for Editing

    $('#suabutton').click(function() {
        //kiểm tra liệu người dùng đã check hay chưa
        if (($('input[type=checkbox]:checked').not('#checkall').length < 2) && ($('input[type=checkbox]:checked').not('#checkall').length >= 1)) {

            $('#background-popup').removeClass('hide');
            $('#popup-sua').removeClass('hide');

            $('.checkbox-group').each(function() {
                if ($(this).prop("checked") == true) {
                    var ID = parseInt($(this).attr("id").match(/\d+/)); //lấy ra id của nút tick

                    $.ajax({
                        type: "GET",
                        url: 'nhanvien/laychitietnhanvien',
                        data: { 'ID': ID }, // gửi dữ liệu từ form qua controller
                        success: function(res) {
                            $('#sua_manhanvien').val(res[0]); //thứ tự output
                            $('#sua_tennhanvien').val(res[1]);
                            $('#sua_cmnd').val(res[2]);
                            $('#sua_sodienthoai').val(res[3]);
                            $('#sua_ngaysinh').val(res[4]);
                            $('#sua_gioitinh').val(res[5]);
                            $('#sua_trangthai').val(res[6]);
                            $('#sua_manguoiquanly').val(res[7]);
                            $('#sua_ghichu').val(res[8]);
                            $('#sua_diachi').val(res[9]);
                            $('#sua_email').val(res[10]);
                            $('#sua_pass').val(res[11]);
                            $('#sua_loaitaikhoan').val(res[12]);
                            $('#sua_doanhso').val(res[13]);

                        },
                        error: function(res) {
                            alert("Xuất hiện lỗi: " + res);
                        }

                    });

                }
            });
        } else {
            $('#result').html('<div class="alert alert-danger">Vui lòng chọn 1 dòng để chỉnh sửa</div>');
        }
    });

    //Xử lý Sửa
    $('#formsua').submit(function(e) {
        var route = $('#formsua').data('route'); //lấy url chuyển tới controller khi click submit
        $.ajax({
            type: "POST",
            url: route,
            data: new FormData(this), // gửi dữ liệu từ form qua controller
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.flag == 1) {
                    $('#tablediv').fadeOut();
                    $('#tablediv').fadeIn();
                    $('#tablediv').html(res.output);
                    $('#background-popup').addClass('hide');
                    $('#popup-sua').addClass('hide');

                    $('#sua_tennhanvien').val("");
                    $('#sua_cmnd').val("");
                    $('#sua_sodienthoai').val("");
                    $('#sua_ngaysinh').val("");
                    $('#sua_gioitinh').val("");
                    $('#sua_trangthai').val("");
                    $('#sua_manguoiquanly').val("");
                    $('#sua_ghichu').val("");
                    $('#sua_diachi').val("");
                    $('#sua_email').val("");
                    $('#sua_pass').val("");
                    $('#sua_loaitaikhoan').val("");
                    $('#messagesua').fadeOut();
                    $('#alert').delay(5).fadeTo("slow", 0.6);
                    location.reload();
                } else {
                    $('#messagesua').fadeIn();
                    $('#messagesua').html("<div class=\"alert alert-danger \"><ul id=\"itemdiv\"></ul></div>");
                    $.each(res.message, function(index, value) {
                        $('#itemdiv').append("<li>" + value + "</li>");
                    });

                }
            },
            error: function(res) {
                alert("Xuất hiện lỗi: " + res);
            }

        });
        e.preventDefault();
    });


    $('#btnHuysua').click(function() {
        $('#background-popup').addClass('hide');
        $('#popup-sua').addClass('hide');
        $('#sua_tennhanvien').val("");
        $('#sua_cmnd').val("");
        $('#sua_sodienthoai').val("");
        $('#sua_ngaysinh').val("");
        $('#sua_gioitinh').val("");
        $('#sua_trangthai').val("");
        $('#sua_manguoiquanly').val("");
        $('#sua_ghichu').val("");
        $('#sua_diachi').val("");
        $('#sua_email').val("");
        $('#sua_pass').val("");
        $('#sua_loaitaikhoan').val("");
        $('#messagesua').fadeOut();

    });


    //Event for Deleting
    $('#xoabutton').click(function() {
        if (($('input[type=checkbox]:checked').not('#checkall').length < 2) && ($('input[type=checkbox]:checked').not('#checkall').length >= 1)) {
            //xet 2 truong hop
            if ($('#checkall').prop("checked") == true) {

                $.ajax({
                    type: "GET",
                    url: 'nhanvien/xoatatca',
                    data: "",
                }).done(function(res) {
                    $('#tablediv').fadeOut();
                    $('#tablediv').fadeIn();
                    $('#tablediv').html(res);
                })

                $('#background-popup').addClass('hide');
                $('#popup-them').addClass('hide');
                //truong hop xoa tung dong
            } else {
                var listCheckBoxXoa = [];
                $('.checkbox-group').each(function() {
                    if ($(this).prop("checked") == true) {
                        var ID = parseInt($(this).attr("id").match(/\d+/));
                        listCheckBoxXoa.push(ID);
                        $.ajax({
                            type: "GET",
                            url: 'nhanvien/xoa',
                            data: { 'ID': ID },
                        }).done(function(res) {
                            $('#tablediv').fadeOut();
                            $('#tablediv').fadeIn();
                            $('#tablediv').html(res);
                        })

                    }
                });

            }
        } else {
            $('#result').html('<div class="alert alert-danger">Chọn ít nhất 1 dòng để xóa</div>');
        }
    });





});