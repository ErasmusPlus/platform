@extends('layouts.dashboard')
@php ( $title='' )
@php ( $description='')


@section('css')
<style>
.center {
    height: 500px;
    position: relative;
    border: 0px solid rgba(50,150,50,.2);
}

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
