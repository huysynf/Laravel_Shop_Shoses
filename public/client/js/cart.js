$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function callAjax1(url, data = null, type = 'get') {
        return $.ajax({
            url: url,
            type: type,
            data: data,
            dataType:'json'
        });
    }

    $('.delete-cart-item').click(function () {
        let id=$(this).attr('cart');
        let url='/delete-cart/'+id;
        destroyResourceByAjax(url)
            .then(data=>{
               alertSuccessRe(data.message)
                   .then(data=>{
                       location.reload();
                   })
            });
    });

    $('.quantity-update').click(function () {
            let id=$(this).attr('cart');
            let url='/update-quantity-cart/'+id;
            let quantity=$('.quantity-cart').val();
            let data={
                qty:quantity
            };
            callAjax1(url,data,'post')
                .then(data=>{
                    location.reload();
                })


    })
});

