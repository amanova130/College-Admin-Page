<footer class="mainfooter" role="contentinfo">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">

                    <div class="footer-pad">
                        <h4>Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Forms</a></li>
                            <li><a href="#">News and Updates</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">

                    <div class="footer-pad">
                        <h4>Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Website Tutorial</a></li>
                            <li><a href="#">Accessibility</a></li>
                            <li><a href="#">Disclaimer</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Follow Us</h4>
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy">
                    <p class="text-center">&copy; Copyright <script>
                        document.write(new Date().getFullYear())
                        </script> - Highline college. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Script to flash message alert -->
<?php
  if(isset($_SESSION["status"]) && $_SESSION["status"]!==null)
  {
    ?>
<script>
swal({
    title: "<?php echo $_SESSION["status"]; ?>",
    icon: "<?php echo $_SESSION["status_code"]; ?>",
});
</script>
<?php
    unset($_SESSION["status"]);
  }
?>
</body>

</html>