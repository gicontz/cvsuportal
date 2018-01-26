
/*jshint browser:true */
/* eslint-env browser */
/*global Uint8Array, console */
/*global XLSX */
var X = XLSX;
var XW = {
	/* worker message */
	msg: 'xlsx',
	/* worker scripts */
	worker: 'js/xlsxworker.js'
};

var global_wb;

var sheet_name = "";

var process_wb = (function() {
	var OUT = document.getElementById('out');
	var HTMLOUT = document.getElementById('htmlout');

	var to_json = function to_json(workbook) {
		var result = {};
		workbook.SheetNames.forEach(function(sheetName) {
			var roa = X.utils.sheet_to_json(workbook.Sheets[sheetName], {header:1});
			if(roa.length) result[sheetName] = roa;
		});
		return JSON.stringify(result, 2, 2);
	};

	var to_html = function to_html(workbook) {
		OUT.innerHTML = "";
		workbook.SheetNames.forEach(function(sheetName) {
			var htmlstr = X.write(workbook, {sheet:sheetName, type:'binary', bookType:'html'});
			OUT.innerHTML += htmlstr;
		});
		return "";
	};

	return function process_wb(wb) {
		sheet_name = $("#sheetname").val();
		if(sheet_name != ""){
			var fullPath = $('#xlf').val();
			if (fullPath) {
			    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
			    var filename = fullPath.substring(startIndex);
			    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
			        filename = filename.substring(1);
			    }
			    $(".file_status").text(filename);		    
			}
			global_wb = wb;
			var output = to_json(wb);
			to_html(wb);
			$("table").addClass("table table-hover");
	  		var e = document.querySelectorAll(".table tr:first-of-type td");

			e.forEach(function(th){
			var d = document.createElement('th');
				d.innerHTML = th.innerHTML;
				th.parentNode.replaceChild(d, th);
			});
			var grades = JSON.parse(output);
			grades_array = grades;
			$(".import_btn").removeClass("hidden");
			$("#alert_modal span").text("Read Successfully!");
			$("#alert_modal").removeClass("hidden");
		}
		else{
			$("#alert_modal span").text("Complete All Fields!");
			$("#alert_modal").removeClass("hidden");
		}
	};
})();

var setfmt = window.setfmt = function setfmt() { if(global_wb) process_wb(global_wb); };

var do_file = (function() {
	var rABS = typeof FileReader !== "undefined" && (FileReader.prototype||{}).readAsBinaryString;
	var domrabs = document.getElementsByName("userabs")[0];
	if(!rABS) domrabs.disabled = !(domrabs.checked = false);

	var use_worker = typeof Worker !== 'undefined';
	var domwork = document.getElementsByName("useworker")[0];
	if(!use_worker) domwork.disabled = !(domwork.checked = false);

	var xw = function xw(data, cb) {
		var worker = new Worker(XW.worker);
		worker.onmessage = function(e) {
			switch(e.data.t) {
				case 'ready': break;
				case 'e': console.error(e.data.d); break;
				case XW.msg: cb(JSON.parse(e.data.d)); break;
			}
		};
		worker.postMessage({d:data,b:rABS?'binary':'array'});
	};

	return function do_file(files) {
		rABS = domrabs.checked;
		use_worker = domwork.checked;
		var f = files[0];
		var reader = new FileReader();
		reader.onload = function(e) {
			if(typeof console !== 'undefined') console.log("onload", new Date(), rABS, use_worker);
			var data = e.target.result;
			if(!rABS) data = new Uint8Array(data);
			if(use_worker) xw(data, process_wb);
			else process_wb(X.read(data, {type: rABS ? 'binary' : 'array'}));
		};
		if(rABS) reader.readAsBinaryString(f);
		else reader.readAsArrayBuffer(f);
	};
})();

(function() {
	var drop = document.getElementById('drop');
	if(!drop.addEventListener) return;

	function handleDrop(e) {
		e.stopPropagation();
		e.preventDefault();
		do_file(e.dataTransfer.files);
	}

	function handleDragover(e) {
		e.stopPropagation();
		e.preventDefault();
		e.dataTransfer.dropEffect = 'copy';
	}

	drop.addEventListener('dragenter', handleDragover, false);
	drop.addEventListener('dragover', handleDragover, false);
	drop.addEventListener('drop', handleDrop, false);
})();

(function() {
	var xlf = document.getElementById('xlf');
	if(!xlf.addEventListener) return;
	function handleFile(e) { do_file(e.target.files); }
	xlf.addEventListener('change', handleFile, false);
})();


$(".import_btn").on('click', function(){
	Import(grades_array, sheet_name, sid);
});
$("body").on('click', function(){	
	$("#alert_modal").addClass("hidden");
});