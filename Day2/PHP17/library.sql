create table authors (
                         authorid int(11) NOT NULL AUTO_INCREMENT,
                         name varchar(55) NOT NULL DEFAULT '',
                         PRIMARY KEY (authorid)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 5;
INSERT INTO authors(authorid, name) VALUES
                                        (1, 'J.R.R Tolkien'),
                                        (2, 'alex harley'),
                                        (3, 'Tom clancy'),
                                        (4, 'Issac Asimov');
CREATE TABLE books(
                      bookid int(11) NOT NULL AUTO_INCREMENT,
                      authorid int(11) NOT NULL DEFAULT '0',
                      title varchar(55) NOT NULL DEFAULT '',
                      ISBN varchar(25) NOT NULL DEFAULT '',
                      pub_year smallint(6) NOT NULL DEFAULT '0',
                      available tinyint(4) NOT NULL,
                      PRIMARY KEY (bookid)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 19;
INSERT INTO books(bookid, authorid, title, ISBN, pub_year, available) VALUES
                                                                          (1, 1, 'The Two Tower', '0-261-10236-2', 1954, 1),
                                                                          (2, 3, 'The Return of the King', '0-261-10237-0', 1955, 1),
                                                                          (3, 2, 'Roots', '0-440-17464-3', 1974, 1);