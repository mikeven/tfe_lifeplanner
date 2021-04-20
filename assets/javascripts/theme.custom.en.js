/* Add here all your JS customizations */
/* =============================================================== */
function init_magnificPopup(){
	// Reiniciar ventanas emergentes para elementos paginados
	$('.modal-with-zoom-anim').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in',
		modal: true
	});
}
/* =============================================================== */
$('#datatable-default').dataTable({
	  "paging": true,
	  "iDisplayLength": 10,
	  "lengthChange": true,
	  "searching": true,
	  "ordering": true,
	  "info": true,
	  "autoWidth": false,
	  "language": {
		"lengthMenu": "Show _MENU_ records per page",
		"zeroRecords": "No results",
		"info": "Showing page _PAGE_ of _PAGES_",
		"infoEmpty": "No records",
		"infoFiltered": "(filtrados de _MAX_ regs)",
		"search": "",
		"paginate": {
			"first":      "First",
			"last":       "Last",
			"next":       "Next",
			"previous":   "Previous"
		}
	},
	drawCallback: function(){
		// Reiniciar ventanas emergentes para elementos paginados
    	init_magnificPopup(); 
    }
});

$('#datatable-prioridades, #datatable-historial').dataTable({
	  "paging": true,
	  "iDisplayLength": 10,
	  "lengthChange": true,
	  "searching": true,
	  "ordering": false,
	  "info": true,
	  "autoWidth": false,
	  "language": {
		"lengthMenu": "Show _MENU_ records per page",
		"zeroRecords": "No results",
		"info": "Showing page _PAGE_ of _PAGES_",
		"infoEmpty": "No records",
		"infoFiltered": "(filtrados de _MAX_ regs)",
		"search": "",
		"paginate": {
			"first":      "First",
			"last":       "Last",
			"next":       "Next",
			"previous":   "Previous"
		}
	}
});