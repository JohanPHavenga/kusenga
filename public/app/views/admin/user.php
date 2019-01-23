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
        <?= $notice ;?>

        <div class="portlet light bordered">
            <div class="portlet-body">
                <?php
                if (!(empty($user_list))) {
                    // create table
                    $this->table->set_template(ftable('user_table'));
                    $heading = ["ID", "Name", "Surname", "Email", "Actions"];
                    $this->table->set_heading($heading);
                    foreach ($user_list as $id => $data_entry) {

                        $edit_url="/admin/user/create/edit/" . $data_entry['user_id'];
                        $action_array=[];
                        if ($data_entry['user_id']>2) {
                            $action_array = [
                                [
                                    "url" => $edit_url,
                                    "text" => "Edit",
                                    "icon" => "icon-pencil",
                                ],
                                [
                                    "url" => "/admin/user/delete/" . $data_entry['user_id'],
                                    "text" => "Delete",
                                    "icon" => "icon-dislike",
                                    "confirmation_text" => "<b>Are you sure?</b>",
                                ],
                            ];
                        }


                        $row['id'] = $data_entry['user_id'];
                        $row['name'] = "<a href='$edit_url' title='Edit User'>".$data_entry['user_name']."</a>";
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
