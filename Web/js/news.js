var button = document.getElementById("button");
var buttonText = document.getElementById("buttonText");
var buttonArrow = document.getElementById("buttonImg");

button.addEventListener("mouseover", function() {
    button.style.backgroundColor = "#841844";
    buttonText.style.color = "white";
    buttonArrow.src = "img/icons/WhiteArrow.svg";
});

button.addEventListener("mouseout", function() {
    button.style.backgroundColor = "white";
    buttonText.style.color = "#9B407A";
    buttonArrow.src = "img/icons/Arrow.svg";
});