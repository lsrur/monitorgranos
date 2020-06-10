<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $from = $request->from . ' 00:00:00';
    $to = $request->to . ' 23:59:59';
    $items = \App\Data::where('date', '>=', $from)
    ->where('date', '<=', $to)
    ->orderBy('date')
    ->get();

    $resp = [
      'categories' => $items->pluck('date'),
      'temp_0' => $items->pluck('temp_0'),
      'temp_1' => $items->pluck('temp_1'),
      'temp_2' => $items->pluck('temp_2'),
      'temp_3' => $items->pluck('temp_3'),

      'hum_0' => $items->pluck('hum_0'),
      'hum_1' => $items->pluck('hum_1'),
      'hum_2' => $items->pluck('hum_2'),
      'hum_3' => $items->pluck('hum_3'),

      'co2_0' => $items->pluck('co2_0'),
      'co2_1' => $items->pluck('co2_1'),
      'co2_2' => $items->pluck('co2_2'),
      'co2_3' => $items->pluck('co2_3'),

      'stats' => [
        'sensor_0' => [
          'temp_max' => round(collect($items->pluck('temp_0'))->max(), 2),
          'temp_min' => round(collect($items->pluck('temp_0'))->min(), 2),
          'temp_avg' => round(collect($items->pluck('temp_0'))->average(), 2),
          'hum_max' => round(collect($items->pluck('hum_0'))->max(), 2),
          'hum_min' => round(collect($items->pluck('hum_0'))->min(), 2),
          'hum_avg' => round(collect($items->pluck('hum_0'))->average(), 2),
          'co2_max' => round(collect($items->pluck('co2_0'))->max(), 2),
          'co2_min' => round(collect($items->pluck('co2_0'))->min(), 2),
          'co2_avg' => round(collect($items->pluck('co2_0'))->average(), 2),
        ],
        'sensor_1' => [
          'temp_max' => round(collect($items->pluck('temp_1'))->max(), 2),
          'temp_min' => round(collect($items->pluck('temp_1'))->min(), 2),
          'temp_avg' => round(collect($items->pluck('temp_1'))->average(), 2),
          'hum_max' => round(collect($items->pluck('hum_1'))->max(), 2),
          'hum_min' => round(collect($items->pluck('hum_1'))->min(), 2),
          'hum_avg' => round(collect($items->pluck('hum_1'))->average(), 2),
          'co2_max' => round(collect($items->pluck('co2_1'))->max(), 2),
          'co2_min' => round(collect($items->pluck('co2_1'))->min(), 2),
          'co2_avg' => round(collect($items->pluck('co2_1'))->average(), 2),
        ],
        'sensor_2' => [
          'temp_max' => round(collect($items->pluck('temp_2'))->max(), 2),
          'temp_min' => round(collect($items->pluck('temp_2'))->min(), 2),
          'temp_avg' => round(collect($items->pluck('temp_2'))->average(), 2),
          'hum_max' => round(collect($items->pluck('hum_2'))->max(), 2),
          'hum_min' => round(collect($items->pluck('hum_2'))->min(), 2),
          'hum_avg' => round(collect($items->pluck('hum_2'))->average(), 2),
          'co2_max' => round(collect($items->pluck('co2_2'))->max(), 2),
          'co2_min' => round(collect($items->pluck('co2_2'))->min(), 2),
          'co2_avg' => round(collect($items->pluck('co2_2'))->average(), 2),
        ],
        'sensor_3' => [
          'temp_max' => round(collect($items->pluck('temp_3'))->max(), 2),
          'temp_min' => round(collect($items->pluck('temp_3'))->min(), 2),
          'temp_avg' => round(collect($items->pluck('temp_3'))->average(), 2),
          'hum_max' => round(collect($items->pluck('hum_3'))->max(), 2),
          'hum_min' => round(collect($items->pluck('hum_3'))->min(), 2),
          'hum_avg' => round(collect($items->pluck('hum_3'))->average(), 2),
          'co2_max' => round(collect($items->pluck('co2_3'))->max(), 2),
          'co2_min' => round(collect($items->pluck('co2_3'))->min(), 2),
          'co2_avg' => round(collect($items->pluck('co2_3'))->average(), 2),
        ],
      ]
    ];
    return $resp;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = new \App\Data;
    $data->date = \Carbon\Carbon::now();

    $data->temp_0 = $request->temp_0 ?? null;
    $data->hum_0 = $request->hum_0 ?? null;
    $data->co2_0 = $request->co_0 ?? null;

    $data->temp_1 = $request->temp_1 ?? null;
    $data->hum_1 = $request->hum_1 ?? null;
    $data->co2_1 = $request->co_1 ?? null;

    $data->temp_2 = $request->temp_2 ?? null;
    $data->hum_2 = $request->hum_2 ?? null;
    $data->co2_2 = $request->co_2 ?? null;

    $data->temp_3 = $request->temp_3 ?? null;
    $data->hum_3 = $request->hum_3 ?? null;
    $data->co2_3 = $request->co_3 ?? null;

    $data->save();

    return 'ok';
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
