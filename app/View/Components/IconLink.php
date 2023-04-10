<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\View;

class IconLink extends Component
{
    public $href;
    public $icon;
    public $text;
    public $hasText;
    public $tooltip;

    public function __construct($href, $icon = '',  $text = '', $tooltip = '')
    {
        $this->href = $href;
        $this->icon = $icon;
        $this->hasText = !empty($text);
        $this->text = $text;
        $this->tooltip = $tooltip;
    }

    public function render()
    {
        return View::make('components.icon-link');
    }
}
