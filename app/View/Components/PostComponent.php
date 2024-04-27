<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostComponent extends Component
{

    public $row;
    public $favID;
    public function __construct($data,$favId)
    {
        $this->row = $data;
        $this->favID = $favId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-component');
    }
}
