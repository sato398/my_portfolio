<?php

namespace App\Http\Assets;

use App\Models\Work;
use App\Models\WorkImage;

class WorkCarouselImages
{
    protected $item;
    protected $itemImages;
    protected $imagePaths;
    protected $html;

    protected function __construct(?Work $item)
    {
        $this->item = $item;
        $this->itemImages = $item->workImages;

        $this->itemImages->each(function($itemImage){
            $this->imagePaths[] = isset($itemImage->path) ? url('/storage' . $itemImage->path) : null;
        });
    }

    public static function item(Work $item)
    {
        return (new self($item))->getHtml();
    }

    protected function build()
    {
        $this->html = '';

        $indicators = '';
        $images = '';

        $this->itemImages->each(function($itemImage, $index) use (&$indicators, &$images){
            $imagePath = isset($itemImage->path) ? url('/storage' . $itemImage->path) : null;

            $images .= '<div class="carousel-item';
            $indicators .= '<li data-target="#item-carousel" data-slide-to="' . $index . '" class="bg-dark';

            if($index === 0){
                $images .= ' active';
                $indicators .= ' active';
            }

            $images .= '">';
            $indicators .= '"></li>';

            $images .= <<<HTML
                <div class="image-box-inner">
                    <div class="image-wrap">
            HTML;

            if(is_null($imagePath)){
                $images .= <<<HTML
                    <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="currentColor" class="bi bi-card-image text-muted" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                    </svg>
                HTML;
            }else{
                if($itemImage->cover ?? true){
                    $images .= '<img class="d-block w-100 h-100 object-fit-cover" src="' . $imagePath . '" alt="'. $this->item->name . 'の画像 ' . $index + 1 . '" />';
                }else{
                    $images .= '<img class="d-block mw-100 mh-100" src="' . $imagePath . '" alt="'. $this->item->name . 'の画像 ' . $index + 1 . '" />';
                }
            }

            $images .= <<<HTML
                    </div>
                </div>
            HTML;

            $images .= '</div>';
        });

        $this->html .= <<<HTML
            <div id="item-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    ${indicators}
                </ol>

                <div class="carousel-inner">
                    ${images}
                </div>

                <a class="carousel-control-prev" href="#item-carousel" role="button" data-slide="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-muted bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </a>

                <a class="carousel-control-next" href="#item-carousel" role="button" data-slide="next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-muted bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </a>
            </div>
        HTML;


    }

    public function getHtml()
    {
        $this->build();
        return $this->html;
    }
}
