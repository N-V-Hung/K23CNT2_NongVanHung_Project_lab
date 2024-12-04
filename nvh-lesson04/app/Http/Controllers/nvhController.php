<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProductController extends Controller
{
public function inde()
{
$fruits = array("Apple","Orange","Mango","Banana","Pineapple");
return view('welcome',compact('fruits'));
}
}