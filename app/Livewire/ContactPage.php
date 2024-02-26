<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactPage extends Component
{   
    public $name;
    public $email;
    public $message;

    public function render()
    {
        return view('livewire.contact-page');
    }

    public function submit() {

        // validation for contact form
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'message' => 'required',
        ]);

        // Store the contact details in the contacts table
        Contact::create($validatedData);

        //Display the success message
        session()->flash('success','We are Contact Soon !!');

        return redirect()->to('/contact');
    }

}
