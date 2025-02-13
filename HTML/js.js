function searchRoutes() {
    const searchTerm = document.getElementById('searchBar').value.toLowerCase();
    const Routes = document.querySelectorAll('.Routes');

    Routes.forEach(Routes => {
        const RouteName = Routes.querySelector('h3').textContent.toLowerCase();
        if (RoutesName.includes(searchTerm)) {
            Routes.style.display = '';
        } else {
            Routes.style.display = 'none';
        }
    });
}

