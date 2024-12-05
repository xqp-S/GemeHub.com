document.addEventListener("DOMContentLoaded", () => {
  const platformSelect = document.getElementById("platform");
  const genreSelect = document.getElementById("Genre");
  const priceRange = document.getElementById("Price");
  const priceValueDisplay = document.getElementById("PriceValue");
  const filterButton = document.getElementById("btn");

  // Update the displayed price range dynamically
  priceRange.addEventListener("input", () => {
    priceValueDisplay.textContent = priceRange.value;
  });

  // Apply filter when the button is clicked
  filterButton.addEventListener("click", () => {
    const selectedPlatform = platformSelect.value;
    const selectedGenre = genreSelect.value;
    const maxPrice = parseInt(priceRange.value, 10);

    // Select all tables containing game information
    const tables = document.querySelectorAll(".home_img table");

    tables.forEach((table) => {
      const itemPriceText = table.querySelector("h5").textContent.trim(); // Get price text
      const itemPrice = parseInt(itemPriceText.replace("SR", ""), 10); // Extract numerical price

      const itemGenre = table.getAttribute("data-Genre");
      const itemPlatform = table.getAttribute("data-platform");

      // Check for matches based on selected filters
      const platformMatch = selectedPlatform === "All" || selectedPlatform === itemPlatform;
      const genreMatch = selectedGenre === "All" || selectedGenre === itemGenre;
      const priceMatch = !isNaN(itemPrice) && itemPrice <= maxPrice;

      // Show or hide the table based on filter criteria
      if (platformMatch && genreMatch && priceMatch) {
        table.style.display = ""; // Show
      } else {
        table.style.display = "none"; // Hide
      }
    });
  });
});
