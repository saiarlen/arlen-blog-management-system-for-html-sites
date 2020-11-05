<?php
require_once("config.php");

/* Read Views */
function arTotalViews($conn)
{
    // count total website views
    $query = "SELECT sum(total_views) as total_views FROM ar_visits";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['total_views'] === null) {
                return 0;
            } else {
                return $row['total_views'];
            }
        }
    } else {
        return "0";
    }
}

function arUniqueView($conn)
{
    // count Unique website views
    $query = "SELECT sum(unique_views) as unique_views FROM ar_visits";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['unique_views'] === null) {
                return 0;
            } else {
                return $row['unique_views'];
            }
        }
    } else {
        return "0";
    }
}

/* Insert views */

function arUniqTest($conn, $visitor_ip)
{
    $query = "SELECT * FROM ar_visits WHERE visitor_ip='$visitor_ip'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        return false;
    } else {
        return true;
    }
}


function arAddVisits($conn, $visitor_ip)
{
    if (arUniqTest($conn, $visitor_ip) === true) {
        // insert unique visitor record for checking whether the visit is unique or not in future.
        $query = "INSERT INTO ar_visits (visitor_ip) VALUES ('$visitor_ip')";

        if (mysqli_query($conn, $query)) {
            // At this point unique visitor record is created successfully. Now update total_views of specific page.
            $queryA = "UPDATE ar_visits SET total_views = total_views + 1 ";
            $queryB = "UPDATE ar_visits SET unique_views = unique_views + 1 ";

            if (!mysqli_query($conn, $queryA) || !mysqli_query($conn, $queryB)) {

                error_log("Error updating record: " . mysqli_error($conn));
            }
        } else {

            error_log("Error inserting record: " . mysqli_error($conn));
        }
    } else {
        $queryC = "UPDATE ar_visits SET total_views = total_views + 1 ";
        if (!mysqli_query($conn, $queryC)) {
            error_log("Error updating record: " . mysqli_error($conn));
        }
    }
}