<?php

namespace App\Http\Livewire\Signature;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use App\Models\Room;
use Livewire\Component;

class Form extends Component
{
    public $rooms, $room_id, $reservation_date, $signature;
    public $first_name, $last_name, $email, $phone;
    public $terms, $privacy, $refund, $liability;

    protected $listeners = ['getSignatureData'];

    public function getSignatureData($data): void
    {
        $this->signature = $data;
    }

    protected $rules = [
        'first_name' => 'required:min:3',
        'last_name' => 'required:min:3',
        'email' => 'required:email',
        'phone' => 'required:phone',
        'message' => 'required:min:3',
        'signature' => 'required',
        'room_id' => 'required',
        'terms' => 'required',
        'privacy' => 'required',
        'refund' => 'required',
        'liability' => 'required',
    ];

    /**
     * @var string[]
     */
    protected $messages = [
        'token.required' => 'Token could not created. Please refresh the page!',
    ];

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->rooms = Room::withoutTrashed()->get();
    }

    /**
     * @return RedirectResponse
     */
    /*
    public function submitForm(): RedirectResponse
    {
        $validatedData = $this->validate();

        $url = config('APP_URL');

        $response = Http::post($url."/signature", $validatedData);

        if($response->successful()){
            session()->flash('message', 'Form başarıyla gönderildi.');
        } else {
            session()->flash('message', 'Form gönderimi sırasında bir hata oluştu.');
        }

        return redirect()->back();
    }
    */
    

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('livewire.signature.form');
    }
}
