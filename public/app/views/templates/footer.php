            <section class="section section-text-light section-background m-0" style="background: url('/assets/img/contact-background.jpg'); background-size: cover;">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <h2 class="font-weight-bold">- Contact Us</h2>
                            <p class="custom-opacity-font">
                                We would love to hear from you. get in touch with us to begin the next part of your business discovery.
                            </p>
                            <div class="row">
                                <div class="col-md-6 custom-sm-margin-top">
                                    <h4 class="mb-1">Call Us</h4>
                                    <a href="tel:+1234567890" class="text-decoration-none" target="_blank" title="Call Us">
                                        <span class="custom-call-to-action-2 text-color-light text-2 custom-opacity-font">
                                            Phone
                                            <span class="info text-5">
                                                061-161-1847
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-md-6 custom-sm-margin-top">
                                    <h4 class="mb-1">Our Location</h4>
                                    <p class="custom-opacity-font">Unit 14 Nooitegdacht Estate, Burgundy Estate ,Table View 7441, SA</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 custom-sm-margin-top">
                                    <h4 class="mb-1">Mail Us</h4>
                                    <a href="mail:mail@example.com" class="text-decoration-none" target="_blank" title="Mail Us">
                                        <span class="custom-call-to-action-2 text-color-light text-2 custom-opacity-font">
                                            Email
                                            <span class="info text-5">
                                                info@kusenga.com
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-md-6 custom-sm-margin-top">
                                    <h4 class="mb-1">Social Media</h4>
                                    <ul class="social-icons social-icons-clean custom-social-icons-style-1 mt-2 custom-opacity-font">
                                        <li class="social-icons-facebook">
                                            <a href="http://www.facebook.com/" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="social-icons-twitter">
                                            <a href="http://www.twitter.com/" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="social-icons-instagram">
                                            <a href="http://www.instagram.com/" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="social-icons-linkedin">
                                            <a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 custom-sm-margin-top">
                            <h2 class="font-weight-bold">- Write Us</h2>
                            <form id="contactForm" class="contact-form custom-contact-form-style-1" action="php/contact-form.php" method="POST">
                                <div class="contact-form-success alert alert-success d-none mt-4" id="contactSuccess">
                                    <strong>Success!</strong> Your message has been sent to us.
                                </div>

                                <div class="contact-form-error alert alert-danger d-none mt-4" id="contactError">
                                    <strong>Error!</strong> There was an error sending your message.
                                    <span class="mail-error-message text-1 d-block" id="mailErrorMessage"></span>
                                </div>

                                <input type="hidden" name="subject" value="Contact Message Received" />
                                <div class="form-row">
                                    <div class="form-group col">
                                        <div class="custom-input-box">
                                            <i class="icon-user icons text-color-primary"></i>
                                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" placeholder="Name*" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <div class="custom-input-box">
                                            <i class="icon-envelope icons text-color-primary"></i>
                                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" placeholder="Email*" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <div class="custom-input-box">
                                            <i class="icon-bubble icons text-color-primary"></i>
                                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" placeholder="Message*" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Now" class="btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase" data-loading-text="Loading...">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            </div> <!-- end main -->

            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center pb-4">
                            <p>2018 © Kusenga <span class="text-color-light">Accessible Insights</span> - Copyright All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </footer>

        </div> <!-- body -->

        <!-- Vendor -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/jquery.appear/jquery.appear.min.js"></script>
        <script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="/vendor/jquery.cookie/jquery.cookie.min.js"></script>
        <script src="/vendor/popper/umd/popper.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="/vendor/common/common.min.js"></script>
        <script src="/vendor/jquery.validation/jquery.validate.min.js"></script>
        <script src="/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="/vendor/jquery.gmap/jquery.gmap.min.js"></script>
        <script src="/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
        <script src="/vendor/isotope/jquery.isotope.min.js"></script>
        <script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="/vendor/vide/jquery.vide.min.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="/assets/js/theme.js"></script>

        <!-- Current Page Vendor and Views -->
        <script src="/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Current Page Vendor and Views -->
        <script src="/assets/js/view.contact.js"></script>

        <!-- Demo -->
        <script src="/assets/js/demo-business-consulting.js"></script>

        <!-- Theme Custom -->
        <script src="/assets/js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="/assets/js/theme.init.js"></script>




        <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
        <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
                ga('create', 'UA-12345678-1', 'auto');
                ga('send', 'pageview');
        </script>
        -->


    </body>
</html>