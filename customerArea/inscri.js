let FormCOntrol = () => {

    document.getElementById("GalleryID").value.length == 0 && alert("the galleryid field is required")
    document.getElementById("Nom").value.length == 0 && alert("name field is required")
    document.getElementById("descG").value.length == 0 && alert("description field is required")
    document.getElementById("dimension").value.length == 0 && alert("dimension field is required")
    document.getElementById("ModelID").value.length == 0 && alert("model field is required")

}