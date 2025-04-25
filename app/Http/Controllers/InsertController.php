<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\InsertModel;
use App\Models\CustomerModel;
use App\Models\AuthModel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
class InsertController extends Controller
{

public function form()
{
return view('form');
}

public function tables() {
      $products = AuthModel::all();
      return view('tables', compact('products'));
    }
public function edit($id)
{
    $product = AuthModel::findOrFail($id);
    return view('edit', compact('product'));
}
public function updateDD(Request $request, $id)
{
    $request->validate([
        'user_type' => 'required|in:Admin,User,Reseller',
    ]);

    $product = AuthModel::findOrFail($id);
    $product->update(['user_type' => $request->user_type]);

    return redirect()->route('tables')->with('success', 'User type updated successfully!');
}

public function update(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'user_type' => 'required|string|max:255',

    ]);        
    $id = $request->route('id');       
    $product = AuthModel::findOrFail($id);
    $product->name = $validated['name'];
    $product->email = $validated['email'];
    $product->phone = $validated['phone'];
    $product->user_type = $validated['user_type'];

    $product->save();   
    return redirect()->route('tables')->with('success', 'User updated successfully.');
}

public function dead($id)
{
    $product = AuthModel::findOrFail($id);
    $product->delete();
    return redirect()->route('tables')->with('success', 'User deleted successfully!');
}

public function insertdata(Request $request)
{
    $request->validate([
        'service' => 'required',
    ]);
    $user = InsertModel::create([
        'service' => $request->service,
    ]);
    if ($user) {
        return redirect()->route('services')->with('success', 'Data inserted successfully.');
    } else {
        return redirect()->route('services')->with('error', 'Something went wrong. Please try again.');
    }
}

public function services() {
    $products = InsertModel::all();
    return view('services', compact('products'));
}

//---------------------------------------------------------------
public function importCsvAA(Request $request)
{
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt'
    ]);

    $file = fopen($request->file('csv_file')->getPathname(), 'r');
    $header = fgetcsv($file);

    while ($row = fgetcsv($file)) {
        CustomerModel::create([
            'customer' => $row[0],
            'phone' => $row[1],
            'mobile' => $row[2],
            'email' => $row[3],
            'company' => $row[4],
            'gst' => $row[5],
            'pin' => $row[6],
            'city' => $row[7],
            'state' => $row[8],
        ]);
    }
    fclose($file);
    return back()->with('success', 'CSV data imported successfully!');
}
//------------------------------------------------------------------

public function customer() {
    $products = CustomerModel::all();
    return view('customer', compact('products'));
}

public function store(Request $request)
{
    $request->validate([
        'customer' => 'required|string|max:255',
        'phone' => 'required|string|max:20|unique:customers,phone',
        'mobile' => 'nullable|string|max:20',
        'email' => 'required|email|unique:customers,email',
        'company' => 'nullable|string|max:255',
        'gst' => 'nullable|string|max:15',
        'pin' => 'nullable|string|max:6',
        'city' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
    ]);
    CustomerModel::create($request->only([
        'customer', 'phone', 'mobile', 'email', 'company', 'gst', 'pin', 'city', 'state'
    ]));

    return back()->with('success', 'Customer added successfully.');
}

//  dd($request->all());


    public function destroy($id)
    {
        $product = CustomerModel::findOrFail($id);
        $product->delete();
        return redirect()->route('customer')->with('success', 'User deleted successfully!');
    }

    public function edits($id)
    {
        $product = CustomerModel::findOrFail($id);
        return view('edits', compact('product'));
    }

    public function updates(Request $request, CustomerModel $product)
    {
        $request->validate([
            'customer' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'gst' => 'required|string|max:255',
            'pin' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ]);    
    
        $product->update($request->all()); 
        return redirect()->route('customer')->with('success', 'User updated successfully.');
    }

    public function updated(Request $request)
    {
        $validated = $request->validate([
            'service' => 'required|string|max:255',
        ]);        
        $id = $request->route('id');       
        $product = InsertModel::findOrFail($id);
        $product->service = $validated['service'];
        $product->save();   
        return redirect()->route('services')->with('success', 'User updated successfully.');
    }
       
    public function customeredit($id)
    {
        $product = InsertModel::findOrFail($id);
        return view('customeredit', compact('product'));
    }

    public function remove($id)
    {
        $product = InsertModel::findOrFail($id);
        $product->delete();
        return redirect()->route('services')->with('success', 'User deleted successfully!');
    }

//---------------------------------------------------------------
public function importCsv(Request $request)
{
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt'
    ]);
    $file = fopen($request->file('csv_file')->getPathname(), 'r');
    $header = fgetcsv($file);

    while ($row = fgetcsv($file)) {
        $email = $row[3];
        $phone = $row[1];
        $customer = CustomerModel::where('email', $email)
            ->orWhere('phone', $phone)
            ->first();

        if ($customer) {
            $customer->update([
                'customer' => $row[0],
                'phone' => $phone,
                'mobile' => $row[2],
                'company' => $row[4],
                'gst' => $row[5],
                'pin' => $row[6],
                'city' => $row[7],
                'state' => $row[8],
            ]);
        } else {
            CustomerModel::create([
                'customer' => $row[0],
                'phone' => $phone,
                'mobile' => $row[2],
                'email' => $email,
                'company' => $row[4],
                'gst' => $row[5],
                'pin' => $row[6],
                'city' => $row[7],
                'state' => $row[8],
            ]);
        }
    }
    fclose($file);
    return back()->with('success', 'CSV data imported successfully!');
}
//----------------------------------------------------------------------

}

