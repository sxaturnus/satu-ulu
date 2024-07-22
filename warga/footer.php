<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <span id="tahun"></span>. Pemerintah Kelurahan 1 Ulu
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Tambahkan ini di bagian header atau footer sebelum tag penutup </body> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

  <!-- get data warga -->
  <script type="text/javascript">
  $(document).ready(function(){
    $('body').on("keyup",".nik",function(){
      var ketik = $(this).val();				
      var data = {data: ketik};
      $.ajax({
        type: 'POST',
        url: "ajax.php",
        data: data,
        success: function(response) {		
          if(response != "0"){
            $('.tempat_nik_warga').html(response);
          }else{
            $('.tempat_nik_warga').html("");
          }			
        }
      });
    });
  });
</script>
  <!-- End section get -->

  <!-- year setup js -->
  <script>
    document.getElementById("tahun").innerHTML = new Date().getFullYear();
  </script>
  <!-- end year setup js -->

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>
</html>