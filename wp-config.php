<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'admitad' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'wordpress' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'wordpress' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3e|o2)JgQ*p2c[u.c;1y<+}g+8*=I;b _,I<4HNU|uXIq_l!WvwjAu1& !oyb+qK' );
define( 'SECURE_AUTH_KEY',  'CC~{-)P8mI!u9tC7,d;c{P5C))xy#ko96OG&6Msdolwe]}syn>%u5`gNMKxS0iVg' );
define( 'LOGGED_IN_KEY',    'H{sVp:p Pml)7Ta_B2]hu?fxU>M8)$1n^PVQg3^.}O^B!Xk#xf{^(>`+=_5Snual' );
define( 'NONCE_KEY',        '!a]cISmb%|_HpRO}]&Sy!??f#Vc@4i)9w mgFmnB1cek>~[0HfEC~-&~Y,;!FT>M' );
define( 'AUTH_SALT',        ')=X(wSdQ@(kvFdJ_dZ5G?7[VL[6^VHQQ@f:!dpS{QKqRTJZ9Y?cvWQ?Gzl2ydTXd' );
define( 'SECURE_AUTH_SALT', '*kNWPv}gsRFh?URo8i?rT>]8<.qi^*1yO)q./3WEGS{CYpJI4: ~PL<kuFh|~OhZ' );
define( 'LOGGED_IN_SALT',   'vVVDKY^L-isxAHwxram-W;s3x0qeK$DZgn=Pn=9u[yS|KqzZp<Tl4d<Ie,v_Q[+5' );
define( 'NONCE_SALT',       'JI0cRwt2p(pfQ3_UIcka%kaBK`Sm4=.6j3yz _cJt_F#v2_pz|f{X t@-^}tbX$g' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
