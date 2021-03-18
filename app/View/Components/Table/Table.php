<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Table extends Component
{

    public $resourceName;
    public $resourceDetail;
    public $maxWidth;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($resourceName, $resourceDetail, $maxWidth = 'max-w-full')
    {
        $this->resourceName = $resourceName;
        $this->resourceDetail = $resourceDetail;
        $this->maxWidth = $maxWidth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.table.table');
    }
}
