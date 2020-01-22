function convertUserRoleToParagraph(roles){
    let p="";
    roles.forEach(role=>{
        p+=`<p>${role.name}</p>`;
    });

    return p;
}

$(function () {
    $('.user-select-role').select2();

    $('.show-user').click(function () {
        let id=$(this).attr('show');
        let url='/manage/users/'+id;
        callAjax(url)
            .then(data=>{
                let user=data.data;
                let roles=convertUserRoleToParagraph(user.roles);
                $('.user-name').html(user['name']);
                $('.user-email').html(user['email']);
                $('.user-role').html(roles);
                $('.user-phone').html(user['phone']);
                $('.user-address').html(user['address']);
                $('.user-gender').html(user['address']==1?'Nam':'Nữ');
                $('.user-image').attr('src','/images/users/'+user['image']);
            })
    })  ;

    $('.delete-user').click(function () {
        let id=$(this).attr('delete');
        let url='/manage/users/'+id;
        destroyResourceByAjax(url)
            .then(data=>{
                alertSuccessRe(data.message)
                    .then(data=>{
                        location.reload();
                    });
            })
            .catch(data=>{
               alertError(data.message);
            });
    })
});
