function filterGames(platform) {
  var allGames = document.querySelectorAll(".game-card");
    allGames.forEach((game) => {
        game.style.display = game.classList.contains(platform) ? "block" : "none";
      });
    
  
    
}
