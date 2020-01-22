
$(function () {
    $('.user-select-role').select2();

    $('.show-user').click(function () {
        let id=$(this).attr('show');
        let url='/manage/users/'+id;
        callAjax(url)
            .then(data=>{
                let user=data.data;
                $('.user-name').html(user['name']);
                $('.user-email').html(user['email']);
                $('.user-role').html(user['role']);
                $('.user-phone').html(user['phone']);
                $('.user-address').html(user['address']);
                $('.user-gender').html(user['address']==1?'Nam':'Nữ');
                $('.user-image').attr('src','/images/users/'+user['image']);
            })
    })  ;
});
