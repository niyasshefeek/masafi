<script type="text/javascript">
function getvalue(sel) {
    var value = sel.value; 
	if(value!=''){
	window.location = "<?php echo base_url('log_search?log=')?>"+value;	
	} 
}
</script>
<div id="main" role="main">

                <!-- RIBBON -->
                <div id="ribbon">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>">Home</a></li>
                        <li>Dashboard</li>
                    </ol>
                
                </div>
				
				<div id="content">
				<div class="row">
               
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="pull-left">
                            <h1> Log <span class="semi-bold">Details</span></h1>
                        </div>
                    </div>
                    
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 
						
                       <div class="col-sm-3">
                       			  
                                    <select name="user_type" id="user_type" class="form-control input-lg" onChange="getvalue(this)">
                                      <option value="">Status Types</option>
                                      <option value="logged in">Logged In</option>
                                      <option value="Canceled">Canceled</option>
                                      <option value="Active">Active</option>
                                      <option value="Deleted">Deleted</option>
                                      <option value="Restored">Restored</option>
                                  </select><br>
                                   <select name="user_type" id="user_type" class="form-control input-lg" onChange="getvalue(this)">
                                      <option value="">Data Types</option>
                                      <option value="Company">Company</option>
                                      <option value="Employee">Employee</option>
                                      <option value="Partner">Partner</option>
                                  </select><br>
                                   
                                  <select name="user_type" id="user_type" class="form-control input-lg" onChange="getvalue(this)">
                                      <option value="">User Types</option>
                                      <option value="admin">Admin</option>
                                      <option value="members">Members</option>
                                      <option value="sales">Sales</option>
                                      <option value="pro">Pro</option> 
                                      <option value="accounts">Accounts</option> 
                                      <option value="license">License</option> 
                                      <option value="front">Front</option> 
                                      <option value="visa">Visa</option>
                                  
                                  </select><br>
                                   <select name="follow_up" id="user_type" class="form-control input-lg" onChange="getvalue(this)">
                                      <option value="">Follow Ups</option>
                                      <option value="Follow Up">All Follow Up</option>
                                      <option value="Employee Follow Up">Employee</option>
                                      <option value="Partner Follow Up">Partner</option>
                                      <option value="License Follow Up">License</option>
                                      <option value="PRO Follow Up">Pro</option> 
                                      <option value="Accounts Follow Up">Accounts</option> 
                                      <option value="Visa Follow Up">Visa </option> 
                                      <option value="Customer Follow Up">Front</option> 
                                      <option value="Visa Follow Up">Visa</option>
                                  
                                  </select>
                                  <br>
                                  <select name="file_type" id="user_type" class="form-control input-lg" onChange="getvalue(this)">
                                      <option value="">File Types</option>
                                      <option value="File">All Files</option>
                                      <option value="Employee File">Employee</option>
                                      <option value="Partner File">Partner</option>
                                      <option value="License File">License</option>
                                      <option value="Immigration File">Immigration</option> 
                                      <option value="Labour Card File">Labour Card</option> 
                                      <option value="Accounts File">Accounts </option> 
                                      <option value="Power Of Attony File">Power Of Attony</option> 
                                      <option value="Tenancy File">Tenancy</option>
                                      <option value="Ejari File">Ejari</option>
                                     
                                  </select>
                                  <br>
                                  <form action="<?php echo base_url('log_search');?>">
                                  	<input type="text" name="log" class="form-control input-lg" placeholder="Search">
                                  </form>
                              </div>
                         
                         <div class="col-sm-9">
                            <div class="row tables">
                             
                             <div class="col-sm-9">
                             <b>#   </b>  <b>Log Details</b>
                             </div>
                             <div class="col-sm-1">
                             <b>User</b>
                             </div>
                             <div class="col-sm-2">
                             <b>Date & Time</b>
                             </div>
                            </div>
                            
                             <?php
							  if(!empty($all_logs)){
							   $i =1;
								  foreach($all_logs as $log){?>
								  <div class="row tables logs-list">
								  
								   <div class="col-sm-9">
								   <b> <?php echo $i++?>   </b>  <p><?php echo $log->log_data?></p>
								   </div>
								   <div class="col-sm-1">
								   <?php echo $log->log_user?>
								   </div>
								   <div class="col-sm-2">
								  <?php echo $log->log_date?>
								   </div>
								  </div>
							  <?php }}?>
                            
							</div>
                    </div>
                 </div>  
			
          	</div>
		</div>