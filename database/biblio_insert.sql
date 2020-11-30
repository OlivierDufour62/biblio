INSERT INTO `editeurs`(`name`) VALUES ('Larousse');

INSERT INTO `authors`(`name`) VALUES ('h2prog');

INSERT INTO `format` (`name`) VALUES ('poche'), ('digest'), ('roman'), ('royal'), ('A4');

INSERT INTO `livres`(`titre`, `nbPages`, `image`, `id_Authors`, `id_Format`, `id_Editeurs`) 
VALUES ('algoritmique','200','algo.png','1','1','1');

