@extends('layouts.app')
@section('content')
<!-- Contact Banner Section -->
<section class="contact-banner-section bg-dark">
    <h2 class=" text-white text-center">Sign Up</h2>

</section>
<!-- End Page Title / Style Three -->

<!-- Map Section -->

<!-- End Map Section -->

<!-- Contact Form Section -->
<section class="contact-form-section">

    <div class="container">



        <div class="row">
            <div class="col-md-6 py-3">

                <h2><span>Get Started with <br><span class="text-danger">{{$packageName}}</span></span> <br></h2>
                <p>{{$message}}</p>

@if ($packageName == 'Basic Package')

<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Maximum of 10 Products</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Sellers dashboard</h6>
<s><h6 class="my-1 text-muted"><i class="fa-solid fa-circle-check"></i> Custom domain</h6></s>
<s><h6 class="my-1 text-muted"><i class="fa-solid fa-circle-check"></i> Technical Support</h6></s>
<s><h6 class="my-1 text-muted"><i class="fa-solid fa-circle-check"></i> Full customization</h6></s>
<s><h6 class="my-1 text-muted"><i class="fa-solid fa-circle-check"></i> Mobile Application</h6></s>

@elseif($packageName == 'Premium Package')

<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Maximum of 10 Products</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Sellers dashboard</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Custom domain</h6>
<s><h6 class="my-1 text-muted"><i class="fa-solid fa-circle-check"></i> Technical Support</h6></s>
<s><h6 class="my-1 text-muted"><i class="fa-solid fa-circle-check"></i> Full customization</h6></s>
<s><h6 class="my-1 text-muted"><i class="fa-solid fa-circle-check"></i> Mobile Application</h6></s>

@elseif($packageName == 'Enterprise Package')

<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Maximum of 10 Products</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Sellers dashboard</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Custom domain</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Technical Support</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Full customization</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Mobile Application</h6>


@else

<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Maximum of 10 Products</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Sellers dashboard</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Custom domain</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Technical Support</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Full customization</h6>
<h6 class="my-1 text-primary"><i class="fa-solid fa-circle-check"></i> Mobile Application</h6>


@endif

                        {{-- <div class="text transition-300ms">Sit amet consectetur adipiscin elit <br> eiusmoe tempor incidide </div> --}}







            </div>
            <div class="col-md-6 py-5">

                <div class="inner-container ">

                    <!-- Contact Form -->
                    <div class="contact-form">

                        <!-- Contact Form -->
                        <form method="post" action="/initiate-pay" id="contact-form" enctype="multipart/form-data">

                            @csrf
                            <div class="row clearfix">


                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="email" placeholder="Email" class="shadow" required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Contact Phone Number" class="shadow" required>
                                </div>

                                <input type="hidden" name="amount" value="{{$price}}">



                                <hr class="container">

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="storeName" placeholder="Store Name" class="shadow" required>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="storeDescription" placeholder="Store Description" class="shadow" required>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="storeAddress" placeholder="Store Address" class="shadow" required>
                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="file" name="storeLogo" placeholder="Store Logo" required>
                                </div>



                                <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                    <button type="submit" class="theme-btn btn-style-two btn-block"><span class="txt">Proceed to pay NGN {{number_format($price?? 20000, 2)}} <i class="fa fa-angle-right"></i></span></button>
                                </div>

                            </div>
                        </form>

                    </div>
                    <!--End Comment Form -->

                </div>

            </div>
        </div>
    </div>




</section>
<!-- End Contact Form Section -->

@endsection
