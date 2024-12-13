

const modal = document.getElementById("updateModal");
const closeModal = document.querySelector(".close");
const updateForm = document.getElementById("updateForm");

document.querySelectorAll(".btn-secondary").forEach(button => {
button.addEventListener("click", event => {
    const row = event.target.closest("tr");
    const id = row.children[0].textContent;
    const nombre = row.children[1].textContent;
    const cantidad = row.children[2].textContent;
    const precio = row.children[3].textContent;

    // llenar formulario
    document.getElementById("updateId").value = id;
    document.getElementById("updateNombre").value = nombre;
    document.getElementById("updateCantidad").value = cantidad;
    document.getElementById("updatePrecio").value = precio;

    // morstrar
    modal.style.display = "block";
});
});

// cerrar modal
closeModal.addEventListener("click", () => {
modal.style.display = "none";
});

window.addEventListener("click", event => {
if (event.target === modal) {
    modal.style.display = "none";
}
});
