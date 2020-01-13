
<div id="main" role="main">

                <!-- RIBBON -->
                <div id="ribbon">
                    <!-- breadcrumb -->
                  <ol class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
                    <li><?php echo lang('index_heading');?></li>
                 
				</ol>
                
                </div>
				
				<div id="content">
				   <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                     
                            <div class="pull-left">
                                <h1><span class="semi-bold"><?php echo lang('index_heading');?> -- <?php echo lang('index_subheading');?></span></h1>
                                <?php echo $message;?>
                            </div>
                            <div class="pull-right">
                           							
                            <?php echo anchor('auth/create_user', lang('index_create_user_link'), array('class' => 'btn btn-success'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'),array('class' => 'btn btn-success'))?>
                            </div>
                        </div>
                       
                   
                    </div>
  
				<section id="widget-grid" class="">
					<div class="row">
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
							
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2><?php echo $title?></h2>
									
								</header>
								<div>
									<div class="jarviswidget-editbox">
									</div>
									<div class="widget-body no-padding">
				
										<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
                                            <tr>
                                                <th>Username</th>
                                              
                                                <th><?php echo lang('index_email_th');?></th>
                                                <th><?php echo lang('index_groups_th');?></th>
                                                <th><?php echo lang('index_status_th');?></th>
                                                <th><?php echo lang('index_action_th');?></th>
                                            </tr>
                                            <?php foreach ($users as $user):?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                                                  
                                                    <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                                                    <td>
                                                        <?php foreach ($user->groups as $group):?>
                                                            <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                                        <?php endforeach?>
                                                    </td>
                                                    <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                                                    <td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </table>

										
                                     
									</div>	
								</div>
							</div>
                       </article>
                      </div>
                    </section>
          	</div>
		</div>