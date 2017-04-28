create table card(
  id serial primary key,
  name varchar (256),
  manaCost varchar(64),
  cmc integer,
  rarity_id integer,
  set_id integer,
  imageUrl varchar(256),
  c_power integer,
  c_toughness integer,
  description varchar(512)
);

create table cardset(
  id serial primary key,
  code varchar (32),
  name varchar (256),
  imageUrl varchar(256)
);

insert into cardset (code , name , imageUrl) values ( 'BFZ', 'Battle for Zendikar', 'http://gatherer.wizards.com/Handlers/Image.ashx?type=symbol&set=BFZ&size=small');
insert into cardset (code , name , imageUrl) values ( 'OGW', 'Oath of the Gatewatch', 'http://gatherer.wizards.com/Handlers/Image.ashx?type=symbol&set=OGW&size=small');
insert into cardset (code , name , imageUrl) values ( 'SOI', 'Shadows over Innistrad', 'http://gatherer.wizards.com/Handlers/Image.ashx?type=symbol&set=SOI&size=small');
insert into cardset (code , name , imageUrl) values ( 'EMN', 'Eldritch Moon', 'http://gatherer.wizards.com/Handlers/Image.ashx?type=symbol&set=EMN&size=small');
insert into cardset (code , name , imageUrl) values ( 'KLD', 'Kaladesh', 'http://gatherer.wizards.com/Handlers/Image.ashx?type=symbol&set=KLD&size=small');
insert into cardset (code , name , imageUrl) values ( 'AER', 'Aether Revolt', 'http://gatherer.wizards.com/Handlers/Image.ashx?type=symbol&set=AER&size=small');
insert into cardset (code , name , imageUrl) values ( 'AKH', 'Amonkhet', 'http://gatherer.wizards.com/Handlers/Image.ashx?type=symbol&set=AKH&size=small');

create table subtype(
  id serial primary key,
  name varchar (256)
);

create table card_subtype(
  id_card integer,
  id_subtype integer
);

insert into subtype (name) values ('Advisor');
insert into subtype (name) values ('Aetherborn');
insert into subtype (name) values ('Ajani');
insert into subtype (name) values ('Alara');
insert into subtype (name) values ('Ally');
insert into subtype (name) values ('Angel');
insert into subtype (name) values ('Antelope');
insert into subtype (name) values ('Ape');
insert into subtype (name) values ('Arcane');
insert into subtype (name) values ('Archer');
insert into subtype (name) values ('Archon');
insert into subtype (name) values ('Arkhos');
insert into subtype (name) values ('Arlinn');
insert into subtype (name) values ('Artificer');
insert into subtype (name) values ('Ashiok');
insert into subtype (name) values ('Assassin');
insert into subtype (name) values ('Assembly-Worker');
insert into subtype (name) values ('Atog');
insert into subtype (name) values ('Aura');
insert into subtype (name) values ('Aurochs');
insert into subtype (name) values ('Avatar');
insert into subtype (name) values ('Azgol');
insert into subtype (name) values ('Baddest,');
insert into subtype (name) values ('Badger');
insert into subtype (name) values ('Barbarian');
insert into subtype (name) values ('Basilisk');
insert into subtype (name) values ('Bat');
insert into subtype (name) values ('Bear');
insert into subtype (name) values ('Beast');
insert into subtype (name) values ('Beeble');
insert into subtype (name) values ('Belenon');
insert into subtype (name) values ('Berserker');
insert into subtype (name) values ('Biggest,');
insert into subtype (name) values ('Bird');
insert into subtype (name) values ('Boar');
insert into subtype (name) values ('Bolas');
insert into subtype (name) values ('Bolas’s Meditation Realm');
insert into subtype (name) values ('Bringer');
insert into subtype (name) values ('Brushwagg');
insert into subtype (name) values ('Bureaucrat');
insert into subtype (name) values ('Camel');
insert into subtype (name) values ('Carrier');
insert into subtype (name) values ('Cartouche');
insert into subtype (name) values ('Cat');
insert into subtype (name) values ('Centaur');
insert into subtype (name) values ('Cephalid');
insert into subtype (name) values ('Chandra');
insert into subtype (name) values ('Chicken');
insert into subtype (name) values ('Child');
insert into subtype (name) values ('Chimera');
insert into subtype (name) values ('Clamfolk');
insert into subtype (name) values ('Cleric');
insert into subtype (name) values ('Cockatrice');
insert into subtype (name) values ('Construct');
insert into subtype (name) values ('Cow');
insert into subtype (name) values ('Crab');
insert into subtype (name) values ('Crocodile');
insert into subtype (name) values ('Curse');
insert into subtype (name) values ('Cyclops');
insert into subtype (name) values ('Dack');
insert into subtype (name) values ('Daretti');
insert into subtype (name) values ('Dauthi');
insert into subtype (name) values ('Demon');
insert into subtype (name) values ('Desert');
insert into subtype (name) values ('Designer');
insert into subtype (name) values ('Devil');
insert into subtype (name) values ('Dinosaur');
insert into subtype (name) values ('Djinn');
insert into subtype (name) values ('Dominaria');
insert into subtype (name) values ('Domri');
insert into subtype (name) values ('Donkey');
insert into subtype (name) values ('Dovin');
insert into subtype (name) values ('Dragon');
insert into subtype (name) values ('Drake');
insert into subtype (name) values ('Dreadnought');
insert into subtype (name) values ('Drone');
insert into subtype (name) values ('Druid');
insert into subtype (name) values ('Dryad');
insert into subtype (name) values ('Dwarf');
insert into subtype (name) values ('Efreet');
insert into subtype (name) values ('Egg');
insert into subtype (name) values ('Elder');
insert into subtype (name) values ('Eldrazi');
insert into subtype (name) values ('Elemental');
insert into subtype (name) values ('Elephant');
insert into subtype (name) values ('Elf');
insert into subtype (name) values ('Elk');
insert into subtype (name) values ('Elspeth');
insert into subtype (name) values ('Elves');
insert into subtype (name) values ('Equilor');
insert into subtype (name) values ('Equipment');
insert into subtype (name) values ('Ergamon');
insert into subtype (name) values ('Etiquette');
insert into subtype (name) values ('Eye');
insert into subtype (name) values ('Fabacin');
insert into subtype (name) values ('Faerie');
insert into subtype (name) values ('Ferret');
insert into subtype (name) values ('Fish');
insert into subtype (name) values ('Flagbearer');
insert into subtype (name) values ('Forest');
insert into subtype (name) values ('Fortification');
insert into subtype (name) values ('Fox');
insert into subtype (name) values ('Freyalise');
insert into subtype (name) values ('Frog');
insert into subtype (name) values ('Fungus');
insert into subtype (name) values ('Gamer');
insert into subtype (name) values ('Gargoyle');
insert into subtype (name) values ('Garruk');
insert into subtype (name) values ('Gate');
insert into subtype (name) values ('Giant');
insert into subtype (name) values ('Gideon');
insert into subtype (name) values ('Gnome');
insert into subtype (name) values ('Goat');
insert into subtype (name) values ('Goblin');
insert into subtype (name) values ('Goblins');
insert into subtype (name) values ('God');
insert into subtype (name) values ('Golem');
insert into subtype (name) values ('Gorgon');
insert into subtype (name) values ('Gremlin');
insert into subtype (name) values ('Griffin');
insert into subtype (name) values ('Gus');
insert into subtype (name) values ('Hag');
insert into subtype (name) values ('Harpy');
insert into subtype (name) values ('Hellion');
insert into subtype (name) values ('Hero');
insert into subtype (name) values ('Hippo');
insert into subtype (name) values ('Hippogriff');
insert into subtype (name) values ('Homarid');
insert into subtype (name) values ('Homunculus');
insert into subtype (name) values ('Horror');
insert into subtype (name) values ('Horse');
insert into subtype (name) values ('Hound');
insert into subtype (name) values ('Human');
insert into subtype (name) values ('Hydra');
insert into subtype (name) values ('Hyena');
insert into subtype (name) values ('Igpay');
insert into subtype (name) values ('Illusion');
insert into subtype (name) values ('Imp');
insert into subtype (name) values ('Incarnation');
insert into subtype (name) values ('Innistrad');
insert into subtype (name) values ('Insect');
insert into subtype (name) values ('Iquatana');
insert into subtype (name) values ('Ir');
insert into subtype (name) values ('Island');
insert into subtype (name) values ('Jace');
insert into subtype (name) values ('Jackal');
insert into subtype (name) values ('Jellyfish');
insert into subtype (name) values ('Juggernaut');
insert into subtype (name) values ('Kaldheim');
insert into subtype (name) values ('Kamigawa');
insert into subtype (name) values ('Karn');
insert into subtype (name) values ('Karsus');
insert into subtype (name) values ('Kavu');
insert into subtype (name) values ('Kaya');
insert into subtype (name) values ('Kephalai');
insert into subtype (name) values ('Kinshala');
insert into subtype (name) values ('Kiora');
insert into subtype (name) values ('Kirin');
insert into subtype (name) values ('Kithkin');
insert into subtype (name) values ('Knight');
insert into subtype (name) values ('Kobold');
insert into subtype (name) values ('Kolbahan');
insert into subtype (name) values ('Kor');
insert into subtype (name) values ('Koth');
insert into subtype (name) values ('Kraken');
insert into subtype (name) values ('Kyneth');
insert into subtype (name) values ('Lady');
insert into subtype (name) values ('Lair');
insert into subtype (name) values ('Lamia');
insert into subtype (name) values ('Lammasu');
insert into subtype (name) values ('Leech');
insert into subtype (name) values ('Legend');
insert into subtype (name) values ('Leviathan');
insert into subtype (name) values ('Lhurgoyf');
insert into subtype (name) values ('Licid');
insert into subtype (name) values ('Liliana');
insert into subtype (name) values ('Lizard');
insert into subtype (name) values ('Locus');
insert into subtype (name) values ('Lord');
insert into subtype (name) values ('Lorwyn');
insert into subtype (name) values ('Luvion');
insert into subtype (name) values ('Manticore');
insert into subtype (name) values ('Masticore');
insert into subtype (name) values ('Mercadia');
insert into subtype (name) values ('Mercenary');
insert into subtype (name) values ('Merfolk');
insert into subtype (name) values ('Metathran');
insert into subtype (name) values ('Mime');
insert into subtype (name) values ('Mine');
insert into subtype (name) values ('Minion');
insert into subtype (name) values ('Minotaur');
insert into subtype (name) values ('Mirrodin');
insert into subtype (name) values ('Moag');
insert into subtype (name) values ('Mole');
insert into subtype (name) values ('Monger');
insert into subtype (name) values ('Mongoose');
insert into subtype (name) values ('Mongseng');
insert into subtype (name) values ('Monk');
insert into subtype (name) values ('Monkey');
insert into subtype (name) values ('Moonfolk');
insert into subtype (name) values ('Mountain');
insert into subtype (name) values ('Mummy');
insert into subtype (name) values ('Muraganda');
insert into subtype (name) values ('Mutant');
insert into subtype (name) values ('Myr');
insert into subtype (name) values ('Mystic');
insert into subtype (name) values ('Naga');
insert into subtype (name) values ('Nahiri');
insert into subtype (name) values ('Narset');
insert into subtype (name) values ('Nastiest,');
insert into subtype (name) values ('Nautilus');
insert into subtype (name) values ('Nephilim');
insert into subtype (name) values ('New Phyrexia');
insert into subtype (name) values ('Nightmare');
insert into subtype (name) values ('Nightstalker');
insert into subtype (name) values ('Ninja');
insert into subtype (name) values ('Nissa');
insert into subtype (name) values ('Nixilis');
insert into subtype (name) values ('Noggle');
insert into subtype (name) values ('Nomad');
insert into subtype (name) values ('Nymph');
insert into subtype (name) values ('Octopus');
insert into subtype (name) values ('Ogre');
insert into subtype (name) values ('Ooze');
insert into subtype (name) values ('Orc');
insert into subtype (name) values ('Orgg');
insert into subtype (name) values ('Ouphe');
insert into subtype (name) values ('Ox');
insert into subtype (name) values ('Oyster');
insert into subtype (name) values ('Paratrooper');
insert into subtype (name) values ('Pegasus');
insert into subtype (name) values ('Pest');
insert into subtype (name) values ('Phelddagrif');
insert into subtype (name) values ('Phoenix');
insert into subtype (name) values ('Phyrexia');
insert into subtype (name) values ('Pilot');
insert into subtype (name) values ('Pirate');
insert into subtype (name) values ('Plains');
insert into subtype (name) values ('Plant');
insert into subtype (name) values ('Power-Plant');
insert into subtype (name) values ('Praetor');
insert into subtype (name) values ('Processor');
insert into subtype (name) values ('Proper');
insert into subtype (name) values ('Pyrulea');
insert into subtype (name) values ('Rabbit');
insert into subtype (name) values ('Rabiah');
insert into subtype (name) values ('Ral');
insert into subtype (name) values ('Rat');
insert into subtype (name) values ('Rath');
insert into subtype (name) values ('Ravnica');
insert into subtype (name) values ('Rebel');
insert into subtype (name) values ('Reflection');
insert into subtype (name) values ('Regatha');
insert into subtype (name) values ('Rhino');
insert into subtype (name) values ('Rigger');
insert into subtype (name) values ('Rogue');
insert into subtype (name) values ('Sable');
insert into subtype (name) values ('Saheeli');
insert into subtype (name) values ('Salamander');
insert into subtype (name) values ('Samurai');
insert into subtype (name) values ('Saproling');
insert into subtype (name) values ('Sarkhan');
insert into subtype (name) values ('Satyr');
insert into subtype (name) values ('Scarecrow');
insert into subtype (name) values ('Scion');
insert into subtype (name) values ('Scorpion');
insert into subtype (name) values ('Scout');
insert into subtype (name) values ('Segovia');
insert into subtype (name) values ('Serpent');
insert into subtype (name) values ('Serra’s Realm');
insert into subtype (name) values ('Shade');
insert into subtype (name) values ('Shadowmoor');
insert into subtype (name) values ('Shaman');
insert into subtype (name) values ('Shandalar');
insert into subtype (name) values ('Shapeshifter');
insert into subtype (name) values ('Sheep');
insert into subtype (name) values ('Ship');
insert into subtype (name) values ('Shrine');
insert into subtype (name) values ('Siren');
insert into subtype (name) values ('Skeleton');
insert into subtype (name) values ('Slith');
insert into subtype (name) values ('Sliver');
insert into subtype (name) values ('Slug');
insert into subtype (name) values ('Snake');
insert into subtype (name) values ('Soldier');
insert into subtype (name) values ('Soltari');
insert into subtype (name) values ('Sorin');
insert into subtype (name) values ('Spawn');
insert into subtype (name) values ('Specter');
insert into subtype (name) values ('Spellshaper');
insert into subtype (name) values ('Sphinx');
insert into subtype (name) values ('Spider');
insert into subtype (name) values ('Spike');
insert into subtype (name) values ('Spirit');
insert into subtype (name) values ('Sponge');
insert into subtype (name) values ('Squid');
insert into subtype (name) values ('Squirrel');
insert into subtype (name) values ('Starfish');
insert into subtype (name) values ('Surrakar');
insert into subtype (name) values ('Swamp');
insert into subtype (name) values ('Tamiyo');
insert into subtype (name) values ('Teferi');
insert into subtype (name) values ('Tezzeret');
insert into subtype (name) values ('Thalakos');
insert into subtype (name) values ('The');
insert into subtype (name) values ('Thopter');
insert into subtype (name) values ('Thrull');
insert into subtype (name) values ('Tibalt');
insert into subtype (name) values ('Tower');
insert into subtype (name) values ('Townsfolk');
insert into subtype (name) values ('Trap');
insert into subtype (name) values ('Treefolk');
insert into subtype (name) values ('Troll');
insert into subtype (name) values ('Turtle');
insert into subtype (name) values ('Ugin');
insert into subtype (name) values ('Ulgrotha');
insert into subtype (name) values ('Unicorn');
insert into subtype (name) values ('Urza’s');
insert into subtype (name) values ('Valla');
insert into subtype (name) values ('Vampire');
insert into subtype (name) values ('Vedalken');
insert into subtype (name) values ('Vehicle');
insert into subtype (name) values ('Venser');
insert into subtype (name) values ('Viashino');
insert into subtype (name) values ('Volver');
insert into subtype (name) values ('Vraska');
insert into subtype (name) values ('Vryn');
insert into subtype (name) values ('Waiter');
insert into subtype (name) values ('Wall');
insert into subtype (name) values ('Warrior');
insert into subtype (name) values ('Weird');
insert into subtype (name) values ('Werewolf');
insert into subtype (name) values ('Whale');
insert into subtype (name) values ('Wildfire');
insert into subtype (name) values ('Wizard');
insert into subtype (name) values ('Wolf');
insert into subtype (name) values ('Wolverine');
insert into subtype (name) values ('Wombat');
insert into subtype (name) values ('Worm');
insert into subtype (name) values ('Wraith');
insert into subtype (name) values ('Wurm');
insert into subtype (name) values ('Xenagos');
insert into subtype (name) values ('Xerex');
insert into subtype (name) values ('Yeti');
insert into subtype (name) values ('Zendikar');
insert into subtype (name) values ('Zombie');
insert into subtype (name) values ('Zubera');

create table rarity(
  id serial primary key,
  name varchar (256)
);

insert into rarity (name) values ('Common');
insert into rarity (name) values ('Uncommon');
insert into rarity (name) values ('Rare');
insert into rarity (name) values ('Mythic Rare');
insert into rarity (name) values ('Special');
insert into rarity (name) values ('Basic Land');

create table type(
  id serial primary key,
  name varchar (256)
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
  name varchar (256)
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
  name varchar (256)
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
