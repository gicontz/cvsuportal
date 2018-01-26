var grades_array;

function Import(str, sheet, sid) {
    $.ajax({
    type: "post",
    url: "inc/grade_import.php",
    data: {
        grades: str,
        sheetName: sheet,
        subjid: sid,
    },
    success: function(data){              
            $("#alert_modal span").text(data);
            $("#alert_modal").removeClass("hidden");
     }
});
}