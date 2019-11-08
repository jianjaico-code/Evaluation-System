$(document).ready(function() {
		let table2 = $('#course').DataTable({
			select: true
		});
		$('#course tbody').on('click', 'tr', function(){
			if( $(this).hasClass('active')){
				$(this).removeClass('active');
			}
			else{
				table2.$('tr.active').removeClass('active');
				$(this).addClass('active');
			}

			let ids  = $.map(table2.rows('.active').data(), function(item){
				return item[0];
			});

			let res = $.map(table2.rows('.active').data(), function(item){
				return item[1];
			});
			let element = document.getElementById("courses");
			console.log(ids);
			$('#save2').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data2").innerHTML="Please choose a Course";
				
			}
				else{document.getElementById("data2").innerHTML=res;}
				$('#courseModal').modal('hide');
			});
		});
	});