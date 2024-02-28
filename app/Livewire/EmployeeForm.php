<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeeForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $year;
    public $empYear;
    public $employeeForm = false;
    public $selectedYearRecords;

    public function empForm()
    {
        $this->employeeForm = !$this->employeeForm;
    }

    public function render()
    {
        return view('livewire.employee-form', [
            'employees' => Employee::all()->groupBy('year'),
        ]);
    }

    public function getRecordsByYear($year)
    {
        $this->empYear = $year;
        $this->selectedYearRecords = Employee::where('year', $this->empYear)->get();
    }
    
    public function saveEmployee()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required',
            'year' => 'required',
        ]);

        Employee::create($validatedData);

        session()->flash('success','Employee created successfully !!');

        return redirect()->to('/employee');
    }
}
