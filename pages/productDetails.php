<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../assets/css/allProducts.css">
     <title>Product Details</title>
</head>

<style>
     /* Center the container */
     #phone-details-container {
          display: flex;
          justify-content: start;
          padding: 20px;
          align-items: start;
          width: 80%;
          border: 1px solid red;
          margin: auto;
     }

     .main_div {
         
     }

     /* Style for the phone item */
     .phone-item {
          border: 1px solid #ddd;
          border-radius: 10px;
          overflow: hidden;
          transition: box-shadow 0.3s ease;
     }

     .phone-item:hover {
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
     }

     /* Card image styling */
     .card-img-top {
          border-radius: 10px 10px 0 0;
          max-width: 100%;
          height: auto;
     }

     /* Title and description styling */
     .card-title {
          font-size: 1.5rem;
          font-weight: 600;
          color: #333;
     }

     .text-muted {
          color: #6c757d !important;
     }

     .card-text {
          font-size: 0.9rem;
          color: #555;
     }

     /* Price and buttons styling */
     .font-weight-bold {
          font-weight: 700;
     }

     .btn-primary {
          background-color: #007bff;
          border: none;
          font-size: 0.9rem;
     }

     .btn-warning {
          color: #fff;
          background-color: #ffc107;
          border: none;
          font-size: 0.9rem;
     }

     .btn:hover {
          opacity: 0.9;
          cursor: pointer;
     }

     .back-button {
          display: inline-flex;
          align-items: center;
          padding: 8px 16px;
          font-size: 16px;
          color: #333;
          background-color: #f1f1f1;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          margin-bottom: 20px;
          transition: background-color 0.3s;
     }

     .back-button i {
          margin-right: 8px;
          font-size: 18px;
     }

     .back-button:hover {
          background-color: #ddd;
     }
</style>

<body>

     <?php include_once "../Database/connectivity.php"; ?>
     <?php include "./header.php";
     ?>

     <?php include "./Navbar.php";
     ?>

     <div class="back-button p-2">
          <a class="btn btn-lg btn-danger p-3" href="http://localhost/project/pages/allProducts.php"> <i
                    class="fas fa-arrow-left"></i> Back to Product</a>
     </div>
     <div id="phone-details-container">
     </div>


     <script>
          // Function to get the query parameter by name
          function getQueryParam(name) {
               const urlParams = new URLSearchParams(window.location.search);
               return urlParams.get(name);
          }

          // Function to fetch and display phone details
          async function fetchPhoneDetails() {
               const id = getQueryParam('id'); // Get the phone ID from the URL
               const url = `https://dummyjson.com/products`; // Adjust URL as needed

               try {
                    const response = await fetch(url);
                    if (!response.ok) {
                         throw new Error(`Error: ${response.status}`);
                    }

                    const data = await response.json();
                    const products = data.products;

                    // Find the product with the matching ID
                    const product = products.find(item => item.id === parseInt(id));
                    console.log(product);
                    if (product) {
                         displayPhoneDetails(product); // Display the product details
                    } else {
                         console.error("Product not found");
                    }
               } catch (error) {
                    console.error('Error fetching details:', error);
               }
          }

          // Function to display phone details
          function displayPhoneDetails(phone) {
               const detailsContainer = document.getElementById('phone-details-container');
               detailsContainer.innerHTML = ""; // Clear previous content

               // Create HTML structure with Bootstrap classes and custom styling
               let phoneItem = document.createElement('div');
               phoneItem.classList.add('phone-item', 'card', 'shadow', 'p-3', 'mb-5', 'rounded');
               phoneItem.style.width = "300px";
               // phoneItem.style.margin = "auto";

               phoneItem.innerHTML = `
               <div class="main_div">
                    <div class="product">
                         <h2 class="card-title text-center">${phone.title}</h2>
                         <img src="${phone.images[0]}" alt="${phone.name}" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                         <div class="card-body">
                              <h4 class="text-muted">${phone.category}</h4>
                              <p class="card-text">${phone.description}</p>
                              <p class="card-text text-success font-weight-bold">Price: $${phone.price}</p>
                              <div class="d-flex justify-content-start mt-3">
                                   <button class="btn btn-success">Order Now</button>
                              </div>
                         </div>
                    </div>

                    <div class="about_product">
                         <h4>${phone.availabilityStatus}</h4>
                         <></>
                         <></>
                         <></>
                         <></>
                         <></>
                         <></>
                         <></>
                         <></>
                    </div>
               </div>
               `;

               // Append the newly created phone item to the container
               detailsContainer.appendChild(phoneItem);
          }

          // Call the fetch function to get phone details when the page loads
          fetchPhoneDetails();

     </script>
</body>

</html>