 <!-- BEGIN: Footer-->
 <footer class="footer footer-static footer-light">
   <p class="clearfix mb-0"> <?= "MAGASIN : " . $_SESSION["KaspyISS_bureau"] .  "  |  ANNÉE: " . $_SESSION["KaspyISS_annee"] ?><span class="float-md-end d-none d-md-block"> <span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<a class="ms-25" href="https://kaspycorporation.com" target="_blank">Kaspy Corporation</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>
 </footer>
 <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
 <!-- END: Footer-->

 <script>
   $('.scroll-top').on('click', function() {
     $('html, body').animate({
       scrollTop: 0
     }, 75);
   });
 </script>