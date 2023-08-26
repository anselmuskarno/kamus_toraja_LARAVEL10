<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahasa;
use Illuminate\Support\Facades\Storage;


class BahasaController extends Controller
{
    public function hapusBahasa($id)
    {
        $bahasa = Bahasa::find($id);
        if ($bahasa->suaraindonesia != null) { //Hapus audio lama
            Storage::delete($bahasa->suaraindonesia);
        }
        if ($bahasa->suaratoraja != null) { //Hapus audio lama
            Storage::delete($bahasa->suaratoraja);
        }
        $bahasa->delete();

        return redirect('/bahasa');
    }

    public function cariKata(Request $request)
    {
        $bahasa = Bahasa::latest();

        if (request('kata')) {
            $bahasa->where('bahasa_indonesia', 'like', '%' . request('kata') . '%')->orWhere('bahasa_toraja', 'like', '%' . request('kata') . '%');
        }

        return view('home', [
            "hasilpencarian" => $bahasa->get(),
            "total" => $bahasa->get()->count(),
            "bahasa" => Bahasa::All()
        ]);
    }

    public function updateBahasa(Request $request, $id)
    {

        $validateData = $request->validate([
            'bahasa_indonesia' => 'required',
            'bahasa_toraja' => 'required',
            'suaraindonesia' => 'required',
            'suaratoraja' => 'required'
        ]);

        $bahasa           = Bahasa::find($id);
        $bahasa->bahasa_indonesia    = $validateData['bahasa_indonesia'];
        $bahasa->bahasa_toraja  = $validateData['bahasa_toraja'];
        if ($request->hasFile('suaraindonesia')) { //Jika ada audio yang diupload

            if ($request->suaraindonesiaLama) { //Hapus audio lama
                Storage::delete($request->suaraindonesiaLama);
            }
            $bahasa->suaraindonesia = $request->file('suaraindonesia')->store('uploadaudio');
        } else { //jika tidak ada audio yang diupload
            $bahasa->suaraindonesia = $bahasa->suaraindonesia;
        }
        if ($request->hasFile('suaratoraja')) { //Jika ada audio yang diupload

            if ($request->suaratorajaLama) { //Hapus audio lama
                Storage::delete($request->suaratorajaLama);
            }
            $bahasa->suaratoraja = $request->file('suaratoraja')->store('uploadaudio');
        } else { //jika tidak ada audio yang diupload
            $bahasa->suaratoraja = $bahasa->suaratoraja;
        }

        $bahasa->save();
        return redirect('/bahasa');
    }

    public function tambahBahasa(Request $request)
    {
        $validateData = $request->validate([
            'bahasa_indonesia' => 'required',
            'bahasa_toraja' => 'required',
            'suaratoraja' => 'required',
            'suaraindonesia' => 'required',
        ]);
        if ($request->hasFile('suaratoraja')) {
            $validateData['suaraindonesia'] = $request->file('suaratoraja')->store('uploadaudio');
        }
        if ($request->hasFile('suaraindonesia')) {
            $validateData['suaratoraja'] = $request->file('suaraindonesia')->store('uploadaudio');
        }

        Bahasa::create($validateData);

        // $guru->save();
        return redirect('/bahasa');
    }
}
