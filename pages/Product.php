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
     .order {
        margin-top: 30px;
        /* border: 1px solid #2c8f2c; */
        text-align: center;
        background-color: #FB641B;
        padding: 5px;
        border-radius: 3%;
    }

    .order i {
        color: while;
        font-size: 20px;
    }

    .order h4 {
        color: white;
        /* font-size: 20px; */
        font-weight: bold;
    }
     .order_detail {
        margin-top: 10px;
        display: flex;
        justify-content: center;
        align-items: top;
        text-align: center;
    }

    .order_detail button {
        font-size: 12px;
        font-weight: 500;
        border: 1px solid #ccc;
        padding: 8px;
        border-radius: 100%;
    }

    .order_detail i {
        font-size: 15px;
        color: white;
    }

/* --------------------------- */

    .Wishlist {
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
    }

    .Wishlist button {
        font-size: 12px;
        font-weight: 500;
        border: 1px solid #ccc;
        padding: 8px;
        border-radius: 100%;
    }

    .Wishlist i {
        font-size: 15px;
        color: red;
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
                <div>
                         <form class="Wishlist" method="POST" action="http://localhost/project/Database/Add_wishlist.php">
                              <button type="button" class="wishlist" data-id="${product.id}"> 
                                   <i class="fas fa-heart"></i>
                              </button>
                              <button class="btn btn-lg"><i class="fas fa-share" style="color:black"></i></button
                        </form>
               
                        </div>
                <img src="${product.image}" alt="${product.title}" class="product-image">
                <h3 class="product-title">${product.title}</h3>
                <p class="product-category">Category: ${product.category}</p>
                
                <p class="product-price">Price: $${product.price}</p>
                <p class="product-rating">Rating: ${product.rating.rate} (${product.rating.count} reviews)</p>

                  <div>
                          <button class="btn btn-lg mt-5 btn-primary">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                         <button class="btn btn-lg mt-5 btn-warning">More details  <i class="fas fa-info-circle"></i></button>
                         
                  </div>
                  <div class="order">
                             <h4 type="button" class="order_detail">
                                Place Order &nbsp;&nbsp;
                                <i class="fas fa-shopping-bag"></i>
                            </h4>
                    </div>
                  
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