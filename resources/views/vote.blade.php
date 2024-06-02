@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Vote for Your Representatives</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" id="error-message">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger" id="validation-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('votes.store') }}" method="POST">
            @csrf
            <div class="row">
                @foreach ($candidates as $role => $candidatesList)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-4">
                        <h3>{{ $role }}</h3>
                        @foreach ($candidatesList as $candidate)
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="candidates[{{ $role }}]" onclick="hideErrors()"
                                    value="{{ $candidate->id }}" required>
                                <label class="form-check-label">{{ $candidate->name }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit Vote</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function hideErrors() {
            document.getElementById('error-message')?.classList.add('d-none');
            document.getElementById('validation-errors')?.classList.add('d-none');
        }
    </script>
@endsection
