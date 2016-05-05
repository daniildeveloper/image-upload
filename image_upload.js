var addButton = document.getElementById("image-upload-button");
var deletButton = document.getElementById("image-delete-button");
var imageField = document.getElementById("image-tag");
var hidden = document.getElementById("img-hidden-field");
var img = document.getElementById("image-tag");

var customUploader = wp.media({
    title: "Select an image",
    button: {
        text: "Use this Image"
    },
    multiple: false
});

addButton.addEventListener('click', function () {
    if (customUploader) {
        customUploader.open();
    }
});

customUploader.on("select", function () {
    var attachment = customUploader.state().get("selection").first().toJSON();

    img.setAttribute('src', attachment.url);
    img.setAttribute("style", "width:100%");

    hidden.setAttribute("value", JSON.stringify([{
            id: attachment.id,
            url: attachment.url
        }]));
});

deletButton.addEventListener("click", function () {
    img.removeAttribute("src");
    hidden.removeAttribute("value");
    img.removeAttribute("style");
});



