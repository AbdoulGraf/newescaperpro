<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Signature;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;

class SignatureController extends Controller
{

    use UploadImage;
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('pages.signature.index');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function list()
    {
        return view('pages.signature.table');
    }



    /**
     * @param Request $request
     * @param Signature $signature
     * @return JsonResponse
     */
    public function store(Request $request, Signature $signature){
        $info = [];
        foreach ($request->only(array_values($signature->getFillable())) as $key => $value) $info[$key] = $value;

        $params = [
            "name" => "signature",
            "dir" => "storage/uploads/signatures/". $info['first_name']."_".$info['last_name']."/",
            "file" => $info["signature"] ?? null,
            "resize" => ['w' => '2000', 'h' => '1500'],
            "key" =>  "rooms",
            "rm" => null
        ];

        if($info['reservation_date'] == null)  : $info['reservation_date'] = date("Y-m-d"); endif;
        if($request->hasFile(key: 'signature')): $info['signature'] = $this->createImage($params); endif;


        $result = $signature->fill($info)->save();

        return response()->json([
            "status" => $result ?? "n/a",
            "message" => $info['first_name'] . " bilgilerini eklediniz!",
            "class" => ($result) ? "info" : "danger",
        ]);
    }

    public function edit($id)
    {
        $record = Signature::findOrFail($id);


        return view('pages.signature._edit', [
            'record' => $record,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $record = Signature::findOrFail($id);
        $info = array();

        $datas = $request->except('_method', '_token');

        foreach ($request->only(array_values($record->getFillable())) as $key => $value)  $info[$key] = $value;

        $info['updated_by'] = Auth::user()->id;
        $result = $record->update($info);
        session()->flash('message', "Price details are updated!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $record = Signature::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return redirect()->back();
    }
}
