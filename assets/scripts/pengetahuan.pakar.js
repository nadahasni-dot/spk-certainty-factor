$(function () {
	//select2 library
	$(".select2").select2();

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

	// handling click button edit
	$("#allPost").on("click", ".action-edit", function (e) {
		href = $(this).attr("href");
		e.preventDefault();
		$.get(EDIT_PENGETAHUAN_PAKAR + href, function (data) {
			$("#editBody").html(data);
			$("#edit-modal").modal("show");
			$(".select2").select2();
			bsCustomFileInput.init();
		});
	});

	bsCustomFileInput.init();
});
