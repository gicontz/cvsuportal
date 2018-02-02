

$.extend({
	    giriTablePlus: function(target_table, i) {
	        $(target_table).append('<tr id="row'+i+'"><td><input type="text" name="subj'+i+'-cc" class="input_types"></td><td><input type="text" name="subj'+i+'-sc" class="input_types width-100p"></td><td><input type="text" name="subj'+i+'-g" class="input_types width-50"></td><td><input type="text" name="subj'+i+'-u" class="input_types width-50"></td></tr>');	     
	    }
});

$.extend({
	    giriRowGPA: function(target_table, i, limit) {
	    	
	    	var prod_grade = new Array();
	    	var each_grade = new Array();
	    	var each_unit = new Array();
	    	var each_coursecode = new Array();
	    	var total_prodgrade = 0;
	    	var gpa = 0;
	    	prod_grade[0] = "";

	    	var total_units = 0;
	    	var main_total_units = 0;	    	

	    	for(var sub = 1; sub <= limit; sub++){
	    		var invalid_coursecode = false;
	    		each_coursecode[sub] = $(".input_types[name='subj"+ sub +"-cc']").val();
	    		each_grade[sub] = $(".input_types[name='subj"+ sub +"-g']").val();
	    		each_unit[sub] = $(".input_types[name='subj"+ sub +"-u']").val();
	    		prod_grade[sub] = each_unit[sub] * each_grade[sub];
	    		invalid_coursecode = each_coursecode[sub] == "NSTP 1" || each_coursecode[sub] == "NSTP 2" || each_coursecode[sub] == "ITEC 200A" || each_coursecode[sub] == "ITEC 2000B" || each_coursecode[sub] == "ITEC 200C";
	    		if(!invalid_coursecode){
	    			total_prodgrade += prod_grade[sub];
	    			total_units += parseInt($(".input_types[name='subj"+ sub +"-u']").val());
		    	}	

	    		main_total_units += parseInt($(".input_types[name='subj"+ sub +"-u']").val());
	    		console.log(each_coursecode[sub]);
	    	}

	    	gpa = total_prodgrade / total_units;

	    	gpa = gpa.toFixed(2);

	    	if (i==1) {
	    		$(target_table).append('<tr id="gpa-row"><td></td><td class="gpa_text">GPA: </td><td class="gpa">'+ gpa +'</td><td class="total-units">'+ main_total_units +'</td></tr>');
	    	}else if(i==0){
	    		$("#gpa-row").remove();
	    	}	  
	    }
});

$.extend({
	    giriTablePlusTwo: function(target_table, i) {
	        $(target_table).append('<tr id="row'+i+'"><td><input type="text" name="subj'+i+'-cc" class="input_types"></td><td><input type="text" name="subj'+i+'-sc" class="input_types width-100p"></td><td><input type="text" name="subj'+i+'-u" class="input_types width-50"></td><td><input type="text" name="subj'+i+'-t" class="input_types width-50"></td><td><input type="text" name="subj'+i+'-d" class="input_types width-50"></td></tr>');	     
	    }
});

$.extend({
	    giriTableLess: function(target_table, i) {
	        $(target_table + ' tr#row' + i).remove();
	    }
});

var index = 0;
$(".grades_table .table-adder .plus").click(function(){
	if(index >= 0){
		$.giriTablePlus(".grades_table table", ++index);
	}			
});

index = $(".grades_table tr").length - 1;

$(".grades_table .table-adder .minus").click(function(){
	// console.log(index);
	if(index > 0){
			$.giriTableLess(".grades_table table", index--);
	}
});

var c = 0;
$(".grades_table .table-adder-for-gpa").click(function(){
	if($(this).hasClass("clicked")){
		$(this).removeClass("clicked");
		--c;
	}
	else{
		$(this).addClass("clicked");
		++c;
	}
		$.giriRowGPA(".grades_table table", c, index);			
});



var iindex = 0;
$(".subjLoad_table .table-adder .plus").click(function(){
	if(iindex >= 0){
		$.giriTablePlusTwo(".subjLoad_table table", ++iindex);
	}			
});
$(".subjLoad_table .table-adder .minus").click(function(){
	// console.log(index);
	if(iindex > 0){
			$.giriTableLess(".subjLoad_table table", iindex--);
	}
});

$(".input_types").on("change", function(){

});

$(".input_types[name='name']").on('keypress keyup change', function(){
	$(".input_types[name='name']").val($(this).val());
});

$(".input_types[name='sn-num']").on('keypress keyup change', function(){
	$(".input_types[name='sn-num']").val($(this).val());
});

$(".input_types[name='adviser']").on('keypress keyup change', function(){
	$(".input_types[name='adviser']").val($(this).val());
});

$(".input_types[name='registrar']").on('keypress keyup change', function(){
	$(".input_types[name='registrar']").val($(this).val());
});