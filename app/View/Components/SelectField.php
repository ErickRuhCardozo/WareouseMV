<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectField extends Component
{
    public $label;
    public $icon;
    public $name;
    public $id;
    public $placeholder;
    public $options;
    public $error;
    public $hasError;
    public $selectedLabel;

    public function __construct($label, $icon, $name = '', $id = '', $options = [], $placeholder = '', $error = '', $selectedLabel = '')
    {
        $this->label = $label;
        $this->icon = $icon;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->error = $error;
        $this->hasError = !empty($error);
        $this->selectedLabel = $selectedLabel;
    }

    public function render()
    {
        return view('components.select-field');
    }
}
