
$(document).ready(function() { 
	
	
	var delete_fn = function(data) {
		
		var id = $(data).parent().parent().attr("id");
		var aktion = "delete_product";

		console.log(data);
	 	$.post("index.php", {
	 		action: aktion, 
	 		product_id: id	
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

	$('#add_product_form').submit(function() {
		
		var kat = $('#category_id').val();
		var kod = $('#code').val();
		var namn = $('#name').val();
		var pris = $('#price').val();
		var aktion = "add_product";
		

		$.post("index.php", { 
		 	action: aktion, 
		 	code: kod,
		 	name: namn,
		 	price: pris,
		 	category_id: kat		
		 }, 
		function(data) {
			console.log(data);
			
		//	var product_id = data;
			if (isNaN(data)) {
				console.log(data);	
			} else {
				$('#table_list').append("<tr id=\""+data+"\"><td>"+kod+"</td><td>"+namn+"</td><td class=\"right\">"+pris+"</td><td><img class=\"delete\" src=\"../images/del.gif\"></td></tr>");
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
				$('#price').val("");
				$('#code').focus();
	
	
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