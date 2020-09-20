<?php
/*
 * Media page
 * This page used for Upload media
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "Media"; //page-title
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
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Media</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function disFunction() {
        var iframe = document.getElementById("myFrame");
        var elmnt = iframe.contentWindow.document.getElementsByClassName("ar-sel")[0];
        elmnt.style.display = "none";
    }
</script>
<div class="media-wrapper">
    <iframe id="myFrame" src="deps/fileman/media.html" title="filemanager" frameborder="0" style="overflow:hidden;min-height:80vh;height:75vh;width:100%" height="100%" width="100%"></iframe>
</div>
<?php require_once("footer.php"); ?>