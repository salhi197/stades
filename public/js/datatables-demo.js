// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable2').DataTable({
        pageLength: 10,  
        language: {
            search: "Filtrer avec le codebar",
            paginate: {
              next: '&#8594;', // or '→'
              previous: '&#8592;' // or '←' 
            }
          }
        
      });
  

      $('#dataTable3').DataTable({
        pageLength: 10,  
        order: [[ 0, 'asc' ]],
        language: {
            search: "Filtrer avec le codebar",
            paginate: {
              next: '&#8594;', // or '→'
              previous: '&#8592;' // or '←' 
            }
          }
        
      });

      $('#dataTable').DataTable({
        pageLength: 10,
        order: [[ 0, 'desc' ]],
        language: {
            search: "Filtrer avec le codebar",
            paginate: {
              next: '&#8594;', // or '→'
              previous: '&#8592;' // or '←' 
            }
          }
        
      });

});
  
