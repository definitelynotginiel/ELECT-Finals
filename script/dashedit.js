// Variables
const addElementBtn = document.getElementById("addElementBtn");
const editableArea = document.getElementById("editableArea");
const elementType = document.getElementById("elementType");
const colorPicker = document.getElementById("colorPicker");
const strokeColorPicker = document.getElementById("strokeColorPicker");
const strokeWidthInput = document.getElementById("strokeWidth");
const sizeControl = document.getElementById("sizeControl");
const sizeValue = document.getElementById("sizeValue");
const textSizeControl = document.getElementById("textSizeControl");
const textSizeInput = document.getElementById("textSize");
const textInput = document.getElementById("textInput");
const textContent = document.getElementById("textContent");
const bgColorControl = document.getElementById("bgColorControl");
const bgColorPicker = document.getElementById("bgColorPicker");

// Event listeners
sizeControl.addEventListener("input", function () {
  sizeValue.textContent = sizeControl.value;
});

elementType.addEventListener("change", function () {
  if (elementType.value === "text") {
    textSizeControl.style.display = "block";
    textInput.style.display = "block";
    bgColorControl.style.display = "block";
  } else {
    textSizeControl.style.display = "none";
    textInput.style.display = "none";
    bgColorControl.style.display = "none";
  }
});

addElementBtn.addEventListener("click", function () {
  const element = elementType.value;
  const size = sizeControl.value;
  const fillColor = colorPicker.value;
  const strokeColor = strokeColorPicker.value;
  const strokeWidth = strokeWidthInput.value;

  if (element === "box") {
    // Create a box
    const box = document.createElement("div");
    box.classList.add("shape");
    box.style.width = `${size}px`;
    box.style.height = `${size}px`;
    box.style.backgroundColor = fillColor;
    box.style.borderColor = strokeColor;
    box.style.borderWidth = `${strokeWidth}px`;
    box.style.borderStyle = "solid";

    editableArea.appendChild(box);
    makeDraggable(box);
  } else if (element === "text") {
    // Create text element
    const text = document.createElement("div");
    text.classList.add("text-element");
    text.style.fontSize = `${textSizeInput.value}px`;
    text.style.color = fillColor;
    text.style.backgroundColor = bgColorPicker.value;
    text.style.borderColor = strokeColor;
    text.style.borderWidth = `${strokeWidth}px`;
    text.style.borderStyle = "solid";

    text.textContent = textContent.value || "New Text"; // Default text if none provided

    editableArea.appendChild(text);
    makeDraggable(text);
  }
});

// Function to make elements draggable
function makeDraggable(element) {
  let offsetX, offsetY;

  element.addEventListener("mousedown", function (e) {
    offsetX = e.clientX - element.offsetLeft;
    offsetY = e.clientY - element.offsetTop;

    const onMouseMove = function (e) {
      element.style.left = `${e.clientX - offsetX}px`;
      element.style.top = `${e.clientY - offsetY}px`;
    };

    const onMouseUp = function () {
      document.removeEventListener("mousemove", onMouseMove);
      document.removeEventListener("mouseup", onMouseUp);
    };

    document.addEventListener("mousemove", onMouseMove);
    document.addEventListener("mouseup", onMouseUp);
  });
}
