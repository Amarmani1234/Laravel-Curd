<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\Customer;
use Illuminate\Support\Str;  

class BlogController extends Controller
{
 
    public function blog()
    {
        return view('blog');
    }

    public function forms()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $post = BlogModel::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'user_id' => auth()->id(),
            'status' => $validated['status'],
        ]);

        return redirect()->route('blog', $post)->with('success', 'Post created successfully!');
    }

    public function index() {
        $products = BlogModel::all();
        return view('index', compact('products'));
    }

    public function allblog() {
        $products = BlogModel::all();
        return view('allblog', compact('products'));
    }


    public function data11() {
        $products = BlogModel::all();
        return view('restore', compact('products'));
    }

    // public function destroy($id)
    // {
    //     $product = BlogModel::findOrFail($id);
    //     $product->delete();
        
    //     return redirect()->route('allblog')->with('success', 'Blog deleted successfully');
    // }


    public function blogupdate(Request $request, $id) 
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        
        $product = BlogModel::findOrFail($id);
        $product->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'body' => $validated['body'],
        ]);
        
        return redirect()->route('allblog')->with('success', 'Blog updated successfully.');
    }
    
    public function blogedit($id)
    {
        $product = BlogModel::findOrFail($id);
        return view('allblog', compact('product'));
    }


    public function destroy($id)
    {
        try {
            $post = BlogModel::findOrFail($id);
            $post->delete();
            
            return redirect()->route('allblog')
                   ->with('success', 'Post moved to trash successfully');
        } catch (\Exception $e) {
            return redirect()->route('allblog')
                   ->with('error', 'Error deleting post: '.$e->getMessage());
        }
    }

    public function restore($id)
    {
        try {
            $record = BlogModel::withTrashed()->findOrFail($id);
            $record->restore();
            
            return redirect()->back()->with('success', 'Record restored successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error restoring record: ' . $e->getMessage());
        }
    }
    
    public function trashed()
    {
        $products = BlogModel::onlyTrashed()->get();
        return view('trashed-blogs', compact('products'));
    }
    
    public function forceDelete($id)
    {
        try {
            $record = BlogModel::withTrashed()->findOrFail($id);
            $record->forceDelete();
            
            return redirect()->back()->with('success', 'Record permanently deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting record: ' . $e->getMessage());
        }
    }

    public function send(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:team,email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'message' => 'nullable|string|max:255',
    ]);
    Customer::create($request->only([
        'name', 'email','phone','address','message'
    ]));

    return back()->with('success', 'Customer added successfully.');
}

//  dd($request->all());


public function data() {
    $products = Customer::all();
    return view('restore', compact('products'));
}

}
