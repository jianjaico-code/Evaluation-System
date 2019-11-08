$(document).ready(function() {
	
		let table = $('#faculty').DataTable({
			select: true
		});
		
		$('#faculty tbody').on('click', 'tr', function(){
			if( $(this).hasClass('active')){
				$(this).removeClass('active');
			}
			else{
				table.$('tr.active').removeClass('active');
				$(this).addClass('active');
			}

			let ids  = $.map(table.rows('.active').data(), function(item){
				return item[0];
			});

			let res = $.map(table.rows('.active').data(), function(item){
				return item[0] + ", " + item[1] + ", " + item[2] + ", " + item[3];
			});
			let element = document.getElementById("faculties");
			$('#save2').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data").innerHTML="Please choose a Subject";}
				else{document.getElementById("data").innerHTML=res;}
				$('#facultyModal').modal('hide');
			});
		});

	});