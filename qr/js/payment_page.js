
if (document.getElementById("cancel_txn_btn_qrcode"))
	document.getElementById("cancel_txn_btn_qrcode").addEventListener("click", cancel_txn_btn);
if (document.getElementById("cancel_txn_btn_aftertimeout"))
	document.getElementById("cancel_txn_btn_aftertimeout").addEventListener("click", cancel_txn_btn);

function cancel_txn_btn(e) {
	e.preventDefault();
	var vpatxn_id = document.querySelector("#transactionCode").value;
	Swal.fire({
		title: "Are you sure?",
		text: `You want to cancel your transaction?`,
		icon: "warning",
		showCancelButton: true,
		confirmButtonText: `Yes, it!`,
	}).then(function (result) {
		if (result.value) {
			fetch("cancel_txn/" + vpatxn_id)
				.then((response) => response.json())
				.then(async (response) => {
					if (response.status == "success") {
						await Swal.fire({
							title: response.title || "Success",
							text: response.msg,
							icon: "success",
						}).then(function () {
							redirect_user(redirectUrl, client_txn_id, txn_id);
						});
					} else {
						Swal.fire({
							title: response.title || "Error",
							text: response.msg,
							icon: "error",
						}).then(function () {
							redirect_user(redirectUrl, client_txn_id, txn_id);
						});
						// window.location.reload();
					}
				})
				.catch((error) => {
					console.log(error);
					Swal.fire({
						title: "Error Occure.",
						text: error.message,
						icon: "error",
					});
				});
		}
	});
}