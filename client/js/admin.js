// Get the menu admin element
const menuAdmin = document.querySelector('.menu-admin');

// Get the content element
const content = document.querySelector('.content');

// Toggle the menu admin
menuAdmin.addEventListener('click', function() {
  menuAdmin.classList.toggle('active');
});

// Show the content when the menu admin is closed
menuAdmin.addEventListener('mouseleave', function() {
  content.classList.remove('hidden');
});

// Hide the content when the menu admin is opened
menuAdmin.addEventListener('mouseenter', function() {
  content.classList.add('hidden');
});
