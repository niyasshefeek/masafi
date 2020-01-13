<style>
.count_style {
    float: left;
    margin: 0;
    padding: 6px 10px 8px 11px;
    background: #695d5d;
    color: #fff;
	font-weight:bold;
}
</style>
<div id="main" role="main">


			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="inbox-nav-bar no-content-padding">

					<h1 class="page-title txt-color-blueDark hidden-tablet"><i class="fa fa-fw fa-user"></i> Customers &nbsp;

					</h1>

					<?php $this->load->view('templates/enq_leftmenu');?>
					<div class="table-wrap custom-scroll animated fast fadeInRight" style="min-height: 863px;">

                	<div id="sponsor-search" style="margin-bottom:70px !important;">

                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    	<form action="<?php echo base_url('search')?>" class="input-group input-group-lg hidden-mobile">

                          <div class="row">

                              <div class="col-sm-6">
                                  <select name="typ" id="enq_typ" class="form-control input-lg" required>

                                        <option value="">Select Type</option>
                                        <option value="cust_id">Customer ID</option>
                                        <option value="cust_name">Customer Name</option>
                                        <option value="sales_order_ID">SalesOrder #ID</option>
                                        <option value="SalesReturn_ID">SalesReturn #ID</option>


                                    </select>
                              </div>
                               <div class="col-sm-6">
                                  <input name="text" id="text" class="form-control input-lg" type="text" placeholder="Search Text here">
                              </div>

                          </div>
                          <div class="input-group-btn">
                              <button id="sponsor_submit" type="submit" class="btn btn-default">
                                  &nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-search fa-lg"></i>&nbsp;&nbsp;&nbsp;
                              </button>
                          </div>
                          </form>
                          <br>
                    </div>


                  </div>


						<table id="inbox-table" class="table table-striped table-hover">
                            <tbody>
                              <?php
                          if(!empty($customers)){
                              foreach($customers as $cust){?>

                                <tr id="msg1" class="unread">

                                    <td class="inbox-table-icon">



                                        <div class="checkbox">
                                            <label>

                                                <input type="checkbox" class="checkbox style-2">
                                                <span></span> </label>
                                        </div>

                                    </td>
                                    <td class="inbox-data-from hidden-xs hidden-sm">
                                        <div>
                                            	<a href="<?php echo base_url('customers/'.$cust->customer_id)?>">
                                                 <?php echo $cust->customer_id ?> - <?php echo $cust->customer_name ?>
                                              </a>
                                           <?php
                                             if($cust->status==true){
                                               echo "<sup style='color:green'>Active</sup>";
                                             }else{
                                               echo "<sup style='color:red'>Not Active</sup>";
                                             }

                                         ?>
                                        </div>
                                    </td>
                                    <td class="inbox-data-message">
                                        <div>
                                            <?php echo $cust->customer_address ?>

                                        </div>

                                    </td>

                                    <td class="inbox-data-date hidden-xs">
                                        <div>
                                             <?php echo $cust->created_at ?>
                                        </div>
                                    </td>

                                </tr>

                        <?php  }
                            }
                              ?>








                            </tbody>
                        </table>


			     </div>



				</div>


			</div>
			<!-- END MAIN CONTENT -->

		</div>
