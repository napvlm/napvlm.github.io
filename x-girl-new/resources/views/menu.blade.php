<ul>
    <li @if(Route::current()->getName() == 'home') class="active-main" @endif >
        <a href="{{ route('home') }}">Главная</a>
    </li>
    <li @if(Route::current()->getName() == 'getProducts') class="active-main" @endif >
        <a href="{{ route('getProducts') }}">Товар</a>
    </li>
    <li @if(Route::current()->getName() == 'getAboutUs') class="active-main" @endif >
        <a href="{{ route('getAboutUs') }}">О нас</a>
    </li>
    <li @if(Route::current()->getName() == 'getContacts') class="active-main" @endif >
        <a href="{{ route('getContacts') }}">Контакты</a>
    </li>
</ul>
