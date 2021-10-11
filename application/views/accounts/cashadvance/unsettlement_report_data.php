<!DOCTYPE HTML>
<html>
<head>

<?
	$this->load->view("includes/header_".$this->session->userdata('usermodule'));
$this->load->view("includes/topbar_customer");
?>
<script src="<?=base_url()?>media/js/jquery.confirm.js"></script>
<script type="text/javascript">

     $( function() {
    $( "#fromdate" ).datepicker({dateFormat: 'yy-mm-dd'});
	 $( "#todate" ).datepicker({dateFormat: 'yy-mm-dd'});

  } );
jQuery(document).ready(function() {


	$("#officer_id").chosen({
    allow_single_deselect : true,
			search_contains: true,
	 		no_results_text: "Oops, nothing found!",
	 		placeholder_text_single: "Select an Option"
    });

$("#prj_id").chosen({
    allow_single_deselect : true,
			search_contains: true,
	 		no_results_text: "Oops, nothing found!",
	 		placeholder_text_single: "Select an Option"
    });
	$("#task_id").chosen({
    allow_single_deselect : true,
			search_contains: true,
	 		no_results_text: "Oops, nothing found!",
	 		placeholder_text_single: "Select an Option"
    });



});

function load_currentchart(id)
{
	var list=document.getElementById('projectlist').value;
	var res = list.split(",");
	//alert(document.getElementById('estimate'+id).value)

			//$('#canvas'+res[i]).delay(1).fadeIn(1000);
			 document.getElementById("chartset").innerHTML='<img src="<?=base_url()?>media/images/loading.gif"  class="loadinggif">';

			$( "#chartset" ).load( "<?=base_url()?>re/home/mychart/"+id );
			$( "#chartset2" ).load( "<?=base_url()?>re/home/mychart/"+id );

}
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
	var todate=document.getElementById("todate").value;
	 var fromdate=document.getElementById("fromdate").value;
// alert(month)
var report=$('#reportnames').val();
var employee=$('#officer_id').val();
//alert(report)
if(report=="01"){
	 if(fromdate!='' && todate!='')
		 {//alert("<?=base_url()?>accounts/cashadvance/report_data/"+todate+'/'+bookid)

		 $('#fulldata').delay(1).fadeIn(600);
				document.getElementById("fulldata").innerHTML='<img src="<?=base_url()?>media/images/loading.gif"  class="loadinggif">';
			$( "#fulldata").load( "<?=base_url()?>accounts/cashadvance/settlement_report_data/"+fromdate+'/'+todate);

		}else
		{
			 document.getElementById("checkflagmessage").innerHTML='Please Select Date Range To Generate Report';
			 $('#flagchertbtn').click();
			// $('#fulldata').delay(1).fadeOut(600);
		}
	}else if(report=="02"){
		if(employee!='' && todate!='')
			{//alert("<?=base_url()?>accounts/cashadvance/report_data/"+todate+'/'+bookid)

			$('#fulldata').delay(1).fadeIn(600);
				 document.getElementById("fulldata").innerHTML='<img src="<?=base_url()?>media/images/loading.gif"  class="loadinggif">';
			 $( "#fulldata").load( "<?=base_url()?>accounts/cashadvance/unsettlement_report_data/"+employee+'/'+todate);

		 }
		 else
		{
			 document.getElementById("checkflagmessage").innerHTML='Please Select Date And Employee To Generate Report';
			 $('#flagchertbtn').click();
			// $('#fulldata').delay(1).fadeOut(600);
		}
	}else
 {
		document.getElementById("checkflagmessage").innerHTML='Please Select Report Type To Generate Report';
		$('#flagchertbtn').click();
	 // $('#fulldata').delay(1).fadeOut(600);
 }

}

</script>

<script type="text/javascript">
  $(document).ready(function() {
var tableToExcel = (function() {
	var uri = 'data:application/vnd.ms-excel;base64,'
	, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
	, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
	, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
	return function(table, name, fileName) {
	if (!table.nodeType) table = document.getElementById(table)
	var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}

	var link = document.createElement("A");
	link.href = uri + base64(format(template, ctx));
	link.download = fileName || 'Workbook.xls';
	link.target = '_blank';
	document.body.appendChild(link);
	link.click();
	document.body.removeChild(link);
	}
})();

$('#create_excel').click(function(){
	tableToExcel('cash_advance', 'Cash Advance', 'CashAdvance<?=date('Y_m_d');?>.xls');
	// util.tablesToExcel(['table-data'], ['ReportCoin'], 'ReportCoin_${project}_${deviceType}.xls');
});
});
function hide_other(val)
{	if(val=='03')
	{

	$('#fromdate_div').delay(1).fadeOut(600);
	$('#todate_div').delay(1).fadeOut(600);
	$('#amount_div').delay(1).fadeOut(600);
	$('#project_div').delay(1).fadeOut(600);
	$('#task_div').delay(1).fadeOut(600);
	$('#book_div').delay(1).fadeOut(600);
	$('#book_div1').delay(1).fadeIn(600);
	}
	else if(val=='05')
	{
		$('#book_div').delay(1).fadeIn(600);
		$('#fromdate_div').delay(1).fadeIn(600);
	$('#todate_div').delay(1).fadeIn(600);
	$('#amount_div').delay(1).fadeIn(600);
	$('#project_div').delay(1).fadeIn(600);
	$('#task_div').delay(1).fadeIn(600);
	$('#book_div1').delay(1).fadeOut(600);

	}
	else
	{

	$('#fromdate_div').delay(1).fadeIn(600);
	$('#todate_div').delay(1).fadeIn(600);
	$('#amount_div').delay(1).fadeIn(600);
	$('#project_div').delay(1).fadeIn(600);
	$('#task_div').delay(1).fadeIn(600);
	$('#book_div').delay(1).fadeOut(600);
	$('#book_div1').delay(1).fadeOut(600);

	}

}
</script>
<style type="text/css">

</style>
 <?

 	if($book_type == '1')
    	$heading2=' IOU Cash Time Exceed Unsettled Report As At '.$todate;
    else
    	$heading2 = ' Cash Advance Report To '.$todate;



 ?>
<style type="text/css">

</style>

<div id="page-wrapper">
 <div class="main-page">

  <div class="table">



      <h3 class="title1">Cash Advance Report</h3>
     			<br>
      <div class="widget-shadow">
            <div class="row">
       <div class="row-one">
                 	  <form data-toggle="validator" method="post" action="<?=base_url()?>accounts/cashadvance/full_report"  enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12 validation-grids widget-shadow" data-example-id="basic-forms" style="width: 100%; margin-top:-40px; background-color: #eaeaea;">
            <div class="form-body">
                <div class="form-inline">
									<div class="form-group" id="reportnames_div">
										<select name="reportnames" id="" class="form-control"required="required"    onChange="hide_other(this.value)" >
											<option value=""> Select Report Type</option>
 <!-- Ticket No-2800 | Added By Uvini -->

                                    <!-- Ticket No-2800 | Added By Uvini -->
                                    <option value="01">Cash Advance Report</option>
                                    <option value="04">IOU Report</option>
                                      <option value="05">IOU Settlement Report</option>
                                	<!--  <option value="02">Unsettled Cash Advance Report</option> -->
                                  	<option value="03">Time Exceed Unsettled List</option>
									 </select>
								</div>

								 <div class="form-group" id="book_div" style="display:none">
                                     <select name="book_id" id="book_id" class="form-control"required="required"  onChange="hide_other1(this.value)" >
                                    <?    foreach($booklist as $row){ if($row->pay_type=='CSH'){?>
                                    <option value="<?=$row->id?>"><?=$row->type_name?> <?=$row->name?></option>
                                    <? }}?>

                                    </select>
                                     </div>


                                     <div class="form-group" id="book_div1" style="display:none">
                                <select name="book_id1" id="book_id1" class="form-control" >
                                     <option value="all">Select Book Type</option>
                                     <option value="all">All</option>
				                    <?    foreach($booklist as $row){ ?>
				                    <option value="<?=$row->id?>"><?=$row->type_name?> <?=$row->name?></option>
				                    <? }?>

				                    </select>

				                            </div>


                                      <div class="form-group" id="branch">
	                               		 <select name="branch" id="branch" class="form-control" >
	                                     <option value="all">Select Branch</option>
					                                     <option value="all">All</option>
					                    <?    foreach($branchlist as $row){ ?>
					                    <option value="<?=$row->branch_code?>"><?=$row->branch_name?></option>
					                    <? }?>
					             
					                    </select> 
                                
                            		</div>

										<div class="form-group" >
										<div class="col-sm-3 "><select name="officer_id" id="officer_id" class="form-control"required="required"  >
										 <option value="All">All</option>
										 <? if($emplist){
												foreach($emplist as $dataraw)
												{
														?>
												<option value="<?=$dataraw->id?>" ><?=$dataraw->emp_no?> -<?=$dataraw->initial?> <?=$dataraw->surname?></option>
												 <? }}?>
												 </select>
										 </div>
										 </div>

                                             <div class="form-group" id="fromdate_div">
                                                <input type="text" name="fromdate" id="fromdate" placeholder="From Date"  class="form-control" >
                                            </div>
                                               <div class="form-group" id="todate_div">
                                                  <input type="text" name="todate" id="todate" placeholder="To Date"  class="form-control" >
                                                </div>
                                                <div class="form-group" id="amount_div" >
                                                  <input type="text" name="amount" id="amount" placeholder="Amount"  class="form-control" >
                                                </div>
                                            <div class="form-group"  id="project_div"  ><select name="prj_id" id="prj_id" class="form-control"  >
                                     <option value="All">Select Project</option>
                                 <? if($prjlist){
                                                        foreach($prjlist as $dataraw)
                                                        {
                                                                ?>
                                                        <option value="<?=$dataraw->prj_id?>" ><?=$dataraw->project_name?> </option>
                                                         <? }}?>
                                                         </select>
                                 </div>
                                  <div class="form-group"   id="task_div" ><select name="task_id" id="task_id" class="form-control"  >
                                     <option value="All">Select Task</option>
                                 <? if($tasklist){
                                                        foreach($tasklist as $dataraw)
                                                        {
                                                                ?>
                                                        <option value="<?=$dataraw->task_id?>" ><?=$dataraw->task_name?> </option>
                                                         <? }}?>
                                                         </select>
                                 </div>

                                        <div class="form-group">
                                            <button type="submit"   id="search_payment" class="btn btn-primary " style="margin-bottom: 20px;margin-left: 5px;">Search</button>
                                        </div>
                </div>
            </div>

        </div>


    </div>
</form>   <div class="clearfix"> </div><br><div id="fulldata" style="min-height:100px;">
<div class="row">
	<div class="widget-shadow" data-example-id="basic-forms">
   <div class="form-title">
		<h4><?=$heading2?>
			<span style="float:right"><a href="#" id="create_excel" name="create_excel"><i class="fa fa-file-excel-o nav_icon"></i></a></span>
	</h4>
	</div>
     <div class="table-responsive bs-example widget-shadow" id="cash_advance"  style="max-height:400px; overflow:scroll" >
      <table class="table table-bordered">
      	<tr>
      		<th colspan="15" style="text-align: center;"><?=$heading2?></th>
      	</tr>

   <tr>  <th>Cash Advance No</th>
		 <th>Serial No</th>
   	     <th>Status</th>
   		 <th>Cheque No</th>
		 <th>Requested Date</th>
		 <th>Settlement Date</th>
		 <th>Date Variance</th>
		 <th>Reason</th>
		 <th>Employee Branch</th>
		 <th>Requested By</th>
		 <th>Project</th>
		 <th>Amount</th>
          <th>Unsettled Balance</th>
		 <th>Payment Voucher</th>
		 <th>Partially Settled Details</th>
		</tr>

       <? $fulltot=0;$fulltot2=0;$fulltot3=0;?>


        <?  if($settledlist){

			?>

            <?
			foreach($settledlist as $raw){
				//print_r($arrearspay[$raw->res_code]);

				// $apply_date = New date('Y-m-d',strtotime());
				// $promiss_date = New date('Y-m-d',strtotime($raw->promiss_date));
				// $diff = date_diff($apply_date,$promiss_date);
				// $date_varience = $diff->days;

				$apply_date=date_create($raw->apply_date);
				$promiss_date=date_create($raw->promiss_date);
				$diff=date_diff($apply_date,$promiss_date);
				$date_varience = $diff->format("%a");
				?>

      	<tr><td><?=$raw->adv_code?></td>
					<td><?=$raw->serial_number?></td>
        	<td><?=$raw->status?></td>
		  	<td align="right"><?=$raw->CHQNO?></td>
		  	<td><?=$raw->apply_date?></td>
			<td><?=$raw->promiss_date?></td>
			<td><?=$date_varience?></td>
			<td width="20%"><?=$raw->description?></td>
			<td><?=get_branch_name($raw->branch)?></td>
         	<td align="right"><?=$raw->initial?> <?=$raw->surname?></td>
            <td align="right"><?=$raw->project_name?></td>
			<td align="right"><?=number_format($raw->amount,2)?></td>
            <td align="right"><?=number_format($raw->amount-$raw->settled_amount ,2)?></td>
			<td align="right"><?=$raw->payvoucher_id?></td>
			<td align="right"><? if($unsettled_data[$raw->adv_id]){?>
				<table class-"table" border="1">
					<tr class="info"><th>Ledger</th><th>Project</th><th>Task</th><th>Amount</th><th>Statues</th></tr>
			<?  foreach ($unsettled_data[$raw->adv_id] as $key => $value) {?>
				<tr>
					<td><?=$value->name?></td>
					<td><?=$value->project_name?></td>
					<td><?=$value->task_name?></td>
					<td align="right"><?=number_format($value->settleamount,2)?></td>
					<td align="right"><?=$value->status?></td>
				</tr>

				<?}?>
				</table>
		<?  }?></td>

            </tr>
		<? 	 $fulltot= $fulltot+$raw->amount;
		$fulltot2=$fulltot2+($raw->amount-$raw->settled_amount)
		?>


        <?
	//	$prjbujet=$prjbujet+$raw->new_budget;
	//	$prjexp=$prjexp+$raw->tot_payments;
		}}?>






      <?
	//  $fulltot=$fulltot+$prjexp;


	  ?>
      <tr class="active" style="font-weight:bold">
         <td align="right">Total</td>
           <td align="right"></td>
            <td align="right"></td>
             <td align="right"></td>
              <td align="right"></td>
               <td align="right"></td>
                <td align="right"></td>
				 <td align="right"><?=number_format($fulltot,2)?></td>
                  <td align="right"><?=number_format($fulltot2,2)?></td>
				 <td align="right"></td>
          <td align="right"></td>

                 <td align="right"></td>
            </tr>
         </table>




         </div>
    </div>

    </div>

</div>
</div>    <br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /></p>

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
<input name="deletedate" id="deletedate" value="0" type="hidden">
</form>
							<script>
            $("#complexConfirm").confirm({
                title:"Delete confirmation",
                text: "Are You sure you want to delete this ?" ,
				headerClass:"modal-header",
                confirm: function(button) {
                    button.fadeOut(2000).fadeIn(2000);
					var code=1
                    window.location="<?=base_url()?>re/customer/delete/"+document.deletekeyform.deletekey.value;
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

                    window.location="<?=base_url()?>accounts/cashadvance/confirm_report/"+document.deletekeyform.deletekey.value+'/'+document.deletekeyform.deletedate.value;
                },
                cancel: function(button) {
                    button.fadeOut(2000).fadeIn(2000);
                   // alert("You aborted the operation.");
                },
                confirmButton: "Yes I am",
                cancelButton: "No"
            });
						$(document).ready(function(){
							$('#officers').hide();

							$('#reportnames').change(function(){
								var report=$('#reportnames').val();
								//alert(report)
								if(report=="01"){
									$('#fromdate_div').show();
									$('#todate_div').show();
									$('#officers').hide();
								}else if(report=="02"){
									$('#fromdate_div').hide();
									$('#todate_div').show();
									$('#officers').show();
								}
							})
						})
            </script>



        <div class="row calender widget-shadow"  style="display:none">
            <h4 class="title">Calender</h4>
            <div class="cal1">

            </div>
        </div>



        <div class="clearfix"> </div>
    </div>
</div>
		<!--footer-->
<?
	$this->load->view("includes/footer");
?>