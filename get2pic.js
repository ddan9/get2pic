/////////
// GET //
/////////

const urlParams = new URLSearchParams(window.location.search);
const image = urlParams.get("image");

const image_decoded = decodeURIComponent(image);

////////////
// UPLOAD //
////////////

const filetype = "image/svg+xml";

const fileraw = btoa(image_decoded);

const filename = new Date().getTime().toString();

const filesize = image_decoded.length;

const filebody = `data:${filetype};base64,${fileraw}`;

//////////////
// DOWNLOAD //
//////////////

const element = document.createElement("a");
element.setAttribute("href", filebody);
element.setAttribute("download", filename);

document.body.appendChild(element);

element.click();

document.body.removeChild(element);

////////////
// ENDING //
////////////
