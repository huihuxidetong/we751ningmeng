<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?><style type='text/css'>    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{        padding: 10px 20px;    }    .table > tbody>.trbody > td{        border-top:none !important;    }    .trhead td {  background:#efefef;text-align: center}    .trbody td {  text-align: center; vertical-align:top;border-left:1px solid #f2f2f2;overflow: hidden; font-size:12px;}    .trorder { background:#f8f8f8;border:1px solid #f2f2f2;text-align:left;}    .ops { border-right:1px solid #f2f2f2; text-align: center;}    .shop{        display: inline-block;        width:48px;        height:18px;        text-align: center;        border:1px solid #1b86ff;        color: #1b86ff;        margin-right: 10px;    }    .min_program{        display: inline-block;        width:48px;        height:18px;        text-align: center;        border:1px solid #ff5555;        color: #ff5555;        margin-right: 10px;    }</style><div class="page-header">    当前位置：<span class="text-ptimary">订单管理</span>    <span>(订单数:  <span class='text-danger'><?php  echo $total;?></span> 订单金额:  <span class='text-danger'><?php  echo $totalmoney;?></span> <?php  if(!empty($magent['nickname'])) { ?>订单推广人:  <span class='text-danger'><?php  echo $magent['nickname'];?></span><?php  } ?>)</span></div><div class="page-content">    <form action="./index.php" method="get" class="form-horizontal table-search" role="form"  id="search">        <input type="hidden" name="c" value="site" />        <input type="hidden" name="a" value="entry" />        <input type="hidden" name="m" value="ewei_shopv2" />        <input type="hidden" name="do" value="web" />        <input type="hidden" name="r" value="order.list<?php  echo $st;?>" />        <input type="hidden" name="status" value="<?php  echo $status;?>" />        <input type="hidden" name="agentid" value="<?php  echo $_GPC['agentid'];?>" />        <input type="hidden" name="refund" value="<?php  echo $_GPC['refund'];?>" />        <input type="hidden" name="headsid" value="<?php  echo $_GPC['headsid'];?>" />        <div class="page-toolbar m-b-sm m-t-sm">            <div class="col-sm-12">                <div class="input-group">                    <div class="input-group-select">                        <select name="paytype" class="form-control" >                            <option value="" <?php  if($_GPC['paytype']=='') { ?>selected<?php  } ?>>支付方式</option>                            <?php  if(is_array($paytype)) { foreach($paytype as $key => $type) { ?>                            <option value="<?php  echo $key;?>" <?php  if($_GPC['paytype'] == "$key") { ?> selected="selected" <?php  } ?>><?php  echo $type['name'];?></option>                            <?php  } } ?>                        </select>                    </div>                    <div class="input-group-select">                        <select name='searchtime'  class='form-control'>                            <option value=''>不按时间</option>                            <option value='create' <?php  if($_GPC['searchtime']=='create') { ?>selected<?php  } ?>>下单时间</option>                            <option value='pay' <?php  if($_GPC['searchtime']=='pay') { ?>selected<?php  } ?>>付款时间</option>                            <option value='send' <?php  if($_GPC['searchtime']=='send') { ?>selected<?php  } ?>>发货时间</option>                            <option value='finish' <?php  if($_GPC['searchtime']=='finish') { ?>selected<?php  } ?>>完成时间</option>                        </select>                    </div>                    <span class="input-group-btn">                        <?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)),true);?>                    </span>                    <div class="input-group-select">                        <select name='searchfield'  class='form-control'   style="width:95px;padding:0 5px;"  >                            <option value='ordersn' <?php  if($_GPC['searchfield']=='ordersn') { ?>selected<?php  } ?>>订单号</option>                            <option value='member' <?php  if($_GPC['searchfield']=='member') { ?>selected<?php  } ?>>会员信息</option>                            <option value='address' <?php  if($_GPC['searchfield']=='address') { ?>selected<?php  } ?>>收件人信息</option>                            <option value='location' <?php  if($_GPC['searchfield']=='location') { ?>selected<?php  } ?>>地址信息</option>                            <option value='expresssn' <?php  if($_GPC['searchfield']=='expresssn') { ?>selected<?php  } ?>>快递单号</option>                            <option value='goodstitle' <?php  if($_GPC['searchfield']=='goodstitle') { ?>selected<?php  } ?>>商品名称</option>                            <option value='goodssn' <?php  if($_GPC['searchfield']=='goodssn') { ?>selected<?php  } ?>>商品编码</option>                            <option value='saler' <?php  if($_GPC['searchfield']=='saler') { ?>selected<?php  } ?>>核销员</option>                            <option value='store' <?php  if($_GPC['searchfield']=='store') { ?>selected<?php  } ?>>核销门店</option>                        </select>                    </div>                    <input type="text" class="form-control"  name="keyword" value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"/>                    <span class="input-group-btn">                        <button class="btn btn-primary" type="submit"> 搜索</button>                        <button type="submit" name="export" value="1" class="btn btn-success">导出</button>                    </span>                </div>            </div>        </div>    </form>    <div class="page-table-header">        <input type='checkbox'/>        <?php  if($status ==1 ) { ?>        <div class="btn-group">            <button class="btn btn-default btn-sm  btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('order/list/send')?>">                批量发货            </button>        </div>        <?php  } ?>        <div class="btn-group">            <a href="javascript:void(0)" onclick="beachprint()">批量打印</a>        </div>    </div>    <?php  if(count($list)>0) { ?>    <table class='table table-responsive' style='table-layout: fixed;'>        <tr style='background:#f8f8f8'>            <td style='width:150px;border-left:1px solid #f2f2f2;'>商品</td>            <td style='width:60px;'></td>            <td style='width:60px;'></td>            <td  style='width:100px;text-align: center;'>买家</td>            <td style='width:90px;text-align: center;'>支付/配送</td>            <td style='width:100px;text-align: center;'>价格</td>            <td style='width:100px;text-align: center;'>操作</td>            <td style='width:90px;text-align: center'>状态</td>        </tr>        <?php  if(is_array($list)) { foreach($list as $item) { ?>        <tr ><td style='height:20px;padding:0;border-top:none;'>&nbsp;</td></tr>        <tr class='trorder'>            <td >                <input type='checkbox'name="checkitem"  value="<?php  echo $item['id'];?>"/>            </td>            <td  colspan="4">                 <span style="font-weight; bold;margin-left: 10px;color: #2d2d31">                 <?php  if($item['iswxappcreate']==0) { ?><span class="shop">商城</span><?php  } else { ?><span class="min_program">小程序</span><?php  } ?><?php  if($item['is_cashier'] == 1) { ?><span class="shop">收银台</span><?php  } ?>                     <?php  echo date('Y-m-d',$item['createtime'])?>&nbsp <?php  echo date('H:i:s',$item['createtime'])?>                  </span>            订单编号:  <?php  echo $item['ordersn'];?><?php  if($item['ispackage']) { ?>&nbsp;<span class="label label-success">套餐</span><?php  } ?>            <?php  if(!empty($item['refundstate'])) { ?><label class='label label-danger'><?php  echo $r_type[$item['rtype']];?>申请</label><?php  } ?>            <?php  if(!empty($item['refundstate'])) { ?><label class='label label-danger'><?php  echo $r_type[$item['rtype']];?>申请</label><?php  } ?>            <?php  if(!empty($item['refundstate']) && $item['rstatus'] == 4) { ?><label class='label label-default'>客户退回物品</label><?php  } ?>            </td>            <td  colspan="3" style='text-align:right;font-size:12px;' class='aops'>            <?php  if($item['merchid'] == 0) { ?>            <?php if(cv('order.op.remarksaler')) { ?>            <a class='op'  data-toggle="ajaxModal" href="<?php  echo webUrl('order/op/remarksaler', array('id' => $item['id']))?>" >                <?php  if(!empty($item['remarksaler'])) { ?>                <i class="icow icow-flag-o" style="color: #df5254;display: inline-block;vertical-align: middle" title="  查看备注"></i>                备注                &nbsp                <?php  } else { ?>                <i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="  添加备注" ></i>                备注                &nbsp                <?php  } ?>            </a>            <?php  } ?>            <?php  } ?>            <?php  if($item['merchid'] == 0) { ?>            <?php  if(($item['statusvalue']>=2 || $item['sendtype']>0) && !empty($item['addressid']) && $item['statusvalue']!=3 &&$item['city_express_state']==0) { ?>            <?php if(cv('order.op.send')) { ?>            <a class="op" data-toggle="ajaxModal"  href="<?php  echo webUrl('order/op/changeexpress', array('id' => $item['id']))?>">                <i class="icow icow-wuliu" title="修改物流" style="color: #999;display: inline-block;vertical-align: middle"></i>                修改物流                &nbsp            </a>            <?php  } ?>            <?php  } ?>            <?php  } ?>            <?php  if($item['merchid'] == 0) { ?>            <?php  if(empty($item['statusvalue'])) { ?>            <?php if(cv('order.op.changeprice')) { ?>            <?php  if($item['ispackage'] ==0) { ?>            <a class='op'  data-toggle='ajaxModal' href="<?php  echo webUrl('order/op/changeprice',array('id'=>$item['id']))?>">                <i class="icow icow-gaijia" title="订单改价"  style="color: #999;display: inline-block;vertical-align: middle"></i>                订单改价                &nbsp            </a>            <?php  } ?>            <?php  } ?>            <?php  if($item['ismerch'] == 0) { ?>            <?php if(cv('order.op.close')) { ?>            <a class='op'  data-toggle='ajaxModal' href="<?php  echo webUrl('order/op/close',array('id'=>$item['id']))?>" >                <i class="icow icow-shutDown" title="关闭订单"  style="color: #999;margin-right: 3px;display: inline-block;vertical-align: middle"></i>                关闭订单                &nbsp            </a>            <?php  } ?>            <?php  } ?>            <?php  } ?>            <?php  } ?>            <!--<a class='op'   href="<?php  echo webUrl('order', array('op' => 'detail', 'id' => $item['id']))?>" >标记</a>-->            </td>        </tr>        <?php  if(is_array($item['goods'])) { foreach($item['goods'] as $k => $g) { ?>        <tr class='trbody'>            <td style='overflow:hidden;'><img src="<?php  echo tomedia($g['thumb'])?>" style='width:50px;height:50px;border:1px solid #ccc; padding:1px;'></td>            <td style='text-align: left;overflow:hidden;border-left:none;'  ><?php  echo $g['title'];?><?php  if(!empty($g['optiontitle'])) { ?><br/><?php  echo $g['optiontitle'];?><?php  } ?><br/><?php  echo $g['goodssn'];?></td>            <td style='text-align:right;border-left:none;'><?php  echo number_format($g['realprice']/$g['total'],2)?><br/>x<?php  echo $g['total'];?></td>            <?php  if($k==0) { ?>            <td rowspan="<?php  echo count($item['goods'])?>" style='text-align: center; white-space: normal;' >                <?php if(cv('member.list.edit')) { ?>                <a href="<?php  echo webUrl('member/list/detail',array('id'=>$item['mid']))?>"> <?php  echo $item['nickname'];?></a>                <?php  } else { ?>                <?php  echo $item['nickname'];?>                <?php  } ?>                <br/>                <?php  echo $item['addressdata']['realname'];?>                <br/><?php  echo $item['addressdata']['mobile'];?>                <?php  if(!empty($item['addressdata']['shopname'])) { ?>                <br/><?php  echo $item['addressdata']['shopname'];?>                <?php  } ?>                <br/><?php  echo $item['addressdata']['address'];?>            </td>            <td rowspan="<?php  echo count($item['goods'])?>" style='text-align:center;' >                <!-- 已支付 -->                <?php  if($item['statusvalue'] > 0) { ?>                <?php  if($item['paytypevalue']==1) { ?>                <span> <i class="icow icow-yue text-warning" style="font-size: 17px;"></i><span>余额支付</span></span>                <?php  } else if($item['paytypevalue']==11) { ?>                <span> <i class="icow icow-kuajingzhifuiconfukuan text-danger" style="font-size: 17px"></i>后台付款</span>                <?php  } else if($item['paytypevalue']==21) { ?>                <span> <i class="icow icow-weixinzhifu text-success" style="font-size: 17px"></i>微信支付</span>                <?php  } else if($item['paytypevalue']==22) { ?>                <span><i class="icow icow-zhifubaozhifu text-primary" style="font-size: 17px"></i>支付宝支付</span>                <?php  } ?>                <?php  } else if($item['statusvalue'] == 0) { ?>                <!-- 未支付 -->                <?php  if($item['paytypevalue']!=3) { ?>                <span> <i class="icow icow-shibai text-danger" style="font-size: 17px"></i>未支付</span>                <?php  } else { ?>                <span> <i class="text-primary icow icow-icon" style="font-size: 17px"></i>货到付款</span>                <?php  } ?>                <?php  } else if($item['statusvalue'] == -1) { ?>                <?php  if($item['paytypevalue']==1) { ?>                <span> <i class="icow icow-yue text-warning" style="font-size: 17px;display:inline-block;height: 17px;width: 17px;padding-top: 3px"></i><span>余额支付</span></span>                <?php  } else if($item['paytypevalue']==11) { ?>                <span> <i class="icow icow-kuajingzhifuiconfukuan text-danger" style="font-size: 17px"></i>后台付款</span>                <?php  } else if($item['paytypevalue']==21) { ?>                <span> <i class="icow icow-weixin text-success" style="font-size: 17px"></i>微信支付</span>                <?php  } else if($item['paytypevalue']==22) { ?>                <span><i class="icow icow-zhifubao text-primary" style="font-size: 17px"></i>支付宝支付</span>                <?php  } ?>                <?php  } ?>                <?php  if($item['paytypevalue'] == 3 && $item['is_cashier'] == 1) { ?>                <span style='margin-top:5px;display:block;'>收银台现金收款</span>                <?php  } else { ?>                <!-- <span style='margin-top:5px;display:block;'><?php  echo $item['dispatchname'];?></span> -->                <?php  } ?>            </td>            <td rowspan="<?php  echo count($item['goods'])?>" style='text-align:center' >                ￥<?php  echo number_format($item['price'],2)?> <a data-toggle='popover' data-html='true' data-placement='right' data-trigger="hover" data-content="<table style='width:100%;'>                    <tr>                        <td  style='border:none;text-align:right;'>商品小计：</td>                        <td  style='border:none;text-align:right;;'>￥<?php  echo number_format( $item['goodsprice'] ,2)?></td>                    </tr>                    <tr>                        <td  style='border:none;text-align:right;'>运费：</td>                        <td  style='border:none;text-align:right;;'>￥<?php  echo number_format( $item['olddispatchprice'],2)?></td>                    </tr>                    <?php  if($item['discountprice']>0) { ?>                    <tr>                        <td  style='border:none;text-align:right;'>会员折扣：</td>                        <td  style='border:none;text-align:right;;'>-￥<?php  echo number_format( $item['discountprice'],2)?></td>                    </tr>                    <?php  } ?>                    <?php  if($item['deductprice']>0) { ?>                    <tr>                        <td  style='border:none;text-align:right;'>积分抵扣：</td>                        <td  style='border:none;text-align:right;;'>-￥<?php  echo number_format( $item['deductprice'],2)?></td>                    </tr>                    <?php  } ?>                    <?php  if($item['deductcredit2']>0) { ?>                    <tr>                        <td  style='border:none;text-align:right;'>余额抵扣：</td>                        <td  style='border:none;text-align:right;;'>-￥<?php  echo number_format( $item['deductcredit2'],2)?></td>                    </tr>                    <?php  } ?>                    <?php  if($item['deductenough']>0) { ?>                    <tr>                        <td  style='border:none;text-align:right;'>商城满额立减：</td>                        <td  style='border:none;text-align:right;;'>-￥<?php  echo number_format( $item['deductenough'],2)?></td>                    </tr>                    <?php  } ?>                    <?php  if($item['merchdeductenough']>0) { ?>                    <tr>                        <td  style='border:none;text-align:right;'>商户满额立减：</td>                        <td  style='border:none;text-align:right;;'>-￥<?php  echo number_format( $item['merchdeductenough'],2)?></td>                    </tr>                    <?php  } ?>                    <?php  if($item['couponprice']>0) { ?>                    <tr>                        <td  style='border:none;text-align:right;'>优惠券优惠：</td>                        <td  style='border:none;text-align:right;;'>-￥<?php  echo number_format( $item['couponprice'],2)?></td>                    </tr>                    <?php  } ?>                    <?php  if($item['isdiscountprice']>0) { ?>                    <tr>                        <td  style='border:none;text-align:right;'>促销优惠：</td>                        <td  style='border:none;text-align:right;;'>-￥<?php  echo number_format( $item['isdiscountprice'],2)?></td>                    </tr>                    <?php  } ?>                    <?php  if(intval($item['changeprice'])!=0) { ?>                    <tr>                        <td  style='border:none;text-align:right;'>卖家改价：</td>                        <td  style='border:none;text-align:right;;'><span style='<?php  if(0<$item['changeprice']) { ?>color:green<?php  } else { ?>color:red<?php  } ?>'><?php  if(0<$item['changeprice']) { ?>+<?php  } else { ?>-<?php  } ?>￥<?php  echo number_format(abs($item['changeprice']),2)?></span></td>                    </tr>                    <?php  } ?>                    <?php  if(intval($item['changedispatchprice'])!=0) { ?>                    <tr>                        <td  style='border:none;text-align:right;'>卖家改运费：</td>                        <td  style='border:none;text-align:right;;'><span style='<?php  if(0<$item['changedispatchprice']) { ?>color:green<?php  } else { ?>color:red<?php  } ?>'><?php  if(0<$item['changedispatchprice']) { ?>+<?php  } else { ?>-<?php  } ?>￥<?php  echo abs($item['changedispatchprice'])?></span></td>                    </tr>                    <?php  } ?>                    <tr>                        <td style='border:none;text-align:right;'>应收款：</td>                        <td  style=`'border:none;text-align:right;color:green;'>￥<?php  echo number_format($item['price'],2)?></td>                    </tr>                </table>    "            ><i class='fa fa-question-circle'></i></a>                <?php  if($item['dispatchprice']>0) { ?>                <br/>(含运费:￥<?php  echo number_format( $item['dispatchprice'],2)?>)                <?php  } ?>            </td>            <td rowspan="<?php  echo count($item['goods'])?>" style='text-align:center' >                <a class='op text-primary'  href="<?php  echo webUrl('order/detail', array('id' => $item['id']))?>" >查看详情</a>                <?php if(cv('order.op.refund')) { ?>                <?php  if(!empty($item['refundid'])) { ?>                <a class='op  text-primary'  href="<?php  echo webUrl('order/op/refund', array('id' => $item['id']))?>" >维权<?php  if($item['refundstate']>0) { ?>处理<?php  } else { ?>详情<?php  } ?></a>                <?php  } ?>                <?php  } ?>                <?php  if($item['addressid']!=0 && $item['statusvalue']>=2 && $item['sendtype']==0 && $item['city_express_state']==0) { ?>                <a class='op  text-primary'  data-toggle="ajaxModal" href="<?php  echo webUrl('util/express', array('id' => $item['id'],'express'=>$item['express'],'expresssn'=>$item['expresssn']))?>">物流信息</a>                <?php  } ?>                <?php  if($item['city_express_state']==1) { ?>                <a class='op  text-primary' href="javascript:tip.msgbox.err('同城配送暂不支持物流信息查询');">物流信息</a>                <?php  } ?>                <?php  if($item['invoicename'] && $item['status_id']>0 ) { ?>                <?php  $invoice_info = m('sale')->parseInvoiceInfo($item['invoicename']);?>                <?php  if($invoice_info['title'] && $invoice_info['entity'] === false) { ?>                <a class='<?php  if($item['invoice_img']) { ?>text-success<?php  } else { ?>text-danger<?php  } ?>' data-toggle="ajaxModal"                href="<?php  echo webUrl('order.op.upload_invoice',array('order_id'=>$item['id']));?>">                <?php  if($item['invoice_img']) { ?>查看发票<?php  } else { ?>上传发票<?php  } ?></a>                <?php  } ?>                <?php  } ?>            </td>            <td rowspan="<?php  echo count($item['goods'])?>" class='ops' style='line-height:20px;text-align:center' >                <span class='text-<?php  echo $item['statuscss'];?>'><?php  echo $item['status'];?></span><br />                <?php  if($item['merchid'] == 0) { ?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('order/ops', TEMPLATE_INCLUDEPATH)) : (include template('order/ops', TEMPLATE_INCLUDEPATH));?><?php  } ?>                <?php  if($status == 1) { ?>                    <a  class='btn btn-primary btn-xs' data-toggle='ajaxRemove' href="<?php  echo webUrl('order/list/send', array('id' => $item['id']))?>" data-confirm='确认要发货吗?'>确认发货</a>                <?php  } ?>            </td>            <?php  } ?>        </tr>        <?php  } } ?>        <?php  if(!empty($item['remark'])) { ?>        <tr ><td style='background:#fdeeee;color:red;'>买家备注: <?php  echo $item['remark'];?></td></tr>        <?php  } ?>        <?php  if((!empty($level)&&!empty($item['agentid'])) || (!empty($item['merchname']) && $item['merchid'] > 0)) { ?>        <tr style=";border-bottom:none;background:#f9f9f9;">            <td  colspan="4" style='text-align:left'>            <?php  if(!empty($item['merchname']) && $item['merchid'] > 0) { ?>            商户名称：<span class="text-info"><?php  echo $item['merchname'];?></span>            <?php  } ?>            <?php  if(!empty($agentid)) { ?>            <b>分销订单级别:</b> <?php  echo $item['level'];?>级 <b>分销佣金:</b> <?php  echo $item['commission'];?> 元            <?php  } ?>            </td>            <td colspan="4" style='text-align:right'>            <?php  if(empty($agentid)) { ?>            <?php  if($item['commission1']!=-1) { ?><b>1级佣金:</b> <?php  echo $item['commission1'];?> 元 <?php  } ?>            <?php  if($item['commission2']!=-1) { ?><b>2级佣金:</b> <?php  echo $item['commission2'];?> 元 <?php  } ?>            <?php  if($item['commission3']!=-1) { ?><b>3级佣金:</b> <?php  echo $item['commission3'];?> 元 <?php  } ?>            <?php  } ?>            <?php  if(!empty($item['agentid']) && !$is_merch[$item['id']]) { ?>            <?php if(cv('commission.apply.changecommission')) { ?>            <a class="text-primary" data-toggle="ajaxModal"  href="<?php  echo webUrl('commission/apply/changecommission', array('id' => $item['id']))?>">修改佣金</a>            <?php  } ?>            <?php  } ?>            </td>        </tr>        <?php  } ?>        <?php  } } ?>        <tfoot>        <tr>            <td colspan="8"  class="text-right">                <?php  echo $pager;?>            </td>        </tr>        </tfoot>    </table>    <?php  } else { ?>    <div class='panel panel-default'>        <div class='panel-body' style='text-align: center;padding:30px;'>            暂时没有任何订单!        </div>    </div>    <?php  } ?></div><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?><script>  function beachprint(){      var ids = [];      $("input[name='checkitem']").each(function () {          if ($(this).is(":checked")) {              ids.push( $(this).val());          }      });      if(ids == null || "" == ids){          alert("请选择要打印的数据");      }else{          var url = '<?php  echo webUrl("order/beachprint")?>';          window.location.href = url + "&ids="+ids;;      }  }</script>