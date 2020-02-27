$(function () {
    $('.change-product-color').change(function () {
        let size=$(this).val();
        let id=$(".option-color[value="+size+"]").attr('size');
        let url='/product/color/'+id;
        callAjax(url)
            .then(data=>{
               let colors=data.size.colors;
               let price=data.size.price;
                $('.product-price').html('Giá tiền: '+price +" VND");
                let colorText='';
                colors.forEach(item=>{
                    colorText+=` <option value="${item.color}">${item.color}</option>`;
                });
                $('.select2-hidden-accessible').prepend(colorText);
                console.log(colorText);
            })

    });
});
