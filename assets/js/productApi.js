const URL = "https://fakestoreapi.com/products";

// Function to fetch product data from API

async function fetchProducts() {
  try {
    const response = await fetch(URL);

    // Check if the response is successful
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();

    // Process the data to extract the required information
    const products = data.map((product) => ({
      id: product.id,
      name: product.name,
      price: product.price,
      image: product.image,
    }));

    console.log(products)
    return products;
  } catch (error) {
    console.error("Error fetching products:", error);
  }
}

fetchProducts();

// Function to display product data on the web page
