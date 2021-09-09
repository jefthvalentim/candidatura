<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Category;
use App\CategoryPortfolio;
use Storage;
use App\Gallery;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function construct()
    {
        $this->middleware('auth')->except('changeOrder'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios = Portfolio::orderBy('order')->paginate(10);
        return view('portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name')->get();
        return view('portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $order = Portfolio::orderBy('order', 'Desc')->first();
        $portfolio = Portfolio::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'video' => $request->video,
            'date' => $request->date,
            'midia' => '',
            'order' => $order->order + 1
        ]);
        
        if($portfolio){

            foreach($request->category_id as $category) {
                CategoryPortfolio::create([
                    'category_id' => $category,
                    'portfolio_id' => $portfolio->id
                ]);
            }

            $name = md5(time()) . '.' . $request->midia->extension();
            $request->midia->storeAs('public/portfolios/' . $portfolio->id, $name);
            $portfolio->midia = $name;

            $portfolio->save();

            if($request->galleries){
                foreach($request->galleries as $image){
                    $name = md5(time() . $image->getClientOriginalName()) . '.' . $image->extension();
                    $image->storeAs('public/portfolios/' . $portfolio->id, $name);
                    $portfolio->gallery()->create([
                        'image' => $name
                    ]);
                }
            }
        }

        return redirect()->route('portfolio.create')->with('success','Portfólio criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
        return view('portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
        $categories = Category::orderBy('name')->get();
        return view('portfolio.edit', compact('portfolio', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
        $portfolio->name = $request->name;
        $portfolio->description = $request->description;
        $portfolio->save();
        return redirect()->back()->with(['success' => 'Portfólio actualizado com sucesso!']);
    }

    public function highlight(Portfolio $portfolio)
    {
        //
        $item = Portfolio::where('highlight', true)->first();
        if($item) {
            $item->highlight = false;
            $item->save();
        }
        $portfolio->highlight = true;
        $portfolio->save();
        return redirect()->back()->with(['success' => 'Portfólio destacado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $dirname = storage_path('app/public'). '/portfolios/' . $portfolio->id;
        array_map('unlink', glob("$dirname/*.*"));
        rmdir($dirname);
            
        $portfolio->delete();
        return redirect()->back()->with(['success' => 'Portfólio eliminado']);
    }

    public function galleryDestroy(Gallery $gallery)
    {
        //
        $gallery->delete();
        return redirect()->back()->with(['success' => 'Imagem eliminada da galeria']);
    }

    public function storeGallery(Portfolio $portfolio, Request $request)
    {
        //

        foreach($request->galleries as $image){
            
            $name = md5(time() . $image->getClientOriginalName()) . '.' . $image->extension();
            $image->storeAs('public/portfolios/' . $portfolio->id, $name);
            $portfolio->gallery()->create([
                'image' => $name
            ]);
        }

        return redirect()->route('portfolio.show', $portfolio->id)->with('success','Imagens adicionadas na galeria.');
    }

    public function changeOrder(Request $request)
    {
        //
        $item = Portfolio::where('order', $request->value)->first();
        $item2 = Portfolio::where('order', $request->order)->first();
        $item->order = $request->order;
        $item2->order = $request->value;
        $item->save();        
        $item2->save();
        
        return true;
    }
}
