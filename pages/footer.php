<!DOCTYPE html>
<html lang="en">
     <head>
   
     </head>
<style>
     .footer {
          display: flex;
          /* border: 1px solid #000; */
          height: 50vh;
          margin-top: 60px;
     }
      .address{
          
          flex-basis: 28%;
          text-align: left;
          height: 50vh;
     }
     
     .company{
          font-size: 45px;
          font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
          color: #333;
          padding-bottom: 20px;
          padding-top: 20px;
          padding-left: 20px;
          flex-direction: column;
     }
     
     .street{
          color: #000;
          padding-left: 20px;
          padding-top: 20px;
          padding-bottom: 20px;
     }
     
     .street h6{
          font-size: 15px;
          padding-top: 3px;
          font-family:Arial, Helvetica, sans-serif
     }

     .head{
          /* padding-top: 20px; */
          font-family: Arial, Helvetica, sans-serif;
          color: #333;
          font-size: 18px;
          font-weight: bold

     }

     .help{
          flex-basis: 20%;
          text-align: left;
          height: 50vh;
          padding: 20px;
     }
     .help h6{
          font-size: 15px;
          padding-top: 3px;
          font-family:Verdana, Geneva, Tahoma, sans-serif;
          color: #333;
     }

     .about{
          flex-basis: 20%;
          text-align: left;
          height: 50vh;
          padding: 20px;
     }
     .about h6{
          font-size: 15px;
          padding-top: 3px;
          font-family:Verdana, Geneva, Tahoma, sans-serif;
          color: #333;
     }

     .sign-up{
          flex-basis: 30%;
          text-align: right;
          height: 50vh;
          padding-top: 40px;
          /* border: 1px solid #000; */
     }
     .sign-up h6{
          font-size: 20px;
          padding-top: 3px;
          font-family:Verdana, Geneva, Tahoma, sans-serif;
          color: #333;
     }
     .sign-up input{
          margin-top: 20px;
          padding: 15px 25px;
          background-color: #f1f1f1;
          border: none;
          cursor: pointer;
          width: 280px;
          font-size: 15px;
          border-radius: 5px;
          outline: none;
     }
     .sign-up button{
          padding: 15px 25px;
          margin-bottom: 7px;
          background-color: #4CAF50;
          color: white;
          border: none;
          cursor: pointer;     
          font-size: 15px;     
     }
     .newsletter{
          margin-top: 20px;
     }
     .sign-up p {
          margin-top: 20px;
          color: #333;
          font-size: 15px;
          padding-top: 3px;
          font-family:Verdana, Geneva, Tahoma, sans-serif;
     }
     .copyright{
          display: flex;
          padding: 10px;
          justify-content: center;
          align-items: center;
     }
     .copyright h5{
          flex-basis: 50%;
          text-align: left;
          color: #CCCCCC;
          
     }
     .payment-method{
          flex-basis: 50%;
          text-align: right;
          margin-right: 40px;
     } 
     .payment-method img {
          width: 40px;
          height: 40px;
          margin-right: 15px;
          object-fit: cover;
     }
     
</style>

<body>
     <div class="container-fluid">
          <hr>
          <div class="footer">
          <div class="address">
               <div class="company">
                    Shop Online
               </div>
               <div class="street">
                    <h6>Address : <span>1234 Fashion street suite 567.</span></h6>
                    <h6>India Quantum university </h6>
                    <h6>Email : <b>devanandrana168@gmail.com</b></h6>
                    <h6>Phone : <i>9304266642</i></h6>
               </div>
               <div class="col-4 social-icon">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/"> <i class="fab fa-linkedin"></i></a>
                    <a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a>
                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
               </div>
          </div>

          <div class="help">
               <div class="head">
                    <b>Help</b>
               </div>
               <h6>Privacy policy </h6>
               <h6>Return + Exchange </h6>
               <h6>Shipping </h6>
               <h6>Terms & condition </h6>
               <h6>FAQ's </h6>
               <h6>Compare </h6>
               <h6>My Wishlist </h6>
          </div>

          <div class="about">
               <div class="head">
                    <b>About Us</b>
               </div>
               <h6>About Us </h6>
               <h6>Press </h6>
               <h6>Careers </h6>
               <h6>Affiliate Program </h6>
               <h6>Sustainability </h6>
               <h6>Help </h6>
               <h6>Contact Us </h6>
          </div>

          <div class="sign-up">
               <h6>Sign Up for Newsletter </h6>
               <input type="email" placeholder="Enter your email address">
               <button class="btn btn-primary">Subscribe</button>
               <h6 class="newsletter">Newsletter Signup</h6>
               <p>Subscribe to our newsletter and get exclusive offers and updates.</p>
          </div>
          </div>

          <hr>
          <div class="copyright">
              <h5> &copy; 2023 Shop Online. All rights reserved.</h5>

               <div class="payment-method">
                    <img src="./assets/img/payment/card.png" alt="PayPal">

                    <img src="./assets/img/payment/money.png" alt="MasterCard">

                    <img src="./assets/img/payment/symbols.png" alt="Visa">

                    <img src="./assets/img/payment/america.png" alt="american card">
               </div>
          </div>
     </div>
</body>

</html>