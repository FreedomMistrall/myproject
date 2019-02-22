/*Cart*/
$('body').on('click', '.cart', function(e){
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1;
    $.ajax({
        url: '/cart/add',
        data:{id:id, qty:qty},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });
});

function showCart(cart){
    console.log(cart);
}
/*Cart*/