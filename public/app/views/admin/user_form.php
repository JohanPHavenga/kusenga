<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 776px;">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>
                    <?=$title;?>
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
                <a href="/admin/user">Users</a> | 
            </li>
            <li>
                <a href="#"><?=ucfirst($action);?></a>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        
        <?= $notice ;?>
        
        
        <?php 
            echo form_open($form_url); 
        ?>

        <div class='row'>
            <div class='col-md-6'>
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <?php  
                        // if there was a post, check for validation errors
                        

                        echo "<div class='form-group'>";
                        echo form_label('Name <span class="required">*</span>', 'user_name');
                        echo form_input([
                                'name'          => 'user_name',
                                'id'            => 'user_name',
                                'value'         => set_value('user_name', @$user_detail['user_name']),
                                'class'         => 'form-control',
                                'required'      => '',
                            ]);

                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Surname', 'user_surname');
                        echo form_input([
                                'name'          => 'user_surname',
                                'id'            => 'user_surname',
                                'value'         => set_value('user_surname', @$user_detail['user_surname']),
                                'class'         => 'form-control',
//                                'required'      => '',
                            ]);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Email <span class="required">*</span>', 'user_email');
                        echo '<div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>';
                        echo form_input([
                                'name'          => 'user_email',
                                'id'            => 'user_email',
                                'value'         => set_value('user_email', @$user_detail['user_email']),
                                'class'         => 'form-control',
                                'type'          => 'email',
                                'required'      => '',
                            ]);
                        echo "</span></div></div>";

                        echo "<div class='form-group'>";
                        echo form_label('Phone', 'user_contact');
                        echo form_input([
                                'name'          => 'user_contact',
                                'id'            => 'user_contact',
                                'value'         => set_value('user_contact', @$user_detail['user_contact']),
                                'class'         => 'form-control input-medium',
                            ]);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Username <span class="required">*</span>', 'user_username');
                        echo form_input([
                                'name'          => 'user_username',
                                'id'            => 'user_username',
                                'value'         => set_value('user_username', @$user_detail['user_username']),
                                'class'         => 'form-control',
                                'required'      => '',
                            ]);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Password <span class="required">*</span>', 'user_password');
                        echo form_input([
                                'name'          => 'user_password',
                                'id'            => 'user_password',
                                'value'         => set_value('user_password', @$user_detail['user_password']),
                                'class'         => 'form-control',
                                'type'          => 'password',
                                'required'      => '',
                            ]);

                        echo "</div>";

                        //  BUTTONS
                        echo "<div class='btn-group'>";
                        if ($action=="edit") {
                            echo fbutton($text="Save",$type="submit",$status="primary",NULL,"save_only");
                        }
                        echo fbutton($text="Save & Close",$type="submit",$status="success");
                        echo fbuttonLink($return_url,"Cancel",$status="danger");
                        echo "</div>";
                        echo "</div>";


                    ?>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- row -->
        
        
        <?php 
            echo form_close(); 
            //wts(@$user_detail); 
        ?>
    </div>
</div>

