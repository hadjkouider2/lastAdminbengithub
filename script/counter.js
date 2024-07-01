$('.counter-plus').click(function(e){
   let qty = $(e.currentTarget).siblings('#qty');
   let qtyvalue = parseInt(qty.val())+1
   qty.val(qtyvalue)

});
$('.counter-moins').click(function(e){
   let qty = $(e.currentTarget).siblings('#qty');
   let qtyvalue = parseInt(qty.val())-1
   
   if(qtyvalue < 0){
      qtyvalue =0
   }
   qty.val(qtyvalue)
});