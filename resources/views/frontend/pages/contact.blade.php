@extends('frontend.layouts.app')
@section('meta-tags')
    <link rel="canonical" href="{{url('/contact')}}"/>
    <title>NSC STATIONERY | Contact Us | Top Stationery Supplier in Africa</title>
@endsection
@section('content')
        <section class="inner-page-banner bg-common">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <ul>
                                <li>
                                    <a href="{{route('frontend.home')}}">Home</a>
                                </li>
                                <li>
                                    Contact
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Area Start Here -->
        <section class="inner-page-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-page-box-layout1">
                            <div class="contact-location">
                                <div class="location-address">
                                    <h3 class="item-title">NSC Stationery</h3>
                                    <ul>
                                        <li>Address: 291 Tangerine street,
                                            <br>shop no 7,<br>laudium square Pretoria 0037
                                        </li>
                                    </ul>
                                </div>
                                <div class="location-address">
                                    <h3 class="item-title">Email Qutation</h3>
                                    <ul>
                                        <li><a href="mailto: netsol2005@gmail.com">netsol2005@gmail.com</a></li>
                                    </ul>
                                </div>
                                <div class="location-address">
                                    <h3 class="item-title">Phone Number</h3>
                                    <ul>
                                        <li><a href="tel: 012/3741594">012/3741594</a></li>
                                        <li><a href="#">fax - 0865461569</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="google-map-area">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7184.89783139478!2d28.103418!3d-25.78876!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e957d2f1de92f59%3A0xd73f759cd8529f82!2s291%20Tangerine%20St%2C%20Laudium%2C%20Centurion%2C%200037!5e0!3m2!1sen!2sza!4v1589097111498!5m2!1sen!2sza" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-break-md sidebar-widget-area">
                        <div class="widget widget-contact-form relative">
                            <div class="heading-layout3">
                                <h3 id="response2" class="item-title">Have Any Question?</h3>
                            </div>
                            <form class="contact-form-box" id="contact-form">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="fas fa-user"></i></div>
                                        <input type="text" placeholder="Name" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="far fa-envelope"></i></div>
                                        <input type="email" placeholder="E-mail" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="fas fa-phone-volume"></i></div>
                                        <input type="number" maxlength="12" placeholder="Phone" class="form-control" name="phone" id="phone" required>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="fas fa-question"></i></div>
                                        <input type="text" placeholder="Subject" maxlength="100" class="form-control" name="subject" id="subject" required>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="far fa-comments"></i></div>
                                        <textarea placeholder="Message" class="textarea form-control" name="message" maxlength="400" id="message" rows="4" cols="20" required></textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <button type="submit" class="item-btn">Submit Now<i class="fas fa-long-arrow-alt-right"></i></button>
                                    </div>
                                </div>
                            </form>
                            <div class="contact-form-loading"><i class="fas fa-spinner fa-spin"></i></div>
                        </div>
                    </div>
                    <div style="width: 100%; height: 50px;"></div>
                </div>
            </div>
        </section>
        <!-- Team Area End Here -->
@endsection
@section('script')
<!-- js goes here -->
<script>
$("#contact-form").submit(function(e) {

  e.preventDefault();

  var name      = $('#name').val();
  var email     = $('#email').val();
  var phone     = $('#phone').val();
  var subject   = $('#subject').val();
  var message   = $('#message').val();

  $(".contact-form-loading").css("display", "block");
  $("#contact-form :input").prop("disabled", true);
    $.ajax({
      type: "POST",
      url: '{{route('frontend.query.submit')}}',
      data: {
         _token: "{{csrf_token()}}",
        "name"      : name,
        "phone"     : phone,
        "email"     : email,
        "subject"   : subject,
        "message"   : message,
      },
      success: function(response){
        $('#response2').html(response);
        $("#contact-form :input").prop("disabled", false);
        $(".contact-form-loading").css("display", "none");
       }
    });
});
</script>
@endsection