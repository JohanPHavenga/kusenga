<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1>- News</h1>
                <span class="d-block text-4">Articles</span>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-right breadcrumb-light">
                    <li><a href="/">Home</a></li>
                    <li><a href="/news">News</a></li>
                    <li class="active"><?=$news_item['news_heading'];?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row pt-1 pb-4 mb-3">
        <div class="col">
            
            <div class="row mt-2 mb-2">                
                <article class="blog-post">
                    <div class="col">
                        
                        <h2><?=$news_item['news_heading'];?></h2>
                        <div class="post-infos mb-4">
                            <span class="info posted-by">
                                Posted by:
                                <span class="post-author font-weight-semibold text-color-dark">
                                    <?=$news_item['user_name'];?> <?=$news_item['user_surname'];?>
                                </span>
                            </span>
                           
                            <span class="info like ml-4">
                                Post Date:
                                <span class="like-number font-weight-semibold custom-color-dark">
                                    <?=date("d F Y",strtotime($news_item['news_posted_date']));?>
                                </span>
                            </span>
                        </div>

                        <hr class="solid">
                        
                        <?=$news_item['news_content'];?>

                        <p>Original posted at : 
                            <a href="<?=$news_item['news_org_url'];?>" target="_blank"><?=$news_item['news_org_name'];?></a></p>

                        <div class="pt-2 pb-1">
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style">
                                <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-40faf75173aadc53"></script>
                            <!-- AddThis Button END -->
                        </div>

                        <div class="post-block post-author mt-4 clearfix">
                            <h4 class="font-weight-bold text-color-dark pt-2 mb-4">- Author</h4>
<!--                            <div class="img-thumbnail d-block p-0 no-borders">
                                <a href="blog-post.html">
                                    <img src="img/team/team-22.jpg" alt="">
                                </a>
                            </div>-->
                            <p><strong class="name mb-3"><?=$news_item['author_name'];?> <?=$news_item['author_surname'];?></strong></p>
                            <p class="mt-1"><?=$news_item['author_description'];?></p>
                        </div>

                        <!--
                        <div class="post-block post-comments mt-4 clearfix">
                            <h4 class="font-weight-bold text-color-dark pt-2 mb-4">- Comments</h4>

                            <ul class="comments">
                                <li>
                                    <div class="comment">
                                        <div class="img-thumbnail d-none d-sm-block p-0 no-borders">
                                            <img class="avatar" alt="" src="img/team/team-23.jpg">
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-arrow"></div>
                                            <span class="comment-by">
                                                <strong>John Doe</strong>
                                                <span class="float-right">
                                                    <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                </span>
                                            </span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
                                            <span class="date float-right">November 12, 2018 at 1:38 pm</span>
                                        </div>
                                    </div>

                                    <ul class="comments reply">
                                        <li>
                                            <div class="comment">
                                                <div class="img-thumbnail d-none d-sm-block p-0 no-borders">
                                                    <img class="avatar" alt="" src="img/team/team-24.jpg">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-arrow"></div>
                                                    <span class="comment-by">
                                                        <strong>John Doe</strong>
                                                        <span class="float-right">
                                                            <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                        </span>
                                                    </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                                    <span class="date float-right">November 12, 2018 at 1:38 pm</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment">
                                                <div class="img-thumbnail d-none d-sm-block p-0 no-borders">
                                                    <img class="avatar" alt="" src="img/team/team-25.jpg">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-arrow"></div>
                                                    <span class="comment-by">
                                                        <strong>John Doe</strong>
                                                        <span class="float-right">
                                                            <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                        </span>
                                                    </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                                    <span class="date float-right">November 12, 2018 at 1:38 pm</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="img-thumbnail d-none d-sm-block p-0 no-borders">
                                            <img class="avatar" alt="" src="img/team/team-22.jpg">
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-arrow"></div>
                                            <span class="comment-by">
                                                <strong>John Doe</strong>
                                                <span class="float-right">
                                                    <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                </span>
                                            </span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <span class="date float-right">November 12, 2018 at 1:38 pm</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="img-thumbnail d-none d-sm-block p-0 no-borders">
                                            <img class="avatar" alt="" src="img/team/team-22.jpg">
                                        </div>
                                        <div class="comment-block">
                                            <div class="comment-arrow"></div>
                                            <span class="comment-by">
                                                <strong>John Doe</strong>
                                                <span class="float-right">
                                                    <span> <a href="#"><i class="fas fa-reply"></i> Reply</a></span>
                                                </span>
                                            </span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <span class="date float-right">November 12, 2018 at 1:38 pm</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>

                        <div class="post-block post-leave-comment pt-0">
                            <h4 class="font-weight-bold text-color-dark mt-4 pt-2 mb-4">- Leave a Comment</h4>

                            <form id="" class="custom-contact-form-style-1" action="" method="POST">
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
                                            <textarea maxlength="5000" data-msg-required="Please enter your comment." rows="10" class="form-control" name="comment" id="message" placeholder="Comment*" required></textarea>
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
                        -->

                    </div>
                </article>
            </div>

        </div>
    </div>
</div>

<?php
//    wts($news_item);
?>