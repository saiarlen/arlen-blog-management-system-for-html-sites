<?php
/*
 * Include file for user
 * @version   1.0.0
 * @author    Saiarlen
 * @url       http://saiarlen.com
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html
 */
if (file_exists("admin/inc/config.php")) {
    require_once("admin/inc/config.php");
}
if (file_exists("admin/inc/visits-counter.php")) {
    require_once("admin/inc/visits-counter.php");
}
$visitor_ip = $_SERVER['REMOTE_ADDR'];  //for storing visitor ip
arAddVisits($conn, $visitor_ip); //calling visitor counter

//Settings retrive
$fsettings = mysqli_query($conn, "SELECT frontend FROM ar_meta WHERE id=1");
$ffinal = mysqli_fetch_row($fsettings);
$fnout = json_decode($ffinal[0], true);


class arClass
{


    //Setting Values
    public $postorder;
    public $psotslimit;

    //output var
    protected $dbcon;
    public $pageno;
    public $arpag;   //Pagnation output var
    public $catlist; //Category output Var
    public $taglist; //tags output Var
    public $posts;   //posts output Var
    public $mainurl = ARLEN_BASE_URL;
    public $blogId;


    //Out put wrap
    public function __construct($conn, $fnout)
    {
        
        $this->postorder = $fnout['fpsorder'];
        if($fnout['frontpl'] == ""){
            $this->psotslimit = 5;
        }else{
            $this->psotslimit = (int)$fnout['frontpl'];
        }
        
        $this->dbcon = $conn;

        if (!isset($_GET["post_url"])) {
            $this->arPag(array("enable" => false));
            $this->posts = $this->arArchive();
        }
        $this->catlist = $this->arCatsArray();
        $this->taglist = $this->arTagsArray();
        if (isset($_GET["post_url"])) {

            //$this->blogId = $_GET["post_url"];
            $this->blogId = mysqli_real_escape_string($this->dbcon, $_GET["post_url"]);
            $this->post = $this->arSingle();
        }
    }

    // ============================================================== 
    // Get Url
    // ==============================================================
    public function arUrl($urltype)
    {
        if ($urltype == 1) {
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $url = $protocol . $_SERVER['SERVER_NAME'];
            return $url;  //return main domain
        } elseif ($urltype == 0) {
            $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
            $curPageName = str_replace(array('.php', '.htm', '.html'), '', $curPageName); // Remove extensions
            return $curPageName; //return current page name
        }
    }
    public function blogpath($url)
    {
        echo $this->mainurl . "/blog/" . $url; //for getting permlinks
    }


    // ============================================================== 
    // All Posts handle method
    // ==============================================================

    public function arArchive()
    { //Method for all posts
        $startfrom = ($this->pageno - 1) * $this->psotslimit;
        $ararchive = [];
        $ararc = "SELECT * FROM ar_posts ORDER BY post_id " . $this->postorder . " LIMIT $startfrom," . $this->psotslimit;
        $ararcquery = mysqli_query($this->dbcon, $ararc);
        if (mysqli_num_rows($ararcquery) > 0) {
            while ($arcrow = mysqli_fetch_assoc($ararcquery)) {
                $ararchive[] = $arcrow;
            }
            return $ararchive;
        } else {
            return $ararchive;
        }
    }

    // ============================================================== 
    // Recent Posts   
    // ==============================================================

    public function arRecent($limit)
    { //Method for recent posts

        $arrecent = [];
        $arrec = "SELECT post_id, post_title, post_url, post_date, post_img, post_exp, post_imgalt, post_author  FROM ar_posts ORDER BY post_id DESC LIMIT $limit";
        $arrecquery = mysqli_query($this->dbcon, $arrec);
        if (mysqli_num_rows($arrecquery) > 0) {
            while ($recrow = mysqli_fetch_assoc($arrecquery)) {
                $arrecent[] = $recrow;
            }
            return $arrecent;
        } else {
            return $$arrecent;
        }
    }



    // ============================================================== 
    // All Taxomony handle method
    // ==============================================================

    public function arUni($aryin)
    { //Array conversion 
        return explode(",", $aryin);
    }

    //Creating array for Categories 
    public function arCatsArray()
    {
        $arcatarray = [];

        $arcat = mysqli_query($this->dbcon, "SELECT cat_id, cat_name  FROM ar_categories ORDER BY cat_id DESC");
        if (mysqli_num_rows($arcat) > 0) {
            while ($singlecat = mysqli_fetch_assoc($arcat)) {
                $arcatarray[] = $singlecat;
            }
            return array_column($arcatarray, "cat_name", "cat_id");
        } else {
            return false;
        }
    }
    //Looping and comparing category
    public function arCat($catidin)
    {
        if (is_array($this->catlist)) {
            foreach ($this->catlist as $cat => $value) {
                if ($cat == $catidin) {
                    echo $value;
                }
            }
        }
    }

    //Creating array for Tags 
    public function arTagsArray()
    {
        $artagarray = [];
        $artag = mysqli_query($this->dbcon, "SELECT tag_id, tag_name  FROM ar_tags ORDER BY tag_id DESC");
        if (mysqli_num_rows($artag) > 0) {
            while ($singletag = mysqli_fetch_assoc($artag)) {
                $artagarray[] = $singletag;
            }
            return array_column($artagarray, "tag_name", "tag_id");
        } else {
            return false;
        }
    }

    //Looping and comparing Tags
    public function arTag($tagidin)
    {
        if (is_array($this->taglist)) {
            foreach ($this->taglist as $tag => $value) {
                if ($tag == $tagidin) {
                    echo $value;
                }
            }
        }
    }

    // ============================================================== 
    // Date handle method
    // ==============================================================
    public function arDate($datein, $dformat)
    { //Date format method
        $vardate = new DateTime($datein);

        switch ($dformat) {
            case 0:
                $opt = "d F, Y";
                break;
            case 1:
                $opt = "F d, Y";
                break;
            case 2:
                $opt = "d-m-Y";
                break;
            case 3:
                $opt = "d.m.Y";
                break;
            case 4:
                $opt = "d/m/Y";
                break;
            default:
                $opt = "d F, Y";
                break;
        }
        return $vardate->format($opt);
    }

    // ============================================================== 
    // Pagination handle method
    // ==============================================================

    public function arPag($pagargs)
    {
        if (isset($_GET['page'])) {
            $this->pageno = $_GET['page'];
            if ($_GET['page'] == 0) {
                $this->pageno = 1;
            }
        } else {
            $this->pageno = 1;
        }



        $totsql = mysqli_query($this->dbcon, "SELECT COUNT(post_id) FROM ar_posts");
        $totcount = mysqli_fetch_array($totsql);
        $totalpages = ceil($totcount[0] / $this->psotslimit);
        if ($pagargs["enable"] && $totalpages > 1) {
            if ($pagargs["navbtnstyle"] == 1) {
                $prebtn = "&#8701;";
                $nxtbtn = "&#8702;";
            } else {
                $prebtn = "Previous";
                $nxtbtn = "Next";
            }
            $pagLink = "<{$pagargs['pagcontainer']} id='" . $pagargs['pagcontainerid'] . "' class='" . $pagargs['pagcontainerclass'] . "'>";

            if ($this->pageno != 1) {
                $pagLink .= "<{$pagargs['pagitemwrp']} class='" . $pagargs['prebtnclass']  . "'>";
                $pagLink .= "<a class='" . $pagargs['pagitemlinkclass'] . "' href='" . $this->arUrl(0) . "?page=" . ($this->pageno - 1) . "'>" . $prebtn . "</a>";
                $pagLink .= "</{$pagargs['pagitemwrp']}>";
            }

            for ($i = 1; $i <= $totalpages; $i++) {
                if ($this->pageno == $i) {
                    $actcls = "active";
                } else {
                    $actcls = "";
                }
                $pagLink .= "<{$pagargs['pagitemwrp']} class='" . $pagargs['pagitemclass'] . $actcls . "'>";
                $pagLink .= "<a class='" . $pagargs['pagitemlinkclass'] . "' href='" . $this->arUrl(0) . "?page=" . $i . "'>" . $i . "</a>";
                $pagLink .= "</{$pagargs['pagitemwrp']}>";
            }

            if (($i - 1) != $this->pageno) {
                $pagLink .= "<{$pagargs['pagitemwrp']} class='" . $pagargs['nxtbtnclass']  . "'>";
                $pagLink .= "<a class='" . $pagargs['pagitemlinkclass'] . "' href='" . $this->arUrl(0) . "?page=" . ($this->pageno + 1) . "'>" . $nxtbtn . "</a>";
                $pagLink .= "</{$pagargs['pagitemwrp']}>";
            }

            echo $pagLink . "</{$pagargs['pagcontainer']}>";
        }
    }

    // ============================================================== 
    // Single Post page method
    // ==============================================================
    public function arSingle()
    {
        $spnarry = [];
        $sparry = [];
        $singlep = "SELECT * FROM ar_posts WHERE post_url = '%s' LIMIT 1";
        $singlep = sprintf($singlep, $this->blogId);
        $sinquery = mysqli_query($this->dbcon, $singlep);
        if (mysqli_num_rows($sinquery) > 0) {
            while ($cnt = mysqli_fetch_assoc($sinquery)) {
                $spnarry[] = $cnt;
            }
        } else {
            header("Location: " . $this->mainurl);
        }
        foreach ($spnarry[0] as $key => $value) {
            $sparry[$key] = $value;
        }
        return $sparry;
    }

    // ============================================================== 
    // Previous and next buttons
    // ==============================================================

    public function arPrvNext($id, $type)
    {
        if ($type == "nxt") {
            $nextb = mysqli_query($this->dbcon, "SELECT * FROM ar_posts WHERE post_id>$id order by post_id ASC");
            if ($row = mysqli_fetch_array($nextb)) {
                echo $this->mainurl . "/blog/" . $row['post_url'];
            } else {
                echo "javascript:void(0)";
            }
        } elseif ($type == "prev") {
            $prevb = mysqli_query($this->dbcon, "SELECT * FROM ar_posts WHERE post_id<$id order by post_id DESC");
            if ($row = mysqli_fetch_array($prevb)) {
                echo $this->mainurl . "/blog/" . $row['post_url'];
            } else {
                echo "javascript:void(0)";
            }
        }
    }

    // ============================================================== 
    // Social Links Share  
    // ==============================================================
    public function arsocialshare($type)
    {
        $pgurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $pgtitle = $this->post["post_title"];
        $pgimage = $this->post["post_img"];

        switch ($type) {
            case 'facebook':
                echo 'https://www.facebook.com/sharer/sharer.php?u=' . $pgurl;
                break;
            case 'linkedin':
                echo 'https://www.linkedin.com/shareArticle?mini=true&url=' . $pgurl . '&amp;title=' . $pgtitle;
                break;
            case 'pinterest':
                echo 'https://pinterest.com/pin/create/button/?url=' . $pgurl . '&amp;media=' . $this->arUrl(1) . $pgimage . '&amp;description=' . $pgtitle;
                break;
            case 'googleplus':
                echo 'https://plus.google.com/share?url=' . $pgurl;
                break;
            case 'twitter':
                echo 'https://twitter.com/intent/tweet?text=' . $pgtitle . '&amp;url=' . $pgurl;
                break;

            default:
                echo 'https://www.facebook.com/sharer/sharer.php?u=' . $pgurl;
                break;
        }
    }

    public function __destruct() //afor closing conn
    {
        mysqli_close($this->dbcon);
    }
}

// ============================================================== 
// All Data variables
// ==============================================================

$pId = "post_id";
$pTitle = "post_title";
$pUrl = "post_url";
$pCategory = "post_category";
$pTags = "post_tags";
$pKeywords = "post_kws";
$pDescription = "post_des";
$pDate = "post_date";
$pContent = "post_content";
$pImage = "post_img";
$pImgalt = "post_imgalt";
$pExcerpt = "post_exp";
$pAuthor = "post_author";

$ar = new arClass($conn, $fnout);

?>

<!-- Discuss Comments Script -->
<?php if($fnout["fcomments"] == 1): ?>
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function() {
        var pagurl = window.location.href;
        this.page.url = pagurl // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = Math.floor(Math.random() *
            10000000); // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document,
            s = d.createElement('script');
        s.src = '<?php echo $fnout["disqusurlf"]; ?>';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<?php endif; ?>