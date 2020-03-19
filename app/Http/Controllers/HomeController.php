<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $url = "https://wandbox.org/api/list.json"; //公開されているjsonデータのURL
        
        $data = [
            "code" => "#include <iostream>\nint main() { int x = 0; std::cout << \"hoge\" << std::endl; }",
            "options" =>  "warning,gnu++1y",
            "compiler" => "gcc-head",
            "compiler-option-raw" => "-Dx=hogefuga\n-O3"
        ];

        $header = [
            'Content-Type: application/json', // json形式のデータをpostするので必要
        ];

        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => implode(PHP_EOL,$header),
                'content'=>  json_encode($data),
                'ignore_errors' => true
            )
        ));

        $response = file_get_contents(
            $url,
            false,
            $context
        );

        $header = $http_response_header;
        $json = json_decode($response,true);

        return view('home', ['json' => $json]);
    }
}
