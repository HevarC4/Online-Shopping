const links = document.querySelectorAll('.link-item');

links.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        // Remove active class from all links
        links.forEach(link => link.classList.remove('border-b-2', 'text-gray-700', 'border-green-600', 'pb-4'));

        // Add active class to the clicked link
        link.classList.add('border-b-2', 'text-gray-700', 'border-green-600', 'pb-4');
    });
});
