$(document).ready(function() {
		let table = $('#student').DataTable({
			select: true
		});
		let table2 = $('#subject').DataTable({
			select: true
		});
		let table3 = $('#schedule').DataTable({
			select: true
		});
		let table4 = $('#faculty').DataTable({
			select: true
		});
		let table5 = $('#questionnaire').DataTable({
			select: true
		});
		let table6 = $('#questionnaire2').DataTable({
			select: true
		});

		

		$('#student tbody').on( 'click', 'tr', function () {
			if ( $(this).hasClass('active') ) {
				$(this).removeClass('active');
			}
			else {
				table.$('tr.active').removeClass('active');
				$(this).addClass('active');
			}

			let ids = $.map(table.rows('.active').data(), function (item) {
				return item[0];
			});

			res = $.map(table.rows('.active').data(), function(item){
				return item[2] + " " + item[1];
			});
		
            let element = document.getElementById("students");
			console.log(ids);
			$('#save').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data").innerHTML="Please choose a Student";}
				else{document.getElementById("data").innerHTML=res;}
				
				$('#studentModal').modal('hide');
			});
		});
		
		$('#subject tbody').on('click', 'tr', function(){
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
				return item[1] + ", " + item[2] + ", " + item[3];
			});
			let element = document.getElementById("subjects");
			$('#save2').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data2").innerHTML="Please choose a Subject";}
				else{document.getElementById("data2").innerHTML=res;}
				$('#subjectModal').modal('hide');
			});
		});

		$('#schedule tbody').on('click', 'tr', function(){
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
				return item[1] + " To " + item[2];
			});
			let element = document.getElementById("schedules");
			$('#save3').click(function() {
				element.value = ids.toString();
				if(ids.length == 0){document.getElementById("data3").innerHTML="Please choose a Schedule";}
				else{document.getElementById("data3").innerHTML=res;}
				$('#scheduleModal').modal('hide');
			});
		});


		$('#questionnaire tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('selected');
		} );
	 
		$('#saveME').click( function () {

			let res = $.map(table5.rows('.selected').data(), function(item){
				return item[0];
			});

			let count = table5.rows('.selected').data().length;
			if(count == 0){$('#qui').text('Please Select a Questions')}
			else{$('#qui').text('You select ' + count + ' Question/s')}

			$('#question').val(res);

			$('#questionModal').modal('hide');
		});




		$('#questionnaire2 tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('selected');
		} );
	 
		$('#saveNewQuest').click( function () {

			let res = $.map(table6.rows('.selected').data(), function(item){
				return item[0];
			});

			// let count = table6.rows('.selected').data().length;
			// if(count == 0){$('#qui').text('Please Select a Questions')}
			// else{$('#qui').text('You select ' + count + ' Question/s')}

			// $('#res').val(res);

			let term = $("#sy").val(); 
			let sy = $("#term").val();

			let cnt = 0;


			res.forEach(element => {
				cnt++;
				$.ajax({
					type:'POST',
					data: 
					{ 
						term: term,
						sy: sy,
						res: element
					},
					url:'../function/newSetQuestion.php',
					success:function(data) {
						console.log(data);
					}
				});
				
				if(cnt == res.length){
					setTimeout(() => {
						location.replace('Questionnaire_Add_Set.php');
					},1000);
				}
			});

			

			$('#questionModal').modal('hide');
		});
	});