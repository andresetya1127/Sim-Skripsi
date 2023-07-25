@extends('template.template')
@section('content')
    <form id="form-search" data-route="{{ route('search.skripsi') }}">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-sm-8 p-2">
                                <div class="input-group">
                                    <input type="search" placeholder="Search ..." class="form-control" name="input-search">
                                </div>
                            </div>


                            <div class="col-12 col-sm-auto p-2">
                                <button class="btn btn-primary btn-border dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="fas fa-th-list"></i></button>

                                <div class="dropdown-menu">
                                    @php
                                        $iconCheck = '<i class="fas fa-check text-success"></i>';
                                    @endphp
                                    <a class="dropdown-item" href="{{ route('showBy.index', 'list') }}">
                                        List {!! Session::get('showBy') == 'list' ? $iconCheck : '' !!}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('showBy.index', 'card') }}">
                                        Card {!! Session::get('showBy') == 'card' ? $iconCheck : '' !!}
                                    </a>
                                </div>

                                <button type="button" class="btn btn-outline-primary quick-sidebar-toggler">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>


    <div class="row" id="result-search">
        @include('template.component.card.card_hover')
    </div>


    @if (count($data) > 12)
        <div class="row">
            <div class="col-12 text-center">
                <button data-target="{{ route('load.index') }}" id="loadMore" class="btn btn-outline-primary">
                    Selanjutnya <i class="fas fa-caret-down"></i></button>
            </div>
        </div>
    @endif

    {{-- Filter --}}
    <div class="quick-sidebar">
        <a href="#" class="close-quick-sidebar">
            <i class="flaticon-cross"></i>
        </a>
        <div class="quick-sidebar-wrapper">
            <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#tasks" role="tab"
                        aria-selected="false">Filter</a> </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane show active" id="tasks" role="tabpanel">
                    <div class="quick-wrapper tasks-wrapper">
                        <div class="tasks-scroll scrollbar-outer">
                            <div class="tasks-content">
                                <span class="category-title mt-0">Sorting By Tema</span>
                                <form id="formFilter" data-target="{{ route('search.tema') }}">
                                    @csrf
                                    <ul class="tasks-list d-flex flex-wrap">
                                        @forelse ($filters as $filter)
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $filter->tema }}" name="keyword[]">
                                                        <span class="form-check-sign">{{ $filter->tema }}</span>
                                                        <span
                                                            class="badge badge-primary float-right ml-2">{{ $filter->total }}</span>
                                                    </label>
                                                </div>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed btn-scroll">
        <a href="#body" class="btn btn-icon btn-round btn-info d-flex justify-content-center align-items-center">
            <i class="fas fa-angle-double-up" style="font-size: 1.25rem"></i>
        </a>
    </div>
@endsection
