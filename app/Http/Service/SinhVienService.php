<?php

namespace App\Http\Service;

use App\Models\Sinhvien;
use PHPUnit\Exception;
use DB;

class SinhVienService 
{
    public function create($request) {
        try {
            Sinhvien::create([
                'Name'=>(string)$request->input('Name'),
                'Age'=>(string)$request->input('Age'),
                'MSSV'=>(string)$request->input('MSSV')
            ]);
            Session()->flash('success','Added student Successfully!');
        }
        catch(Exception $ex) {
            Session()-> flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }

    public function getAll() {
        return Sinhvien::paginate(5);
    }

    public function edit($request, $sinhvien) {
        try {
            $sinhvien->Name = $request->input('Name');
            $sinhvien->Age = $request->input('Age');
            $sinhvien->MSSV = $request->input('MSSV');
            $sinhvien->save();
            Session()->flash('success','Edit student successfull!');
        }
        catch (Exception $ex) {
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request) {
        $sinhvien = Sinhvien::where('id',$request->input('id'))->first();
        if($sinhvien) {
            return $sinhvien->delete();
        }
    }

    public function search($keyword) {
        if (empty($keyword)) {
            return Sinhvien::paginate(2);
        }
        else {
            return Sinhvien::where('Name','like',"%$keyword%")
                        ->orWhere('Age','like',"%$keyword%")
                        ->orWhere('MSSV','like',"%$keyword%")
                        ->paginate(2);
        }
    }

    public function selectPaginate($i) {
        return sinhvien::paginate($i);
    }

    public function sort($orderBy = 'id', $orderDir = 'asc', $perPage = 5)
    {
        $query = Sinhvien::orderBy($orderBy, $orderDir);

        return $query->paginate($perPage);
    }
}