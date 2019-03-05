
$('.cart .check').on('click',function(){
	if($(this).hasClass('checked')){
		$(this).removeClass('checked').find('input').attr('checked',false);
	}else{
		$(this).addClass('checked').find('input').attr('checked',true);
	}
})


$('.cart .allcheck').on('click',function(){
	if($(this).hasClass('checked')){
		$(this).removeClass('checked').find('input').attr('checked',false);
		$('.cart .check').removeClass('checked').find('input').attr('checked',false);
	}else{
		$(this).addClass('checked').find('input').attr('checked',true);
		$('.cart .check').addClass('checked').find('input').attr('checked',true);
	}
})

$('.cart .mins').on('click',function(){
	var id=$(this).siblings('.nums');
	var nums=id.val();
	if(nums<=1){
		id.val('1');
	}else{
		nums--;
		id.val(nums);
	}
})

$('.cart .plus').on('click',function(){
	var id=$(this).siblings('.nums');
	var nums=id.val();
	if(nums>=999){
		id.val('999');
	}else{
		nums++;
		id.val(nums);
	}
})

/*var swiper = new Swiper('.recomment .swiper-container', {
    pagination: '.swiper-pagination',
    slidesPerView: 2,
    paginationClickable: true,
    spaceBetween: 10
});
*/

$('.comfirm-btn').on('click',function(){
	$('.order-way').addClass('order-way-fold');
})

$('.order-way li').on('click',function(){
	$(this).addClass('checked').find('input').attr('checked',true);
	$(this).siblings('li').removeClass('checked').find('input').attr('checked',false);
})

$('.order-way,.float-confirm').on('click',function(event){
	event.stopPropagation();
})
$(document).click(function(){
	$('.order-way').removeClass('order-way-fold');
})
$('.order-way .close').click(function(){
	$('.order-way').removeClass('order-way-fold');
})