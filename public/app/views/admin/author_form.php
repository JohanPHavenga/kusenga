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
                <a href="/admin/author">Authors</a> | 
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
                        echo "<div class='form-group'>";
                        echo form_label('Name <span class="required">*</span>', 'author_name');
                        echo form_input([
                                'name'          => 'author_name',
                                'id'            => 'author_name',
                                'value'         => set_value('author_name', @$author_detail['author_name']),
                                'class'         => 'form-control',
                                'required'      => '',
                            ]);

                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Surname', 'author_surname');
                        echo form_input([
                                'name'          => 'author_surname',
                                'id'            => 'author_surname',
                                'value'         => set_value('author_surname', @$author_detail['author_surname']),
                                'class'         => 'form-control',
                                'required'      => '',
                            ]);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        echo form_label('Author description <span class="required">*</span>', 'author_description');
                        echo form_textarea([
                            'name' => 'author_description',
                            'id' => 'author_description',
                            'value' => utf8_encode(@$author_detail['author_description']),
                            'class' => 'form-control',
                            'rows' => '3',
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
            //wts(@$author_detail); 
        ?>
    </div>
</div>

