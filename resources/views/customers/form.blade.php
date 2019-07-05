<label for="name"> Name  </label>
    <div class="input-group">
        <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control">
        {{ $errors->first('name')}}
    </div>
<br>
    <label for="email"> Email  </label>

    <div class="input-group">
        <input type="text" name="email"  value="{{ old('email') ?? $customer->email }}" class="form-control">
        {{ $errors->first('email')}}

    </div>
    <br>
    <label for="active"> Status </label>
    <div class="form-group">
        <select name="active" id="active" class="form-control">
            <option value="" disabled selected> Select customer status </option>
            @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
                 <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }} </option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="form-group">
    <label for="company_id"> Companies </label>
        <select name="company_id" id="company_id" class="form-control">
            @foreach($companies as $company)
            <option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-info"> Save customer</button>
    @csrf 