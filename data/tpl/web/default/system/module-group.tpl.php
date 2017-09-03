<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if($do == 'display') { ?>
<div class="we7-page-title">
	应用权限套餐
</div>

<ul class="we7-page-tab">
	<li class="active"><a href="<?php  echo url('system/module-group/display') ?>">应用权限套餐列表  </a></li>
</ul>
<div class="js-system-module_group" ng-controller="moduleGroupCtrl" ng-cloak>
	<div class="combo-list">
		<div class="we7-page-search clearfix">
			<?php  if($_W['role'] == 'founder') { ?>
			<div class="pull-right">
				<a href="<?php  echo url('system/module-group/post')?>" class="btn btn-primary">+添加应用权限套餐</a>
			</div>
			<?php  } ?>
			<form action="" method="get" class="we7-form row">
				<div class="form-group we7-padding-none col-sm-4">
					<input type="hidden" name="c" value="system">
					<input type="hidden" name="a" value="module-group">
					<input type="hidden" name="do" value="display">
					<div class="input-group">
						<input class="form-control" name="name" value="<?php  echo $_GPC['name'];?>" type="text" placeholder="名称" >
						<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
					</div>
				</div>
			</form>
		</div>
		<table class="table we7-table table-hover vertical-middle">

			<col width="180px" />
			<col width="140px"/>
			<col width="140px" />
			<col width="140px" />
			<col width="180px" />
			<tr>
				<th class="text-left">套餐名称</th>
				<th>公众号应用个数</th>
				<th>小程序应用个数</th>
				<th>模板个数</th>
				<th class="text-right">操作</th>
			</tr>
			<?php  if(is_array($modules_group_list)) { foreach($modules_group_list as $module_group) { ?>
			<tr >
				<td class="text-left"><?php  echo $module_group['name'];?></td>
				<td><?php  echo count($module_group['modules'])?></td>
				<td><?php  echo count($module_group['wxapp'])?></td>
				<td><?php  echo count($module_group['templates'])?></td>
				<td>
					<div class="link-group">
						<a href="javascript:;" class="color-default js-unfold" data-toggle="table-collapse" data-target="toggle-<?php  echo $module_group['id'];?>" ng-click="changeText($event)">展开</a>
						<?php  if($_W['role'] == 'founder') { ?>
						<a href="<?php  echo url('system/module-group/post', array('id' => $module_group['id']))?>">编辑套餐</a>
						<a href="<?php  echo url('system/module-group/delete', array('id' => $module_group['id']))?>" class="del" onclick="return confirm('确定要删除套餐吗？')">删除</a>
						<?php  } ?>
					</div>
				</td>
			</tr>
			<tr class="collapse bg-light-gray" aria-expanded="true" data-id="toggle-<?php  echo $module_group['id'];?>">
				<td colspan="5">
					<div class="col-sm-1 color-gray text-left we7-padding-none">公众号应用</div>
					<div class="col-sm-11">
						<?php  if(is_array($module_group['modules'])) { foreach($module_group['modules'] as $module) { ?>
						<div class="col-sm-3 text-left text-over">
							<!--<img src="<?php  echo $module['logo'];?>" style="width:50px;height:50px;">-->
							<!--<a href=""><?php  echo $module['title'];?></a>-->
							<?php  if(empty($module['main_module'])) { ?>
							<img src="<?php  echo $module['logo'];?>" alt="" style="width:50px;height:50px;">
							<?php  } else { ?>
							<span class="img">
								<img src="<?php  echo $module['logo'];?>" alt="子应用icon" class="plugin-img"/>
								<img src="<?php  echo $modules[$module['main_module']]['logo'];?>" alt="主应用icon" class="module-img"/>
							</span>
							<?php  } ?>
						</div>
						<?php  } } ?>
					</div>
				</td>
			</tr>
			<tr class="collapse bg-light-gray" aria-expanded="true" data-id="toggle-<?php  echo $module_group['id'];?>">
				<td colspan="5">
					<div class="col-sm-1 color-gray text-left we7-padding-none">小程序应用</div>
					<div class="col-sm-11">
						<?php  if(is_array($module_group['wxapp'])) { foreach($module_group['wxapp'] as $wxapp) { ?>
						<div class="col-sm-3 text-left text-over">
							<img src="<?php  echo $wxapp['logo'];?>" style="width:50px;height:50px;">
							<a href=""><?php  echo $wxapp['title'];?></a>
						</div>
						<?php  } } ?>
					</div>
				</td>
			</tr>
			<tr class="collapse bg-light-gray" aria-expanded="true" data-id="toggle-<?php  echo $module_group['id'];?>">
				<td colspan="5">
					<div class="col-sm-1 color-gray text-left we7-padding-none">模板</div>
					<div class="col-sm-11">
						<?php  if(is_array($module_group['templates'])) { foreach($module_group['templates'] as $template) { ?>
						<div class="col-sm-3 text-left  text-over">
							<i class="glyphicon glyphicon-th-large"></i>
							<a href=""><?php  echo $template['title'];?></a>
						</div>
						<?php  } } ?>
					</div>
				</td>
			</tr>
			<?php  } } ?>
		</table>
	</div>
</div>
<script>
	angular.bootstrap($('.js-system-module_group'), ['moduleApp']);
	$('[data-toggle="table-collapse"]').on('click',function(){
		var id = '[data-id="'+$(this).data('target')+'"]';
		$(id).collapse('toggle');
	});
</script>
<?php  } else if($do == 'post') { ?>
<div class="js-modulegroup-post" ng-controller="moduleGroupPostCtrl" ng-cloak>
	<div class="combo-list-add">
		<ol class="breadcrumb we7-breadcrumb">
			<a href="<?php  echo url('system/module-group/')?>"><i class="wi wi-back-circle"></i> </a>
			<li>
				<a href="<?php  echo url('system/module-group/display') ?>">套餐应用列表</a>
			</li>
			<li>
				添加套餐应用列表
			</li>
		</ol>
		<div class="we7-form">
			<div class="form-group">
				<label for="" class="control-label col-sm-3">应用套餐名称</label>
				<div class="form-controls col-sm-8">
					<input type="text" ng-model="moduleGroup.name" class="form-control"/>
				</div>
			</div>
		</div>
		<div class="panel we7-panel">
			<div class="panel-heading">
				选择公众号应用
			</div>
			<div class="panel-body we7-padding">
				<div class="row">
					<div class="col-sm-2 text-left" ng-repeat="module in groupHaveModuleApp" style="overflow: hidden">
						<img ng-src="{{ module.logo }}" alt="" style="width:50px;height:50px;" ng-if="module.main_module == ''">
						<span class="img" ng-if="module.main_module != ''">
							<img ng-src="{{ module.logo }}" alt="子应用icon" class="plugin-img"/>
							<img ng-src="{{ groupHaveModuleApp[module.main_module].logo || groupNotHaveModuleApp[module.main_module].logo }}" alt="主应用icon" class="module-img"/>
						</span>
						<span class="name">{{ module.title }}</span>
						<span class="del bg-default" ng-click="delHaveModule(module)">删除</span>
					</div>
					<div class="col-sm-2 add-more">
						<div class="we7-input-img input-more input-img">
							<a href="" class="input-addon" ng-click="addModule()">
								<span class="color-gray"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel we7-panel">
			<div class="panel-heading">
				选择小程序应用
			</div>
			<div class="panel-body we7-padding">
				<div class="row">
					<div class="col-sm-2 text-left" ng-repeat="module in groupHaveModuleWxapp" style="overflow: hidden">
						<img src="{{ module.logo }}" alt="" style="width:50px;height:50px;">{{ module.title }}
						<span class="del bg-default" ng-click="delHaveModuleWxapp(module)">删除</span>
					</div>
					<div class="col-sm-2 add-more">
						<div class="we7-input-img input-more input-img">
							<a href="" class="input-addon" ng-click="addModuleWxapp()">
								<span class="color-gray"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel we7-panel">
			<div class="panel-heading">
				选择模板
			</div>
			<div class="panel-body we7-padding">
				<div class="row">
					<div class="col-sm-2 text-left text-over" ng-repeat="template in groupHaveTemplate">
						<i class="wi wi-home"></i>
						<a href="">{{ template.title }}</a>
						<span class="del bg-default" ng-click="delHaveTemplate(template)">删除</span>
					</div>
					<div class="col-sm-2 add-more">
						<div class="we7-input-img input-more input-img">
							<a href="" class="input-addon" ng-click="adTemplate()">
								<span class="color-gray"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="add_template"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog we7-modal-dialog" style="width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">添加模板(点击添加)</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body we7-padding">
						<div class="row">
							<div class="col-sm-2 text-center we7-margin-bottom" ng-repeat="template in groupNotHaveTemplate" style="overflow: hidden; padding: 0;">
								<a href="javascript:;" ng-click="selectModule(template, 'template')">
									<i class="glyphicon glyphicon-th-large"></i>
									<p class="text-over">{{ template.title }}</p>
								</a>
								<span id="template-{{template.id}}" class="selected hidden" ng-click="cancleModule(template, 'template')" style="position:absolute;width:82%;height:100%;left:10px;top:0;opacity:0.8;cursor:pointer;background:#e7e8eb; vertical-align:middle;font-size:30px"><i class="wi wi-right-sign color-green"></i></span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="addHaveTemplate()">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="add_module"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog we7-modal-dialog" style="width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">添加模块(点击添加)</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body we7-padding">
						<div class="row">
							<div class="col-sm-2 text-center we7-margin-bottom select-module" ng-repeat="module in groupNotHaveModuleApp" style="overflow: hidden">
								<a href="javascript:;" ng-click="selectModule(module, 'module')">
									<img ng-src="{{ module.logo }}" alt="" style="width:50px;height:50px;" ng-if="module.main_module == ''">
									<div class="img"  ng-if="module.main_module != ''">
										<img ng-src="{{ module.logo }}" alt="子应用icon" class="plugin-img"/>
										<img ng-src="{{ groupNotHaveModuleApp[module.main_module].logo || groupHaveModuleApp[module.main_module].logo }}" alt="主应用icon" class="module-img"/>
									</div>
									<p class="text-over">{{ module.title }}</p>
								</a>
								<span id="module-{{module.mid}}" class="selected hidden" ng-click="cancleModule(module, 'module')" style="position:absolute;width:82%;height:100%;left:10px;top:0;opacity:0.8;cursor:pointer;background:#e7e8eb; vertical-align:middle;font-size:45px;border-radius:5px;z-index:2;"><i class="wi wi-right-sign color-green"></i></span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="addHaveModule()">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="add_module_wxapp"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog we7-modal-dialog" style="width:800px">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">添加小程序(点击添加)</h4>
				</div>
				<div class="modal-body">
					<div class="panel-body we7-padding">
						<div class="row">
							<div class="col-sm-2 text-center we7-margin-bottom select-module-wxapp" ng-repeat="module in groupNotHaveModuleWxapp" style="overflow: hidden">
								<a href="javascript:;" ng-click="selectModule(module, 'module_wxapp')">
									<img ng-src="{{ module.logo }}" alt="" style="width:50px;height:50px;">
									<p class="text-over">{{ module.title }}</p>
								</a>
								<span id="module_wxapp-{{module.mid}}" class="selected hidden" ng-click="cancleModule(module, 'module_wxapp')" style="position:absolute;width:82%;height:100%;left:10px;top:0;opacity:0.8;cursor:pointer;background:#e7e8eb; vertical-align:middle;font-size:30px"><i class="wi wi-right-sign color-green"></i></span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="addHaveModuleWxapp()">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<span class="btn btn-primary we7-padding-horizontal" ng-click="saveGroup()">提交</span>
</div>
<script>
require(['underscore'], function() {
	angular.module('moduleApp').value('config', {
		'moduleGroup' : <?php  echo json_encode($module_group)?>,
		'groupHaveModuleApp' : <?php  echo json_encode($group_have_module_app)?>,
		'groupHaveModuleWxapp' : <?php  echo json_encode($group_have_module_wxapp)?>,
		'groupNotHaveModuleApp' : <?php  echo json_encode($group_not_have_module_app)?>,
		'groupNotHaveModuleWxapp' : <?php  echo json_encode($group_not_have_module_wxapp)?>,
		'groupHaveTemplate' : <?php  echo json_encode($group_have_template)?>,
		'groupNotHaveTemplate' : <?php  echo json_encode($group_not_have_template)?>,
		'url' : "<?php  echo url('system/module-group/save')?>"
	});

	angular.bootstrap($('.js-modulegroup-post'), ['moduleApp']);
	$('[data-toggle="table-collapse"]').on('click',function(){
		var id = '[data-id="'+$(this).data('target')+'"]';
		$(id).collapse('toggle');
	});
});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>