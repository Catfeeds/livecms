
// 导航鼠标移入移出效果
var navlist = $('.list');
navlist.mouseover(function(){
	this.className = 'list on';
});
navlist.mouseout(function(){
	this.className = 'list';
});

//右侧客服鼠标移入移出效果
var custom = $('.sidebox');
custom.mouseover(function(){
	this.className = 'sidebox sideon side1';
});
custom.mouseout(function(){
	this.className = 'sidebox side1';
});
var side1 = $('.side1');
side1.mouseover(function(){
	$('.phone').css('display', 'block');
});
side1.mouseout(function(){
	$('.phone').css('display', 'none');
});

//鼠标点击表单事件
$('input,textarea').focus(function(){
	this.style.border = '1px solid #008bff';
});
$('input,textarea').blur(function(){
	this.style.border = '1px solid #cacaca';
});

