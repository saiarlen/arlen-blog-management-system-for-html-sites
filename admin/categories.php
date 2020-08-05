<?php
/*
 * Categories page
 * This page used for managing Categories
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */

$page_title= "Categories"; //page-title
require_once("header.php");
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb" style="margin-bottom: 15px;">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Categories</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">

<div class="col-md-4">
    <div class="container-fluid">
        <div class="card">
            <form class="form-horizontal">
                <div class="card-body">
                    <h4 class="card-title">Add New Category</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" placeholder="Category Name Here">
                            <span class="f-span-text">The name is how it appears on your site.</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="Slug Here" autocomplete="off">
                            <span class="f-span-text">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>

                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="button" class="btn btn-info">Add New</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>

<div class="col-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div class="card" style="min-height: 600px;">
                    <div class="card-body">
                        <div class="table-responsive">
                       
                            <table id="zero_config" class="table table-striped table-bordered">
                             <button type="button" class="btn btn-light btn-sm ar-bt-pos">Delete</button>
                                <thead>
                                    <tr>
                                       <th>
                                            <label class="customcheckbox m-b-20">
                                                <input type="checkbox" id="mainCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Count</th>
                                        <th></th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="customtable">
                                    <tr>
                                        <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category1</td>
                                        <td>Category1</td>
                                        <td>1</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    <tr>
                                        <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category2</td>
                                        <td>Category2</td>
                                        <td>1</td>
                                         <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category3</td>
                                        <td>Category3</td>
                                        <td>0</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category4</td>
                                        <td>Category4</td>
                                        <td>1</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category5</td>
                                        <td>Category5</td>
                                        <td>1</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category6</td>
                                        <td>Category6</td>
                                        <td>0</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                      
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category7</td>
                                        <td>Category7</td>
                                        <td>1</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category8</td>
                                        <td>Category8</td>
                                        <td>0</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category9</td>
                                        <td>Category9</td>
                                        <td>2</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category10</td>
                                        <td>Category10</td>
                                        <td>1</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                        
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category11</td>
                                        <td>Category11</td>
                                        <td>3</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    <tr>
                                         <th>
                                            <label class="customcheckbox">
                                                <input type="checkbox" class="listCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <td>Category12</td>
                                        <td>Category12</td>
                                        <td>0</td>
                                        <th><button type="button" class="btn btn-dark btn-sm">Edit</button></th>
                                       
                                    </tr>
                                    
                                   
                                </tbody>
                              
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

</div>



<?php require_once("footer.php"); ?>