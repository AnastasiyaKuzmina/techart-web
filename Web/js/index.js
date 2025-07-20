var newsItems = document.querySelectorAll(".news__item");
var newsTitles = document.querySelectorAll(".news__title");
var buttons = document.querySelectorAll(".news__button");
var buttonsText = document.querySelectorAll(".news__button-content > p");
var buttonsArrow = document.querySelectorAll(".news__button-content > img");

for (let i = 0; i < buttons.length; i++) {
    newsItems[i].addEventListener("mouseover", function() {
        newsTitles[i].style.color = "#841844";
        buttons[i].style.backgroundColor = "#841844";
        buttonsText[i].style.color = "white";
        buttonsArrow[i].src = "img/icons/WhiteArrow.svg";
    });

    newsItems[i].addEventListener("mouseout", function() {
        newsTitles[i].style.color = "black";
        buttons[i].style.backgroundColor = "white";
        buttonsText[i].style.color = "#9B407A";
        buttonsArrow[i].src = "img/icons/Arrow.svg";
    });
}