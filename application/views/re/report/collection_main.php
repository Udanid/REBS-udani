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
	 $( "#date" ).datepicker({dateFormat: 'yy-mm-dd'});
	
  } );
jQuery(document).ready(function() {
 	  $("#prj_id").chosen({
     allow_single_deselect : true
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
function load_fulldetails()
{
	 var prj_id= document.getElementById("prj_id").value;
	 var month=document.getElementById("month").value;
	  var collection=document.getElementById("collection").value;
	    var branchid=document.getElementById("branch_code").value;
		 var fromdate=document.getElementById("fromdate").value;
	    var todate=document.getElementById("todate").value;
	     var date=document.getElementById("date").value;
		
	
	  if(collection!='')
	  {
		  if(collection=='01' || collection=='02' ||  collection=='03' ||  collection=='04')
		  {
			 if(prj_id!="")
			 {
			
			  
				 $('#fulldata').delay(1).fadeIn(600);
				  document.getElementById("fulldata").innerHTML='<img src="<?=base_url()?>media/images/loading.gif"  class="loadinggif">'; 				
				  if(fromdate!='' & todate!='')
				  {
				  $( "#fulldata").load( "<?=base_url()?>re/report_daterange/get_collection/"+prj_id+'/'+collection+'/'+fromdate+'/'+todate);
				  }
				  else
				  {
					  $( "#fulldata").load( "<?=base_url()?>re/report/get_collection/"+prj_id+'/'+collection+'/'+month);
				  }
				  
			 }
			 else
			 {
				 prj_id=0;
			// alert(collection)
			  $('#fulldata').delay(1).fadeIn(600);
				  document.getElementById("fulldata").innerHTML='<img src="<?=base_url()?>media/images/loading.gif"  class="loadinggif">'; 				
					if(fromdate!='' & todate!='')
				  {
					 // alert("<?=base_url()?>re/report_daterange/get_collection_all/"+branchid+'/'+collection+'/'+fromdate+'/'+todate);
					 
					 	 $('#fulldata').delay(1).fadeIn(600);
				  document.getElementById("fulldata").innerHTML='<img src="<?=base_url()?>media/images/loading.gif"  class="loadinggif">'; 	
				  $( "#fulldata").load( "<?=base_url()?>re/report_daterange/get_collection_all/"+branchid+'/'+collection+'/'+fromdate+'/'+todate);
				  }
				  else
				  {
					   $( "#fulldata").load( "<?=base_url()?>re/report/get_collection_all/"+branchid+'/'+collection+'/'+month);
				  }
			 
		 //	 document.getElementById("checkflagmessage").innerHTML='Please Select Project to generate report'; 
			//$('#flagchertbtn').click(); 
			}
		  }
		  else if(collection == '07') //Ticket No:2537 Added by Madushan
		  {		
		  	 if(prj_id=="")  prj_id='ALL';
			  if(date!='')
				  {
					 
				
			//	alert("<?=base_url()?>re/report_daterange/collection_details/"+branchid+'/'+collection+'/'+fromdate+'/'+todate+'/'+prj_id)
				$('#fulldata').delay(1).fadeIn(600);
				  document.getElementById("fulldata").innerHTML='<img src="<?=base_url()?>media/images/loading.gif"  class="loadinggif">'; 	
					    $( "#fulldata").load( "<?=base_url()?>re/report_daterange/collection_details/"+branchid+'/'+collection+'/'+date+'/'+prj_id);
				
				  }
				  else
				  {
					   document.getElementById("checkflagmessage").innerHTML='Please Select  Date to generate report'; 
		  				 $('#flagchertbtn').click(); 
				  }

		  }
		  else
		  {
			
			  if(prj_id=="")  prj_id='ALL';
			  if(fromdate!='' & todate!='')
				  {
					 
				
			//	alert("<?=base_url()?>re/report_daterange/collection_details/"+branchid+'/'+collection+'/'+fromdate+'/'+todate+'/'+prj_id)
					    $( "#fulldata").load( "<?=base_url()?>re/report_daterange/collection_details/"+branchid+'/'+collection+'/'+fromdate+'/'+todate+'/'+prj_id);
				
				  }
				  else
				  {
					   document.getElementById("checkflagmessage").innerHTML='Please Select  Range Date generate report'; 
		  				 $('#flagchertbtn').click(); 
				  }
		  }
	  }
	  else
	  { 
		   document.getElementById("checkflagmessage").innerHTML='Please Select Report Type generate report'; 
		   $('#flagchertbtn').click(); 
	  }
}
function load_branchproject(id)
{
			 document.getElementById("prjlist").innerHTML='<img src="<?=base_url()?>media/images/loading.gif"  class="loadinggif">'; 
			  $( "#prjlist").load( "<?=base_url()?>re/report/get_branch_projectlist/"+id);
	
		
		
}

//Ticket No:2537 Added by Madushan
function date_range(collection)
{
	if(collection == "07")
	{
		//alert(collection);
		$('#todate').css('display','none');
		$('#fromdate').css('display','none');
		$('#date').css('display','');
	}
	else
	{
		$('#todate').css('display','');
		$('#fromdate').css('display','');
		$('#date').css('display','none');
	}
}


</script>

<style type="text/css">

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
                 	  <form data-toggle="validator" method="post" action="<?=base_url()?>accounts/income/search"  enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12 validation-grids widget-shadow" data-example-id="basic-forms" style="width: 100%; margin-top:-40px; background-color: #eaeaea;">
            <div class="form-body">
                <div class="form-inline">
                <div class="form-group">
                        <select class="form-control" placeholder="Qick Search.."    id="branch_code" name="branch_code" onChange="load_branchproject(this.value)">
                    <? if(check_access('all_branch')){?>
                    <option value="ALL">All Branch</option>
                     <?    foreach($branchlist as $row){?>
                    <option value="<?=$row->branch_code?>" <? ?>><?=$row->branch_name?> </option>
                    <? }?>
                    <? } else {?>
                    <?    foreach($branchlist as $row){if($this->session->userdata('branchid')==$row->branch_code){?>
                    <option value="<?=$row->branch_code?>" <? ?>><?=$row->branch_name?> </option>
                    <? }} }?>
             
					</select>  </div>
                    <div class="form-group" id="prjlist">
                        <select class="form-control" placeholder="Qick Search.."    id="prj_id" name="prj_id" >
                    <option value="">Project Name</option>
                    <?    foreach($prjlist as $row){?>
                    <option value="<?=$row->prj_id?>"><?=$row->project_name?> - <?=$row->town?></option>
                    <? }?>
             
					</select>  </div>
                    <div class="form-group" id="blocklist">
                        <select  name="month" id="month" class="form-control" >
                         <option value="">Select Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                        </select>
                    </div>
                    <div class="form-group" id="blocklist">
                        <select  name="collection" id="collection" class="form-control" onchange="date_range(this.value)">
                         <option value="">Report Type</option>
                        <option value="01">Down Payment</option>
                        <option value="02">Easy Payment</option>
                        <option value="03">Bank Loans</option>
                         <option value="04">ZEP Loans</option>
                           <option value="06">All Reservation Report</option>
                          <option value="05">Full Detail Report</option>
                           <option value="07">Full Block Detail Report</option>
                        <!-- <option value="06">Project Vise Summery Report</option>
                       -->
                        </select>
                    </div>
                      <div class="form-group" id="blocklist">
                      <input type="text" name="fromdate" id="fromdate" placeholder="From Date" autocomplete="off" class="form-control" >
                    </div>
                      <div class="form-group" id="blocklist">
                      <input type="text" name="todate" id="todate" placeholder="To Date" autocomplete="off" class="form-control" >
                    </div>
                   
                     <div class="form-group" id="blocklist">
                      <input type="text" name="date" id="date" placeholder="Date" autocomplete="off" class="form-control" style="display: none" >
                    </div>
                	
                    <div class="form-group">
                        <button type="button" onclick="load_fulldetails()"  id="search_payment" class="btn btn-primary " style="margin-bottom: 20px;margin-left: 5px;">Search</button>
                    </div>
                </div>
            </div>
            
        </div>
           
  
    </div>
</form>   <div class="clearfix"> </div><br><div id="fulldata" style="min-height:100px;"></div>    <br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /></p> 
				
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
   
