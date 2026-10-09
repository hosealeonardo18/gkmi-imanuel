@extends('layouts.app')

@section('content')
  @include('components.sections.hero')
  @include('components.sections.about')
  @include('components.sections.schedule')
  @include('components.sections.youtube')
  @include('components.sections.events')
  @include('components.sections.ministry')
  @include('components.sections.gallery')
  @include('components.sections.new-here')
  @include('components.sections.contact')
@endsection
