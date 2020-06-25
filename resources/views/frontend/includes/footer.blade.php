      <!-- Footer Area Start Here -->
        <footer class="footer-wrap-layout1">
            <div class="footer-top-wrap-layout1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-box-layout1">
                                <div class="footer-logo">
                                    <a href="{{route('frontend.home')}}"><img src="{{asset('frontend/img/nsc_logo.png')}}" alt="logo"></a>
                                </div>
                                <p>NSC Stationery Supplies is a Stationery Supplier in Pretoria Laudium , Gauteng South Africa.</p>
                                <ul class="footer-social">
                                    <li><a href="https://web.facebook.com/NSC-Stationery-109732830731589/?modal=admin_todo_tour" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/NscStationery" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/nscstationery/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <!--<li><a href="#" target="_blank"><i class="fab fa-pinterest"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-box-layout1 pd-lg-l-60 pd-lg-t-15">
                                <div class="footer-title">
                                    <h3>Quick Links</h3>
                                </div>
                                <div class="footer-menu-box">
                                    <ul class="footer-menu-list">
                                        <li>
                                            <a href="{{route('frontend.home')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{route('frontend.category')}}">Product</a>
                                        </li>
                                        <li>
                                            <a href="{{route('about')}}">About</a>
                                        </li>
                                        <li>
                                            <a href="{{route('contact')}}">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-box-layout1 pd-lg-l-60 pd-lg-t-15">
                                <div class="footer-title">
                                    <h3>Information</h3>
                                </div>
                                <div class="footer-menu-box">
                                    <ul class="footer-menu-list">
                                        <li>
                                            <a href="{{route('delivery')}}" target="_blank">Delivery Options</a>
                                        </li>
                                        <li>
                                            <a href="{{route('privacy_policy')}}" target="_blank">Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a href="{{route('terms_and_conditions')}}" target="_blank">Terms & Conditions</a>
                                        </li>
                                        <li>
                                            <a href="{{route('return_and_refund_policy')}}" target="_blank">Refund/Returns Policy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-box-layout1 pd-lg-t-15">
                                <div class="footer-form-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7184.89783139478!2d28.103418!3d-25.78876!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e957d2f1de92f59%3A0xd73f759cd8529f82!2s291%20Tangerine%20St%2C%20Laudium%2C%20Centurion%2C%200037!5e0!3m2!1sen!2sza!4v1589097111498!5m2!1sen!2sza" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-wrap-layout1">
                <div class="copyright-light">Copyright © 2020 by NSC Stationery | Developed By <a href="https://www.webinfotech.net.in/" target="_blank">Webinfotech</a></div>
            </div>
        </footer>
        <!-- Footer Area End Here -->
    </div>
    <!-- jquery-->
    <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- Pace Preloder js -->
    <!-- <script src="js/pace.min.js"></script> -->
    <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- MeanMenu js -->
    <script src="{{asset('frontend/js/jquery.meanmenu.min.js')}}"></script> 
    <!-- OwlCerousel js -->
    <script src="{{asset('frontend/vendor/OwlCarousel/owl.carousel.min.js')}}"></script>
    {{-- lazy load --}}
    <script src="{{asset('frontend/js/lazyload.js')}}"></script>
    <!-- Select 2 js -->
    <script src="{{asset('frontend/js/select2.min.js')}}"></script>
    <!-- Nivo Slider js -->
    <script src="{{asset('frontend/vendor/slider/js/jquery.nivo.slider.js')}}"></script> 
    <script src="{{asset('frontend/vendor/slider/home.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/zoom.js')}}"></script>
    <script src="{{asset('frontend/js/zoomscript.js')}}"></script>
    <script>
    $("#search-form-ajax").submit(function(e) {
    e.preventDefault(); // avoid to execute the bharuwa form.
    var key_srch = $("#search-form-ajax :input").val();
    window.location.href = "{{ url('/product-search/') }}/"+key_srch;
    });
    $(document).on("click", function(event){
        if(!$(event.target).closest(".custom-header-search").length){
            $('.custom-search-result').hide();
            $('#search-form-ajax i').hide();
        }
    });
    $(document).ready(function(){
        var keyword = $('#search-form-ajax :input').val();
        if (keyword.length > 1) {
            $('#search-form-ajax i').show();
        }
        $("input").focus(function(){
            var keyword = $('#search-form-ajax :input').val();
            if (keyword.length > 1) {
                $('.custom-search-result').show();
                $('#search-form-ajax i').show();
            }
        });
        $('#search-form-ajax :input').keyup(function(e){
            if (e.which == 27) {
                $('#search-form-ajax :input').val('');
                $('#dynamic-result').html('');
                $('.custom-search-result').hide();
                $('#search-form-ajax i').hide();
                $("#search-form-ajax :input").blur();
                $('.animated-loading').hide();
            }
            var keyword = $('#search-form-ajax :input').val();
            if (keyword.length < 2 || keyword.length > 100) {
                $('.custom-search-result').hide();
            } else {
                if (e.which != 8 && e.which != 16 && e.which != 17 && e.which != 18 && e.which != 20 && e.which != 27 && e.which != 32 && e.which != 37 && e.which != 38 && e.which != 39 && e.which != 40) {
                $('#search-form-ajax i').hide();
                $('.animated-loading').show();
                $.ajax({
                  type: "GET",
                  url: "{{ url('/product-search/') }}/"+keyword,
                  data: {
                     _token: "{{csrf_token()}}",
                    // "keyword"  : keyword,
                  },
                  success: function(response){
                    $('.animated-loading').hide();
                    if (response == "") {
                        $('.custom-search-result').hide();
                        $('#search-form-ajax i').show();
                    } else {
                        $('#dynamic-result').html('');
                        $('#dynamic-result').css('padding', '15px 13px 0 0');
                        $('#dynamic-result').html(response);
                        $('.custom-search-result').show();
                        $('#search-form-ajax i').show();
                    }
                   }
                });
            }
            }
        if (!keyword.length > 0) {
            $('#search-form-ajax i').hide();
        }
        });
        $('#search-form-ajax i').click( function() {
            $('#search-form-ajax :input').val('');
            $('.custom-search-result').hide();
            $('#search-form-ajax i').hide();
        });
    });
    </script>

    @yield('script')

</body>
</html>