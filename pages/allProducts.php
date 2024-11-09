<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>All products</title>
</head>
<style>
     /* Container styles */
.phone-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); /* Adjust the columns based on screen size */
    gap: 20px; /* Space between items */
    padding: 20px;
    background-color: #f9f9f9;
}

/* Individual phone item styles */
.phone-item {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: start;
    padding: 15px;
    transition: transform 0.2s ease-in-out;
    margin-top: 30px;

}

.phone-item:hover {
    transform: scale(1.05); /* Slightly enlarge on hover for interactivity */
}

/* Image styling */
.phone-item img {
    width: 100%;
    height: auto;
    max-height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
    margin-bottom: 10px;
}

/* Text styling */
.phone-item title{
     font-weight: bold;
}
.phone-item h2 {
    font-size: 1.2em;
    color: #333;
    margin: 10px 0;
    font-weight: bold;
}
.phone-item h4 {
    font-size: 15px;
    color: #666;
    margin: 5px 0;
    font-weight: bold;
}

.phone-item p {
    font-size: 12px;
    color: #666;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 5px 0;
}

.phone-item p.price {
    font-weight: bold;
    color: #2c8f2c;
}

.loader {
    width: 100%;
    height:500px;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>
<body>
     <?php include "./header.php"; ?>

     <?php include "./Navbar.php"; ?>
      <div id="phone-container" class="phone-container">
     
     </div>

     <?php include "./footer.php" ?>

<script>
  const url = 'https://dummyjson.com/products'; // Replace with the API's actual endpoint


// Function to fetch phone details
async function fetchPhoneDetails() {
    const phoneContainer = document.getElementById('phone-container');
    
    // Set loading message before making the fetch request
    phoneContainer.innerHTML = 
    // spinner-border text-primary" role="status
    `
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
     const phoneContainer = document.getElementById('phone-container'); // Ensure you have an element with this ID in your HTML
     
     // Clear any previous content to avoid duplicating items if the function is called multiple times
     phoneContainer.innerHTML = '';
 
     for (let i = 0; i < data.length; i++) {
         let phone = data[i];
         
         // Create a new element for each phone item
         let phoneItem = document.createElement('div');
         phoneItem.classList.add('phone-item');
         
         // Populate the phone item with data
         phoneItem.innerHTML = `
             <h2>${phone.title}</h2>
             <img src="${phone.images}" alt="${phone.name}">
             <h4>${phone.category}</h4>
             <p>${phone.description}</p>
             <p>Price: ${phone.price}</p>
             <hr>
             <button class="btn btn-lg btn-primary">Add to Cart</button>  &nbsp; &nbsp;
             <button class="more-details btn btn-lg btn-warning" data-id="${phone.id}">More details</button> 
               
         `;
         
         // Append the newly created phone item to the container
         phoneContainer.appendChild(phoneItem);
     }

     const buttons = document.querySelectorAll('.more-details');
     buttons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            console.log(id);
            // Redirect to the details page with the phone ID
            window.location.href = `productDetails.php?id=${id}`; // Adjust the URL as necessary
        });
    });

 }
 
 

// Call the function to fetch phone details
fetchPhoneDetails();

</script>
</body>
</html>