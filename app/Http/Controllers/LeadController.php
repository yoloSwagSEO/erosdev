<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Link;
use App\Models\Media;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request){
        $ld = new Lead();
        $ld->firstname = $request->input('firstname');
        $ld->lastname = $request->input('lastname');
        $ld->nickname = $request->input('nickname');
        $ld->birthdate = $request->input('birthdate');
        $ld->phone = $request->input('phone');
        $ld->email = $request->input('email');
        $ld->otherContact = $request->input('otherContact')??"";
        $ld->code_postal = $request->input('code_postal');
        $ld->ville = $request->input('ville');
        $ld->poids = $request->input('poids');
        $ld->taille = $request->input('taille');
        $ld->tp = $request->input('tp');
        $ld->bonnet = $request->input('bonnet');
        $ld->epilation = $request->input('epilation');
        $ld->tatouage = $request->input('tatouage');
        $ld->piercing = $request->input('piercing');
        $ld->origine = $request->input('origine');
        $ld->presentation = $request->input('presentation')??"";
        $ld->visage = $request->input('visage');
        $ld->save();

        if($request->input('link')){
            foreach ($request->input('link') as $link){
                $ln = new Link();
                $ln->lead_id = $ld->id;
                $ln->link = $link;
                $ln->save();
            }
        }
        if($request->input('files')){
            foreach ($request->input('files') as $file){
                $ln = new Media();
                $ln->lead_id = $ld->id;
                $ln->path = $file;
                $ln->save();
            }
        }
        return redirect()->route('valid');
    }
    public function result(){
        return view('validate');
    }
}
