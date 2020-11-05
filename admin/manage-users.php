<?php
/*
 * All users page
 * This page used for manage all users
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */


$page_title = "Media"; //page-title
require_once("header.php");
if (arUserIdentifier($conn, $loginuser, 3) !== "superadmin") { //role test
    echo "<script>location.href='home.php'</script>";
    die();
}
$loginuserid = arUserIdentifier($conn, $loginuser, 2);
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Manage Users</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div id="mn-users" class="row">
        <?php //fetching all user data
        $user_all_sql = "SELECT ar_userid, ar_authemail, ar_authorname, ar_company, ar_avatar, ar_role FROM ar_admin";
        $userall_result = mysqli_query($conn, $user_all_sql);
        if (mysqli_num_rows($userall_result) > 0) {
            while ($arSingleUser =  mysqli_fetch_assoc($userall_result)) {
        ?>
                <?php
                if ($arSingleUser["ar_role"] == "superadmin") {
                    $verifychecked = "checked";
                } else {
                    $verifychecked = "";
                }
                ?>
                <!-- User -->
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="user-warp">
                        <div class="card">
                            <div class="card-body text-center">
                                <?php if ($loginuserid !== $arSingleUser["ar_userid"]) : ?>
                                    <div class="user_right">
                                        <label class="user-switch switch-left-right">
                                            <input class="switch-input" id="user-rsw" value="<?php echo $arSingleUser["ar_userid"] ?>" type="checkbox" <?php echo $verifychecked; ?>>
                                            <span class="switch-label" data-on="S.admin" data-off="Author"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <span class="badge badge-pill badge-light user_right2">Super Admin</span>
                                <?php endif; ?>

                                <p><img class=" img-fluid" src="<?php echo $arSingleUser["ar_avatar"] ?>" alt="user image"></p>
                                <h4 class="card-title"><?php echo ucfirst($arSingleUser["ar_authorname"]) ?></h4>
                                <p class="card-text" style="margin-bottom:2px;"><?php echo $arSingleUser["ar_authemail"] ?></p>
                                <p class="card-text"><?php echo ucfirst($arSingleUser["ar_company"]) ?></p>

                                <?php if ($loginuserid !== $arSingleUser["ar_userid"]) : ?>
                                    <a href="single-user.php?type=user&id=<?php echo $arSingleUser["ar_userid"] ?>&name=<?php echo $arSingleUser["ar_authorname"] ?>" class="btn btn-success btn-sm">Manage</a>
                                    <button type="submit" class="user-del btn btn-danger btn-sm" value="<?php echo $arSingleUser["ar_userid"] ?>" class="btn btn-danger btn-sm">Delete</button>
                                <?php else : ?>
                                    <button type="button" class="btn btn-secondary btn-sm" disabled>Your Current User</button>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./User -->
        <?php
            }
        }
        ?>

    </div>
</div>

<?php require_once("footer.php"); ?>