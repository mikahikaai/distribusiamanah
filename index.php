<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="plugins/bootstrap-5.2.3-dist/css/bootstrap.min.css">
   <script src="plugins/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
   <title>Amanah | Distribusi</title>
   <style>

      p {
         font-family: 'Times New Roman', Times, serif
      }
      .modal-backdrop {
         background-color: black;
      }

      .modal-content {
         background-color: whitesmoke;
         opacity: 0.9;

      }

      .modal-header {
         background-color: #61BD9A;
      }

      .nav-item {
         font-size: large;
         font-weight: 600;
      }
   </style>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #61BD9A;">
      <div class="container">
         <a class="navbar-brand" href="#">
            <img width="40%" src="images/Air-Amanah-Palangkaraya-Logo-fix.webp" alt="">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="d-flex">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="#">Profil Perusahaan</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" href="#">Lacak Barang</a>
                  </li>
                  <li class="nav-item">
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="login">
                        <span style="font-weight: bold;">Login</span>
                     </button>

                     <!-- Modal -->
                     <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                 <form action="" method="post">
                                    <div class="container-fluid">
                                       <label for="username">Username</label>
                                       <input type="text" class="form-control" name="username" placeholder="Masukkan Username...">
                                       <label for="password">Password</label>
                                       <input type="password" class="form-control" name="password" placeholder="Masukkan Password...">
                                    </div>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                 <button type="button" class="btn btn-primary">Login</button>
                              </div>
                           </div>
                        </div>
                     </div>

                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
   <div class="container-fluid" style="background-color: #61BD9A;">
      <div class="container mt-3">
         <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active" data-bs-interval="3000">
                  <img src="/images/carousel1.png" class="d-block w-100" alt="Image1">
               </div>
               <div class="carousel-item" data-bs-interval="3000">
                  <img src="/images/carousel2.png" class="d-block w-100" alt="Image2">
               </div>
               <div class="carousel-item data-bs-interval=" 3000"">
                  <img src="/images/carousel3.png" class="d-block w-100" alt="Image3">
               </div>
               <div class="carousel-item data-bs-interval=" 3000"">
                  <img src="/images/carousel4.png" class="d-block w-100" alt="Image4">
               </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
            </button>
         </div>
      </div>
   </div>
   <div class="container-fluid" style="background-color: #ECECEC;">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <img class="mt-4" src="images/product_1.png" alt="prod1" height="55%">
            </div>
            <div class="col-md-8">
               <p style="font-weight: bold; font-size: 40px;" class="mt-5"> Air Amanah </p>
               <p style="font-weight: bold; font-size: 25px">
                  Air Amanah terjaga kualitas dan kesegarannya sebagai air minum dalam kemasan pertama di Indonesia yang memiliki kandungan pH air bersifat basa dengan kadar pH 8+ dan Total Dissolved Solids (TDS) ≤ 10 ppm. Air Amanah diproses melalui proses integrasi tiga teknologi terkini; Ultrafiltra on Technology, Non-mineral Technology dan Alkaline Water Technology, sehingga memiliki kualitas air minum terbaik untuk membantu hidrasi dan metabolisme tubuh kita.
               </p>
            </div>
         </div>
      </div>
   </div>
</body>

</html>