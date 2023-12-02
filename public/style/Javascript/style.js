//dropdown
  document.addEventListener('DOMContentLoaded', function() {
    var dropdownButtons = document.querySelectorAll('.dropdown-toggle');
    var dropdownMenus = document.querySelectorAll('.dropdown-menu');

    dropdownButtons.forEach(function(button, index) {
      button.addEventListener('click', function() {
        dropdownMenus[index].classList.toggle('show');
      });
    });

    document.addEventListener('click', function(event) {
      var isClickInside = false;
      dropdownButtons.forEach(function(button) {
        if (button.contains(event.target)) {
          isClickInside = true;
        }
      });

      if (!isClickInside) {
        dropdownMenus.forEach(function(menu) {
          menu.classList.remove('show');
        });
      }
    });
  });