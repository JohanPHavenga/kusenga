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
                    <li class="active">News</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row pt-1 pb-4 mb-3">
        <div class="col">

            <?php
                $n=0;
                foreach ($news_list as $news_id=>$news) 
                {
                    $day=date("d",strtotime($news['news_posted_date']));
                    $month_year=date("M-y",strtotime($news['news_posted_date']));
                    $intro=substr($news['news_content'], 0, strpos($news['news_content'], "</p>"));
                    $author=$news['author_name']." ".$news['author_surname'];
                    ?>
                    <div class="row mt-2 mb-2">
                        <article class="blog-post col">
                            <div class="row">
                                <div class="col-sm-8 col-lg-5">
                                    <div class="blog-post-image-wrapper">
                                        <a href="demo-business-consulting-blog-detail.html" title="Read More">
                                            <img src="assets/img/demos/business-consulting/blog/blog-<?=$photo_num_list[$n];?>.jpg" alt class="img-fluid mb-4" />
                                        </a>
                                        <span class="blog-post-date bg-color-primary text-color-light font-weight-bold">
                                                <?=$day;?>
                                            <span class="month-year font-weight-light">
                                                <?=$month_year;?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-7">
                                    <h2> <?=$news['news_heading'];?></h2>
                                    <p><?=$intro;?></p>
                                    <hr class="solid">
                                    <div class="post-infos d-flex">
                                        <span class="info posted-by">
                                            Author :
                                            <span class="post-author font-weight-semibold text-color-dark">
                                                <?=$author;?>
                                            </span>
                                        </span>
                                    </div>
                                    <a href="/news/item/<?=$news['news_id'];?>" title="Read More" class="btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase mt-4">
                                        Read More</a>
                                </div>
                            </div>
                        </article>
                    </div>

                    <hr class="solid tall mt-5">
                    <?php
                    $n++;
                }
            ?>
           
        </div>
    </div>
</div>

<?php
//    wts($photo_num_list);
?>