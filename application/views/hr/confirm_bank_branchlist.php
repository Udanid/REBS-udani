<script type="text/javascript">
	$(document).ready(function() {
		$("#bank_branch").chosen({
     		allow_single_deselect : true
    	});
	});
</script>

<select class="form-control" placeholder="Document Category" id="bank_branch" name="bank_branch" onChange="document.getElementById('bank_branch_name').value=this.options[this.selectedIndex].text;" disabled>
  <option value="">Branch List</option>
  <?php 
  foreach($branch_list as $raw){ ?>
  	<option value="<?php echo $raw->BRANCHCODE; ?>" <?php if($raw->BANKCODE == $bank_details['bank_code'] && $raw->BRANCHCODE == $bank_details['branch_code']){ echo 'selected="selected"';} ?> ><?php echo $raw->BRANCHNAME; ?></option>
  <?php
  } ?>
</select>
<input type="hidden" name="bank_branch_name" id="bank_branch_name" value="" />								