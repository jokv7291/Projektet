
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
	
	var edit_fn = function(data) {
		
		var kort = $(data).parent().parent().find('td.short').text();
		var namn = 	$(data).parent().parent().find('td.name').text();
		
		var kort_input = "<input type=\"input\" id=\"short\" value=\""+kort+"\"/>";
		var namn_input = "<input type=\"input\" id=\"name\" value=\""+namn+"\"/>";
		
		$(data).parent().parent().find('td.short').html(kort_input);
		$(data).parent().parent().find('td.name').html(namn_input);
		
	 	
	}
	var update_fn = function(data) {
		
		var id = $(data).parent().parent().attr("id");
		var aktion = "update_subject";
		var kort = $(data).parent().parent().find('td.short').find('input').val();
		var namn = 	$(data).parent().parent().find('td.name').find('input').val();
	
		$.post("controllers/SubjectsController.php", {
			 		s: aktion, 
			 		subject_id: id,
			 		subject_short: kort,
					subject_name: namn
			 	}, function(data2) {
					// if (isNaN(data2)) {
					// 			console.log(data2);	
					// 		} else {
							console.log(data2);	

					$(data).parent().parent().find('td.short').html(kort);
					$(data).parent().parent().find('td.name').html(namn);
				//}
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
				$('#table_list').append("<tr id=\""+data+"\"><td class=\"short\">"+kod+"</td><td class=\"name\">"+namn+"</td><td><img class=\"edit\" src=\"images/edit.gif\" ><img class=\"delete\" src=\"images/del.gif\"></td></tr>");
				$('table td img.delete:last').bind({
					click: function() {
					delete_fn(this);
					return false;
					},
					hover: function() {
					$(this).css('cursor','pointer');	
					}
				});
				$('table td img.edit').toggle(function() {

						edit_fn(this);
						return false;
					},function() {
						update_fn(this);
						return false;
					});
				$('table td img.edit').hover(function() {
					$(this).css('cursor','pointer');	

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
	
	
	$('table td img.edit').toggle(function() {
		
			edit_fn(this);
			return false;
		},function() {
			update_fn(this);
			return false;
		});
	$('table td img.edit').hover(function() {
		$(this).css('cursor','pointer');	
		
	});
	
	
	
	
	
});