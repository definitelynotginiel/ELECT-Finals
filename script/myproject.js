const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});

var userFirstName = "<?php echo $firstName; ?>";
var userLastName = "<?php echo $lastName; ?>";
var profileIconPath = "<?php echo $profileIcon; ?>"; 

function toggleIcon() {
  const icon = document.getElementById('dropdownIcon');
  if (icon.classList.contains('fa-chevron-left')) {
      icon.classList.remove('fa-chevron-left');
      icon.classList.add('fa-chevron-down');
      icon.classList.add('rotate-down'); // Add rotation class
  } else {
      icon.classList.remove('fa-chevron-down');
      icon.classList.add('fa-chevron-left');
      icon.classList.remove('rotate-down'); // Remove rotation on toggle back
  }
}