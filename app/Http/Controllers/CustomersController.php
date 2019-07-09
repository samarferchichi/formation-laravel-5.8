<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerHasRegisteredEvent;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
   {

    $customres = Customer::with('company')->paginate(20);

    return view('customers.index', compact('customres'));

   }

    public  function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create',compact('companies','customer'));  
    }

   public function store()
   {

        $this->authorize('create', Customer::class);
        
        $customer = Customer::create($this->validateRequest());
        
        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));

        return redirect('customers');

    }

    public function show($customer)
    {
        $customer = Customer::find($customer);

        return view('customers.show',compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('customer', 'companies'));
    }


    public function update(Customer $customer)
    {
           
        $customer->update($this->validateRequest());

        $this->storeImage($customer);

        return redirect('customers/'. $customer->id);   
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        
        return redirect('customers');

    }


    public function validateRequest()
    {
        return request()->validate([

            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|required|image|max:5000',

        ]);

    }


    private function storeImage($customer)
    {
        if(request()->has('image')){
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $customer->image))->fit(300, 300);
            $image->save();
        }
    }

}