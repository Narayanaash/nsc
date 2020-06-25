<?php

namespace App\Http\Controllers\Frontend\Query;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

class QueryController extends Controller
{
    public function store(Request $request)
    {

      $name      = $request->input('name');
      $email     = $request->input('email');
      $phone     = $request->input('phone');
      $subject   = $request->input('subject');
      $message   = $request->input('message');

      if (strlen($name) == 0) {
        echo "<p class=\"text-danger\">Name is required!</p>";
        die();
      } elseif (strlen($phone) ==0 || strlen($phone) >12 || strlen($phone) < 10) {
        echo "<p class=\"text-danger\">Invalid phone number!</p>";
        die();
      } elseif (strlen($message) ==0) {
        echo "<p class=\"text-danger\">Message field is required!</p>";
        die();
      } elseif (strlen($message) > 500) {
        echo "<p class=\"text-danger\">Message can't be more than 400 characters!</p>";
        die();
      }

      $date_i  = now();
      $date_i  = date('m/d/Y', strtotime($date_i));
      DB::table('queries')->insert([
        "name"        => $request->input('name'),
        "email"       => $request->input('email'),
        "phone"       => $request->input('phone'),
        "subject"     => $request->input('subject'),
        "message"     => $request->input('message'),
        "created_at"  => $date_i,
      ]);

      echo "<p class=\"text-success\">Thank you, w'll get in touch shortly.</p>";
    }
}