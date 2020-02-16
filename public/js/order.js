$(function () {

    let orderId=0;
        $('.edit-order').click(function () {
            orderId= $(this).attr('order');
            let url='/manage/orders/get-orders/'+orderId;
            callAjax(url)
                .then(data=>{
                    let order=data.data;

                     $('.select-status-order').val(order.status);
                })

        });
        $('.update-order-status').click(function () {
           let data=new FormData($('.update-order-form')[0]);
            let url='/manage/orders/update/'+orderId;
            callAjax(url,data,'post')
                .then(data=>{
                   alertSuccessRe(data.message)
                       .then(dt=>{
                           location.reload();
                       })
                });
        });
});
