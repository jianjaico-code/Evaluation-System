$(document).ready(function() {
	
	
		let table1 = $('#faculty').DataTable({
			select: true
		});
	

		$('#faculty tbody').on('click', 'tr', function(){
			if( $(this).hasClass('active')){
				$(this).removeClass('active');
			}
			else{
				table1.$('tr.active').removeClass('active');
				$(this).addClass('active');
			}

			let ids  = $.map(table1.rows('.active').data(), function(item){
				return item[0];
			});

			let res = $.map(table1.rows('.active').data(), function(item){
				return item[0] ;
			});
			let element = document.getElementById("faculties");
			$('#save2').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data2").innerHTML="Please choose a Faculty";}
				else{document.getElementById("data2").innerHTML=res;}
				$('#facultyModal').modal('hide');
			});
		});
	});