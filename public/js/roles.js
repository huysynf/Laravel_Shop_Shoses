$(function () {
    $('.select-permission-search').select2();
    $('.user-select-role').select2();
    //select all
    $('.select-all').change(function () {
        $('.select-item').prop("checked", $(this).prop("checked"));
        $('.un-select-all').prop("checked", false);
    });

    $('.un-select-all').change(function () {
        if ($(this).prop("checked") == true) {
            $('.select-item').prop("checked", false);
            $('.select-all').prop("checked", false);
        }
    });

    $('.select-item').change(function () {
        $(this).prop("checked", $(this).prop("checked"));
        $('.un-select-all').prop("checked", false);
    });

    $('.delete-role').click(function () {
        let id=$(this).attr('delete');
        let url='/manage/roles/'+id;
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
