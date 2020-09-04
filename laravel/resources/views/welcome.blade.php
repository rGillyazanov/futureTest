<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <header style="background-image: url('images/header_background.png')">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="contact">
                                    <span class="d-block header_contact_phone">
                                        Телефон: (499) 340-94-71
                                    </span>
                                    <span class="d-block header_contact_email">
                                        Email: <u>info@future-group.ru</u>
                                    </span>
                                </div>
                                <h1 class="header_title">Комментарии</h1>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-end">
                                <img src="{{ asset("images/logo.png") }}" alt="logo" height="172" width="163">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="comments">
                            @foreach ($comments as $comment)
                                <div class="comment">
                                    <div class="d-flex align-items-center">
                                        <div class="comment_name">{{ $comment->name }}</div>
                                        <div class="comment_time">{{ $comment->created_at }}</div>
                                    </div>
                                    <div class="comment_text">
                                        {{ $comment->text }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="col-6">
                            <div class="row d-block">
                                <form class="form-comment" method="post" action="{{ route('send-comment') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Ваше имя</label>
                                        <input type="text" class="form-control form-input-border" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Ваш комментарий</label>
                                        <textarea class="form-control form-input-border" style="resize: none" name="text" id="comment" rows="5"></textarea>
                                    </div>
                                    <div class="d-block d-flex justify-content-end">
                                        <button type="submit" class="btn-submit">Отправить</button>
                                    </div>
                                </form>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <strong>{!! Session::get('success') !!}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex footer-padding">
                            <div class="footer-logo">
                                <img src="{{ asset("images/logo.png") }}" alt="logo" height="101" width="106">
                            </div>
                            <div class="d-flex flex-column">
                                <div class="d-flex flex-column contact footer_contact">
                                    <span class="d-block">
                                        Телефон: (499) 340-94-71
                                    </span>
                                        <span class="d-block">
                                        Email: <u>info@future-group.ru</u>
                                    </span>
                                        <span class="d-block">
                                        Адрес: 115088 Москва, ул. 2-я Машиностроения, д. 7 стр. 1
                                    </span>
                                </div>
                                <div class="copyright d-flex align-items-end">
                                    © 2010 - 2014 Future. Все права защищены
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
