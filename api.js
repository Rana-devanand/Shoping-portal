// class Api {
//      async callAPi(){
//           const response =  await fetch('https://fakestoreapi.com/products')
//           .then(res=>res.json())
//           .then(json=>console.log(json))
//      }
     
// }

// const api = new Api(); 
// console.log(api.callAPi());

function generateUserId() {
     return 'user_' + Date.now() + Math.floor(Math.random() * 1000);
 }
 
 console.log(generateUserId());  // Example: "user_1609462863745"
 
 