INSERT INTO categories (name, symbol_code)
VALUES ('Доски и лыжи','boards'),
('Крепления', 'attachment'),
('Ботинки', 'boots'),
('Одежда', 'clothing'),
('Инструменты', 'tools'),
('Разное', 'other');

INSERT INTO users (register_date, email, name, password, contacts, lot_id, rate_id)
VALUES (NOW(), 'ivanoff@ololo.ru', 'Иван Иванов', 'qwerty123', 'страна розовых единорогов, улица одуванчиков, д.321', 1, 1),
(NOW(), 'petroff@ololo.ru', 'Петр Петров', 'qwerty1234', 'страна розовых одуванчиков, улица единорогов, д.123', 1, 1);

INSERT INTO lots (register_date, name, description, image, start_price, finishing_date, step, user_id, winner_id, category_id)
VALUES (NOW(), '2014 Rossignol District Snowboard', 'just simple description blablabla', 'img/lot-1.jpg', 10999, '2019-09-15 12:20:50', 0, 1, 1, 1),
(NOW(), 'DC Ply Mens 2016/2017 Snowboard', 'just simple description blablabla', 'img/lot-2.jpg', 159999, '2019-08-30 16:30:00', 0, 1, 1, 1),
(NOW(), 'Крепления Union Contact Pro 2015 года', 'just simple description blablabla', 'img/lot-3.jpg', 8000, '2019-12-10 14:30:00', 0, 1, 1, 2),
(NOW(), 'Ботинки для сноуборда DC Mutiny Charocal', 'just simple description blablabla', 'img/lot-4.jpg', 10999, '2019-12-01 16:38:00', 0, 1, 1, 3),
(NOW(), 'Куртка для сноуборда DC Mutiny Charocal', 'just simple description blablabla', 'img/lot-5.jpg', 7500, '2019-10-02 10:25:00', 0, 1, 1, 4),
(NOW(), 'Маска Oakley Canopy', 'just simple description blablabla', 'img/lot-6.jpg', 5400, '2019-08-20 21:30:00', 0, 1, 1, 6);

INSERT INTO rates (register_date, price, user_id, lot_id)
VALUES (NOW(), 10998, 1, 1),
(NOW(), 5000, 2, 6);

-- SELECT * FROM categories;

-- SELECT l.*, c.name FROM lots l LEFT JOIN categories c ON l.category_id = c.id WHERE l.id = 2;

-- UPDATE lots SET name = 'Крепления Union Contact Pro 2015 года размер L/XL' WHERE id = 3;

-- SELECT l.name, r.register_date, r.price FROM lots l LEFT JOIN rates r ON r.lot_id = l.id  WHERE l.id = 1 ORDER BY r.register_date DESC;
