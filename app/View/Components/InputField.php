<?php

namespace App\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public $label;
    public $icon;
    public $type;
    public $id;
    public $name;
    public $value;
    public $error;
    public $hasError;
    public $suggestions;
    public $hasSuggestions;
    public $readonly;
    public $autofocus;

    public function __construct(
        $type,
        $label,
        $icon = '',
        $id = '',
        $name = '',
        $error = '',
        $value = '',
        $readonly = false,
        $suggestions = [],
        $autofocus = false)
    {
        $this->type = $type;
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->error = $error;
        $this->value = $value;
        $this->hasError = !empty($error);
        $this->suggestions = $suggestions;
        $this->hasSuggestions = !empty($suggestions);
        $this->readonly = $readonly;
        $this->autofocus = $autofocus;
    }

    public function render()
    {
        return View::make('components.input-field');
    }
}
