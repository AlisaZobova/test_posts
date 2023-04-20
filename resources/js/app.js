import './bootstrap';

document.querySelectorAll('a[href="'+document.URL+'"]').forEach(link => link.className += ' current-link');

