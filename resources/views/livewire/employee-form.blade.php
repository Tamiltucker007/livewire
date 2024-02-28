<div>
    @if(!$employeeForm)
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Employee Management</h5>
                    <button class="btn btn-success" wire:click="empForm">Create Employee</button>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-start">
                        @foreach($employees->keys() as $year)
                            <button class="btn btn-primary btn-sm" wire:click="getRecordsByYear('{{ $year }}')" style="margin-right: 6px;">{{ $year }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
    @endif
    
    @if($employeeForm)
        <div class="container col-md-6 border border-info rounded p-3">
            <form wire:submit.prevent="saveEmployee">
                <div class="form-group">
                    <label for="name">Name</label> 
                    <input type="text" class="form-control" id="name" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" wire:model="phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <select class="form-control" id="year" wire:model="year">
                        @for($year = 1990; $year <= 2000; $year++)
                            <option value="{{ $year }}">{{ $year }}</option> 
                        @endfor
                    </select>
                    @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    @endif  

     <!-- Display selected year records -->
    @if(isset($selectedYearRecords) && $selectedYearRecords->isNotEmpty())
        <div class="container col-md-6 mt-3">
            <div class="card">
                <div class="card-header">
                    Employees for Year {{ $empYear }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($selectedYearRecords as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
