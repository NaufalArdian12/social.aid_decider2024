@extends('layouts.admin.sidebar')

@section('contents-admin')
    <section class="kriteria py-6 px-8 overflow-y-auto no-scrollbar ">
        <div class="header mb-6">
            <div class="wrap flex justify-between">
                <div class="title text-2xl font-semibold">
                    <h1 class="">{{ $title }}</h1>
                </div>
            </div>
        </div>
        <div class="content-body p-6 bg-neutral-50 rounded-2xl relative">

            <form action="{{ $storeLocation }}" method="POST">
                @csrf
                <input type="text" name="criteria_code" value="{{ $kriteria_id }}" hidden>
                <div class="form-header mb-5">
                    <h2 class="text-2xl">Tambahkan Data Subkriteria</h2>
                </div>
                <div class="form-body mb-6">
                    <div class="field-text flex flex-col gap-4 mb-5">
                        <x-input-form key="subcriteria_name" placeholder="Masukkan nama subkriteria" type="text"
                            title="Nama Subkriteria" />
                        <x-input-form key="subcriteria_value" placeholder="Masukkan nilai subkriteria" type="text"
                            title="Nilai Subkriteria" />
                    </div>

                </div>
                <div class="form-action flex justify-end">
                    <button type="submit"
                        class="btn bg-primary-base text-white transition-all duration-200 px-6 py-3 font-semibold rounded-lg">Submit</button>
                </div>
            </form>
    </section>
@endsection
