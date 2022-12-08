<?php $title = 'Редактирование профиля' ?>
@extends('user.layout.main')
@section('content')
		<main>
			<div class="container">
				<div class="user-profile__container">
					<h1>Редактирование профиля</h1>
					<div class="profile">
						<div class="account_image">
							<img src="{{asset('public/storage/avatars/E6vd4Nsb9Qa6AU9pufw5a4Tu8GET6mVv3rz7BDYr.jpg')}}" alt="avatar" class="avatar">
						</div>
						<div class="profile__form">
							<form class="edit_proile__form">
								<div class="double__input">
									<p class="input">
										<label for="name" class="visually-hidden">Имя</label>
										<input id="name" type="text" placeholder="Имя">
									</p>
									<p class="input">
										<label for="surname" class="visually-hidden">Фамилия</label>
										<input id="surname" type="text" placeholder="Фамилия">
									</p>
								</div>
								<div class="double__input">
									<p class="input">
										<label for="login" class="visually-hidden">Логин</label>
										<input id="login" type="text" placeholder="Логин">
									</p>
									<p class="input">
										<label for="email" class="visually-hidden">E-mail</label>
										<input id="email" type="email" placeholder="E-mail">
									</p>
								</div>
								<p class="input">
									<label for="phone" class="visually-hidden">Телефон</label>
									<input id="phone" type="tel" maxlength="50" autofocus="autofocus" placeholder="Телефон">
								</p>
								<p class="input">
									<label for="password" class="visually-hidden">Пароль</label>
									<input id="password" type="password" placeholder="Пароль" class="password">
								</p>
								<p class="input-checkbox">
									<input id="show-password" type="checkbox" class="custom-checkbox">
									<label for="show-password">Показать пароль</label>
								</p>
								<p class="input">
									<label for="password-repeat" class="visually-hidden">Повторите пароль</label>
									<input id="password-repeat" type="password" placeholder="Повторите пароль">
								</p>
								<p class="input">
									<label for="download-file" class="visually-hidden"></label>
									<input id="download-file" class="download-file" type="file" accept="image/png,image/jpeg, image/jpg">
								</p>
								<button class="btn" type="submit">Сохранить изменения</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection
@section('custom_js')
    <script>
        $(function(){
            $("#phone").mask("+ 7 (999) 999-99-99");
        });
    </script>
@endsection
