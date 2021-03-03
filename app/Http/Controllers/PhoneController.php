<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Row Sql
        // $all_phones = DB::select('SELECT * FROM phones');

                 // Query Builder sintaksa

        $all_phones = DB::table('phones')->get();     // Uzima sve iz 'phones'
        $one_with_id = DB::table('phones')->find(3);  // Uzima sa id-em 3
                    //Uzima telefone sa cenama i opciono menja 'price' u 'cena'
        $phones_just_price = DB::table('phones')->select('price as cena' )->get();
        $cene = DB::table('phones')->pluck('price'); // Uzima samo cene 'pluck' - znaci izdvoji
        $count = DB::table('phones')->count(); // prebrojava koliko ima proizvoda (telefona).
        $max_price = DB::table('phones')->max('price');  // Prikazuje najvisu cenu.
        $sum_price = DB::table('phones')->sum('price');  // Prikazuje zbir svih cena.
        $avg_price = DB::table('phones')->avg('price');  // Prikazuje prosecnu vrednost cena.

                          // WHERE i varijacije

        $redmi9 = DB::table('phones')->where('name','Redmi 9')->first(); // Po imenu prvi
        $redmi9_cena = DB::table('phones')->where('name','Redmi 9')->value('price'); // Cena

                                                // Po ceni nizoj od 7000
        $low_cost_phones = DB::table('phones')->where('price', '<' ,70000)->get();

                                // Po ceni nizoj od 7000 i da je brand Xiaomi
        $low_cost_xiaomi = DB::table('phones')->where([['price', '<' ,70000],['brand','Xiaomi']])->get();

                       // Po ceni visoj od 70000 i da je brand Apple
        $high_cost_apple = DB::table('phones')->where([['price', '>' ,70000],['brand','Apple']])->get();

               // Po ceni visoj od 70000 ili da je brand Apple  WHERE i OR
        $low_cost_or_iPhone = DB::table('phones')->where('price','<',70000)->orWhere('brand','Apple')->get();

              // Trebju nam samo Samsung i Apple telefoni
        $samsung_i_apple = DB::table('phones')->whereIn('brand',['Apple', 'Samsung']);

               // Trazimo po datumu (whereYear, whereMonth, whereDay)
        $by_date = DB::table('phones')->whereDate('created_at', '2021-05-13')->get();

               //  Dobijamo sve Brendove, bez ponavljanja brendova (distinct)
        $all_brands = DB::table('phones')->select('brand')->distinct()->get();

               // Sortiramo telefone po ceni opadajuce od najvece do najnize
        $sort_desc = DB::table('phones')->orderBy('price','desc')->get();



        \Debugbar::info($sort_desc);

        // dd($all_phones);

        return view('phones.index', [ 'all_phones' => $sort_desc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([       // validacija
              'name' => 'required',
              'brand' => 'required',
              'price' => 'required'
          ]);

        //   DB::insert("INSERT INTO phones (name, brand, price) VALUES
        //   ('$request->name', '$request->brand', $request->price)");
        //   return redirect('/phones');


                       // Query Builder sintaksa


             DB::table('phones')->insert([

                'name' => $request->name,'brand' => $request->brand,'price' => $request->price

             ]);

             return redirect('/phones');



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
       $phone = DB::select('SELECT * FROM phones WHERE id = :id', ['id' => $id])[0];

       return view('phones.edit', ['phone' => $phone]);
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
        $request->validate([

            'name' => 'required',
            'brand' => 'required',
            'price' => 'required'

            ]);

            DB::update(" UPDATE phones SET name = :name, brand = :brand, price = :price
             WHERE id = :id", ['name'=>$request->name, 'brand' => $request->brand,
            'price' => $request->price, 'id' => $id] );

            return redirect('/phones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM phones WHERE id = ?',[$id]);

        return redirect('/phones');
    }
}
