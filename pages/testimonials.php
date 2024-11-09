<!DOCTYPE html>
<html lang="en">

<style>
     .testimonial-card {
          border: 1px solid #ec4444;
          background-color: antiquewhite;
     }

     .testimonial-slider {
          display: flex;
     }

     @media (max-width: 768px) {
          .carousel-inner .carousel-item>div {
               display: none;
          }

          .carousel-inner .carousel-item>div:first-child {
               display: block;
          }
     }

     .carousel-inner .carousel-item.active,
     .carousel-inner .carousel-item-next,
     .carousel-inner .carousel-item-prev {
          display: flex;
     }

     /* display 3 */
     @media (min-width: 768px) {

          .carousel-inner .carousel-item-right.active,
          .carousel-inner .carousel-item-next {
               transform: translateX(33.333%);
          }

          .carousel-inner .carousel-item-left.active,
          .carousel-inner .carousel-item-prev {
               transform: translateX(-33.333%);
          }
     }

     .carousel-inner .carousel-item-right,
     .carousel-inner .carousel-item-left {
          transform: translateX(0);
     }
</style>

<body>
     <div class="container text-center my-3">
          <div class="heading">
               <h1>Testimonials</h1>
               <p>Hear what they say about us</p>
          </div>
          <div class="mx-auto my-auto">
               <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                         <div class="carousel-item active">
                              <div class="col-md-4">
                                   <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                   </div>
                                   <div class="card card-body">
                                        <img class="img-fluid" src="http://localhost/project/assets/img/testimonials/t1.webp">
                                   </div>
                                   <div class="name">
                                        <h4>John Doe</h4>
                                        <p>Customer</p>
                                   </div>
                              </div>
                         </div>
                         <div class="carousel-item">
                              <div class="col-md-4">
                                   <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>

                                   </div>
                                   <div class="card card-body">
                                        <img class="img-fluid" src="http://localhost/project/assets/img/testimonials/t2.jpeg">
                                   </div>
                                   <div class="name">
                                        <h4>John Doe</h4>
                                        <p>Customer</p>
                                   </div>
                              </div>
                         </div>
                         <div class="carousel-item">
                              <div class="col-md-4">
                                   <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>

                                   </div>
                                   <div class="card card-body">
                                        <img class="img-fluid" src="http://localhost/project/assets/img/testimonials/t3.jpg" alt="miss">
                                   </div>
                                   <div class="name">
                                        <h4>John Doe</h4>
                                        <p>Customer</p>
                                   </div>
                              </div>
                         </div>
                         <div class="carousel-item">
                              <div class="col-md-4">
                                   <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>

                                   </div>
                                   <div class="card card-body">
                                        <img class="img-fluid" src="http://localhost/project/assets/img/testimonials/t5.jpg">
                                   </div>
                                   <div class="name">
                                        <h4>John Doe</h4>
                                        <p>Customer</p>
                                   </div>
                              </div>
                         </div>
                         <div class="carousel-item">
                              <div class="col-md-4">
                                   <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>

                                   </div>
                                   <div class="card card-body">
                                        <img class="img-fluid" src="http://localhost/project/assets/img/testimonials/t6.jpg">
                                   </div>
                                   <div class="name">
                                        <h4>John Doe</h4>
                                        <p>Customer</p>
                                   </div>
                              </div>
                         </div>
                         <div class="carousel-item">
                              <div class="col-md-4">
                                   <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>

                                   </div>
                                   <div class="card card-body">
                                        <img class="img-fluid" src="http://localhost/project/assets/img/testimonials/t4.jpg">
                                   </div>
                                   <div class="name">
                                        <h4>John Doe</h4>
                                        <p>Customer</p>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                         <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                              aria-hidden="true"></span>
                         <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                         <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                              aria-hidden="true"></span>
                         <span class="sr-only">Next</span>
                    </a>
               </div>
          </div>
     </div>

     <script>
          $('#recipeCarousel').carousel({
               interval: 100
          })

          $('.carousel .carousel-item').each(function () {
               var minPerSlide = 3;
               var next = $(this).next();
               if (!next.length) {
                    next = $(this).siblings(':first');
               }
               next.children(':first-child').clone().appendTo($(this));

               for (var i = 0; i < minPerSlide; i++) {
                    next = next.next();
                    if (!next.length) {
                         next = $(this).siblings(':first');
                    }

                    next.children(':first-child').clone().appendTo($(this));
               }
          });

     </script>

</body>

</html>