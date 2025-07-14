let edits = document.getElementsByClassName('edit');
Array.from(edits).forEach(element => {
    element.addEventListener("click", (e) => {
        console.log("edit");
        let tr = e.target.parentNode.parentNode;
        let title = tr.getElementsByTagName("td")[0].innerText;
        let description = tr.getElementsByTagName("td")[1].innerText;

        // Assign values to modal input fields
        let titleEdit = document.getElementById("title");
        let descriptionEdit = document.getElementById("description");
        titleEdit.value = title;
        descriptionEdit.value = description;

        snoEdit.value = e.target.id;

        console.log(e.target.id)
        // Show the modal
        $('#editModal').modal('toggle');
    });
});


let deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach(element => {
    element.addEventListener("click", (e) => {
        console.log("delete");
        let no = e.target.id.substr(1,);

        if (confirm("Are You Sure you want to delete this Todo")) {
            console.log("Yes");
            window.location = `/Crud/index.php?delete=${no}`;
        } else {
            console.log("no");
        }
    });
});