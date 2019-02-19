<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 776px;">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Authors
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
                <a href="#">Authors</a>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <?= $notice ;?>

        <div class="portlet light bordered">
            <div class="portlet-body">
                <?php
                if (!(empty($author_list))) {
                    // create table
                    $this->table->set_template(ftable('author_table'));
//                    $heading = ["ID", "Name", "Surname", "Actions"];
//                    $this->table->set_heading($heading);
                    foreach ($author_list as $id => $data_entry) {

                        $edit_url="/admin/author/create/edit/" . $data_entry['author_id'];
                        $action_array=[];
                        $action_array = [
                            [
                                "url" => $edit_url,
                                "text" => "Edit",
                                "icon" => "icon-pencil",
                            ],
                            [
                                "url" => "/admin/author/delete/" . $data_entry['author_id'],
                                "text" => "Delete",
                                "icon" => "icon-dislike",
                                "confirmation_text" => "<b>Are you sure?</b>",
                            ],
                        ];


                        $row['ID'] = $data_entry['author_id'];
                        $row['Aame'] = "<a href='$edit_url' title='Edit Author'>".$data_entry['author_name']."</a>";
                        $row['Surname'] = $data_entry['author_surname'];
                        $row['Actions'] = fbuttonActionGroup($action_array);

                        // set heading 
                        $this->table->set_heading(array_keys($row)); 
                        // set row
                        $this->table->add_row($row);
                        unset($row);
                    }
                    echo $this->table->generate();
                } else {
                    echo "<p>No data to show</p>";
                }

                // add button
                if (@$create_link) {
                    echo fbuttonLink($create_link . "/add", "Add Author", "primary");
                }
                ?>
            </div>
        </div>
        <?php
//        wts($author_list);
        ?>
    </div>
    <!-- END CONTENT BODY -->
</div>
