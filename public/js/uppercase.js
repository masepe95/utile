document.addEventListener("DOMContentLoaded", function () {
    const searchField = document.querySelector(
        "[data-filament-global-search-input]"
    );

    if (searchField) {
        searchField.addEventListener("input", function () {
            this.value = this.value.toUpperCase();
            searchField.addEventListener("keyup", function () {
                console.log(this.value);
            });
        });
    }
});
