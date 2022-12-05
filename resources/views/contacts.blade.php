@extends('layouts.main')
@section('content')
<main class="container-fluid fade show bg-light bg-gradient" style="--bs-bg-opacity: .75;">
    <div class="row min-vh-100">
        <div class="col-md-6 m-auto">
            <iframe class="container-fluid"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.3062866090304!2d37.604087350965244!3d55.753181399335496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a4e03164061%3A0xed4d58fcf1206414!2z0YPQuy4g0JLQvtC30LTQstC40LbQtdC90LrQsCwgMTAsINCc0L7RgdC60LLQsCwgMTE5MDE5!5e0!3m2!1sru!2sru!4v1669548257582!5m2!1sru!2sru"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div style="font-family: 'Comic Sans MS', serif;" class="col-md-6 text-justify m-auto lh-lg p-5">
            <address>
                <b>ООО "ННБУ"</b>
                <br>Москва, 119019
                <br>улица Воздвиженка, 10
                <br><b>Метро:</b>
                <br>Арбатская, Александровский сад
                <br><b>Координаты:</b>
                <br>55.753301, 37.606272
                <br><b>Телефон:</b>
                <br><a href="tel:+78008888888">+7(892)-192-22-22</a>
            </address>
        </div>
    </div>
</main>
@endsection
