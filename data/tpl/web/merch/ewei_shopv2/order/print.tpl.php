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

</style>

<div class="page-content">
    <div>
        <input type="button" onClick="doPrint()" style="float: right;background-color: #008CBA; "  value="打印" />
    </div>
    <div id="printArea">
        <div class="page-content">
            <div class="step-region" >
            <span class="text-warning font18" style="text-align: center;display: block">
                515联盟 &nbsp;<?php  echo $merch_user['merchname'];?> &nbsp;销售单
            </span>
            </div>
        </div>
        <div class="panel-body table-responsive">

            <table class="table">
                <tr class="trorder" style="background: #fff">
                    <td style="text-align: left" >订单编号：<?php  echo $item['ordersn'];?></td>
                    <td style="text-align: left;padding-left: 20px;padding-left: 20px" >付款方式：
                        <?php  if($item['paytype'] == 0) { ?>未支付<?php  } ?>
                        <?php  if($item['paytype'] == 1) { ?>余额支付<?php  } ?>
                        <?php  if($item['paytype'] == 11) { ?>后台付款<?php  } ?>
                        <?php  if($item['paytype'] == 21) { ?>微信支付<?php  } ?>
                        <?php  if($item['paytype'] == 22) { ?>支付宝支付<?php  } ?>
                        <?php  if($item['paytype'] == 23) { ?>银联支付<?php  } ?>
                        <?php  if($item['paytype'] == 3) { ?>货到付款<?php  } ?></td>
                </tr>
                <tr class="trorder" style="background: #fff">
                    <td style="text-align: left" colspan="2" >收货人：<?php  echo $user['address'];?>, <?php  echo $user['realname'];?>, <?php  echo $user['mobile'];?>, <?php  echo $user['shopname'];?></td>
                </tr>
                <tr class="trorder" style="background: #fff">
                    <td style="text-align: left" colspan="2">买家备注：<?php  echo $item['remark'];?></td>
                </tr>
            </table>

            <table class="table table-hover" id="merchGoodsTable"  border="1" cellspacing="0">
                <thead class="navbar-inner">
                <tr  class="trorder">
                    <th style="text-align: center;width: 5%">序号</th>
                    <th style="text-align: center;width: 10%">条码</th>
                    <th style="text-align: center;width: 20%"> 商品名称</th>
                    <th style="text-align: center;width: 10%">单价(元)</th>
                    <th style="text-align: center;width: 10%">数量</th>
                    <th style="text-align: center;width: 10%">原价</th>
                    <th style="text-align: center;width: 10%">实收金额</th>
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
                    <td style="text-align: center">

                    </td>
                    <td style="text-align: center"> <?php  if(!empty($goods['productsn'])) { ?><span><?php  echo $goods['productsn'];?></span> <?php  } else { ?>无<?php  } ?></td>
                    <td style="text-align: center">
                        <?php  echo $goods['title'];?>

                    </td>

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
                <tr class="trorder">
                    <td colspan="3" style="padding-left: 20px">
                        <p> <span class="price-inner">商品小计：</span><span style="font-weight: bold">￥<?php  echo $item['goodsprice'];?></span></p>
                    </td>
                    <td colspan="4" style="padding-left: 20px">
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
                </tr>
                <tr class="trorder">
                    <td colspan="3" style="padding-left: 20px">
                        <p><span class="price-inner">实付款：</span><span style="font-size: 14px;font-weight: bold;color: #e4393c">￥<?php  echo $item['price'];?></span></p>
                    </td>
                    <td colspan="4" style="padding-left: 20px">
                        <p><span class="price-inner">大写：</span><span style="font-size: 14px;font-weight: bold;color: #e4393c">￥<?php  echo $bigPrice;?></span></p>
                    </td>
                </tr>
            </table>
            <table class="table">
                <tr class="trorder" style="background: #fff">
                    <td style="text-align: left" >销售单位：<?php  echo $merch_user['merchname'];?></td>
                    <td style="text-align: left;padding-left: 20px" >联系地址：<?php  echo $merch_user['address'];?></td>
                </tr>
                <tr class="trorder" style="background: #fff">
                    <td style="text-align: left"  >联系人：<?php  echo $merch_user['realname'];?></td>
                    <td style="text-align: left;padding-left: 20px" >联系电话：<?php  echo $merch_user['mobile'];?></td>
                </tr>
            </table>
        </div>
</div>
<script language='javascript'>
    $(function () {
        var tb = document.getElementById('merchGoodsTable');    // table 的 id
        var rows = tb.rows;
        for(var i = 1; i<rows.length -2; i++ ){
            for(var j = 0; j<rows[i].cells.length; j++ ){    // 遍历该行的 td
                rows[i].cells[0].innerHTML = i;
            }
        }

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
    function doPrint(){
        var printwindow = window.open("", "newwin", "height=" + window.screen.height + ",width=" + window.screen.width + ",toolbar=no,scrollbars=auto,menubar=no");
        printwindow.document.body.innerHTML = document.getElementById('printArea').innerHTML;
        printwindow.window.print();    //Firefox
    }

</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
