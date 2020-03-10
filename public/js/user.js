function convertUserRoleToParagraph(roles){
    let p="";
    roles.forEach(role=>{
        p+=`<span>   ${role.name}</span><span>-----</span>`;
    });

    return p;
}

$(function () {
    $('.user-select-role').select2();

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
    });
    let userId=0;
    $('.change-user-password').click(function () {
        resetErrorBox();
        userId=$(this).attr('user');
        $('#change-password-form').trigger('reset');
    });
    $('.change-password').click (function () {
        resetErrorBox();
        let data = new FormData($('#change-password-form')[0]);
        let url = '/manage/change-password/' + userId;
        callAjax(url, data, postMethodForm)
            .done(data => {
                $('#changeUserPasswordModal').modal('hide');
                alertSuccess(data.message);
            })
            .fail(data => {
                resetErrorBox();
                let errors = convertErrorsToParagraph(data.responseJSON.errors);
                errorBox.html(errors);
            });
    });
    //change password

});
