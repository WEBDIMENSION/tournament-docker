<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cup;

class IndexController extends Controller
{
 public function index()
 {
	$carousel_array = [
		['title' => 'Carousel Title Sample001',
			'src' => 'http://placehold.jp/979ac7/ffffff/1028x516.png?text=sample001',
			'description' => 'Description Sample001',
		],
		['title' => 'Carousel Title Sample002',
			'src' => 'http://placehold.jp/bc7dc9/ffffff/1028x516.png?text=sample002',
			'description' => 'Description Sample002',
		],
		['title' => 'Carousel Title Sample003',
			'src' => 'http://placehold.jp/3d4f44/ffffff/1028x516.png?text=sample003',
			'description' => 'Description Sample003',
		],
		['title' => 'Carousel Title Sample004',
			'src' => 'http://placehold.jp/827253/ffffff/1028x516.png?text=sample004',
			'description' => 'Description Sample004',
		],
	];
	$cups_array = [
		['title' => 'cup sample001',
			'subtitle' => 'sample001 subtitle',
			'description' => 'sample001 description',
			'src' => 'https://placehold.jp/4677a6/ffffff/800x600.png?text=Cup%20sample001',
		],
		['title' => 'cup sample002',
			'subtitle' => 'sample002 subtitle',
			'description' => 'sample002 description',
			'src' => 'https://placehold.jp/fff000/ffffff/800x600.png?text=Cup%20sample002',
		],
		['title' => 'cup sample003',
			'subtitle' => 'sample003 subtitle',
			'description' => 'sample003 description',
			'src' => 'https://placehold.jp/00ff00/ffffff/800x600.png?text=Cup%20sample003',
		],
		['title' => 'cup sample004',
			'subtitle' => 'sample004 subtitle',
			'description' => 'sample004 description',
			'src' => 'https://placehold.jp/0000ff/ffffff/800x600.png?text=Cup%20sample004',
		],
	];
	$sponsors= [
		['src'=>'http://placehold.jp/4677a6/ffffff/800x600.png?text=Sponsor%0A001',
			'title'=>'title sponsor_001'],
		['src'=>'http://placehold.jp/4677a6/ffffff/800x600.png?text=Sponsor%0A002',
			'title'=>'title sponsor_002'],
		['src'=>'http://placehold.jp/4677a6/ffffff/800x600.png?text=Sponsor%0A003',
			'title'=>'title sponsor_003'],
		['src'=>'http://placehold.jp/4677a6/ffffff/800x600.png?text=Sponsor%0A004',
			'title'=>'title sponsor_004'],
		];
     $cups = Cup::all();
     $cups_count = Cup::all()->count();
	return view('index')->with([
			'carousels' => $carousel_array,
			'cups' => $cups_array,
			'sponsors' => $sponsors,
            'cups' => $cups,
            'cups_count' => $cups_count,
		]
	);
 }

}
