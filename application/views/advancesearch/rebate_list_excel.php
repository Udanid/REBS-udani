<? 
$b='';
$b=$b.'
                
                        <table  border="1" > <thead> <tr bgcolor="#d5dace">   <th>Loan Code</th><th>Branch Name</th><th>Project Name</th><th>Lot Number</th> <th>Customer Name </th><th>Rebate Date</th><th>Balance Capital</th><th>Balance Int</th><th>Release Int rate </th><th>Paid Int</th><th>Payment Status </th></tr> </thead>';
                    $prjes=0;$prjdis=0;$prjsale=0; $prjmdp=0;$prjpaid=0;$prjbmdp=0;
					  $brnes=0;$brndis=0;$brnsale=0; $brnmdp=0;$brnpaid=0;$brnbmdp=0;
					  $prj_id=''; $brid='';
					  if($searchpanel_searchdata){$c=0;
                          foreach($searchpanel_searchdata as $row){
							 
                           $b=$b.'  <tbody>';
                      if($prj_id!='' & $prj_id!=$row->prj_id){
                      $b=$b.' <tr bgcolor="#b0d2fc" style="font-weight:bold">'; 
                       $b=$b.' <td scope="row" colspan="6">Project Total</td>';
                       $b=$b.'  <td>'.number_format($prjes,2).'</td>';
                        $b=$b.'   <td>'.number_format($prjdis,2).'</td>';
						   $b=$b.'   <td></td>';
                      $b=$b.'  <td>'.number_format($prjsale,2).'</td>';
                         $b=$b.'  </tr> ';
                         
                      $prjes=0;$prjdis=0;$prjsale=0; $prjmdp=0;$prjpaid=0;$prjbmdp=0;
					   }
                         if($brid!='' & $brid!=$row->branch_code){
                       $b=$b.'<tr   bgcolor="#eaf71f" style="font-weight:bold"> ';
                       $b=$b.' <td scope="row" colspan="6">Branch Total</td>';
                       $b=$b.'  <td>'.number_format($brnes,2).'</td>';
                        $b=$b.'   <td>'.number_format($brndis,2).'</td>';
						   $b=$b.'   <td></td>';
                       $b=$b.' <td>'.number_format($brnsale,2).'</td>';
                       
                       $b=$b.'  </tr> ';
                         
                       $brnes=0;$brndis=0;$brnsale=0; $brnmdp=0;$brnpaid=0;$brnbmdp=0;
					   }
                       $b=$b.'<tr >';
                       $b=$b.' <td scope="row">'.$row->loan_code.'</td>';
                      $b=$b.'  <td scope="row">'.get_branch_name($row->branch_code).'</td>';
                      $b=$b.'  <td> '.$row->project_name .'</td>';
                       $b=$b.' <td>'.$row->lot_number.' '.$row->plan_sqid .'</td>';
                       $b=$b.' <td>'.$row->first_name.' '.$row->last_name .'</td>';
                       $b=$b.'  <td>'.$row->apply_date.'</td>';
                        $b=$b.' <td>'.number_format($row->balance_capital,2).'</td>';
                        $b=$b.'   <td>'.number_format($row->balance_int,2).'</td>';
                       $b=$b.' <td>'.number_format($row->int_paidrate,2).'</td>';
					    $b=$b.' <td>'.number_format($row->int_paidamount,2).'</td>';
                       
                        $b=$b.' <td align="right">'.$row->pay_status.'</td>';
                       $b=$b.'  </tr> ';
                        
                              
								$prjes=$prjes+$row->balance_capital;
								$prjdis=$prjdis+($row->balance_int);
								$prjsale=$prjsale+$row->int_paidamount;
								$prj_id=$row->prj_id;
								$brnes=$brnes+$row->balance_capital;
								$brndis=$brndis+($row->balance_int);
								$brnsale=$brnsale+$row->int_paidamount;
									$brid=$row->branch_code;
								
								
								
								  }} 
                                 $b=$b.'    <tr bgcolor="#b0d2fc" style="font-weight:bold"> ';
                       $b=$b.' <td scope="row" colspan="6">Project Total</td>';
                       $b=$b.'  <td>'.number_format($prjes,2).'</td>';
                       $b=$b.'    <td>'.number_format($prjdis,2).'</td>';
					      $b=$b.'   <td></td>';
                       $b=$b.' <td>'.number_format($prjsale,2).'</td>';
                       
                        $b=$b.' </tr> ';
                         
                         $b=$b.' <tr bgcolor="#eaf71f"style="font-weight:bold">'; 
                       $b=$b.' <td scope="row" colspan="6">Branch Total</td>';
                        $b=$b.' <td>'.number_format($brnes,2).'</td>';
                         $b=$b.'  <td>'.number_format($brndis,2).'</td>';
						    $b=$b.'   <td></td>';
                       $b=$b.' <td>'.number_format($brnsale,2).'</td>';
                       
                         $b=$b.'  </tr> 
                          </tbody></table> '; 
               	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=Rebatelist-Report.xls");
	echo $b;