@extends('layout')
@section('title', 'Update Data Master User')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.masterUser') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Data Master User</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('update.masterUser', $user->id) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Nama</label>
                            <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Username</label>
                            <input type="text" name="username"  class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Email</label>
                            <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Role</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                                <option disabled selected>-- Pilih Role --</option>
                                <option selected value="{{ $user->role->id }}">{{ $user->role->role }}</option>
                                @foreach ($role as $role)
                                    @if ($user->role->id == $role->id)
                                        @continue
                                    @else
                                        <option value="{{ $role->id }}" >{{ $role->role }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label style="font-size: 16px" class="d-block">Password</label>
                            <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" value="">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Kosongi jika tidak mengubah password !!
                            </small>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection