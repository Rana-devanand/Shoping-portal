<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All products</title>
    <link rel="stylesheet" href="http://localhost/project/assets/css/allProducts.css">
</head>
<body>
    <?php include "./header.php"; ?>

    <?php
    include_once "../Database/connectivity.php";
    
    $cartIds = [];
    
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $query = "SELECT cart_id FROM `user_cart` WHERE `userid` ='$id'";
        $result = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cartIds[] = $row["cart_id"];
            }
        }
    } else {
        echo "<script>alert('User not logged in');</script>";
    }
    
    echo "<script>const userCartIds = " . json_encode($cartIds) . ";</script>";
    ?>

    <?php include "./Navbar.php"; ?>
    <div id="phone-container" class="phone-container"></div>

    <?php include "./footer.php" ?>

    <script>
        console.log("User Cart IDs from PHP:", userCartIds);

        const url = 'https://dummyjson.com/products';

        async function fetchPhoneDetails() {
            const phoneContainer = document.getElementById('phone-container');

            phoneContainer.innerHTML = `
                <div class="loader">
                    <img src="http://localhost/project/assets/img/loader/loading.svg" alt=""/>
                </div>
            `;

            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }
                const data = await response.json();
                const products = data.products;
                displayPhoneData(products);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        function displayPhoneData(data) {
            const phoneContainer = document.getElementById('phone-container');
            phoneContainer.innerHTML = '';

            data.forEach(phone => {
                const isAdded = userCartIds.includes(phone.id.toString());

                let phoneItem = document.createElement('div');
                phoneItem.classList.add('phone-item');

                phoneItem.innerHTML = `
                    <h2>${phone.title}</h2>
                    <img src="${phone.images[0]}" alt="${phone.name}">
                    <h4>${phone.category}</h4>
                    <p>${phone.description}</p>
                    <p>Price: ${phone.price}</p>
                    <hr>
                    <form method="POST" action="http://localhost/project/Database/add_to_cart.php">
                        <button type="button" class="add-to-cart btn btn-lg ${isAdded ? 'btn-success' : 'btn-primary'}"
                                data-id="${phone.id}">
                            ${isAdded ? 'Added' : 'Add to Cart'}
                        </button> &nbsp; &nbsp;
                        <button type="button" class="more-details btn btn-lg btn-warning" data-id="${phone.id}">More details</button> 
                    </form>      
                `;

                phoneContainer.appendChild(phoneItem);
            });

            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');

                    fetch('http://localhost/project/Database/add_to_cart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `cart_id=${productId}`,
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);
                        this.textContent = 'Added';
                        this.classList.replace('btn-primary', 'btn-success');
                        this.disabled = true; // Disable the button to prevent duplicate additions
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });

            document.querySelectorAll('.more-details').forEach(button => {
                button.addEventListener('click', () => {
                    const id = button.getAttribute('data-id');
                    window.location.href = `productDetails.php?id=${id}`;
                });
            });
        }

        fetchPhoneDetails();
    </script>
</body>
</html>
