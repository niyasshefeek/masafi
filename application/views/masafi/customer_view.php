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
          <div class="table-wrap custom-scroll animated fast fadeInRight" style="opacity: 1;">
                        <h2 class="email-open-header">
                            <?php echo $customer->customer_id?> : <?php echo $customer->customer_name?>
                            <?php
                              if($customer->status==true){
                                echo "  <span class='label bg-color-green'>Active</span>";
                              }else{
                                  echo "  <span class='label bg-color-red'>Not Active</span>";
                              }

                            ?>

                            <script>
                                function confirmDelte() {
                                  var txt;
                                  if (confirm("Are you sure you want to delete?")) {
                                    window.location.href = "#";
                                  }
                                }
                                </script>

                            <div class="pull-right">
                                 <a style="color:red" onclick="confirmDelte()" href="#"><i style="color:red" class="fa fa-trash"></i> Delete</a>
                                    <a style="color:green" href="#"><i style="color:green" class="fa fa-edit"></i> Edit</a>
                            </div>
                                                   </h2>

                        <div class="inbox-info-bar" style="margin-right:0">
                            <div class="row">
                                <div class="col-sm-9">
                                    <img src="<?php echo HTTP_IMAGES_PATH?>avatars/male.png" alt="<?php echo $customer->customer_name?>" class="away">
                                    <strong><?php echo $customer->customer_name?></strong>

                                </div>
                                <div class="col-sm-3 text-right">
                                                                  </div>
                            </div>
                        </div>

                       <div class=" custom-scroll animated fast fadeInRight" style="min-height: 863px;">
                         <table id="inbox-table" class="table table-striped table-hover" style="padding: 0px;">
                           <tbody><tr>
                           <td>Customer ID : <strong><?php echo $customer->customer_id?></strong></td><td> Customer Name : <strong><?php echo $customer->customer_name?></strong></td>
                           </tr>

                            <tr>
                           <td colspan="2"><b>Address</b> : <strong><?php echo $customer->customer_address?></strong></td>
                          	</tr>

                           </tbody></table>
                            <div style="float:left;z-index:9999" class="col-sm-12">


                             </div>
                            <div class="col-sm-9">
                            <h1><b>Sales Orders</b></h1>
                            </div>

                            <div class="col-sm-3 text-right">
               <div class="btn-group text-left">
                  <a class="btn btn-primary btn-sm replythis" style="z-index:99999" data-toggle="modal" data-target="#CreateSalesOrder">
                  <i class="fa fa-plus"></i> New order
                  </a>
               </div>
            </div>
            <div class="jarviswidget" style="border:1px solid #aaaaaa">
               <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
               <div role="content">
                  <!-- widget edit box -->
                  <div class="jarviswidget-editbox">
                     <!-- This area used as dropdown edit box -->
                  </div>
                  <!-- end widget edit box -->
                  <!-- widget content -->
                  <div class="widget-body">

                     <div id="myTabContent1" class="tab-content padding-10" style="float: left;
                        width: 100%;
                      ">
                      <div>
                        <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Order Note</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                      if(!empty($salesorder)){
                          foreach($salesorder as $sales){?>
                          <tr>
                            <th scope="row"><?php echo $sales->sales_id ?></th>
                            <td><?php echo $sales->sales_name ?></td>
                            <td><?php echo $sales->sales_date ?></td>
                            <td><?php echo $sales->sales_price ?> AED</td>
                            <td>
                              <?php
                                switch($sales->status){
                                    case 1:
                                      echo "Shipped";
                                    break;

                                    case 0:
                                      echo "Draft";
                                    break;

                                    case 2:
                                      echo "Delivered";
                                    break;
                                }
                                ?>
                            </td>
                            <td>
                              <a class="btn btn-warning btn-sm replythis btn-action" style="z-index:99999" data-url="<?php echo base_url('getsales/'.$sales->sales_id)?>" id="btnAction1">
                              <i class="fa fa-refresh"></i> Return order
                              </a>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                          ?>
                        </tbody>
                        </table>

                      </div>
                     </div>
                  </div>
                  <!-- end widget content -->
               </div>
            </div>
        <div style="float:left;z-index:9999" class="col-sm-12">


         </div>
        <div class="col-sm-9">
        <h1><b>Sales Returns</b></h1>
        </div>

        <div class="jarviswidget" style="border:1px solid #aaaaaa">
           <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
           <div role="content">
              <!-- widget edit box -->
              <div class="jarviswidget-editbox">
                 <!-- This area used as dropdown edit box -->
              </div>
              <!-- end widget edit box -->
              <!-- widget content -->
              <div class="widget-body">

                 <div id="myTabContent1" class="tab-content padding-10" style="float: left;
                    width: 100%;
                  ">
                  <div>
                    <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">SalesOrder</th>
                        <th scope="col">Requested Date</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                  if(!empty($salesreturn)){
                      foreach($salesreturn as $return){?>
                      <tr>
                        <th scope="row"><?php echo $return->return_id ?></th>
                        <td><?php echo $return->salesid ?></td>
                        <td><?php echo $return->request_date ?></td>
                        <td><?php echo $return->reason ?></td>
                        <td class="returnstatus_<?php echo $return->return_id ?>">
                          <?php
                          if(!$return->status){
                              switch($return->status){
                                  case 1:
                                    echo "Approved";
                                  break;
                                  case 2:
                                    echo "Disapproved";
                                  break;
                                  case 0:
                                    echo "<b class='dd_".$return->return_id."' style='color:red'>Waiting for final Approval</b>";
                                  break;
                              }
                            }else{
                              if($return->status==2){
                                echo "<b><i style='color:red' class='fa fa-times-circle' aria-hidden='true'></i> Disapproved</b>";
                              }

                            }
                            if($return->supervisor_approve){
                              echo '<br><b>Approved : </b><i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Supervisor';
                            }

                            if($return->accounts_approve){
                              echo ' <i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Accountant';
                            }

                            if($return->manager_approve){
                              echo ' <i class="fa fa-check-circle" style="color:green" aria-hidden="true"></i> Sales Manager';
                            }

                            ?>
                        </td>
                        <td>
                          <a class="btn btn-primary btn-sm replythis btn-action" style="z-index:99999" data-url="<?php echo base_url('getreturnorder/'.$return->return_id)?>" id="btnAction1">
                          <i class="fa fa-search"></i> View
                          </a>
                        </td>
                      </tr>
                      <?php
                    }
                  }
                      ?>
                    </tbody>
                    </table>

                  </div>
                 </div>
              </div>
              <!-- end widget content -->
           </div>
        </div>


                        </div>



                        </div>

				</div>


			</div>
			<!-- END MAIN CONTENT -->

		</div>
  <div class="modal fade in" id="CreateSalesOrder" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">New order</h4>
         </div>
         <form class="form-horizontal" action="<?php echo base_url('salesorder/')?>" enctype="multipart/form-data" method="post">
            <div class="modal-body">

               <div class="form-group">
                  <div class="frm-cstm col-sm-12 ">
                     <input class="form-control" name="salesordername" placeholder="Order note" required=""></textarea>
                     <input type="hidden" name="customer_id" value="<?php echo $customer->customer_id;?>">
                  </div>
               </div>
                <div class="form-group">
                      <div class="frm-cstm col-sm-12">

                        <input type="text" name="orderdate" class="form-control datepicker hasDatepicker  dater" data-mask="99/99/9999" data-mask-placeholder="dd/mm/yyyy" placeholder="Order Date dd/mm/yyyy" autocomplete="off">
                     </div>
                </div>

               <div class="form-group">
                  <div class="frm-cstm col-sm-12 ">
                     <textarea class="form-control" cols="10" rows="3" name="orderdescription" placeholder="Order description" required=""></textarea>
                  </div>
               </div>

               <div class="row clearfix">
    <div class="col-md-12">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <td>
              <?php
                $options = array();
                if(!empty($products)){
                  foreach($products as $prod){
                    $options[$prod->product_name]=$prod->product_name;
                  }
                }



              $productSelected = '';
              echo form_dropdown('product[]', $options, $productSelected,'class="form-control"');

               ?>
             </td>
            <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <a id="add_row" class="btn btn-default pull-left">+Add Row</a>
      <a id='delete_row' class="pull-right btn btn-default">-Delete Row</a>
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-8">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Vat</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="tax" placeholder="0">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Vat Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-default">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>


<div class="modal fade in" id="returnOrder" role="dialog">
 <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Return Order</h4>
       </div>
       <div id="DetailData"></div>
       <form class="form-horizontal" action="<?php echo base_url('returnorder/')?>" enctype="multipart/form-data" method="post">
          <div class="modal-body">
             <div class="form-group">
                <div class="frm-cstm col-sm-12 ">
                  <label><b id="salesid2"></b> </label>
                   <input type="hidden" class="form-control" name="salesid" id="salesid" value="">
                   <input type="hidden" name="customer_id" value="<?php echo $customer->customer_id;?>">
                </div>
             </div>
              <div class="form-group">
                    <div class="frm-cstm col-sm-12" id="requestDate">

                      <input  type="text" name="request_date" class="form-control datepicker hasDatepicker  dater" data-mask="99/99/9999" data-mask-placeholder="dd/mm/yyyy" placeholder="Return Date dd/mm/yyyy" required autocomplete="off">
                   </div>
              </div>


             <div class="row clearfix">
                <div class="col-md-12">
                  <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                      <tr>
                        <th class="text-center"> # </th>
                        <th class="text-center"> Product </th>
                        <th class="text-center"> Shipped </th>
                        <th class="text-center"> Return </th>

                      </tr>
                    </thead>
                    <tbody id="DataVal">


                    </tbody>
                  </table>
                  <div id="bodyData"></div>
                </div>
              </div>
              <div class="form-group">
                 <div class="frm-cstm col-sm-12 " id="Reasons">
                    <textarea class="form-control" cols="10" rows="3" name="reason" placeholder="Reason" required=""></textarea>
                 </div>
              </div>

                <div class="form-group" id="approvaldata">
                   <div class="frm-cstm col-sm-12">
                    <a class="btn btn-success btn-sm replythis btn-action2" id="ApproveURL" data-url="#">Approve</a>
                    <a class="btn btn-danger btn-sm replythis btn-action2" id="DisApproveURL" data-url="#">disapprove</a>
                   </div>
                    <div id="infomsg" class="col-sm-12"></div>
               </div>

          </div>

          <div class="modal-footer">

             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-default">Submit</button>
          </div>
       </form>
    </div>
 </div>
</div>
