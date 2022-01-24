const dropZone = document.getElementById('dropZone');
const fileInput = document.getElementById('file');

dropZone.ondragover = dropZone.ondragenter = function(evt) {
    dropZone.innerHTML = "Ready!";
    evt.preventDefault();
};
dropZone.ondragleave = function(evt) {
    if (dropZone.innerHTML != "OK!")
        dropZone.innerHTML = "Drop your files here";
};

dropZone.ondrop = function(evt) {
    // pretty simple -- but not for IE :(
    fileInput.files = evt.dataTransfer.files;

    // If you want to use some of the dropped files
    const dT = new DataTransfer();
    dT.items.add(evt.dataTransfer.files[0]);
    fileInput.files = dT.files;

    evt.preventDefault();

    dropZone.innerHTML = "OK!";
    setTimeout(() => {
        dropZone.innerHTML = "Drop your files here";
    }, 2000);
};