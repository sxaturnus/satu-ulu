		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<script type="text/javascript">
    function confirmLogout(event) {
        if (!confirm("Apakah Anda yakin ingin keluar?")) {
            event.preventDefault();
        }
    }
	</script>

	<script type="text/javascript">
		$(document).ready( function () {
			$('.table-datatable').DataTable();
		} );
	</script>
</body>
</html>
