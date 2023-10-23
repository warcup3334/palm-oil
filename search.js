document.addEventListener("DOMContentLoaded", function() {
    const searchForm = document.getElementById("search-form");
    const searchInput = document.getElementById("search-input");

    searchForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const query = searchInput.value.trim();
        if (query !== "") {
            // Redirect to search_form.php with the query as a parameter
            window.location.href = `search_form.php?query=${encodeURIComponent(query)}`;
        }
    });
});