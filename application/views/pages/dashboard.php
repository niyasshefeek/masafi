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





        									<div class="col-sm-4">
        										<a href="<?php echo base_url('customers')?>">
        										<div class="well well-sm bg-color-darken txt-color-white text-center">

                            <h5>CUSTOMERS (<?php  echo $customers; ?>)</h5>

        										</div>
        				 						</a>
        									</div>

    									<div class="col-sm-4">
    									<a href="<?php echo base_url('approvallist')?>">
    										<div class="well well-sm bg-color-orangeDark txt-color-white text-center">

                                                <h5>APPROVALS (<?php  echo $getapprovals; ?>)</h5>

    										</div>
    				 						</a>
    									</div>

                      <div class="col-sm-4">
                        	<a href="<?php echo base_url('procutmaster')?>">
                        <div class="well well-sm bg-color-greenDark txt-color-white text-center">

                                                <h5>PRODUCT MASTER  (<?php  echo $products; ?>)</h5>

                        </div>
                        </a>
                      </div>

                             		                                  </div>
		</div>
