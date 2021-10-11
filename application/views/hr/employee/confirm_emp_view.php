<script>
	$(document).ready(function() {

  		//Date of birth picker
  		$("#dobDatepicker").datepicker({
    		minDate: new Date(1900,1-1,1), maxDate: '-18Y',
    		dateFormat: 'dd-MM-yy',
    		defaultDate: new Date(1970,1-1,1),
    		changeMonth: true,
    		changeYear: true,
    		yearRange: '-110:-18'
  		});

  		//datepicker for work experience and higher education
  		$('body').on('focus',".qualificationDatepicker, .weDatepicker", function(){
    		$(this).datepicker({
      			dateFormat: 'dd-MM-yy',
      			defaultDate: new Date(1970,1-1,1),
      			changeMonth: true,
      			changeYear: true,
      			yearRange: '-50' + ':' + new Date().getFullYear()
    		});
  		});

		$("#emp_joining_date").datepicker({
      		dateFormat: 'dd-MM-yy',
      		defaultDate: new Date(1970,1-1,1),
      		changeMonth: true,
      		changeYear: true,
      		yearRange: '-50' + ':' + new Date().getFullYear()
  		});

		$("#fuel_allowance_status").change(function(){
			var fuel_allowance_status = $('#fuel_allowance_status').val();
			if(fuel_allowance_status == "Y"){
				$("#vehicle_type_div").show();
				$("#initial_meter_reading_div").show();
				$("#fuel_allowance_maximum_limit_div").show();
			}else if(fuel_allowance_status == "N"){
				$("#vehicle_type_div").hide();
				$("#initial_meter_reading_div").hide();
				$("#fuel_allowance_maximum_limit_div").hide();
			}
		});

  		//when succes close button pressed
  		$(document).on('click','#close-btn', function(){
    		location.reload();
  		});

	});
</script>

<script>
	function loadbranchlist(itemcode){
		var code = itemcode.split("-")[0];
		if(code != ''){
			$("#bank_branch_load").load("<?php echo base_url();?>hr/hr_common/get_confirm_bank_branchlist/"+itemcode+"/<?php echo $employee_details['id'];?>");
		}
	}
	$(document).ready(function() {
		var bank_itemcode = document.getElementById("bank_code").value;
		loadbranchlist(bank_itemcode);
	});
</script>

<div id="page-wrapper">
  <div class="main-page">

	<div class="modal-content">
	  <div class="modal-body">
		<div class="row">
		  <!--block which displays the outcome message-->
		  <div id="messageBoard"></div>

		  <div class="col-xs-12 form-container">
			<form class="userRegForm form-horizontal" id="inputform" name="inputform" method="post" action="<?=base_url()?>hr/employee/employee_confirm_submit">
			  <input type="hidden" name="employeeMasterID" id="employeeMasterID" value="<?php echo $employee_details['id']; ?>" />
			  <?php
			  if($employee_details['status'] == "P"){ ?>
				  <div class="form-group">
					<div class="col-xs-10" style="float: right;">
					  <button type="submit" class="btn btn-primary btn-lg " id="load" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Processing Request" style="float: right;">Confirm Employee</button>
					</div>
				  </div>
			  <?php
			  } ?>
			  <div class="panel panel-default">
				<div class="panel-heading">Employee Personal Details</div>
				<div class="panel-body">

					 <!--Ticket No-2502 | Added By Uvini -->
				   <div class="form-group">
					<label for="inifull" class="control-label col-xs-2">Employee No</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="emp_no" name="emp_no" value="<?php echo $employee_details['emp_no']; ?>" placeholder="Employee No" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="title" class="control-label col-xs-2">Title</label>
					<div class="col-xs-5">
					  <select class="form-control" id="title" name="title" disabled>
						<?php
						foreach($title as $key=>$value){ ?>
							<option value="<?php echo $key; ?>" <?php if($key == $employee_details['title']){ echo 'selected="selected"';} ?> ><?php echo $value; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="initials" class="control-label col-xs-2">Initials</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="initials" name="initials" value="<?php echo $employee_details['initial']; ?>" placeholder="Initials (no dots or space)" readonly>
					</div>
				  </div>

				  <div class="form-group">
					<label for="surname" class="control-label col-xs-2">Surname</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $employee_details['surname']; ?>" placeholder="Surname" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="inifull" class="control-label col-xs-2">Initials in Full</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="inifull" name="inifull" value="<?php echo $employee_details['initials_full']; ?>" placeholder="Intials in Full" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="inifull" class="control-label col-xs-2">System Display Name</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="system_dis_name" name="system_dis_name" value="<?php echo $employee_details['display_name']; ?>" placeholder="System Display Name" readonly>
					</div>
				  </div>

				  <div class="form-group">
					<label for="nationality" class="control-label col-xs-2">Nationality</label>
					<div class="col-xs-5">
					  <select class="form-control" id="nationality" name="nationality" disabled>
						<?php
						foreach($countryList as $key=>$value){ ?>
							<option value="<?php echo $key; ?>" <?php if($key == $employee_details['nationality']){ echo 'selected="selected"';} ?>><?php echo $value['nationality']; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <!--marital status-->
				  <div class="form-group">
					<label for="martialStatus" class="control-label col-xs-2">Marital Status</label>
					<div class="col-xs-5">
					  <select class="form-control" id="martialStatus" name="martialStatus" disabled>
						<?php
						foreach($maritalStatus as $key=>$value){ ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>
					<!-- ticket no 2839 edit by dileep -->


				   <div class="form-group">
					<label for="gender" class="control-label col-xs-2">Gender</label>
					<div class="col-xs-5">
					  <select class="form-control" id="gender" name="gender" disabled>

							<option value="<?php echo $employee_details['gender']; ?>"><?php echo $employee_details['gender']; ?></option>

					  </select>
					</div>
				  </div>
				  <!-- end ticket 2839 -->

				  <div class="form-group">
					<label for="religion" class="control-label col-xs-2">Religion</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="religion" name="religion" value="<?php echo $employee_details['religion']; ?>" placeholder="Religion" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="race" class="control-label col-xs-2">Race</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="race" name="race" value="<?php echo $employee_details['race']; ?>" placeholder="Race" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="nic" class="control-label col-xs-2">NIC No.</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="nic" name="nic" value="<?php echo $employee_details['nic_no']; ?>" placeholder="NIC #" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="passport_no" class="control-label col-xs-2">Passport No.</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="passport_no" name="passport_no" value="<?php echo $employee_details['passport_no']; ?>" placeholder="Passport # (optional)" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="driving_lic" class="control-label col-xs-2">Driving Licence</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="driving_lic" name="driving_lic" value="<?php echo $employee_details['driving_license_no']; ?>" placeholder="Driving Licence (optional)" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="blood_group" class="control-label col-xs-2">Blood Group</label>
					<div class="col-xs-5">
					  <select class="form-control" id="blood_group" name="blood_group" disabled>
						<?php
						foreach($bloodGroup as $key=>$value){ ?>
							<option value="<?php echo $key; ?>" <?php if($key == $employee_details['blood_group']){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="dobDatepicker" class="control-label col-xs-2">Date of Birth</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="dobDatepicker" name="employeeDoB" value="<?php echo $employee_details['dob']; ?>" placeholder="DD/MM/YYYY" disabled />
					  <span class="add-on"><i class="icon-calendar"></i></span>
					</div>
				  </div>

				</div>
			  </div>

			  <!--Employement details-->
			  <div class="panel panel-default">
				<div class="panel-heading">Employment Details</div>
				<div class="panel-body">

				  <div class="form-group">
					<label for="employment_type" class="control-label col-xs-2">Employment Type</label>
					<div class="col-xs-5">
					  <select class="form-control" id="employment_type" name="employment_type" disabled>
					    <option value="">--Select Employment Type--</option>
						<?php
						$selected_name="";
						foreach($employment_types as $employment_type_row){ ?>
							<option value="<?php echo $employment_type_row->id; ?>" <?php if($employment_type_row->id == $employee_details['employment_type']){ echo 'selected="selected"';$selected_name=$employment_type_row->employment_type;} ?>><?php echo $employment_type_row->employment_type; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>
					<div class="form-group">
					<div id="contract_data" <? if($selected_name!="Contract"){echo "style=display:none";}?>>
						<div class="col-xs-5">
					<input type="text" class="form-control" id="contrac_start_date" name="contrac_start_date" value="<?=$employee_details['contrat_start_date']?>" placeholder="Start Date" readonly />
					</div>
					<div class="col-xs-5">
					<input type="text" class="form-control" id="contrac_end_date" name="contrac_end_date" value="<?=$employee_details['contrat_end_date']?>" placeholder="End Date" readonly />
				</div>
				</div>
				</div>
					<div class="form-group">
					<label for="employment_working_days" class="control-label col-xs-2">Employment Working Days Per Week</label>
					<div class="col-xs-5">
					  <select class="form-control" id="employment_working_days" name="employment_working_days" >
					  <option value="5" <?php if($employee_details['working_days_per_week']==5){ echo 'selected="selected"';} ?>>5 Days</option>
					 <option value="6" <?php if( $employee_details['working_days_per_week']==6){ echo 'selected="selected"';} ?>>6 Days</option>

                      <option value="7" <?php if( $employee_details['working_days_per_week']==7){ echo 'selected="selected"';} ?>>7 Days</option>

					  </select>
					</div>
					</div>

				  <div class="form-group">
					<label for="emp_joining_date" class="control-label col-xs-2">Joining Date</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="emp_joining_date" name="emp_joining_date" value="<?php echo $employee_details['joining_date']; ?>" placeholder="DD/MM/YYYY" disabled />
					  <span class="add-on"><i class="icon-calendar"></i></span>
					</div>
				  </div>

				  <div class="form-group">
					<label for="emp_resignation_date" class="control-label col-xs-2">Resignation Date</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="emp_resignation_date" name="emp_resignation_date" value="<?php echo $employee_details['resignation_date']; ?>" placeholder="DD/MM/YYYY" disabled />
					  <span class="add-on"><i class="icon-calendar"></i></span>
					</div>
				  </div>

				  <div class="form-group">
					<label for="duration" class="control-label col-xs-2">Employment Duration/Probation (Months)</label>
					<div class="col-xs-5">
					  <input type="number" class="form-control" id="duration" name="duration" value="<?php echo $employee_details['duration']; ?>" placeholder="Duration (Months)" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="epf_no" class="control-label col-xs-2">EPF No.</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="epf_no" name="epf_no" value="<?php echo $employee_details['epf_no']; ?>" placeholder="EPF #" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="designation" class="control-label col-xs-2">Designation</label>
					<div class="col-xs-5">
					  <select class="form-control" id="designation" name="designation" disabled>
					    <option value="">--Select Designation--</option>
						<?php
						foreach($designations as $designation_row){ ?>
							<option value="<?php echo $designation_row->id; ?>" <?php if($designation_row->id == $employee_details['designation']){ echo 'selected="selected"';} ?>><?php echo $designation_row->designation; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="branch" class="control-label col-xs-2">Branch</label>
					<div class="col-xs-5">
					  <select class="form-control" id="branch" name="branch" disabled>
					  <option value="">--Select Branch--</option>
						<?php
						foreach($branches as $branch_row){ ?>
							<option value="<?php echo $branch_row->branch_code; ?>" <?php if($branch_row->branch_code == $employee_details['branch']){ echo 'selected="selected"';} ?>><?php echo $branch_row->branch_name; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="division" class="control-label col-xs-2">Division</label>
					<div class="col-xs-5">
					  <select class="form-control" id="division" name="division" disabled>
					    <option value="">--Select Division--</option>
						<?php
						foreach($divisions as $division_row){ ?>
							<option value="<?php echo $division_row->id; ?>" <?php if($division_row->id == $employee_details['division']){ echo 'selected="selected"';} ?>><?php echo $division_row->division_name; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="leave_category" class="control-label col-xs-2">Leave Category</label>
					<div class="col-xs-5">
					  <select class="form-control" id="leave_category" name="leave_category" disabled>
					    <option value="">--Select Leave Category--</option>
						<?php
						foreach($leave_category_list as $leave_category_row){ ?>
							<option value="<?php echo $leave_category_row->id; ?>"  <?php if($leave_category_row->id == $employee_details['leave_category']){ echo 'selected="selected"';} ?> ><?php echo $leave_category_row->leave_category_name; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="maternity_leave" class="control-label col-xs-2">Maternity Leave</label>
					<div class="col-xs-5">
					  <select class="form-control" id="maternity_leave" name="maternity_leave" disabled>
						<option value="Y" <?php if($employee_details['maternity_leave'] == "Y"){ echo 'selected="selected"';} ?> >Entitled</option>
						<option value="N" <?php if($employee_details['maternity_leave'] == "N"){ echo 'selected="selected"';} ?> >Not Entitled</option>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="immediate_manager_1" class="control-label col-xs-2">Immediate Manager 1</label>
					<div class="col-xs-5">
					  <select class="form-control" id="immediate_manager_1" name="immediate_manager_1" disabled>
					    <option value="">--select immediate manager--</option>
						<?php
						foreach($employee_list as $employee_list_row){ ?>
							<option value="<?php echo $employee_list_row->id; ?>" <?php if($employee_list_row->id == $employee_details['immediate_manager_1']){ echo 'selected="selected"';} ?> > <?php echo $employee_list_row->epf_no.' - '.$employee_list_row->initial.' '.$employee_list_row->surname; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="immediate_manager_2" class="control-label col-xs-2">Immediate Manager 2</label>
					<div class="col-xs-5">
					  <select class="form-control" id="immediate_manager_2" name="immediate_manager_2" disabled>
					    <option value="">--select immediate manager--</option>
						<?php
						foreach($employee_list as $employee_list_row){ ?>
							<option value="<?php echo $employee_list_row->id; ?>" <?php if($employee_list_row->id == $employee_details['immediate_manager_2']){ echo 'selected="selected"';} ?> > <?php echo $employee_list_row->epf_no.' - '.$employee_list_row->initial.' '.$employee_list_row->surname; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="attendance_type" class="control-label col-xs-2">Attendance Type</label>
					<div class="col-xs-5">
					  <select class="form-control" id="attendance_type" name="attendance_type" disabled>
						<option value="S" <?php if($employee_details['attendance_type'] == "S"){ echo 'selected="selected"';} ?> >System Login</option>
						<option value="F" <?php if($employee_details['attendance_type'] == "F"){ echo 'selected="selected"';} ?> >Finger Print</option>
						<option value="N" <?php if($employee_details['attendance_type'] == "N"){ echo 'selected="selected"';} ?>>Not Required</option>
						</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="fuel_allowance_status" class="control-label col-xs-2">Fuel Allowance</label>
					<div class="col-xs-5">
					  <select class="form-control" id="fuel_allowance_status" name="fuel_allowance_status" disabled>
						<option value="Y" <?php if($employee_details['fuel_allowance_status'] == "Y"){ echo 'selected="selected"';} ?> >Entitled</option>
						<option value="N" <?php if($employee_details['fuel_allowance_status'] == "N"){ echo 'selected="selected"';} ?> >Not Entitled</option>
					  </select>
					</div>
				  </div>

				  <div class="form-group" name="vehicle_type_div" id="vehicle_type_div" <?php if($employee_details['fuel_allowance_status'] == "N"){ echo "style='display: none'";} ?> >
					<label for="vehicle_type" class="control-label col-xs-2">Vehicle Type</label>
					<div class="col-xs-5">
					  <select class="form-control" id="vehicle_type" name="vehicle_type" disabled>
						<?php
						foreach($fuel_allowance_vehicle_type_list as $vehicle_type_row){ ?>
							<option value=<?php echo $vehicle_type_row->id; ?> <?php if($employee_details['vehicle_type'] == $vehicle_type_row->id){ echo 'selected="selected"';} ?> ><?php echo $vehicle_type_row->vehicle_type; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group" name="initial_meter_reading_div" id="initial_meter_reading_div" <?php if($employee_details['fuel_allowance_status'] == "N"){ echo "style='display: none'";} ?>>
					<label for="initial_meter_reading" class="control-label col-xs-2">Initial Meter Reading</label>
					<div class="col-xs-5">
					  <input type="number" class="form-control" id="initial_meter_reading" name="initial_meter_reading" value="<?php echo $employee_details['initial_meter_reading']; ?>" placeholder="Initial Meter Reading" disabled>
					</div>
				  </div>

				  <div class="form-group" name="fuel_allowance_maximum_limit_div" id="fuel_allowance_maximum_limit_div" <?php if($employee_details['fuel_allowance_status'] == "N"){ echo "style='display: none'";} ?>>
					<label for="fuel_allowance_maximum_limit" class="control-label col-xs-2">Fuel Allowance Maximum Limit (Rs)</label>
					<div class="col-xs-5">
					  <input type="number" class="form-control" id="fuel_allowance_maximum_limit" name="fuel_allowance_maximum_limit" value="<?php echo $employee_details['fuel_allowance_maximum_limit']; ?>" placeholder="Fuel Allowance Maximum Limit" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="user_privilege" class="control-label col-xs-2">User Privilege Level</label>
					<div class="col-xs-5">
					  <select class="form-control" id="user_privilege" name="user_privilege" disabled>
					    <option value="">--Select User Privilege Level--</option>
						<?php
						foreach($user_privilege_list as $user_privilege_row){
						  if($user_privilege_row->usertype != "admin" && $user_privilege_row->usertype != "re_manager"){ ?>
							<option value="<?php echo $user_privilege_row->usertype_id; ?>" <?php if($user_privilege_row->usertype_id == $employee_details['user_privilege']){ echo 'selected="selected"'; } ?> ><?php echo $user_privilege_row->usertype; ?></option>
						  <?php
						  }
						} ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="app_permission" class="control-label col-xs-2">Android App Permission</label>
					<div class="col-xs-5">
					  <select class="form-control" id="app_permission" name="app_permission" disabled>
					    <option value="">--Select Permission--</option>
						<option value="1" <?if($employee_details['app_permission']=='1'){?> selected <?}?>>Allow</option>
						<option value="0" <?if($employee_details['app_permission']=='0'){?> selected <?}?>>Disallow</option>
					  </select>
					</div>
				  </div>

					<div class="form-group">
						<label for="emp_mobile" class="control-label col-xs-2">Phone Charges</label>
						<div class="col-xs-5">
						  <input type="number" step="0.01" class="form-control" id="emp_phone_charges" name="emp_phone_charges" value="<?php echo $employee_details['phone_bill']; ?>" placeholder="0.00" readonly>
						</div>
					  </div>

				</div>
			  </div>

			  <!--Contact information-->
			  <div class="panel panel-default">
				<div class="panel-heading">Contact information</div>
				<div class="panel-body">

				  <!--telephone #-->
				  <div class="form-group">
					<label for="emp_mobile" class="control-label col-xs-2">Personal Contact No.</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="emp_mobile" name="emp_mobile" value="<?php echo $employee_details['tel_mob']; ?>" placeholder="Mobile #" disabled>
					</div>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="emp_tel" name="emp_tel" value="<?php echo $employee_details['tel_home']; ?>" placeholder="Telephone # (optional)" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="userEmail" class="control-label col-xs-2">Personal Email</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="userEmail" name="userEmail" value="<?php echo $employee_details['email']; ?>" placeholder="Email" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="emp_office_mobile" class="control-label col-xs-2">Office Contact No.</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="emp_office_mobile" name="emp_office_mobile" value="<?php echo $employee_details['office_mobile']; ?>" placeholder="Mobile #" disabled>
					</div>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="emp_office_tel" name="emp_office_tel" value="<?php echo $employee_details['office_tel']; ?>" placeholder="Telephone # (optional)" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="office_email" class="control-label col-xs-2">Office Email</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="office_email" name="office_email" value="<?php echo $employee_details['office_email']; ?>" placeholder="Email" disabled>
					</div>
				  </div>

				  <!--Address-->
				  <div class="form-group">
					<label for="address1" class="control-label col-xs-2">Address</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $employee_details['addr1']; ?>" placeholder="Address line 1 #" disabled>
					</div>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $employee_details['addr2']; ?>"  placeholder="Address line 2 (optional)" disabled>
					</div>
				  </div>

				  <!--town-->
				  <div class="form-group">
					<label for="town" class="control-label col-xs-2">Town</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="town" name="town" value="<?php echo $employee_details['town']; ?>" placeholder="Town" disabled>
					</div>
				  </div>

				  <!--Province-->
				  <div class="form-group">
					<label for="province" class="control-label col-xs-2">Province</label>
					<div class="col-xs-5">
					  <select class="form-control" id="province" name="province" disabled>
						<?php
						foreach($province as $key=>$value){ ?>
							<option value="<?php echo $key; ?>" <?php if($key == $employee_details['province']){ echo 'selected="selected"';} ?>><?php echo $value; ?></option>
						<?php
						} ?>
					  </select>
					</div>
				  </div>
				</div>
			  </div>

			  <!--Emergency conatact persons-->
			  <div class="panel panel-default">
				<div class="panel-heading">Emergency Contact</div>
				<div class="panel-body">

				<? $person_name='';
	$relationship='';
	$tel_mobile='';
	$tel_home='';
	$add_1='';
	$addr_2='';
	$town='';
	if($emergnecy_contact_details){
	$person_name=$emergnecy_contact_details['person_name'];
	$relationship=$emergnecy_contact_details['relationship'];
	$tel_mobile=$emergnecy_contact_details['tel_mobile'];
	$tel_home=$emergnecy_contact_details['tel_home'];
	$add_1=$emergnecy_contact_details['add_1'];
	$addr_2=$emergnecy_contact_details['addr_2'];
	$town=$emergnecy_contact_details['town'];
	}?>
				  <div class="form-group">
					<label for="name_emg_person" class="control-label col-xs-2">Contact person</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="name_emg_person" name="name_emg_person" value="<?php echo $person_name?>" placeholder="Contact Person Name">
					</div>
				  </div>

				  <div class="form-group">
					<label for="relationship_emg" class="control-label col-xs-2">Relationship</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="relationship_emg" name="relationship_emg" value="<?php echo $relationship ?>" placeholder="Relationship Ex:wife">
					</div>
				  </div>

				  <div class="form-group">
					<label for="contact_mob_emg" class="control-label col-xs-2">Contact No.</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="contact_mob_emg" name="contact_mob_emg" value="<?php echo $tel_mobile ?>" placeholder="Mobile #">
					</div>

					<div class="col-xs-5">
					  <input type="text" class="form-control" id="contact_tel_emg" name="contact_tel_emg" value="<?php echo $tel_home ?>" placeholder="Telephone #">
					</div>
				  </div>

				  <div class="form-group">
					<label for="addr1_emg" class="control-label col-xs-2">Address</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="addr1_emg" name="addr1_emg" value="<?php echo $add_1 ?>" placeholder="Address line 1">
					</div>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="addr2_emg" name="addr2_emg" value="<?php echo $addr_2; ?>" placeholder="Address line 2 (optional)">
					</div>
				  </div>

				  <div class="form-group">
					<label for="town_emg" class="control-label col-xs-2">Town</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="town_emg" name="town_emg" value="<?php echo $town; ?>" placeholder="Town">
					</div>
				  </div>

				</div>
			  </div>
<? $name_in_account='';
	$bank_code='';
	$account_no='';
	$account_type='';

	if($bank_details){
	$name_in_account=$bank_details['name_in_account'];
	$bank_code=$bank_details['bank_code'];
	$account_no=$bank_details['account_no'];
	$account_type=$bank_details['account_type'];

	}?>
			  <!--Banking information-->
			  <div class="panel panel-default">
				<div class="panel-heading">Banking information</div>
				<div class="panel-body">
				  <div class="form-group">
					<label for="bank_given_name" class="control-label col-xs-2">Given name</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="bank_given_name" name="bank_given_name" value="<?php echo $name_in_account; ?>" placeholder="Name with initials">
					</div>
				  </div>

				  <div class="form-group">
					<label for="bank_code" class="control-label col-xs-2">Bank name</label>
					<div class="col-xs-5">
					  <select class="form-control" id="bank_code" name="bank_code" onChange="loadbranchlist(this.value); document.getElementById('bank_name').value=this.options[this.selectedIndex].text;">
					    <option value="">Bank</option>
						<?php
						foreach($bank_list as $bank_list_row){ ?>
							<option value="<?php echo $bank_list_row->BANKCODE; ?>" <?php if($bank_list_row->BANKCODE == $bank_code){ echo 'selected="selected"';} ?>><?php echo $bank_list_row->BANKNAME; ?></option>
						<?php
						} ?>
					  </select>
					</div>
					<input type="hidden" name="bank_name" id="bank_name" value="" />
				  </div>

				  <div class="form-group">
					<label for="branch_name" class="control-label col-xs-2">Branch</label>
					<div class="col-xs-5" id="bank_branch_load">
					  <select name="bank_branch" id="bank_branch" class="form-control" placeholder="Bank"  disabled="disabled">
						<option value="">Branch</option>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="account_no" class="control-label col-xs-2">Account No.</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="account_no" name="account_no" value="<?php echo $account_no; ?>" placeholder="Account #" disabled="disabled">
					</div>
				  </div>

				  <div class="form-group">
					<label for="account_type" class="control-label col-xs-2">Account type</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="account_type" name="account_type" value="<?php echo $account_type; ?>" placeholder="Account type" disabled="disabled">
					</div>
				  </div>

				</div>
			  </div>
				<?
				$insurance_company=Null;
				$insurance_schame=Null;
				$insurance_policy=Null;
				if(isset($insurance_details['company_name'])){
					$insurance_company=$insurance_details['company_name'];
				}
				if(isset($insurance_details['shcheme_name'])){
					$insurance_schame=$insurance_details['shcheme_name'];
				}
				if(isset($insurance_details['policy_no']))
				{
					$insurance_policy=$insurance_details['policy_no'];
				}


				?>
			  <!--Insurance information-->
			  <div class="panel panel-default">
				<div class="panel-heading">Insurance</div>
				<div class="panel-body">
				  <div class="form-group">
					<label for="insCompany" class="control-label col-xs-2">Company Name</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="insCompany" name="insCompany" value="<?php echo $insurance_company; ?>" placeholder="Name of insurance company" disabled="disabled">
					</div>
				  </div>

				  <div class="form-group">
					<label for="insScheme" class="control-label col-xs-2">Scheme Name</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="insScheme" name="insScheme" value="<?php echo $insurance_schame; ?>" placeholder="Insurance scheme" disabled="disabled">
					</div>
				  </div>

				  <div class="form-group">
					<label for="policynumber" class="control-label col-xs-2">Insurance Policy Number</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="policynumber" name="policynumber" value="<?php echo $insurance_policy; ?>" placeholder="Insurance policy" disabled="disabled">
					</div>
				  </div>
				</div>
			  </div>

			  <div class="panel panel-default">
				<div class="panel-heading">Qualifications</div>
				<div class="panel-body">

				  <!--O/L header-->
				  <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
					<span style="font-size: 16px; background-color: #F3F5F6; padding: 0 10px;">
					  GCE Ordinary Level (O/L) <!--Padding is optional-->
					</span>
				  </div>

				  <div class="alert alert-info">
					<strong>Notice - </strong> It is NOT mandatory to add all the O/L subjects, however incomplete paires (i.e empty subjects or grades) or providing only the school name without O/L results will be invalidated.
				  </div>
<? $school='';
if($ol_details)
{
	$school=$ol_details['school'];
}
?>
				  <!--*********O/L FIELDS**********-->
				  <div class="form-group ol_input_fields_wrap">
					<div class="emp_rows col-xs-12">
					  <div class="col-xs-4">
						<button class="add_ol_subject_button btn btn-success">(+) Add O/L Subject</button>
					  </div>
					  <div class="col-xs-4">
						<input type="text" class="form-control" name="olschoolname" value="<?php echo $school ?>" placeholder="School name" disabled="disabled">
					  </div>
					</div>

					<?php
					$ol_counter = 0;

					if(isset($ol_results)){
						foreach($ol_results as $ol_result_row){ ?>
							<div class="emp_rows col-xs-12">
							  <div class="col-xs-4">
								<input type="text" class="form-control" name="ordinary_level[<?php echo $ol_counter; ?>][subject]" value="<?php echo $ol_result_row['subject']; ?>" placeholder="O/L Subject" disabled="disabled">
							  </div>
							  <div class="col-xs-4">
								<input type="text" class="form-control" name="ordinary_level[<?php echo $ol_counter; ?>][grade]" value="<?php echo $ol_result_row['grade']; ?>" placeholder="Grade" disabled="disabled">
							  </div>
							</div>
							<?php
							$ol_counter++;
						}
					}else{ ?>
						<div class="emp_rows col-xs-12">
						  <div class="col-xs-4">
							<input type="text" class="form-control" name="ordinary_level[0][subject]" value="" placeholder="O/L Subject" disabled="disabled">
						  </div>
						  <div class="col-xs-4">
							<input type="text" class="form-control" name="ordinary_level[0][grade]" value="" placeholder="Grade" disabled="disabled">
						  </div>
						</div>
					<?php
					} ?>
				  </div>

				  <!--*********A/L FIELDS**********-->
				  <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
					<span style="font-size: 16px; background-color: #F3F5F6; padding: 0 10px;">
					  GCE Advanced Level (A/L) <!--Padding is optional-->
					</span>
				  </div>
<? $school='';
if($al_details)
{
	$school=$al_details['school'];
}
?>
				  <div class="alert alert-info">
					<strong>Notice -</strong> It is NOT mandatory to add all the A/L subjects, however incomplete paires (i.e empty subjects or grades) or providing only the school name without A/L results will be invalidated.
				  </div>

				  <div class="form-group al_input_fields_wrap">
					<div class="emp_rows col-xs-12">
					  <div class="col-xs-4">
						<button class="add_al_subject_button btn btn-success">(+) Add A/L Subject</button>
					  </div>
					  <div class="col-xs-4">
						<input type="text" class="form-control" value="<?php echo $school; ?>" placeholder="School name" name="alschoolname" disabled="disabled">
					  </div>
					</div>

					<?php
					$al_counter = 0;
					if(isset($al_results) ){
						foreach($al_results as $al_result_row){ ?>
							<div class="emp_rows col-xs-12">
							  <div class="col-xs-4">
								<input type="text" class="form-control" name="advance_level[<?php echo $al_counter; ?>][subject]" value="<?php echo $al_result_row['subject']; ?>" placeholder="A/L Subject" disabled="disabled">
							  </div>
							  <div class="col-xs-4">
								<input type="text" class="form-control" name="advance_level[<?php echo $al_counter; ?>][grade]" value="<?php echo $al_result_row['grade']; ?>" placeholder="Grade" disabled="disabled">
							  </div>
							</div>
							<?php
							$al_counter++;
						}
					}else{ ?>
						<div class="emp_rows col-xs-12">
						  <div class="col-xs-4">
							<input type="text" class="form-control" name="advance_level[0][subject]" value="" placeholder="A/L Subject" disabled="disabled">
						  </div>
						  <div class="col-xs-4">
							<input type="text" class="form-control" name="advance_level[0][grade]" value="" placeholder="Grade" disabled="disabled">
						  </div>
						</div>
					<?php
					} ?>
				  </div>

				  <!--******** HIGHER EDUCATION FIELDS **********-->
				  <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
					<span style="font-size: 16px; background-color: #F3F5F6; padding: 0 10px;">
					  Higher Education <!--Padding is optional-->
					</span>
				  </div>

				  <div class="alert alert-info">
					<strong>Notice - </strong> All the required fields (Qualification name, Institute name, Grade, and From and To dates) of each Higeher Education must be filled, otherwise your form will be invalidated.
				  </div>

				  <div class="form-group hq_input_fields_wrap">
					<div class="emp_rows col-xs-12">
					  <div class="col-xs-12">
						<button class="add_hq_button btn btn-success">(+) Add Qualification</button>
					  </div>
					</div>

				   <?php
					$hq_counter = 0;
					if(isset($higher_education_details)){
						foreach($higher_education_details as $higher_education_details_row){ ?>
							<div class="emp_rows col-xs-12">
							  <div class="emp_rows col-xs-12">
								<div class="col-xs-8">
								  <input type="text" class="form-control" name="higher_education[<?php echo $hq_counter; ?>][name]" value="<?php echo $higher_education_details_row['name']; ?>" placeholder="Qualification / certification name" disabled="disabled"/>
								</div>
							  </div>
							  <div class="emp_rows col-xs-12">
								<div class="col-xs-4">
								  <input type="text" class="form-control" name="higher_education[<?php echo $hq_counter; ?>][institute]" value="<?php echo $higher_education_details_row['institute']; ?>" placeholder="Institute name" disabled="disabled" />
								</div>
								<div class="col-xs-4">
								  <input type="text" class="form-control" name="higher_education[<?php echo $hq_counter; ?>][grade]" value="<?php echo $higher_education_details_row['grade']; ?>" placeholder="Grade/Result"  disabled="disabled"/>
								</div>
							  </div>
							  <div class="emp_rows col-xs-12">
								<div class="col-xs-4">
								  <input type="text" readonly class="form-control qualificationDatepicker" name="higher_education[<?php echo $hq_counter; ?>][from]" value="<?php echo $higher_education_details_row['from']; ?>" placeholder="From" disabled="disabled"/>
								</div>
								<div class="col-xs-4">
								  <input type="text" readonly class="form-control qualificationDatepicker" name="higher_education[<?php echo $hq_counter; ?>][to]" value="<?php echo $higher_education_details_row['to']; ?>" placeholder="To"disabled="disabled" />
								</div>
							  </div>
							  <div class="emp_rows col-xs-12">
								<div class="col-xs-8">
								  <textarea style="resize:none" class="form-control" rows="5" name="higher_education[<?php echo $hq_counter; ?>][additionalInfo]" placeholder="Additional Info" disabled="disabled"><?php echo $higher_education_details_row['additionalInfo']; ?></textarea>
								</div>
							  </div>
							  <div class="emp_rows col-xs-12">
								<hr/>
							  </div>
							</div>
							<?php
							$hq_counter++;
						}
					}else{ ?>
						<div class="emp_rows col-xs-12">
						  <div class="emp_rows col-xs-12">
							<div class="col-xs-8">
							  <input type="text" class="form-control" name="higher_education[0][name]" value="" placeholder="Qualification / certification name"  disabled="disabled"/>
							</div>
						  </div>
						  <div class="emp_rows col-xs-12">
							<div class="col-xs-4">
							  <input type="text" class="form-control" name="higher_education[0][institute]" value="" placeholder="Institute name" disabled="disabled"/>
							</div>
							<div class="col-xs-4">
							  <input type="text" class="form-control" name="higher_education[0][grade]" value="" placeholder="Grade/Result" disabled="disabled" />
							</div>
						  </div>
						  <div class="emp_rows col-xs-12">
							<div class="col-xs-4">
							  <input type="text" readonly class="form-control qualificationDatepicker" name="higher_education[0][from]" value="" placeholder="From" disabled="disabled"/>
							</div>
							<div class="col-xs-4">
							  <input type="text" readonly class="form-control qualificationDatepicker" name="higher_education[0][to]" value="" placeholder="To" disabled="disabled"/>
							</div>
						  </div>
						  <div class="emp_rows col-xs-12">
							<div class="col-xs-8">
							  <textarea style="resize:none" class="form-control" rows="5" name="higher_education[0][additionalInfo]" placeholder="Additional Info" disabled="disabled"></textarea>
							</div>
						  </div>
						  <div class="emp_rows col-xs-12">
							<hr/>
						  </div>
						</div>
					<?php
					} ?>
				  </div>

				  <!--******** WORK EXPERIENCE FIELDS **********-->
				  <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
					<span style="font-size: 16px; background-color: #F3F5F6; padding: 0 10px;">
					  Work Experience<!--Padding is optional-->
					</span>
				  </div>
				  <div class="form-group xp_input_fields_wrap">

					<div class="emp_rows col-xs-12">
					  <?php
					  $work_exp_counter = 0;
					  if(isset($work_experience_details) ){
						foreach($work_experience_details as $work_experience_details_row){ ?>
							<div class="emp_rows col-xs-12">
							  <div class="col-xs-8">
								<input type="text" class="form-control" name="work_experience[<?php echo $work_exp_counter; ?>][job]" value="<?php echo $work_experience_details_row['job']; ?>" placeholder="Job Title" disabled/>
							  </div>
							</div>
							<div class="emp_rows col-xs-12">
							  <div class="col-xs-8">
								<input type="text" class="form-control" name="work_experience[<?php echo $work_exp_counter; ?>][company]" value="<?php echo $work_experience_details_row['company']; ?>" placeholder="Company" disabled/>
							  </div>
							</div>
							<div class="emp_rows col-xs-12">
							  <div class="col-xs-8">
								<input type="text" class="form-control" name="work_experience[<?php echo $work_exp_counter; ?>][location]" value="<?php echo $work_experience_details_row['location']; ?>" placeholder="Location" disabled/>
							  </div>
							</div>
							<div class="emp_rows col-xs-12">
							  <div class="col-xs-4">
								<input type="text" readonly class="form-control weDatepicker" name="work_experience[<?php echo $work_exp_counter; ?>][from]" value="<?php echo $work_experience_details_row['from']; ?>" placeholder="From" disabled/>
							  </div>
							  <div class="col-xs-4">
								<input type="text" readonly class="form-control weDatepicker" name="work_experience[<?php echo $work_exp_counter; ?>][to]" value="<?php echo $work_experience_details_row['to']; ?>" placeholder="To" disabled/>
							  </div>
							</div>
							<div class="emp_rows col-xs-12">
							  <div class="col-xs-8">
								<textarea style="resize:none" class="form-control" rows="5" name="work_experience[<?php echo $work_exp_counter; ?>][additionalInfo]" placeholder="Additional Info" disabled><?php echo $work_experience_details_row['additionalInfo']; ?></textarea>
							  </div>
							</div>
							<div class="emp_rows col-xs-12">
							  <hr/>
							</div>
							<?php
							$work_exp_counter++;
						}
					  }else{ ?>
						<div class="emp_rows col-xs-12">
						  <div class="col-xs-8">
							<input type="text" class="form-control" name="work_experience[0][job]" value="" placeholder="Job Title" disabled/>
						  </div>
						</div>
						<div class="emp_rows col-xs-12">
						  <div class="col-xs-8">
							<input type="text" class="form-control" name="work_experience[0][company]" value="" placeholder="Company" disabled/>
						  </div>
						</div>
						<div class="emp_rows col-xs-12">
						  <div class="col-xs-8">
							<input type="text" class="form-control" name="work_experience[0][location]" value="" placeholder="Location" disabled/>
						  </div>
						</div>
						<div class="emp_rows col-xs-12">
						  <div class="col-xs-4">
							<input type="text" readonly class="form-control weDatepicker" name="work_experience[0][from]" value="" placeholder="From" disabled/>
						  </div>
						  <div class="col-xs-4">
							<input type="text" readonly class="form-control weDatepicker" name="work_experience[0][to]" value="" placeholder="To" disabled/>
						  </div>
						</div>
						<div class="emp_rows col-xs-12">
						  <div class="col-xs-8">
							<textarea style="resize:none" class="form-control" rows="5" name="work_experience[0][additionalInfo]" placeholder="Additional Info" disabled></textarea>
						  </div>
						</div>
						<div class="emp_rows col-xs-12">
						  <hr/>
						</div>
					  <?php
					  } ?>
					</div>
				  </div>

				</div>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	</div>

  </div>
</div>

<script>
	$(document).ready(function() {

		/** ADD DYNAMIC FIELDS FOR O/L **/
  		var ol_max_subjects = 10; //maximum input boxes allowed
  		var ol_wrapper = $(".ol_input_fields_wrap"); //Fields wrapper
  		var ol_add_button = $(".add_ol_subject_button"); //Add button ID

  		var olCount = <?php echo $ol_counter; ?>; //initlal text box count
  		$(ol_add_button).click(function(e){ //on add input button click
    		e.preventDefault();
    		if(olCount < ol_max_subjects){
				olCount++;
      			$(ol_wrapper).append('<div class="emp_rows col-xs-12">\
      			<div class="col-xs-4">\
      			<input type="text" class="form-control" name="ordinary_level['+olCount+'][subject]" placeholder="O/L Subject" />\
      			</div>\
      			<div class="col-xs-4">\
      			<input type="text" class="form-control" name="ordinary_level['+olCount+'][grade]" placeholder="O/L Grade" />\
      			</div>\
      			<div class="col-xs-4">\
      			<a href="#" class="remove_field btn btn-danger">Remove</a>\
      			</div>\
      			</div>'); //add input box
    		}
  		});

		$(ol_wrapper).on("click",".remove_field", function(e){ //user click on remove text
    		e.preventDefault();
    		$(this).parent('div').parent('div').remove(); olCount--;
  		})


		/** ADD DYNAMIC FIELDS FOR A/L **/
  		var al_max_subjects = 5; //maximum input boxes allowed
  		var al_wrapper = $(".al_input_fields_wrap"); //Fields wrapper
  		var al_add_button = $(".add_al_subject_button"); //Add button ID
  		var alCount = <?php echo $al_counter; ?>; //initlal text box count

  		$(al_add_button).click(function(e){ //on add input button click
    		e.preventDefault();
    		if(alCount < al_max_subjects){
				alCount++; //text box increment
				$(al_wrapper).append('<div class="emp_rows col-xs-12">\
      			<div class="col-xs-4">\
      			<input type="text" class="form-control" name="advance_level['+alCount+'][subject]" placeholder="A/L Subject" />\
      			</div>\
      			<div class="col-xs-4">\
      			<input type="text" class="form-control" name="advance_level['+alCount+'][grade]" placeholder="A/L Grade" />\
      			</div>\
      			<div class="col-xs-4">\
      			<a href="#" class="remove_field btn btn-danger">Remove</a>\
      			</div>\
      			</div>'); //add input box
    		}
  		});

  		$(al_wrapper).on("click",".remove_field", function(e){ //user click on remove text
    		e.preventDefault();
    		$(this).parent('div').parent('div').remove(); alCount--;
  		})


  		/** ADD DYNAMIC FIELDS FOR EDUCATION QUALIFICATIONS **/
  		var hq_max_subjects = 15; //maximum input boxes allowed
		var hq_wrapper = $(".hq_input_fields_wrap"); //Fields wrapper
  		var hq_add_button = $(".add_hq_button"); //Add button ID
  		var hqCount = <?php echo $hq_counter; ?>; //initlal text box count

  		$(hq_add_button).click(function(e){ //on add input button click
    		e.preventDefault();
    		if(hqCount < hq_max_subjects){
				hqCount++; //increment
				$(hq_wrapper).append('<div class="emp_rows col-xs-12">\
				<div class="emp_rows col-xs-12">\
				<div class="col-xs-8">\
				<input type="text" class="form-control" name="higher_education['+hqCount+'][name]" placeholder="Qualification / certification name" />\
				</div>\
				</div>\
				<div class="emp_rows col-xs-12">\
				<div class="col-xs-4">\
				<input type="text" class="form-control" name="higher_education['+hqCount+'][institute]" placeholder="Institute name" />\
				</div>\
				<div class="col-xs-4">\
				<input type="text" class="form-control" name="higher_education['+hqCount+'][grade]" placeholder="Grade" />\
				</div>\
				</div>\
				<div class="emp_rows col-xs-12">\
				<div class="col-xs-4">\
				<input type="text" class="form-control qualificationDatepicker" readonly name="higher_education['+hqCount+'][from]" placeholder="From" />\
				</div>\
				<div class="col-xs-4">\
				<input type="text" class="form-control qualificationDatepicker" readonly name="higher_education['+hqCount+'][to]" placeholder="To" />\
				</div>\
				</div>\
				<div class="emp_rows col-xs-12">\
				<div class="col-xs-8">\
				<textarea style="resize:none" class="form-control" rows="5" name="higher_education['+hqCount+'][additionalInfo]" placeholder="Additional Info"></textarea>\
				</div>\
				</div>\
				<div class="emp_rows col-xs-12">\
				<div class="col-xs-4">\
				<a href="#" class="remove_field btn btn-danger">Remove</a>\
				</div>\
				</div>\
				</div>'); //add input box
    		}
 	 	});

  		$(hq_wrapper).on("click",".remove_field", function(e){ //user click on remove text
    		e.preventDefault();
    		$(this).parent('div').parent('div').parent('div').remove(); hqCount--;
  		})


  		/** ADD DYNAMIC FIELDS FOR WORK EXPERIENCE **/
  		var xp_max = 15; //maximum input boxes allowed
  		var xp_wrapper = $(".xp_input_fields_wrap"); //Fields wrapper
  		var xp_add_button = $(".add_xp_button"); //Add button ID
  		var xpCount = <?php echo $work_exp_counter; ?> //initlal text box count

  		$(xp_add_button).click(function(e){ //on add input button click
    		e.preventDefault();
    		if(xpCount < xp_max){
      			xpCount++; //text box increment
      			$(xp_wrapper).append('<div class="emp_rows col-xs-12">\
      			<div class="emp_rows col-xs-12">\
      			<div class="col-xs-8">\
      			<input type="text" class="form-control" name="work_experience['+xpCount+'][job]" placeholder="Job Title" />\
      			</div>\
      			</div>\
      			<div class="emp_rows col-xs-12">\
      			<div class="col-xs-8">\
      			<input type="text" class="form-control" name="work_experience['+xpCount+'][company]" placeholder="Company" />\
      			</div>\
      			</div>\
      			<div class="emp_rows col-xs-12">\
      			<div class="col-xs-8">\
      			<input type="text" class="form-control" name="work_experience['+xpCount+'][location]" placeholder="Location" />\
      			</div>\
      			</div>\
      			<div class="emp_rows col-xs-12">\
      			<div class="col-xs-4">\
      			<input type="text" class="form-control weDatepicker" readonly name="work_experience['+xpCount+'][from]" placeholder="From" />\
				</div>\
      			<div class="col-xs-4">\
      			<input type="text" class="form-control weDatepicker" readonly name="work_experience['+xpCount+'][to]" placeholder="To" />\
      			</div>\
      			</div>\
      			<div class="emp_rows col-xs-12">\
				<div class="col-xs-8">\
      			<textarea style="resize:none" class="form-control" rows="5" name="work_experience['+xpCount+'][additionalInfo]" placeholder="Additional Info"></textarea>\
      			</div>\
      			</div>\
      			<div class="emp_rows col-xs-12">\
      			<div class="col-xs-4">\
      			<a href="#" class="remove_field btn btn-danger">Remove</a>\
      			</div>\
      			</div>\
      			</div>'); //add input box
    		}
  		});

  		$(xp_wrapper).on("click",".remove_field", function(e){ //user click on remove text
    		e.preventDefault();
    		$(this).parent('div').parent('div').parent('div').remove(); xpCount--;
  		})

	});
</script>

<script>
	$(document).ready(function(){

	});
</script>
