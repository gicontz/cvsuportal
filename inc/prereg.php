<div class="container">
	<div class="row header">
		<div class="col-md-3">
			<img src="image/cvsu.jpg" class="cvsu logo">
		</div>
		<div class="col-md-6 header_title">
			<h1>CAVITE STATE UNIVERSITY<br/>SILANG CAMPUS</h1>
			<h4>Biga I, Silang, Cavite</h4>
		</div>
		<div class="col-md-3">
			<img src="image/silang.jpg" class="silang logo">			
		</div>
	</div><!-- page_header -->

	<div class="row text-center header_title file_title">
		<h2>OFFICE OF THE REGISTRAR</h2>
		<h6>CERTIFICATION OF GRADES</h6>
	</div><!-- file_title -->

	<div class="row date">
		<div class="col-md-3 col-md-offset-9 text-center">
			<p><input type="text" name="date" class="input_types" value="<?php echo date("F d, Y");?>"><br>
			Date</p>
		</div>
	</div><!-- date -->

	<div class="row first_par">
		<div class="col-md-12">
			<p>TO WHOM IT MAY CONCERN: </p>
		</div>
		<div class="col-md-12">
			<p class="tab">This is to certify that <strong><input type="text" name="name" class="input_types width-300"> (Student No. <input type="text" name="sn-num" class="input_types width-80">)</strong> obtained the following grades </p><p>during <strong><input type="text" name="semester" class="input_types width-50"> semester</strong> of <strong>A.Y. <input type="text" name="ay" class="input_types width-80"></strong></p>
		</div>
	</div><!-- first_par -->

	<div class="row grades_table">
		<div class="col-md-12">
			<table cellpadding="2px" width="100%" border="1px" >
				<tr>
					<th>COURSE CODE</th>
					<th>SUBJECT CODE</th>
					<th>GRADE</th>
					<th>UNIT</th>
				</tr>				
			</table>
			<p class="table-adder"><span class="plus"></span><span class="minus"></span></p>
			<p class="table-adder-for-gpa"><span>GPA</span></p>
		</div>
		<p>This certification is issued for whatever legal purpose it may serve.</p>
	</div><!-- grades_table -->

	<div class="row text-center signatures-1">
		<div class="col-md-6">
			<input type="text" name="adviser" class="input_types width-200">
			<p>Name and Signature of Adviser</p>
		</div>
		<div class="col-md-6"> 
			Approved: <input type="text" name="registrar" class="input_types width-200">
			<p class="registrar">Campus Registrar</p>
		</div>
	</div><!-- signatures-1 -->

	<!-- <hr> -->
	<div class="hr-line"></div>

	<div class="row text-center header_title file_title">		
		<h6>PRE-ENROLLMENT FORM</h6>
		<div class="col-md-12">
			<div class="inline name">
				<p><span>Name: </span><strong><input type="text" name="name" class="input_types width-100p"></strong></p>
				<p><span>Student Number: </span><strong><input type="text" name="sn-num" class="input_types"></strong></p>
			</div>

			<div class="inline fw_field">
				<p><span class="full_label">Address: </span><span class="full_input"><strong><input type="text" name="address" class="input_types width-100p"></strong></span></p>
			</div>


			<div class="inline">
				<p><span>Course: </span><strong><input type="text" name="course" class="input_types"></strong></p>
				<p><span>Year and Section: </span><strong><input type="text" name="year-num" class="input_types"></strong></p>
				<p><span>Major: </span><strong><input type="text" name="major" class="input_types width-200"></strong></p>
			</div>

			<div class="inline">
				<p><span>Classification:</p>
				<p><input type="checkbox" name="new_check" class="input_types check"><span>New</span></p>
				<p><input type="checkbox" name="old_check" class="input_types check"><span>Old</span></p>
				<p><input type="checkbox" name="tra_check" class="input_types check"><span>Transferee</span></p>
				<p><input type="checkbox" name="crs_check" class="input_types check"><span>Cross Reg Form</span></p>
			</div>

			<div class="inline">
				<p><span>Registration Status:</p>
				<p><input type="checkbox" name="reg_check" class="input_types check"><span>New</span></p>
				<p><input type="checkbox" name="irr_check" class="input_types check"><span>Old</span></p>
			</div>

			<div class="inline fw_field ff2">
				<p><span class="full_label">Scholarship Awarded: </span><span class="full_input"><strong><input type="text" name="address" class="input_types width-100p"></strong></span></p>
			</div>

			<div class="inline">
				<p><span>Mode of Payment:</p>
				<p><input type="checkbox" name="cash_check" class="input_types check"><span>Cash</span></p>
				<p><input type="checkbox" name="installment_check" class="input_types check"><span>Installment</span></p>
			</div>
		</div>
	</div><!-- file_title -->

	<div class="row subjLoad_table">
		<div class="col-md-12">
			<table cellpadding="2px" width="100%" border="1px" >
				<tr>
					<th>COURSE CODE</th>
					<th>SUBJECT CODE</th>
					<th>UNIT</th>
					<th>TIME</th>
					<th>DAY</th>
				</tr>
				
			</table>
			<p class="table-adder"><span class="plus"></span><span class="minus"></span></p>
		</div>
	</div><!-- subjLoad_table -->

	<div class="row text-center signatures-2">
		<div class="col-md-6">
			<input type="text" name="adviser" class="input_types width-200">
			<p>Name and Signature of Adviser</p>
		</div>
		<div class="col-md-6"> 
			Approved: <input type="text" name="registrar" class="input_types width-200">
			<p class="registrar">Campus Registrar</p>
		</div>
	</div><!-- signatures-2 -->

	<footer id="main-footer">
		<p class="text-right">Developed and Maintained by <a href="http://github.com/ghilo17">Gimel C. Contillo</a></p>
	</footer>
</div><!-- container -->


	<script type="text/javascript" src="js/table.js"></script>