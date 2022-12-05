<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">Редактирование</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-save"></i>
                <p>
                    Билеты
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('tickets.admin')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Посмотреть</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tickets.admin.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Добавить</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-save"></i>
                <p>
                    Пользователи
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('tickets.admin.user')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Посмотреть</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('tickets.index')}}" class="nav-link">
                <i class="nav-icon fas fa-save"></i>
                <p>
                    Вернуться на сайт
                </p>
            </a>
        </li>
    </ul>
</nav>
