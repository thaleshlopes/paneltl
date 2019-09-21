<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Cdr;
use Auth;


class ControladorTarifador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (Auth::user()->admin == 'S') {
            $tarifa = Cdr::paginate(6);
            return view('tarifador', compact('tarifa'));
        }else{
           $tarifa = Cdr::where('dcontext', Auth::user()->contexto )->paginate(6);
         return view('tarifador', compact('tarifa')); 
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        if (Auth::user()->admin == 'S') {
            $tarifa = Cdr::where(function ($query) use ($data){
            //Por Data
            if (isset($data['datainicial']))
            $query->where('calldate', 'like', $data['datainicial'] . '%');


            //Por data e status
            if (isset($data['datainicial']) && isset($data['estado']))
            $query->where('calldate', 'like', $data['datainicial'] . '%')
                  ->where('disposition', $data['estado']);

            //Por data e ramal
            if (isset($data['datainicial']) && isset($data['numero']))
            $query->where('calldate', 'like', $data['datainicial'] . '%')
                  ->where('src', $data['numero'])
                  ->orWhere('dst', $data['numero']);

            //Por data, ramal e status
            if (isset($data['datainicial']) && isset($data['numero']) && isset($data['estado']))
            $query->where('calldate', 'like', $data['datainicial'] . '%')
                  ->where('src', $data['numero'])
                  ->orWhere('dst', $data['numero'])
                  ->where('disposition', $data['estado']);

            //Por Estado
            if (isset($data['estado']))
            $query->where('disposition', $data['estado']);

            //Por campo src
           if (isset($data['campo'])) {
           if (!empty($data['campo'] == 'src'))
            $query->where('src', $data['numero']);
        }
            
            
            //Por campo dst
        if (isset($data['campo'])) {
            if (!empty($data['campo'] == 'dst'))
            $query->where('dst', $data['numero']);
        }
            


         //   if (isset($data['estado']))
         //   $query->where('disposition', $data['estado']);


          //  if (!empty($data['campo'] == 'src'))
          //  $query->where('src', $data['numero']);

          //  if (!empty($data['campo'] == 'dst'))
          //  $query->where('dst', $data['numero']);

        //Por Ramal
        if (isset($data['numero']))
            $query->where('src', $data['numero'])
                  ->Orwhere('dst', $data['numero']);  

        })

        ->paginate(8);
        }
        else{
            $tarifa = Cdr::where(function ($query) use ($data){
            //Por Data
            if (isset($data['datainicial']))
            $query->where('calldate', 'like', $data['datainicial'] . '%');

            //Por data e status
            if (isset($data['datainicial']) && isset($data['estado']))
            $query->where('calldate', 'like', $data['datainicial'] . '%')
                  ->where('disposition', $data['estado']);

            //Por data e ramal
            if (isset($data['datainicial']) && isset($data['numero']))
            $query->where('calldate', 'like', $data['datainicial'] . '%')
                  ->where('src', $data['numero'])->orWhere('dst', $data['numero']);

            //Por data, ramal e status
            if (isset($data['datainicial']) && isset($data['numero']) && isset($data['estado']))
            $query->where('calldate', 'like', $data['datainicial'] . '%')
                  ->where('src', $data['numero'])
                  ->orWhere('dst', $data['numero'])
                  ->where('disposition', $data['estado']);

            //Por Estado
            if (isset($data['estado']))
            $query->where('disposition', $data['estado']);

                //Por campo src
        if (isset($data['campo'])) {
           if (!empty($data['campo'] == 'src'))
            $query->where('src', $data['numero']);
        }
            
                //Por campo dst
        if (isset($data['campo'])) {
            if (!empty($data['campo'] == 'dst'))
            $query->where('dst', $data['numero']);
        }

        //Por Ramal
        if (isset($data['numero']))
            $query->where('src', $data['numero'])
                  ->Orwhere('dst', $data['numero']);  

        })


        ->where('dcontext', Auth::user()->contexto )//dd($tarifa);
        ->paginate(6);
        }

        return view('tarifador', compact('tarifa', 'data'));

        

        
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
