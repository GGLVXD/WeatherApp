
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