<script src="../assets/js/jquery-3.2.1.min.js"></script>
<!-- <script src="../assets/js/jquery-ui.min.js"></script> -->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="../assets/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="../assets/js/plugins/chart.js"></script>
<!-- Page datatable plugins -->
<script type="text/javascript" src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript">
	$('#sampleTable').DataTable();

	// $('#datepicker').datepicker();

	// $('#datepicker1').datepicker();
	
	$('#demoNotify').click(function(){
	$.notify({
		title: "Update Complete : ",
		message: "Something cool is just updated!",
		icon: 'fa fa-check'
	},{
		type: "info",
		placement: {
		from: "top",
		align: "right"
	},
	animate: {
		enter: 'animated fadeInDown',
		exit: 'animated fadeOutUp'
	},
	delay: 5000,
	timer: 1000,
	onShow: null,
	onShown: null,
	onClose: null,
	onClosed: null
	});
});
</script>
</body>
</html>