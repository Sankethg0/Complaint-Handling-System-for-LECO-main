$(document).ready(function (){
    $.ajax({
        url:"php/data.php",
        method:"post",
        data:"viewcomplaint" + 5,
    }).done(function (vcomplaint){
        console.log(vcomplaint);
        $('comp_table').append("Hello World");
        console.log("hello World");
        vcomplaint = JSON.parse(vcomplaint);
        
        $('comp_table').append("<tr><th>Complaint ID</th><th>User ID</th><th>Complaint Type</th><th>Description</th><th>Location</th><th>Satus</th><th>Date Filed</th></tr>")
        /*
        comp.forEach(function (comp){
            $('comp_table').append("")
        })*/
    })
})