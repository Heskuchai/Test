$(document).ready(function(){
	$.arcticmodal('setDefault', {
		beforeOpen: function(data, el) {
			$('.select').hide();
		},
		afterClose: function(data, el) {
			$('.select').show();
		}
	});
	
	$('.select, .form-nav').on('click', 'li:not(.active)', function() {
		$(this).addClass('active').siblings().removeClass('active');
	});
	$('.cart-i').wScratchPad({
		size: '50',
		bg: '#2d3236',
		fg: '/assets/images/1.png',
		cursor: 'url("/assets/images/coin.png") 5 5, default',
		scratchMove: function (e, percent) {
			if (percent > 50) {
				this.clear();
                App.var.timer = setTimeout(function() {
                    App.card.end();
                }, 2000);
			}
		},
	    scratchDown: function(e, percent) {
		    App.card.open(this.$el.attr('data-id'));
		}
	});		
	$('.faq-i').click(function(){
		$('.faq-i').removeClass('opened');
		$(this).toggleClass('opened').toggleClass('closed');
		$('.opened .faq-mess').slideToggle();
	});
});