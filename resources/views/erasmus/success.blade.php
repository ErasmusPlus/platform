@extends('layouts.dashboard')
@php ( $title='' )
@php ( $description='')


@section('css')
<style>
.center p,h3 {
    margin: 0;
    position: absolute;
    top: 50%;
    left: calc(50% + 115px);
    transform: translate(-50%, -50%);
    color: rgb(50,100,50);
}
</style>
@endsection

@section('js')
<style>
.center p,h3 {
    margin: 0;
    position: absolute;
    top: 50%;
    left: calc(50% + 115px);
    transform: translate(-50%, -50%);
    color: rgb(50,100,50);
}
</style>
@endsection

@section('content')


  <h3>Η αίτηση σας υποβλήθηκε επιτυχώς!</h3>


@endsection
