@extends('layouts.app')

@section('title', 'Create Subject')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Subject</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Subjects</a></div>
                    <div class="breadcrumb-item">Create Subject</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('subject.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Create Subject</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"
                                    class="form-control @error('title')
                                    is-invalid
                                @enderror"
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Lecturer</label>
                                <select name="lecturer_id" class="form-control">
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id }}"
                                            {{ old('lecturer_id') == $lecturer->id ? 'selected' : '' }}>
                                            {{ $lecturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <input type="text" class="form-control" name="semester" value="{{ old('semester') }}">
                            </div>
                            <div class="form-group">
                                <label>Academic Year</label>
                                <input type="text" class="form-control" name="tahun_akademik"
                                    value="{{ old('tahun_akademik') }}">
                            </div>
                            <div class="form-group">
                                <label>Credits (SKS)</label>
                                <input type="text" class="form-control" name="sks" value="{{ old('sks') }}">
                            </div>
                            <div class="form-group">
                                <label>Course Code</label>
                                <input type="text" class="form-control" name="kode_matakuliah"
                                    value="{{ old('kode_matakuliah') }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
