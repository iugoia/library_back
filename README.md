<h1>Веб-сервис "Библиотека"</h1>

<hr>

<h2>Памятка</h2>

<ol>
    <li>Зарегистрируйтесь на Github</li>
    <span>Если у вас еще нет аккаунта на github.com, скорее зарегистрируйтесь</span><br><br>
    <li>Клонируйте репозиторий на свой компьютер</li>
    <span>Клонировать репозиторий можно так:</span>
    <pre class="notranslate"><code>git clone https://github.com/iugoia/newlibrary</code></pre>
    <p>Команда клонирует репозиторий на ваш компьютер (комманду вводить в папке domains в open server).</p>
    <li>Скачайте и установите Composer. Откройте проект, пропишите в терминал следующую команду:</li>
<pre class="notranslate"><code>composer i
</code></pre>
<p>Она нужна для того, чтобы установить ядро проекта.</p>
    <li>Пропишите в терминал следующую команду:</li>
    <pre class="notranslate"><code>php artisan storage:link
</code></pre>
    <p>Она нужна для создания ссылки на изображения в проекте</p>
    <li>Откройте phpMyAdmin и создайте базу данных utf8mb4_unicode_ci с названием library и пропишите в терминал следующую команду:</li>
<pre class="notranslate"><code>php artisan migrate
</code></pre>
    <li>Запустите проект через OpenServer</li>
</ol>
