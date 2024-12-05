<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Update with your username
$password = "";     // Update with your password
$dbname = "cs378";  // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all products
$sql = "SELECT * FROM products WHERE Platform = 'Nintendo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
            <link rel="stylesheet" href="Search.css">
            <link rel="stylesheet" href="nv-ft.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="website icon" href="image/GamesHeavenn.png">
        <title>All Products</title>
    </head>
    <body>
    <nav>
        <div class="logo">
            <a href="index.html"> <img src="image/GamesHeavenn.png" width="80px" height="80px"
                    style="border-radius: 120px; margin: 15px 10px;"></a>

        </div>
        <div class="hamburger">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="Search">
            <input type="text" placeholder="Search..." style="height: 20px; width: 200px; ">
            <button id="myButton" type="submit" style="width: 20px; height: 20px;"><a href="Search.php"><i class="fa-brands fa-searchengin "
                style="color: black; position: relative; bottom: 2px; font-size: 20px;"></i></a></button>
        </div>
        <ul class="nav-links">

            <li> <a href="Playstation.php"><i class="fa-brands fa-playstation fa-2xl" style="font-size: 40px;"></i></a>
            </li>
            <li> <a href="Xbox.php"><i class="fa-brands fa-xbox fa-2xl"
                        style="color: #14b383; font-size: 40px;"></i></a>
            </li>
            <li> <a href="Nintendo.php"><img src="image/4518902_nintendo_switch_icon.svg" width="67px"
                        height="67px"></a> </li>
            <li id="pcc"> <a href="PC.php" style="padding: 0px;"><img src="image/image (3).png" width="67px"
                        height="67px"></a> </li>
            <li><a href="Search.php" id="search_icon"><i class="fa-solid fa-magnifying-glass"
                        style="color: antiquewhite; font-size: 33px;"></i></a></li>
            <li> <a href="#move_C">
                    <h5 style="color: antiquewhite; font-size: 15px; font-weight: 40px; ">ContactUs</h5>
                </a> </li>
            <li> <a href="login.html">
                    <h5 style="color: antiquewhite; font-size: 15px; font-weight: 40px;">Login</h5>
                </a></a> </li>
            <li> <a href="login.html"><i class="fa-regular fa-user "
                        style="color: antiquewhite; margin: 0px 15px"></i></a> </li>
            <li> <a class="nav-cta-button" href="shopingcart.html"><i class="fa-solid fa-cart-shopping "
                        style="color: antiquewhite; margin: 0px 15px"></i></a> </li>
        </ul>
    </nav>




        <section class="main">
        <div class="Home_Catogery">
            <h1>Nintendo games &nbsp;</h1>
            <hr style="color: black; border: 0.3px solid;">
        </div>
        <br>
        <div class="filter-content">
        <div class="main-filter">
                <h2>Shopping options</h2>
                <hr>
                <br>

                <div class="filter-section">
                    <label for="Genre">Genre: </label>
                    <select id="Genre" name="Genre">
                        <option value="All">All</option>
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Sport">Sport</option>
                        <option value="Horror">Horror</option>
                        <option value="Shooter">Shooter</option>
                    </select>
                    <hr>
                </div>


                <div class="filter-section">
                    <label for="Price">Price Range: </label>
                    <input type="range" id="Price" name="Price" min="0" max="400" value="50"
                        oninput="updatePriceLabel(this.value)">
                    <span id="PriceValue">50</span> SA
                </div>

                <button type="submit">Apply Filters</button>

            </div>
            
            
            <div class="home_img"> 
                <?php
                // Loop through all products and display them
                
                while ($product = $result->fetch_assoc()) {
                    ?>
                    
                    <table data-platform="<?php echo htmlspecialchars($product['Platform']); ?>" data-Genre="<?php echo htmlspecialchars($product['Genre']); ?>">
                    <tr>
                        <td><a href="products.php"> <img src="<?php echo htmlspecialchars($product['Main-img']); ?>" class="game-link" data-id="<?php echo htmlspecialchars($product['ID']); ?>"> </a></td>
                    </tr>
                    <tr>
                        <td> <a href="products.php" class="game-link" data-id="<?php echo htmlspecialchars($product['ID']); ?>">
                                <h4><?php echo htmlspecialchars($product['Name']); ?></h4>
                            </a> </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="card-text"><?php echo htmlspecialchars($product['Price']);  ?>SR</h5>
                        </td>
                    </tr>
                </table>
                
                
                    <?php
                }
                ?>
               </div>
            </div>
            
            
        

        </section>
        

        <footer>
        <table >
            <tbody>

                <tr>
                    <td class="logo"><a href="#"> <img src="image/GamesHeavenn.png"></a></td>
                </tr>
                <tr>
                    <td>
                        <div class="table_head">
                            <h1>Overview</h1>
                            <h1>Contact us</h1>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table_head">
                            <h3 class="Overview-element" id="move_O"><a href="aboutus.html">About us</a></h3>
                            <h3 class="Contact-element" id="move_C">Email:<a href="mailto">Badgahish@gmail.com</a></h3>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="table_head">
                            <h3 class="Overview-element" id="move_O"><a href="Return.html">Return policies</a></h3>
                            <h3 class="Contact-element" id="move_C">Phone number: <a href="number">+966567176142</a>
                            </h3>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>

    </body>
    <script src="menu.js"></script>
    <script src="platforms-filter.js"></script>
    <script>
    document.querySelectorAll('.game-link').forEach((link) => {
        link.addEventListener('click', (event) => {
            const gameId = link.getAttribute('data-id'); // Get the game's ID
            event.preventDefault(); // Prevent the default redirection
            window.location.href = `products.php?id=${gameId}`; // Redirect with the query parameter
    });
});
</script>
    </html>
    <?php
} else {
    echo "<p>No products found in the database.</p>";
}

$conn->close();
?>
