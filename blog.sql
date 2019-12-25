select * from posts right join comments on posts.id=comments.post_id where posts.id=1;

-- create database blog;
-- use blog;

-- create table posts (
-- id int auto_increment not null,
-- title varchar(100),
-- body varchar(1000),
-- author varchar(100),
-- created_at datetime,
-- primary key(id));
-- create table comments (
-- id int auto_increment not null,
-- author varchar(100),
-- text varchar(1000),
-- post_id int,
-- created_at datetime,
-- primary key(id),
-- foreign key (post_id) references posts(id));
-- insert into posts (title, body, author, created_at) values ("Najnovija odeca u modi!", "Ovog leta popularne su duze suknje, kako za dame, tako i za mladju populaciju", "Mika", '2001-01-01 01:01:01');
-- insert into posts (title, body, author, created_at) values ("Popularni automobili 2002.", "Medju popularnijim automobilima 2002. izdvaja se GOLF 4!", "Zika", '2002-02-02 02:02:02');
-- insert into posts (title, body, author, created_at) values ("2003. godina preokreta!?", "Ova godina prema verovanju budista donosi veliki preokret u vasem zivotu!", "Pera", '2003-03-03 03:03:03');
-- insert into comments (author, text, post_id, created_at) values ("Ceca", "Stvarno su super suknje!", 1, '2001-01-03 03:03:30');
-- insert into comments (author, text, post_id, created_at) values ("Bobana", "Bela je najbolja!", 1, '2001-01-02 02:02:20');
-- insert into comments (author, text, post_id, created_at) values ("Andrea", "Bas bih zelela jednu ovakvu!", 1, '2001-01-01 01:01:10');
-- insert into comments (author, text, post_id, created_at) values ("Stevica", "Golf GTI najbolji auto!", 2, '2002-01-03 03:03:30');
-- insert into comments (author, text, post_id, created_at) values ("Mile", "I ja imam ovakvog zutog!", 2, '2002-01-02 02:02:20');
-- insert into comments (author, text, post_id, created_at) values ("Aleksa", "Potvrdjujem za Golfa, stvarno odlican auto", 2, '2002-01-01 01:01:10');
-- insert into comments (author, text, post_id, created_at) values ("Jovana", "Nadam se! :)", 3, '2003-01-03 03:03:30');
-- insert into comments (author, text, post_id, created_at) values ("Ljubica", "Zar ne treba da bude smak sveta?", 3, '2003-01-02 02:02:20');
-- insert into comments (author, text, post_id, created_at) values ("Andjelka", "Ja ne verujem u ove gluposti!", 3, '2003-01-01 01:01:10');

describe comments; 
select * from comments;
describe posts;
select * from posts;




