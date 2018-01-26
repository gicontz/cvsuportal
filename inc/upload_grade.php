<?php
	$subjId = $_REQUEST['subjId'];
?>
<script type="text/javascript">var sid = "<?php echo $subjId; ?>";</script>
			<div id="grading_sheet" class="pre_section">
				<script type="text/javascript" src="js/grade_import_ajax.js"></script>
				<div id="alert_modal" class="hidden">
					<span>asdf</span>
				</div>
				<form method="post" action>
					<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-edit"></i></span>
							<input type="text" name="sheet" placeholder="Sheet Name" id="sheetname">
					</div>
					<div id="drop">
						<input type="file" name="xlfile" id="xlf" />
						<p class="file_status"></p>
					</div>
					<input type="button" class="btn btn-primary import_btn" name="import" value="IMPORT">
				</form>
				<div class="hidden">
					 <input type="checkbox" name="useworker" checked>
				 	<input type="checkbox" name="userabs" checked>				
				</div>
				<br />
				<div id="htmlout"></div>
				<div id="out"></div>

				<script src="dist/cpexcel.js"></script>
				<script src="js/shim.js"></script>
				<script src="js/jszip.js"></script>
				<script src="js/xlsx.js"></script>
				<script src="js/grade_import.js"></script>
			</div>