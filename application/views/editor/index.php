<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- header menu -->
<?php  $this->load->view('editor/includes/header_menu.php');?>
<div id="layoutSidenav_content">

    <main>
        <div style='height:20px;'></div>
        <div style="padding: 10px">
            <?php echo $output; ?>
        </div>
    </main>
    <!-- footer menu -->
    <?php  $this->load->view('editor/includes/footer_menu.php');?>
