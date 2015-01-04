/**
 * @author Small
 */

function showData(data){
    var table=document.getElementById('table'),t='',num=1;
    for (var i=1,lim=table.rows.length; i < lim; i++) {
      table.deleteRow(1);
    };
    for(x in data){
        var row = table.insertRow(num++);row.className='li';
        var cel=row.insertCell(0);cel.className='type';cel.innerHTML='<a class="invest_btn" href="/ppp/issue/bddetail/'+data[x].bid+'">投标</a>';
        cel=row.insertCell(0);cel.className='progress';cel.innerHTML='<div class="progress_line"><div></div></div><span> 50%</span>';
        t=data[x].period;t+=(data[x].isday==1)?'天':'个月';
        cel=row.insertCell(0);cel.className='limit';cel.innerHTML=t;
        cel=row.insertCell(0);cel.className='money';cel.innerHTML='￥'+data[x].total;
        switch(data[x].level){
            case 1:t='AAA+';break;
            case 2:t='AAA';break;
            case 3:t='AA+';break;
            case 4:t='AA';break;
            case 5:t='A+';break;
            default:t='未知';break;
        }
        cel=row.insertCell(0);cel.className='level';cel.innerHTML=t;
        cel=row.insertCell(0);cel.className='rate';cel.innerHTML=data[x].rate;
        cel=row.insertCell(0);cel.className='title';cel.innerHTML=data[x].title;
        cel=row.insertCell(0);cel.className='name';cel.innerHTML=data[x].name;
    }
}
function set(type,val,e){
    switch(type){
        case 1:LIST.param.rate=val;break;
        case 2:LIST.param.period=val;break;
        case 3:LIST.param.rank=val;break;
        default:return;
    }
    location.href='#1';
    loadPage('1');
    $('.select',e.parentNode).attr('class','');
    e.className='select';
}
