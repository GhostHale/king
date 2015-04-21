<?php
function rankTable($rank){
    if ($rank<=0||$rank>3) return false;
    $table=array('rank_worker','rank_com','rank_tao');
    return $table[$rank-1];
}

function dealPic($arr){
    $info=array('peo'=>'身份证','bank'=>'银行征信报告','car'=>'购车登记证','comany'=>'公司官网','marry'=>'结婚证',
    'credit'=>'银行信用卡','tax'=>'个人所得税证明','society'=>'社保证明','educa'=>'学历证明','house'=>'房产证','hukou'=>'户口本','skill'=>'技术职称认证',
    'card'=>'银行卡','com'=>'劳动合同','bhistory'=>'银行流水',
    'yyzz'=>'营业执照','zzdm'=>'组织机构代码证','swdj'=>'税务登记证','gszc'=>'公司章程','nszm'=>'纳税证明','sjbb'=>'年度审计报表',
    'smrz'=>'支付宝实名认证页面','jkzh'=>'订单借款账户页面','dmjt'=>'店面截图');
    $basic=array();$sub=array();
    foreach($arr as $key=>$val){
        $item=array('name'=>$info[$key],'have'=>$val,'type'=>dbinfo($key,false));
        if (in_array($key, array('peo','bank','comany','marry','credit','tax','society','educa','house','hukou','skill')))
            $basic[]=$item;
        else $sub[]=$item;
    }
    return array('basic'=>$basic,'sub'=>$sub);
}

function dbinfo($type,$isType=true){
    $dbinfo=array(array('table'=>'p2p_user','data'=>array('peo','bank','car','comany','marry','credit','tax','society','educa','house','hukou','skill'))
        ,array('table'=>'rank_worker','data'=>array('card','com','bhistory'))
        ,array('table'=>'rank_com','data'=>array('yyzz','zzdm','bhistory','swdj','gszc','nszm','sjbb'))
        ,array('table'=>'rank_tao','data'=>array('yyzz','smrz','jkzh','dmjt')));
    if ($isType){
        if ($type<15) $rank=0;
        else {
            $rank=$this->db->query("SELECT rank FROM p2p_user WHERE pid=$id")->row()->rank;
            $type-=15;
        }
        return array('name'=>$dbinfo[$rank]['data'][$type],'table'=>$dbinfo[$rank]['table']);
    }else{
        foreach($dbinfo as $item){
            if (($res=array_search($type, $item['data']))!==false)
                return ($item['table']=='ppp_user')?$res:$res+15;
        }
    }
}
?>