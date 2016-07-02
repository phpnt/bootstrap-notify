phpNT - Bootstrap Notify
================================

### Описание:
### Выводит анимированные уведомления.
### [DEMO](http://phpnt.com/widget/bootstrap-notify?id=1)

------------
### - [Поддержать phpNT](http://phpnt.com/donate/index)
------------

### Социальные сети:
 - [Канал YouTube](https://www.youtube.com/c/phpnt)
 - [Группа VK](https://vk.com/phpnt)
 - [Группа facebook](https://www.facebook.com/Phpnt-595851240515413/)

------------

Установка:

------------

```
php composer.phar require "phpnt/bootstrap-notify" "*"
```
или

```
composer require phpnt/bootstrap-notify
```

или добавить в composer.json файл

```
"phpnt/bootstrap-notify": "*"
```
### Контроллер:
------------
```php
    ...
    public function actionBootstrapNotify()
    {
        // Создание уведомления с минимальными параметрами
        \Yii::$app->session->set(
            'message',
            [
                'type'      => 'success',
                'message'   => 'Сообщение',
            ]
        );
        // Создание уведомления с расширенными параметрами
        \Yii::$app->session->set(
                    'message',
                    [
                        'type'      => 'info',                          // класс сообщения (success, info, warning, danger)
                        'icon'      => 'glyphicon glyphicon-ok',        // картинка перед сообщением, тип смотрим ниже
                        'icon_type' => 'class',                         // тип иконки в данном случае это класс bootstrap иконки,
                                                                        // для картинки image, а в icon указываем путь до картинки
                        'title'     => '<strong style="margin-left: 10px;">Спасибо</strong>',      // заголовок
                        'message'   => 'Сообщение',                     // текст сообщения

                        'element'           => 'body',                  // к какому элементу применяется уведомление
                        'position'          => 'absolute',              // позиция контейнера элемента (static | fixed | relative | absolute)
                        'allow_dismiss'     => '0',                     // позволять пользователю закрывать уведомление (1 - да, 0 - нет)
                        'newest_on_top'     => '0',                     // новое уведомление заменяет старое (1 - да, 0 - нет)
                        'showProgressbar'   => '0',                     // показывать прогресс бар (1 - да, 0 - нет)
                        'url'               => 'http://phpnt.com/',     // ссылка
                        'target'            => '_blank',                // target ссылки

                        'placement_from'    => 'bottom',                // позиция по вертикали (top или bottom)
                        'placement_align'   => 'center',                // позиция по горизонтали (left, center или right)

                        'offset'    => 20,                              // смещение от свойства placement_align (если left - смещение от левого края)
                        'offset_x'  => 20,                              // растояние между элементами уведомлений по оси x в писелях
                        'offset_y'  => 20,                              // растояние между элементами уведомлений по оси y в писелях
                        'spacing'   => 20,                              // расстояние между блоками
                        'z_index'   => 1031,                            // z-index
                        'delay'     => 5000,                            // время показа уведомления

                        'animate_enter' => 'animated fadeIn',       // анимация для начала показа
                        'animate_exit'  => 'animated fadeOut',     // анимация для конца показа
                        'template'      => '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button><span data-notify="icon"></span><span data-notify="title">{1}</span><span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>',
                        // шаблон сообщения, здесь {0} = type, {1} = title, {2} = message, {3} = url, {4} = target
                    ]
                );
        return $this->render('bootstrap-notify');
    }
```

### Представление:
------------
```php
<?php
use phpnt\bootstrapNotify\BootstrapNotify;
?>
<?= BootstrapNotify::widget(); // Вывод уведомления ?>
```

------------
# Документация (примеры):
## [Bootstrap Notify](http://bootstrap-notify.remabledesigns.com/)
------------
### Версия:
### 0.0.1
------------
### Лицензия:
### [MIT](https://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_MIT)
------------
