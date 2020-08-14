/*global $, alert, console*/
$(function () {
  'use strict';
  $('[placeholder]').focus(function () {
		$(this).attr('data-text', $(this).attr('placeholder'));//it will put in data text the place holder
		$(this).attr('placeholder', '');//remove the content
		}).blur(function () {
		$(this).attr('placeholder', $(this).attr('data-text'));// take the attr from data text
	});
  // $('header').height($(window).height());
  // $('header .con').each(function () {
  //   $(this).css('paddingTop', ($(window).height() - $('header .con').height()) / 2);
  // });

  // FORM VALIDATION
  $('.plur-me').blur(function () {
    if($(this).val().length < 5){
      $(this).css('border', '2px solid #f00');
      $(this).parent().find('.alerts').fadeIn(50);
      $(this).parent().find('.fa-check-circle').fadeOut(50);

    }else{
      $(this).css('border', '2px solid #5cb85c');
      $(this).parent().find('.alerts').fadeOut(50);
      $(this).parent().find('.fa-check-circle').fadeIn(50);
    }
  });
  $('.emails').blur(function () {
    if($(this).val() === ''){
      $(this).css('border', '2px solid #f00');
      $(this).parent().find('.alerts').fadeIn(50);
      $(this).parent().find('.fa-check-circle').fadeOut(50);

    }else{
      $(this).css('border', '2px solid #5cb85c');
      $(this).parent().find('.alerts').fadeOut(50);
      $(this).parent().find('.fa-check-circle').fadeIn(50);

    }
  });

  // SHOW PASSWORD
  var passwordShow = $('.password');
  $('.show').hover(function () {
    passwordShow.attr('type', 'text');
  }, function () {
    passwordShow.attr('type', 'password');
  });

  // PASSWORD STRENGTH
  // $('#password').pwstrength({
  //   ui: { showVerdictsInsideProgressBar: true }
  // });
});
// $('.links li').click(function () {
//   $(this).addClass('active').siblings().removeClass('active');
//   });
$('.tabs-list li').on('click', function () {
  $(this).addClass('active').siblings().removeClass('active');
  $('.content-list .toggles').hide();
  $($(this).data('class')).addClass('show').siblings().removeClass('show').addClass('hide');
});
