<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 776px;">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>News
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
                <a href="#">News</a>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <?= $notice ;?>

        <div class="portlet light bordered">
            <div class="portlet-body">
                <?php
                if (!(empty($news_list))) {
                    // create table
                    $this->table->set_template(ftable('news_table'));
                    $heading = ["ID", "Heading", "Status","Posted By", "Publish Date", "Actions"];
                    $this->table->set_heading($heading);
                    foreach ($news_list as $id => $data_entry) {

                        $edit_url="/admin/news/create/edit/" . $data_entry['news_id'];
                        $action_array = [
                            [
                                "url" => $edit_url,
                                "text" => "Edit",
                                "icon" => "icon-pencil",
                            ],
                            [
                                "url" => "/admin/news/delete/" . $data_entry['news_id'],
                                "text" => "Delete",
                                "icon" => "icon-dislike",
                                "confirmation_text" => "<b>Are you sure?</b>",
                            ],
                        ];

                        $row['id'] = $data_entry['news_id'];
                        $row['heading'] = "<a href='$edit_url' title='Edit article'>".$data_entry['news_heading']."</a>";
                        $row['status'] = flableStatus($data_entry['news_status']);
                        $row['posted_by'] = $data_entry['user_name']." ".$data_entry['user_surname'];
                        $row['date'] = fdateShort($data_entry['news_posted_date']);
                        $row['actions'] = fbuttonActionGroup($action_array);

                        $this->table->add_row($row);
                        unset($row);
                    }
                    echo $this->table->generate();
                } else {
                    echo "<p>No data to show</p>";
                }

                // add button
                if (@$create_link) {
                    echo fbuttonLink($create_link . "/add", "Add Article", "primary");
                }
                ?>
            </div>
        </div>
        <?php
//        wts($user_list);
        ?>
    </div>
    <!-- END CONTENT BODY -->
</div>
