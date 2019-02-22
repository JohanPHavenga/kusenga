<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1>- Contact Us</h1>
                <span class="d-block text-4">Get in touch</span>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-right breadcrumb-light">
                    <li><a href="/">Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div> 
        </div>
    </div>
</section>

<div class="container">
    <div class="row pt-1 pb-4 mb-3">
    <?php
    if ($_POST) {
        if (!@$email_send) {
            echo '<div class="alert alert-danger" role="alert">';
            echo validation_errors();
            echo '</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">';
            echo "Thank you for contacting us. <b>Your message has been sent successfully.</b><br>We will get back to you as soon as we can.";
            echo '</div>';
        }
    } else {
        echo "<p>We would love to hear from you. Please use the form below to contact us.</p>";
    }
    ?>
    </div>
</div>