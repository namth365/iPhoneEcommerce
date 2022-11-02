$(() => {
    function confirmDelete() {
        return new Promise((resolve, reject) => {
            Swal.fire({
                title: "Delete It ??",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3f9b1f",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    resolve(true);
                } else {
                    reject(false);
                }
            });
        });
    }

    $(document).on("click", ".btn-delete", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        confirmDelete()
            .then(function () {
                $(`#form-delete${id}`).submit();
            })
            .catch();
    });
});
