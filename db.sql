create table card(
  id serial primary key,
  name varchar (255),
  manaCost varchar(64),
  cmc integer,
  rarity_id integer,
  set_id varchar(32),
  imageUrl varchar(256),
  c_power integer,
  c_toughness integer,
  description varchar(512)
);

create table cardset(
  id serial primary key,
  code varchar (32),
  name varchar (255)
);

create table rarity(
  id serial primary key,
  name varchar (255)
);

insert into rarity (name) values ('Common');
insert into rarity (name) values ('Uncommon');
insert into rarity (name) values ('Rare');
insert into rarity (name) values ('Mythic Rare');
insert into rarity (name) values ('Special');
insert into rarity (name) values ('Basic Land');

create table type(
  id serial primary key,
  name varchar (255)
);

create table card_type(
  id_card integer,
  id_type integer
);

insert into type (name) values ('Creature');
insert into type (name) values ('Land');
insert into type (name) values ('Artifact');
insert into type (name) values ('Enchantment');
insert into type (name) values ('Planeswalker');
insert into type (name) values ('Sorcery');
insert into type (name) values ('Instant');


create table supertype(
  id serial primary key,
  name varchar (255)
);

create table card_supertype(
  id_card integer,
  id_supertype integer
);

insert into supertype (name) values ('Untyped');
insert into supertype (name) values ('Basic');
insert into supertype (name) values ('Legendary');
insert into supertype (name) values ('Ongoing');
insert into supertype (name) values ('Snow');
insert into supertype (name) values ('World');

create table color(
  id serial primary key,
  name varchar (255)
);

create table card_color(
  id_card integer,
  id_color integer
);

insert into color (name) values ('Colorless');
insert into color (name) values ('White');
insert into color (name) values ('Black');
insert into color (name) values ('Red');
insert into color (name) values ('Green');
insert into color (name) values ('Blue');
