$(document).ready(function() {

    $('#messagethem').click(function() {
        $('#messagethem').fadeOut();
    });

    $('#messagesua').click(function() {
        $('#messagesua').fadeOut();
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

                    $('#them_tenkhachhang').val("");
                    $('#them_cmnd').val("");
                    $('#them_sodienthoai').val("");
                    $('#them_gioitinh').val("");
                    $('#them_ngaysinh').val("");
                    $('#them_trangthai').val("");
                    $('#them_diachi').val("");
                    $('#them_ghichu').val("");
                    $('#them_loaikhachhang').val("");
                    $('#messagethem').fadeOut();
                    $('#alert').delay(5).fadeTo("slow", 0.6);
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
        $('#them_tenkhachhang').val("");
        $('#them_cmnd').val("");
        $('#them_sodienthoai').val("");
        $('#them_gioitinh').val("");
        $('#them_ngaysinh').val("");
        $('#them_trangthai').val("");
        $('#them_diachi').val("");
        $('#them_ghichu').val("");
        $('#them_loaikhachhang').val("");
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
                        url: 'khachhang/laychitietkhachhang',
                        data: { 'ID': ID }, // gửi dữ liệu từ form qua controller
                        success: function(res) {
                            $('#sua_makhachhang').val(res[0]); //thứ tự output
                            $('#sua_tenkhachhang').val(res[1]);
                            $('#sua_cmnd').val(res[2]);
                            $('#sua_sodienthoai').val(res[3]);
                            $('#sua_gioitinh').val(res[4]);
                            $('#sua_ngaysinh').val(res[5]);
                            $('#sua_ghichu').val(res[6]);
                            $('#sua_trangthai').val(res[7]);
                            $('#sua_diachi').val(res[8]);
                            $('#sua_loaikhachhang').val(res[9]);
                            $('#sua_doanhso').val(res[10]);
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
                    $('#sua_gioitinh').val("");
                    $('#sua_ngaysinh').val("");
                    $('#sua_trangthai').val("");
                    $('#sua_diachi').val("");
                    $('#sua_ghichu').val("");
                    $('#sua_loaikhachhang').val("");
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
        $('#sua_gioitinh').val("");
        $('#sua_ngaysinh').val("");
        $('#sua_trangthai').val("");
        $('#sua_diachi').val("");
        $('#sua_ghichu').val("");
        $('#sua_loaikhachhang').val("");
        $('#messagesua').fadeOut();

    });


    //Event for Deleting
    $('#xoabutton').click(function() {
        if (($('input[type=checkbox]:checked').not('#checkall').length < 2) && ($('input[type=checkbox]:checked').not('#checkall').length >= 1)) {
            //xet 2 truong hop
            if ($('#checkall').prop("checked") == true) {

                $.ajax({
                    type: "GET",
                    url: 'khachhang/xoatatca',
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
                            url: 'khachhang/xoa',
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