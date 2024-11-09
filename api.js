class Api {
     async callAPi(){
          const response =  await fetch('https://fakestoreapi.com/products')
          .then(res=>res.json())
          .then(json=>console.log(json))
     }
     
}

const api = new Api(); 
console.log(api.callAPi());