<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 776px;">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>
                    <?= $title; ?>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="/admin">Home</a> | 
            </li>
            <li>
                <a href="/admin/news">News</a> | 
            </li>
            <li>
                <a href="#"><?= ucfirst($action); ?></a>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->

        <?= $notice; ?>

        <?php
        echo form_open($form_url);
        ?>

        <div class='row'>

            <div class='col-md-6'>
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <?php

                        echo "<div class='form-group'>";
                        echo form_label('Heading <span class="required">*</span>', 'news_heading');
                        echo form_input([
                            'name' => 'news_heading',
                            'id' => 'news_heading',
                            'value' => set_value('news_name', @$news_detail['news_heading']),
                            'class' => 'form-control',
                            'required' => '',
                        ]);

                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Content <span class="required">*</span>', 'news_content');
                        echo form_textarea([
                            'name' => 'news_content',
                            'id' => 'news_content',
                            'value' => utf8_encode(@$news_detail['news_content']),
                        ]);
                        echo "</div>";
                        ?>
                    </div>
                    <div class="portlet-footer">
                        <?php
                        //  BUTTONS
                        echo "<div class='btn-group'>";
                        if ($action == "edit") {
                            echo fbutton($text = "Save", $type = "submit", $status = "primary", NULL, "save_only");
                        }
                        echo fbutton($text = "Save & Close", $type = "submit", $status = "success");
                        echo fbuttonLink($return_url, "Cancel", $status = "danger");
                        echo "</div>";
                        ?>
                    </div>
                </div>
            </div> <!-- COL -->


            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <?php
                        echo "<div class='form-group'>";
                        echo "<div class='row'>";
                        echo "<div class='col-md-6'>";
                        echo form_label('Date posted <span class="required">*</span>', 'news_posted_date');
                        echo '<div class="input-group input-medium date date-picker">';
                        echo form_input([
                            'name' => 'news_posted_date',
                            'id' => 'news_posted_date',
                            'value' => set_value('news_posted_date', @fdateShort($news_detail['news_posted_date'])),
                            'class' => 'form-control',
                            'required' => '',
                        ]);
                        echo '<span class="input-group-btn"><button class="btn default" type="button"><i class="fa fa-calendar"></i></button></span></div>';
                        echo "</div>";


                        echo "<div class='col-md-6'>";
                        echo form_label('Article Status <span class="required">*</span>', 'news_status');
                        echo form_dropdown('news_status', $status_dropdown, @$news_detail['news_status'], ["id" => "news_status", "class" => "form-control input-small"]);
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Author <span class="required">*</span>', 'author_id');
                        echo form_dropdown('author_id', $author_dropdown, @$news_detail['author_id'], ["id" => "author_id", "class" => "form-control input-large"]);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Origin Name', 'news_org_name');
                        echo form_input([
                            'name' => 'news_org_name',
                            'id' => 'news_org_name',
                            'value' => set_value('news_org_name', @$news_detail['news_org_name']),
                            'class' => 'form-control input-large',
                        ]);

                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Origin URL', 'news_org_url');
                        echo form_input([
                            'name' => 'news_org_url',
                            'id' => 'news_org_url',
                            'value' => set_value('news_org_url', @$news_detail['news_org_url']),
                            'class' => 'form-control',
                            'placeholder' => "https://example.com",
                        ]);

                        echo "</div>";

                        if ($action == "edit") {

                            //  DATES Created + Updated
                            echo "<div class='form-group'>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-4'>";
                            echo form_label('Date Created', 'created_date');
                            echo form_input([
                                'value' => set_value('created_date', @$news_detail['created_date']),
                                'class' => 'form-control input-medium',
                                'disabled' => ''
                            ]);

                            echo "</div>";
                            echo "<div class='col-md-6'>";
                            echo form_label('Date Updated', 'updated_date');
                            echo form_input([
                                'value' => set_value('updated_date', @$news_detail['updated_date']),
                                'class' => 'form-control input-medium',
                                'disabled' => ''
                            ]);

                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>

                    <div class="portlet-footer">
                        <?php
                        //  BUTTONS
                        echo "<div class='btn-group'>";
                        if ($action == "edit") {
                            echo fbutton($text = "Save", $type = "submit", $status = "primary", NULL, "save_only");
                        }
                        echo fbutton($text = "Save & Close", $type = "submit", $status = "success");
                        echo fbuttonLink($return_url, "Cancel", $status = "danger");
                        echo "</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div> <!-- row -->


        <?php        
        echo form_close();
//        wts($author_dropdown);
//        wts(@$news_detail); 
        ?>
    </div>
</div>

