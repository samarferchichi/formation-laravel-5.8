<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerHasRegisteredEvent;

class CustomersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
   {
    $customres = Customer::all();

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
       $data = request()->validate([
           'name' => 'required|min:3',
           'email' => 'required|email',
           'active' => 'required',
           'company_id' => 'required',

       ]);

        $customer =  Customer::create($this->validateRequest());

        event(new NewCustomerHasRegisteredEvent($customer));

     return redirect('customers');

    }

    public function show($customer)
    {
        $customer = Customer::find($customer);
       //dd($customer);  
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

        return redirect('customers/'. $customer->id);   
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        
        return redirect('customers');

    }


    public function validateRequest()
    {
        return  (
            $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            
        ]));
    }


}