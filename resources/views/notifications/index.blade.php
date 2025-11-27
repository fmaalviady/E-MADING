<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Notifikasi - Mading Fasya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/gallery/logobaknus.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    @include('partials.header')

    <main>
        <div class="container" style="margin-top: 100px; margin-bottom: 50px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Notifikasi</h3>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    @if($notifications->count() > 0)
                    <div class="mb-3">
                        <form action="{{ route('notifications.markAllAsRead') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Tandai Semua Dibaca</button>
                        </form>
                    </div>

                    <div class="list-group">
                        @foreach($notifications as $notification)
                        <div class="list-group-item {{ $notification->is_read ? '' : 'list-group-item-info' }}" style="margin-bottom: 10px; border-radius: 8px;">
                            <div class="d-flex w-100 justify-content-between align-items-start">
                                <div style="flex: 1;">
                                    <h5 class="mb-1">
                                        @if($notification->type == 'new_article')
                                        <i class="fa fa-file-text text-primary"></i> Artikel Baru
                                        @else
                                        <i class="fa fa-check-circle text-success"></i> Artikel Dipublikasi
                                        @endif
                                    </h5>
                                    <p class="mb-1">{{ $notification->message }}</p>
                                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                                <div style="margin-left: 15px;">
                                    @if(!$notification->is_read)
                                    <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Tandai Dibaca</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> Tidak ada notifikasi
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')

    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
