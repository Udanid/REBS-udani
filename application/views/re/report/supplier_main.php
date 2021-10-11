<!DOCTYPE HTML>
<html>
<head>

    <script src="<?=base_url()?>media/js/dist/Chart.bundle.js"></script>
    <script src="<?=base_url()?>media/js/utils.js"></script>
    
<?

	$this->load->view("includes/header_".$this->session->userdata('usermodule'));
$this->load->view("includes/topbar_notsearch");
?>
<script type="text/javascript">

$( function() {
    $( "#fromdate" ).datepicker({dateFormat: 'yy-mm-dd'});
	 $( "#todate" ).datepicker({dateFormat: 'yy-mm-dd'});
	
  } );
jQuery(document).ready(function() {
 	 
	 
	$("#prj_id").focus(function() { $("#prj_id").chosen({
     allow_single_deselect : true
    }); });
	$("#sup_code").focus(function() { $("#sup_code").chosen({
     allow_single_deselect : true
    }); });
	

 
	
});

function load_projectdata(code)
{
	if(code=='03')
	{
		$('#projectdata').delay(1).fadeOut(600);
	}
	else
	$('#projectdata').delay(1).fadeIn(600);
}
function load_fulldetails()
{
	 var sup_code=document.getElementById("sup_code").value;
	 if(sup_code!="")
	 {
		document.getElementById("suppsearchform").submit(); 
	 }
		  else
	  {
		   document.getElementById("checkflagmessage").innerHTML='Please Select Supplier to generate report';
		   $('#flagchertbtn').click();
	  }
}


function load_branchproject(id)
{
			 document.getElementById("prjlist").innerHTML='<img src="<?=base_url()?>media/images/loading.gif"  class="loadinggif">';
			  $( "#prjlist").load( "<?=base_url()?>re/report/get_branch_projectlist/"+id);



}
function expoet_excel_supliier()
{
		
		
		document.getElementById("myexportform_supplier").submit();
				//window.open( "<?=base_url()?>advancesarch/reservationlist_excel/"+qua);
}
</script>
<script>
var $th = $('.tableFixHead').find('thead th')
$('.tableFixHead').on('scroll', function() {
  $th.css('transform', 'translateY('+ this.scrollTop +'px)');
});
</script>
<style>
.tableFixHead { overflow-y: auto; height: 500px; }

/* Just common table stuff. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; }

@media(max-width:1920px){
	.topup{
	margin-top:0px;
}
}
@media(max-width:360px){
	.topup{
	margin-top:0px;
}
}
@media(max-width:790px){
	.topup{
	margin-top:100px;
}
}
@media(max-width:768px){
	.topup{
	margin-top:-10px;
}
}
</style> 

   <div id="page-wrapper"  >
			<div class="main-page  topup" >
				<div class="row-one">
                 	  <form data-toggle="validator" id="suppsearchform" name="suppsearchform" method="post" action="<?=base_url()?>re/report/suppayment"  enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12 validation-grids widget-shadow" data-example-id="basic-forms" style="width: 100%; margin-top:-40px; background-color: #eaeaea;">
            <div class="form-body">
                <div class="form-inline">  <div class="form-group" id="typeid">
                    <select class="form-control" placeholder="Qick Search.."    id="branch_code" name="branch_code"  onChange="load_branchproject(this.value)">
                    <option value="ALL">All Branch</option>
                    <?    foreach($branchlist as $row){?>
                    <option value="<?=$row->branch_code?>"><?=$row->branch_name?> </option>
                    <? }?>
             
					</select>  </div>
                     <div class="form-group" id="prjlist">
                        <select class="form-control" placeholder="Qick Search.."    id="prj_id" name="prj_id" >
                    <option value="">Project Name</option>
                    <?    foreach($prjlist as $row){?>
                    <option value="<?=$row->prj_id?>"><?=$row->project_name?> - <?=$row->town?></option>
                    <? }?>

					</select>  </div>
                     <div class="form-group" id="prjlist">
                        <select class="form-control" placeholder="Qick Search.."    id="sup_code" name="sup_code" >
                    <option value="">Supplier Name</option>
                    <?    foreach($supplierlist as $row){?>
                    <option value="<?=$row->sup_code?>"><?=$row->first_name?>  <?=$row->last_name?></option>
                    <? }?>

					</select>  </div>
                     <div class="form-group" id="blocklist">
                       <input type="text" name="fromdate" id="fromdate" placeholder="From Date"  class="form-control" >
                 
                    </div>
                    <div class="form-group" id="blocklist">
                       <input type="text" name="todate" id="todate" placeholder="To Date"  class="form-control" >
                 
                    </div>
                    
                  
                    <div class="form-group">
                        <button type="button" onclick="load_fulldetails()"  id="search_payment" class="btn btn-primary " style="margin-bottom: 20px;margin-left: 5px;">Search</button>
                    </div>
                </div>
            </div>
            
        </div>
           
  
    </div>
</form>   <div class="clearfix"> </div><br><div id="fulldata" style="min-height:100px;">   

<?  if($datalist){?>
 <div class="form-title">
		<h4><?=$supdata->first_name?> <?=$supdata->last_name?> Payment Details
       <span style="float:right"> <a href="javascript:expoet_excel_supliier()"> <i class="fa fa-file-excel-o nav_icon"></i></a>
</span></h4></div>
   <div class="col-md-12  widget-shadow" data-example-id="basic-forms" >
   
 <form data-toggle="validator" id="myexportform_supplier" method="post" action="<?=base_url()?>re/report/supplier_excel"  enctype="multipart/form-data">
                  <input type="hidden" name="lastq" id="lastq" value="<?=$lastq?>">
                   <input type="hidden" name="sup_code_ex" id="sup_code_ex" value="<?=$supdata->sup_code?>">
                  
                  </form>
                  <div class="tableFixHead">
 						<table class="table table-bordered"> <thead> <tr> <th>Project Name</th><th>Payment Date</th><th>Voucher No</th><th>Cheque No</th><th>Bank</th> <th>Task </th><th>Amount</th></tr> </thead><tbody>
                      <? $prjname='';$brcode='';  $prjes=0;$prjdis=0;$prjsale=0; $prjmdp=0;$prjpaid=0;$prjbmdp=0;
					  $brnes=0;$brndis=0;$brnsale=0; $brnmdp=0;$brnpaid=0;$brnbmdp=0;
					  $prj_id=''; $brid='';
					  if($datalist){$c=0;
                          foreach($datalist as $row){
							 ?>  
                      		<? if($prj_id!='' & $prj_id!=$row->prj_id){?>
                       	<tr class="info" style="font-weight:bold"> 
                        <td scope="row" colspan="6"><?=$prjname?> Project Total</td>
                        
                        <td align="right"><?=number_format($prjbmdp,2)?></td>
                         </tr> 
                         
                      <? $prjes=0;$prjdis=0;$prjsale=0; $prjmdp=0;$prjpaid=0;$prjbmdp=0;
					   }?>
                        <? if($brid!='' & $brid!=$row->branch_code){?>
                       <tr class="yellow" style="font-weight:bold"> 
                        <td scope="row" colspan="6"> <?=get_branch_name($brid)?> Branch Total</td>
                       
                        <td align="right"><?=number_format($brnbmdp,2)?></td>
                         </tr> 
                         
                      <?  $brnes=0;$brndis=0;$brnsale=0; $brnmdp=0;$brnpaid=0;$brnbmdp=0;
					   }?>
                       <tr > 
                        <td scope="row"><?=$row->project_name?></td>
                        <td> <?=$row->paymentdate ?></td>
                        <td> <?=$row->voucher_ncode ?></td> 
                         <td> <?=$row->CHQNO ?></td> 
                        <td><?=get_entry_name($row->entryid,2) ?></td>
                        <td><?=$row->task_name ?> - <?=$row->subtask_name ?></td>
                        <td align="right"><?=number_format($row->amount,2)?></td>
                         </tr> 
                        
                                <?
									$prjbmdp=$prjbmdp+($row->amount);
								$prj_id=$row->prj_id;
								$prjname=$row->project_name;
									$brnbmdp=$brnbmdp+($row->amount);
								$brid=$row->branch_code;
								
								
								
								  }} ?>
                                     <tr class="info" style="font-weight:bold"> 
                        <td scope="row" colspan="6"> <?=$prjname?> Project Total</td>
                               <td align="right"><?=number_format($prjbmdp,2)?></td>
                         </tr> 
                         
                          <tr class="yellow" style="font-weight:bold"> 
                        <td scope="row" colspan="6"><?=get_branch_name($brid)?> Branch Total</td>
                              <td align="right"><?=number_format($brnbmdp,2)?></td>
                         </tr> 
                          </tbody></table></div></div> <? }?></div>
				
				</div>
            
            
	             
                 <div class="col-md-4 modal-grids">
						<button type="button" style="display:none" class="btn btn-primary"  id="flagchertbtn"  data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>
						<div class="modal fade bs-example-modal-sm"tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							<div class="modal-dialog modal-sm">
								<div class="modal-content"> 
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="mySmallModalLabel"><i class="fa fa-info-circle nav_icon"></i> Alert</h4> 
									</div> 
									<div class="modal-body" id="checkflagmessage">
									</div>
								</div>
							</div>
						</div>
					</div>
                    
<button type="button" style="display:none" class="btn btn-delete" id="complexConfirm" name="complexConfirm"  value="DELETE"></button>
<button type="button" style="display:none" class="btn btn-delete" id="complexConfirm_confirm" name="complexConfirm_confirm"  value="DELETE"></button>
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
                    window.location="<?=base_url()?>re/project/delete/"+document.deletekeyform.deletekey.value;
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
					
                    window.location="<?=base_url()?>re/lotdata/confirm_price/"+document.deletekeyform.deletekey.value;
                },
                cancel: function(button) {
                    button.fadeOut(2000).fadeIn(2000);
                   // alert("You aborted the operation.");
                },
                confirmButton: "Yes I am",
                cancelButton: "No"
            });
            </script> 
            
                
				<div class="row calender widget-shadow" style="display:none">
					<h4 class="title">Calender</h4>
					<div class="cal1" >
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!--footer-->
<?
	$this->load->view("includes/footer");
?>
   
