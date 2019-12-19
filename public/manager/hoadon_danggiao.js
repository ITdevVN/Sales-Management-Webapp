$(document).ready(function(){
    $('#daxuly').click(function(){
        if (($('input[type=checkbox]:checked').not('#checkall').length<2) && ($('input[type=checkbox]:checked').not('#checkall').length>=1)){
            $('.checkbox-group').each(function(){
                if ($(this).prop("checked")==true){
                    var ID=parseInt($(this).attr("id").match(/\d+/)); //lấy ra id của nút tick
                    $('#daxuly').attr('href','hienthidanggiao/chuyentrangthai-thanhtoan/'+ID);
                }
            });

        }
        else{
            $('#result').html('<div class="alert alert-danger">Vui lòng chọn ít nhất 1 dòng</div>');
        }
    })

    $('#huydonhang').click(function(){
        if (($('input[type=checkbox]:checked').not('#checkall').length<2) && ($('input[type=checkbox]:checked').not('#checkall').length>=1)){
            $('.checkbox-group').each(function(){
                if ($(this).prop("checked")==true){
                    var ID=parseInt($(this).attr("id").match(/\d+/)); //lấy ra id của nút tick
                    $('#huydonhang').attr('href','hienthixuly/huydonhang/'+ID);
                }
            });

        }
        else{
            $('#result').html('<div class="alert alert-danger">Vui lòng chọn ít nhất 1 dòng</div>');
        }
    })
})
