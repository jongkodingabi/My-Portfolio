function confirmDelete(skillId) {
    Swal.fire({
        title: "Do you want to delete this skill?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Delete",
        denyButtonText: `Don't delete`,
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika user mengonfirmasi penghapusan, submit form secara manual
            document.getElementById("delete-form-" + skillId).submit();
        } else if (result.isDenied) {
            Swal.fire("Skill is not deleted", "", "info");
        }
    });
}
