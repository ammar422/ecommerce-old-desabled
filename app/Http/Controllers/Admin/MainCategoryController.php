<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainCategoriesRequest;
use App\Models\MainCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $defualtLang = get_default_language();
        $categories = MainCategorie::where('translation_lang', $defualtLang)->selection()->get();
        return view('admin.mainCategories.allMainCategories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mainCategories.addMainCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MainCategoriesRequest $request)
    {

        try {
            DB::beginTransaction();
            //code...
            // begin store Defalut Category
            $main_categories = collect($request->category);
            $filter_main_categories = $main_categories->filter(function ($items) {
                return $items['abbr'] == get_default_language();
            })->all();
            $defalut_MainCategory = array_values($filter_main_categories)[0];
            if ($request->has('photo')) {
                $imagePath = uploadImage('mainCategories', $request->photo);
            }
            $defalut_MainCategory_id = MainCategorie::insertGetId([
                'name' => $defalut_MainCategory['name'],
                'translation_lang' => $defalut_MainCategory['abbr'],
                'translation_of' => 0,
                'slug' => $defalut_MainCategory['name'],
                'photo' => $imagePath,
                'active' => $request->active,
            ]);

            // end store Defalut Category

            $not_main_categories = $main_categories->filter(function ($items) {
                return $items['abbr'] !== get_default_language();
            });

            if (isset($not_main_categories) && $not_main_categories->count()) {
                $categories_Array = [];
                foreach ($not_main_categories as $category) {
                    $categories_Array = [
                        'name' => $category['name'],
                        'translation_lang' => $category['abbr'],
                        'translation_of' => $defalut_MainCategory_id,
                        'slug' => $category['name'],
                        'photo' => $imagePath,
                        'active' => $request->active,
                    ];
                }
                MainCategorie::insert($categories_Array);
            }
            DB::commit();
            return redirect()->route('addNewCategories')->with(['success'=>'New Category saved successfuly']);
        } catch (\Exception $e) {
            //Exception $e;
            DB::rollBack();
            return redirect()->route('addNewCategories')->with(['error'=>'CAN\'T saved try agien']);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
