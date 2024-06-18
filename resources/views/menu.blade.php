@extends('layouts.app')
@section('content')
        <!-- Section-->
        <section class="py-5">
            <div class="container px-2 px-lg-5 mt-5" style="background-color:#f5f5f5; padding-top:15px; padding-bottom:15px; border-radius:10px;">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Menu</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($menu as $m)
                    <tr>
                      <td><a href="{{route('detailMenu', ['id' => $m->id])}}">{{$m->menuNom}}</a></td>
                        <td>{{$m->menuDate}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            <div>
        </section>
@endsection