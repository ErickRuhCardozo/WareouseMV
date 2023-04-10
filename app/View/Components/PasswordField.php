<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PasswordField extends Component
{
    public $label;
    public $error;
    public $hasError;

    public function __construct($label, $error = '')
    {
        $this->label = $label;
        $this->error = $error;
        $this->hasError = !empty($error);
    }

    public function render()
    {
        return view('components.password-field');
    }
}
