
<script type="text/javascript">

jQuery(document).ready(function() {
  

	$("#lot_id").chosen({
     	allow_single_deselect : true,
		search_contains: true,
		no_results_text: "Oops, nothing found!",
		placeholder_text_single: "Block Number"
	 
    });
 
 
	
});
</script>
                                    <select class="form-control" placeholder="Block Number"  id="lot_id"  onchange="load_fulldetails(this.value)" name="lot_id"   required >
                    <option value=""></option>
                    <? foreach ($lotlist as $raw){ if($raw->stampfee_paidtot>=$raw->stamp_duty & $raw->stamp_duty > 0  ){?>
						
                    <option value="<?=$raw->res_code?>" ><?=$raw->plan_sqid?> - <?=$raw->lot_number?> </option>
                    <? }}?>
              
					
					</select> 
									