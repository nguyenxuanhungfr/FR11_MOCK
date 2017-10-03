<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\admin\AddCatRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private $__cat;

    public function __construct()
    {
        $this->__cat = new Category();
    }

    public function index()
    {
        $list = $this->__cat->orderBy('updated_at', 'desc')->paginate(5);

        return view('back-end.category.index', compact('list'));
    }

    public function filter(Request $r)
    {
        $data['key'] = $r->search;
        $data['sort'] = $r->sort;
        $data['type'] = $r->type_sort;

        $list = $this->__cat->where('name', 'LIKE', '%' . $data['key'] . '%')
            ->orderBy($data['sort'], $data['type'])
            ->paginate(5)
            ->withPath("?search={$data['key']}&sort={$data['sort']}&type_sort={$data['type']}");

        return view('back-end.category.index', compact('list'))->with('data', $data);
    }

    public function add()
    {
        $list = $this->__cat->orderBy('updated_at');

        return view('back-end.category.add', compact('list'));
    }

    public function postAdd(AddCatRequest $r)
    {
        $this->__cat->name = $r->name;
        $this->__cat->parentId = $r->parentId;

        $this->__cat->save();

        return redirect()->route('listCat');
    }

    public function update($id)
    {
        $cat = $this->__cat->where('id', $id)->first();
        $list = Category::all();

        return view('back-end.category.update', compact('cat', 'list'));
    }

    public function postUpdate(AddCatRequest $r, $id)
    {
        $this->__cat->where('id', $id)
            ->update([
                'name'     => $r->name,
                'parentId' => $r->parentId
            ]);

        return redirect()->route('listCat');
    }

    public function delete($id)
    {
        $this->__cat->find($id)
            ->delete();

        return redirect()->route('listCat');
    }
}
