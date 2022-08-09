<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostComponent extends Component
{

    public $row;
    public $favID;

    public function __construct($data, $favId)
    {
        $this->row = $data;
        $this->favID = $favId;
    }


    public function render()
    {
        return view('components.post-component');
    }
}
