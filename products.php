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

// Fetch product ID from URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Query to get the product details
    $sql = "SELECT * FROM products WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch product details as an associative array
        $product = $result->fetch_assoc();
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
    <link rel="stylesheet" href="nv-ft.css" >
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="website icon" href="image/GamesHeavenn.png">

    <title>Document</title>
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
       
        <ul class="nav-links">

            <li><a href="Search.php" id="search_icon"><i class="fa-solid fa-magnifying-glass"
            style="color: antiquewhite; font-size: 33px;"></i></a></li>
            <li> <a href="Playstation.php"><i class="fa-brands fa-playstation fa-2xl" style="font-size: 40px;"></i></a>
            </li>
            <li> <a href="Xbox.php"><i class="fa-brands fa-xbox fa-2xl"
                        style="color: #14b383; font-size: 40px;"></i></a>
            </li>
            <li> <a href="Nintendo.php"><img src="image/4518902_nintendo_switch_icon.svg" width="67px"
                        height="67px"></a> </li>
            <li id="pcc"> <a href="PC.php" style="padding: 0px;"><img src="image/image (3).png" width="67px"
                        height="67px"></a> </li>
           
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

    <div class="Produc-container">
                    <div class="row">
                        <div class="column-1">
                            <img src="<?php echo htmlspecialchars($product['Main-img']); ?>" width="100%" id="ProductImg">
        
                            <div class="small-img-row">
                                <div class="small-img-col">
                                    <img src="<?php echo htmlspecialchars($product['Main-img']); ?>" alt="" width="100%" class="small-img">
                                </div>
                                <div class="small-img-col">
                                    <img src="<?php echo htmlspecialchars($product['Small-img2']); ?>" alt="" width="100%" class="small-img">
                                </div>
                                <div class="small-img-col">
                                    <img src="<?php echo htmlspecialchars($product['Small-img3']); ?>" alt="" width="100%" class="small-img">
                                </div>
                                <div class="small-img-col">
                                    <img src="<?php echo htmlspecialchars($product['Small-img4']); ?>" alt="" width="100%" class="small-img">
                                </div>
                                
                            </div>
        
                          
        
        
                        </div>
                        
                    </div>
                    <div class="column-2">
                        <p> <a href="index.html">Home</a>/<a href="Search.css">Games</a></p>
                        <h1 id="Game-Name"><?php echo htmlspecialchars($product['Name']); ?></h1>
                        <h4> <a href="#reviews"> Reviews </a></h4>
                        <h5 class="avaliblty" >Availability status: Available</h5>
                        <h4><?php echo htmlspecialchars($product['Price']); ?> SR</h4>
                        <h4>Platform: <?php echo htmlspecialchars($product['Platform']); ?></h4>
                        <div class="Quantity">
                            <h4>Quantity: </h4><input type="number" id="quantity" value="1"> 
                        </div>
                        <button class="btn" type="submit"> <a>Add to cart</a> </button>
                        <br>
                        <p id="Description-p"><?php echo htmlspecialchars($product['Description'])?></p>
                    </div>
                </div>
                <br><br>
                            

                <div id="reviews" class="reviews-list">
                  <div class="reviews-header">
                        <h2>Reviews</h2>
                    <div class="stars" style="color: gold; margin-left: 10px;">
                            <span>&#9733;</span> <!-- Filled star -->
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                            <span class="empty">&#9733;</span> <!-- Empty star -->
                            <span class="empty">&#9733;</span>
                    </div>
                  </div>
                        <div class="review-item"><strong>Emma</strong> <div class="stars" style="color: gold; margin-left: 10px;">
                            <span>&#9733;</span> <!-- Filled star -->
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                            <span class="empty">&#9733;</span> <!-- Empty star -->
                            <span class="empty">&#9733;</span>
                    </div>: Great multiplayer experience.</div>
                            <hr>
                        <div class="review-item"><strong>Frank</strong> <div class="stars" style="color: gold; margin-left: 10px;">
                            <span>&#9733;</span> <!-- Filled star -->
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                            <span class="empty">&#9733;</span> <!-- Empty star -->
                            <span class="empty">&#9733;</span>
                    </div>: I love the campaign mode!</div>
                            <hr>
                </div>

            
        <div class="related-p">
            <div class="row">
                <h2>Related product</h2>
                <p> <a href="Search.php">View More</a></p>
                <br>
                <div class="home_img">
                <table data-platform="Playstation" data-Genre="Sport">
                <tr>
                    <td>
                        <a href="Products.php" class="game-link" data-id="1">
                            <img src="image/FC25.avif">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="Products.php" class="game-link" data-id="1">
                            <h4>FC25</h4>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a>
                            <h5>280.0SR</h5>
                        </a>
                    </td>
                </tr>
            </table>
            

            <table>
                <tr>
                    <td><a href="products.php" class="game-link" data-id="2"> 
                        <img src="image/modern_warfare_III.jpeg"> </a></td>
                </tr>
                <tr>
                    <td> <a href="products.php" class="game-link" data-id="2">
                            <h4>modern warfare III</h4>
                        </a> </td>
                </tr>
                <tr>
                    <td>
                        <h5>230.0SR</h5>
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td><a href="products.php" class="game-link" data-id="3"> 
                        <img src="image/Black_ops6.avif"> </a></td>
                </tr>
                <tr>
                    <td> <a href="products.php" class="game-link" data-id="3">
                            <h4>Black ops6</h4>
                        </a> </td>
                </tr>
                <tr>
                    <td>
                            <h5>300.0SR</h5>
                        </td>
                </tr>
            </table>


            <table>
                <tr>
                    <td> <a href="products.php" class="game-link" data-id="4"> 
                        <img src="image/Red_dead_II.avif"> </a></td>
                </tr>
                <tr>
                    <td> <a href="products.php" class="game-link" data-id="4">
                            <h4>Red dead</h4>
                        </a> </td>
                </tr>
                <tr>
                    <td>
                        <h5>200.0SR</h5>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><a href="product.css" class="game-link" data-id="7"> 
                        <img src="image/GTA_V.JPEG"> </a></td>
                </tr>
                <tr>
                    <td> <a href="products.php" class="game-link" data-id="7">
                            <h4>GTAV</h4>
                        </a> </td>
                </tr>
                <tr>
                    <td>
                        <h5>180.0SR</h5>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><a href="products.php" class="game-link" data-id="8"> 
                        <img src="image/Elde_Ring.JPEG"> </a></td>
                </tr>
                <tr>
                    <td> <a href="products.php" class="game-link" data-id="8">
                            <h4>Elden Ring</h4>
                        </a> </td>
                </tr>
                <tr>
                    <td>
                        <h5>240.0SR</h5>
                    </td>
                </tr>
            </table>
                </div>
        
            </div>

        </div>
        <br><br><br><br>
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
<script src="product-imgs.js"></script>
<script src="menu.js"></script>
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
        echo "<p>Product not found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>No product ID provided.</p>";
}

$conn->close();
?>

