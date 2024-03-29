<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="new-keyword">
	<ol class="breadcrumb we7-breadcrumb">
		<a href="<?php  echo url('user/display');?>"><i class="wi wi-back-circle"></i> </a>
		<li><a href="<?php  echo url('user/display');?>">用户管理</a></li>
		<li>添加用户</li>
	</ol>
	<form action="" class="we7-form" method="post" id="js-user-create" ng-controller="UserCreate" ng-cloak>
		
		<div class="form-group">
			<label for="" class="control-label col-sm-2">用户名</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="username" id="username" ng-style="{'width': '600px'}" class="form-control" ng-model="user.username" placeholder="" autocomplete="off">
				<div class="help-block">请输入用户名，用户名为 3 到 15 个字符组成，包括汉字，大小写字母（不区分大小写）</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">密码</label>
			<div class="form-controls col-sm-8">
				<input type="text" value="" class="hidden"/>
				<input type="text" name="password" id="password" ng-style="{'width': '600px'}" class="form-control" ng-model="user.password" placeholder="" autocomplete="off" ng-focus="changeType($event)">
				<div class="help-block">请填写密码，最小长度为 8 个字符，且包含数字，字符，特殊字符</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">确认密码</label>
			<div class="form-controls col-sm-8">
				<input type="text" name="repassword" id="repassword" ng-style="{'width': '600px'}" class="form-control" ng-model="user.repassword" placeholder="" autocomplete="off" ng-focus="changeType($event)">
				<div class="help-block">重复输入密码，确认正确输入</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">到期时间</label>
			<div class="form-controls col-sm-8" ng-init="endtype = 2">
				<div class="form-group">
					<input type="radio" id="endtype-2" ng-click="endtype = 2" ng-checked="endtype == 2">
					<label class="radio-inline" for="endtype-2">永久</label>
					<input type="radio" id="endtype-1" ng-click="endtype = 1" ng-checked="endtype == 1">
					<label class="radio-inline" for="endtype-1">设置期限</label>
					<div ng-if="endtype == 1" class="we7-margin-top">
						<?php  echo tpl_form_field_date('endtime');?>
					</div>
					<div class="help-block">用户的使用时间过期时，将无法使用系统功能。</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">所属用户组</label>
			<div class="form-controls col-sm-8">
				<select name="groupid" class="we7-select" id="groupid">
					<option value="0">请选择所属用户组</option>
					<option ng-repeat="group in groups" ng-value="group.id" ng-bind="group.name"></option>
				</select>
				<span class="help-block"> 分配用户所属用户组后，该用户会自动拥有此用户组内的模块操作权限</span>
				<span class="help-block"><strong class="text-danger">设置用户组后，系统会根据对应用户组的服务期限对用户的服务开始时间和结束时间进行初始化</strong></span>
			</div>
		</div>

		<div class="form-group account-package-extra" style="display:none;">
			<span class="control-label col-sm-2">应用权限：</span>
			<span class="js-extra-modules control-label col-sm-2" ></span>
		</div>

		<div class="form-group account-package-extra" style="display:none;">
			<span class="control-label col-sm-2">模板权限：</span>
			<span class="js-extra-templates"></span>
		</div>

		<div class="form-group">
			<label for="" class="control-label col-sm-2">其他权限</label>
			<td class="form-controls col-sm-8">
				<span class="btn btn-primary" data-toggle="modal" data-target="#jurisdiction-add">添加权限</span>
			</td>
		</div>

		
			<?php  if(permission_check_account_user('see_user_create_own_vice_founder')) { ?>
			<div class="form-group">
				<label for="" class="control-label col-sm-2">所属副创始人</label>
				<div class="form-controls col-sm-8">
					<input type="text" name="vice_founder_name" id="vice_founder" ng-style="{'width': '200px'}" class="form-control" ng-model="user.vice_founder_name" placeholder="" autocomplete="off">
					<div class="help-block">请输入副创始人姓名</div>
				</div>
			</div>
			<?php  } ?>
		
		<div class="form-group">
			<label for="" class="control-label col-sm-2">备注</label>
			<div class="form-controls col-sm-8">
				<textarea name="remark" rows="6" class="form-control" ng-style="{'width': '600px'}" ng-bind="user.remark" placeholder="方便注明此用户的身份"></textarea>
			</div>
		</div>
		<input type="submit" name="submit" id="" value="提交" class="btn btn-primary" ng-click="checkSubmit($event)" ng-style="{'padding': '6px 50px'}"/>
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		<input type="hidden" name="do" value="<?php  echo $_GPC['do'];?>" />

		<!-- 添加应用模态框 -->
		<div class="modal" id="jurisdiction-add">
			<div class="modal-dialog we7-modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<ul role="tablist" class="nav nav-pills">
							<li class="active"><a class="we7-padding-horizontal" data-toggle="tab" role="tab" aria-controls="content-modules" href="#content-modules">模块</a></li>
							<li><a class="we7-padding-horizontal" data-toggle="tab" role="tab" aria-controls="content-templates" href="#content-templates">模板</a></li>
						</ul>
					</div>
					<div class="modal-body">
						<div class="tab-content">
							<div id="content-modules" class="tab-pane active" role="tabpanel">
								<table class="table we7-table table-hover vertical-middle">
									<col width="280px">
									<col width="220px">
									<col />
									<tr>
										<th>模块名称</th>
										<th>模块标识</th>
										<th></th>
									</tr>
									<?php  if(is_array($modules)) { foreach($modules as $module) { ?>
									<tr>
										<td><?php  echo $module['title'];?><?php  if($module['issystem']) { ?><span class="label label-success">系统模块</span><?php  } ?></td>
										<td><?php  echo $module['name'];?></td>
										<td><a class="btn btn-default js-btn-select <?php  if(is_array($extend['modules']) && in_array($module['name'], $extend['modules'])) { ?>btn-primary<?php  } ?>" data-title="<?php  echo $module['title'];?>" data-name="<?php  echo $module['name'];?>" onclick="$(this).toggleClass('btn-primary')">选取</a></td>
									</tr>
									<?php  } } ?>
								</table>
							</div>
							<div id="content-templates" class="tab-pane" role="tabpanel">
								<table class="table we7-table table-hover vertical-middle">
									<col width="280px">
									<col width="220px">
									<col />
									<tr>
										<th>模板名称</th>
										<th>模板标识</th>
										<th></th>
									</tr>
									<?php  if(is_array($templates)) { foreach($templates as $temp) { ?>
									<tr>
										<td><?php  echo $temp['title'];?></td>
										<td><?php  echo $temp['name'];?></td>
										<td><a class="btn btn-default js-btn-select <?php  if(is_array($extend['templates']) && in_array($temp['id'], $extend['templates'])) { ?>btn-primary<?php  } ?>" data-title="<?php  echo $temp['title'];?>" data-name="<?php  echo $temp['id'];?>" onclick="$(this).toggleClass('btn-primary')">选取</a></td>
									</tr>
									<?php  } } ?>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" ng-click="addPermission()">确定</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>


<script type="text/javascript">
	angular.module('userManageApp').value('config', {
		groups: <?php echo !empty($groups) ? json_encode($groups) : 'null'?>,
	});
	angular.bootstrap($('#js-user-create'), ['userManageApp']);

    $(function () {
        $('#js-user-create').submit(function(){
            var flag = true;
            var regNumber = /\d+/; //验证0-9的任意数字最少出现1次。
            var regString = /[a-zA-Z]+/; //验证大小写26个字母任意字母最少出现1次。
            var password = $("#password").val();
            if (!regNumber.test(password) || !regString.test(password)) {
                alert('密码强度不符合规则，且包含数字，字符，特殊字符!');
                return false;
            }

        });

    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

