<div>
    <div class="search-role">
        <input type="text" wire:model="searchTerm" class="form-control" placeholder="Поиск...">
    </div>
    <div class="admin__users__table__wrapper">
        <table class="admin__users__table__table table align-middle mb-0">
            <thead class="table-light">
            <tr>
                <th>#ID</th>
                <th>Пользователь</th>
                <th>Почта</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Роль</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <div class="product-box border">
                                <img src="{{asset('storage/' . $user->avatar)}}" alt="{{$user->name}}">
                            </div>
                            <div class="product-info">
                                <h6 class="product-name mb-1">{{$user->login}}</h6>
                            </div>
                        </div>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->role}}</td>
                    <td class="admin__users__nav">
                        <div class="d-flex align-items-center gap-3 fs-6">
                            <a href="{{route('admin.users.edit', $user)}}">
                                <i class="fa-solid fa-pen text-primary"></i>
                            </a>
                            <form class="form__icon" id="form_delete" action="{{route('admin.users.destroy', $user)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">
                                    <i class="fa-solid fa-trash text-danger"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginator-center">
            {{$paginator->onEachSide(5)->links()}}
        </div>
    </div>
</div>

