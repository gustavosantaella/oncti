// Call the dataTables jQuery plugin
$(document).ready(function() {
	$('#example').DataTable({
		responsive:true,
		autoWidth:false,
		"language": {
			"lengthMenu": "Mostrar "+`
			<select name="example_length"
			 aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm">
			<option value="5" >5</option>
			<option value="25">25</option>
			<option value="45">45</option>
			<option value="-1">Todo</option>
			</select>

			`+"",
			"zeroRecords": "No se ha encontrado",
			"info": "Mostrando _PAGE_ de _PAGES_",
			"infoEmpty": "",
			"infoFiltered": "",
			"search":"Buscar:",
			"paginate":{
				next:"Siguiente",
				previous:"Anterior"
			}
		},
		  pageLength : 5,
	});
});
