<?php

namespace App\View\Components\Prescription;

use Illuminate\View\Component;

class create extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $patient;

    public function __construct($patient)
    {
       $this->patient=$patient;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.prescription.create');
    }
}
