<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('js/ajax-form.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/element-in-view.js') }}"></script>
<script src="{{ asset('js/paroller.js') }}"></script>
<script src="{{ asset('js/parallax-scroll.js') }}"></script>
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
      feather.replace()
</script>
<script>
     function previewImage() {
       const image = document.querySelector('#image');
       const imgPreview = document.querySelector('.img-preview');

       imgPreview.style.display = "block";

       const oFReader = new FileReader();
       oFReader.readAsDataURL(image.files[0]);

       oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
       }
     }
</script>

