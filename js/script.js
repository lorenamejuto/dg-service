var $navItem = document.querySelectorAll('.nav-item');

$navItem.forEach(function(item) {
  item.addEventListener('click', function(event) {
    console.log(item.nextSibling)
  });
});
