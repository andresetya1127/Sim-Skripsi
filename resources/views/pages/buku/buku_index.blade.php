@extends('template.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="form-search" data-route="{{ route('search.skripsi') }}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-8 p-2">
                                <div class="input-group">
                                    <input type="search" placeholder="Search ..." class="form-control" name="input-search">
                                </div>
                            </div>

                            <div class="col-6 col-sm-auto p-2">
                                <button type="button" class="btn btn-outline-primary quick-sidebar-toggler btn-round">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                            </div>

                            <div class="col-6 col-sm-auto p-2">
                                <button type="submit" class="btn btn-primary btn-rounded">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row" id="result-search">
        @include('template.component.card.card_hover')
    </div>


    <div class="row">
        <div class="col-md-12 text-center mt-4">
            <button type="button" id="load-more" class="btn btn-primary btn-sm" data-target="{{ route('dashboard') }}">
                Lanjutkan <i class="fas fa-angle-down"></i>
            </button>
        </div>
    </div>


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
                                <form id="formFilter" data-target="{{ route('search.skripsi') }}">
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
                                <span class="category-title">Keyword</span>
                                <ul class="tasks-list d-flex flex-wrap">
                                    <li>
                                        <label class="custom-checkbox d-flex custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span
                                                class="custom-control-label"># Keyword 1</span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span
                                                class="custom-control-label"># eyword 2</span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span
                                                class="custom-control-label"># eyword 3 </span>
                                            <span class="task-action">
                                                <a href="#" class="link text-danger">
                                                    <i class="flaticon-interface-5"></i>
                                                </a>
                                            </span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed" style="right: 100px;bottom: 10%">
        <a href="#body" class="btn btn-icon btn-round btn-info d-flex justify-content-center align-items-center"
            style="padding: 2rem 2rem">
            <i class="fas fa-angle-double-up" style="font-size: 1.25rem"></i>
        </a>
    </div>
@endsection
