const links = document.querySelectorAll('.link-item');

links.forEach(link => {
    link.addEventListener('click', function(event) {
        if (link.getAttribute('href') && link.getAttribute('href') !== '#') {
            return;
        }
        event.preventDefault();

        links.forEach(link => link.classList.remove('border-b-2', 'text-gray-700', 'border-green-600', 'pb-4'));

        link.classList.add('border-b-2', 'text-gray-700', 'border-green-600', 'pb-4');
    });
});
