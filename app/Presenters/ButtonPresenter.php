<?php

namespace App\Presenters;

use URL;
use Redirect;
use Illuminate\Database\Eloquent\Model;
use Request;

class ButtonPresenter
{
    public static function Detail($url)
    {
        echo "<a href='{$url}' class='btn btn-sm btn-secondary'>";
        echo 	"<i class='fas fa-info-circle'></i>&nbsp;詳細資料";
        echo "</a>";
    }

    public static function Deleting($page, $id)
    {
        $url = Request::root();
        echo "<a href='{$url}/{$page}/destroy/' class='btn btn-sm btn-danger btn-delete' id='delete' data-id='{$id}'>";
        echo 	"<i class='fas fa-trash-alt'></i>&nbsp;刪除";
        echo "</a>";
    }

    public static function Edit($route, $id)
    {
        $url = URL::route($route, $id);
        echo "<a href='{$url}' class='btn btn-sm btn-success' formtarget='_blank'>";
        echo    "<i class='fas fa-pencil-alt'></i>&nbsp;編輯";
        echo "</a>";
    }

    public static function Create($route, $id)
    {
        $url = URL::route($route, $id);
        echo "<a class='btn btn-sm btn-primary' href='{$url}'>";
        echo 	"<i class='fas fa-plus'></i>&nbsp;新增";
        echo "</a>";
    }

    public static function Import()
    {
        $url = URL::full();
        echo "<a class='btn btn-sm btn-primary' href='{$url}/import'>";
        echo    "<i class='fas fa-file-import'></i>&nbsp;匯入";
        echo "</a>";
    }

    public static function Reset()
    {
        echo "<p class='text-right'>";
        echo	"<a class='btn btn-sm btn-reset btn-danger' href='reset.php'>";
        echo		"<i class='fas fa-undo-alt'></i>&nbsp;重置";
        echo 	"</a>";
        echo "</p>";
    }

    public static function To($to, $fas="list-ol", $class="", $id="",$txt="")
    {
        echo "<a id='$id' class='btn btn-sm {$class}' href='{$to}'>";
        echo 	"<i class='fas fa-{$fas}'></i>&nbsp;{$txt}";
        echo "</a>";
    }

    public static function GoBack($url = "#")
    {
        $current_url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
        $target_url = ($url) ? $url: URL::previous();

        echo "<a class='btn btn-sm btn-default' href='{$target_url}'>";
        echo 	"<i class='fas fa-arrow-left'></i> 回到列表";
        echo "</a>";
    }
}
