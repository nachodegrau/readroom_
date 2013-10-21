/*  
	----- COMANDOS CONSOLA DOCTRINE, SYMFONY Y DOCTRINE EXPORT -----
	php app/console doctrine:database:drop --force
	php app/console doctrine:database:create
	php app/console doctrine:schema:update --force
	php app/console generate:bundle --namespace=Readroom/InputBundle --format=yml

	php cli/export.php --config=exportformat.json ./in/model_readroom_2.mwb ./Entity

*/


/* LANGUAGES */
INSERT INTO `readroom`.`languages`
(`name`)
VALUES
(
"Castellano"
);

INSERT INTO `readroom`.`languages`
(`name`)
VALUES
(
"English"
);

/* USERS */

INSERT INTO `readroom`.`readers` ( reader_name, reader_second_name, reader_email, reader_city, reader_country, reader_telephone, is_facebook)
VALUES
(
"Nacho", "de Grau", "nachodegrau@hotmail.com", "Barcelona", "Spain", "627817842", 0
);

UPDATE `readroom`.`readers` SET `reader_image`='user1.jpg', `reader_name`='Nacho de Grau' WHERE `id`='1';

/* BOOKS */
INSERT INTO `readroom`.`books`
(
`languages_id`,
`book_author`,
`book_name`,
`book_synopsis`,
`publication_year`,
`source`,
`ISBN_code`,
`book_is_free`,
`book_front`,
`date_added`,
`last_modified`,
`opf_name`)
VALUES
(
2,
"Franz Kafka",
"Metamorfosis",
"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel sem consectetur, pellentesque ipsum sed, mollis sem. Aliquam semper pellentesque felis, interdum vehicula erat facilisis nec. Vivamus scelerisque ante non dui suscipit sollicitudin. Curabitur ullamcorper sem at lectus porta dapibus nec non elit. Nam vulputate velit justo, sed accumsan lectus lobortis sit amet. Praesent lacinia felis id elementum hendrerit. Morbi fringilla elementum egestas. Fusce blandit eu tortor non lacinia. Sed in mauris at ligula blandit porta. Maecenas in pulvinar augue. Curabitur vel ultricies arcu, eget adipiscing arcu.",
1915,
"source/Metamorfosis/5200/",
9781479157303,
1,
"books/source/Metamorfosis/cover.jpg",
NOW(),
NOW(),
"content.opf"
);

INSERT INTO `readroom`.`books`
(
`languages_id`,
`book_author`,
`book_name`,
`book_synopsis`,
`publication_year`,
`source`,
`ISBN_code`,
`book_is_free`,
`book_front`,
`date_added`,
`last_modified`,
`opf_name`)
VALUES
(
2,
"Jane Austen",
"Pride and Prejudice",
"Fusce quis lorem sed lectus consectetur aliquet. Sed in vulputate ante. Ut massa ligula, congue quis diam in, tincidunt adipiscing mauris. Nullam commodo scelerisque lectus, id ultricies sapien euismod mattis. Nullam convallis quam posuere porttitor laoreet. Aenean faucibus facilisis ornare. Cras eu ultrices enim, sed elementum arcu. Vestibulum non nisi vel metus fringilla adipiscing nec eu est. Duis blandit libero suscipit tristique consequat. Vivamus facilisis at orci sed fringilla. Etiam tempor consequat tristique. Phasellus condimentum augue magna, eu varius nisl porttitor id.",
1813,
"source/Prideandprejudice/1342/",
9780147509055,
1,
"books/source/Prideandprejudice/cover.jpg",
NOW(),
NOW(),
"content.opf"
);

INSERT INTO `readroom`.`books`
(
`languages_id`,
`book_author`,
`book_name`,
`book_synopsis`,
`publication_year`,
`source`,
`ISBN_code`,
`book_is_free`,
`book_front`,
`date_added`,
`last_modified`,
`opf_name`)
VALUES
(
1,
"Walter Isaacson",
"Steve Jobs",
"Fusce quis lorem sed lectus consectetur aliquet. Sed in vulputate ante. Ut massa ligula, congue quis diam in, tincidunt adipiscing mauris. Nullam commodo scelerisque lectus, id ultricies sapien euismod mattis. Nullam convallis quam posuere porttitor laoreet. Aenean faucibus facilisis ornare. Cras eu ultrices enim, sed elementum arcu. Vestibulum non nisi vel metus fringilla adipiscing nec eu est. Duis blandit libero suscipit tristique consequat. Vivamus facilisis at orci sed fringilla. Etiam tempor consequat tristique. Phasellus condimentum augue magna, eu varius nisl porttitor id.",
2011,
"source/Stevejobs/OEBPS/",
9781451648546,
1,
"books/source/Stevejobs/cover.jpg",
NOW(),
NOW(),
"content.opf"
);

INSERT INTO `readroom`.`books`
(`languages_id`, `book_author`, `book_name`, `book_synopsis`,`publication_year`,`source`,`ISBN_code`,`book_is_free`,`book_front`,`date_added`,
`last_modified`, `opf_name`)
VALUES
(2, "Charles Lutwidge Dodgson", "Alice's Adventures in Wonderland", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel sem consectetur, pellentesque ipsum sed, mollis sem. Aliquam semper pellentesque felis, interdum vehicula erat facilisis nec. Vivamus scelerisque ante non dui suscipit sollicitudin. Curabitur ullamcorper sem at lectus porta dapibus nec non elit. Nam vulputate velit justo, sed accumsan lectus lobortis sit amet. Praesent lacinia felis id elementum hendrerit. Morbi fringilla elementum egestas. Fusce blandit eu tortor non lacinia. Sed in mauris at ligula blandit porta. Maecenas in pulvinar augue. Curabitur vel ultricies arcu, eget adipiscing arcu.",
1865, "source/Aliceinwonderland/11/", 9781863260022, 1, "books/source/Aliceinwonderland/cover.jpg", NOW(), NOW(), "content.opf" );

INSERT INTO `readroom`.`books`
(`languages_id`, `book_author`, `book_name`, `book_synopsis`,`publication_year`,`source`,`ISBN_code`,`book_is_free`,`book_front`,`date_added`,
`last_modified`, `opf_name`)
VALUES
(2, "Mark Twain", "Adventures of Huckleberry Finn", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel sem consectetur, pellentesque ipsum sed, mollis sem. Aliquam semper pellentesque felis, interdum vehicula erat facilisis nec. Vivamus scelerisque ante non dui suscipit sollicitudin. Curabitur ullamcorper sem at lectus porta dapibus nec non elit. Nam vulputate velit justo, sed accumsan lectus lobortis sit amet. Praesent lacinia felis id elementum hendrerit. Morbi fringilla elementum egestas. Fusce blandit eu tortor non lacinia. Sed in mauris at ligula blandit porta. Maecenas in pulvinar augue. Curabitur vel ultricies arcu, eget adipiscing arcu.",
1884, "source/Hfinn/76/", 9780671420727, 1, "books/source/Hfinn/cover.jpg", NOW(), NOW(), "content.opf" );

INSERT INTO `readroom`.`books`
(`languages_id`, `book_author`, `book_name`, `book_synopsis`,`publication_year`,`source`,`ISBN_code`,`book_is_free`,`book_front`,`date_added`,
`last_modified`, `opf_name`)
VALUES
(2, "Vatsiaiana", "Kama sutra", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel sem consectetur, pellentesque ipsum sed, mollis sem. Aliquam semper pellentesque felis, interdum vehicula erat facilisis nec. Vivamus scelerisque ante non dui suscipit sollicitudin. Curabitur ullamcorper sem at lectus porta dapibus nec non elit. Nam vulputate velit justo, sed accumsan lectus lobortis sit amet. Praesent lacinia felis id elementum hendrerit. Morbi fringilla elementum egestas. Fusce blandit eu tortor non lacinia. Sed in mauris at ligula blandit porta. Maecenas in pulvinar augue. Curabitur vel ultricies arcu, eget adipiscing arcu.",
1884, "source/Kamasutra/27827/", 9780671420727, 1, "books/source/Kamasutra/cover.jpg", NOW(), NOW(), "content.opf" );


/* CATEGORIES */

INSERT INTO `readroom`.`categories`
(
`parent_id`,
`sort_order`,
`category_status`,
`date_added`,
`last_modified`)
VALUES
(
0,
1,
1,
NOW(),
NOW()
);

INSERT INTO `readroom`.`categories`
(
`parent_id`,
`sort_order`,
`category_status`,
`date_added`,
`last_modified`)
VALUES
(
0,
1,
1,
NOW(),
NOW()
);

INSERT INTO `readroom`.`categories`
(
`parent_id`,
`sort_order`,
`category_status`,
`date_added`,
`last_modified`)
VALUES
(
0,
1,
1,
NOW(),
NOW()
);

INSERT INTO `readroom`.`categories` (parent_id, sort_order, category_status, date_added, last_modified)
VALUES
(
1, 1, 1, NOW(), NOW()
);

INSERT INTO `readroom`.`categories` (parent_id, sort_order, category_status, date_added, last_modified)
VALUES
(
1, 1, 1, NOW(), NOW()
);

/* CATEGORIES DESCERIPTIONS */

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
1, 1, "Categoría 1", "Categoría 1"
);

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
1, 2, "Categoría 1", "Categoría 1"
);

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
2, 1, "Categoría 2", "Categoría 2"
);

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
2, 2, "Categoría 2", "Categoría 2"
);

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
3, 1, "Categoría 3", "Categoría 3"
);

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
3, 2, "Categoría 3", "Categoría 3"
);

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
4, 1, "Categoría 4", "Categoría 4"
);

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
4, 2, "Categoría 4", "Categoría 4"
);

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
5, 1, "Categoría 5", "Categoría 5"
);

INSERT INTO `readroom`.`categories_description` (category_id, language_id, category_name, category_description)
VALUES
(
5, 2, "Categoría 5", "Categoría 5"
);

/* books has categories */
INSERT INTO `readroom`.`books_has_categories` (category_id, book_id)
VALUES
(
4, 1
);

INSERT INTO `readroom`.`books_has_categories` (category_id, book_id)
VALUES
(
4, 2
);

INSERT INTO `readroom`.`books_has_categories` (category_id, book_id)
VALUES
(
2, 3
);

INSERT INTO `readroom`.`books_has_categories` (category_id, book_id)
VALUES
(
5, 3
);


