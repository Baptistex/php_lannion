--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

-- Started on 2020-09-27 17:45:38 CEST
DROP SCHEMA jeux CASCADE;
CREATE SCHEMA jeux;

SET SCHEMA 'jeux';

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

--SET default_table_access_method = heap;

--
-- TOC entry 286 (class 1259 OID 17554)
-- Name: _jeu; Type: TABLE; Schema: jeux; Owner: postgres
--


CREATE TABLE jeux._jeu (
    id integer NOT NULL,
    guid character varying(20),
    titre character varying(100),
    sortie character varying(20),
    description character varying(10000),
    couverture character varying(150)
);

ALTER TABLE ONLY jeux._jeu
ADD CONSTRAINT _jeu_pkey PRIMARY KEY (id);
    

CREATE TABLE jeux._user (
  identifiant VARCHAR(30) NOT NULL,
  nom  VARCHAR(30) NOT NULL,
  prenom VARCHAR(30) NOT NULL,
  mot_de_passe VARCHAR(255) NOT NULL
);


ALTER TABLE ONLY jeux._user
ADD CONSTRAINT _user_pkey PRIMARY KEY (identifiant);


CREATE TABLE jeux._collection(
  identifiant VARCHAR(30) NOT NULL,
  id INTEGER NOT NULL
);

CREATE TABLE jeux._role(
  identifiant VARCHAR(30) NOT NULL,
  role VARCHAR(30) NOT NULL
);

ALTER TABLE ONLY jeux._role
ADD CONSTRAINT _role_pkey PRIMARY KEY (identifiant);


ALTER TABLE jeux._role 
ADD CONSTRAINT _role_user_fkey FOREIGN KEY (identifiant) REFERENCES jeux._user(identifiant) ON DELETE CASCADE;
    




ALTER TABLE jeux._collection 
ADD CONSTRAINT _collection_user_fkey FOREIGN KEY (identifiant) REFERENCES jeux._user(identifiant) ON DELETE CASCADE;

ALTER TABLE jeux._collection 
ADD CONSTRAINT _collection_jeu_fkey FOREIGN KEY (id) REFERENCES jeux._jeu(id) ON DELETE CASCADE;

ALTER TABLE jeux._collection 
ADD CONSTRAINT _collection_unique UNIQUE (identifiant,id);


ALTER TABLE jeux._jeu OWNER TO b11;


INSERT INTO jeux._user VALUES ('admin','admin','admin','$2y$10$nO2SFUUIThEuvnwtG0VDPuO4sgEoh.0LrS2FWb4pgpKTP55BDEVJm');
UPDATE jeux._role SET role = 'admin' WHERE identifiant = 'admin';

--
-- TOC entry 3373 (class 0 OID 17554)
-- Dependencies: 286
-- Data for Name: _jeu; Type: TABLE DATA; Schema: jeux; Owner: postgres
--

COPY jeux._jeu (id, guid, titre, sortie, description, couverture) FROM stdin;
21006	3030-21006	Final Fantasy XV	2016-11-29	The fifteenth entry in Square Enix's flagship RPG franchise, set in a world that mixes elements of modern technology with magic, a fantasy based on reality.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/3699/2903750-final%20fantasy%20xv%20v3.jpg
60162	3030-60162	The LEGO Ninjago Movie Video Game	2017-09-22	The video game based on the movie based on the toy series Ninjago, from LEGO.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2986586-box_ltnmvg.png
53806	3030-53806	Dragon Ball Xenoverse 2	2016-10-25	A second time-traveling romp through the DragonBall series.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2971281-box_dbxv2.png
59550	3030-59550	LEGO Marvel Super Heroes 2	2017-11-14	Kang the Conqueror threatens the Lego Marvel Multiverse in Lego Marvel Super Heroes 2.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2986587-box_lmsh2.png
46319	3030-46319	Dragon Ball XenoVerse	2015-02-05	A fighting game for PlayStation 3, PlayStation 4, Xbox 360, Xbox One, and PC set in the Dragon Ball Z universe.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2743649-box_dbxv.jpg
72148	3030-72148	The Legend of Zelda: Link's Awakening	2019-09-20	A full remake of the Game Boy classic on Nintendo Switch.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/82063/3124242-lahd.jpg
70240	3030-70240	Luigi's Mansion 3	2019-10-31	Luigi has to once again save Mario and friends from a ghostly and gooey nightmare, this time in a haunted hotel.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/82063/3109102-lm3.jpg
59938	3030-59938	Pokémon Sword/Shield	2019-11-15	Upcoming Pokémon RPG for the Nintendo Switch set in the Galar region.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/1992/3141963-cq5dam.thumbnail.319.319%20%2810%29%20copy.png
68462	3030-68462	Pro Evolution Soccer 2019	2018-08-28	PES 2019 boasts huge addition of licensed leagues alongside improvements for player animation, Master League and an overhauled MyClub.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/3046307-box_pes2k19.png
55342	3030-55342	Naruto Shippuden: Ultimate Ninja Storm Collection	2016-02-05	A collection of the Naruto: Ultimate Ninja Storm games.	https://giantbomb1.cbsistatic.com/uploads/scale_small/16/165036/2881423-nuns-collection-ps3-ann-eu.jpg
56893	3030-56893	LEGO Harry Potter Collection	2016-10-18	Both LEGO Harry Potter games have been remastered for PlayStaton 4 & Xbox One	https://giantbomb1.cbsistatic.com/uploads/scale_small/13/135472/3047475-397962-lego-harry-potter-collection-playstation-4-front-cover.png.jpg
57690	3030-57690	Octopath Traveler	2018-07-13	A role-playing game developed exclusively for the Nintendo Switch. Throughout the adventure, the player can recruit eight different heroes, each with their own unique storyline.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/3034945-box_opt.png
59919	3030-59919	Just Dance 2018	2017-10-24	The ninth main installment of Ubisoft's dancing game.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/3008933-box_jd2k18.png
73841	3030-73841	eFootball PES 2020	2019-09-10	The Pro Evolution Soccer series undergoes a rebranding for 2020.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/3127771-box_pes2020.png
20645	3030-20645	Mario Kart Wii	2008-04-09	Get online and race in this Wii update of the long-running Mario Kart series. Mario Kart Wii is one of the best-selling games on the Nintendo Wii. It is the eighth installment of the series.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/82063/2560979-mkwiiclean.jpg
35578	3030-35578	Mario Party 9	2012-03-02	Mario Party 9 is the twelfth game in the long-running Nintendo board game series. Wii Party developer NDCube takes over from Hudson, attempting to refresh the series with some significant gameplay changes.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2129493-box_mparty9.png
26869	3030-26869	Wii Fit Plus	2009-10-04	Wii Fit Plus is technically not a sequel as it is an enhanced version/expansion of the original game released the previous year. It contains new activities, a calorie counter, and several set routines to add to the Wii Fit experience.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/5911/1136186-wiifit.jpg
26841	3030-26841	New Super Mario Bros. Wii	2009-11-12	The first 2D Mario platformer for a home console in over 15 years. Though it has single-player, it focuses heavily on cooperative multiplayer, allowing up to 4 players to play simultaneously. This game also premiered Nintendo's Super Guide hint system.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/82063/2609765-nsmbwii.jpg
12411	3030-12411	Soulcalibur	1998-07-30	The sequel to Namco's earlier fighting game Soul Edge, continuing the story of the cursed blade Soul Edge (now corrupting the noble knight Siegfried into the dreaded knight Nightmare).	https://giantbomb1.cbsistatic.com/uploads/scale_small/1/14036/824176-soulcalibur_cover.jpg
22322	3030-22322	Professor Layton and the Diabolical Box	2009-08-24	The second adventure for Professor Hershel Layton and his helpful assistant Luke. They must solve riddles to reveal the mystery surrounding a box that seemingly kills whoever opens it. In Europe, the game was released as Professor Layton and Pandora's Box 	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1891356-box_platdb.png
11865	3030-11865	Professor Layton and the Curious Village	2008-02-10	Professor Layton and the Curious Village is a point and click adventure puzzle game set in a charming village with enigmatic characters. Solve over 120 puzzles given to you by the villagers to help you solve the mystery of the 'Golden Apple'.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1891355-box_platcv.png
42410	3030-42410	FIFA 14	2013-09-24	The 2014 installment in EA Canada's soccer simulation franchise. This was the first in the franchise to bridge the 360/PS3 to Xbox One/PS4 gap.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2560199-box_fifa14.png
11939	3030-11939	Advance Wars: Dual Strike	2005-06-23	The first Advance Wars game for the Nintendo DS brings dual COs, battle modes and seven new units into the mix.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/82063/2830784-awds.jpg
16094	3030-16094	Super Mario Galaxy	2007-11-01	In Mario's first Wii adventure, the famed plumber travels throughout the universe on his latest quest to save Princess Peach from the evil Bowser.	https://giantbomb1.cbsistatic.com/uploads/scale_small/1/13774/488943-super_mario_galaxy.jpg
18208	3030-18208	Trauma Center: Under the Knife	2005-10-04	Using only your stylus, you must perform emergency operations in a race against the clock in this hospital operating room simulator... anime style!	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1836603-box_tcenterutk.png
20485	3030-20485	Bleach: Dark Souls	2007-02-15	Bleach: Dark Souls is a sequel to Bleach: The Blade of Fate. It features over more than 40 playable characters, seven new gameplay modes and new Bankai moves. It is the third Bleach game to be released in the United States.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2209399-box_bds.png
8778	3030-8778	Brave Fencer Musashi	1998-11-10	After being summoned to another world, the brash young swordsman Musashi embarks on a quest to save the peaceful Allucaneet Kingdom from the evil Thirstquencher Empire.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2261092-box_bfm.png
10652	3030-10652	Arc the Lad II	1996-11-01	The sequel to G-Craft's popular strategy-RPG introduces a new protagonist, Elc, who holds Arc responsible for the murder of his tribe.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/9261/294012-arcthelad2alterntscj1qt8.jpg
4194	3030-4194	Arc the Lad III	1999-10-28	Arc The Lad III takes place several years after Arc II, introducing you to the world that was created from those events.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/9261/384393-576155_16058_front.jpg
19349	3030-19349	Breath of Fire III	1997-09-11	Breath of Fire III is a popular Japanese RPG made by Capcom. The game follows the story of Ryu - who is trying to find out the secret behind his ability to change into a dragon.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2117011-box_bof3.png
9896	3030-9896	Beyond the Beyond	1996-08-31	Beyond the Beyond is a traditional role-playing game developed by Camelot for Sony's PlayStation. While it initially met with poor reviews and low sales, the game has gained a small cult following over the years.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1875201-box_btb.png
7430	3030-7430	Bomberman: Party Edition	2000-09-19	Bomberman: Party Edition was released for the Playstation more focused on the multiplayer side than single player.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1840760-box_bmanpe.png
9177	3030-9177	Breath of Fire IV	2000-11-28	Take a journey with Ryu and Fou-lu as they fight against each other in a world torn by war and watched over by mysterious dragons called 'the Endless'.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2117012-box_bof4.png
4084	3030-4084	Broken Sword II: The Smoking Mirror	1997-10-31	Sequel to the popular adventure game Broken Sword: The Shadow of the Templars. George and Nico are embroiled in yet another mysterious escapade of brutality, calamity and immorality.	https://giantbomb1.cbsistatic.com/uploads/scale_small/12/128291/1837149-196823_50202_front.jpg
34799	3030-34799	Arc Arena: Monster Tournament	1997-07-31	A PlayStation spin-off of the Arc the Lad series.	https://giantbomb1.cbsistatic.com/uploads/scale_small/1/14155/1759032-arc_arena.jpg
7259	3030-7259	Arc the Lad	1995-06-30	Arc The Lad is a SRPG and introduces recurring characters throughout the series.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/97089/2338082-atl.png
17308	3030-17308	Brigandine: The Legend of Forsena	1998-10-31	Brigandine is a strategy rpg where you take control of one of six different nations, all vying to conquer the continent. With a wide assortment of unique Rune Knights and a plethora of monster armies, you goal is to control the continent of Forsena, one castle at a time.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2199399-box_brigandine.png
38388	3030-38388	Captain Tsubasa: Aratanaru Densetsu Joshou	2002-05-16	Released in 2002 for the PlayStation.	https://giantbomb1.cbsistatic.com/uploads/scale_small/14/149200/2239419-captain_tsubasa_aratanaru_densetsu_joshou.jpg
38262	3030-38262	Captain Tsubasa J: Get In The Tomorrow	1995-05-03	The first Captain Tsubasa game released on the Playstation.	https://giantbomb1.cbsistatic.com/uploads/scale_small/4/48222/2202267-captain_tsubasa_j_get_in_the_tomorrow.jpg
26702	3030-26702	FIFA 10	2009-10-20	FIFA 10 is EA Sports' 2009-2010 edition of the successful football game franchise.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2266507-box_fifa10.png
31651	3030-31651	FIFA 11	2010-09-28	FIFA 11 is the yearly, best selling football (soccer) game by EA Sports. FIFA 11 features 11 v 11 online multiplayer and the ability to play as a goalkeeper.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2266508-box_fifa11.png
41090	3030-41090	LEGO Marvel Super Heroes	2013-10-22	The denizens of the Marvel Universe battle it out LEGO style.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2986580-box_lmsh.png
30539	3030-30539	Naruto Shippuden: Ultimate Ninja Storm 2	2010-10-15	Naruto Shippuden: Ultimate Ninja Storm 2 is a fighting game based on the popular anime and manga series, Naruto.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2215081-box_narutouns2.png
43174	3030-43174	Naruto Shippuden: Ultimate Ninja Storm 3 Full Burst	2013-10-22	A director's cut edition of Naruto Shippuden: Ultimate Ninja Storm 3, and Naruto's official PC game debut.	https://giantbomb1.cbsistatic.com/uploads/scale_small/16/164924/2506986-fullburst.png
20664	3030-20664	Final Fantasy XIII	2010-03-09	This entry into the Final Fantasy universe is set in the worlds of Pulse and Cocoon. Players take control of multiple characters who are caught in a war between these worlds.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/112/1205193-front.png
34856	3030-34856	FIFA 12	2011-09-27	FIFA 12 is set to be EA Sports' 2011 iteration of the franchise, covering the 2011-2012 season and will introduce tactical defending, precision dribbling and enhanced AI.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2266509-box_fifa12.png
36166	3030-36166	FIFA Soccer 13	2012-09-25	The latest installment in EA Sports' FIFA series, featuring updated rosters, technical improvements, a more robust feature set for Support Your Club, and a new First Touch mechanic.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2329195-box_fifa13.png
20903	3030-20903	Naruto: Ultimate Ninja Storm	2008-11-04	Naruto: Ultimate Ninja Storm is an exclusive Playstation 3 game based on the acclaimed anime series.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1832928-box_nuns.png
35816	3030-35816	Naruto Shippuden: Ultimate Ninja Storm Generations	2012-03-13	The newest installment of the Naruto fighting games. Featuring over 70 characters from Part I & Part II.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2215082-box_narutounsg.png
31233	3030-31233	Dragon Ball: Raging Blast 2	2010-11-02	The sequel to Dragon Ball: Raging Blast, bringing a new art style, new gameplay modes, and 26 new playable characters and transformations (most of whom are from the Dragon Ball Z animated films and specials).	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2352249-box_dbrb2.png
26565	3030-26565	Dragon Ball: Raging Blast	2009-11-10	A spiritual successor to the Budokai Tenkaichi fighting game series based on the Dragon Ball manga and anime series, bringing Spike's gameplay to seventh-generation consoles.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2352248-box_dbrb.png
3579	3030-3579	Dragon Quest VIII: Journey of the Cursed King	2004-11-27	The eighth main entry in the Dragon Quest franchise. It was the first game in the series to utilize a full 3D environment and featured a cel-shaded graphics style which would become standard for all future games in the franchise.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1875222-box_dq8jotck.png
7812	3030-7812	Shenmue	1999-12-29	An action-adventure game set in 1980s Japan that follows one young man's journey to avenge his father's murder. It was praised for its ambitious scope and pioneered several gameplay features such as realistic open-world environments and Quick Time Events.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2957796-box_shenmue.png
9112	3030-9112	Crazy Taxi	null	A high-octane taxicab driving game for arcades. Instead of racing other opponents, the cabbies must race the clock and dodge traffic to deliver their patrons to their destinations as fast as they can.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/3000998-box_ctaxi.png
20100	3030-20100	Power Stone	1999-08-31	Choose from eight different characters and do battle in large environments, picking up weapons and collecting Power Stones to transform yourself into a super warrior capable of massive damage.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2975838-box_ps.png
5570	3030-5570	Alundra	null	A PS1 RPG in the vein of Zelda, Alundra has the player control a psychic youth as he combats an ancient evil that threatens to overwhelm the peaceful village of Inoa. 	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/82063/2267444-776379-alundra_front.png
15769	3030-15769	Anna Kournikova's Smash Court Tennis	1998-11-12	Anna Kournikova's Smash Court Tennis is the sequel to the original PS1 game, takes a more casual approach to the sport, with characters from other popular games and some wild courts!	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/3699/292337-annakournikovassmashcourttennispalpsxfrontnk1.jpg
8306	3030-8306	Shining Force III	1998-05-31	The definitive strategy RPG on the Sega Saturn, spanning three separate games to form an epic trilogy, although the second and third games were never released outside of Japan.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2525247-box_sforce3.png
5901	3030-5901	Guardian Heroes	1996-01-25	Combining fighting game mechanics with RPG elements, Guardian Heroes is a 2D beat-em-up for the Sega Saturn that tells the tale of a group of fantasy adventurers, a mystical warrior linked to a powerful sword, the kingdom of a tyrannical wizard, and a war between ethereal beings.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1988273-box_gheroes.png
1609	3030-1609	Skies of Arcadia	2000-10-05	Vyse, a sky pirate, travels in his airship to stop the Valuan Empire's conquest of the world.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2141564-box_soa.png
1490	3030-1490	Dragon Ball Z: Ultimate Battle 22	1995-07-28	A PlayStation spin-off of the Super Butoden series, Ultimate Battle 22 features cel-drawn character sprites from the animators of the original Dragon Ball Z animated series. It is also the first game in the series to be released throughout all of Europe and was released in North America nearly ten years later.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1814883-box_dbzub22.png
2162	3030-2162	Sega Rally Championship	null	A rally racing arcade game by Sega, giving drivers the choice between a Toyota Celica or Lancia Delta as they take on asphalt, gravel, dirt, and mud to earn the best time.	https://giantbomb1.cbsistatic.com/uploads/scale_small/1/14206/1124861-src3.jpg
14977	3030-14977	Tennis 2K2	2001-10-24	Arcade tennis game known as Virtua Tennis 2 in Europe.	https://giantbomb1.cbsistatic.com/uploads/scale_small/1/14036/774936-virtua2k2_cover.jpg
8768	3030-8768	Capcom vs. SNK: Millennium Fight 2000	2000-11-09	Capcom's initial entry into their crossover fighting game series with rival SNK, pitting fighters from the Street Fighter and King of Fighters series together in an all-out team-based brawl.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2179471-box_cvs.png
8492	3030-8492	Capcom vs. SNK 2: Mark of the Millennium	null	Capcom's final entry with their collaboration with SNK, adding a variety of new fighters and a six-button layout while completely revamping both the Ratio team building system and the Groove gameplay style system.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2179472-box_cvs2.png
14216	3030-14216	Castlevania: Symphony of the Night	1997-03-20	Dracula's castle has risen from the mist and the Belmont heir is missing! The open-ended gameplay mixed with RPG mechanics in this installment of Castlevania platformers set the template for later games in the series (coining the term Metroidvania).	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1412248-cvsotn_box.png
4328	3030-4328	Chrono Cross	1999-11-18	The sequel to the classic Super Nintendo RPG, Chrono Cross expanded the franchise to alternate universes, adopted a turn-based combat system, and had dozens of playable characters.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2211865-box_ccross.png
9249	3030-9249	Chrono Trigger	1995-03-11	Take control of the lovable but silent protagonist Crono in this time-spanning collaborative effort from Squaresoft's Dream Team. Chrono Trigger follows the exploits of Crono as he and his friends attempt to save the world from a planet-devouring alien creature.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/112/699574-chrono.jpg
73235	3030-73235	Space Adventure Cobra: The Shooting	null	A 3D action game based on Buichi Terasawa's classic science fiction manga Space Adventure COBRA.	https://giantbomb1.cbsistatic.com/uploads/scale_small/31/319307/3096942-cobratheshooting.jpg
12771	3030-12771	World Cup 98	1998-03-13	The official Fifa World Cup '98 game, including all 32 licensed international teams and all 10 stadiums.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2266561-box_wc98.png
1541	3030-1541	Darkstalkers 3	1998-04-16	The third (and final) major installment of Capcom's horror-themed fighting game series adds a variety of new characters and major gameplay changes (such as changing the round-based system to a lives-based system).	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2340613-box_ds3.png
5465	3030-5465	Destrega	1998-09-23	A free roaming one on one 3D fighting game by Koei.	https://giantbomb1.cbsistatic.com/uploads/scale_small/3/34651/1811113-destrega.jpg
3839	3030-3839	Dead or Alive	1996-11-26	The first in Tecmo's signature 3D fighting game series, Dead or Alive introduces the world to a special rock-paper-scissors system with strikes, grapples, and counter-attacks.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1791085-box_doa.png
19345	3030-19345	Die Hard Trilogy	1996-08-09	Die Hard Trilogy is a video game adaptation of the original trilogy of Die Hard films which star Bruce Willis as John McClane.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1796246-box_dhtril.png
11917	3030-11917	Dino Crisis	1999-08-31	Join Regina, as part of a special forces team sent to infiltrate a government facility, to discover the truth behind a scientific experiment that has drastically gone awry.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1790001-box_dinocr.png
4035	3030-4035	Dino Crisis 2	2000-09-29	As Dylan Morton and Regina, fight your through countless dinosaurs to uncover the mystery of how an island was to vanish from the face of the earth.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1790002-box_dinocr2.png
2254	3030-2254	Dragon Quest VII: Fragments of the Forgotten Past	2000-08-26	The seventh numbered entry in the Dragon Quest franchise, originally released for the PlayStation and later remade for the Nintendo 3DS.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/97089/2883944-main.jpg
721	3030-721	Ehrgeiz: God Bless the Ring	1999-04-30	A 3D fighting game featuring free-form movement and guest characters from Square's hit JRPG Final Fantasy VII. The console version features a bonus action RPG built from the Quest Mode in the developer's earlier Tobal series.	https://giantbomb1.cbsistatic.com/uploads/scale_small/5/59593/2609519-1814626-box_ehrgeiz.jpg
12050	3030-12050	Eternal Eyes	2000-11-30	Control the cute monsters to prevent the resurrection of the goddess of destruction in this turn based strategy RPG!	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2199410-box_eeyes.png
2917	3030-2917	F1 2000	2000-02-29	Formula One racing game released in 2000 and based on the 2000 F1 World Championship.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2991110-box_f12k.png
8285	3030-8285	Fatal Fury: Wild Ambition	1999-01-28	The sole 3D entry in SNK's Fatal Fury series of fighting games, loosely re-telling the story of the original Fatal Fury.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2543312-box_ffwa.png
5020	3030-5020	Goal Storm '97	1997-06-05	Goal Storm '97 is the second game in Konami's long running Winning Eleven series.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2266520-box_gs97.png
7360	3030-7360	Fear Effect	2000-01-31	An action game that goes from Hong Kong to Hell, Fear Effect takes players to a dark world where killing people and monsters becomes part of the job as players search for a missing girl.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1875231-box_fe.png
17000	3030-17000	Fear Effect 2: Retro Helix	2001-02-20	Fear Effect 2: Retro Helix is a prequel to the original Fear Effect for the Playstation console. The game's story reveals the conditions under which the three protagonists from the first game met each other, and the events that preceded the story of the original Fear Effect.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1875233-box_fe2rh.png
11207	3030-11207	FIFA 98: Road to World Cup	1997-11-30	FIFA 98: Road to World Cup is a multiplatform instalment of the popular soccer video game series, allowing players to relive moments from the 1998 FIFA World Cup.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2266513-box_fifa98.png
14647	3030-14647	FIFA 2001	2000-10-30	null	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2266497-box_fifa01.png
20829	3030-20829	Final Fantasy IV	1991-07-19	Final Fantasy IV is a critically acclaimed RPG in the Final Fantasy series and one of the first of its kind to tell a heavily character-driven story. It also created the Active Time Battle system.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/5128/814659-ff4_logo.jpg
4793	3030-4793	Final Fantasy V	1992-12-06	Join Bartz and his friends on an epic journey spanning the globe in an attempt to stop four mystical crystals from shattering, with a character-customizing Job system that some consider to be the father of similar RPGs to come.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2363828-snes_finalfantasy5_jp.jpg
6336	3030-6336	Final Fantasy VI	1994-04-02	Formerly known as Final Fantasy III in North America, Final Fantasy VI follows a diverse group of heroes as they fight to defeat Kefka, a megalomaniac intent on using a combination of long-lost magic and technology to take over the world.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/97089/2235471-cover.png
19864	3030-19864	Final Fantasy Tactics	1997-06-20	Final Fantasy Tactics is an isometric turn-based strategy game with RPG elements set in the world of Ivalice. It follows the plight of Ramza Beoulve on his quest to obtain the 12 Zodiac Brave stones and stop the corrupt Church of Glabados from unleashing an ancient evil.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1814645-box_fft.png
17595	3030-17595	Front Mission 3	1999-09-02	A turn-based tactics RPG, set in the near future where giant mecha fight alongside or against tanks and troops.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2092590-box_fm3.png
11126	3030-11126	Galerians	null	Galerians is a 1999 survival horror game, which follows a young boy called Rion who tries to remember who he is.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2193293-box_galerians.png
17659	3030-17659	Grandia	1997-12-18	A JRPG that tells the story of the young adventurer named Justin who tries to uncover the reason why the ancient civilization of Angelou disappeared.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2080535-box_grandia.png
11768	3030-11768	The Granstream Saga	1997-11-06	The Granstream Saga is an action RPG released for the PlayStation in 1997 and is the final game developed by Quintet. It was one of the first RPGs with fully 3D polygon graphics and featured third-person hack & slash combat. The plot, set on floating continents, utilized anime cutscenes.	https://giantbomb1.cbsistatic.com/uploads/scale_small/1/14761/859928-front_cover.jpg
2416	3030-2416	Gran Turismo	1997-12-23	Polyphony Digital's seminal racing simulator for the PlayStation.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1794102-box_gt.png
8100	3030-8100	Gran Turismo 2	1999-12-23	Gran Turismo 2 is a realistic driving simulator for the PlayStation featuring over 600 vehicles.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1794103-box_gt2.png
11813	3030-11813	Guilty Gear	1998-05-14	Featuring high-resolution anime-style graphics and a heavy metal soundtrack, Guilty Gear is a stylish 2D fighting game by Arc System Works for the PlayStation.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1791145-box_gg.png
18886	3030-18886	Alex Ferguson's Player Manager 2001	2000-11-24	Become like the greatest manager in English football and possibly the world.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/4647/839986-581569_21545_front.jpg
38754	3030-38754	Hokuto no Ken: Seiki Matsukyu Seishi Densetsu	2000-10-26	A Hokuto no Ken game for the original PlayStation, where the player controls Kenshiro through his journey of the manga/anime.	https://giantbomb1.cbsistatic.com/uploads/scale_small/2/24785/2241394-hnk.jpg
14011	3030-14011	Hoshigami: Ruining Blue Earth	2001-08-03	null	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2199414-box_hgami.png
10340	3030-10340	ISS Pro Evolution	2000-06-06	null	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2266521-box_isspe.png
8000	3030-8000	ISS Pro Evolution 2	2000-08-24	The 2nd addition to the Pro Evolution Soccer franchise	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/5822/487660-iss_2.jpg
12841	3030-12841	International Superstar Soccer '98	1998-06-04	ISS '98 was released before the start of FIFA World Cup in June 1998 as the second installment of the International Superstar Soccer series. It featured many new motion captured animations, additional camera angles, new teams and an extended player creation kit.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/3552/184756-iss_pro_98.jpg
39221	3030-39221	JoJo's Venture	1998-12-02	JoJo's Venture is a 2D fighting game based off of the hit Japanese manga series JoJo's Bizarre Adventure (famous for over-the-top violence, an intricate plot, and numerous Western rock music references).	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2301018-10021201.jpg
5223	3030-5223	Koudelka	1999-12-16	Crawl through the corridors of a building being torn apart at the seams by demonic forces.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1867807-box_kouldeka.png
5964	3030-5964	The King of Fighters '99	1999-07-22	The King of Fighters '99 is the sixth installment of the King of Fighters series, introducing new gameplay mechanics such as the Striker system. It also introduces a new protagonist, K', as well as a new, darker story arc involving the mysterious cartel called NESTS.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/1418244-box_kof99_ng.jpg
13180	3030-13180	The Legend of Dragoon	1999-12-02	A young man sets out on a quest to save his childhood friend who has been kidnapped and locked in a prison. What he doesn't know is that the journey that lies ahead of him and the significance of his Father's red stone that was left behind.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2199375-box_tlod.png
18022	3030-18022	Kartia: The Word of Fate	1998-07-31	Kartia: The Word of Fate	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2199349-box_kartia.png
15900	3030-15900	Legend of Mana	2000-06-07	Unlock sidequests and save the world in Square's follow up to Secret of Mana.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2199358-box_lom.png
4167	3030-4167	Lucky Luke	null	Lucky Luke is based on the Franco-Belgian comic by the same name.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/227/337431-luckyluke.jpg
4248	3030-4248	Lunar 2: Eternal Blue Complete	2000-12-15	Lunar 2: Eternal Blue Complete is the sequel to Lunar: Sliver Star Story. The game features a brand new cast of characters and takes place 1000 years after the events of the original game.	https://giantbomb1.cbsistatic.com/uploads/scale_small/1/14964/715662-lunar2ebccover.jpg
20113	3030-20113	Shining Force	1992-03-20	A tactical RPG from Sega, the player has to save the land of Rune and stop the evil Darksol from reviving an evil that destroyed the world in ages past.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2525245-box_sforce.png
14528	3030-14528	Shining Force II	1993-10-01	The demon lord Zeon has been set free by an unwitting thief. It is the job of Bowie, a young hero from the Kingdom of Granseal, to lead the Shining Force to victory in this Tactical RPG from Sega.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2525246-box_sforce2.png
211	3030-211	Beyond Oasis	1994-12-08	An Action/RPG for the Sega Genesis.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2369737-genesis_beyondoasis.jpg
1662	3030-1662	Sonic the Hedgehog 2	1992-10-16	Run, jump and spin through levels as Sonic and Tails, in order to thwart the plans of the nefarious Dr. Robotnik and free the kidnapped animals! Released by Sega in 1992, Sonic the Hedgehog 2 is often considered one of the greatest platformers of all time.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2374503-genesis_sonicthehedgehog2.jpg
19944	3030-19944	Disney's Aladdin	1993-11-11	Disney's Aladdin was the title of several different games from different developers based on the classic Disney film, Aladdin. As the titular character, players venture through many levels inspired by events and locations in the movie.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2361667-nes_disneysaladdin_de.jpg
9412	3030-9412	QuackShot: Starring Donald Duck	1991-12-19	While Donald is looking through Uncle's Scrooge's books he finds a treasure map and knowing Donald he's going to want to find it. Travel with Donald through seven different locations to try and find all this treasure!	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2371372-genesis_quackshot_eu.jpg
9186	3030-9186	The Lion King	1994-06-24	The Lion King is a platformer released in 1994 for a wide array of systems by Virgin Interactive.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2370715-genesis_thelionking_cropped.jpg
9785	3030-9785	Dragon Ball Z: Buyuu Retsuden	1994-04-01	The sole Dragon Ball game released on a Sega platform, Buyuu Retsuden brings the high-flying combat from the Super Butoden series to the Mega Drive.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2971274-box_dbzbr.png
2465	3030-2465	Sonic the Hedgehog	1991-06-23	The inaugural game in Sega's flagship series starring Sega's most iconic character the blue hedgehog known as Sonic. Sonic the Hedgehog infused conventional platforming with thrilling speed.	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/7465/1296432-sonic_the_hedgehog_boxart__genesis_.jpg
21944	3030-21944	Dragon Ball Z: Super Butoden 3	1994-09-29	The third and final installment of the original Super Butoden trilogy brings the series to the Majin Buu Saga of the Dragon Ball Z storyline.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2971275-box_dbzsb3.png
21943	3030-21943	Dragon Ball Z: Super Butoden 2	1993-12-17	The second installment of the Super Butoden series improves the graphical and gameplay style of its predecessor and is one of the earliest games in the series to focus on storylines from the Dragon Ball animated films.	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2971276-box_dbzsb2.png
21941	3030-21941	Dragon Ball Z: Super Butoden	1993-03-20	One of the earliest fighting games to bear the Dragon Ball license, adding new concepts to the burgeoning fighting game genre (including a roaming split-screen view for less restrictive playfields).	https://giantbomb1.cbsistatic.com/uploads/scale_small/8/87790/2971277-box_dbzsb.png
11864	3030-11864	Super Soccer	1991-12-13	Super Soccer is a soccer game developed by Human Entertainment and published by Nintendo for the SNES.	https://giantbomb1.cbsistatic.com/uploads/scale_small/14/149200/2133790-s_socc.jpg
20790	3030-20790	Teenage Mutant Ninja Turtles	1989-05-12	The Turtles' first appearance on the NES followed the fighting foursome as they attempt to defeat the evil Shredder. Featuring challenging platforming elements and open-world levels, the game quickly became one of the NES's best-selling titles.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2362300-nes_tmnt.jpg
17062	3030-17062	Nintendo World Cup	1990-01-01	Bicycle kick power shots, murderous shoulder slams, unconscious defenders, and soccer on ice... this is what happens when Kunio-kun and crew take to the soccer pitch.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2362091-nes_nintendoworldcup.jpg
16241	3030-16241	Zelda II: The Adventure of Link	1987-01-14	Zelda II: The Adventure of Link is the second entry in the ground-breaking Zelda franchise. This controversial follow-up ditches the original's top-down perspective for 2D side-scrolling exploration and combat. The 2D towns, dungeons and combat arenas are tied together by a top-down overworld.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2362640-nes_legendofzeldaadevntureoflink.jpg
21264	3030-21264	Batman: The Video Game	1989-12-22	A licensed platformer based on the massively-successful 1989 superhero film. Sunsoft developed several different versions of the game which were released for both home and portable consoles.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2361161-nes_batman.jpg
4848	3030-4848	Mike Tyson's Punch-Out!!	null	A first-party boxing game for the NES featuring former World Heavyweight champ Mike Kid Dynamite Tyson as the final opponent. It is largely based on Nintendo's prior arcade release of Punch-Out!!	https://giantbomb1.cbsistatic.com/uploads/scale_small/0/3413/220826-mike_tyson_s_punch_out.jpg
15544	3030-15544	Super Mario Bros.	1985-09-13	Focusing on a humble plumber and his brother setting out to rescue a Princess who has been kidnapped by a vile lizard king, Super Mario Bros. is a platformer created by Shigeru Miyamoto, published by Nintendo, and is one of the best-selling video games of all time.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2362267-nes_supermariobros.jpg
12955	3030-12955	Soccer	1985-04-09	Soccer is the seminal soccer game for the NES, it is wholly about soccer.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2362243-nes_soccer.jpg
2758	3030-2758	Duck Hunt	1984-04-21	Duck Hunt was one of the original NES launch titles, featuring a lightgun, ducks and a laughing blood-hound.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2361688-nes_duckhunt.jpg
6633	3030-6633	Wizards & Warriors	1987-12-01	An action RPG developed by Rare Ltd. and the first in a trilogy of games for the NES. The game features a swordsman named Kuros saving a number of damsels in distress on his way to defeat the evil wizard Malkil.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2362614-nes_wizardsandwarriors.jpg
14026	3030-14026	Mega Man 2	1988-12-24	The evil Dr. Wily is back with eight new menacing creations, and it's up to Mega Man to foil his new plans for world domination! Known for bootstrapping the long-running series, the game also introduces passwords, helpful items (such as Energy Tanks), and the series standard of eight bosses.	https://giantbomb1.cbsistatic.com/uploads/scale_small/9/93770/2362037-nes_megaman2_4.jpg
\.



--
-- TOC entry 3240 (class 2606 OID 17561)
-- Name: _jeu _jeu_pkey; Type: CONSTRAINT; Schema: jeux; Owner: postgres
--



-- Completed on 2020-09-27 17:45:38 CEST

--
-- PostgreSQL database dump complete
--



