
<link href="<?=base_url()?>media/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?=base_url()?>media/css/style.css" rel='stylesheet' type='text/css' />
<style type="text/css">
body{width:70%;
font-size:90%;
}
.row{
	font-size:80%;
}
.table{
	font-size:100%;
}
</style>
<script type="text/javascript">

function print_function()
{
	window.print() ;
	window.close();
}
</script>
<body onLoad="print_function()">
<?
 if($month!=''){
  $heading2=' Stock Report as at '.$reportdata;
 }
 else{
   $heading2=' Stock Report as at '.$reportdata;
 }
 
 ?>
<div class="row">
	<div class="widget-shadow" data-example-id="basic-forms">
   <div class="form-title">
		<h4><?=$heading2?> 
       <span style="float:right"> <a href="javascript:load_printscrean1('<?=$month?>')"> <i class="fa fa-print nav_icon"></i></a>
</span></h4>
	</div>
     <div class="table-responsive bs-example widget-shadow"  >
                     
      <table class="table table-bordered"><tr class="success"><th  rowspan="2">Project Name</th><th  rowspan="2">Lot Number</th>
      <th colspan="2"> Number of Lots to sell</th><th rowspan="2">Stock</th><th rowspan="2">Profit</th><th rowspan="2">Sale Value</th>
        </tr>
        <tr >
        <th class="info">This Month</th>
         <th class="info">Last Month</th>
         </tr>
       
    <? 
	
	
	if($prjlist){$fullcost=0;$fullsale=0;$fullprofit=0;$lastlotcount=0;$thislotcount=0;
		foreach($prjlist as $prjraw){
			//echo $prjraw->prj_id;
			$prjcost=0;$prjsale=0;$prjprofit=0;
			$pendinglastmonth=$lastmont[$prjraw->prj_id]+$pendinglot[$prjraw->prj_id];
			if($reslots[$prjraw->prj_id]) {$pending=$pendinglot[$prjraw->prj_id]+count($reslots[$prjraw->prj_id]);
			$pendinglastmonth=$lastmont[$prjraw->prj_id]+count($reslots[$prjraw->prj_id])+$pendinglot[$prjraw->prj_id];
			}
			else $pending=$pendinglot[$prjraw->prj_id];
			
			$thislotcount=$thislotcount+$pending;
			$lastlotcount=$lastlotcount+$pendinglastmonth;
			?>
        <tr class="active"><td><?=$prjraw->project_name?></td><td></td><td><?=$pending?></td><td><?=$pendinglastmonth?></td>
        
        <td></td><td></td><td></td></tr>
        <? if($lotdata[$prjraw->prj_id]){
			foreach($lotdata[$prjraw->prj_id] as $raw){
				$prjcost=$prjcost+$raw->costof_sale;
				$prjprofit=$prjprofit+($raw->sale_val-$raw->costof_sale);
				$prjsale=$prjsale+$raw->sale_val;
				?>
        <tr><td></td><td><?=$raw->lot_number?></td><td></td><td></td>
        <td align="right"><?=number_format($raw->costof_sale,2)?></td>
         <td align="right"><?=number_format($raw->sale_val-$raw->costof_sale,2)?></td>
          <td align="right"><?=number_format($raw->sale_val,2)?></td>
        </tr>
        <? }}?>
          <? if($reslots[$prjraw->prj_id]){
			foreach($reslots[$prjraw->prj_id] as $raw){
				$prjcost=$prjcost+$raw->costof_sale;
				$prjprofit=$prjprofit+($raw->sale_val-$raw->costof_sale);
				$prjsale=$prjsale+$raw->sale_val;?>
        <tr><td></td><td><?=$raw->lot_number?></td><td></td><td></td>
        <td align="right"><?=number_format($raw->costof_sale,2)?></td>
         <td align="right"><?=number_format($raw->sale_val-$raw->costof_sale,2)?></td>
          <td align="right"><?=number_format($raw->sale_val,2)?></td>
        </tr>
        <? }}
		$fullcost=$fullcost+$prjcost;
		$fullprofit=$fullprofit+$prjprofit;
		$fullsale=$fullsale+$prjsale;
		?>
         <tr class="active"><td></td><td></td><td></td><td></td>
        <td align="right"><?=number_format($prjcost,2)?></td>
         <td align="right"><?=number_format($prjprofit,2)?></td>
          <td align="right"><?=number_format($prjsale,2)?></td>
        </tr>
        
      <? }}?>
       <tr class="active" style="font-weight:bold"><td></td><td></td><td><?=$thislotcount?></td><td><?=$lastlotcount?></td>
        <td align="right"><?=number_format($fullcost,2)?></td>
         <td align="right"><?=number_format($fullprofit,2)?></td>
          <td align="right"><?=number_format($fullsale,2)?></td>
        </tr>
         </table></div>
    </div> 
    
</div>