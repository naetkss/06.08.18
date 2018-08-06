<?php

ini_set('display_errors', 1);

/**
 * Config for connect to DB
 */
{
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '123456';
    const DB_NAME = 'beget';
}

/**
 * Load users data from db
 *
 * @param $user_ids
 * @return array
 */
function load_users_data(string $user_ids): array
{
    $data = [];

    $filtered_ids = array_filter(explode(',', $user_ids), function ($item) {
        return filter_var($item, FILTER_VALIDATE_INT);
    });

    if (empty($filtered_ids)) {
        return [];
    }

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $query = 'SELECT * FROM users WHERE id IN (' . implode(',', $filtered_ids) . ')';
    $result = $db->query($query);
    while ($row = $result->fetch_object()) {
        $data[$row->id] = $row->name;
    }

    mysqli_close($db);

    return $data;
}

// Как правило, в $_GET['user_ids'] должна приходить строка
// с номерами пользователей через запятую, например: 1,2,17,48
$data = load_users_data($_GET['user_ids'] ?? '');

foreach ($data as $user_id => $name) {
    echo "<a href=\"/show_user.php?id=${user_id}\">${name}</a><br>";
}
