document.addEventListener("DOMContentLoaded", () => {
    const genreSelect = document.getElementById("Genre");
    const priceRange = document.getElementById("Price");
    const priceValueDisplay = document.getElementById("PriceValue");
    const filterButton = document.querySelector(".main-filter button[type='submit']");

    // Update the displayed price range dynamically
    priceRange.addEventListener("input", () => {
        priceValueDisplay.textContent = priceRange.value; // Update displayed price value
    });

    // Apply filter when the button is clicked
    filterButton.addEventListener("click", () => {
        const selectedGenre = genreSelect.value;
        const maxPrice = parseInt(priceRange.value, 10); // Convert to integer

        // Select all tables containing game information
        const tables = document.querySelectorAll(".home_img table");

        tables.forEach((table) => {
            const itemPriceText = table.querySelector("h5").textContent.trim(); // Get price text
            const itemPrice = parseInt(itemPriceText.replace("SR", ""), 10); // Extract numerical price

            const itemGenre = table.getAttribute("data-genre");
            const itemPlatform = table.getAttribute("data-platform");

            // Check for matches based on selected filters
            const genreMatch = selectedGenre === "All" || selectedGenre === itemGenre;
            const priceMatch = itemPrice <= maxPrice;

            // Show or hide the table based on filter criteria
            if (genreMatch && priceMatch) {
                table.style.display = ""; // Show
            } else {
                table.style.display = "none"; // Hide
            }
        });
    });
});
