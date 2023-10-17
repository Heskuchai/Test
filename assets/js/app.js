var App = {
    noty: function(status, text) {
        $('.alert-'+status+' em').text(text);
        $('.alert-'+status).slowShow('bounceIn');
        setTimeout(function() {
            $('.alert-'+status).slowHide('bounceOut');
        }, 4000);
    },
    var: {
        win: 0,
        prize: [0, 0],
        status: 0,
        open: 0,
        y: 0,
        timer: 0
    },
    user: {
        update: function(data) {
            $('.money').text(data.money / 100);
            $('.credit_value').text(data.credit);
            $('.credit_value').val(data.credit);
        },
        live: function(data) {
            var html = '';
            html += '<div class="live-i live-' + data.win.color + ' credit">';
            html += '<a href="https://vk.com/id' + data.user.userid + '" class="live-ava" target="_blank"><img src="' + data.user.avatar + '" alt="" /></a>';
            html += '<div class="live-val"></div>';
            html += '<div class="live-col">' + data.win.price + 'k</div>';
            html += '</div>';
            $('.live-content').prepend(html);
        }
    },
    card: {
    	buy: function() {
	    	$.ajax({
	            url: '/ajax/card/buy',
	            type: 'POST',
				data: {case_id:$("#case_id").val()},
	            success: function(data) {
					data = JSON.parse(data);
	                if(!data.status) {
	                    App.noty('error', data.text);
	                    return;
	                }
                    App.card.init(data);
                    $('.cart-i').wScratchPad('reset');
	                App.noty('success', data.text);
	            },
	            error: function() {
	                App.noty('error', 'Ошибка сервера!');
	            }
	        });
    	},
        init: function(data) {
            clearTimeout(App.var.timer);
            App.var.status = 0;
            App.var.y = 0;
            $('.cart-i').unbind('click');
            $('.cart-i').wScratchPad('enable');
            App.var.win = data.win;
            App.var.prize = data.prize;
            $('.cart-prize').show();
            $('.cart-i').wScratchPad('reset');
            $('.start_game').hide();
        },
        open: function(id) {
            if(!App.var.status) {
                App.var.open = id;
                App.var.status = 1;
                var x = 0;
                for(var i = 0; i < 3; i ++) {
                    if(i != App.var.open) {
                        $('.data-' + i).text(App.var.prize[x].price);
                        $('.color-' + i).removeClass('live-1');
                        $('.color-' + i).removeClass('live-2');
                        $('.color-' + i).removeClass('live-3');
                        $('.color-' + i).removeClass('live-4');
                        $('.color-' + i).addClass('live-' + App.var.prize[x].color);
                        $('.cart-' + i).hide();
                        x++;
                    } else {
                        $('.data-' + id).text(App.var.win.price);
                        $('.color-' + id).removeClass('live-1');
                        $('.color-' + id).removeClass('live-2');
                        $('.color-' + id).removeClass('live-3');
                        $('.color-' + id).removeClass('live-4');
                        $('.color-' + id).addClass('live-' + App.var.win.color);
                    }
                }
                App.card.close();
            }
        },
        close: function() {
            $.ajax({
                url: '/ajax/card/close',
                type: 'POST',
                success: function(data) {
					data = JSON.parse(data);
                    if(!data.status) {
                        App.noty('error', data.text);
                        return;
                    }
                    App.user.update(data);
                },
                error: function() {
                    App.noty('error', 'Ошибка сервера!');
                }
            });
        },
        end: function() {
            clearTimeout(App.var.timer);
            $('.start_game').show();
            $('.cart-i').wScratchPad('clear');
        }
    },
    merchant: {
        create: function(sum) {
            $.ajax({
                url: '/ajax/pay/merchant',
                type: 'POST',
                data: {
                    sum: sum
                },
                success: function(data) {
					data = JSON.parse(data);
                    if(!data.status) {
                        App.noty('error', data.text);
                        return;
                    }
                    document.location.href = data.url;
                    App.noty('success', 'Переадресация на платежную систему...');
                },
                error: function() {
                    App.noty('error', 'Ошибка сервера!');
                }
            });
        },
    },
    withdraw: {
        create: function(email) {
            $.ajax({
                url: '/ajax/withdraw/create',
                type: 'POST',
                data: {
                    email: email
                },
                success: function(data) {
					data = JSON.parse(data);
                    if(!data.status) {
                        App.noty('error', data.text);
                        return;
                    }
                    App.user.update(data);
                    App.noty('success', data.text);
                },
                error: function() {
                    App.noty('error', 'Ошибка сервера!');
                }
            });
        },
        close: function(id) {
            $.ajax({
                url: '/admin/withdraw/close',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    if(!data.status) {
                        App.noty('error', data.text);
                        return;
                    }
                    $('.' + id).hide();
                },
                error: function() {
                    App.noty('error', 'Ошибка сервера!');
                }
            });
        },
        error: function(id) {
            $.ajax({
                url: '/admin/withdraw/error',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    if(!data.status) {
                        App.noty('error', data.text);
                        return;
                    }
                    $('.' + id).hide();
                },
                error: function() {
                    App.noty('error', 'Ошибка сервера!');
                }
            });
        }
    },
    money: {
        create: function(id, chance) {
            $.ajax({
                url: '/admin/money/create',
                type: 'POST',
                data: {
                    userid: id,
                    chance: chance
                },
                success: function(data) {
                    if(!data.status) {
                        App.noty('error', data.text);
                        return;
                    }
                    App.noty('success', data.text);
                },
                error: function() {
                    App.noty('error', 'Ошибка сервера!');
                }
            });
        },
        delete: function(id) {
            $.ajax({
                url: '/admin/money/delete',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    if(!data.status) {
                        App.noty('error', data.text);
                        return;
                    }
                    $('.' + id).hide();
                },
                error: function() {
                    App.noty('error', 'Ошибка сервера!');
                }
            });
        }
    }
};

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.fn.extend({
	    animateCss: function (animationName) {
	        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
	        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
	            $(this).removeClass('animated ' + animationName);
	        });
	    },
        slowHide: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            $(this).addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).hide();
                $(this).removeClass('animated ' + animationName);
            });
        },
        slowShow: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            $(this).show();
            $(this).addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated ' + animationName);
            });
        }
	});


	$('.buy_card').click(function(e) {
		e.preventDefault();
		App.card.buy();
	});
    $('.withdraw').click(function(e) {
        e.preventDefault();
        var email = $('.withdraw_email').val();
        App.withdraw.create(email);
    });
    $('.merchant').click(function(e) {
        e.preventDefault();
        var sum = $('.merchant_sum').val();
        App.merchant.create(sum);
    });
    $('.close_withdraw').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        App.withdraw.close(id);
    });
    $('.error_withdraw').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        App.withdraw.error(id);
    });
    $('.add_money').click(function(e) {
        e.preventDefault();
        var id = $('.money_id').val();
        var value = $('.money_value').val();
        App.money.create(id, value);
    });
    $('.del_money').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        App.money.delete(id);
    });
});
