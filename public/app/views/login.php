<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1>- Login</h1>
                <span class="d-block text-4">Administrator Access</span>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-right breadcrumb-light">
                    <li><a href="/">Home</a></li>
                    <li class="active">Login</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row pt-1 pb-4 mb-3">
        <div class="col">
            <?php
            if (validation_errors()) 
            {
                echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
            }
            if($show_alert) 
            {
                echo "<div class='alert alert-$alert_status' role='alert'>$alert_msg</div>";
                // <div class="alert alert-danger" role="alert">
            }
            ?>            
            <div class="featured-boxes">
                <div class="row">
                    <div class="col-md-6">
                        <div class="featured-box featured-box-primary text-left mt-5" style="">
                            <div class="box-content">
                                <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">User Login</h4>
                                <?php
                                $attributes = array('id' => 'frmSignIn');
                                echo form_open($form_url,$attributes);
                                echo "<div class='form-row'><div class='form-group col'>";
                                echo form_label('Username', 'user_username');
                                echo set_value('user_username');
                                echo form_input([
                                    'name'          => 'user_username',
                                    'id'            => 'user_username',
                                    'class'         => 'form-control form-control-lg',
                                    'placeholder'   => 'Username',
                                    'required'      => '',
                                    'autofocus'     => '',
                                    'value'         => $this->session->flashdata('user_username'),
                                ]);
                                echo "</div></div>";
                                

                                echo "<div class='form-row'><div class='form-group col'>";
                                echo "<a class='float-right' href='#'>(Lost Password?)</a>";
                                echo form_label('Password', 'user_password');
                                echo form_input([
                                    'name'          => 'user_password',
                                    'id'            => 'user_password',
                                    'class'         => 'form-control form-control-lg',
                                    'type'          => 'password',
                                    'placeholder'   => 'Password',
                                    'required'      => '',
                                ]);
                                
                                echo "</div></div>";
                                
                                echo '<div class="form-row"><div class="form-group col-lg-6">';
                                echo "</div></div>";
                                
                                echo '<div class="form-row"><div class="form-group col-lg-6">';
                                    echo fbutton("Login", "submit", "primary");
                                echo "</div></div>";
                                
                                echo form_close();
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--                    <div class="col-md-6">
                                            <div class="featured-box featured-box-primary text-left mt-5" style="">
                                                <div class="box-content">
                                                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Register An Account</h4>
                                                    <form action="/" id="frmSignUp" method="post">
                                                        <div class="form-row">
                                                            <div class="form-group col">
                                                                <label>E-mail Address</label>
                                                                <input type="text" value="" class="form-control form-control-lg" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-lg-6">
                                                                <label>Password</label>
                                                                <input type="password" value="" class="form-control form-control-lg" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>Re-enter Password</label>
                                                                <input type="password" value="" class="form-control form-control-lg" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col">
                                                                <input type="submit" value="Register" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>-->
                </div>

            </div>
        </div>
    </div>
</div>