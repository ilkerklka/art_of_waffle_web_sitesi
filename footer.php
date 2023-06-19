 <!-- Footer -->
 <footer class="text-center text-lg-start  text-muted" style="background-color: #AF0171;">
   <!-- Section: Social media -->
   <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
     <!-- Left -->
     <div class="me-5 d-none d-lg-block text-light">
       <span>Bize ulaşın :</span>
     </div>
     <!-- Left -->

     <!-- Right -->
     <div class="text-light">
     <?php
            if ($detayid = 4) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '4' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
       <a href=" tel: <?php echo $urun['link']?>" class="me-4 text-reset">
         <i class="fab fa-brands fa-whatsapp"></i>
       </a>
       <?php }?>
       <?php
            if ($detayid = 2) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '2' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
       <a href="<?php echo $urun['link']?>" class="me-4 text-reset">
         <i class="fab fa-instagram"></i>
       </a>
       <?php }?>

     </div>
     <!-- Right -->
   </section>
   <!-- Section: Social media -->

   <!-- Section: Links  -->
   <section class="">
     <div class="container text-center text-md-start mt-5">
       <!-- Grid row -->
       <div class="row mt-3">
         <!-- Grid column -->
         <div class=" col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-light ">
           <!-- Content -->
           <a href="#">
             <img src="navbarr.png" alt="" width="136" height="92" class="d-inline-block align-text-top ">

           </a>
           <br><br>
           <a href="#">
             <img src="sennasıl.png" alt="" width="200" height="30" class="d-inline-block align-text-top ">

           </a>
         </div>
         <!-- Grid column -->

         <!-- Grid column -->
         <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 siparis">
           <!-- Links -->
           <h6 class="text-uppercase fw-bold mb-4 text-light">
             Adres
           </h6>
           <hr>
           <p>
             <img src="QRcode2.png" width="120px" height="120px" alt="">
           </p>
         </div>
         <!-- Grid column -->

         <!-- Grid column -->
         <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 siparis">
           <!-- Links -->
           <h6 class="text-uppercase fw-bold mb-4 text-light">
             Sipariş İçin
           </h6>
           <hr>
           <?php
            if ($detayid = 6) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '6' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
             <p>
               <a href="<?php echo $urun['link']?>"><?php echo $urun['sosyalad']?></a>
               </p>
           <?php }
            ?>
           <?php
            if ($detayid = 5) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '5' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
             <p>
               <a href="<?php echo $urun['link']?>"><?php echo $urun['sosyalad']?></a>
               </p>
           <?php }
            ?>
           <?php
            if ($detayid = 7) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '7' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
             <p>
               <a href="<?php echo $urun['link']?>"><?php echo $urun['sosyalad']?></a>
               </p>
           <?php }
            ?>
         </div>
         <!-- Grid column -->



         <!-- Grid column -->
         <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-light">
           <!-- Links -->
           <h6 class="text-uppercase fw-bold mb-4 text-light">İletişim</h6>
           <hr>
           <p><i class="fas fa-home me-3 text-light"></i> Tuzla/Marina</p>
           <?php
            if ($detayid = 4) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '4' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
             <p><i class="fas fa-phone me-3 "></i> <?php echo $urun['link']?> </p>
           <?php }
            ?>

            <?php
            if ($detayid = 3) {
              $urungosterme = $baglan->prepare("SELECT * from sosyalmedya where id = '3' ");
              $urungosterme->execute();
              $urun = $urungosterme->fetch(PDO::FETCH_ASSOC)
            ?>
             <p><i class="fas fa-phone me-3 "></i> <?php echo $urun['link']?> </p>
           <?php }
            ?>
           
         </div>
         <!-- Grid column -->
       </div>
       <!-- Grid row -->
     </div>
   </section>
   <!-- Section: Links  -->

   <!-- Copyright -->
   <div class="text-center p-4 text-light" style="background-color:#E80F88 ;">
     © 2022 Tüm Hakları Saklıdır:
     <a class="text-reset fw-bold" href="https://theartofwaffle.com">theartofwaffle.com</a>
     <a class="web" style="float: left; font-size: 12px; " href="https://ilkerkyilmaz.com">İlker Kücükyılmaz Web Tasarım</a>
   </div>
   <!-- Copyright -->
 </footer>
 <!-- Footer -->

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>