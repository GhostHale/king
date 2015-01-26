/**
 * @author Small
 */
$(function(){
    var aLi=$('.photo_list>li');
    var oPhoto=$('.photo_big');
    var oTypeBox=$('.type_selector');
    var oType=$('.sele_menu');
    var aType=$('.sele_menu>li');
    var oSubtract=$('.subtract');
    var oPlus=$('.plus');
    var oMain=$('#main');
    var oNum=$('.num');
    oSubtract.click(function(){
        var x=parseInt(oNum.val());
        if(x==1)return;
        oNum.val(x-1);
    });
    oPlus.click(function(){
        var x=parseInt(oNum.val());
        oNum.val(x+1);
    });
    aType.click(function(){
        aType.css('borderWidth',1);
        this.style.borderWidth=3+'px';
    });
    oTypeBox.css('height',oType.height()+20);
    for(var i=0;i<aLi.length;i++){
        var li=aLi.eq(i);
        var a=i+1;
        li[0].style.backgroundImage='url(car/'+a+'_min.jpg)';
        li[0].index=a;
        li[0].addEventListener('click',function(){
            oPhoto.css('background-image','url(car/'+this.index+'.jpg)');
        });
    }
});