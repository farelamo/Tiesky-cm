<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ClientRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Exception;

class ClientController extends Controller
{
    public function error($message)
    {
        alert()->error('Maaf', $message);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        $clients = Client::select('id', 'name')->get();
        return view('admin.client.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(ClientRequest $request)
    {
        $rules = [
            'photo' => 'required|mimes:jpg,png,jpeg|max:5048',
        ];

        Validator::make($request->all(), $rules, $messages = 
        [
            'photo.required' => 'gambar harus diisi',
            'photo.mimes'    => 'gambar harus berupa jpg, png atau jpeg',
            'photo.max'      => 'maximum gambar adalah 5 MB',
        ])->validate();
        
        try{

            $imageFile      = $request->file('photo');
            $image          = time() . '-' . $imageFile->getClientOriginalName();
            Storage::putFileAs('public/client', $imageFile, $image);

            Client::create([
                'name'       => $request->name,
                'photo'      => $image,
            ]);

            alert()->success('Success', 'Data berhasil ditambahkan');
            return redirect('/dashboard/client');
        }catch(Exception $e){
            if(Storage::disk('local')->exists('public/client/' . $image)){
                Storage::delete('public/client/' . $image);
            }
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function edit($id)
    {
        $client = Client::where('id', $id)->first();
        if(!$client) {
            alert()->error('Maaf','Client tidak ditemukan');
            return redirect()->back()->withInput();
        }

        return view('admin.client.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id)
    {

        $client = Client::where('id', $id)->first();
        if(!$client) {
            alert()->error('Maaf','Client tidak ditemukan');
            return redirect()->back()->withInput();
        }

        $oriPhoto = $client->photo;

        $updateData = ['name' => $request->name,];

        if($request->hasFile('photo')){

            $rules = [
                'photo' => 'mimes:jpg,png,jpeg|max:5048',
            ];

            Validator::make($request->all(), $rules, $messages = 
            [
                'photo.mimes' => 'gambar harus berupa jpg, png atau jpeg',
                'photo.max'   => 'maximum gambar adalah 5 MB',
            ])->validate();

            $imageFile      = $request->file('photo');
            $image          = time() . '-' . $imageFile->getClientOriginalName();
            Storage::putFileAs('public/client', $imageFile, $image);

            $updateData['photo'] = $image;
        }

        try{

            $client->update($updateData);

            if($request->hasFile('photo')){
                if($oriPhoto){
                    if(Storage::disk('local')->exists('public/client/' . $oriPhoto)){
                        Storage::delete('public/client/' . $oriPhoto);
                    }
                }
            }

            alert()->success('Success', 'Data berhasil diupdate');
            return redirect('/dashboard/client');
        }catch(Exception $e){
            if($request->hasFile('photo')){
                if(Storage::disk('local')->exists('public/client/' . $image)){
                    Storage::delete('public/client/' . $image);
                }
            }
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        $client = Client::where('id', $id)->first();
        if(!$client){
            alert()->error('Maaf', 'client tidak ditemukan');
            return redirect('/dashboard/client');
        }

        try{

            if($client->photo){
                if(Storage::disk('local')->exists('public/client/' . $client->photo)){
                    Storage::delete('public/client/' . $client->photo);
                }
            }

            $client->delete();
            alert()->success('Success', 'Data berhasil dihapus');
            return redirect('/dashboard/client');
        }catch(Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }
}
