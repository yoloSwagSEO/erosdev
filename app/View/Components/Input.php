<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $label;
    public $type;
    public $name;
    public $class;
    public $describeId;
    public $placeholder;
    public $help;
    public $value;
    public $nolabel;
    public $required;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$name,$placeholder,$value,$label="",$type="input",$class="",$describeId="",$help="",$nolabel=false,$required=true)
    {
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->class = $class;
        $this->describeId = $describeId;
        $this->help = $help;
        $this->nolabel = $nolabel;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
