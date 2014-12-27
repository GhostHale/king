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
				console.log(text);
				$(this).parent().parent().find('input').val(text);
				
			});
		}else{
			$(this).removeClass('li_up');
			$(this).addClass('li_down');
			$(this).find('ul').css('display','none');
		}
	});
}
$('.form .submit').bind('click',function(event){
	var status1 = false;
	var status2 = false;
	var status3 = false;
	var status4 = false;
	var status5 = false;
	var status6 = false;
	$(function(){

    	if($($('.form input')[0]).val()==""||$($('.form input')[0]).val().length>30||$($('.form input')[0]).val().length<15){
    	    $($('.form input')[0]).next('h3').text('请输入标段名称');
    	}else{                  
        	status1=true;
        	$($('.form input')[0]).next('h3').text('');
    	}
    	if($($('.form input')[1]).val()!=""&&/^[0-9]*[1-9][0-9]*$/.test($($('.form input')[1]).val())&&parseInt($($('.form input')[1]).val())>=5000){
        	status2=true;
    		$('.form .h3').text('');
    	}else{                
        	$('.form .h3').text('请在此栏填写大于等于5000的借款金额，金额必须是正整数');
    	}
    	if($($('.form input')[3]).val()!=""&&parseInt($($('.form input')[3]).val())>=0&&parseInt($($('.form input')[3]).val())<=24){
        	status3=true;
    		$('.form .h4').text('');
    	}else{                
        	$('.form .h4').text('请填写年利率在8%-24%之间');
    	}
    	if($($('.form input')[3]).val()==""||/^[0-9]?[0-9][%]$/.test($($('form input')[3]).val())){
    	    $($('.form input')[3]).next('h3').text('请填写年利率在8%-24%之间');
    	}else{                  
        	status3=true;
        	$($('.form input')[3]).next('h3').text('');
    	}	
    	
    	if(parseInt($($('.form input')[5]).val()) <= 12&&parseInt($($('.form input')[5]).val()) >= 1){
    	  	status4=true;
        	$($('.form input')[5]).next('h3').text('');
    	}else{                  
        	$($('.form input')[5]).next('h3').text('请输入1-12');
    	}

    	if($($('.form input')[6]).val()==""){
    		$($('.form input')[6]).next('h3').text('请选择日期');
    	}else{
    		status5=true;
    		$($('.form input')[6]).next('h3').text('');
    	}

    	if($($('.form input')[7]).val()==""){
    		$($('.form input')[7]).next('h3').text('请选择日期');
    	}else{
    		status6=true;
    		$($('.form input')[7]).next('h3').text('');
    	}
	});
	if (status1&&status2&&status3&&status4&&status5&&status6) {
		$('.form .put').submit();
	}else{
		event.preventDefault();
	}
});

slideDown($('.li_down'));