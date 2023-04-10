<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    public $title;
    public $backTo;
    public $showBackButton;
    public $leftHeaderSection;
    public $rightHeaderSection;

    public function __construct($title = '', $backTo = '', $leftHeaderSection = null, $rightHeaderSection = null)
    {
        $this->title = $title;
        $this->backTo = $backTo;
        $this->showBackButton = !empty($backTo);
        $this->leftHeaderSection = $leftHeaderSection;
        $this->rightHeaderSection = $rightHeaderSection;
    }

    public function render(): View
    {
        return view('components.app');
    }
}

