<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class Review extends Component
{
    public $record,$subject,$review,$product_id,$rate;

    public function mount($id)
    {
        $this->record = Product::findOrFail($id);
        $this->product_id = $this->record->id;
    }

    public function render()
    {
        return view('livewire.review');
    }
    public function resetInput()
    {
        $this->subject = null;
        $this->review = null;
        $this->rate = null;
        $this->product_id = null;
        $this->IP = null;

    }
    public function store()
    {
        $this->validate([
            'subject'=>'required|min:5',
            'review'=>'required|min:10',
            'rate'=>'required|min:1     ',
        ]);
        \App\Models\Comment::create([
            'product_id'=>$this->product_id,
            'user_id'=>Auth::id(),
            'IP'=>$_SERVER['REMOTE_ADDR'] ,
            'rate'=>$this->rate,
            'subject'=>$this->subject,
            'comment'=>$this->review,
        ]);
        session()->flash('message','Comment send successfully.Will be published when the comment is approved');
        $this->resetInput();

    }
}
