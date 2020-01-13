<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">Masafi<span class="hidden-xs"> - Web Application</span> © <?php  echo date('Y');?></span>
                    <span class="label pull-right"><b style=" color:#4CAF50"><i class="fa fa-user"></i> <?php  echo $this->ion_auth->get_users_groups()->row()->description?></b> Logged in <?php  echo $this->ion_auth->user()->row()->first_name;?></span>
				</div>
			</div>
		</div>
		<div id="shortcut">
			<ul>
				<li>
					<a href="<?php echo base_url()?>" class="jarvismetro-tile big-cubes bg-color-blue">
                    	<span class="iconbox"> <i class="fa fa-lg fa-4x fa-home"></i> <span class="menu-item-parent">DASHBOARD</span></span>
                     </a>
				</li>
			</ul>
		</div>

		<!-- browser msie issue fix -->
		<script src="<?php echo HTTP_JS_PATH?>plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?php echo HTTP_JS_PATH?>plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo HTTP_JS_PATH?>app.config.seed.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo HTTP_JS_PATH?>bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo HTTP_JS_PATH?>bootstrap/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo HTTP_JS_PATH?>plugin/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

		<!--[if IE 8]>
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo HTTP_JS_PATH?>app.min.js"></script>
		<!-- PAGE RELATED PLUGIN(S) -->
        <!-- JQUERY VALIDATE -->
		<script src="<?php echo HTTP_JS_PATH?>plugin/masked-input/jquery.maskedinput.min.js"></script>




		<script>

		$('.btn-action2').click(function(event){
				event.preventDefault();
		    var url = $(this).data("url");
				console.log(url);

										$.ajax({
				    					 type:"POST"
				    					 ,dataType : "json"
				    					 ,url : url
				    					 ,data : {action: "submit"}
				    					 ,success : function(res){
				    						//$('.loader_bk').hide();
				    						var res = jQuery.parseJSON(JSON.stringify(res));
													console.log(res);
				    						if(res.success=="approved"){
														$("#approvaldata .frm-cstm").hide();
														$("#infomsg").html("<h4>Return request approved</h4>");
														$('#returnOrder').modal('hide');

														if(res.group=='supervisor'){
															$('.returnstatus_'+res.returnid).append('<br><b>Approved : </b><i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Supervisor ');
														}
														if(res.group=='accountant'){
															$('.returnstatus_'+res.returnid).append('<i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Accountant ');
														}
														if(res.group=='sales manger'){
															$('.returnstatus_'+res.returnid).append('<i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Sales manger ');
															$('.dd_'+res.returnid).remove();
														}


												}

												if(res.success=="disapproved"){
														$("#approvaldata .frm-cstm").hide();
														$('.returnstatus_'+res.returnid).html("<b><i style='color:red' class='fa fa-times-circle' aria-hidden='true'></i> Disapproved</b>");
														$("#infomsg").html("<h4>Return request disapproved</h4>");
														$('#returnOrder').modal('hide');
												}

											}

										});
				$(this).removeData("url");

		});


		$('.btn-action').click(function(event){

		    var url = $(this).data("url");
			//	console.log(url);

										$.ajax({
				    					 type:"POST"
				    					 ,dataType : "json"
				    					 ,url : url
				    					 ,data : {action: "submit"}
				    					 ,success : function(res){
				    						//$('.loader_bk').hide();
				    						var res = jQuery.parseJSON(JSON.stringify(res));
											//	console.log(res);
				    						if(res.requests){
													var jsonProduct = [];
													var jsonQty = [];
													var jsonRQty =[];
														var salesO = res.requests;
														salesO.forEach(function(obj,inx){
																		//	console.log(obj);
																		//	console.log(res.msg);
																			if(res.msg!=2){
																				$('#salesid').val(obj.sales_id);
																				$('#salesid2').text('#SALESID :'+obj.sales_id);

																				$( "#returnOrder .modal-footer" ).show();
																				$('#salesid').show();
																				$('#requestDate').show();
																				$('#Reasons').show();
																				$("#approvaldata").hide();
																				$("#bodyData").empty();

																			}else{
																				$("#approvaldata .frm-cstm").show();
																				$("#infomsg").empty();
																				$('#salesid2').html('#RMAID :'+obj.return_id+'<br><b>Return Order Date : '+obj.request_date+'</b><br><b>Reason : '+obj.reason+'</b>');
																				$('#requestDate').hide();
																				$('#Reasons').hide();

																				$("#ApproveURL").attr("data-url","<?php echo base_url("approve/")?>"+obj.return_id);
																				$("#DisApproveURL").attr("data-url","<?php echo base_url("disapprove/")?>"+obj.return_id);
																				var approvalStatus = "";
																				var a_supervisor = false;
																				var a_accounts = false;
																				var a_salesmanager = false;


																				if(obj.supervisor_approve!=false){
																					a_supervisor = true;
																					approvalStatus +='<br><b>Approved : </b><i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Supervisor ';
																					if(obj.accounts_approve!=false){
																						a_accounts = true;
																						approvalStatus +='<i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Accountant ';
																						if(obj.manager_approve!=false){
																							a_salesmanager = true;
																							approvalStatus +='<i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Sales Manager ';
																						}

																					}
																				};
																				$("#bodyData").html(approvalStatus);
																				<?php if($this->ion_auth->in_group('supervisor')){?>
																							if(obj.status!=2 && a_supervisor!=true){
																									$("#approvaldata").show();
																							}else{
																								$("#approvaldata").hide();
																							}
																				<?php }?>
																				<?php if($this->ion_auth->in_group('accounts')){?>
																							if(obj.status!=2 && a_supervisor!=false && a_accounts!=true){
																									$("#approvaldata").show();
																								}else{
																									$("#approvaldata").hide();
																								}
																				<?php }?>
																				<?php if($this->ion_auth->in_group('sales manger')){?>
																							if(obj.status!=2 && a_supervisor!=false && a_accounts!=false && a_salesmanager!=true){
																										$("#approvaldata").show();
																							}else{
																										$("#approvaldata").hide();
																							}
																				<?php }?>



																				$( "#returnOrder .modal-footer" ).hide();
																				$('#salesid').hide();

																				if(obj.returnqty!='' ){
																					jsonRQty[inx] = JSON.parse(obj.returnqty);
																				}
																			}

																			if(obj.product!='' ){
																				jsonProduct[inx] = JSON.parse(obj.product);
																			}
																			if(obj.qty!=''){
																				jsonQty[inx] = JSON.parse(obj.qty);
																			}
																			});
													//	console.log(jsonProduct[0]);
															//console.log(jsonRQty[0]);
															var html = "";
															var rqty = "";
															var disabled = "";
														jsonProduct.forEach(function(rec2,inx2){
															console.log(rec2[0]);

															rec2.forEach(function(rec3,inx3){
																	if(typeof(jsonRQty[0])!=="undefined" ){
																			 rqty = jsonRQty[0][inx3];
																			 disabled = "disabled";
																	}
																		 html +=   '<tr>'+
								                        '<td>'+(inx3+1)+'</td>'+
								                        '<td>'+rec3+'<input type="hidden" name="product[]" value="'+rec3+'"></td>'+
								                        '<td>'+jsonQty[0][inx3]+'<input type="hidden" name="qty[]" value="'+jsonQty[0][inx3]+'"></td>'+
								                        '<td><input type="number" name="returnqty[]" value="'+rqty+'"  placeholder="Qty" class="form-control price" step="0" min="0" max="'+jsonQty[0][inx3]+'"'+disabled+'/></td>'+
								                      '</tr>';
																		});

														});
														//var product = salesO.product;
													//	var qty = jQuery.parseJSON(JSON.stringify(salesO.qty));
												//	 console.log(salesO);


													 $( "#DataVal" ).html(html);
													  $('#returnOrder').modal('show');
				    						}

				    					}
				    				});
		$(this).removeData("url");
		});

		$(document).ready(function(){
				var i=1;
				$("#add_row").click(function(){b=i-1;
						$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
						$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
						i++;
				});
				$("#delete_row").click(function(){
					if(i>1){
				$("#addr"+(i-1)).html('');
				i--;
				}
				calc();
			});

			$('#tab_logic tbody').on('keyup change',function(){
				calc();
			});
			$('#tax').on('keyup change',function(){
				calc_total();
			});


		});

		function calc()
		{
			$('#tab_logic tbody tr').each(function(i, element) {
				var html = $(this).html();
				if(html!='')
				{
					var qty = $(this).find('.qty').val();
					var price = $(this).find('.price').val();
					$(this).find('.total').val(qty*price);

					calc_total();
				}
				});
		}

		function calc_total()
		{
			total=0;
			$('.total').each(function() {
						total += parseInt($(this).val());
				});
			$('#sub_total').val(total.toFixed(2));
			tax_sum=total/100*$('#tax').val();
			$('#tax_amount').val(tax_sum.toFixed(2));
			$('#total_amount').val((tax_sum+total).toFixed(2));
		}

		</script>


<script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!
			$(function() {
				$('.datepicker.dater').datepicker( {
					format: "dd/mm/yyyy",
					startView: "years",
					autoclose:true
				});
			});
			$(function() {
				$('#dateselect_filter4').datepicker( {
					format: "M-yyyy",
					startView: "years",
					 viewMode: "months",
   					 minViewMode: "months",
					autoclose:true
				});
			});
			$(function() {
				$('#datatable_fixed_column .datepicker').datepicker( {
					format: "dd/mm/yyyy",
					startView: "years",
					autoclose:true
				});
			});

		$(function() {
				$('.datepicker.input-lg').datepicker( {
					format: "dd/mm/yyyy",
					startView: "years",
					autoclose:true
				});
			});
		$(document).ready(function() {

			$('.refresh').click(function() {
				location.reload();
			});


			pageSetUp();




		})

		</script>




	</body>

</html>
