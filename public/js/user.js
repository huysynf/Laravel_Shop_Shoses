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
    })
});
