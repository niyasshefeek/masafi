
 <div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li><a href="<?php echo base_url('auth')?>">Settings</a></li>
                    <li><?php echo lang('edit_user_heading');?></li>
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
                                  Users - <?php echo lang('edit_user_heading');?>
                               
                            </h1>
                             <p><?php echo lang('edit_user_subheading');?></p>
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-sortable" role="widget">
								
				
								<!-- widget div-->
								<div role="content">
				
									
				
									<!-- widget content -->
									<div class="widget-body no-padding">
										  
                                         
                                          
                                         
                                          
                                          <?php echo form_open(uri_string(), array('class'=>'smart-form'));?>
                                          
											<fieldset>
												<div class="row">
                                                     <section class="col col-4">
                                                          <label class="label"><?php echo lang('edit_user_fname_label', 'first_name');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($first_name);?>
                                                          </label>
                                                      </section>
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($last_name);?>
                                                          </label>
                                                      </section>
                                                    
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('edit_user_company_label', 'company');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($company);?>
                                                          </label>
                                                      </section>
                                                     
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('edit_user_phone_label', 'phone');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($phone);?>
                                                          </label>
                                                      </section>
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('edit_user_password_label', 'password');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($password);?>
                                                          </label>
                                                      </section>
                                                      <section class="col col-4">
                                                          <label class="label"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>
                                                          <label class="input">
                                                             <?php echo form_input($password_confirm);?>
                                                          </label>
                                                      </section>
                                                     <?php // <section class="col col-4">
                                                          
                                                         // <label class="checkbox">
                                                         //     <h3> User from Sales  check '<b style="color:green">✓</b>' mark.</h3> 
                                                         //     <input type="checkbox" id="associates" name="associates" value="1" <?php echo ($associates==1)?'checked':''><i></i> 
                                                         //  </label>
                                                        //  <br>
                                                      //</section>
													   ?>
                                                  </div>
                                                </fieldset>  
                                                <fieldset>
                                                	<?php if ($this->ion_auth->is_admin()): ?>
                                                    <section>
                                                        <label class="label">User Groups</label>
                                                        <div class="inline-group">
                                                        <?php foreach ($groups as $group):?>
                                                            <label class="radio">
                                                               <?php
                                                          $gID=$group['id'];
                                                          $checked = null;
                                                          $item = null;
                                                          foreach($currentGroups as $grp) {
                                                              if ($gID == $grp->id) {
                                                                  $checked= ' checked="checked"';
                                                              break;
                                                              }
                                                          }
                                                      ?>
                                                      <input type="radio" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>> <i></i>
                                                      <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                                      </label>
                                                  <?php endforeach?>
                                                          
                                                          
                                                        </div>
                                                    </section>
											
                                              <?php endif ?>
                                        
                                              <?php echo form_hidden('id', $user->id);?>
                                              <?php echo form_hidden($csrf); ?>

                                        </fieldset>
                                         <footer>
											 <?php echo form_submit('submit', lang('edit_user_submit_btn'), array('class'=>'btn btn-primary"'));?>
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
						
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="jarviswidget jarviswidget-color-blueDark" id="wdid-id-1" data-widget-editbutton="false">
							
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Privilleges</h2>
									
								</header>
								<div>
								<div class="jarviswidget-editbox">
									</div>
									
									<div class="widget-body no-padding">
										
										<table id="datatable_fixed_columnd" class="table table-striped table-bordered" width="100%">
                                            <thead>
											<tr>
                                                <th>Modules</th>
												<th>Edit</th>
												<th>Add</th>
												<th>Upload</th>
												<th>Print</th>
												<th>Delete</th>
												
                                              
                                            </tr>
											  </thead>
											  <tbody>
											  <pre>
                                            <?php 
											
											
											
											
											
											// print_r($privilleges);
											  
											foreach ($privilleges as $key=> $priv):?>
                                                <tr>
                                                    <td>
													<input type="checkbox" onchange="toggle_this('<?php echo $key?>')" name="module_name" <?php echo ($priv->id_mod_checked==1 ? 'checked' : ''); ?>  value="<?php echo $priv->id_mod; ?>">
													<?php echo htmlspecialchars($priv->name_mod,ENT_QUOTES,'UTF-8');?>
													</td>
													<td><input type="checkbox" name="can_edit" <?php echo ($priv->can_edit==1 ? 'checked' : ''); ?>  value="1"></td>
													<td><input type="checkbox" name="can_save" <?php echo ($priv->can_save==1 ? 'checked' : ''); ?>  value="1"></td>
													<td><input type="checkbox" name="can_upload" <?php echo ($priv->can_upload==1 ? 'checked' : ''); ?>  value="1"></td>
													<td><input type="checkbox" name="can_print" <?php echo ($priv->can_print==1 ? 'checked' : ''); ?>  value="1"></td>
													<td><input type="checkbox" name="can_delete" <?php echo ($priv->can_delete==1 ? 'checked' : ''); ?>  value="1"></td>
											
                                                
                                                </tr>
                                            <?php endforeach;?>
											</tbody>
                                        </table>
											<br>
										  <div class="pull-right">
											 <?php echo form_submit('submit', 'Save', array('id'=>'privillege_button','class'=>'btn btn-primary"'));?>
												<button type="button" class="btn btn-default" onclick="window.history.back();">
													Back
												</button>
                                            </div> 
											 <div style="text-align:center" id="infoMessage_p"></div>      
										
                                      <br>
                                     
									</div>	
							</div>
							</div>
                       </article>
						
                    </div>
               </section>
			</div>
            <!-- end row -->
			
			<!-- END #MAIN CONTENT -->
			<script>
				function toggle_this(inx) {
					var test = $($('#datatable_fixed_columnd').find('tbody tr')[inx]).find('td input');
					var data = [];
					var checkedmain = $(test[0]).prop('checked');
					for(var i=1;i<=5;i++){
						$(test[i]).prop('checked',checkedmain);
					}
					// console.log(test);
					// $.each(test,function(inx,dt){ 
						// if(module_name.prop('checked')){
							
						// }
						
					// });
				}
				
				
				
				
			
				
				var test123 = function(){
					var test = $('#datatable_fixed_columnd').find('tbody tr');
					var data = [];
					$.each(test,function(inx,dt){ 
						var rec = $($($(dt)[0])[0]);
						// $.each($(dt).children('td'),function(inx1,dt1){
							// console.log($(dt));
							// $($(temp1[0]).find('td input[name=can_save]')[0]).val()
							// console.log($($($(dt)[0])[0]).find('td input[name=can_save]'));
							
							var module_name = rec.find('td input[name=module_name]');
							console.log(module_name);
							var can_edit = rec.find('td input[name=can_edit]');
							var can_save = rec.find('td input[name=can_save]');
							var can_upload = rec.find('td input[name=can_upload]');
							var can_print = rec.find('td input[name=can_print]');
							var can_delete = rec.find('td input[name=can_delete]');
							
							if(module_name.prop('checked')){
								
								data.push({
									id_module : module_name.val()
									,can_edit : can_edit.prop('checked') ? 1 : 0
									,can_save : can_save.prop('checked') ? 1 : 0
									,can_upload : can_upload.prop('checked') ? 1 : 0
									,can_print : can_print.prop('checked') ? 1 : 0
									,can_delete : can_delete.prop('checked') ? 1 : 0
									,user_id : <?php echo $this->uri->segment(3)?$this->uri->segment(3):'0' ?>
								});
							}
						});
					// });
					return data;
					//console.log(data);
				};
				
				$('#privillege_button').click(function(event) {   
				//console.log(JSON.stringify(test123()));
					$.ajax({
					url : '<?php echo base_url(); ?>auth/save_privilleges'
					,data : {
						post : JSON.stringify(test123())
						,cur_id : <?php echo $this->uri->segment(3)?$this->uri->segment(3):'0' ?>
					}
					,method : 'post'
					,success : function(res){
						
						$('#infoMessage_p').html('<h3 style="color:green">Updated Privilleges</h3>');
							
					}
					,error: function(){
							alert('Something wrong please contact your administrator.');
						}
				});
				});
				
			</script>
		</div>