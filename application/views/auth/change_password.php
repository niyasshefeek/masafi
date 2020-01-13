 <div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li><a href="<?php echo base_url('auth')?>">users</a></li>
                    <li><?php echo lang('change_password_heading');?></li>
				</ol>
			
			</div>
			<!-- END RIBBON -->

			<!-- #MAIN CONTENT -->
			 <div id="content">

			
                	<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
                    <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                           <h1 class="page-title txt-color-blueDark">
                                
                                <!-- PAGE HEADER -->
                                <i class="fa-fw fa fa-user"></i> 
                                  Users - <?php echo lang('change_password_heading');?>
                               
                            </h1>
                            <p><?php echo lang('create_user_subheading');?></p>
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-sortable" role="widget">
								
				
								<!-- widget div-->
								<div role="content">
				
									
				
									<!-- widget content -->
									<div class="widget-body no-padding">
										

										

										<?php echo form_open("auth/change_password");?>

											  <p>
													<?php echo lang('change_password_old_password_label', 'old_password');?> <br />
													<?php echo form_input($old_password);?>
											  </p>

											  <p>
													<label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
													<?php echo form_input($new_password);?>
											  </p>

											  <p>
													<?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
													<?php echo form_input($new_password_confirm);?>
											  </p>

											  <?php echo form_input($user_id);?>
											  <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

										<?php echo form_close();?>
										
										<div style="color:red;font-size:15px;"><?php echo $message;?></div>
											</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->

				
						</article>
                    </div>
               </section>
			</div>
            <!-- end row -->
			
			<!-- END #MAIN CONTENT -->

		</div>
