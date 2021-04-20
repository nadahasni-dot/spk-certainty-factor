$(function () {	
	// data table
	$("#allPost").DataTable({
		paging: true,
		lengthChange: true,
		searching: true,
		ordering: true,
		info: true,
		autoWidth: false,
		responsive: true,
	});

	// handling click button delete
	$("#allPost").on("click", ".action-delete", function (e) {
		href = $(this).attr("href");
		e.preventDefault();
		Swal.fire({
			title: "Are you sure?",
			text: "You cannot revert back this action.",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, hapus!",
		}).then((result) => {
			if (result.value) {
				window.location.href = href;
			}
		});
	});
});
