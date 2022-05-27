<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type,$t1p1,$t1p2,$t1p3,$t2p1,$t3p1,$t4p1,$t4p2,$t4p3,$image1,$image2,$image3,$image4,$paragraph1,$paragraph2,$paragraph3,$paragraph4;
    public function __construct($type,$i1,$i2,$i3,$i4,$p1,$p2,$p3,$p4,$t1p1,$t1p2,$t1p3,$t2p1,$t3p1,$t4p1,$t4p2,$t4p3)
    {
        //
        $this->type=$type;
        $this->image1=$i1;
        $this->image2=$i2;
        $this->image3=$i3;
        $this->image4=$i4;
        $this->paragraph1=$p1;
        $this->paragraph2=$p2;
        $this->paragraph3=$p3;
        $this->paragraph4=$p4;
        $this->t1p1=$t1p1;
        $this->t1p2=$t1p2;
        $this->t1p3=$t1p3;
        $this->t2p1=$t2p1;
        $this->t3p1=$t3p1;
        $this->t4p1=$t4p1;
        $this->t4p2=$t4p2;
        $this->t4p3=$t4p3;



    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
