/**
 * Created by rehellinen on 2017/11/11.
 */

$('#submitButton').click(function () {
    var res = $('#submitForm').serializeArray();
    var postData = {};
    $(res).each(function (i) {
        postData[this.name] = this.value;
    });
    $.post(URL.submit_url, postData, function (result) {
        if(result.status === 1){
            dialog.success(result.message, URL.success_url);
        }
        if(result.status === 0 || result.status === 10000){
            dialog.error(result.message);
        }
    },"JSON");
});

$('* .listorder').blur(function () {
    var id = $(this).attr('attr-id');
    var listorder = $(this).val();
    var postData = {
        'id' : id,
        'listorder' : listorder
    };

    $.post(URL.listorder_url, postData, function (result) {
        if(result.status===1){
            dialog.success(result.message, URL.success_url);
        }

    }, "JSON");
});

$('* .editButton').click(function () {
    var id = $(this).attr('attr-id');
    window.location.href=URL.edit_url+"&id="+id;
});

$('* .statusButton').click(function () {
    var id = $(this).attr('attr-id');
    var status = $(this).attr('attr-status');
    postData = {
        'id' : id,
        'status' : status
    };
    dialog.status('是否确定更改状态', URL.status_url, postData);
});

$('* .addButton').click(function () {
    location.href = URL.add_url;
});