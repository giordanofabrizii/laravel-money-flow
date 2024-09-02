<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Flow</title>

    {{-- Style --}}
    <link rel="stylesheet" href="../">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/sass/home.scss', 'resources/js/app.js', 'resources/js/home.js'])
</head>
<body>
    <div class="container-fluid p-0">
        <header>
            <div class="my-container">
                <div class="row">
                    <h1 class="col-6">Money Flow</h1>
                    <section class="col-6 d-flex flex-row justify-content-end align-items-center">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-user profile"></i>
                            <p class="d-inline">{{ Auth::user()->name }}</p>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </header>
        <main>
            <div class="my-container">
                <ul class="row" id="period-selector">
                    <li class="col-1 selected"  data-type="month" data-value="{{ \Carbon\Carbon::now()->subMonth()->format('F') }}" data-year="{{ \Carbon\Carbon::now()->subMonth()->format('Y') }}">
                        {{ \Carbon\Carbon::now()->subMonth()->format('F') }}
                    </li>
                    <li class="col-1" data-type="month" data-value="{{ \Carbon\Carbon::now()->format('F') }}" data-year="{{ \Carbon\Carbon::now()->format('Y') }}">
                        {{ \Carbon\Carbon::now()->format('F') }}
                    </li>
                    <li class="col-1" data-type="year" data-value="{{ \Carbon\Carbon::now()->subYear()->format('Y') }}">
                        {{ \Carbon\Carbon::now()->subYear()->format('Y') }}
                    </li>
                    <li class="col-1" data-type="year" data-value="{{ \Carbon\Carbon::now()->format('Y') }}">
                        {{ \Carbon\Carbon::now()->format('Y') }}
                    </li>
                </ul>
            </div>
            <div class="my-container">
                <div class="row">
                    <article class="col-2 p-3">
                        <p class="m-0">Current Balance: {{ Auth::user()->balance }} &euro;</p>
                    </article>
                    <article class="col-2 p-3">
                        <p class="m-0">Incoming: <span class="p-0" id="income">0</span>&euro; </p>
                    </article>
                    <article class="col-2 p-3">
                        <p class="m-0">Outcoming: <span id="outcome">0</span>&euro;</p>
                    </article>
                    <article class="col-2 p-3">
                        <p class="m-0">Balance of the Period: <span id="balance">0</span>&euro;</p>
                    </article>
                </div>
            </div>
            <div class="my-container p-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Category</th>
                            <th scope="col">Buttons</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            @if (Auth::user()->id == $transaction['user_id'])
                                <tr>
                                    <td>{{ $transaction['id'] }}</td>
                                    <td>{{ $transaction['user_id'] }}</td>
                                    <td>
                                        @if ($transaction['type'] == 0)
                                            -{{ $transaction['amount'] }}
                                        @else
                                            +{{ $transaction['amount'] }}
                                        @endif
                                    </td>
                                    <td>{{ $transaction['date'] }}</td>
                                    <td><i class="{{ $transaction->category->icon }} mx-2"></i>{{ $transaction->category->name }}</td>
                                    <td><a class="btn btn-primary" href="{{ Route('transactions.show',$transaction) }}">Show</a></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
