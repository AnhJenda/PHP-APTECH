create table students(
                         id int(11) NOT NULL AUTO_INCREMENT,
                         name varchar(55) NOT NULL DEFAULT '',
                         PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;
INSERT INTO students (id, name) VALUES
                                    (1, 'Quang Anh'),
                                    (2, 'Quang Chi'),
                                    (3, 'Quang Em');
create table parents(
                        pid int(11) NOT NULL AUTO_INCREMENT,
                        id int(11) NOT NULL DEFAULT'0',
                        pname varchar(55) NOT NULL default '',
                        PRIMARY KEY (pid)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;
INSERT INTO parents(pid, id, pname) VALUES
                                       (1, 1 , 'Phu Huynh Cua Quang Anh'),
                                       (2, 2, 'Phu Huynh Cua Quang Chi'),
                                       (3, 3, 'Phu Huynh Cua Quang Em')