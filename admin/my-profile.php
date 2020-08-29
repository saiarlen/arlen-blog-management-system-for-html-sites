<?php
/*
 * Tags page
 * This page used for managing tags
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title = "Profile"; //page-title
require_once("header.php");

?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb" style="margin-bottom: 15px;">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Saiarlen Profile</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<!-- ============================================================== -->
<!-- Profile Section -->
<!-- ============================================================== -->

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 ar-common-minheight">
            <div class="card">
                <form class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Your Personal Info</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Your Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" placeholder="Your Name Here">
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <label for="disabledTextUser" class="col-md-3 text-right control-label col-form-label" >User Name</label>
                            <div class="col-md-9">
                                <input type="text" id="disabledTextUser" class="form-control" placeholder="User Name" disabled="">
                            </div>
                        </div>
                  
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Company</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email1" placeholder="Company Name Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Avatar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cono1" placeholder="Contact No Here">
                            </div>
                        </div>
                        <div class="change-pass">
                          <a class="badge badge-pill badge-secondary " href="#">Change Password</a>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Current Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="lname" placeholder="Password Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="lname" placeholder="Password Here">
                            </div>
                        </div> -->
                        
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="button" class="btn badge-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>




<?php require_once("footer.php"); ?>