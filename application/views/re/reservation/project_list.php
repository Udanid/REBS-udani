 <select class="form-control" placeholder="Qick Search.."    id="prj_id" name="prj_id"  onchange="loadcurrent_block(this.value)">
                    <option value="">All Projects</option>
                    <? if($prjlist)   { foreach($prjlist as $row){?>
                    <option value="<?=$row->prj_id?>"><?=$row->project_name?> - <?=$row->town?></option>
                    <? }}?>
             
					</select>  