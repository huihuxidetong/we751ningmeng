<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style type='text/css'>
    .ordertable { width:100%;position: relative;margin-bottom:10px}
    .ordertable tr td:first-child { text-align: right }
    .ordertable tr td {padding:10px 5px 0;vertical-align: top}
    .ordertable1 tr td { text-align: right; }
    .ops .btn { padding:5px 10px;}
    .order-container{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .order-container-left{
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }
    .order-container-static{
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        padding: 30px 50px 0;
    }
    .font18{
        font-size:20px;
        font-weight:bold;;
    }
    .trbagpack span{
        margin: 0 10px;
        display: inline-block;
        vertical-align: middle;
    }
    .trbagpack span.address{
        width:150px;
        overflow: hidden;
        text-overflow:ellipsis;
        white-space: nowrap;
    }
    tfoot .price{
        float: right;
    }
    tfoot .price-inner{
        display: inline-block;
        vertical-align: middle;
        width:100px;
        text-align: right;
    }
    .packbag-group{
        border:1px solid #efefef;
    }
    .packbag{
        padding: 0 30px;
    }
    .packbag-title{
        line-height: 33px;
    }
    .packbag-group .packbag-list{
        padding: 20px 33px;
        border-bottom: 1px solid #efefef;
        display: flex;
        align-items: center;
    }
    .packbag-list .packbag-media{
        width:100px;
    }
    .packbag-list .packbag-inner{
        border-left:1px solid #efefef;
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }
    .packbag-goods-list{
        display: flex;
        flex-wrap: wrap;
        width:100%;
    }
    .packbag-goods{
        width:25%;
        display: flex;
        display: -webkit-flex;
        margin: 10px 0 5px;
    }
    .packbag-goods-media{
        width:52px;
        height: 52px;
        margin-right: 10px;
    }
    .packbag-goods-media img{
        width:52px;
        height: 52px;
        border: 1px solid #efefef;
    }
    .packbag-goods-inner{
        flex:1;
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        overflow: hidden;
    }
    .packbag-goods-inner p{
        color: #999;
    }
    .packbag-goods-inner .title{
        width:100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .table .trorder td{
        border-right:1px solid #efefef;
    }
    .table .trorder td:nth-of-type(1){
        border:none;
    }
</style>
<div class="page-header">
    当前位置：<span class="text-primary">订单详情</span><a class='op text-primary' style="float: right"  href="<?php  echo webUrl('order/print', array('id' => $item['id']))?>" >打印预览</a>
</div>
<div class="page-content">
<?php  if($item['status']!=-1) { ?>
<div class="step-region" >
    <ul class="ui-step ui-step-4" >
        <li <?php  if(0<=$item['status']) { ?>class="ui-step-done"<?php  } ?>>
        <div class="ui-step-number" >1</div>
        <div class="ui-step-title" >买家下单</div>
        <div class="ui-step-meta" ><?php  if(0<=$item['status']) { ?><?php  echo date('Y-m-d',$item['createtime'])?><br/><?php  echo date('H:i:s',$item['createtime'])?><?php  } ?></div>
        </li>
        <li <?php  if(!empty($item['paytime']) || $item['paytype']==3) { ?>class="ui-step-done"<?php  } ?>>
        <div class="ui-step-number">2</div>
        <div class="ui-step-title"><?php  if($item['paytype']==3) { ?>货到付款<?php  } else { ?>买家付款<?php  } ?></div>
        <div class="ui-step-meta"><?php  if($item['paytype']==3) { ?><?php  $item['paytime'] = $item['cashtime']?><?php  } ?><?php  if(1<=$item['status'] || $item['paytype']==3) { ?><?php  echo date('Y-m-d',$item['paytime'])?><br/><?php  echo date('H:i:s',$item['paytime'])?><?php  } ?></div>
        </li>
        <li <?php  if(2<=$item['status']) { ?>class="ui-step-done"<?php  } ?>>
        <div class="ui-step-number" >3</div>
        <div class="ui-step-title"><?php  if($item['isverify'] == 1) { ?>
            确认使用
            <?php  } else if(!empty($item['addressid'])) { ?>
            商家发货
            <?php  } else if(!empty($item['isvirtualsend']) || !empty($item['virtual'])) { ?>
            自动发货
            <?php  } else { ?>
            确认取货
            <?php  } ?></div>
        <div class="ui-step-meta" ><?php  if(2<=$item['status']) { ?><?php  echo date('Y-m-d',$item['sendtime'])?><br/><?php  echo date('H:i:s',$item['sendtime'])?><?php  } ?></div>
        </li>
        <li <?php  if(3<=$item['status']) { ?>class="ui-step-done"<?php  } ?>>
        <div class="ui-step-number" >4</div>
        <div class="ui-step-title">订单完成</div>
        <div class="ui-step-meta"><?php  if(3<=$item['status']) { ?><?php  echo date('Y-m-d',$item['finishtime'])?><br/><?php  echo date('H:i:s',$item['finishtime'])?><?php  } ?></div>
        </li>
    </ul>
</div>
<?php  } ?>
<form class="form-horizontal form" action="" method="post">
    <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />

    <input type="hidden" name="dispatchid" value="<?php  echo $dispatch['id'];?>" />

    <div  class='row order-container'>
        <div class="order-container-left" style="border-right: 1px solid #efefef;">
            <div class='panel-body' >
                <div class="form-group" style='padding:0 10px;'>
                    <table class='ordertable' style='table-layout:fixed'>
                        <tr>
                            <td style='width:80px'>订单编号：</td>
                            <td><?php  echo $item['ordersn'];?></td>
                        </tr>
                        <tr>
                            <td>订单金额：</td>
                            <td>￥<?php  echo number_format($item['price'],2)?></td>
                        </tr>

                        <?php  if(!empty($coupon)) { ?>
                        <tr>
                            <td>优惠券：</td>
                            <td><a href="<?php  echo merchUrl('sale/coupon/edit',array('id'=>$coupon['id']))?>" target='_blank'><?php  echo $coupon['couponname'];?></a> &nbsp;&nbsp;<a data-toggle='popover' data-trigger="hover" data-html='true' data-placement='right'
                                                                                                                                                                      data-content="<table style='width:100%;'>

                <tr>
                    <td style='border:none;text-align:right;'>优惠方式：</td>
                    <td style='border:none;text-align:right;'>
                    <?php  if($coupon['backtype']==0) { ?>
                        立减 <?php  echo $coupon['deduct'];?> 元
                    <?php  } else if($coupon['backtype']==1) { ?>
                        打 <?php  echo $coupon['discount'];?> 折
                    <?php  } else if($coupon['backtype']==2) { ?>
                        <?php  if($coupon['backmoney']>0) { ?>返 <?php  echo $coupon['backmoney'];?> 余额<?php  } ?>
                        <?php  if($coupon['backcredit']>0) { ?>返 <?php  echo $coupon['backcredit'];?> 积分<?php  } ?>
                        <?php  if($coupon['backredpack']>0) { ?>返 <?php  echo $coupon['backredpack'];?> 红包<?php  } ?>
                    <?php  } ?>
                    </td>
                </tr>


                <?php  if($coupon['backtype']==2) { ?>
                    <tr>
                        <td style='border:none;text-align:right;'>返利方式：</td>
                        <td style='border:none;text-align:right;'>
                        <?php  if($item['backwhen']==0) { ?>
                            交易完成后(过退款期限)
                        <?php  } else if($item['backwhen']==1) { ?>
                            订单完成后(收货后)
                        <?php  } else { ?>
                            订单付款后
                        <?php  } ?>
                        </td>
                    </tr>

                    <tr>
                        <td style='border:none;text-align:right;'>返利情况：</td>
                        <td style='border:none;text-align:right;'>
                        <?php  if(empty($coupon['back'])) { ?>
                            未返利
                        <?php  } else { ?>
                            已返利
                        <?php  } ?>
                        </td>
                    </tr>

                    <?php  if(!empty($coupon['back'])) { ?>
                    <tr>
                        <td style='border:none;text-align:right;'>返利时间：</td>
                        <td style='border:none;text-align:right;'><?php  echo date('Y-m-d H:i',$coupon['backtime'])?></td>
                    </tr>
                    <?php  } ?>
                <?php  } ?>


            </table>
"><i class='icow icow-help'></i></a></td>
                        </tr>
                        <?php  } ?>


                        <tr>
                            <td style='width:80px'>付款方式：</td>
                            <td> <?php  if($item['paytype'] == 0) { ?>未支付<?php  } ?>
                                <?php  if($item['paytype'] == 1) { ?>余额支付<?php  } ?>
                                <?php  if($item['paytype'] == 11) { ?>后台付款<?php  } ?>
                                <?php  if($item['paytype'] == 21) { ?>微信支付<?php  } ?>
                                <?php  if($item['paytype'] == 22) { ?>支付宝支付<?php  } ?>
                                <?php  if($item['paytype'] == 23) { ?>银联支付<?php  } ?>
                                <?php  if($item['paytype'] == 3) { ?>货到付款<?php  } ?></td>
                        </tr>

                        <tr>
                            <td>买家：</td>
                            <td><a href="<?php  echo merchUrl('member/list/detail',array('id'=>$member['id']))?>" target='_blank'><?php  echo $member['nickname'];?></a> &nbsp;&nbsp;<a data-trigger="hover" data-toggle='popover' data-html='true' data-placement='right'
                                                                                                                                                                      data-content="<table style='width:100%;'>
                <tr>
                    <td  style='border:none;text-align:right;' colspan='2'><img src='<?php  echo $member['avatar'];?>' style='width:100px;height:100px;padding:1px;border:1px solid #ccc' /></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>ID：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $member['id'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>昵称：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $member['nickname'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>姓名：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $member['realname'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>手机号：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $member['mobile'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>微信号：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $member['weixin'];?></td>
                </tr>
                </table>
"><i class='icow icow-help'></i></a></td>
                        </tr>
                        <?php  if(!empty($item['invoicename'])) { ?>
                        <tr>
                            <td style='width:80px'>发票抬头：</td>
                            <td><?php  echo $item['invoicename'];?></td>
                        </tr>
                        <?php  } ?>
                    </table>

                    <table class='ordertable' style='table-layout:fixed;border-top:1px dotted #ccc'>

                        <tr>
                            <td style='width:80px'>配送方式：</td>
                            <td>
                                <?php  if($item['isverify'] == 1) { ?>
                                    线下核销
                                <?php  } else if(!empty($item['addressid'])) { ?>
                                    快递
                                <?php  } else if(!empty($item['isvirtualsend']) || !empty($item['virtual'])) { ?>
                                    自动发货<?php  if(!empty($item['isvirtualsend'])) { ?>(虚拟物品)<?php  } else { ?>(虚拟卡密)<?php  } ?>
                                <?php  } else if($item['dispatchtype']) { ?>
                                    自提
                                <?php  } else { ?>
                                    其他
                                <?php  } ?>
                            </td>
                        </tr>

                        <?php  if($item['isverify']==1) { ?>
                            <tr>
                                <td style='width:80px'>核销方式：</td>
                                <td><?php  if($item['verifytype']==0) { ?>

                                    整单核销
                                    <?php  } else if($item['verifytype']==1) { ?>
                                    按次核销
                                    <?php  } else if($item['verifytype']==2) { ?>
                                    按消费码核销
                                    <?php  } ?>

                                </td>
                            </tr>

                            <?php  if($item['verifytype']==0) { ?>
                                <tr>
                                    <td style='width:80px'>消费码：</td>
                                    <td><?php  echo $item['verifycode'];?></td>
                                </tr>
                                <?php  if($item['verified']) { ?>
                                <tr>
                                    <td style='width:80px'>核销时间：</td>
                                    <td><?php  echo date('Y-m-d H:i:s', $item['verifytime'])?></td>
                                </tr>
                                <?php  if(!empty($saler)) { ?>
                                <tr>
                                    <td style='width:80px'>核销人：</td>
                                    <td><?php  echo $saler['nickname'];?>( <?php  echo $saler['salername'];?> )</td>
                                </tr>
                                <?php  } ?>
                                <?php  if(!empty($store)) { ?>
                                <tr>
                                    <td style='width:80px'>核销门店：</td>
                                    <td><?php  echo $store['storename'];?></td>
                                </tr>
                                <?php  } ?>
                            <?php  } ?>

                        <?php  } else if($item['verifytype']==1) { ?>
                        <tr>
                            <td style='width:80px'>消费记录：</td>
                            <td>
                                <a href='javascript:;' onclick='$("#verify-modal").modal()'><i class="fa fa-question-circle"></i> 查看</a>

                                <div id="verify-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">

                                    <div class="modal-dialog" style='width:850px'>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                <h3>核销记录</h3>
                                            </div>
                                            <div class="modal-body" >
                                                <div style='max-height:500px;overflow:auto;min-width:800px;'>
                                                    <table style='width:100%;' class='table'>
                                                        <tr><td style='width:150px'>时间</td><td style='width:100px'>核销员</td><td>门店</td></tr>
                                                        <?php  if(is_array($verifyinfo)) { foreach($verifyinfo as $v) { ?>
                                                            <tr><td><?php  echo date('Y-m-d H:i',$v['verifytime'])?></td><td><?php  echo $v['salername'];?><br/><small><?php  echo $v['nickname'];?></small></td><td><?php  echo $v['storename'];?></td></tr>
                                                        <?php  } } ?>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </td>
                        </tr>



                        <?php  } else if($item['verifytype']==2) { ?>
                        <tr>
                            <td style='width:80px'>消费码：</td>
                            <td><?php  echo $item['verifycode'];?></td>
                        </tr>
                        <?php  if(is_array($verifyinfo)) { foreach($verifyinfo as $v) { ?>
                        <?php  if($v['verified']) { ?>
                        <tr>
                            <td style='width:80px'><?php  echo $v['verifycode'];?></td>
                            <td>
                                <a data-toggle='popover' data-html='true' data-placement='right'
                                   data-content="<table style='width:100%;'>

                <tr>
                    <td  style='border:none;text-align:right;'>核销员：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $v['salername'];?>/<?php  echo $v['nickname'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>门店：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $v['storename'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>时间：</td>
                    <td  style='border:none;text-align:right;'><?php  echo date('Y-m-d H:i',$v['verifytime'])?></td>
                </tr>

                </table>" ><i class="fa fa-question-circle"></i> 使用信息</a>
                            </td>
                        </tr>
                        <?php  } ?>
                        <?php  } } ?>

                        <?php  } ?>

                        <?php  } ?>

                        <?php  if(!empty($item['addressid'])) { ?>
                        <tr>
                            <td style='width:80px'>收货人：</td>
                            <td style='word-break: break-all;white-space: normal'>
                                <?php  echo $user['address'];?>, <?php  echo $user['realname'];?>, <?php  echo $user['mobile'];?>, <?php  echo $user['shopname'];?> <a class='js-clip' data-url="<?php  echo $user['address'];?>, <?php  echo $user['realname'];?>, <?php  echo $user['mobile'];?>, <?php  echo $user['shopname'];?>">[复制]</a></td>
                        </tr>

                        <?php  } else if($item['isverify']==1 || !empty($item['virtual']) ||!empty($item['isvirtual'])) { ?>
                            <?php  if($item['status']>=2 && !empty($item['virtual']) ) { ?>
                                <tr>
                                    <td style='width:80px'>发货信息：</td>
                                    <td style='word-break: break-all;white-space: normal'><?php  echo str_replace("\n","<br/>", $item['virtual_str'])?></td>
                                </tr>
                            <?php  } ?>

                            <tr>
                                <td style='width:80px'>联系人：</td>
                                <td style='word-break: break-all;white-space: normal'><?php  echo $user['carrier_realname'];?>, <?php  echo $user['carrier_mobile'];?></td>
                            </tr>
                        <?php  } else { ?>
                            <tr>
                                <td style='width:80px'>自提码：</td>
                                <td><?php  echo $item['verifycode'];?></td>
                            </tr>
                            <tr>
                                <td style='width:80px'>自提人：</td>
                                <td style='word-break: break-all;white-space: normal'><?php  echo $user['address'];?>,  <?php  echo $user['realname'];?>, <?php  echo $user['mobile'];?></td>
                            </tr>
                        <?php  } ?>

                        <?php  if(!empty($item['remark'])) { ?>
                        <tr>
                            <td style='width:80px'>买家备注：</td>
                            <td><?php  echo $item['remark'];?></td>
                        </tr>
                        <?php  } ?>

                        <?php  if(!empty($item['addressid'])) { ?>
                        <?php if(mcv('order.op.changeaddress')) { ?>
                        <tr>
                            <td style='width:80px'></td>
                            <td style='word-break: break-all;white-space: normal'><a class="btn btn-primary btn-xs" data-toggle="ajaxModal" href="<?php  echo merchUrl('order/op/changeaddress', array('id' => $item['id']))?>">编辑收货信息</a></td>
                        </tr>
                        <?php  } ?>
                        <?php  } ?>

                    </table>

                    <?php  if(!empty($order_data)) { ?>
                    <table class='ordertable' style='table-layout:fixed;border-top:1px dotted #ccc'>
                        <tr>
                            <td style='width:120px'><h4>统一下单信息</h4></td>
                            <td></td>
                        </tr>
                        <?php  $datas = $order_data?>
                        <?php  $ii = 0;?>
                        <?php  if(is_array($order_fields)) { foreach($order_fields as $key => $value) { ?>

                        <tr <?php  if($ii>1) { ?>class="diymore2" style="display:none;"<?php  } ?>>
                            <td style='width:80px'><?php  echo $value['tp_name']?>：</td>
                            <td>
                                <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('diyform/diyform', TEMPLATE_INCLUDEPATH)) : (include template('diyform/diyform', TEMPLATE_INCLUDEPATH));?>

                            </td>
                        </tr>

                        <?php  if($ii==2) { ?>
                        <tr class="diymore22">
                            <td colspan="2"><a href="javascript:void(0);" style="padding-right: 100px;" id="showdiymore2">查看完整信息</a></td>
                        </tr>
                        <?php  } ?>

                        <?php  $ii++;?>
                        <?php  } } ?>
                    </table>
                    <?php  } ?>
                </div>
            </div>
        </div>
        <div class="order-container-static" >
            <div class='panel-body' style='height:380px;' >
                <div class='row'>
                    <span>订单状态：</span>
                        <span class="form-control-static">
                            <?php  if($item['status'] == 0) { ?>
                            <?php  if($item['paytype']==3) { ?>
                            <span class=" text-warning font18">待发货</span>
                            <?php  } else { ?>
                            <span class=" text-danger font18">待付款</span>
                            <?php  } ?>
                            <?php  } ?>
                            <?php  if($item['status'] == 1) { ?>
                                <span class="text-warning font18">
                                <?php  if($item['isverify'] == 1) { ?>
                                    待使用
                                <?php  } else if(empty($item['addressid'])) { ?>
                                    待取货
                                <?php  } else { ?>
                                    待发货
                                <?php  } ?>
                                </span>
                            <?php  } ?>
                            <?php  if($item['status'] == 2) { ?><span class="text-warning font18">待收货</span><?php  } ?>
                            <?php  if($item['status'] == 3) { ?><span class="text-success font18">交易完成</span><?php  } ?>
                            <?php  if($item['status'] == -1) { ?>
                            <span class="text-default">已关闭</span>
                            <?php  } ?>
                        </span>
                        <span class="form-control-static">
                            <?php  if($item['status'] == 0) { ?>
                            <?php  if($item['paytype']==3) { ?>
                            （此订单为货到付款订单，请商家尽快发货）
                            <?php  } else { ?>
                           （ 等待买家付款）
                            <?php  } ?>
                            <?php  } ?>
                            <?php  if($item['status'] == 1) { ?>（买家已经付款，请商家尽快发货）<?php  } ?>
                            <?php  if($item['status'] == 2) { ?>（商家已发货，等待买家收货并交易完成）<?php  } ?>
                            <?php  if($item['status'] == -1) { ?>
                            <?php  if(!empty($refund) && $refund['status']==1) { ?>
                            <span class="label label-default">（已维权）</span> <?php  if(!empty($refund['refundtime'])) { ?>维权时间: <?php  echo date('Y-m-d H:i:s',$refund['refundtime'])?><?php  } ?>
                            <?php  } ?>
                            <?php  } ?>
                        </span>

                    <?php  if(!empty($item['expresssn']) && $item['status']>=2 && !empty($item['addressid'])) { ?>
                    <div class="form-control-static">
                        快递公司: <?php  if(empty($item['expresscom'])) { ?>其他快递<?php  } else { ?><?php  echo $item['expresscom'];?><?php  } ?><br>
                        快递单号: <?php  echo $item['expresssn'];?> &nbsp;&nbsp;<a class='op' data-toggle="ajaxModal" href="<?php  echo merchUrl('util/express', array('id' => $item['id'],'express'=>$item['express'],'expresssn'=>$item['expresssn']))?>">查看物流</a><br>
                        发货时间: <?php  echo date('Y-m-d H:i:s', $item['sendtime'])?>
                    </div>
                    <?php  } ?>
                </div>





                <div >
                        <p class="form-control-static ops">
                            <?php  $detial_flag = 1?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('order/ops', TEMPLATE_INCLUDEPATH)) : (include template('order/ops', TEMPLATE_INCLUDEPATH));?>
                            &nbsp;&nbsp;
                            <?php  if($item['status'] ==0 && $merch_user['changepricechecked'] == 1) { ?>
                            <?php if(mcv('order.op.changeprice')) { ?>
                            <a class='op'  data-toggle='ajaxModal' href="<?php  echo merchUrl('order/op/changeprice',array('id'=>$item['id']))?>">订单改价</a>&nbsp;&nbsp;
                            <?php  } ?>
                            <?php  } ?>

                            <?php if(mcv('order.op.remarksaler')) { ?>
                            <a  data-toggle="ajaxModal" href="<?php  echo merchUrl('order/op/remarksaler', array('id' => $item['id']))?>" <?php  if(!empty($item['remarksaler'])) { ?>style='color:red'<?php  } ?> >备注</a>
                            <?php  } ?>

                        </p>
                </div>


                <?php  if($item['status'] >0) { ?>
                <div class='order-tips'>
                    <div class='row order-tips-title'>友情提醒</div>

                    <?php  if($item['status'] == 0) { ?>
                    <?php  if($item['paytype']==3) { ?>
                    <div class='row order-tips-row'>订单为货到付款，请您务必联系买家确认后再进行发货</div>
                    <?php  } else { ?>
                    <div class='row order-tips-row'>您可以联系买家进行付款，否则订单会根据设置自动关闭</div>
                    <?php  } ?>
                    <?php  } ?>
                    <?php  if($item['status'] == 1) { ?>
                    <div class='row order-tips-row'>如果无法进行发货，请及时联系买家进行妥善处理;</div>
                    <?php  } ?>
                    <?php  if($item['status'] == 2) { ?>
                    <div class='row order-tips-row'>请及时关注物流状态，确保买家及时收到商品;</div>
                    <div class='row order-tips-row'>如果买家未收到货物或有退换货请求，请及时联系买家妥善处理</div>
                    <?php  } ?>

                    <?php  if($item['status']==3) { ?>
                    <div class='row order-tips-row'>交易成功，如买家有售后申请，请与买家进行协商，妥善处理</div>
                    <?php  } ?>
                </div>
                <?php  } ?>


            </div>

        </div>
        <?php  if(p('commission') && count($agents)>0 && $merch_user['commissionchecked'] == 1) { ?>
        <div class="distribution col-sm-4 col-md-3">
            <div class="row" style="margin: 20px 0 0 10px;">

                <?php  if(is_array($agents)) { foreach($agents as $key => $value) { ?>

                <div class="">

                    <?php  if(!empty($value)) { ?>
                    <h4 class="m-t-none m-b">
                        <?php  if($key == 0) { ?>
                        一级分销商
                        <?php  } else if($key == 1) { ?>
                        二级分销商
                        <?php  } else if($key == 2) { ?>
                        三级分销商
                        <?php  } ?>
                    </h4>
                    <div class="form-group" style='padding:0 10px;'>
                        <table class='ordertable' style='table-layout:fixed'>
                            <tr>
                                <td style='width:80px'>姓名：</td>
                                <td><?php  echo $value['realname'];?> &nbsp;&nbsp;<a data-toggle='popover' data-html='true' data-placement='right'
                                                                        data-content="<table style='width:100%;'>

                <tr>
                    <td  style='border:none;text-align:right;' colspan='2'><img src='<?php  echo $value['avatar'];?>' style='width:100px;height:100px;padding:1px;border:1px solid #ccc' /></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>ID：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $value['id'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>昵称：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $value['nickname'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>姓名：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $value['realname'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>手机号：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $value['mobile'];?></td>
                </tr>
                <tr>
                    <td  style='border:none;text-align:right;'>微信号：</td>
                    <td  style='border:none;text-align:right;'><?php  echo $value['weixin'];?></td>
                </tr>
                </table>
"><i class='fa fa-question-circle'></i></a></td>
                            </tr>

                            <tr>
                                <td style='width:80px'>手机号：</td>
                                <td><?php  echo $value['mobile'];?></td>
                            </tr>

                            <tr>
                                <td style='width:80px'>佣金：</td>
                                <td><?php  echo $value['commission'];?></td>
                            </tr>

                        </table>
                    </div>
                    <?php  } ?>

                </div>
                <?php  } } ?>
            </div>
            <br>

        </div>
        <?php  } ?>
    </div>

    <br>


        <h3 class="order-title">商品信息</h3>
        <div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr  class="trorder">
                    <th style="width:80px">标题</th>
                    <th ></th>
                    <th style="padding-left: 20px">规格/编号/条码</th>
                    <th style="text-align: center" >单价(元)/数量</th>
                    <th style="text-align: center">数量</th>
                    <th  style="text-align: center">折扣前（元）</th>
                    <th style="text-align: center">折扣后（元）</th>
                    <?php  if(!empty($goods['diyformdata']) && $goods['diyformdata'] != 'false') { ?>
                    <th style="text-align: center"></th>
                    <?php  } ?>
                    <?php  if($showdiyform) { ?>
                        <th style="text-align: center;">自定义信息</th>
                    <?php  } ?>
                </tr>
                </thead>
                <?php  if(is_array($item['goods'])) { foreach($item['goods'] as $goods) { ?>
                <tr  class="trorder">
                    <td>
                        <img src="<?php  echo tomedia($goods['thumb'])?>" style='width:70px;height:70px;border:1px solid #efefef; padding:1px;'onerror="this.src='../addons/ewei_shopv2/static/images/nopic.png'">
                    </td>
                    <td class='full'>
                        <?php  if($category[$goods['pcate']]['name']) { ?>
                        <span class="text-error">[<?php  echo $category[$goods['pcate']]['name'];?>] </span><?php  } ?><?php  if($children[$goods['pcate']][$goods['ccate']]['1']) { ?>
                        <span class="text-info">[<?php  echo $children[$goods['pcate']][$goods['ccate']]['1'];?>] </span>
                        <?php  } ?>
                        <?php  echo $goods['title'];?> <?php  if(!empty($goods['invoice'])) { ?><label class='label label-danger'>支持开票</label><?php  } ?>
                    </td>
                    <td style="padding: 10px 20px"><?php  if(!empty($goods['optionname'])) { ?>规格：<span class="label label-info"><?php  echo $goods['optionname'];?></span><?php  } ?>
                        <?php  if(!empty($goods['goodssn'])) { ?><br/>编码:<?php  echo $goods['goodssn'];?><?php  } ?>
                        <?php  if(!empty($goods['productsn'])) { ?><br/>条码:<?php  echo $goods['productsn'];?><?php  } ?></td>
                    <td style="text-align: center"><?php  echo $goods['marketprice'];?>
                    </td>
                    <td style="text-align: center"><?php  echo $goods['total'];?>个</td>
                    <td style="text-align: center" >
                        <?php  echo $goods['orderprice'];?>
                    </td>
                    <td style="text-align: center">
                        <?php  echo $goods['realprice'];?>
                        <?php  if(intval($goods['changeprice'])!=0) { ?>
                        <br/>(改价<?php  if($goods['changeprice']>0) { ?>+<?php  } ?><?php  echo number_format(abs($goods['changeprice']),2)?>)
                        <?php  } ?>
                    </td>

                    <?php  if(!empty($goods['diyformdata']) && $goods['diyformdata'] != 'false') { ?>
                    <td style="text-align: center;">
                        <a href='javascript:;' class='text-primary' hide="1"  data="<?php  echo $goods['id'];?>" onclick="showDiyInfo(this)">点击展开</a>
                    </td>
                    <?php  } ?>
                    <!--td>
                        <a href="<?php  echo merchUrl('goods/edit', array('id' => $goods['id']))?>" class="btn btn-default btn-sm" title="编辑"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                    </td-->
                </tr>

                <?php  if(!empty($goods['diyformdata']) && $goods['diyformdata'] != 'false') { ?>
                <tr  class="trorder" style='display: none;' id="diyinfo_<?php  echo $goods['id'];?>">
                    <td colspan='8'>
                        <table class='ordertable'>
                            <?php  $datas = $goods['diyformdata']?>
                            <?php  if(is_array($goods['diyformfields'])) { foreach($goods['diyformfields'] as $key => $value) { ?>
                            <tr>
                                <td style='width:80px'><?php  echo $value['tp_name']?>：</td>
                                <td style="border: 0;">
                                    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('diyform/diyform', TEMPLATE_INCLUDEPATH)) : (include template('diyform/diyform', TEMPLATE_INCLUDEPATH));?>
                                </td>
                            </tr>
                            <?php  } } ?>
                        </table>
                    </td>
                </tr>
                <?php  } ?>
                <?php  } } ?>
                <tfoot style="padding-top: 20px">
                <tr class="trorder">
                    <td colspan="2" style="padding-left: 20px"> <?php  if($item['ispackage']) { ?>
                        <span class="text-danger" style="color:red;">（套餐优惠价：&yen;<?php  echo number_format($item['price'],2)?><?php  if($item['dispatchprice'] ) { ?>，含运费：&yen;<?php  echo number_format($item['dispatchprice'],2)?><?php  } ?>）</span>
                        <?php  } ?>
                    </td>
                    <td  <?php  if(!empty($goods['diyformdata']) && $goods['diyformdata'] != 'false') { ?>
                    colspan="6"
                    <?php  } else { ?>
                    colspan="5"
                    <?php  } ?>
                    style="padding-right: 60px">
                    <div class="price">
                        <p> <span class="price-inner">商品小计：</span><span style="font-weight: bold">￥<?php  echo $item['goodsprice'];?></span></p>
                        <p><span class="price-inner">运费：</span>￥<?php  echo $item['olddispatchprice'];?></p>
                        <?php  if(!$item['ispackage']) { ?>
                        <?php  if($item['taskdiscountprice']>0 ) { ?>
                        <p><span class="price-inner">任务活动优惠：</span><span class="text-danger">-￥<?php  echo $item['taskdiscountprice'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['lotterydiscountprice']>0 ) { ?>
                        <p><span class="price-inner">游戏活动优惠：</span><span class="text-danger">-￥<?php  echo $item['lotterydiscountprice'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['discountprice']>0 ) { ?>
                        <p><span class="price-inner">会员折扣：</span><span class="text-danger">-￥<?php  echo $item['discountprice'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['deductprice']>0 ) { ?>
                        <p><span class="price-inner">积分抵扣：</span><span class="text-danger">-￥<?php  echo $item['deductprice'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['deductcredit2']>0 ) { ?>
                        <p><span class="price-inner">余额抵扣：</span><span class="text-danger">-￥<?php  echo $item['deductcredit2'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['deductenough']>0 ) { ?>
                        <p><span class="price-inner">商城满额立减：</span><span class="text-danger">-￥<?php  echo $item['deductenough'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['merchdeductenough']>0 ) { ?>
                        <p><span class="price-inner">商户满额立减：</span><span class="text-danger">-￥<?php  echo $item['merchdeductenough'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['couponprice']>0 ) { ?>
                        <p><span class="price-inner">优惠券优惠：</span><span class="text-danger">-￥<?php  echo $item['couponprice'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['isdiscountprice']>0 ) { ?>
                        <p><span class="price-inner">促销优惠：</span><span class="text-danger">-￥<?php  echo $item['isdiscountprice'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['buyagainprice']>0 ) { ?>
                        <p><span class="price-inner">重复购买优惠：</span><span class="text-danger">-￥<?php  echo $item['buyagainprice'];?></span></p>
                        <?php  } ?>
                        <?php  if($item['seckilldiscountprice']>0 ) { ?>
                        <p><span class="price-inner">秒杀优惠：</span><span class="text-danger">-￥<?php  echo $item['seckilldiscountprice'];?></span></p>
                        <?php  } ?>
                        <?php  } ?>

                        <?php  if(intval($item['changeprice'])!=0) { ?>
                        <p>
                            <span class="price-inner">卖家改价：</span>
                            <span style='<?php  if(0<$item['changeprice']) { ?>color:green<?php  } else { ?>color:red<?php  } ?>'><?php  if(0<$item['changeprice']) { ?>+<?php  } else { ?>-<?php  } ?>￥<?php  echo number_format(abs($item['changeprice']),2)?></span>
                        </p>
                        <?php  } ?>

                        <?php  if(intval($item['changedispatchprice'])!=0) { ?>
                        <p>
                            <span class="price-inner">卖家改运费：</span>
                            <span style='<?php  if(0<$item['changedispatchprice']) { ?>color:green<?php  } else { ?>color:red<?php  } ?>'><?php  if(0<$item['changedispatchprice']) { ?>+<?php  } else { ?>-<?php  } ?>￥<?php  echo abs($item['changedispatchprice'])?></span>
                        </p>
                        <?php  } ?>

                        <p><span class="price-inner">实付款：</span><span style="font-size: 14px;font-weight: bold;color: #e4393c">￥<?php  echo $item['price'];?></span></p>
                    </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
</form>
</div>
<script language='javascript'>
    $(function () {
        $("#showdiymore1").click(function () {
            $(".diymore1").show();
            $(".diymore11").hide();
        });

        $("#showdiymore2").click(function () {
            $(".diymore2").show();
            $(".diymore22").hide();
        });
    });

    function showDiyInfo(obj){
        var data = $(obj).attr('data');
        var id = "diyinfo_" + data;

        var hide = $(obj).attr('hide');
        if(hide=='1'){
            $("#"+id).show();
            $(obj).text('点击收起');
        } else{
            $("#"+id).hide();
            $(obj).text('点击展开');
        }
        $(obj).attr('hide',hide=='1'?'0':'1');
    }

</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
