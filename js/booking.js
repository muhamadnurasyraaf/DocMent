function handleButtonClick(option) {
    var buttons = document.getElementsByClassName("custom-button");
    
    // Remove 'active' class from all buttons
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove("active");
    }
    
    // Add 'active' class to the clicked button
    document.getElementById(option).classList.add("active");
  }
  