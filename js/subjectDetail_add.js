$(document).ready(function() {
	
		let table = $('#subject').DataTable({
			select: true
		});
		let table1 = $('#course').DataTable({
			select: true
		});

		let table2 = $('#department').DataTable({
			select: true
		});
		
		let table3 = $('#dean').DataTable({
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
			$('#save2').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data2").innerHTML="Please choose a Subject";}
				else{document.getElementById("data2").innerHTML=res;}
				$('#subjectModal').modal('hide');
			});
		});


		$('#course tbody').on('click', 'tr', function(){
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
				return item[0] + ", " + item[1];
			});
			let element = document.getElementById("courses");
			$('#save3').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data3").innerHTML="Please choose a Course";}
				else{document.getElementById("data3").innerHTML=res;}
				$('#courseModal').modal('hide');
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
				return item[0] + ", " + item[1];
			});
			let element = document.getElementById("departments");
			$('#save4').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data4").innerHTML="Please choose a Department";}
				else{document.getElementById("data4").innerHTML=res;}
				$('#departmentModal').modal('hide');
			});
		});

		$('#dean tbody').on('click', 'tr', function(){
			if( $(this).hasClass('active')){
				$(this).removeClass('active');
			}
			else{
				table3.$('tr.active').removeClass('active');
				$(this).addClass('active');
			}

			let ids  = $.map(table3.rows('.active').data(), function(item){
				return item[0];
			});

			let res = $.map(table3.rows('.active').data(), function(item){
				return item[0] + ", " + item[1];
			});
			let element = document.getElementById("deans");
			$('#save5').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data5").innerHTML="Please choose a dean";}
				else{document.getElementById("data5").innerHTML=res;}
				$('#deanModal').modal('hide');
			});
		});
	});