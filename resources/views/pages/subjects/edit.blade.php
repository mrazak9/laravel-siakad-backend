@extends('layouts.app')

@section('title', 'Edit Subject')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Subject</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Subjects</a></div>
                    <div class="breadcrumb-item">Edit Subject</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('subject.update', $subject) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Subject</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"
                                    class="form-control @error('title')
                                    is-invalid
                                @enderror"
                                    name="title" value="{{ $subject->title }}">
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
                                            {{ $subject->lecturer_id == $lecturer->id ? 'selected' : '' }}>
                                            {{ $lecturer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <input type="text" class="form-control" name="semester" value="{{ $subject->semester }}">
                            </div>
                            <div class="form-group">
                                <label>Academic Year</label>
                                <input type="text" class="form-control" name="tahun_akademik"
                                    value="{{ $subject->tahun_akademik }}">
                            </div>
                            <div class="form-group">
                                <label>Credits (SKS)</label>
                                <input type="text" class="form-control" name="sks" value="{{ $subject->sks }}">
                            </div>
                            <div class="form-group">
                                <label>Course Code</label>
                                <input type="text" class="form-control" name="kode_matakuliah"
                                    value="{{ $subject->kode_matakuliah }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="deskripsi">{{ $subject->deskripsi }}</textarea>
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
