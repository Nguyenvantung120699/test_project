<?php

namespace App\Http\Controllers;

use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoriesRepository->all();

        return view('template.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'string:categories',
            'description' => 'string',
        ]);
        try{
            $logo = null;
            $ext_allow = ["png","jpg","jpeg","gif","svg"];
            if($request->hasFile("logo")){
                $file = $request->file("logo");
                $file_name = time()."_".$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                if(in_array($ext,$ext_allow)){
                    $file->move("upload/category/",$file_name);
                    $logo = "upload/category/".$file_name;
                }
            }
            $data["logo"] = $logo;
            $this->categoriesRepository->create($data);
        }catch(Exception $e){
            return redirect()->back();
        }
        return redirect()->to('category-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = $this->categoriesRepository->find($id);

        return view('template.category.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoriesRepository->find($id);

        return view('template.category.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $name = time()."_".$logo->getClientOriginalName();
                $name = $name . "." . $logo->getClientOriginalExtension();
                $logo->move("upload/category/",$name);
                dd(1);
                $logo = "upload/category/".$name;
            }
            $data["logo"] = $logo;
            dd($data);
            $this->categoriesRepository->updateById($id, $data);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to('category-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->categoriesRepository->delete($id);

       return redirect()->to('category-index');
    }
}
