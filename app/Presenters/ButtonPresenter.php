<?php

namespace App\Presenters;

use URL;
use Illuminate\Database\Eloquent\Model;

class ButtonPresenter
{
    public static function Detail($id)
    {
        $url = URL::full();
        echo "<button type=\"submit\" class='btn btn-sm btn-secondary'>";
        echo 	"<i class='fas fa-info-circle'></i>&nbsp;詳細資料";
        echo "</a>";
    }

    public static function Deleting($id)
    {
        // $url = URL::full();
        echo "<button type='submit' class='btn btn-sm btn-danger btn-delete'>";
        echo 	"<i class='fas fa-trash-alt'></i>&nbsp;刪除";
        echo "</button>";
    }

    public static function Edit($id)
    {
        echo "<button type=\"submit\" class='btn btn-sm btn-success' formtarget='_blank'>";
        echo "<i class='fas fa-pencil-alt'></i>&nbsp;編輯";
        echo "</button>";
    }

    public static function Create()
    {
        $url = URL::full();
        echo "<a class='btn btn-sm btn-primary' href='{$url}/create'>";
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

    public static function To($url=false,$to, $txt, $query="", $class="btn-secondary", $fas="list-ol", $confirm=false)
    {
        $url = $url?URL::full():'';
        if ($confirm == true) {
            $confirm = 'onclick="return confirm(\'確認刪除?\')"';
        }
        if ($url) {
            echo "<a class='btn btn-sm {$class}' href='{$url}/{$to}/{$query}' {$confirm}>";
        }
        else{
            echo "<a class='btn btn-sm {$class}' href='{$to}/{$query}' {$confirm}>";
        }
        echo 	"<i class='fas fa-{$fas}'></i>&nbsp;{$txt}";
        echo "</a>";
    }

    public static function GoBack($url = "#")
    {
        $current_url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
        $target_url = ($url) ? $url: URL::previous();

        echo "<a class='btn btn-sm btn-warning' href='{$target_url}'>";
        echo 	"<i class='fas fa-arrow-left'></i> 回到列表";
        echo "</a>";
    }
}
