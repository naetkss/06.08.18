###
####Задание 1

```
CREATE TABLE users ( 
     `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(255) DEFAULT NULL,
      `gender` ENUM('не указан', 'мужчина', 'женщина') NOT NULL DEFAULT 'не указан', 
     `birth_date` TIMESTAMP NOT NULL COMMENT 'Дата в unixtime.',
      PRIMARY KEY (`id`) );  
 
 CREATE INDEX birth_date_index USING BTREE  ON users (birth_date);
 
    CREATE TABLE `phone_numbers` ( 
     `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, 
     `user_id` INT UNSIGNED NOT NULL, 
     `phone` VARCHAR(255) DEFAULT NULL, 
     PRIMARY KEY (`id`),
     FOREIGN KEY (user_id) REFERENCES users(id) );  
 
 
 SELECT u.name, count(phone_numbers.phone) 
 FROM phone_numbers 
 INNER JOIN users u ON phone_numbers.user_id = u.id 
 WHERE gender = 'женщина' AND
 DATE(u.birth_date) BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 22 YEAR)   AND DATE_SUB(DATE(NOW()), INTERVAL 18 YEAR) GROUP BY name;
`
```

#### Задание 3
При написании использовались:
 -композиция, у модели article поле author является объектом класса User;
 
#### Задание 4
При рефакторинге:
* запрос к бд в цикле заменен на один запрос;
* перед запросом выполняется валидация переданых параметров;

#### Вопрос 1
Занималась покрытием приложения unit-тестами и dusk тестами Laravel (Browser Tests); 

#### Вопрос 2
Литература:
* Д.Котеров - PHP 7;
* Алан БЬюли - Изучаем SQL;
* Эрик Фримен - Паттерны проектирования;
* Mastering Bitcoin: Unlocking Digital Cryptocurrencies;
* php.net/
* http://designpatternsphp.readthedocs.io/
* laravel.com
* Дейв Томас и Энди Хант - Программист-прагматик. Путь от подмастерья к мастеру

Планирую прочитать:
* С.Макконнел - Совершенный код;
* Э.Таненбаум - Современные ОС;
* Б.Вулф - Шаблоны интеграции корпоративных приложений;



