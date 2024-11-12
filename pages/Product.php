<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Product</title>
</head>
<style>
     .product-container {
          display: flex;
          flex-wrap: wrap;
          gap: 16px;
          margin-top: 50px;
          justify-content: start;
          margin-left: 15px;
     }

     .product-box {
          border: 1px solid #ddd;
          padding: 16px;
          width: 250px;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          text-align: center;
     }

     .product-image {
          width: 100%;
          height: 300px;
          margin-bottom: 8px;
     }

     .product-title {
          font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
          font-size: 12px;
          font-weight: bold;
          margin-bottom: 8px;
          text-align: left;
     }

     .product-category,
     .product-description,
     .product-price,
     .product-rating {
          font-size: 14px;
          margin-bottom: 8px;
          text-align: left;

     }

     .loader {
          width: 100%;
          height: 500px;
          display: flex;
          justify-content: center;
          align-items: center;
     }
</style>


<body>
     <?php 
      include_once "../Database/connectivity.php";
     ?>
     <?php include "./header.php"; ?>

     <?php include "./Navbar.php"; ?>

     <div id="product-container" class="product-container"></div>

     <?php include "./footer.php" ?>

     <script>

          const fetchData = async (data) => {
               const productContainer = document.getElementById('product-container');

               productContainer.innerHTML =
                    `
                         <div class="loader">
                              <img src="http://localhost/project/assets/img/loader/loading.svg" alt=""/>
                         </div>
                    `;

               const URL = `https://fakestoreapi.com/products/category/${data}`;

               try {
                    const response = await fetch(URL);
                    const products = await response.json();

                    // Select the container to display products
                    const productContainer = document.getElementById('product-container');
                    productContainer.innerHTML = ''; // Clear previous content

                    // Loop through each product and create a box
                    products.forEach(product => {
                         // Create product box
                         const productBox = document.createElement('div');
                         productBox.className = 'product-box';

                         // Set product box content
                         productBox.innerHTML = `
                <img src="${product.image}" alt="${product.title}" class="product-image">
                <h3 class="product-title">${product.title}</h3>
                <p class="product-category">Category: ${product.category}</p>
                
                <p class="product-price">Price: $${product.price}</p>
                <p class="product-rating">Rating: ${product.rating.rate} (${product.rating.count} reviews)</p>

                   <button class="btn btn-lg mt-5 btn-primary">Add to Cart</button>
                   <button class="btn btn-lg mt-5 btn-success">Share</button>
                   <button class="btn btn-lg mt-5 btn-dark">Wishlist</button>
                  
            `;

                         //   <p class="product-description">${product.description}</p>
                         // Append product box to the container
                         productContainer.appendChild(productBox);
                    });
               } catch (error) {
                    console.log(error);
               }
          };


          // Get the query parameters from the URL
          const urlParams = new URLSearchParams(window.location.search);

          // Get the value of the 'category' parameter
          const category = urlParams.get('category');

          if (category) {
               // Call fetchData with the category value
               fetchData(category);
          }


     </script>

</body>

</html>