<!DOCTYPE HTML>
<html>
<head>


    <?
    $this->load->view("includes/header_".$this->session->userdata('usermodule'));
    $this->load->view("includes/topbar_accounts");
    ?>
    <script src="<?=base_url()?>media/js/jquery.confirm.js"></script>
    <script type="text/javascript">
$( function() {
    $( "#fromdate" ).datepicker({dateFormat: 'yy-mm-dd',onSelect: function(selectedDate) {
		$('#todate').datepicker('option', 'minDate', selectedDate); //set todate mindate as fromdate
		date = $(this).datepicker('getDate');
		var maxDate = new Date(date.getTime());
		maxDate.setDate(maxDate.getDate() + 365); //add 31 days to from date
		$('#todate').datepicker('option', 'maxDate', maxDate);
		setTimeout(function() { $('#todate').focus(); }, 0);
	}});
	 $( "#todate" ).datepicker({dateFormat: 'yy-mm-dd'});
	
 
});
        var deleteid="";
        function call_delete(id,name)
        {
            //alert(id);
            document.deletekeyform.deletekey.value=id;
            $.ajax({
                cache: false,
                type: 'GET',
                url: '<?php echo base_url().'common/activeflag_cheker/';?>',
                data: {table: 'ac_recieptdata', id: id,fieldname:'RCTREFNO' },
                success: function(data) {
                    if (data) {
                        // alert(data);
                        document.getElementById("checkflagmessage").innerHTML=data;
                        $('#flagchertbtn').click();

                        //document.getElementById('mylistkkk').style.display='block';
                    }
                    else
                    {
                        $('#complexConfirm').click();
                    }
                }
            });


//alert(document.testform.deletekey.value);

        }

        function call_confirm(id)
        {

            document.deletekeyform.deletekey.value=id;
            $.ajax({
                cache: false,
                type: 'GET',
                url: '<?php echo base_url().'common/activeflag_cheker/';?>',
                data: {table: 'ac_recieptdata', id: id,fieldname:'RCTREFNO' },
                success: function(data) {
                    if (data) {
                        // alert(data);
                        document.getElementById("checkflagmessage").innerHTML=data;
                        $('#flagchertbtn').click();

                        //document.getElementById('mylistkkk').style.display='block';
                    }
                    else
                    {
                        $('#complexConfirm_confirm').click();
                    }
                }
            });
        }

        function call_cancel(id)
        {

            document.deletekeyform.deletekey.value=id;
            $.ajax({
                cache: false,
                type: 'GET',
                url: '<?php echo base_url().'common/activeflag_cheker/';?>',
                data: {table: 'ac_recieptdata', id: id,fieldname:'RCTREFNO' },
                success: function(data) {
                    if (data) {
                        // alert(data);
                        document.getElementById("checkflagmessage").innerHTML=data;
                        $('#flagchertbtn').click();

                        //document.getElementById('mylistkkk').style.display='block';
                    }
                    else
                    {
                        $('#complexConfirm_cancel').click();
                    }
                }
            });
        }
function call_return(id)
        {


            document.deletekeyform.deletekey.value=id;
            $.ajax({
                cache: false,
                type: 'GET',
                url: '<?php echo base_url().'common/activeflag_cheker/';?>',
                data: {table: 'ac_recieptdata', id: id,fieldname:'RCTREFNO' },
                success: function(data) {
                    if (data) {
                        // alert(data);
                        document.getElementById("checkflagmessage").innerHTML=data;
                        $('#flagchertbtn').click();

                        //document.getElementById('mylistkkk').style.display='block';
                    }
                    else
                    {
                        $('#complexConfirm_return').click();
                    }
                }
            });
        }
    </script>
    
    
    <script src="<?=base_url()?>media/js/jquery.table2excel.min.js"></script>

<script type="text/javascript">


$(document).ready(function(){  
      $('#create_excel').click(function(){ 
	 // 		var date =  document.getElementById('rptdate').value;
           $(".table2excel").table2excel({
					exclude: ".noExl",
					name: "Search Report " ,
					filename: "Search_report.xls",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
           
      });  
 });
</script>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="table">
                <h3 class="title1">Receipt Entry</h3>
                <?php $this->load->view("includes/flashmessage");?>
                <div class="widget-shadow">
                    <div class="  widget-shadow" data-example-id="basic-forms">
                        <form data-toggle="validator" method="post" action="<?=base_url()?>accounts/entrymaster/search"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 validation-grids widget-shadow" data-example-id="basic-forms" style="width: 100%; background-color: #eaeaea;">
                                    <div class="form-body">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <input  type="number" step="0.01" class="form-control" name="amountsearch" id="amountsearch" placeholder="Amount">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="receipt_no" id="receipt_no" placeholder="Receipt No">
                                            </div>

                                             <div class="form-group">
                                            <select class="form-control" id="payment_mode" name="payment_mode">
                                                <option value='all'>Select Payment Mode</option>
                                                <option value='all'>All</option>
                                                <option value='CSH'>CASH</option>
                                                <option value='CHQ'>CHEQUE</option>
                                                <option value='CREDIT CARD'>CREDIT CARD</option>
                                                <option value='DEBIT CARD'>DEBIT CARD</option>
                                                <option value='DD'>DIRECT DEPOSIT</option>
                                                <option value='FT'>FUND TRANSFER</option>
                                            </select>
                                            </div>
                                              <div class="form-group" >
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TRN <input type="checkbox" name="trn" id="trn" value="YES" />&nbsp;&nbsp;&nbsp;
                                        </div>
                                         <div class="form-group" >
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHEQUE <input type="checkbox" name="chq" id="chq" value="YES" />&nbsp;&nbsp;&nbsp;
                                        </div>
                                        <div class="form-group" >
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RETURNS <input type="checkbox" name="chq_rtn" id="chq_rtn" value="YES" />&nbsp;&nbsp;&nbsp;
                                        </div>
                                         <div class="form-group">
                                            <select class="form-control" name="bank_data" id="bank_data"  required onchange="load_activebudle(this.value)"  >
                                                <option value="ALL">Select Bank Account</option>
                                                <? if($banks){foreach($banks as $raw){?>
                                                    <option value="<?=$raw->id?>" ><?=$raw->ref_id?> - <?=$raw->name?></option>
                                                <? }}?>
                                             
                                            </select>
                   						</div>
                                        <div class="form-group">
                                          <input type="text" name="fromdate" id="fromdate" placeholder="From Date" autocomplete="off"  class="form-control" >
                                        </div>
                                          <div class="form-group">
                                          <input type="text" name="todate" id="todate" placeholder="To Date"  autocomplete="off" class="form-control" >
                                        </div>
                                        
                                            <div class="form-group">
                                                <button type="submit" id="search_payment" class="btn btn-primary " style="margin-bottom: 20px;margin-left: 5px;">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div  class="col-md-12 validation-grids widget-shadow" data-example-id="basic-forms" style="width: 100%;">
                                <table class="table table2excel">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>No</th>
                                        <th>Ledger Account</th>
                                        <th>Receipt Number</th>
                                         <th>TR Number</th>
                                          <th>Payment Mode</th>
                                          <th>Cheque Number</th>
                                            <th>Bank Branch</th>
                                        <th>Receipt Status</th>
                                        <th>Receipt Amount</th>
                                        <th><span style="float:right"><a href="#" id="create_excel" name="create_excel"> <i class="fa fa-file-excel-o nav_icon"></i></a>
</span></th>
                                    </tr>
                                    </thead>

                                    <?php
                                    $c=0;
                                    foreach ($entry_data->result() as $row)
                                    {
                                        $current_entry_type = entry_type_info($row->entry_type);
                                    ?>
                                    <tbody>
                                    <tr class="<? echo ($c<0) ? 0 : ($c++ % 2 == 1) ? 'info' : ''; ?>">
                                    <?
                                        echo "<td>" . date('Y-m-d',strtotime($row->date)) . "</td>";
                                        echo "<td>" . anchor('accounts/entrymaster/view/' . $current_entry_type['label'] . "/" . $row->id, full_entry_number($row->entry_type, $row->number), array('title' => 'View ' . $current_entry_type['name'] . ' Entry', 'class' => 'anchor-link-a')) . "</td>";

                                        echo "<td>";
                                        echo $this->Tag_model->show_entry_tag($row->tag_id);
                                        echo $this->Ledger_model->get_entry_name($row->id, $row->entry_type);
                                        echo "</td>";
$status= $row->RCTSTATUS;
if($row->CHQSTATUS=='DL')
$status= 'Cheque Return';
                                        echo "<td>" . $row->RCTNO . "</td>";
										 echo "<td>" . $row->temp_rctno . "</td>";
                                          echo "<td>" . $row->rcvmode . "</td>";
										  echo "<td>" . $row->CHQNO . "</td>";
										   echo "<td>" . $row->BANKNAME."-". $row->BRNNAME. "</td>";
                                        echo "<td>" . $status . "</td>";
                                        echo "<td align=right>" . number_format($row->cr_total, 2, '.', ',') . "</td>";
                                        if($row->RCTSTATUS=="QUEUE")
                                        {
                                            ?>
                                            <td>
                                                <a href=<?echo base_url().'accounts/entrymaster/edit/'.$current_entry_type['name'].'/'.$row->id;?>><i
                                                        class="fa fa-edit nav_icon icon_blue"></i></a>
                                                      <? if(check_chancel_true($row->id)){?>    
                                                <a  href="javascript:call_delete('<?=$row->id?>')" title="Delete"><i class="fa fa-trash-o nav_icon icon_blue"></i></a><? }?>
<!--                                                <a onclick="return confirm('Are you sure you want to delete this payment voucher?');" href=--><?//echo base_url().'accounts/entrymaster/delete/'.$current_entry_type['name'].'/'.$row->id;?><!--><i-->
<!--                                                        class="fa fa-trash-o nav_icon icon_blue"></i></a>-->
                                                    <a  href="javascript:call_confirm('<?=$row->id?>')" title="Confirm"><i class="fa fa-check-square-o nav_icon icon_blue"></i></a>
<!--                                                <a onclick="return confirm('Are you sure you want to confirm this payment voucher?');" href=--><?//echo base_url().'accounts/entrymaster/confirm/'.$current_entry_type['name'].'/'.$row->id;?><!--><i-->
<!--                                                        class="fa fa-check-square-o nav_icon icon_blue"></i></a>-->
                                            </td>
                                            <?

                                        }

                                        if($row->RCTSTATUS=="PRINT"){

                                        ?>
                                         <td>
<!--                                        <a title="Cancel Receipt" onclick="return confirm('Are you sure you want to cancel this Receipt Entry');" href=--><?//echo base_url().'accounts/entrymaster/cancel/'.$current_entry_type['name'].'/'.$row->id;?><!--><i-->
<!--                                            class="fa fa-times nav_icon icon_red"></i></a>-->
										 <? if(check_access('cancel receipt entry')) {?>
                                          <? if(check_chancel_true($row->id)){?>
                                                 <a  href="javascript:call_cancel('<?=$row->id?>')" title="Cancel Receipt"><i class="fa fa-times nav_icon icon_red"></i></a>
																	   <?
                                   				 if($row->rcvmode=='CHQ'){  ?>
                         						 <a  href="javascript:call_return('<?=$row->id?>')" title="Return Cheque"><i class="fa fa-credit-card nav_icon icon_red"></i></a><? }?> 
                          						
																	  
																	  
																	  <? }?><? }?>
                                        <?
                                        echo " &nbsp;" . anchor_popup('accounts/entrymaster/printreciepts/' . $row->id , img(array('src' => asset_url() . "images/icons/print.png", 'border' => '0', 'alt' => 'Print ' . $current_entry_type['name'] . ' Entry')), array('title' => 'Print ' . $current_entry_type['name']. ' Entry', 'width' => '600', 'height' => '600')) . " ";
                                        echo" ";
                                        ?>

                                        </td>
                                        <? }?>
                                        <?
                                       
                                       

                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <div id="pagination-container"><?php // echo $this->pagination->create_links(); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 modal-grids">
                <button type="button" style="display:none" class="btn btn-primary"  id="flagchertbtn"  data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>
                <div class="modal fade bs-example-modal-sm"tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
                                <h4 class="modal-title" id="mySmallModalLabel"><i class="fa fa-info-circle nav_icon"></i> Alert</h4>
                            </div>
                            <div class="modal-body" id="checkflagmessage"> Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" style="display:none" class="btn btn-delete" id="complexConfirm" name="complexConfirm"  value="DELETE"></button>
            <button type="button" style="display:none" class="btn btn-delete" id="complexConfirm_confirm" name="complexConfirm_confirm"  value="DELETE"></button>
            <button type="button" style="display:none" class="btn btn-delete" id="complexConfirm_cancel" name="complexConfirm_cancel"  value="DELETE"></button>
              <button type="button" style="display:none" class="btn btn-delete" id="complexConfirm_return" name="complexConfirm_return"  value="DELETE"></button>
            <form name="deletekeyform">  <input name="deletekey" id="deletekey" value="0" type="hidden">
            </form>
            <script>
                $("#complexConfirm").confirm({
                    title:"Delete confirmation",
                    text: "Are You sure you want to delete this ?" ,
                    headerClass:"modal-header",
                    confirm: function(button) {
                        button.fadeOut(2000).fadeIn(2000);
                        var code=1
                        window.location="<?=base_url()?>accounts/entrymaster/delete/"+document.deletekeyform.deletekey.value;
                    },
                    cancel: function(button) {
                        button.fadeOut(2000).fadeIn(2000);
                        // alert("You aborted the operation.");
                    },
                    confirmButton: "Yes I am",
                    cancelButton: "No"
                });

                $("#complexConfirm_confirm").confirm({
                    title:"Record confirmation",
                    text: "Are You sure you want to confirm this ?" ,
                    headerClass:"modal-header confirmbox_green",
                    confirm: function(button) {
                        button.fadeOut(2000).fadeIn(2000);
                        var code=1

                        window.location="<?=base_url()?>accounts/entrymaster/confirm/"+document.deletekeyform.deletekey.value;
                    },
                    cancel: function(button) {
                        button.fadeOut(2000).fadeIn(2000);
                        // alert("You aborted the operation.");
                    },
                    confirmButton: "Yes I am",
                    cancelButton: "No"
                });
                $("#complexConfirm_cancel").confirm({
                    title:"Record confirmation",
                    text: "Are You sure you want to cancel this ?" ,
                    headerClass:"modal-header",
                    confirm: function(button) {
                        button.fadeOut(2000).fadeIn(2000);
                        var code=1

                        window.location="<?=base_url()?>accounts/entrymaster/cancel/"+document.deletekeyform.deletekey.value;
                    },
                    cancel: function(button) {
                        button.fadeOut(2000).fadeIn(2000);
                        // alert("You aborted the operation.");
                    },
                    confirmButton: "Yes I am",
                    cancelButton: "No"
                });
					$("#complexConfirm_return").confirm({
                    title:"Record confirmation",
                    text: "Are You sure you want to Return this cheque ?" ,
                    headerClass:"modal-header",
                    confirm: function(button) {
                        button.fadeOut(2000).fadeIn(2000);
                        var code=1

                        window.location="<?=base_url()?>accounts/entrymaster/return_cheque/"+document.deletekeyform.deletekey.value;
                    },
                    cancel: function(button) {
                        button.fadeOut(2000).fadeIn(2000);
                        // alert("You aborted the operation.");
                    },
                    confirmButton: "Yes I am",
                    cancelButton: "No"
                });
            </script>

            <div class="row calender widget-shadow"  style="display:none">
                <h4 class="title">Calender</h4>
                <div class="cal1"></div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <?
    $this->load->view("includes/footer");
    ?>







