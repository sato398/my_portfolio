<?php

namespace App\Http\Assets;

use App\Models\Work;
use App\Models\WorkImage;

class WorkImages
{
    protected $item;
    protected $itemImage;
    protected $imagePath;
    protected $html;
    protected $doTrim;

    protected function __construct(?Work $item)
    {
        $this->item = $item;
        $this->itemImage = $item->workImages->first();
        $this->imagePath = isset($this->itemImage->path) ? url('/storage' . $this->itemImage->path) : null;
        // $this->doTrim = (bool) ($this->itemImage->cover ?? true);
    }

    public static function item(Work $item)
    {
        return (new self($item))->getHtml();
    }

    protected function build()
    {
        $this->html = '';

        if(is_null($this->imagePath)){
            $this->html = <<<HTML
                <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="currentColor" class="bi bi-card-image text-muted" viewBox="0 0 16 16">
                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                </svg>
            HTML;
        }else{
            // if($this->doTrim){
            //     $this->html = '<img class="d-block w-100 h-100 object-fit-cover" src="' . $this->imagePath. '" alt="'. $this->item->name .'の画像" />';
            // }else{
                $this->html = '<img class="d-block mw-100 mh-100" src="' . $this->imagePath. '" alt="'. $this->item->name .'の画像" />';
            // }
        }
    }

    public function getHtml()
    {
        $this->build();
        return $this->html;
    }
}
