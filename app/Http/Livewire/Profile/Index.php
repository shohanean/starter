<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use App\Models\Log;

class Index extends Component
{
    public $avatar_link;
    public $more_logs;
    public $loadolder_btn;

    public function mount()
    {
        $this->avatar_link = auth()->user()->avatar;
    }
    public function loadolder()
    {
        $this->more_logs = Log::where('user_id', auth()->id())->offset(10)->take(Log::count())->latest()->get();
        $this->loadolder_btn = "d-none";
    }
    public function render()
    {
        return view('livewire.profile.index',[
            // 'logs' => Log::where('user_id', auth()->id())->latest()->get()
            'logs' => Log::where('user_id', auth()->id())->latest()->paginate(10)
        ]);
    }
}
