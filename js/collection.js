/**
 * Created by Hale on 14/12/6.
 */
/**
 * Created by TruemenHale on 14/12/6.
 */
//阻止事件冒泡的通用函数
function stopBubble(e){
	// 如果传入了事件对象，那么就是非ie浏览器
	if(e&&e.stopPropagation){
		//因此它支持W3C的stopPropagation()方法
		e.stopPropagation();
	}else{
		//否则我们使用ie的方法来取消事件冒泡
		window.event.cancelBubble = true;
	}
}
$(function(){
	var aSubtract=$('.subtract');
	var aPlus=$('.plus');
	var aNum=$('.num');
	var aCheck=$(':checkbox');
	var oCheckAll=$('#sele_all');
	var oCheckall=$('.sele_all');
	aCheck.click(function(){
		var aChecked=$('.colle_list input:checked');
		var oCost=$('.cost_num');
		var q=0;
		for(var i=0;i<aChecked.length;i++){
			var p=parseInt($(aChecked.eq(i)[0].parentNode).find('.cost')[0].innerHTML);
			q+=p;
		}
		oCost.html('¥ '+q+'.00');
	});
	function checkAll(oCheckAll,aCheck){
		if(oCheckAll[0].checked==true){
			for(var i=0;i<aCheck.length;i++){
				var c=aCheck.eq(i)[0];
				c.checked=false;
			}
		}
		else
		{
			for(var i=0;i<aCheck.length;i++){
				var c=aCheck.eq(i)[0];
				c.checked=true;
			}
		}
	}
	oCheckall.click(function(){
		checkAll(oCheckAll,aCheck);
		var aChecked=$('.colle_list input:checked');
		var oCost=$('.cost_num');
		var q=0;
		for(var i=0;i<aChecked.length;i++){
			var p=parseInt($(aChecked.eq(i)[0].parentNode).find('.cost')[0].innerHTML);
			q+=p;
		}
		oCost.html('¥ '+q+'.00');
	});
	oCheckAll.click(function(ev){
		if($(this).attr("checked")){
			$(".per_pro").each(function() {
				$(this).attr("checked", true);
			});
		}
		else
		{
			$(".per_pro").each(function() {
				$(this).attr("checked", false);
			});
		}
		var aChecked=$('.colle_list input:checked');
		var oCost=$('.cost_num');
		var q=0;
		for(var i=0;i<aChecked.length;i++){
			var p=parseInt($(aChecked.eq(i)[0].parentNode).find('.cost')[0].innerHTML);
			q+=p;
		}
		oCost.html('¥ '+q+'.00');
		ev.stopPropagation();
	});
	aNum.bind('focusout',function(){
		var oPa=this.parentNode;
		var oG=this.parentNode.parentNode;
		var oNum=$(oPa).find('.num');
		var oPri=$(oG).find('.cost');
		var oPer=$(oG).find('.per_price');
		var m=parseInt(oPer[0].innerHTML);
		var x=parseInt(oNum.val());
		oPri[0].innerHTML=x*m+'.00';
		var aChecked=$('.colle_list input:checked');
		var oCost=$('.cost_num');
		var q=0;
		for(var i=0;i<aChecked.length;i++){
			var p=parseInt($(aChecked.eq(i)[0].parentNode).find('.cost')[0].innerHTML);
			q+=p;
		}
		oCost.html('¥ '+q+'.00');
	});
	aSubtract.click(function(){
		var oPa=this.parentNode;
		var oG=oPa.parentNode;
		var oNum=$(oPa).find('.num');
		var oPri=$(oG).find('.cost');
		var oPer=$(oG).find('.per_price');
		var m=parseInt(oPer[0].innerHTML);
		var x=parseInt(oNum.val());
		var aChecked=$('.colle_list input:checked');
		var oCost=$('.cost_num');
		var q=0;
		if(x==1)return;
		x--;
		oNum.val(x);
		oPri[0].innerHTML=x*m+'.00';
		for(var i=0;i<aChecked.length;i++){
			var p=parseInt($(aChecked.eq(i)[0].parentNode).find('.cost')[0].innerHTML);
			q+=p;
		}
		oCost.html('¥ '+q+'.00');
	});
	aPlus.click(function(){
		var oPa=this.parentNode;
		var oG=oPa.parentNode;
		var oPri=$(oG).find('.cost');
		var oPer=$(oG).find('.per_price');
		var m=parseInt(oPer[0].innerHTML);
		var oNum=$(oPa).find('.num');
		var x=parseInt(oNum.val());
		var aChecked=$('.colle_list input:checked');
		var oCost=$('.cost_num');
		var q=0;
		x++;
		oPri[0].innerHTML=x*m+'.00';
		oNum.val(x);
		for(var i=0;i<aChecked.length;i++){
			var p=parseInt($(aChecked.eq(i)[0].parentNode).find('.cost')[0].innerHTML);
			q+=p;
		}
		oCost.html('¥ '+q+'.00');
	});
});