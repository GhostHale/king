function slideDown(obj){
	obj.on('click',function(){
		if ($(this).attr('class')=="li_down") {
			$(this).removeClass('li_down');
			$(this).addClass('li_up');
			$(this).find('ul').css('display','block');
			$(this).find('li').on('mouseover',function(){
				$(this).css({'background-color':'#2795f4','color':'#fff'});
			});
			$(this).find('li').on('mouseout',function(){
				$(this).css({'background-color':'#fff','color':'#666'});
			});
			$(this).find('li').on('click',function(){
				var text = $(this).text();
                var val = $(this).index()+1;
				$(this).parent().parent().find('.inp').val(text);
                $(this).parent().parent().find('.inp_val').attr('value',val);
			});
		}else{
			$(this).removeClass('li_up');
			$(this).addClass('li_down');
			$(this).find('ul').css('display','none');
		}
	});
}
function sub(){
    var obj=form.title,val=obj.value;
    if(val.length>20||val.length<5){
        $(obj).next('h3').text('请输入标段名称');
        obj.focus();
        return false;
    }else{
        $(obj).next('h3').text('');
    }
    obj=form.total;val=obj.value;
    if(isNaN(val)||val<5000){
        $(obj).siblings('h3').text('请在此栏填写大于等于5000的借款金额，金额必须是正整数');
        obj.focus();
        return false;
    }else{
        $(obj).siblings('h3').text('');
    }
    obj=form.rate;val=obj.value;
    if(val==""||val<8||val>24){
        $(obj).siblings('h3').text('请填写年利率在8%-24%之间');
        obj.focus();
        return false;
    }else{
        $(obj).siblings('h3').text('');
    }
    obj=form.period;val=parseInt(obj.value);
    if(val==""||val<1||val>12){
        $(obj).siblings('h3').text('请输入1-12');
        obj.focus();
        return false;
    }else{
        $(obj).siblings('h3').text('');
    }
    obj=form.intro;val=obj.value;
    if(val==""){
        obj.value='需要添加标段介绍！';
        obj.focus();
        return false;
    }
    var s=form.start.value.replace(/\//g,'-'),e=form.end.value.replace(/\//g,'-');
    if (s==""||e==""){
        obj=form.end;
        $(obj).siblings('h3').text('请选择日期');
        return false;
    }else{
        $(obj).siblings('h3').text('');
        if (s.indexOf('-')<4){
            form.start.value=s.substr(-4)+'-'+s.substr(0,5);
            form.end.value=e.substr(-4)+'-'+e.substr(0,5);
        }
    }
    $.post(location.href,$(form).serialize(),function(data){
        if (data.size<20) alert(data);
        else $('#main').html(data);
    });
    return false;
};
$(".datepicker").datepicker();
slideDown($('.li_down'));