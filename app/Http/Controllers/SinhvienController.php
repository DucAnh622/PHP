<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSinhVienRequest;
use App\Http\Service\SinhVienService;
use App\Models\Sinhvien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    //
    protected $sinhvienService;
    public function __construct(SinhVienService $sinhVienService)
    {
        $this->sinhvienService  = $sinhVienService;
    }

    public function create(){
        return view('admin.sinhvien.add',[
           'title'=>'Thêm mới sinh viên'
        ]);
    }
    public function store(CreateSinhVienRequest $request){
      //xử lý thêm mới danh mục
        //dd($request->input());
        $result = $this->sinhvienService->create($request);
        return redirect()->back();
    }
    
    public function list(){
        //dd($this->danhmucService->getAll());
        return view('admin.sinhvien.list',[
            'title'=>'Danh sách sinh viên',
            'sinhviens' => $this->sinhvienService->getAll()
        ]);
    }

    public function edit(Sinhvien $sinhvien) {
        return view('admin.sinhvien.edit',[
            'title' => 'Sửa thông tin sinh viên',
            'sinhvien' => $sinhvien
        ]);
    }

    public function postedit(Sinhvien $sinhvien,CreateSinhVienRequest $request){
        $result = $this->sinhvienService->edit($request,$sinhvien);
        return redirect('admin/sinhvien/list');
    }

    public function delete(Request $request){
        $result = $this->sinhvienService->delete($request);
        if($result){
            return response()->json([
               'error'=>'false',
               'message'=>'Delete student successfully!'
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        return view('admin.sinhvien.list', [
            'sinhviens' => $this->sinhvienService->search($keyword),
            'title' => 'Danh sách tìm kiếm'
        ]);
    }

    public function SelectPaginate(Request $request) {
        return view('admin.sinhvien.list', ['sinhviens' => $this->sinhvienService->selectPaginate($request->sl), 'title' => 'Danh sách sinh viên']);
    }

    public function sort(Request $request)
    {
        $orderBy = $request->get('orderBy', 'id');
        $orderDir = $request->get('orderDir', 'asc');
        $perPage = 5;

        $sinhviens = $this->sinhvienService->sort($orderBy, $orderDir, $perPage);

        return view('admin.sinhvien.list', [
            'title' => 'Danh sách sinh viên',
            'sinhviens' => $sinhviens,
            'orderBy' => $orderBy,
            'orderDir' => $orderDir,
            'perPage' => $perPage
        ]);
    }
}