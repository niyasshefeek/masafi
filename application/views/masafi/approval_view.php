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
                        <th scope="col">ReturnOrder#ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">SalesOrder#ID</th>
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
                        <td><?php echo $return->customer_name ?></td>
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


<div class="modal fade in" id="returnOrder" role="dialog">
 <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Return Request</h4>
       </div>
       <div id="DetailData"></div>
       <form class="form-horizontal" action="<?php echo base_url('returnorder/')?>" enctype="multipart/form-data" method="post">
          <div class="modal-body">
             <div class="form-group">
                <div class="frm-cstm col-sm-12 ">
                  <label><b id="salesid2"></b> </label>
                   <input type="hidden" class="form-control" name="salesid" id="salesid" value="">

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
