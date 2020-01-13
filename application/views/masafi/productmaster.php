<div id="main" role="main">

                <!-- RIBBON -->
                <div id="ribbon">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>">Home</a></li>
                        <li>Product Master</li>
                    </ol>

                </div>

				<div id="content">
          <div class="row">

        									<div class="col-sm-12">

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
                                            <th scope="col">Type</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Desc</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Stock</th>
                                              <th scope="col">Available</th>
                                                <th scope="col">Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                      if(!empty($products)){
                                          $i=1;
                                          foreach($products as $pr){?>
                                          <tr>
                                            <th scope="row"><?php echo $i++ ?></th>
                                            <td><?php echo $pr->name ?></td>
                                            <td><?php
                                            echo '<img width="150" src="'.$pr->product_img.'" alt="'.$pr->product_name.'">';
                                            echo '<br>'.$pr->product_name ?></td>
                                            <td><?php echo $pr->product_desc ?></td>
                                            <td><?php echo $pr->product_price ?></td>
                                            <td><?php echo $pr->total_quantity ?></td>
                                            <td><?php echo $pr->avail_qty ?></td>
                                            <td>
                                              <?php
                                              //if(!$pr->status){
                                                  switch($pr->status){
                                                      case 1:
                                                        echo "Active";
                                                      break;
                                                      default:
                                                        echo "Not Atctive";

                                                  }



                                                ?>
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
