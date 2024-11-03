const url = 'https://dummyjson.com/products'; // Replace with the API's actual endpoint


// Function to fetch phone details
async function fetchPhoneDetails() {
    try {
        const response = await fetch(url);
        
        // Check if response is ok (status 200-299)
        if (!response.ok) {
            throw new Error(`Error: ${response.status}`);
        }
        
        const data = await response.json(); // Parse JSON response
        console.log(data.products); // Log data or handle it as needed
        const products = data.products;
        displayPhoneData(products); // Call function to display data on your web page
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
             <img src="" alt="${phone.name}">
             <p>${phone.category}</p>
             <p>${phone.description}</p>
             <p>Price: ${phone.price}</p>
            
         `;
         
         // Append the newly created phone item to the container
         phoneContainer.appendChild(phoneItem);
     }
 }
 
 

// Call the function to fetch phone details
fetchPhoneDetails();
