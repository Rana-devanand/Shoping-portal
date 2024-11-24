<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" href="http://localhost/project/assets/css/allProducts.css">

</head>

<style>
     .place-order {
          margin-top: 20px;
          display: flex;
          justify-content: space-between;
          align-items: top;
          text-align: start;
     }
     .image{
          width: 500px;
          /* position: absolute; */
     }

     .place-order img {
          /* border: 1px solid red; */
          width: 500px;
          height: 500px;
          /* object-fit: cover;           */

     }
     .order-description{
          /* position: relative; */
     }

     .order-description b {
          font-size: 15px;
          margin-top: 10px;
          font-family: 'Times New Roman', Times, serif;
     }

     .order-description h1 {
          font-size: 25px;
          font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     }

     .order-description h3 {
          font-size: 13px;
          font-family: 'Times New Roman', Times, serif;

     }
     .order-description h2 {
          padding: 5px;
          font-size: 28px;
          font-family: 'Times New Roman', Times, serif
     }

     .Reviews li {
          list-style-type: none;
          padding: 2px;
          font-size: 15px;
          font-family: 'Times New Roman', Times, serif;
     }

     .rate {
          background-color: #388E3C;
          width: fit-content;
          color: #fff;
          padding: 3px;
     }

     .Reviews ul {
          /* border: 1px solid red; */
          display: flex;
          flex-direction: column;
          /* justify-content: space-between;
          align-items: top;
          text-align: start;*/
     }
     span{
          font-family:Georgia, 'Times New Roman', Times, serif;
     }

     /* CSS */
     .button-container {
          text-align: center;
          margin-top: 20px;
     }

     .buy-now-btn {
          background-color: #ff5722;
          /* Vibrant orange */
          color: #fff;
          /* White text */
          border: none;
          border-radius: 25px;
          padding: 10px 20px;
          font-size: 18px;
          font-weight: bold;
          cursor: pointer;
          transition: all 0.3s ease-in-out;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
     }

     .buy-now-btn:hover {
          background-color: #e64a19;
          /* Slightly darker orange */
          transform: scale(1.05);
          /* Slight zoom effect */
          box-shadow: 0 7px 20px rgba(0, 0, 0, 0.3);
          /* Enhanced shadow on hover */
     }

     .buy-now-btn:active {
          transform: scale(0.95);
          /* Slightly shrink on click */
          box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
          /* Reduced shadow on click */
     }

     /* Add to Cart  */
     .add-cart-btn {
          background-color: #FF9F00;
          /* Vibrant orange */
          color: #fff;
          /* White text */
          border: none;
          border-radius: 25px;
          padding: 10px 20px;
          font-size: 18px;
          font-weight: bold;
          cursor: pointer;
          transition: all 0.3s ease-in-out;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
     }

     .add-cart-btn:hover {
          background-color: #FF9F00;
          /* Slightly darker orange */
          transform: scale(1.05);
          /* Slight zoom effect */
          box-shadow: 0 7px 20px rgba(0, 0, 0, 0.3);
          /* Enhanced shadow on hover */
     }
     .add-cart-btn:active {
          transform: scale(0.95);
          /* Slightly shrink on click */
          box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
          /* Reduced shadow on click */
     }
     
</style>

<body>
     <?php include "./header.php"; ?>
     <?php include_once "../Database/connectivity.php"; ?>
     <?php include "./Navbar.php"; ?>

     <div class="order-details">

     </div>

     <?php include "./footer.php" ?>

     <script>
          // Get the current URL's query string
          const queryString = window.location.search;

          // Create a URLSearchParams object
          const urlParams = new URLSearchParams(queryString);

          // Retrieve the 'id' parameter
          const id = urlParams.get('id');


          const fetchData = async () => {
               const url = "https://dummyjson.com/products";
               document.querySelector('.order-details').innerHTML = `
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
                    console.log(products);
                    for (const product of products) {
                         if (product.id === parseInt(id)) {
                              displayPhoneDetails(product);
                              break;
                         }

                    }
               } catch (error) {
                    console.error('Error fetching data:', error);
               }
          }

          displayPhoneDetails = (id) => {
               const availabilityColor = id.availabilityStatus === 'Low Stock' ? 'red' : 'green';
               // Display the phone details here
               // Example:
               document.querySelector('.order-details').innerHTML = `
                         <div class="place-order">
                              <div class="image">
                                   <img src="${id.images[0]}" alt="${id.name}">
                                   <div class="button-container">
                                        <a href="http://localhost/project/pages/Delivery.php?id=${id.id}">
                                             <button class="buy-now-btn">Buy Now
                                             </button>
                                        </a>
                                         &nbsp; &nbsp;
                                        <button class="add-cart-btn">Add to Cart</button>
                                   </div>    
                              </div>
                         <div class="order-description">
                              <b style="color : ${availabilityColor}">Availability Status :${id.availabilityStatus}</b>
                                   <h1>${id.title}</h1>
                                   <h3><span>Rating :</span> ${id.rating}</h3>
                                   <h3><span>Stocks :</span> ${id.stock}</h3>
                                  
                                   <h3><span>Order Quantity :</span> ${id.minimumOrderQuantity}</h3>    
                                   <b><span>Special Price:<h2 style="color:green"> $ ${id.price}</h2></span></b>

                                   <h5 style="margin-top:20px ;font-size:18px">Description: <b>${id.description}</b></h5>
                                   <h2 style="color: red">Warranty : ${id.warrantyInformation}</h2>
                                   <h3 style="margin-top:20px; font-size:15px;color:blue">${id.shippingInformation}</h3>

                                   <h3 style="margin-top:30px; font-size:20px">Reviews:</h3>
                                   <hr>
                                    <div class="Reviews">
                                        <ul>
                                             ${id.reviews.map(review => `
                                                  <li><span  class="rate">★${review.rating} </span> &nbsp; ${review.comment}</li>
                                                  <li>${review.reviewerName}</li>
                                                  <li>${review.date}</li>
                                                  <li><hr></br></li>
                                                  `).join('')}
                                        </ul>
                                   </div>
                                  
                              </div>
                         </div>
               `;

          }




          fetchData();

     </script>

</body>

</html>