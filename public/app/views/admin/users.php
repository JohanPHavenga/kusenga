<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 776px;">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Users
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
                <a href="#">Users</a>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="note note-info">
            <p> Below a list of users that can access the site</p>
        </div>

        <div class="portlet light bordered">
            <div class="portlet-body">
                <?php
                if (!(empty($user_list))) {
                    // create table
                    $this->table->set_template(ftable('users_table'));
                    $heading = ["ID", "Name", "Surname", "Email", "Actions"];
                    $this->table->set_heading($heading);
                    foreach ($user_list as $id => $data_entry) {

                        $action_array = [
                            [
                                "url" => "/admin/users/create/edit/" . $data_entry['user_id'],
                                "text" => "Edit",
                                "icon" => "icon-pencil",
                            ],
                            [
                                "url" => "/admin/users/delete/" . $data_entry['user_id'],
                                "text" => "Delete",
                                "icon" => "icon-dislike",
                                "confirmation_text" => "<b>Are you sure?</b>",
                            ],
                        ];


                        $row['id'] = $data_entry['user_id'];
                        $row['name'] = $data_entry['user_name'];
                        $row['surname'] = $data_entry['user_surname'];
                        $row['email'] = $data_entry['user_email'];
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
                    echo fbuttonLink($create_link . "/add", "Add User", "primary");
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
