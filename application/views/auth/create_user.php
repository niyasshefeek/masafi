 <div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li><a href="<?php echo base_url('auth')?>">Settings</a></li>
                    <li><?php echo lang('create_user_heading');?></li>
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
                                  Users - <?php echo lang('create_user_heading');?>
                               
                            </h1>
                            <p><?php echo lang('create_user_subheading');?></p>
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-sortable" role="widget">
								
				
								<!-- widget div-->
								<div role="content">
				
									
				
									<!-- widget content -->
									<div class="widget-body no-padding">

                                          
                                          
                                        
                                          
                                          <?php echo form_open("auth/create_user", array('class'=>'smart-form'));?>
                                          
											<fieldset>
												<div class="row">
                                                     <section class="col col-4">
                                                          <label class="label"><?php echo lang('create_user_fname_label', 'first_name');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($first_name);?>
                                                          </label>
                                                      </section>
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('create_user_lname_label', 'last_name');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($last_name);?>
                                                          </label>
                                                      </section>
                                                      
                                                      
                                                      <?php
                                                        if($identity_column!=='email') {
                                                            echo '<p>';
                                                            echo lang('create_user_identity_label', 'identity');
                                                            echo '<br />';
                                                            echo form_error('identity');
                                                            echo form_input($identity);
                                                            echo '</p>';
                                                        }
                                                        ?>
                                                  
                                                      
                                                      
                                                      
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('create_user_company_label', 'company');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($company);?>
                                                          </label>
                                                      </section>
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('create_user_email_label', 'email');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($email);?>
                                                          </label>
                                                      </section>
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('create_user_phone_label', 'phone');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($phone);?>
                                                          </label>
                                                      </section>
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('create_user_password_label', 'password');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($password);?>
                                                          </label>
                                                      </section>
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($password_confirm);?>
                                                          </label>
                                                      </section>
                                                  
                                          </div>
                                        </fieldset>
                                         <footer>
											 <?php echo form_submit('submit', lang('create_user_submit_btn'), array('class'=>'btn btn-primary"'));?>
												<button type="button" class="btn btn-default" onclick="window.history.back();">
													Back
												</button>
                                         <div id="infoMessage"><?php echo $message;?></div>
										 </footer> 
                                      
                                          
                                          <?php echo form_close();?>

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