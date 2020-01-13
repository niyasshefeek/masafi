<style>
 .ui-datepicker-calendar {
    display: none;
    }
 </style>
 <div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="<?php base_url()?>">Home</a></li>
					
                    <li>Business Enquiry</li>
				</ol>
			
			</div>
			<!-- END RIBBON -->

			<!-- #MAIN CONTENT -->
			 <div id="content">

			
                	<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
                    <article class="col-sm-12  sortable-grid ui-sortable">
                           <h1 class="page-title txt-color-blueDark">
                                
                                <!-- PAGE HEADER -->
                                <i class="fa-fw fa fa-edit"></i> 
                                   Business Enquiry <?php echo $message?>
                               
                            </h1>
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-sortable" role="widget">
								
				
								<!-- widget div-->
								<div role="content">
				
									
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				
										<form class="smart-form" action="<?php echo $action?>" method="post" enctype="multipart/form-data">
											<header>
												 Business Enquiry Creation Form - <code><?php echo $this->form_data->cust_date;  ?></code>
											</header>
				
											<fieldset>
												<div class="row">
                                                        
                                                       <?php echo validation_errors(); ?>
                                                        <section class="col col-8">
                                                            <label>Name <?php echo form_error('cust_name'); ?></label>
                                                            <label class="input">
                                                                <input type="text" name="cust_name" value="<?php echo set_value('cust_name',$this->form_data->cust_name); ?>" placeholder="Name" required>
                                                            </label>
                                                           
                                                        </section>
														<section class="col col-4">
                                                            <label>Customer Type <?php echo form_error('cust_type'); ?></label>
														  <label class="select">
                                                            
                                                        	<?php 
															
																$cust_type = array('cmp'=>'Company', 'age'=>'Agency', 'ind'=>'Individual', 'oth'=>'Other');
																$select =set_value('cust_type',strtolower($this->form_data->cust_type));
																echo form_dropdown('cust_type', $cust_type, $select);
															
          													?>               
                                                           <i></i>
                                                           </label>
                                                        </section>
														
                                                         <section id="error-mob" class="col col-12" style="width: 100% !important;">
                                                         
                                                         </section>
                                                        <section class="col col-6">
                                                            <label>Mobile</label><span id="tester1" style="cursor:pointer; color:green" class="pull-right glyphicon glyphicon-plus">Add </span>
                                                            <label class="input">
                                                            	<?php 
																	$mb_str = $this->form_data->cust_mobile;
																	$mb_empty = '["99999"]';
																	$mobile = $mb_str?$mb_str:$mb_empty; ?>
                                                                    <input type="text" value="<?php echo set_value('cust_mobile',$mobile); ?>" class="form-control phones" name="cust_mobile" placeholder="+XXX XXXXXXXXX"/>
                                                             
                                                            </label>
                                                           
                                                        </section>
                                                        <section class="col col-6">
                                                            <label>Phone</label><span id="tester1" style="cursor:pointer; color:green" class="pull-right glyphicon glyphicon-plus">Add </span>
                                                            <label class="input">
                                                            
                                                            		<?php 
																	$ph_str = $this->form_data->cust_tel;
																	$ph_empty = '["99999"]';
																	$phone = $ph_str?$ph_str:$ph_empty; ?>
                                                                    <input type="text" value="<?php echo set_value('cust_tel',$phone); ?>" class="form-control phones" name="cust_tel" placeholder="+XXX XXXXXXXXX"/>
                                                              
                                                            </label>
                                                           
                                                        </section>
                                                         <section id="error-email" class="col col-12" style="width: 100% !important;">
                                                         
                                                         </section>
                                                        <section class="col col-6">
                                                            <label>Email</label><span id="tester1" style="cursor:pointer; color:green" class="pull-right glyphicon glyphicon-plus">Add </span>
                                                            <label class="input">
                                                            
                                                             		<?php 
																	$en_str = $this->form_data->cust_email;
																	$en_empty = '["example@shuraa.com"]';
																	$email = $en_str?$en_str:$en_empty; ?>
                                                                    <input type="text" value="<?php echo set_value('cust_email',$email); ?>" class="emails" name="cust_email" placeholder="xxxx@example.com"/>
                                                            
                                                            
                                                             
                                                            </label>
                                                           
                                                        </section>
                                                        <section class="col col-6">
                                                            <label>Fax</label><span id="tester1" style="cursor:pointer; color:green" class="pull-right glyphicon glyphicon-plus">Add </span>
                                                            <label class="input">
                                                            
                                                            <?php 
																	$fx_str = $this->form_data->cust_fax;
																	$fx_empty = '["99999"]';
																	$fax = $fx_str?$fx_str:$fx_empty; ?>
                                                                    <input type="text" value="<?php echo set_value('cust_fax',$fax); ?>" class="form-control phones" name="cust_fax" placeholder="Fax"/>
                                                             
                                                            </label>
                                                           
                                                        </section>
                                                       
														<section class="col col-12">
                                                          <label class="label">Enquiry Channel</label>
															
                                                            <div class="inline-group">
															<?php 
															 foreach(channel_array() as $key=>$chnl){
																 
																 echo '
																 
																 <label class="radio">
                                                                    <input type="radio" value="'.$key.'" name="cust_channel"'.(set_value('cust_channel', $this->form_data->cust_channel) == $key ? "checked" : "").'>
                                                                    <i></i>'.$chnl.'</label>
																 ';
																 
															 }
															
															?>
															
                                                               
                                                            </div>

                                                          
                                                  
                                                      </section>
                                                       <section class="col col-6">
                                                            <label>Enquiry Source</label>
                                                            <label class="input">
                                                                <input type="text" name="cust_source" value="<?php echo set_value('cust_source',$this->form_data->cust_source); ?>" placeholder="Enquiry Source">
                                                            </label>
                                                           
                                                       </section>
                                                      <section class="col col-6">
                                                      <label>Assign To Sales Consultant</label>
                                                       <label class="select">
                                                            
                                                        	<?php 
															$options = array();
															$options['SelfAssigned'] = "Self Assigned";
															if(!empty($users)){
																foreach($users as $ass)	{
																	$options[$ass->first_name] = $ass->first_name;
																}
															}
															$select =set_value('cust_assgn_person',strtolower($this->form_data->cust_assgn_person));
																echo form_dropdown('cust_assgn_person', $options, $select);
          													?>               
                                                           <i></i>
                                                           </label>
                                                      </section>
                                                      <section class="col col-12">
                                                          <label class="label">Enquiry Type</label>

                                                            <div class="inline-group">

                                                               <?php
																	
																	$ActSelect = $this->form_data->cust_enqtype;
																	$selected_Arr = $ActSelect?json_decode($ActSelect):array();
																	// echo '<pre>';
																	// print_r($selected_Arr);
																	$array_1 = array();
										
																	foreach($this->cust_enqtype as $value){
																		$array_1[$value->enq_header][$value->enq_id]=$value->enq_name;
																	}
																	
																	foreach($array_1 as $key=>$value1){
																		echo '<div class="col col-12"><h4>'.$key.'</h4>';
																		foreach($value1 as $key2=>$val2){
																			echo '
																			
																			 <label class="checkbox">
																				<input type="checkbox" value="'.$key2.'" name="cust_enqtype[]"'.( (in_array($key2,$selected_Arr)) ? "checked" : '' ).'>
																				<i></i>'.$val2.'
																			 </label>
																			
																			';
																		}
																		echo "</div>";
																	}

															?>
                                                                
                                                            </div>
                                         
                                                      </section>
                                                       <section class="col col-6">
                                                            <label>Handling Brands</label>
                                                            <label class="input">
                                                                <input type="text" name="hand_brands" value="<?php echo set_value('hand_brands',$this->form_data->hand_brands); ?>" placeholder="Handling Brands">
                                                            </label>
                                                           
                                                       </section>
													   <section class="col col-6">
                                                            <label>Work Delivery</label>
                                                            <label class="input">
                                                                <input type="text" name="work_del" value="<?php echo set_value('work_del',$this->form_data->work_del); ?>" placeholder="leave empty if direct source">
                                                            </label>
                                                           
                                                       </section>
                                                      
                                                     <section class="col col-11"  style="width:100%" >
                                                      <label>Source of Enquiry Copy - Paste / Attachement (Maximum file size 10MB filetype: PDF,DOC,IMAGE,EXCEL )<?php echo form_error('cust_source_paste'); ?></label>
                                                        <label class="textarea" > 										
                                                         <?php //$data = array('name'=>'cust_source_paste','class'=>'page_content','rows'=>5,'cols'=>'40',
																		//	'value' => set_value('cust_source_paste',$this->form_data->cust_source_paste));
															  //echo form_textarea($data);?>
														<?php //echo form_error('cust_source_paste'); ?>
                                                       
                                                       <textarea name="cust_source_paste" class="cust_source_paste"><?php echo $this->form_data->cust_source_paste; ?></textarea>
                                                       
                                                        </label>
                                                    </section>
													<section class="col col-11"  style="width:100%" >
                                                      <label>Additional Notes <?php echo form_error('cust_note'); ?></label>
                                                        <label class="textarea" > 										
                                                            <textarea rows="2" name="cust_note" placeholder="Additional Notes" required><?php echo set_value('cust_note',$this->form_data->cust_note); ?></textarea> 
                                                        </label>
                                                    </section>
                                                      
												</div>
												
											</fieldset>
				
											
				
											<footer>
												<button type="submit" class="btn btn-primary">
													Submit
												</button>
												<button type="button" class="btn btn-default" onclick="window.history.back();">
													Back
												</button>
											</footer>
										</form>
				
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

<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'M-yy',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
});
</script>
<script language="javascript" type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: ".cust_source_paste",
    theme: "modern",
	height:200,
    plugins: [
         "code advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager "
   ],
    extended_valid_elements: "span",
	relative_urls : false,
	remove_script_host : false,
	convert_urls : false,
    filemanager_title:"Responsive Filemanager",
	filemanager_access_key:"myPrivateKey" ,
    filemanager_crossdomain: false,
     external_filemanager_path:"<?php echo HTTP_JS_PATH; ?>filemanager/",
    external_plugins: { "filemanager" : "<?php echo HTTP_JS_PATH; ?>filemanager/plugin.min.js"},
  
   image_advtab: true,
   toolbar1: "code undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview"
 });

</script>