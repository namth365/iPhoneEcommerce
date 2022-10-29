$(() => {
    function confirmBack() {
        return new Promise((resolve, reject) => {
            Swal.fire({
                title: "Unsaved data! Back??",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3f9b1f",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes. Back !!",
            }).then((result) => {
                if (result.isConfirmed) {
                    resolve(true);
                } else {
                    reject(false);
                }
            });
        });
    }

    $(document).on("click", ".btn-back", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        confirmBack()
            .then(function () {
                $(`#form-back${id}`).submit();
            })
            .catch();
    });
});


