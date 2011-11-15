
$(document).ready(function() { 
	
	//Delete function kallad av dels den ursprungliga, längst ner, 
	//och sen för varje nyskapad rad i tabbellen
	var delete_fn = function(data) {
		
		var id = $(data).parent().parent().attr("id");
		var aktion = "delete_subject";

		console.log(id);
		
	 	$.post("controllers/SubjectsController.php", {
	 	 		s: aktion, 
	 	 		subject_id: id	
	 	 		}, function(data2) {
	 		
	 				console.log(data2);
	 		
	 	});
		$(data).parent().parent()
			.find('td')
	 		.wrapInner('<div style="display: block;" />')
	 		.parent()
	 		.find('td > div')
			.slideUp('fast', function() {
				$(data).parent().parent().parent().remove();
			});
	}
	
	//Submit med en nästlad deletefunktion
	$('#add_subject_form').submit(function() {
		
		var kod = $('#code').val();
		var namn = $('#name').val();
		var aktion = "add_subject";
		
		console.log(kod);
		console.log(namn);
		

		$.post("controllers/SubjectsController.php", { 
		 	s: aktion, 
		 	subject_short: kod,
		 	subject_name: namn
		 }, 
		function(data) {
			console.log(data);
			
		//	var product_id = data;
			if (isNaN(data)) {
				console.log(data);	
			} else {
				$('#table_list').append("<tr id=\""+data+"\"><td>"+kod+"</td><td>"+namn+"</td><td><img class=\"delete\" src=\"images/del.gif\"></td></tr>");
				$('table td img.delete:last').bind({
					click: function() {
					delete_fn(this);
					return false;
					},
					hover: function() {
					$(this).css('cursor','pointer');	
					}
				});
	
				$('#code').val("");
				$('#name').val("");
				$('#name').focus();
	
	
			}
		});
		 
	
		return false;
	});
	
	
	$('table td img.delete').bind({
		click: function() {
		delete_fn(this);
		return false;
		},
		hover: function() {
		$(this).css('cursor','pointer');	
		}
	});
	
});