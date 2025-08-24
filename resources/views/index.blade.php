<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Analyzer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card shadow rounded">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>🔢 Number Analyzer</h4>
                    </div>

                    <div class="card-body">
                        {{-- Error Display --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Input Form --}}
                        <form method="POST" action="{{ route('index.number') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="number" class="form-label">Enter a Number</label>
                                <input type="text" name="number" id="number" class="form-control" placeholder="e.g. 25" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Analyze</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Result Display --}}
                @isset($result)
                    <div class="card mt-4 border-success">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Analysis Result</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Input Number:</strong> {{ $number }}</p>

                            <ul class="list-group">
                                @foreach ($result as $message)
                                    <li class="list-group-item">{{ $message }}</li>
                                @endforeach
                            </ul>

                            @isset($squareRoot)
                                <p class="mt-3">
                                    <strong>Square Root:</strong> {{ number_format($squareRoot, 2) }}
                                </p>
                            @endisset
                        </div>
                    </div>
                @endisset

            </div>
        </div>
    </div>

</body>
</html>
