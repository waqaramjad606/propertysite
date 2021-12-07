// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#productstable').DataTable();
  $('#pickerstable').DataTable();

  $('#ordertable').DataTable({
  	"order": [[ 0, "dsc" ]],
  });
  
  $('#verificationtable').DataTable({
  	"order": [[ 7, "dsc" ]],
  });
    
   $('#apointmentstable').DataTable({
  	"order": [[ 5, "dsc" ]],
  });

  
});
