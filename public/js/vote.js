$(document).ready(function(){

	$('a').click(function(){

		var id_event= $(this).attr('class');
		$.post('/aslcn/model/show_like.php',{id_event:id_event},function(data){
			if(data == 'ok') {
				add_like(id_event); 
			}
		});

	});

	function add_like(id_event) {
		$.post('/aslcn/model/add_like.php',{id_event:id_event},function(data){
			$('#id'+id_event+'').text(data);
		});
	}
	
});
