document.addEventListener('click', function () {

	if (!event.target.classList.contains('nav-link')) return;
	event.target.classList.add('active');
	var links = document.querySelectorAll('.nav-link');
	for (var i = 0; i < links.length; i++) {
		if (links[i] === event.target) continue;
		links[i].classList.remove('active');
	}
  
}, false);
