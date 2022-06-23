
<footer class="text-center text-lg-start text-white" style="background-color: #ddad54">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-4" style="background-color: #9e0101;">
        <div class="me-5 bold">
            <span>Get connected with us on social networks :</span>
        </div>
        <div>
            <a href="#" class="text-white me-4 hvr-grow">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="text-white me-4 hvr-grow">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="#" class="text-white me-4 hvr-grow">
                <i class="bi bi-google"></i>
            </a>
            <a href="#" class="text-white me-4 hvr-grow">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="#" class="text-white me-4 hvr-grow">
                <i class="bi bi-linkedin"></i>
            </a>
            <a href="#" class="text-white me-4 hvr-grow">
                <i class="bi bi-github"></i>
            </a>
        </div>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section>
        <div class="container {{__('messages.text')}} text-dark text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold">Company name</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #a20000; height: 2px"/>
                    <p class="bold">
                        Here you can use rows and columns to organize your footer
                        content. Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Products</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #a20000; height: 2px"/>
                    <p>
                        <a href="#!" >MDBootstrap</a>
                    </p>
                    <p>
                        <a href="#!">MDWordPress</a>
                    </p>
                    <p>
                        <a href="#!">BrandFlow</a>
                    </p>
                    <p>
                        <a href="#!">Bootstrap Angular</a>
                    </p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Useful links</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #a20000; height: 2px"/>
                    <p>
                        <a href="#!">Your Account</a>
                    </p>
                    <p>
                        <a href="#!">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!">Help</a>
                    </p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold">Contact</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #a20000; height: 2px"/>
                    <p>
                        <i class="bi bi-envelope-fill h5 text-light"></i>
                        <span class="px-3 bold">{{$setting->email}}</span>
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill h5 text-primary"></i>
                        <span class="px-3 bold">{{$setting->phone}}</span>
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill h5 text-success"></i>
                        <span class="px-3 bold">{{$setting->phone2}}</span>
                    </p>
                    <p>
                        <i class="bi bi-geo-alt-fill h5 text-danger"></i>
                        <span class="px-3 bold">{{$setting->address}}</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #a20000">
        {{__('messages.Copyright')}} &copy; {{__('messages.Your Website 2021')}}
    </div>
    <!-- Copyright -->
</footer>

