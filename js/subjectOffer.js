$(document).ready(function() {
	
		let table = $('#subject').DataTable({
			select: true
		});
		let table1 = $('#faculty').DataTable({
			select: true
		});
		let table2 = $('#department').DataTable({
			select: true
		});
	
		
		$('#subject tbody').on('click', 'tr', function(){
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
				return item[0] + ", " + item[1];
			});
			let element = document.getElementById("subjects");
			$('#save1').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data1").innerHTML="Please choose a Subject";}
				else{document.getElementById("data1").innerHTML=res;}
				$('#subjectModal').modal('hide');
			});
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
				return item[0] + ", " + item[1] + ", " + item[2] + ", " + item[3] ;
			});
			let element = document.getElementById("faculties");
			$('#save2').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data2").innerHTML="Please choose a Course";}
				else{document.getElementById("data2").innerHTML=res;}
				$('#facultyModal').modal('hide');
			});
		});

		$('#department tbody').on('click', 'tr', function(){
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
				return item[0] + ", " + item[1] + ", " + item[2]  ;
			});
			let element = document.getElementById("departments");
			$('#save3').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data3").innerHTML="Please choose a Course";}
				else{document.getElementById("data3").innerHTML=res;}
				$('#departmentModal').modal('hide');
			});
		});
	});