
// for the refrence https://www.amitmerchant.com/update-url-query-parameters-as-you-type-in-the-input-using-javascript/
const input =
    document.getElementById('searchInput') ||
    document.getElementById('searchinput') ||
    document.querySelector('.search-input');

if (input) {
    const url = new URL(window.location.href);
    // input
    input.value = url.searchParams.get('q') || '';

    input.addEventListener('input', (e) => {
        const q = e.target.value.trim();

        if (q) {
            url.searchParams.set('q', q);
        } else {
            url.searchParams.delete('q');
        }

        // update
        window.history.replaceState({}, '', url);
    });
}

function toggleTheme() {
    var body = document.body;
    var button = document.querySelector('.theme-switcher-button');
    var icon = button.querySelector('i');
    var isDarkMode = body.classList.contains('dark-mode');
    
    if (isDarkMode == true) {
        body.classList.remove('dark-mode');
        icon.className = 'fa-regular fa-moon';
        button.innerHTML = '<i class="fa-regular fa-moon"></i> Dark';
        localStorage.setItem('theme', 'light');
    } else {
        body.classList.add('dark-mode');
        icon.className = 'fa-solid fa-sun';
        button.innerHTML = '<i class="fa-solid fa-sun"></i> Light';
        localStorage.setItem('theme', 'dark');
    }
}

window.onload = function() {
    var savedTheme = localStorage.getItem('theme');
    var button = document.querySelector('.theme-switcher-button');
    
    if (savedTheme == 'dark') {
        document.body.classList.add('dark-mode');
        button.innerHTML = '<i class="fa-solid fa-sun"></i> Light';
    } else {
        document.body.classList.remove('dark-mode');
        button.innerHTML = '<i class="fa-regular fa-moon"></i> Dark';
    }
};