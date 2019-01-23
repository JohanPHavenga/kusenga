<?php
// alert message on top of the page
// set flashdata [alert|status]
if ($this->session->flashdata('alert')) {
    $alert_msg = $this->session->flashdata('alert');
    if (!($this->session->flashdata('status'))) {
        $status = 'warning';
    } else {
        $status = $this->session->flashdata('status');
    }
    echo "<div class='note note-$status' role='alert'>$alert_msg</div>";
}
?>

