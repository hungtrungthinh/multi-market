<?php

namespace App\Http\Controllers;

use App\Products;
use App\Companies;
use App\ProductsCompanies;
use Illuminate\Http\Request;
use App;


class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getWalmartData($UPC)
    {
//        $walmart_key = config('mykeys.Walmart_key');
//        $url = "http://api.walmartlabs.com/v1/items?apiKey=$walmart_key&upc=$UPC";
//        $json = json_decode(file_get_contents($url), true);
//
//        $walmartData['name'] = $json['items'][0]['name'];
//        $walmart_data['mediumImage'] = $json['items'][0]['mediumImage'];
//        $walmartData['shortDescription'] = $json['items'][0]['shortDescription'];
//        $walmartData[0]['merchant'] = 'Walmart';
//        $walmartData[0]['price'] = $json['items'][0]['salePrice'];
//        $walmartData[0]['date_updated'] = 'Up to date';





        $walmart_data['name'] = 'Colgate Total, Advanced Whitening Toothpaste, 8oz (226g) Tube';
        $walmart_data['mediumImage'] = 'https://i5.walmartimages.com/asr/c5766237-f619-463a-8ba7-ad2d97430f78_1.ef05aaf5e4fde90dfa0d37511a3d62c3.png?odnHeight=180&odnWidth=180&odnBg=FFFFFF';
        $walmart_data['shortDescription'] = 'This is a short description';
        $walmart_data[0]['merchant'] = 'Walmart';
        $walmart_data[0]['price'] = floatval('3.96');
        $walmart_data[0]['date_updated'] = 'Up to date';
        return $walmart_data;
    }

    public function show(Request $request)
    {
        $walmart_data = $this->getWalmartData($request->search_box);

        if( !empty($walmart_data) ){

            $product_details['name'] = $walmart_data['name'];
            $product_details['mediumImage'] = $walmart_data['mediumImage'];
            $product_details['shortDescription'] = $walmart_data['shortDescription'];
            $product_compare[0] = $walmart_data[0];

            $url = "http://multi-market.local/my_json.json";
            $json = json_decode(file_get_contents($url), true);

            $allMarkets = $json['items'][0]['offers'];

            $companies = Companies::select()->get();

            foreach ($companies as $oneCompany) {
                foreach ($allMarkets as $key => $oneMarket){
                    if ($oneMarket['merchant'] == $oneCompany['company_name'] && $oneCompany['is_comparable'] == 1){
                        $product_compare[$key+1]['merchant'] = $oneMarket['merchant'];
                        $product_compare[$key+1]['price'] = $oneMarket['price'];
                        $product_compare[$key+1]['date_updated'] = date('M d, Y', $oneMarket['updated_t']);
                    }
                }
            }
            $product_compare = array_sort($product_compare, 'price', SORT_DESC); // Sort by oldest first

            $product_details['compare'] = $product_compare;

        } else {
            dd('else');
        }

        return view('show', compact('product_details'));
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
