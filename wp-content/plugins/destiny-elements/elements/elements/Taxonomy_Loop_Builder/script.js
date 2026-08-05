const dropdownButton = document.querySelector("#stacjonarne-dropdown");
const dropdownArea = document.querySelector("#stacjonarne-area");
const dropdownIcon = document.querySelector("#stacjonarne-dropdown .button-atom__icon-wrapper");

// Ustaw przejście dla dropdownIcon 
dropdownIcon.style.transitionDuration = "0.5s";

// Ustaw wysokość na 0, aby dropdown był domyślnie zamknięty
dropdownArea.style.height = "0";

// Ustaw czas trwania przejścia dla dropdown
dropdownArea.style.transitionDuration = "0.5s";

// Ustaw transformację ikony na 90 stopni
dropdownIcon.style.transform = "rotate(90deg)";

dropdownButton.addEventListener("click", function () {
    // Jeśli dropdown jest zamknięty
    if (dropdownArea.clientHeight === 0) {
        // Oblicz faktyczną wysokość elementu
        let scrollHeight = dropdownArea.scrollHeight;
        
        // Ustaw wysokość na obliczoną wartość, aby otworzyć dropdown
        dropdownArea.style.height = scrollHeight + "px";

        // Ustaw transformację ikony na 0 stopni
        dropdownIcon.style.transform = "rotate(0deg)";
    } else {
        // Ustaw wysokość na 0, aby zamknąć dropdown
        dropdownArea.style.height = "0";
        dropdownIcon.style.transform = "rotate(90deg)";
    }
});
