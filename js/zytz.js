$(function(){
var trBeforeForGirl=$('.for_girl').prev();
var girlQ=$('.for_girl').clone();
var boyQ=$('.for_boy').clone();
$('#j_zytz_start').click(function(){
$(this).parent().hide();
$('.zytz_test_wrapper').show();
$('.medical_adviser').hide();
$('.result_wrapper_start').hide();
});
$('td').eq(0).removeClass().addClass('test_current');
$('td').click(function(){
var me=$(this);
if(me.hasClass('test_pass')){
$('.test_pass').removeClass('test_current');
me.addClass('test_current').find('.test_a span').unbind('click').click(function(){
var me=$(this);
me.parent().find('span').removeClass();
me.addClass('selected');
push_data(me);
me.parents('td').removeClass('test_current');
$('#question_lost').hide();
return false;
});}});
$('.test_a span').click(function(){
var me=$(this);
me.parent().find('span').removeClass();
me.addClass('selected');
push_data(me);
next_q(me);
$('#question_lost').hide();
return false;
});
$('.test_a span').hover(
function(){var me=$(this);if(!me.hasClass('selected')){me.addClass('j_selected selected');}},
function(){var me=$(this);if(me.hasClass('j_selected')){me.removeClass();}}
);
$('.test_a input').blur(function(){
var inputV=$(this).val();
$('#'+$(this).attr('id')+'_error').hide();
if($.trim(inputV) ==''){
$(this).attr('id')=='user_email'?inputV='你的邮箱':inputV='你的名字';
$(this).val(inputV);
}else{
activeBtn($(this));
}
}).focus(function(){
var inputV=$(this).val();
$('#'+$(this).attr('id')+'_error').show();
if(inputV =='你的名字' || inputV == '你的邮箱'){
$(this).val('');
}
$(this).keypress(function(e){
if(e.which==13){
activeBtn($(this));
}
});
});
function submit_f(){
$("#zytz_loading").show();

var params = $("#lifestyle_form input").serialize();
$.ajax({
	url:'tizhiresult.php',
	type:'post',
	dataType:'html',
	data:params,
	success:function(data){
		window.location.href ="tizhiresult.php?"+params; 
	//	alert(params);
	},
	error:function(){alert('网络错误,请稍候重�?1');window.location.href="tizhicheck.php";}
});
return false;
}
function show_lifestyle_result(data) {
    data = data.replace('SMTP Error: Could not connect to SMTP host.', '');
    window.location.href = "/my/" + data;
}
function next_q(e){
var tdTemp=e.parents('td');
var trTemp=e.parents('tr');
var tableTemp=e.parents('table');
var tableNext;
$('.test_pass').removeClass('test_current');
tdTemp.removeClass().addClass('test_pass');
if(is_last(tableTemp,'table')){
tableNext=0;
}else{
tableNext=tableTemp.nextAll('table').eq(0);
}
var scrollT=$(document).scrollTop();
if (is_last(trTemp, 'tr')) {
	if (tableNext) {
		tableNext.find('td').eq(0).addClass('test_current');
		$(document).scrollTop(scrollT + 105);
	}else{
		submit_f();
	}
} else {
	if (e.attr('data-value') == 1 && trTemp.find("p").text().substring(0, 2) == 36) {
		trTemp.next().children().addClass('test_current');
		$(document).scrollTop(scrollT + 28);
	} else if (e.attr('data-value') == 2 && trTemp.find("p").text().substring(0, 2) == 36) {
		trTemp.next().children().addClass('test_current');
		$(document).scrollTop(scrollT + 28);
	} else {
		trTemp.next().children().addClass('test_current');
		if(!(trTemp.find("p").text().substring(0, 2) > 55)){
			$(document).scrollTop(scrollT + 51);
		}
	}
}



return;
}
function is_last(e,tag){
var next=e.nextAll(tag).length;
if(next == 0){
return true;
}else{
return false;
}
}
function push_data(e){
var val=e.attr('data-value');
var con=e.html();
var tdTemp=e.parent().parent();
tdTemp.find('input[type="hidden"]').val(val);
tdTemp.find('.test_q span').html(con);
var paramNum=e.parents('td').attr('id');
if(paramNum=='gender'){
if(val == 1){
$('.for_girl').remove();
$.each($("tr"),function(){
if($(this).find("p").text().substring(0,2)>35){
var len = $(this).find("p").text().length;
$(this).find("p").text( ($(this).find("p").text().substring(0,2)-1) + $(this).find("p").text().substring(2,len));
$(this).find("p").append("<span></span>");
}	
});
}else{
$('.for_boy').remove();
$.each($("tr"),function(){
if($(this).find("p").text().substring(0,2)>56){
var len = $(this).find("p").text().length;
$(this).find("p").text( ($(this).find("p").text().substring(0,2)-1) + $(this).find("p").text().substring(2,len));
$(this).find("p").append("<span></span>");
}	
});
}
trBeforeForGirl.next().children().click(function(){
var me=$(this);
if(me.hasClass('test_pass')){
$('.test_pass').removeClass('test_current');
me.addClass('test_current').find('.test_a span').unbind('click').click(function(){
var me=$(this);
me.parent().find('span').removeClass();
me.addClass('selected');
push_data(me);
me.parents('td').removeClass('test_current');
return false;
});
}
});
trBeforeForGirl.next().find('.test_a span').hover(
function(){var me=$(this);if(!me.hasClass('selected')){me.addClass('j_selected selected');}},
function(){var me=$(this);if(me.hasClass('j_selected')){me.removeClass();}}
).click(function(){
var me=$(this);
me.parent().find('span').removeClass();
me.addClass('selected');
next_q(me);
push_data(me);
$('#question_lost').hide();
return false;
});
}
return;
}
function activeBtn(e){
var otherInput=e.siblings('input');
if(checkInput(e)){
if(!(otherInput.val()=='你的名字'||otherInput.val()=='你的邮箱')){
if(checkInput(otherInput)){
$('.zytz_btn').focus();
return true;
}else{
return false;
}
}else{
return false;
}
}else{
return false;
}}
function checkInput(o){
var user_email = /^[^\.][a-zA-Z0-9\_\-\.]+[a-zA-Z0-9\_\-]@([a-zA-Z0-9\-\.])*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
var user_name = /^(\w){4,20}$/;
var temp=o.val();
if(o.attr('id')=='user_name'){
temp=$.trim(temp).replace(/[\u4e00-\u9fa5]/g, 'mm');
if(temp.length<4||temp.length>20){
$('#'+o.attr('id')+'_error').html('名字长度错误，应该在4-20个字符之间，一个汉字为两个字符�?');
$('#'+o.attr('id')+'_error').removeClass('error').addClass('error').show();
return false;
}else if(!/^[a-z0-9]\w{1,20}$/i.test(temp)){
$('#'+o.attr('id')+'_error').html('名字中包含有特殊字符。只允许汉字，大小写字母，数字作为名字�?');
$('#'+o.attr('id')+'_error').removeClass('error').addClass('error').show();
return false;
}else{
$('#'+o.attr('id')+'_error').html('请填写你的名字，4-20个字符，一个汉字为两个字符，建议你填写中文名字（测试结果会包含你的名字）�?');
$('#'+o.attr('id')+'_error').hide().removeClass('error');
return true;
}
}else{
if(temp.match(eval(o.attr('id'))))
{
$('#'+o.attr('id')+'_error').hide().removeClass('error');
$('#'+o.attr('id')+'_error').html('请填写你的常用邮箱，测试结果同时会发至你的邮箱，便于你以后查看�?');
return true;
}else{
$('#'+o.attr('id')+'_error').html('邮箱格式不正确，请输入正确的邮箱格式�?');
$('#'+o.attr('id')+'_error').removeClass('error').addClass('error').show();
return false;
}}}});