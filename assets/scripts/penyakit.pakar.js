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
		$.get(EDIT_PENYAKIT_PAKAR + href, function (data) {
			$("#editBody").html(data);
			$("#edit-modal").modal("show");
			$(".select2").select2();
			bsCustomFileInput.init();
			$("#deskripsiAdd").summernote();
			$("#saranAdd").summernote();
		});
	});

	bsCustomFileInput.init();

	// handling select image
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$("#penyakitPreview").attr("src", e.target.result);
				$("#penyakitPreview").removeClass("d-none");
			};

			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}

	$("#penyakitImage").change(function () {
		readURL(this);
	});

	$("#penyakitArtikel").summernote();
	$("#penyakitSaranArtikel").summernote();
});
