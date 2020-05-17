<?php
/*
 * Media page
 * This page used for Upload media
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


require_once("header.php");
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Media Manager</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Media</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<iframe id="fancybox-frame" name="fancybox-frame1589709666421" width="100%" height="500px" frameborder="0" hspace="0" scrolling="auto" src="../admin/deps/filemanager/dialog.php?type=0&amp;editor=mce_0"></iframe>
<?php require_once("footer.php"); ?>